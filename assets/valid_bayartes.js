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
				  "url": "valid_bayartes_json", 
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
						{"data": "id_siswa"},
						{"data": "akun_siswa"},
						{"data": "nomor_refe",render: function ( data, type, row ) {
							return 'Strok: '+row.nomor_refe + ' <br><i style="color:#c118d6d1;">sms: ' + row.smsref +'</i>';
						}},
						{"data": "nama_pengirim",render: function ( data, type, row ) {
							return 'Pengirim: '+row.nama_pengirim + ' <br><i style="color:#c118d6d1;">Mahasiswa: ' + row.nama_siswa +'</i>';
						}},
						{"data": "bank_pengirim"},
						{"data": "jlh_bayar", render: $.fn.dataTable.render.number( '.', ',', 2 )},
						{"data": "tgl_trans",render: function ( data, type, row ) {
							return row.tgl_trans + ' <br>(<i>' + row.jam_trans+'</i>)';
						}},
                        {"data": "view"}
                  ],
				 
				
          		order: [[1, 'desc']],
				"columnDefs": [
				{ "orderable": false, "targets": 8 },
				{ "orderable": false, "targets": 2 },
				{ "orderable": false, "searchable": false, "targets": 0 },
				{ "targets": [ 1 ], "visible": false, "searchable": false },
				{ "targets": [ 2 ], "visible": false, "searchable": false }
				
				],
		
          
      });
	   
	  // end setup datatables
			
		
	});