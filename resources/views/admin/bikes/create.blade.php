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
                <div class="panel-heading">
                    <h4 class="panel-title">
                        @if(isset($data['bike']))
                            Editar bicicleta 
                        @else
                            Añadir bicicleta
                        @endif
                    </h4>
                </div>
                <div class="panel-body">
                    @if(isset($data['bike']))
                        {!! Form::model($data['bike'], ['route' => ['bikes.update', $data['bike']->id], 'method' => 'put']) !!}
                    @else
                        {!! Form::open(['route' => 'bikes.store']) !!}
                    @endif
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="collapsed">Datos Generales</a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labeledby="headingOne">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        {!! Form::text('nombre', null, ["class" => "form-control", 'placeholder'=>'Nombre de la bicicleta']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="precio">Precio</label>
                                        {!! Form::text('precio', null, ["class" => "form-control", 'placeholder'=>'Precio']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="modelo">Modelo</label>
                                        {!! Form::text('modelo', null, ["class" => "form-control", 'placeholder'=>'Modelo']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="submodelo">Submodelo</label>
                                        {!! Form::text('submodelo', null, ["class" => "form-control", 'placeholder'=>'Submodelo']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="talla">Talla</label>
                                        {!! Form::text('talla', null, ["class" => "form-control", 'placeholder'=>'Talla']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="rodado">Rodado</label>
                                        {!! Form::text('rodado', null, ["class" => "form-control", 'placeholder'=>'Rodado']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="color">Color</label>
                                        {!! Form::text('color', null, ["class" => "form-control", 'placeholder'=>'Color']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="year">Año</label>
                                        {!! Form::text('year', null, ["class" => "form-control", 'placeholder'=>'Año']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="aplicacion">Aplicación</label>
                                        {!! Form::text('aplicacion', null, ["class" => "form-control", 'placeholder'=>'Aplicación']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="recorrido">Recorrido</label>
                                        {!! Form::text('recorrido', null, ["class" => "form-control", 'placeholder'=>'Recorrido']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="categoria">Categoría</label>
                                        {!! Form::text('categoria', null, ["class" => "form-control", 'placeholder'=>'Categoria']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="codigoAX">Codigo AX</label>
                                        {!! Form::text('codigoAX', null, ["class" => "form-control", 'placeholder'=>'Código AX']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="descAX">Descripción AX</label>
                                        {!! Form::text('descAX', null, ["class" => "form-control", 'placeholder'=>'Descripción AX']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="imagenPrincipal_id">Imagen principal</label>
                                        {!! Form::select('imagenPrincipal_id', $data['listImages'],null, ["class" => "form-control", "placeholder" => "Selecciona una imagen"]) !!}
                                    </div>
                                    {!! Form::submit('Guardar', ["class" => "btn btn-success"]) !!}
                                    <a href="{{ url('adminpanel/bikes') }}" class="btn btn-warning">Cancelar</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="collapsed">Datos Adicionales</a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labeledby="headingTwo">
                                <div class="panel-body"></div>
                            </div>

                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree" class="collapsed">Slider</a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labeledby="headingThree">
                                <div class="panel-body">
                                    <div class="form-inline">
                                        <button id="addSldBtn" class="btn btn-success">Añadir imagen al Slider</button>
                                        {!! Form::select('imgSldAdd', $data['listImages'],null, ["class" => "form-control", "placeholder" => "Selecciona una imagen"]) !!}
                                    </div>
                                    <div id="slider-content">
                                        <ul class="reorder_ul reorder-photos-list">
                                            @if(isset($data['bike']))
                                                @foreach($data['bike']->imagesSlider as $img)
                                                    <li class="ui-sortable-handle col-img" data-id="{{ $img->id }}">
                                                        <i class="fa fa-minus-circle delete" aria-hidden="true"></i>
                                                        <img src="{{ url('/').'/'.$img->ruta }}" class="img">
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                    <button id="saveSldBtn" class="btn btn-info">Actualizar Slider</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour" class="collapsed">Galeria</a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labeledby="headingFour">
                                <div class="panel-body">
                                    <div class="form-inline">
                                        <button id="addGalBtn" class="btn btn-success">Añadir imagen a la Galería</button>
                                        {!! Form::select('imgGalAdd', $data['listImages'],null, ["class" => "form-control", "placeholder" => "Selecciona una imagen"]) !!}
                                    </div>
                                    <div id="gallery-content">
                                        <ul class="reorder_ul reorder-photos-list">
                                            @if(isset($data['bike']))
                                                @foreach($data['bike']->imagesGaleria as $img)
                                                    <li class="ui-sortable-handle col-img" data-id="{{ $img->id }}">
                                                        <i class="fa fa-minus-circle delete" aria-hidden="true"></i>
                                                        <img src="{{ url('/').'/'.$img->ruta }}" class="img">
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                    <button id="saveGalBtn" class="btn btn-info">Actualizar Galería</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::submit('Guardar todos los datos', ["class" => "btn btn-success btn-lg"]) !!}
                    {!! Form::hidden('IDSGal', null, ["id"=>"IDSGal"]) !!}
                    {!! Form::hidden('IDSSld', null, ["id"=>"IDSSld"]) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var urlPanel = "{{ url('/adminpanel/images/') }}";
        var urlPublic = "{{ url('/') }}";
        var liProperties = {class: 'ui-sortable-handle col-img'};
        var idsGal = [];
        var idsSld = [];
        $('#gallery-content ul li').each(function(){
            idsGal.push($(this).data('id'));
        });
        $('#IDSGal').val(idsGal.join());
        $('#slider-content ul li').each(function(){
            idsSld.push($(this).data('id'));
        });
        $('#IDSSld').val(idsSld.join());

        $('#addGalBtn').click(function(e){
            e.preventDefault();
            var id = $('select[name=imgGalAdd]').val();
            $.get(urlPanel+'/'+id, function(data){
                data = JSON.parse(data);
                var imgProperties = {id: 'myID', 'class': 'img', src: urlPublic+'/'+data.ruta};
                var li = $('<li></li>', liProperties);
                li.attr('data-id',data.id);
                li.append('<i class="fa fa-minus-circle delete" aria-hidden="true"></i>');
                $('<img/>', imgProperties).appendTo(li);
                li.appendTo('#gallery-content ul');
            });
        });
        $('#addSldBtn').click(function(e){
            e.preventDefault();
            var id = $('select[name=imgSldAdd]').val(); 
            $.get(urlPanel+'/'+id, function(data){
                data = JSON.parse(data);
                var imgProperties = {'class': 'img', src: urlPublic+'/'+data.ruta};
                var li = $('<li></li>', liProperties);
                li.attr('data-id',data.id);
                li.append('<i class="fa fa-minus-circle delete" aria-hidden="true"></i>');
                $('<img/>', imgProperties).appendTo(li);
                li.appendTo('#slider-content ul');
            });
        });
        $('#saveGalBtn').click(function(e){
            e.preventDefault();
            var ids = [];
            $('#gallery-content ul li').each(function(){
                ids.push($(this).data('id'));
            });
            $('#IDSGal').val(ids.join());
            console.log(ids);
        });
        $('#saveSldBtn').click(function(e){
            e.preventDefault();
            var ids = [];
            $('#slider-content ul li').each(function(){
                ids.push($(this).data('id'));
            });
            $('#IDSSld').val(ids.join());
            console.log(ids);
        });
        $('.col-img .delete').click(function(){
            $(this).parent().remove();
        });
        $("#gallery-content ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
        $("#slider-content ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
    });
</script>
@endsection
