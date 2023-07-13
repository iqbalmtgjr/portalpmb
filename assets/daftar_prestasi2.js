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
				  "url": "prestasi2_siswa_json", 
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
						{"data": "nis_siswa"},
						{"data": "nama_siswa"},
						{"data": "nama_prodi"},
						{"data": "nama_prodi_baru"},
                        {"data": "status_penerimaan",
                            render: function (data, type, row) {
                                if (data == 2) {
                                    return '<i class="text-danger">Tidak Lulus</i>';
                                }
                                if (data == 1) {
                                    return '<i class="text-success">Lulus</i>';
                                }
                                return 'Tidak Diketahui';
                             }
                        },
                        {"data": "umumkan",
                            render: function (data, type, row) {
                                if (data == 1) {
                                    return '<span class="text-success">Sudah</span>';
                                }
                                
                                return '<i class="text-danger">Belum</i>';
                             }
                        },
                        {"data": "view"}
                  ],
				 
				
          		order: [[1, 'desc']],
				"columnDefs": [
				{ "orderable": false, "targets": 9 },
				{ "orderable": false, "targets": 2 },
				{ "orderable": false, "searchable": false, "targets": 0 },
				{ "targets": [ 1 ], "visible": false, "searchable": false },
				{ "targets": [ 2 ], "visible": false, "searchable": false }
				
				],
		
          
      });
	   
	  // end setup datatables
			// get delete Records
			$('#mytable').on('click','.delete_record',function(){
            var code=$(this).data('code');
            $('#ModalDelete').modal('show');
            $('[name="maba_id"]').val(code);
      });
			// End delete Records
		
	});