$(document).ready(function(){
    const reglas = {
        re_password:
        {
            equalTo: "#password"
        }
    };
    const mensajes = {
        re_password:
        {
            equalTo:'Las contraseñas no son iguales'
        }
    };
    RRHH.validacionGeneral('form-general', reglas, mensajes); //form general porq con ese id lo creamos al form de menu
    $('#password').on('change', function(){
        const valor = $(this).val();
        if(valor != ''){
            $('#re_password').prop('required', true);
        }else{
            $('#re_password').prop('required', false);
        }
    });
    //si hay contenido en pass diferente de vacio entoncs activa el required
});