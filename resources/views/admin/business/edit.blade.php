@extends('layouts.admin')
@section('title','Editar empresa')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Edición de empresa
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('businesses.index')}}">Empresa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de empresa</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edición de empresa</h4>
                    </div>

                    <form method="POST" action="{{ route('businesses.update', $business) }}" enctype="multipart/form-data">
                        {!! method_field('PUT') !!}
                        {{ csrf_field() }}
                        @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif


                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" name="name" id="name" value="{{$business->name}}" class="form-control" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Acerca de</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{$business->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="description_long">Descripción</label>
                        <textarea class="form-control" name="description_long" id="description_long" rows="3">{{$business->description_long}}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="mail">Correo</label>
                      <input type="email" name="mails" id="mail" value="{{$business->mail}}" class="form-control" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <textarea class="form-control" name="address" id="address" rows="3">{{$business->address}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="phone">Celular</label>
                        <input type="number" name="phone" id="phone" value="{{$business->phone}}" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>

                    <div class="form-group">
                      <label for="hours_of_operation">Horario</label>
                      <input type="text" name="hours_of_operation" id="hours_of_operation" value="{{$business->hours_of_operation}}" class="form-control" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                        <label for="contact_text">Texto de contacto</label>
                        <textarea class="form-control" name="contact_text" id="contact_text" rows="3">{{$business->contact_text}}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="google_maps_link">Link de Google Maps</label>
                      <input type="text" name="google_maps_link" id="google_maps_link" value="{{$business->google_maps_link}}" class="form-control" aria-describedby="helpId" required>
                    </div>



                    {{--  <div class="custom-file mb-4">
                        <input type="file" class="custom-file-input" name="image" id="image" lang="es">
                        <label class="custom-file-label" for="image">Seleccionar Archivo</label>
                    </div>  --}}


                   
                    <div class="card-body">
                        <h4 class="card-title d-flex">Imagen de producto
                          <small class="ml-auto align-self-end">
                            <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
                          </small>
                        </h4>
                        <input type="file"  name="picture" id="picture" class="dropify" />
                    </div>

                     <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                     <a href="{{route('businesses.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     </form>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$businesses->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('melody/js/dropify.js') }}"></script>
@endsection
