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
              "url": "index_json", 
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
                    {"data": "id_bukti_bayar"},
                    {"data": "akun_siswa"},
                    {"data": "ref"},
                    {"data": "nama_siswa"},
                    // {"data": "tgl_trans", 
                    //     render: function (data, type, row) {
                    //         return '<p>'+row.tgl_trans+'<br><span class="text-danger">Jam '+row.jam_trans+'</span></p>';
                    //     }
                    // },
                    {"data": "tgl_trans",
                        render: function (data, type, row) {
                            if (data) {
                                var regex = /^\d{4}-\d{2}-\d{2}$/;
                                    
                                if (regex.test(data)) {
                                    var dateParts = data.split('-');
                                    var year = dateParts[0];
                                    var month = dateParts[1];
                                    var day = dateParts[2];
                                    var formattedDate = day + '/' + month + '/' + year;
                                    return formattedDate + ' <br>(<i>' + row.jam_trans + '</i>)';
                                } else {
                                    return data + ' <br>(<i>' + row.jam_trans + '</i>)';
                                }
                            }
                            return '';
                        }
                    },
                    {"data": "nama_pengirim"},
                    {"data": "jlh_bayar",
                    render: function (data, type, row) {
                       return formatRupiah(row.jlh_bayar, 'Rp. ');
                    }
                    },
                    {"data": "keterangan",
                        render: function (data, type, row){
                            if(row.keterangan == null){
                                return '<a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-akun="'+row.akun_siswa+'" data-target="#ket">Tambah Keterangan<a>';
                            }else{
                                return row.keterangan;
                            }
                        }
                    },
                    {"data": "bukti_bayar", 
                    render: function (data, type, row) {
                            return '<a href="https://daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/'+row.bukti_bayar+'" target="_blank"><img class="card-img-top lazyload" style="height: 150px; width: 180px; object-fit: cover; object-position: center;" src="https://daftar.persadakhatulistiwa.ac.id/assets/berkas/bukti/'+row.bukti_bayar+'" alt="slip pembayaran"></a>';
                    }
                    },
              ],
             
            
              order: [[1, 'desc']],
            "columnDefs": [
            { "orderable": false, "targets": 2 },
            { "orderable": false, "targets": 8 },
            { "orderable": false, "searchable": false, "targets": 0 },
            { "targets": [ 1 ], "visible": false, "searchable": false },
            { "targets": [ 2 ], "visible": false, "searchable": false }
            ],
    
      
  });
   
  // end setup datatables
    
  // formatRupiah
  function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
});