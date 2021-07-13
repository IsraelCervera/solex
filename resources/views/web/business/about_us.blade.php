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
                                    <li class="breadcrumb-item active" aria-current="page">Acerca de</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- about wrapper start -->
        <div class="about-us-wrapper pt-4">
            <div class="container">
                <div class="row">
                    <!-- About Text Start -->
                    <div class="col-lg-6">
                        <div class="about-text-wrap">
                            <h2>Acerda de nosotros</h2>
                            <p>{{$business->description}}<br><br></p>
                        </div>
                        <div class="about-text-wrap">
                            <h2>Descripción</h2>
                            <p>{{$business->description_long}}<br><br></p>
                        </div>
                    </div>
                    <!-- About Text End -->
                    <!-- About Image Start -->
                    <div class="col-lg-5 ml-auto">
                        <div class="about-image-wrap mt-md-26 mt-sm-26">
                            <img src="{{asset('estilos/images/logo.png')}}" alt="About" />
                        </div>
                    </div>
                    <!-- About Image End -->
                </div>
            </div>
        </div>
        <!-- about wrapper end -->


        <!-- choosing area start -->
        <div class="choosing-area pt-28">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title-box text-center mb-30">
                            <h3>¿Porque elegirnos?</h3>
                        </div>
                    </div>
                </div> <!-- section title end -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-choose-item text-center mb-md-30 mb-sm-30">
                            <i class="fa fa-globe"></i>
                            <h4>Precios bajos</h4>
                            <p>Los precios de los productos y servicios son los más bajos del estado.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-choose-item text-center mb-md-30 mb-sm-30">
                            <i class="fa fa-plane"></i>
                            <h4>Trabajos rápidos</h4>
                            <p>Los trabajos que realizamos son en tiempo y forma para satisfacer tus necesidades.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-choose-item text-center mb-md-30 mb-sm-30">
                            <i class="fa fa-comments"></i>
                            <h4>Clientes contentos</h4>
                            <p>Nuestros clientes quedan felices con los trabajos realizados.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- choosing area end -->



@endsection