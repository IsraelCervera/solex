@extends('layout')
@section('meta_description')
@section('title')
@section('styles')
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
        
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h2>Detalles de envio</h2>
                            <div class="billing-form-wrap">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="f_name" class="required">Nombres</label>
                                                <input type="text" id="f_name" placeholder="Nombres" required />
                                            </div>
                                        </div>
        
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="l_name" class="required">Apellidos</label>
                                                <input type="text" id="l_name" placeholder="Apellidos" required />
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="single-input-item">
                                        <label for="email" class="required">Email</label>
                                        <input type="email" id="email" placeholder="Email" required />
                                    </div>
        
                                    <div class="single-input-item text-dark">
                                        <label for="country" class="required">Estado</label>
                                        <select name="country nice-select" id="country">
                                            <option value="QuintanaRoo" class="text-dark">Quintana Roo</option>
                                            <option value="Yucatan" class="text-dark">Yucatan</option>
                                            <option value="Campeche" class="text-dark">Campeche</option>
                                            <option value="Oaxaca" class="text-dark">Oaxaca</option>
                                            <option value="Chiapas" class="text-dark">Chiapas</option>
                                            <option value="Morelos" class="text-dark">Morelos</option>
                                            <option value="Hidalgo" class="text-dark">Hidalgo</option>
                                            <option value="Puebla" class="text-dark">Puebla</option>
                                            <option value="Mexico" class="text-dark">Ciudad Mexico</option>
                                            <option value="Jalisco" class="text-dark">Jalisco</option>
                                        </select>
                                    </div>
        
                                    <div class="single-input-item">
                                        <label for="street-address" class="required pt-20">Dirección</label>
                                        <input type="text" id="street-address" placeholder="Dirección" required />
                                    </div>
        
                                    <div class="single-input-item">
                                        <input type="text"  placeholder="Dirección 2 (Opcional)" />
                                    </div>
        
                                    <div class="single-input-item">
                                        <label for="town" class="required">Ciudad</label>
                                        <input type="text" id="town"  placeholder="Ciudad" required />
                                    </div>
        
                                    <div class="single-input-item">
                                        <label for="postcode" class="required">Codigo postal</label>
                                        <input type="text" id="postcode"  placeholder="Codigo postal" required />
                                    </div>
        
                                    <div class="single-input-item">
                                        <label for="phone">Número telefonico</label>
                                        <input type="text" id="phone"  placeholder="Número telefonico" />
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    
        
                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details mt-md-26 mt-sm-26">
                            <h2>Detalles de compra</h2>
                            <div class="order-summary-content mb-sm-4">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Productos</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($shopping_cart->shopping_cart_details as $shopping_cart_detail)
                                            <tr>
                                            <td><a class="text-dark" href="{{ route('products.show', $shopping_cart_detail->product->id) }}">
                                                {{ $shopping_cart_detail->product->name }}</a>
                                            </td>
                                            <td>$MX {{$shopping_cart_detail->total()}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Envio</td>
                                                <td class="d-flex justify-content-center">
                                                    <ul class="shipping-type">
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="flatrate" name="shipping" class="custom-control-input" checked />
                                                                <label class="custom-control-label" for="flatrate">Envio rápido: $MX 100.00</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="freeshipping" name="shipping" class="custom-control-input" />
                                                                <label class="custom-control-label" for="freeshipping">Envio gratis: $MX 0</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Total Amount</td>
                                                <td><strong>$MX {{$shopping_cart->total_price()}}</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                                <form method="POST" action="{{ route('pay') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                <div class="order-payment-method">
                                    @foreach ($paymentPlatforms as $paymentPlatform)
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="{{$paymentPlatform->name}}payment" name="payment_platform" value="{{$paymentPlatform->id}}" class="custom-control-input" required/>
                                                <label class="custom-control-label" for="{{$paymentPlatform->name}}payment">{{$paymentPlatform->name}} <img src="{{$paymentPlatform->image}}" class="img-fluid paypal-card" alt="Paypal" /></label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="{{$paymentPlatform->name}}">
                                            <p>Paga via PayPal, la manera más segura.</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox mb-14">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label" for="terms">He leído y acepto los términos y condiciones del sitio web <a
                                                href="index.html">terms and conditions.</a></label>
                                        </div>
                                        <button type="submit" class="check-btn sqr-btn">Realizar compra</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout main wrapper end -->
@endsection
@section('scripts')
<!--All jQuery, Third Party Plugins & Activation (main.js) Files-->
    <script src="{{ asset('galio/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <!-- Jquery Min Js -->
    <script src="{{ asset('galio/assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <!-- Popper Min Js -->
    <script src="{{ asset('galio/assets/js/vendor/popper.min.js') }}"></script>
    <!-- Bootstrap Min Js -->
    <script src="{{ asset('galio/assets/js/vendor/bootstrap.min.js') }}"></script>
    <!-- Plugins Js-->
    <script src="{{ asset('galio/assets/js/plugins.js') }}"></script>
    <!-- Ajax Mail Js -->
    <script src="{{ asset('galio/assets/js/ajax-mail.js') }}"></script>
    <!-- Active Js -->
    <script src="{{ asset('galio/assets/js/main.js') }}"></script>
    <!-- Switcher JS [Please Remove this when Choose your Final Projct] -->
    <script src="{{ asset('galio/assets/js/switcher.js') }}"></script>
@endsection