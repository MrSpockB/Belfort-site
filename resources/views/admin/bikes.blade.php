@extends('admin.app')

@section('menu')
@include('admin.menu')
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('admin.sidebar')
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Bicicletas</div>
                <div class="panel-body">
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
                    <a class="btn btn-success btn-lg" href="{{ url('adminpanel/bikes/add') }}">Añadir bicicleta</a>
                    <hr>
                    {!! Form::open(array('route' => 'admin.upload','method' => 'POST', 'files'=>'true', 'class' => 'form-upload')) !!}
                        <div class="input-group">
                            {!! Form::file('excel', array('class'=>'form-control')) !!}
                            <span class="input-group-btn">
                                <button class="btn btn-default submit-btn btn-info" type="button">Subir Archivo</button>
                            </span>
                        </div>
                    {!! Form::close() !!}
                    <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Modelo</th>
                                <th>Submodelo</th>
                                <th>Rodada</th>
                                <th>Color</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($bikes as $bike)
                            <tr>
                                <td>{{ $bike->id }}</td>
                                <td>{{ $bike->modelo }}</td>
                                <td>{{ $bike->submodelo }}</td>
                                <td>{{ $bike->rodado }}</td>
                                <td>{{ $bike->color }}</td>
                                <th><a href="{{ url('adminpanel/bikes/'.$bike->id.'/edit') }}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></th>
                                <th><a href="#" data-id="{{ $bike->id }}"><i class="fa fa-times" aria-hidden="true"></i></a></th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $bikes->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function()
    {
        $(".submit-btn").click(function()
        {
            var myForm = $('.form-upload');
            $.ajax(
            {
                url: myForm.attr('action'),
                data: new FormData($(".form-upload")[0]),
                dataType:'json',
                async:false,
                type: myForm.attr('method'),
                processData: false,
                contentType: false,
                success:function(response)
                {
                    console.log(response);
                }
            });
         });
    });
</script>
@endsection
