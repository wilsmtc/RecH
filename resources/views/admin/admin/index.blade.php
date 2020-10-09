@extends("theme.$theme.layout")
@section('titulo')
admin
@endsection
@section('contenido')
@include('includes.mensajeerror')
<div style="text-align: center">
    <h3 style="color: rgb(203, 203, 207)"><b>Sistema de Administración de Recursos Humanos<b></h3>
</div>
<div style="text-align: center">
    <img src="/assets/lte/dist/img/compu1.png" height="250px" width="250px">
</div>
<div class="row">
    <div class="col-lg-3 col-xs-6" >
      <!-- small box -->
      <div class="small-box bg-blue" >
        <div class="inner">
        <h3>{{$us}}</h3>
          <p>Usuarios</p>
        </div>
        <a href="admin/usuario" >
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
        </a>   
            <div class="box box-default collapsed-box bg-blue" style="text-align: center">
                <div class="box-header with-border" >
                    <h5 class="box-title text-black" >Información</h5>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                    </div>
                </div>
                <div class="box-body">
                    Usuarios que tienen acceso al sistema
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
        <div class="inner">
        <h3>{{$un}}<sup style="font-size: 20px"></sup></h3>
            <p>Unidades</p>
        </div>
        <a href="admin/unidad" >
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
        </a>
            <div class="box box-default collapsed-box bg-green" style="text-align: center">
                <div class="box-header with-border" >
                    <h5 class="box-title text-black" >Información</h5>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    Unidades que componen la organización
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
  <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
        <div class="inner">
        <h3>{{$pe}}</h3>
            <p>Registros de Personal</p>
        </div>
        <a href="admin/personal" >
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
        </a>
            <div class="box box-default collapsed-box bg-yellow" style="text-align: center">
                <div class="box-header with-border" >
                    <h5 class="box-title text-black" >Información</h5>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    personales registrados en la organización
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
        <div class="inner">
            <h3>{{$ev}}</h3>
            <p>Actividades</p>
        </div>
        <a href="eventos" >
            <div class="icon">
                <i class="fa fa-calendar"></i>
            </div>
        </a>
            <div class="box box-default collapsed-box bg-red" style="text-align: center">
                <div class="box-header with-border" >
                    <h5 class="box-title text-black" >Información</h5>
                    <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    Actividades de la institución
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>
@endsection