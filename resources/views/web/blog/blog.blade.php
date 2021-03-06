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
                                    <li class="breadcrumb-item active" aria-current="page">Publicaciones</li>
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
                    <div class="col-lg-3 order-2 order-lg-1">
                        <div class="blog-sidebar-wrapper">
                            <div class="blog-sidebar mb-30">
                                <div class="sidebar-serch-form">
                                    <form action="#">
                                        <input type="text" class="search-field" placeholder="search here">
                                        <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div> <!-- single sidebar end -->
                            <div class="blog-sidebar mb-20">
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
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="blog-wrapper-inner">
                            <div class="row">

                                @foreach ($posts as $post)
                                <!-- start single blog item -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="blog-item mb-26">

                                        @include('web.blog._blog_thumb')

                                        <div class="blog-content">
                                            <h3><a href="blog-details.html">{{$post->title}}</a></h3>
                                            <div class="blog-meta">
                                                <span class="posted-author">By: Guimer Accesorios y Polarizados</span>
                                                <span class="post-date">{{$post->created_at}}</span>
                                            </div>
                                            <p>{{$post->excerpt}}</p>
                                        </div>
                                        <a href="{{route('web.blog_details', $post)}}">Leer m??s <i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                <!-- end single blog item -->
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- blog main wrapper end -->
        @endsection
