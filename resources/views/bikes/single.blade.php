@extends('layouts.master')
@section('title')
	{{ $bike->nombre }}
@stop
@section('body-classes')
	{{ "layout-full-width nice-scroll minimalist-header"}}
@stop

@section('css')
	<link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">

@stop

@section('scripts')
	<script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
@stop

@section('content')
	<div class="content_wrapper clearfix bike-content">
		<h3 class="bike-title">{{ $bike->nombre }}</h3>
		<div id="sliderCarousel" class="owl-carousel owl-theme">
			@foreach($bike->imagesSlider as $img)
				<div class="img-wrapper" style="background-image: url({{ url('/').'/'.$img->ruta }});">
			    	<img src="{{ url('/').'/'.$img->ruta }}" class="img">
			    </div>
			@endforeach
		</div>
		<div id="galleryCarousel" class="owl-carousel owl-theme">
			@foreach($bike->imagesSlider as $img)
			    <img src="{{ url('/').'/'.$img->ruta }}" class="img">
			@endforeach
		</div>
		<div id="placeholder"></div>
		<div class="container">
			<div class="woocommerce">
				<div class="single-product">
					<div class="product">
						<div class="product_wrapper clearfix">
							<div class="column one-second product_image_wrapper">
								<div class="images">
									<div class="image_frame scale-with-grid">
										<div class="image_wrapper">
											<a href="#" class="woocommercer-main-image zoom">
												<div class="mask"></div>
												<img src="{{ url('/').'/'.$bike->imagenPrincipal->ruta }}" alt="">
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="column one-second summary entry-summary">
								<h1 class="product_title entry-title">{{ strtoupper($bike->nombre) }}</h1>
								<div>
									<p class="price"><span class="amount">${{ number_format($bike->precio, 2) }}</span></p>
								</div>
								<form method="POST" action="{{url('carro')}}">
									<input type="hidden" name="product_id" value="{{$bike->id}}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button type="submit" class="btn btn-fefault add-to-cart">
										<i class="fa fa-shopping-cart"></i>
										Añadir al carrito
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		jQuery(document).ready(function()
		{
		  jQuery("#sliderCarousel").owlCarousel({
		  	items: 1,
		  	nav: true,
		  	dots: false,
		  	navText: ["<i class=\"fa fa-chevron-left\"></i>","<i class=\"fa fa-chevron-right\"></i>"]
		  });
		  jQuery("#galleryCarousel").owlCarousel({
		  	items: 6,
		  	margin: 15
		  });
		});
	</script>
@stop