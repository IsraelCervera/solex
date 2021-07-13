@extends('layouts.admin')
@section('title','Editar servicio')
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
            Edición de servicios
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('services.index')}}">Servicios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de servicio</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edición de servicio</h4>
                    </div>

                    <form method="POST" action="{{ route('services.update', $service) }}" enctype="multipart/form-data">
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
                      <input type="text" name="name" id="name" value="{{$service->name}}" class="form-control" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción corta</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{$service->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="description_long">Descripción larga</label>
                        <textarea class="form-control" name="description_long" id="description_long" rows="3">{{$service->description_long}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="sell_price">Precio de venta</label>
                        <input type="number" name="sell_price" id="sell_price" value="{{$service->sell_price}}" class="form-control" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" value="{{$service->stock}}" class="form-control" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                      <label for="category_id">Categoría</label>
                      <select class="form-control" name="category_id" id="category_id">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" 
                            @if ($category->id == $service->category_id)
                            selected
                            @endif
                            >{{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                        <label for="provider_id">Proveedor</label>
                        <select class="form-control" name="provider_id" id="provider_id">
                          @foreach ($providers as $service)
                          <option value="{{$service->id}}"
                            @if ($service->id == $service->provider_id)
                            selected
                            @endif
                            >{{$service->name}}</option>
                          @endforeach
                        </select>
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
                     <a href="{{route('services.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     </form>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$services->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('melody/js/dropify.js') }}"></script>
@endsection
