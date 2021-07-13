@extends('layout')

@section('styles')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('galio/assets/css/bootstrap.min.css')}}">
    <!-- Font-Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('galio/assets/css/font-awesome.min.css')}}">
    <!-- helper class css -->
    <link rel="stylesheet" href="{{ asset('galio/assets/css/helper.min.css')}}">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('galio/assets/css/plugins.css')}}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('galio/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('galio/assets/css/skin-default.css')}}" id="galio-skin">

@section('contenido')
        <div class="col-lg-12 col-md-12">
                                    
                                        
            <div class="myaccount-content">
                <h3 class="text-dark">Pedidos</h3>
                <div class="myaccount-table table-responsive text-center">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Pedido</th>
                                <th>Fecha</th>
                                <th>Estado de envio</th>
                                <th>Estado de pago</th>
                                <th>Total</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                            @forelse ($orders as $key => $order)
                            <tr>
                                <td><a href="" class="check-btn sqr-btn ">{{$order->id}}</a></td>
                                <td><a href="" class="check-btn sqr-btn ">{{$order->order_date}}</a></td>
                                <td><a href="" class="check-btn sqr-btn ">{{$order->shipping_status()}}</a></td>
                                <td><a href="" class="check-btn sqr-btn ">{{$order->payment_status()}}</a></td>
                                <td><a href="" class="check-btn sqr-btn ">$MX {{$order->total()}}</a></td>
                                <td><a href="{{route('orders.show', $order)}}" class="check-btn sqr-btn ">View</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-light">NO HAY PEDIDOS.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection