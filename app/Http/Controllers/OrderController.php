<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Provider;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class OrderController extends Controller
{

    function __construct()
    {
       $this->middleware('auth', ['except' => ['show']]);
    }

    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $providers = Provider::firstOrFail();
        $user = $order->user;
        $details = $order->order_details;
        return view('admin.order.show', compact('order', 'providers', 'user', 'details'));
    }

    public function orders_update(Request $request, $id){
        $order = Order::find($id);
        $order->update([
            'shipping_status' => $request->value,
        ]);
        return $request->value;
    }

    public function pdf(Order $order)
    {
        $providers = Provider::firstOrFail();
        $user = $order->user;
        $details = $order->order_details;
        $pdf = PDF::loadView('admin.order.pdf', compact('order', 'details', 'providers', 'user'));
        return $pdf->download('Reporte_de_pedido_'.$order->id.'.pdf');
    }

    public function ticket(Order $order)
    {
        $providers = Provider::firstOrFail();
        $user = $order->user;
        $details = $order->order_details;
        $pdf = PDF::loadView('admin.order.ticket', compact('order', 'details', 'providers', 'user'))->
        setPaper(array(0,0,104,250));
        return $pdf->download('Ticket_de_pedido_'.$order->id.'.pdf');
    }
}
