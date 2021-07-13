<?php

namespace App\Http\Controllers;

use App\ShoppingCartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ShoppingCart;
use App\Product;

class ShoppingCartDetailController extends Controller
{

    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $shopping_cart->shopping_cart_details()->create([
            'quantity' => $request->quantity,
            'price' => $product->sell_price,
            'product_id' => $product->id,
        ]);
        return back()->with(array('message' => 'Producto añadido con exito'));
    }

    public function update(Request $request, ShoppingCartDetail $shoppingCartDetail)
    {
        
    }

    public function destroy(ShoppingCartDetail $shoppingCartDetail)
    {
        $shoppingCartDetail->delete();
        return back()->with(array('message' => 'Producto eliminado con exito'));
    }
}
