@extends('admin.app')

@section('menu')
@include('admin.menu')
@stop

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
                    <a class="btn btn-success btn-lg" href="{{ url('adminpanel/images/create') }}">Subir imagen</a>
                    <hr />
                    @if($errors->has())
                        <div class='alert alert-danger'>
                            @foreach ($errors->all('<p>:message</p>') as $message)
                            {!! $message !!}
                            @endforeach
                        </div>
                    @endif
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    <div class="row">
                    @forelse($images as $image)
                        <div class="col-md-3">
                            <div class="thumbnail">
                               <img src="{{asset($image->ruta)}}" />
                               <div class="caption">
                                    <h3>{{$image->titulo}}</h3>
                                    <p>
                                        <div class="row text-center" style="padding-left:1em;">
                                            <a href="{{ url('adminpanel/images/'.$image->id.'/edit') }}" class="btn btn-warning pull-left">Editar</a>
                                            <span class="pull-left">&nbsp;</span>
                                            {!! Form::open(['url'=>'adminpanel/images/'.$image->id, 'class'=>'pull-left']) !!}
                                                {!! Form::hidden('_method', 'DELETE') !!}
                                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger', 'onclick'=>'return confirm(\'Estas seguro?\')']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </p>
                               </div>
                            </div>
                        </div>
                    @empty
                        <p>Todavia no hay imágenes</p>
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
