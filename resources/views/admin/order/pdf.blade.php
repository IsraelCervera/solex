<!DOCTYPE>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de pedido</title>

<body>
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
                  <b>Pedido ID:</b> {{$order->code}}<br>
                  <b>Estado de pago:</b> {{$order->payment_status}}<br>
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
                <p>Gracias por comprar en GamingShop, disfrute de su producto.</p>
              </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
    <footer>
        <div id="datos">
            <p id="encabezado">
            </p>
        </div>
    </footer>
</body>

</html>
