$(document).ready(function(){
		// Setup datatables
		$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
      {
          return {
              "iStart": oSettings._iDisplayStart,
              "iEnd": oSettings.fnDisplayEnd(),
              "iLength": oSettings._iDisplayLength,
              "iTotal": oSettings.fnRecordsTotal(),
              "iFilteredTotal": oSettings.fnRecordsDisplay(),
              "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
              "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
          };
      };

      var table = $("#mytable").dataTable({
          initComplete: function() {
              var api = this.api();			  
              $('#mytable_filter input')
                  .off('.DT')
                  .on('input.DT', function() {
                      api.search(this.value).draw();
              });
          },
              oLanguage: {
				"sProcessing":   "Sedang memproses...",
				"sLengthMenu":   "Tampilkan _MENU_ entri",
				"sZeroRecords":  "Tidak ditemukan data yang sesuai",
				"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
				"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
				"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
				"sInfoPostFix":  "",
				"sSearch":       "Cari:",
				"sUrl":          "",
				"oPaginate": {
					"sFirst":    "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext":     "Selanjutnya",
					"sLast":     "Terakhir"
				}
          },
              processing: true,
               dom: 'Blfrtip',
			  buttons: [ 
			    {
                extend: 'pdf',
                exportOptions: {
                columns: [ 0,2,3,4,5 ]
                }
                    },
                
			  ],
              serverSide: true,
              ajax: {
				  "url": "get_item_json", 
				  "type": "POST",
				  "data": {"csrf_test_name" : $('input[name=csrf_test_name]').val()},
				  "data": function(data){
					  data.csrf_test_name = $('input[name=csrf_test_name]').val();
						},
					"dataSrc": function(response) {						
						$('input[name=csrf_test_name]').val(response[0].csrf_test_name);
						return response.data;
					},
				  },
			  
                	columns: [	
						{"data": "", render: function (data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;
						}},
						{"data": "dis_id"},
						
						{"data": "no"},
						{"data": "nim",render: function ( data, type, row ) {
							return row.nim + ' <br>(<i>' + row.nama+'</i>)';
						}},
						{"data": "keperluan"},
						{"data": "tgl_buat",render: function ( data, type, row ) {
							return row.tgl_buat + ' - ' + row.kadaluarsa;
						}},
						{"data": "nama"},
					
                        {"data": "view"}
                  ],
				 
				
          		order: [[1, 'desc']],
				"columnDefs": [
				{ "orderable": false, "targets": 7 },
				{ "orderable": false, "searchable": false, "targets": 0 },
				{ "targets": [ 1 ], "visible": false, "searchable": false },
				{ "targets": [ 6 ], "visible": false },
				{"className": "text-center", "targets": [7]}
				],
		
          
      });
	   
	  // end setup datatables
			// get delete Records
			$('#mytable').on('click','.delete_record',function(){
            var code=$(this).data('code');
            $('#ModalDelete').modal('show');
            $('[name="id_item"]').val(code);
      });
			// End delete Records
		
	});