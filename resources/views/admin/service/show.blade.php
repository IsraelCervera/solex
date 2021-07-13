@extends('layouts.admin')
@section('title','Información del producto')
@section('styles')
<link rel="stylesheet" href="{{ asset('estilos/estilos.css')}}">

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
            {{$product->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @if (auth()->check())
                @if (auth()->user()->rol=='Administrador')
                <li class="breadcrumb-item"><a href="">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                @endif
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">

                                <img src="{{asset('image/'.$product->image)}}" alt="profile" class="img-lg  mb-3" />
                                {{--  <p>Nombre de proveedor. </p>  --}}


                                <h3>{{$product->name}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>


                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                        Status
                                    </span>
                                    <span class="float-right text-muted">
                                        {{$product->status}}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Proveedor
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="{{route('providers.show',$product->provider->id)}}">
                                        {{$product->provider->name}}
                                        </a>
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Categoría
                                    </span>
                                    <span class="float-right text-muted">
                                        {{--  PRODUCTOS POR CATEGORIA  --}}
                                        <a href="">
                                            {{$product->category->name}}
                                        </a>
                                    </span>
                                </p>

                            </div>
                            @if (auth()->check())
                            @if (auth()->user()->rol=='Administrador')

                            <button class="btn btn-primary btn-block">{{$product->status}}</button>
                            @if ($product->status == 'ACTIVE')
                            <a href="{{route('change.status.products', $product)}}" class="btn btn-success btn-block">Activo</a>
                            @else
                            <a href="{{route('change.status.products', $product)}}" class="btn btn-danger btn-block">Desactivado</a>
                            @endif
                            @endif
                            @endif
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información de producto</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="form-group col-md-6">
                                        <hr>
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Stock</strong>
                                        <p class="text-muted">
                                            {{$product->stock}}
                                        </p>
                                        <hr>
                                        <strong>
                                            <i class="fas fa-mobile mr-1"></i>
                                            Descripción corta</strong>
                                        <p class="text-muted">
                                            {{$product->description}}
                                        </p>
                                        <hr>
                                        <strong>
                                            <i class="fas fa-mobile mr-1"></i>
                                            Descripción larga</strong>
                                        <p class="text-muted">
                                            {{$product->description_long}}
                                        </p>
                                        <hr>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong>
                                            <i class="fas fa-mobile mr-1"></i>
                                            Precio de venta</strong>
                                        <p class="text-muted">
                                            {{$product->sell_price}}
                                        </p>
                                        <hr>
                                        <p class="text-muted">
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    @if (auth()->check())
                    @if (auth()->user()->rol=='Administrador')
                    <a href="{{route('products.index')}}" class="btn btn-primary float-right">Lista de Productos</a>
                    @endif
                    @endif
                    <a href="{{route('home')}}" class="btn btn-primary float-right">Regresar al home</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
<script src="{{ asset('melody/js/profile-demo.js') }}"></script>
<script src="{{ asset('melody/js/data-table.js') }}"></script>
@endsection
