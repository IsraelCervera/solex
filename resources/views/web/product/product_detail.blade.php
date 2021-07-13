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
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('web.product')}}">Productos</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detalles del producto</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- product details wrapper start -->
        <div class="product-details-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="product-large-slider mb-20 slick-arrow-style_2">
                                        <div class="pro-large-img img-zoom">
                                            <img src="{{asset('image/'.$product->image)}}" alt="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product-details-des mt-md-34 mt-sm-34">
                                        <h3><a href="product-details.html">{{$product->name}}</a></h3>
                                        <div class="ratings">
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                        </div>
                                        <div class="availability mt-10">
                                            <h5>Disponibilidad:</h5>
                                            <span>{{$product->stock}} en stock</span>
                                        </div>
                                        <div class="pricebox">
                                            <span class="regular-price">${{$product->sell_price}}</span>
                                        </div>
                                        <p>{{$product->description}}</p>
                                            <div class="blog-sharing text-center mt-34 mt-sm-34">
                                            <h4>Pide el producto aquí:</h4>
                                            <a href="https://www.facebook.com/GuimerAccesoriosyPolarizados" target="_blank"><i class="fa fa-facebook"></i></a>
                                            <a href="https://wa.me/{{$business->phone}}?text=Me%20interesa%20el%20producto%20con%20nombre%20{{$product->name}}." target="_blank"><i class="fa fa-whatsapp"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews mt-34">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-toggle="tab">Descripción</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <div class="tab-one">
                                                    <p>{{$product->description}}<br><br>{{$product->description_long}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!-- product details reviews end --> 

                        
                    </div>

                    <!-- sidebar start -->
                    <div class="col-lg-3">
                        <div class="shop-sidebar-wrap fix mt-md-22 mt-sm-22">
                            <!-- featured category start -->
                            <div class="sidebar-widget mb-22">
                                <div class="section-title-2 d-flex justify-content-between mb-28">
                                    <h3>Recomendados</h3>
                                    <div class="category-append"></div>
                                </div> <!-- section title end -->
                                @foreach($products as $product)
                                <div class="category-carousel-active row" data-row="4">
                                    <div class="col">
                                        <div class="category-item">
                                            <div class="category-thumb">
                                                <a href="{{route('web.product_details', $product)}}">
                                                    <img src="{{asset('image/'.$product->image)}}" alt="">
                                                </a>
                                            </div>
                                            <div class="category-content">
                                                <h4><a href="{{route('web.product_details', $product)}}">{{$product->name}}</a></h4>
                                                <div class="price-box">
                                                    <div class="regular-price">
                                                        {{$product->sell_price}}
                                                    </div>
                                                </div>
                                                <div class="ratings">
                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                    <span class="good"><i class="fa fa-star"></i></span>
                                                    <div class="pro-review">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end single item -->
                                    </div> <!-- end single item column -->
                                </div>
                                @endforeach
                            </div>
                            <!-- featured category end -->

                        </div>
                    </div>
                    <!-- sidebar end -->
                </div>
            </div>
        </div>
        <!-- product details wrapper end -->


         @endsection