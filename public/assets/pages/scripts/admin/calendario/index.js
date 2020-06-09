document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'dayGrid','interaction','timeGrid', 'list' ],
      //defaultView:'timeGridDay'
      header:{
        left:'prev,next,today',
        center:'title',
        right:'dayGridMonth,timeGridWeek,timeGridDay'
      },
      dateClick:function(info){
        //console.log(info);
        limpiarFormulario();
        $('#fecha').val(info.dateStr);
        $('#btncrear').prop("disabled",false);
        $('#btneditar').prop("disabled",true);
        $('#btneliminar').prop("disabled",true);
        $('#modal-calendario').modal();
      },
      eventClick:function(info){
        //console.log(info.event.title);
        //console.log(info.event.extendedProps.descripcion);
        $('#btncrear').prop("disabled",true);
        $('#btneditar').prop("disabled",false);
        $('#btneliminar').prop("disabled",false);

        $('#id').val(info.event.id);
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
      events:url_show
    });
    calendar.setOption('locale','es')
    calendar.render();

    $('#btncrear').click(function(){
      objEvento=recolectarDatos("POST");
      EnviarInformacion('', objEvento);
    });

    $('#btneliminar').click(function(){
      objEvento=recolectarDatos("DELETE");
      EnviarInformacion('/'+$('#id').val(), objEvento);
    });

    $('#btneditar').click(function(){
      objEvento=recolectarDatos("PATCH");
      EnviarInformacion('/'+$('#id').val(), objEvento);
    });

    function recolectarDatos(method){
      nuevoEvento={
        id:$('#id').val(),
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
      return (nuevoEvento); 
    }
    function EnviarInformacion(accion, objEvento){
      //accion sera una variable q agarre el metodo
      //objEvento agarra los datos atributos
      $.ajax(
        {
          type:"POST",
          url:url_+accion,
          data:objEvento,
          success:function(msg){
            $('#modal-calendario').modal('toggle');//en modal se cerrara
            calendar.refetchEvents();//actualiza el calendario
          },
          error:function(msg){alert("hay un error");},
        }
      );
    }
    function limpiarFormulario(){
      $('#id').val("");
      $('#titulo').val("");
      $('#lugar').val("");
      $('#fecha').val("");
      $('#hora').val("07:00");
      $('#color').val("");
      $('#descripcion').val("");
    }
  });