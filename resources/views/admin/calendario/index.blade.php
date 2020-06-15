@extends("theme.$theme.layout")
@section('titulo')
Calendario
@endsection
@section("styles")
  <link rel="stylesheet" href="{{asset("assets/css/fullcalendar/core/main.css")}}"> 
  <link rel="stylesheet" href="{{asset("assets/css/fullcalendar/daygrid/main.css")}}">
  <link rel="stylesheet" href="{{asset("assets/css/fullcalendar/list/main.css")}}">
  <link rel="stylesheet" href="{{asset("assets/css/fullcalendar/timegrid/main.css")}}"> 
@endsection
@section("scripts")
  <script src="{{asset("assets/js/fullcalendar/core/main.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/js/fullcalendar/daygrid/main.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/js/fullcalendar/timegrid/main.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/js/fullcalendar/list/main.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/js/fullcalendar/interaction/main.js")}}" type="text/javascript"></script>

  <script>
    var url_="{{url('eventos')}}";
    var url_show="{{ url('eventos/show') }}";
  </script>
  <script src="{{asset("assets/pages/scripts/admin/calendario/index.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
<div class="row" style="text-align: center" >
  <div class="col-lg-10">
    <div class="box" style="height: 640px; width:700px; margin-left: 125px; background-color: rgb(248, 248, 248)" >
      <h4 class="box-title"><b>Calendario de actividades</b></h4>
      <div class="box-header with-border" id="calendar">
      </div>
    </div>
  </div>
</div>
<form id="form-general"> 
<div class="modal modal-info fade in" id="modal-calendario" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Calendario</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="id">
        <div class="form-row">        
          <div class="form-group col-lg-12">
            <label class="requerido">Título</label>
            <input type="text" class="form-control" name="titulo" id="titulo" required placeholder="Nombre del evento" autocomplete="off">
          </div>
          <div class="form-group col-lg-8">
            <label>lugar</label>
            <input type="text" class="form-control" name="lugar" id="lugar" placeholder="¿Donde será el evento?" autocomplete="off">
          </div>
          <div class="form-group col-lg-4">
            <label>fecha</label>
            <input type="date"  class="form-control" name="fecha" id="fecha">
          </div>
          <div class="form-group col-lg-4">
            <label>Hora</label>
            <input type="time" min="07:00" max="19:59" step="600" class="form-control" name="hora" id="hora">
          </div>
          <div class="form-group col-lg-8">
            <label>color</label>
            <input type="color" class="form-control" name="color" id="color">
          </div>
          <div class="form-group col-lg-12">
            <label>Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        @if(session()->get('usuario')!=null)
          <button id="btncrear" class="btn btn-success">Crear</button>
          <button id="btneditar" class="btn btn-warning">Editar</button>
          <button id="btneliminar" class="btn btn-danger">Eliminar</button>
        @endif       
        <button id="btncancelar" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</form>
@endsection