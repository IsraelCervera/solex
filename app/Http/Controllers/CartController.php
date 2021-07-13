<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\ShoppingCart;
use App\Product;

class CartController extends Controller
{
    public function add(Request $request){

    	$products = Product::find($request->product_id);
    	Cart::Add(
    		$products->id,
    		$products->name,
    		$products->sell_price,
    		1,
    		array("image"=>$products->image)
    	);
    	return redirect()->back()->with(array('message' => 'Producto añadido con exito'));
    }

    public function cart(Request $request){
    	$params = [
    		'title' => 'Shopping Cart Checkout',
    	];
    	return view('checkout')->with($params);
    }

    public function removeitem(Request $request){
    	//$products = Product::where('id', $request->product_id)->firstOrFail();
    	Cart::remove([
    		'id' => $request->id,
    	]);
    	return redirect()->back()->with(array('message' => 'Producto eliminado con exito del carrito'));
    }

    public function clear(){
    	Cart::clear();
    	return redirect()->back()->with(array('message' => 'Producto eliminado con exito del carrito'));
    }
}
