@extends('layouts.master')
@section('title')
	{{ "Bikes"}}
@stop
@section('body-classes')
	{{ "minimalist-header woocommerce with_aside aside_left"}}
@stop
@section('content')
	<div class="content_wrapper clearfix">
		<div class="sections_group">
			<div class="section">
				<div class="section_wrapper clearfix">
					<div class="items_group clearfix">
						<div class="column one woocommerce-content">
							<div class="shop-filters">
								<p>Mostrando {{ $bikes->firstItem() }}-{{ $bikes->lastItem() }} de {{ $bikes->total() }} resultados</p>
							</div>
							<div class="products_wrapper isotope_wrapper">
								<div class="yit-wcan-container">
									<ul class="products grid col-4">
										@foreach ($bikes as $bike)
										    <li class="product">
										    	<div class="hover_box hover_box_product">
										    		<a href="{{ url('/bikes/'.$bike->slug) }}">
										    			<div class="hover_box_wrapper">
										    				<img class="visible_photo scale-with-grid" src="{{asset($bike->imagenPrincipal->ruta)}}" alt="">
										    			</div>
										    		</a>
										    	</div>
										    	<div class="desc">
										    		<h4><a href="{{ url('/bikes/'.$bike->slug) }}">{{ $bike->nombre }}</a></h4>
										    		<span class="price">
										    			<span class="amount">${{ number_format($bike->precio, 2) }}</span>
										    		</span>
										    	</div>
										    </li>
										@endforeach
									</ul>	
								</div>
							</div>
							<div class="colum one pager_wrapper">
								<div class="pager">
									<div class="pages">
										{!! $bikes->links() !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sidebar four columns"></div>
	</div>
@stop