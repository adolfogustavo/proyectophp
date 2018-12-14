</main>
 <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
 <script src="../js/materialize.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>
<script>
	
/* Scripts para buscador */
$('#buscar').keyup(function(event) {
	// new RegExp (Nuevo objeto de expresiones regulares)
	// la letra i nos esta diciendo que la busqueda sera sensible a mayusculas y minusculas
	var contenido = new RegExp($(this).val(), 'i');
	$('tr').hide();
	$('tr').filter(function() {
		return contenido.test($(this).text());
	}).show();
	// Para evitar que el filtro tome en cuenta el tr del materialize
	// Coloco el attr style vacío
	$('.cabecera').attr('style','');
});


/* Script para el Sidenav del tema  */
  $('.button-collpase').sideNav();
  $('select').material_select();

/* Script para convertir en mayuscula el texto formulario */
  function may(obj, id){
  	obj = obj.toUpperCase();
  	document.getElementById(id).value = obj;
  }

</script>