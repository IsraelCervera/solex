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
                                    <li class="breadcrumb-item active" aria-current="page">Productos</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- blog main wrapper start -->
        <div class="blog-main-wrapper">
            <div class="container">
                    <!-- product single list item start -->
                    @foreach ($products as $product)
                                    <div class="product-list-item mb-30">
                                        <div class="product-thumb">
                                            <a href="{{route('web.product_details', $product)}}">
                                                <img src="{{asset('image/'.$product->image)}}" class="img-pri" alt="">
                                            </a>
                                            <div class="product-label">
                                                <span>new</span>
                                            </div>
                                        </div>
                                        <div class="product-list-content">
                                            <h3><a href="{{route('web.product_details', $product)}}">{{$product->name}}</a></h3>
                                            <div class="ratings">
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </div>
                                            <div class="pricebox">
                                                <span class="regular-price">${{$product->sell_price}}</span>
                                            </div>
                                            <p>{{$product->description}}</p>
                                            <div class="product-list-action-link">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                </div>
            </div>
        <!-- blog main wrapper end -->
        @endsection
