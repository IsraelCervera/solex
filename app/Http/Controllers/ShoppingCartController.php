<?php

namespace App\Http\Controllers;

use App\ShoppingCart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(ShoppingCart $shoppingCart)
    {
        //
    }

    public function edit(ShoppingCart $shoppingCart)
    {
        //
    }

    public function update(Request $request)
    {
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $shopping_cart->my_update($request);
        return back()->with(array('message' => 'Producto actualizado con exito'));
    }

    public function destroy(ShoppingCart $shoppingCart)
    {
        //
    }
}
