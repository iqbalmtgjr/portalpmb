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
              "url": "belumbayar_json", 
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
                    {"data": "ref"},
                    {"data": "nama_siswa"},
                    {"data": "gelombang"},
                    {"data": "prodi_penerimaan",
                        render: function (data, type, row){
                            if (row.prodi_penerimaan == '1') {
                               return 'Pendidikan Bahasa dan Sastra Indonesia';
                            } else if (row.prodi_penerimaan == '2') {
                               return 'Pendidikan Matematika';
                            } else if (row.prodi_penerimaan == '3') {
                               return 'Pendidikan Ekonomi';
                            } else if (row.prodi_penerimaan == '4') {
                               return 'Pendidikan Pancasila dan Kewarganegaraan';
                            } else if (row.prodi_penerimaan == '5') {
                               return 'Pendidikan Komputer';
                            } else if (row.prodi_penerimaan == '6') {
                               return 'Pendidikan Biologi';
                            } else if (row.prodi_penerimaan == '7') {
                               return 'Pendidikan Anak Usia Dini';
                            } else if (row.prodi_penerimaan == '8') {
                               return 'Pendidikan Bahasa Inggris';
                            } else {
                               return 'Pendidikan Guru Sekolah Dasar';
                            }
                        }
                    },
              ],
             
            
              order: [[1, 'desc']],
            "columnDefs": [
            { "orderable": false, "targets": 2 },
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