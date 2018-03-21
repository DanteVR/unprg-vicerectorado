@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action" href="{{ url('actividades/all') }}">Todas</a>
      <a class="list-group-item list-group-item-action active" href="{{ url('actividades/my') }}">Mis Actividades</a>
    </div>
    <div class="alert alert-warning mt-3" role="alert">
      Genial! - Estas a punto de crear una nueva actividad, se nota que te gusta mucho trabajar.
    </div>
  </div>
  <div class="col-10">
    @include('partials.myAlertErrors')
    {{ Form::open(['action'=>['ActividadController@store'], 'method'=>'POST'])}}
      <div class="row">
        <div class="col col-sm-8">
          Acrtividad:
          {{ Form::hidden('id', 0, ['id'=>'id']) }}
          <div class="form-group">
            {!!Form::text('nombre', null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Nombre de actividad'])!!}
          </div>
          <div class="form-group">
            {!!Form::text('presupuesto', null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Presupuesto'])!!}
          </div>
          <div class="form-group">
            {!!Form::date('fecha_inicio', null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Fecha incio'])!!}
          </div>
          <div class="form-group">
            {!!Form::date('fecha_fin_esperada', null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Fecha fin esperada'])!!}
          </div>

          Monitor:
          <?php
              $opciones = array();
              foreach($monitores as $user){
                $opciones[$user->id] = $user->nombres.' '.$user->paterno.' '.$user->materno;
              }
           ?>
          <div class="form-group">
            {!! Form::select('monitor_id', $opciones , Auth::user()->id,['class'=>'form-control form-control-sm', 'placeholder'=>'Seleccione un usuario como monitor']) !!}
          </div>
        </div>
        <div class="col col-sm-4">
          Resolucion:
          <div class="form-group">
            {!!Form::text('numero_resolucion', null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Numero de resolucion'])!!}
          </div>
          <div class="form-group">
            {!!Form::date('fecha_resolucion', null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Fecha resolucion'])!!}
          </div>

          Acta:
          <div class="form-group">
            {!!Form::date('fecha_acta', null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Fecha resolucion'])!!}
          </div>
          <div class="form-group">
            {!!Form::textarea('descripcion_acta', null, ['class'=>'form-control form-control-sm', 'rows'=>'5', 'placeholder'=>'Descripcion de acta'])!!}
          </div>



          <div class="d-flex flex-row-reverse">
            <div class="form-inline mt-2">
              {{ link_to('actividades/my','Cancelar',['class'=>'btn btn-sm btn-secondary mr-1']) }}
              {{ Form::submit('Crear', ['class'=>'btn btn-sm btn-info']) }}
            </div>
          </div>

        </div>
      </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection
