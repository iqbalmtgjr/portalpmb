$( document ).ready(function() { 
      hidesemster();
	  hidesks();
  });

$(document).ready(function(){
  $("#jenis_pembayaran").change(function(){
       hidesemster();
  });
  $("#jenis_pembayaran").change(function(){
       hidesks();
  });
});

function hidesemster()
{
     var jenis_pembayaran=$("#jenis_pembayaran").val();
        if(jenis_pembayaran==1)
            {
                $("#semester").show()
            }
            else
                {
                     $("#semester").hide()
                }
}

function hidesks()
{
     var jenis_pembayaran=$("#jenis_pembayaran").val();
        
        if(jenis_pembayaran==5)
            {
                $("#sk").show(),
                $("#sks").show()
            }
            else
                {
                     $("#sk").hide(),
                      $("#sks").hide()
                }
}

