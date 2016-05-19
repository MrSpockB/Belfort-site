@extends('layouts.master')
@section('title')
	{{ "Carrito" }}
@stop
@section('body-classes')
	{{ "minimalist-header header-classic"}}
@stop

@section('content')
	<div class="content_wrapper clearfix">
		<div class="sections_group">
			<div class="entry-content">
				<div class="section">
					<div class="section_wrapper">
						<div class="the_content_wrapper">
							<div class="woocommerce">
							@if(count($cart))
								<form action="#">
									<table class="shop_table cart">
										<thead>
											<tr>
												<th class="product-thumbnail" >&nbsp;</th>
												<th class="product-name" >Producto</th>
												<th class="product-price" >Precio</th>
												<th class="product-quantity" >Cantidad</th>
												<th class="product-subtotal" >Total</th>
												<th class="product-remove" >&nbsp;</th>
											</tr>
										</thead>
										<tbody>
											@foreach($cart as $item)
											<tr>
												<td class="cart_product">
													<a href=""><img src="images/cart/one.png" alt=""></a>
												</td>
												<td class="cart_description">
													<h4><a href="">{{$item->name}}</a></h4>
												</td>
												<td class="cart_price">
													<p>${{$item->price}}</p>
												</td>
												<td class="cart_quantity">
													<div class="cart_quantity_button">
														<a class="cart_quantity_up" href=""> + </a>
														<input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2">
														<a class="cart_quantity_down" href=""> - </a>
													</div>
												</td>
												<td class="cart_total">
													<p class="cart_total_price">${{$item->subtotal}}</p>
												</td>
												<td class="cart_delete">
													<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</form>
							</div>
							@else
								<div class="alert alert alert_warning">
									<div class="alert_icon"><i class="icon-lamp"></i></div>
									<div class="alert_wrapper">Tu carrito esta vacío.</div>
									<a class="close" href="#"><i class="icon-cancel"></i></a>
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop