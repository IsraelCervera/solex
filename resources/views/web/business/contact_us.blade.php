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

        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contactanos</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- contact area start -->
        <div class="contact-area pb-34 pb-md-18 pb-sm-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-message">
                            <h2>Contacta con nosotros</h2>
                            <form id="contact-form" action="http://demo.hasthemes.com/galio-v6/galio/assets/php/mail.php" method="post" class="contact-form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="first_name" placeholder="Nombre *" type="text" required>    
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="phone" placeholder="Celular *" type="text" required>   
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="email_address" placeholder="Correo *" type="text" required>    
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="contact_subject" placeholder="Asunto *" type="text">   
                                    </div>
                                <div class="col-12">
                                        <div class="contact2-textarea text-center">
                                            <textarea placeholder="Mensaje *" name="message"  class="form-control2" required=""></textarea>     
                                        </div>   
                                        <div class="contact-btn">
                                            <button class="sqr-btn" type="submit">Enviar mensaje</button> 
                                        </div> 
                                    </div> 
                                    <div class="col-12 d-flex justify-content-center">
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>    
                        </div> 
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-info mt-md-28 mt-sm-28">
                            <h2>Contactanos</h2>
                            <p>{{$business->contact_text}}</p>
                            <ul>
                                <li><i class="fa fa-fax"></i> Dirección : {{$business->address}}</li>
                                <li><i class="fa fa-envelope-o"></i> {{$business->mail}}</li>
                                <li><i class="fa fa-phone"></i> {{$business->phone}}</li>
                                <li><i class="fa fa-map"></i> <p class="text-muted">
                                <a href="{{$business->google_maps_link}}" target="_blank">Google Maps</a>
                                </p></li>
                            </ul>
                            <div class="working-time">
                                <h3>Horario</h3>
                                <p><span>{{$business->hours_of_operation}}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact area end -->

        <!-- map area start -->
        <div class="map-area-wrapper">
            <div class="container">
                    <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=es&amp;q=tienda%20mi%20holguin,%20M%C3%A9rida,%20Yucat%C3%A1n,%20Mexico:97140+(Guimer%20Accesorios%20y%20Polarizados)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.mapsdirections.info/marcar-radio-circulo-mapa/">Dibujar radio en el mapa</a></div>
            </div>
        </div>
        <!-- map area end -->

@endsection