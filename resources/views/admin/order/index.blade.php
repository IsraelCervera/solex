@extends('layouts.admin')
@section('title','Gestión de pedidos')
@section('styles')
<link rel="stylesheet" href="{{ asset('editable/jqueryui-editable/css/jqueryui-editable.css')}}">
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
      }
</style>

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Pedidos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pedidos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Pedidos</h4>
                        {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                    </div>

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Pedido</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Total</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>
                                        <a 
                                        href="#"
                                        id="username"
                                        class="editable" 
                                        data-type="select"
                                        data-pk="{{$order->id}}"
                                        data-url="{{url("/orders_update/$order->id")}}"
                                        data-title="Estado"
                                        data-value="{{ $order->shipping_status }}" 
                                        >{{$order->shipping_status()}}
                                        </a>
                                    </td>
                                    <td>{{$order->subtotal}}</td>
                                    <td><a href="{{route('orders.show', $order)}}" class="check-btn sqr-btn ">Ver detalles</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$categories->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('melody/js/data-table.js') }}"></script>
<script src="{{ asset('editable/jqueryui-editable/js/jqueryui-editable.min.js') }}"></script>
<script>
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.ajaxOptions = {type: 'GET'};

    $(document).ready(function() {
    $('.editable').editable({
        source:[
        {value: "PENDING", text: "PENDIENTE"},
        {value: "APPROVED", text: "APROBADO"},
        {value: "CANCELED", text: "CANCELADO"},
        {value: "DELIVERED", text: "ENTREGADO"},
        ]
    });
});
</script>
@endsection
