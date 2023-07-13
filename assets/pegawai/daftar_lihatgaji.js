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
              serverSide: true,
              ajax: {
				  "url": "get_lihatgaji_json", 
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
						{"data": "lecturer_id"},
						{"data": "name"},
						{"data": "total_penda", render: $.fn.dataTable.render.number( '.', ',', 0,'Rp. ' )},
						{"data": "total_potong", render: $.fn.dataTable.render.number( '.', ',', 0,'Rp. ' )},
						{"data": "total_potong", render: function (data, type, row, meta) {
							var tol = parseInt(row.total_penda) - parseInt(row.total_potong);
							var m = $.fn.dataTable.render.number( '.', ',', 0,'Rp. ' ).display(tol);
							return m;
						}},
                        {"data": "view"}
                  ],
				 
				
          		order: [[1, 'asc']],
				"columnDefs": [
				{ "orderable": false, "targets":6 },
				{ "orderable": false, "searchable": false, "targets": 0 },
				{ "targets": [ 1 ], "visible": false, "searchable": false },
				{ "className": "text-center", "targets": [6]}
				],
		
          
      });
		
	});