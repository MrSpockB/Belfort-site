@extends('admin.app')
@include('admin.menu')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                @include('admin.sidebar')
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
               <div class="panel-heading">Biblioteca de Imágenes</div>
               <div class="panel-body">
                  {!! Form::model($image,['url' => 'adminpanel/images/'.$image->id, 'method' => 'PUT', 'files'=>true]) !!}

                        <img src="{{ asset($image->ruta) }}" height="150" />
                        <div class="form-group">
                           <label for="userfile">Imagen</label>
                           {!! Form::file('userfile',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                           <label for="titulo">Título</label>
                           {!! Form::text('titulo',null,['class'=>'form-control']) !!}
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ url('adminpanel/images/') }}" class="btn btn-warning">Cancelar</a>
                  {!! Form::close() !!}
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
