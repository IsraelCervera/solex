@extends('layouts.admin')
@section('title','Editar cliente')
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
            Edición de cliente
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de cliente</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edición de cliente</h4>
                    </div>

                    <form method="POST" files="true" action="{{ route('clients.update', $client) }}" enctype="multipart/form-data">
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
                      <input type="text"
                        class="form-control" name="name" id="name" value="{{$client->name}}" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                      <label for="lastname">Apellido</label>
                      <input type="text"
                        class="form-control" name="lastname" id="lastname" value="{{$client->lastname}}" aria-describedby="helpId">
                    </div>

                    <div class="form-group">
                        <label for="curp">CURP</label>
                        <input type="text"
                          class="form-control" name="curp" id="curp" value="{{$client->curp}}" aria-describedby="helpId">
                    </div>

                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text"
                          class="form-control" name="address" id="address" value="{{$client->address}}" aria-describedby="helpId">
                          <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
                    </div>

                    <div class="form-group">
                        <label for="phone">Celular</label>
                        <input type="number"
                          class="form-control" name="phone" id="phone" value="{{$client->phone}}" aria-describedby="helpId">
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email"
                          class="form-control" name="email" id="email" value="{{$client->email}}" aria-describedby="helpId">
                    </div>
                    

                     <button type="submit" class="btn btn-primary mr-2">Editar</button>
                     <a href="{{route('clients.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     </form>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$clients->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('melody/js/dropify.js') }}"></script>
@endsection
