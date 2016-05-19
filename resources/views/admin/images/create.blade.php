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
                    {!! Form::open(['url'=>'adminpanel/images', 'method'=>'POST', 'files'=>'true']) !!}
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                          <div>
                            <span class="btn btn-default btn-file">
                            <span class="fileinput-new">Selecciona la imagen</span>
                            <span class="fileinput-exists">Cambiar</span>
                            <input type="file" name="userfile"></span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                          </div>
                        </div>

                        <div class="form-group">
                           <label for="caption">Título</label>
                           <input type="text" class="form-control" name="titulo" value="">
                       </div>


                       <button type="submit" class="btn btn-primary">Subir</button>
                       <a href="{{ url('adminpanel/images') }}" class="btn btn-warning">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.fileinput').fileinput();
    })
</script>
@endsection
