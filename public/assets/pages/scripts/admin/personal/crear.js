$(document).ready(function(){
    RRHH.validacionGeneral('form-general'); //form general porq con ese id lo creamos al form
    $('#foto').fileinput({
        language: 'es',     //lenguaje
        allowedFileExtensions: ['jpg', 'jpeg', 'png'], //archivos permitidos
        maxFileSize: 3000,  //tamaño maximo 3mb
        showUpload: false,  //no mostratra el boton upload
        showClose: false,   //no mostratra el boton close
        initialPreviewAsData: true,     //mostrar una imagen previa
        dropZoneEnabled: true,     //permitir arrastrar imagenes
        theme: "fa",    //para llamar iconos fa
    });

    $('#documento').fileinput({
        language: 'es',     //lenguaje
        allowedFileExtensions: ['pdf'], //archivos permitidos
        maxFileSize: 30000,  //tamaño maximo 30mb
        showUpload: false,  //no mostratra el boton upload
        showClose: false,   //no mostratra el boton close
        initialPreviewAsData: true,     //mostrar una imagen previa
        dropZoneEnabled: true,     //permitir arrastrar imagenes
        theme: "fa",    //para llamar iconos fa
        //initialPreviewFileType: true,
        //previewFileType: false,
    });
});