// Metodo AJAX 
	$('#nick').change(function() {
		$.post('ajax_validacion_nick.php',{
			nick:$('#nick').val(),

			beforeSend: function(){
				$('.validacion').html("Espere un momento por favor..");
			}

		}, function(respuesta){
		  $('.validacion').html(respuesta);
		});
	});


	$('#btn_guardar').hide();

	$('#pass2').change(function(event){
		if($('#pass1').val() == $('#pass2').val()) {
			swal('Bien hecho...','Las contraseñas coinciden','success');
			$('#btn_guardar').show();
		} else {
			swal('Opps...','Las contraseñas no coinciden','error');
			$('#btn_guardar').hide();
		}

	});
	
	// Desactivar que se envie el formulario con la tecla enter
	// codigo de la tecla enter = 13
	$('.form').keypress(function(e){
		if(e.which == 13) {
			return false;
		}
	});
