@extends('admin.app')
@include('admin.menu')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('admin.sidebar')
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Bicicletas</div>

                <div class="panel-body">
                    You are logged in!
                </div>
                {!! Form::open(array('route' => 'admin.upload','method' => 'POST', 'files'=>'true')) !!}
                    <div class="input-group">
                        {!! Form::file('excel', array('class'=>'form-control')) !!}
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Subir Archivo</button>
                        </span>
                    </div>
                {!! Form::close() !!}
                
            </div>
        </div>
    </div>
</div>
@endsection
