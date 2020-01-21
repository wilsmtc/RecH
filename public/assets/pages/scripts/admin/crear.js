$(document).ready(function(){
    RRHH.validacionGeneral('form-general'); //form general porq con ese id lo creamos al form de menu
	$('#icono').on('blur',function () {
        $('#mostrar-icono').removeClass().addClass('fa fa-fw ' + $(this).val());
    });
});