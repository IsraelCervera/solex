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
                                    <li class="breadcrumb-item active" aria-current="page">Detalles de la publicación</li>
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
                <div class="row">
                    <div class="col-lg-3 order-2">
                        <div class="blog-sidebar-wrapper mt-md-34 mt-sm-30">
                            <div class="blog-sidebar mb-30">
                                <div class="sidebar-serch-form">
                                    <form action="#">
                                        <input type="text" class="search-field" placeholder="search here">
                                        <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div> <!-- single sidebar end -->
                            <div class="blog-sidebar mb-24">
                                <h4 class="title mb-30">Publicaciones recientes</h4>
                                @foreach($posts as $post)
                                <div class="recent-post mb-20">
                                    <div class="recent-post-thumb">
                                        <a href="{{route('web.blog_details', $post)}}">
                                            <img src="{{asset('slug/'.$post->slug)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="recent-post-des">
                                        <span><a href="{{route('web.blog_details', $post)}}">{{$post->title}}</a></span>
                                        <span class="post-date">{{$post->created_at}}</span>
                                    </div>
                                </div> <!-- end single popular item -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 order-1">
                        <div class="blog-wrapper-inner">
                            <div class="row blog-content-wrap">
                                <!-- start single blog item -->
                                <div class="col-lg-12">
                                    <div class="blog-item mb-30">
                                        <div class="blog-thumb img-full fix">
                                            <div class="blog-gallery-slider slick-arrow-style_2">
                                                <div class="blog-single-slide">
                                                    <img src="{{asset('slug/'.$post->slug)}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-details">
                                                <h3 class="blog-heading">{{$post->title}}</h3>
                                                <div class="blog-meta">
                                                    <a class="author"><i class="icon-people"></i> Guimer Accesorios y Polarizados -</a>
                                                    <a class="post-time"><i class="icon-calendar"></i>{{$post->created_at}}</a>
                                                </div>
                                                <blockquote><p>{{$post->body}}</p></blockquote> 
                                            </div>
                                        </div>
                                        <div class="blog-sharing text-center mt-34 mt-sm-34">
                                            <h4>Contactanos:</h4>
                                            <a href="https://www.facebook.com/GuimerAccesoriosyPolarizados" target="_blank"><i class="fa fa-facebook"></i></a>
                                            <a href="https://wa.me/{{$business->phone}}?text=Me%20interesa%20la%20publicación%20que%20hiciste%20con%20nombre%20{{$post->title}}." target="_blank"><i class="fa fa-whatsapp"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end single blog item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog main wrapper end -->

         @endsection
