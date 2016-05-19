<?php

namespace App\Http\Controllers;

use App\Bike;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;

class CartController extends Controller
{
    public function addToCart()
    {
        $bike_id = Request::get('product_id');
        $bike = Bike::find($bike_id);
        Cart::add(array('id'=>$bike_id, 'name'=> $bike->nombre, 'qty'=> 1, 'price' => $bike->precio, ['img' => $bike->imagenPrincipal->ruta]));
        $cart = Cart::content();
        return view('pages.carro', array('cart'=>$cart, 'title'=> 'Producto Agregado'));
    }
    public function viewCart()
    {
        $cart = Cart::content();
        return view('pages.carro', array('cart'=>$cart, 'title'=>'Carrito'));
    }
    public function deleteCart()
    {
        Cart::destroy();
        $cart = Cart::content();
        return view('pages.carro', array('cart'=>$cart, 'title'=>'Carrito'));
    }
}