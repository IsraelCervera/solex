@extends('layout')
@section('contenido')
@if(session()->has('info'))
<h3>{{ session('info') }}</h3>
@else

	    <div class="container-login">
		<div class="wrap-login">
<form method="POST" action="{{ route('users.store') }}">
	<span class="login-form-title">REGISTRO</span>
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

    <div class="wrap-input100">
    <input class="input100" type="text" name="name" placeholder="Nombre" value="{{ old('name') }}">
    <span class="focus-efecto"></span>
    </div>

    <div class="wrap-input100">
    <input class="input100" type="text" name="lastname" placeholder="Apellido" value="{{ old('lastname') }}">
    <span class="focus-efecto"></span>
    </div>

    <div class="wrap-input100">
    <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email')}}">
    <span class="focus-efecto"></span>
    </div>

    <div class="wrap-input100">
    <input class="input100" type="number" name="phone" placeholder="Teléfono" value="{{ old('phone') }}">
    <span class="focus-efecto"></span>
    </div>

    <div class="wrap-input100">
    <input class="input100" type="address" name="address" placeholder="Dirección" value="{{ old('address') }}">
    <span class="focus-efecto"></span>
    </div>

    <div class="wrap-input100">
    <input class="input100" type="state" name="state" placeholder="Estado" value="{{ old('state') }}">
    <span class="focus-efecto"></span>
    </div>

    <div class="wrap-input100">
    <input class="input100" type="cp" name="cp" placeholder="Codigo Postal" value="{{ old('cp') }}">
    <span class="focus-efecto"></span>
    </div>

    <div class="wrap-input100">
    <input class="input100" type="text" name="rol" placeholder="Rol" value="{{ old('rol') }}">
    <span class="focus-efecto"></span>
    </div>

    <div class="wrap-input100">
    <input class="input100" type="password" name="password" placeholder="Password">
    <span class="focus-efecto"></span>
    </div>

	<div class="container-login-form-btn">
    <div class="wrap-login-form-btn">
    <div class="login-form-bgbtn"></div>
    <button type="submit" name="submit" class="login-form-btn">ENVIAR</button>
    </div>
    </div>

</form>
</div>
</div>
@endif
<hr>
@stop