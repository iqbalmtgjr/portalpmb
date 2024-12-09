$(document).ready(function(){
		
			$('#mytable').on('click','.delete_record',function(){
            var code=$(this).data('code');
            $('#ModalDelete').modal('show');
            $('[name="id"]').val(code);
      });
		
		
	});