@extends('layouts.admin')
@section('title','Información de la empresa')
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
            {{$business->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @if (auth()->check())
                @if (auth()->user()->rol=='Administrador')
                <li class="breadcrumb-item"><a href="">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('businesses.index')}}">Empresa</a></li>
                @endif
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{$business->name}}</li>
            </ol>
        </nav>
    </div>

<div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body d-flex flex-column">
                  <h4 class="card-title">
                    <i class="fas fa-chart-pie"></i>
                    Información de la empresa
                  </h4>
                  <div class="flex-grow-1 d-flex flex-column justify-content-between">

                    <strong><i class="fas fa-file-signature mr-1"></i>Nombre</strong>
                            <p class="text-muted">
                                {{$business->name}}
                            </p>
                    <strong><i class="fas fa-align-left mr-1"></i>Acerca de</strong>
                            <p class="text-muted">
                                {{$business->description}}
                            </p>
                    <strong><i class="fas fa-align-left mr-1"></i>Descripción</strong>
                            <p class="text-muted">
                                {{$business->description_long}}
                            </p>
                            <strong><i class="fas fa-envelope mr-1"></i>Correo</strong>
                            <p class="text-muted">
                                {{$business->mail}}
                            </p>
                            <strong><i class="fas fa-mobile mr-1"></i>Celular</strong>
                            <p class="text-muted">
                                {{$business->phone}}
                            </p>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body d-flex flex-column">
                  <h4 class="card-title">
                    <i class="fas fa-chart-pie"></i>
                    Información de contacto
                  </h4>
                  <div class="flex-grow-1 d-flex flex-column">

                    <strong><i class="fas fa-file-signature mr-1"></i>Contacta con nosotros</strong>
                            <p class="text-muted">
                                {{$business->contact_text}}
                            </p>
                    <strong><i class="fas fa-align-left mr-1"></i>Horario</strong>
                            <p class="text-muted">
                                {{$business->hours_of_operation}}
                            </p>
                    <strong><i class="fas fa-align-left mr-1"></i>Enlace de Google Maps</strong>
                            <p class="text-muted">
                                <a href="{{$business->google_maps_link}}" target="_blank">{{$business->google_maps_link}}</a>
                            </p>

                  </div>
                </div>
              </div>
            </div>
          </div>
                <div class="card-footer text-muted">
                    @if (auth()->check())
                    @if (auth()->user()->rol=='Administrador')
                    <a href="{{route('businesses.index')}}" class="btn btn-primary float-right">Lista de Productos</a>
                    @endif
                    @endif
                    <a href="{{route('home')}}" class="btn btn-primary float-right">Regresar al home</a>
                </div>

</div>
@endsection
@section('scripts')
<!-- Custom js for this page-->

  <!-- End custom js for this page-->
<script src="{{ asset('melody/js/profile-demo.js') }}"></script>
<script src="{{ asset('melody/js/data-table.js') }}"></script>
@endsection