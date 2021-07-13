@extends('layouts.admin')
@section('title','Editar usuario')
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
            Editar usuario
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar usuario</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar usuario</h4>
                    </div>
                    <form class="form-inline" method="POST" action="{{ route('users.update', $user) }}">
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
                        <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="lastname">Apellido</label>
                        <input type="text" name="lastname" id="lastname" value="{{$user->lastname}}" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="phone">Celular</label>
                        <input type="number" name="phone" id="phone" value="{{$user->phone}}" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                      
                      

                      <div class="form-group">
                          <label for="password">Contraseña</label>
                          <input type="password" name="password" id="password" value="{{$user->password}}" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Rellenar solo si desea cambiar la contraseña.</small>
                      </div>
                    

                     <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                     <a href="{{route('users.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     </form>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$users->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('melody/js/data-table.js') }}"></script>
@endsection
