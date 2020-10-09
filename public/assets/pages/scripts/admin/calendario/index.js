document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
        var f=new Date();
        var a=f.getFullYear();
        var  m=f.getMonth()+1;
        var d=f.getDate();
            m=(m<10)?"0"+m:m;
            d=(d<10)?"0"+d:d;
        var fechaactual=a+"-"+m+"-"+d;
    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'dayGrid','interaction','timeGrid', 'list' ],
      //defaultView:'timeGridDay'
      header:{
        left:'prev,next,today',
        center:'title',
        right:'dayGridMonth,timeGridWeek,timeGridDay'
      },
      dateClick:function(info){//cuando hacemos click en un dia del calendario (crear)
        limpiarFormulario();
        $('#fechaC').val(info.dateStr);//recupera la fecha donde se hizo click
        if(($('#fechaC').val())>=fechaactual){


            $('#modal-calendario-crear').modal();//activa el modal      
        }else{
            alert("no puede crear eventos en fechas pasadas");
        }
        
      },
      eventClick:function(info){//cuando hacemos click en un evento
        //console.log(info.event.extendedProps.unidad_id);
        //console.log(info.event.extendedProps.descripcion);


        $('#id').val(info.event.id);
        $('#unidad_id').val(info.event.extendedProps.unidad_id);
        $('#titulo').val(info.event.title);
        $('#lugar').val(info.event.extendedProps.lugar);
          dia=(info.event.start.getDate());
          mes=(info.event.start.getMonth()+1);
          año=(info.event.start.getFullYear());
            mes=(mes<10)?"0"+mes:mes;
            dia=(dia<10)?"0"+dia:dia;
            fecha=año+"-"+mes+"-"+dia;
          hora=(info.event.start.getHours());
          minuto=(info.event.start.getMinutes());
            hora=(hora<10)?"0"+hora:hora;
            minuto=(minuto<10)?"0"+minuto:minuto;
            hrs=hora+":"+minuto;
        $('#fecha').val(fecha);
        $('#hora').val(hrs);
        $('#color').val(info.event.backgroundColor);
        $('#descripcion').val(info.event.extendedProps.descripcion);
$('#modal-calendario').modal();
        $('#unidad_idC').val(info.event.extendedProps.unidad_id);
        $('#tituloC').val(info.event.title);
        $('#lugarC').val(info.event.extendedProps.lugar);
          dia=(info.event.start.getDate());
          mes=(info.event.start.getMonth()+1);
          año=(info.event.start.getFullYear());
            mes=(mes<10)?"0"+mes:mes;
            dia=(dia<10)?"0"+dia:dia;
            fecha=año+"-"+mes+"-"+dia;
          hora=(info.event.start.getHours());
          minuto=(info.event.start.getMinutes());
            hora=(hora<10)?"0"+hora:hora;
            minuto=(minuto<10)?"0"+minuto:minuto;
            hrs=hora+":"+minuto;
        $('#fechaC').val(fecha);
        $('#horaC').val(hrs);
        $('#colorC').val(info.event.backgroundColor);
        $('#descripcionC').val(info.event.extendedProps.descripcion);

      },
      // events:[
      //   {
      //     title:'evento 1',
      //     start:"2020-06-07 10:30:00",
      //     end:"2020-06-08 10:30:00",
      //     color:"#FFCCAA",
      //     textColor:"#000000",
      //     descripcion:"describo el evento"
      //   }
      // ]
      events:url_show //es aqui donde estan los eventos guardados en la BD de aqui se muestran
    });
    calendar.setOption('locale','es')
    calendar.render();

    $('#btncrear').click(function(){ //cuando damos click en boton crear
        if(($('#fechaC').val())>=fechaactual){
            objEvento=recolectarDatos("POST");//llama a la funcion q agarra los datos del form y le deciomos q es POST
            EnviarInformacion('', objEvento);  //llama a la funcion para almacenar los datos (es decir STORE)  
            calendar.refetchEvents();
        }else{
            alert("no puede crear eventos en fechas pasadas");
            $('#modal-calendario-crear').modal('toggle');//en modal se cerrara
        }
    });

    $('#btneliminar').click(function(){
        if(($('#fecha').val())>=fechaactual){
            objEvento=recolectarDatos("DELETE");
            EnviarInformacion('/'+$('#id').val(), objEvento);
            calendar.refetchEvents();//actualiza el calendario       
        }else{
            alert("no puede eliminar eventos de fechas pasadas");
            $('#modal-calendario').modal('toggle');//en modal se cerrara
        }
    });

    $('#btneditar').click(function(){
        if(($('#fecha').val())>=fechaactual){
            objEvento=recolectarDatos2("PATCH");
            EnviarInformacion('/'+$('#id').val(), objEvento);         
        }else{
            alert("no puede editar eventos de fechas pasadas");
            $('#modal-calendario').modal('toggle');//en modal se cerrara
        }

    });

    function recolectarDatos(method){//agarrar los datos q llenamos en el form y recive un metodo (post,etc)
        if(validarDatos()){
           
           nuevoEvento={
            //id:$('#id').val(),
            unidad_id:$('#unidad_idC').val(),
            title:$('#tituloC').val(),
            lugar:$('#lugarC').val(),
            descripcion:$('#descripcionC').val(),
            color:$('#colorC').val(),
            textColor:'#FFFFFF',
            start:$('#fechaC').val()+" "+$('#horaC').val(),
            end:$('#fechaC').val()+" "+$('#horaC').val(),
            '_token':$('meta[name="csrf-token"]').attr('content'),
            '_method':method 
            }
            return (nuevoEvento);  //nos devuelve un array con todos los datos del evento
        }else{
            return
        }      
    }
    function recolectarDatos2(method){//agarrar los datos q llenamos en el form y recive un metodo (post,etc)
      if(validarDatos()){       
         nuevoEvento={
          //id:$('#id').val(),
          unidad_id:$('#unidad_id').val(),
          title:$('#titulo').val(),
          lugar:$('#lugar').val(),
          descripcion:$('#descripcion').val(),
          color:$('#color').val(),
          textColor:'#FFFFFF',
          start:$('#fecha').val()+" "+$('#hora').val(),
          end:$('#fecha').val()+" "+$('#hora').val(),
          '_token':$('meta[name="csrf-token"]').attr('content'),
          '_method':method 
          }
          return (nuevoEvento);  //nos devuelve un array con todos los datos del evento
      }else{
          return
      }      
  }
    function EnviarInformacion(accion, objEvento){//envia los datos al metodo STORE del controlador      
      $.ajax(
        {
          type:"POST",
          url:url_+accion,//accion sera una variable q agarre el metodo
          data:objEvento,//objEvento agarra los datos atributos
          success:function(msg){
            $('#modal-calendario-crear').modal('toggle');//en modal se cerrara
            calendar.refetchEvents();//actualiza el calendario
          },
          error:function(msg){alert("hay un error");},
        }
      );
    }
    function validarDatos(){

            return true;
    }
    function limpiarFormulario(){
      $('#id').val("");
      $('#unidad_idC').val("");
      $('#tituloC').val("");
      $('#lugarC').val("");
      $('#fechaC').val("");
      $('#horaC').val("07:00");
      $('#colorC').val("");
      $('#descripcionC').val("");
      $('#unidad_id').val("");
      $('#titulo').val("");
      $('#lugar').val("");
      $('#fecha').val("");
      $('#hora').val("07:00");
      $('#color').val("");
      $('#descripcion').val("");
    }
  });

