$(document).ready(function(){
    RRHH.validacionGeneral('form-general'); //form general porq con ese id lo creamos al form de menu
    $('#documento').fileinput({
        language: 'es',     //lenguaje
        allowedFileExtensions: ['pdf'], //archivos permitidos
        maxFileSize: 1000,  //tamaño maximo 1mb
        showUpload: false,  //no mostratra el boton upload
        showClose: false,   //no mostratra el boton close
        initialPreviewAsData: true,     //mostrar una imagen previa
        dropZoneEnabled: true,     //permitir arrastrar imagenes
        theme: "fa",    //para llamar iconos fa
        //initialPreviewFileType: true,
        //previewFileType: false,
    });
});