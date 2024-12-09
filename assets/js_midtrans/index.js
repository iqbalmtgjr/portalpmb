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
                    {"data": "order_id"},
                    {"data": "nama_siswa"},
                    {"data": "email"},
                    {"data": "jmlh_pembayaran", "render": function(data, type, row, meta){
                        return 'Rp. ' + formatRupiah(data);
                    }},
                    {"data": "tgl_transaksi", "render": function(data, type, row, meta){
                        var date = new Date(data);
                        var day = ("0" + date.getDate()).slice(-2);
                        var month = ("0" + (date.getMonth() + 1)).slice(-2);
                        var year = date.getFullYear();
                        return day + "/" + month + "/" + year;
                    }},
                    {"data": "transaction_status", "render": function(data, type, row, meta){
                        switch (data) {
                            case 'pending':
                                return '<span class="badge badge-warning">' + data + '</span>';
                            case 'settlement':
                                return '<span class="badge badge-success">' + data + '</span>';
                            case 'expire':
                                return '<span class="badge badge-danger">' + data + '</span>';
                            default:
                                return data;
                        }
                    }},
                    {"data": "action"},
              ],
             
            
              order: [[1, 'desc']],
            "columnDefs": [
            { "orderable": false, "targets": 1 },
            { "orderable": false, "targets": 6 },
            { "orderable": false, "searchable": false, "targets": 0 },
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
