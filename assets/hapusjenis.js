$(document).ready(function(){
        // get Delete jenis
        $('.get-delete-jenis').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('#productID').val(id);
            // Call Modal Edit
            $('#modal-delete').modal('show');
        });
        $('.get-delete-biaya').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('#productID').val(id);
            // Call Modal Edit
            $('#modal-delete').modal('show');
        });
        	// get delete Records
			$('#mytable').on('click','.delete_record',function(){
            var code=$(this).data('code');
            $('#ModalDelete').modal('show');
            $('[name="id_rinci"]').val(code);
      });
    });