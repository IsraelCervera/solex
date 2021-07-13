@extends('layout')
@section('contenido')
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('galio/assets/css/style.css')}}">
<style>
  h2{
    color: black;
    text-align: right;
    position:relative;
    left: 0px;
    bottom: 0px;
}
  button.btn-success{
    position:relative;
    left: 1100px;
    bottom: 0px;
}
  input[type="number"]{
    background: transparent;
    border: none;
}
</style>
                    <form method="POST" action="{{ route('shopping_cart.update') }}" enctype="multipart/form-data">
                            {!! method_field('PUT') !!}
                            {{ csrf_field() }}
        <table class="table">
          <thead>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio $MX</th>
            <th>Total</th>
            <th>Acciones</th>
          </thead>
          <tbody>
            @foreach ($shopping_cart->shopping_cart_details as $shopping_cart_detail)
            <tr>
              <td><a class="text-dark" href="{{ route('products.show', $shopping_cart_detail->product->id) }}">
                {{ $shopping_cart_detail->product->name }}</a>
              </td>
              <td>
                  <input type="number" name="quantity[]" value="{{$shopping_cart_detail->quantity}}">
              </td>
              <td>{{$shopping_cart_detail->product->sell_price}}</td>
              <td>{{$shopping_cart_detail->total()}}</td>
              <td>
                <button class="btn btn-danger"><a class="text-light" href="{{ route('shopping_cart_details.destroy', $shopping_cart_detail) }}">DELETE</a></button>
             </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <div class="cart-update-option d-block d-md-flex justify-content-between">
                            <div class="apply-coupon-wrapper">
                                
                                    <button class="btn btn-success" type="submit">UPDATE CART</button>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h3>Compra</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr class="total">
                                            <td>Total</td>
                                            <td class="total-amount">$MX {{$shopping_cart->total_price()}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a href="{{ route('web.checkout') }}" class="sqr-btn d-block text-light">PROCEDER A PAGAR</a>
                        </div>
                    </div>
                </div>
@endsection