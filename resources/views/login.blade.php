@extends('layout')

@section('contenido')

<html>
<head>

<link rel="shortcut icon" href="{{ asset('estilos/dashboard/img/user.png')}}">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>

        <link rel="stylesheet" href="{{ asset('estilos/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('estilos/estilos.css')}}">
        <link rel="stylesheet" href="{{ asset('estilos/plugins/sweetalert2/sweetalert2.min.css')}}">     
        
        <link rel="stylesheet" type="text/css" href="{{ asset('estilos/fuentes/iconic/css/material-design-iconic-font.min.css')}}">
		</head>

		<body>

            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('message'))
    <div class="alert alert-danger">
        {{ session('message')}}
    </div>
@endif

		<div class="container-login">
        <div class="wrap-login">
            <form class="login-form validate-form" action="login" method="POST">
                <span class="login-form-title">LOGIN</span>
     	{!! csrf_field() !!}
	<div class="wrap-input100" data-validate = "Usuario incorrecto">
                    <input class="input100" type="text" id="email" name="email" placeholder="Email">
                    <span class="focus-efecto"></span>
                </div>
                
                <div class="wrap-input100" data-validate="Password incorrecto">
                    <input class="input100" type="password" id="password" name="password" placeholder="Password">
                    <span class="focus-efecto"></span>
                </div>
                
                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <button type="submit" name="submit" class="login-form-btn">INICIAR SESIÓN</button>
                    </div>
                </div>
            </form>
            {{--<div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <button class="login-form-btn" onclick="location.href='{{ route('users.create') }}'">REGISTRARSE</button>
                    </div>
                </div>--}}
        </div>
    </div>     

    </body>
     <br>
</html>
@stop