@extends('layouts.admin')
@section('title','Detalles de pedido')
@section('styles')

@endsection
@section('create')

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Detalles de pedido
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @if (auth()->check())
                @if (auth()->user()->rol=='Administrador')
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('orders.index')}}">Pedidos</a></li>
                @endif
                @endif
                <li class="breadcrumb-item active" aria-current="page">Detalles de Pedido</li>
            </ol>
        </nav>
    </div>

        <div class="row">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> {{$providers->name}}, Inc.
                    <small class="float-right">{{$order->order_date}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  De
                  <address>
                    <strong>{{$providers->name}}, Inc.</strong>
                    <br>{{$providers->address}}<br>
                    Quintana Roo, CP 77800<br>
                    Phone: {{$providers->phone}}<br>
                    Email: {{$providers->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Para
                  <address>
                    <strong>{{$user->name}} {{$user->lastname}}</strong>
                    <br>{{$user->address}}<br>
                    {{$user->state}}, {{$user->cp}}<br>
                    Phone: {{$user->phone}}<br>
                    Email: {{$user->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Pedido ID:</b> {{$order->id}}<br>
                  <b>Estado de pago:</b> {{$order->payment_status()}}<br>
                  <b>Estado de envio:</b> {{$order->shipping_status()}}<br>
                  <b>Fecha de pedido:</b> {{$order->order_date}}
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>Total($MX)</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $detail)
                    <tr>
                      <td>{{$detail->product->name}}</td>
                      <td>{{$detail->quantity}}</td>
                      <td>{{$detail->price}}</td>
                      <td>$MX {{$detail->total()}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Metodo de pago:</p>
                  <img src="{{asset('img/payment-platforms/paypal.jpg')}}" alt="PayPal">
                  
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Paga con PayPal la manera más segura.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$MX {{$order->subtotal()}}</td>
                      </tr>
                      <tr>
                        <th>Impuestos (18%)</th>
                        <td>$MX {{$order->total_impuesto()}}</td>
                      </tr>
                      <tr>
                        <th>Envio:</th>
                        <td>$0.00</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$MX {{$order->total()}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right" onclick="location.href='{{route('orders.ticket', $order)}}'"><i class="far fa-credit-card"></i> Generar Ticket
                  </button>
                  <button type="button" class="btn btn-primary float-right" onclick="location.href='{{route('orders.pdf', $order)}}'" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generar PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
</div>
@endsection
@section('scripts')
<script src="{{ asset('melody/js/profile-demo.js') }}"></script>
<script src="{{ asset('melody/js/data-table.js') }}"></script>
@endsection
