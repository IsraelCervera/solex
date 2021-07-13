<!DOCTYPE html>
<html>
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Guimer Accesorios y Polarizados</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('estilos/css/bootstrap.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('estilos/css/style.css')}}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('estilos/css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{asset('estilos/images/fevicon.png')}}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('estilos/css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('estilos/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('estilos/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
       <header>
        <!-- header inner -->
        <div class="header">

            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="{{ route('home') }}"><img src="{{asset('estilos/images/nombre.png')}}" alt="#" style="max-width: 275px; max-height: auto;"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li class="active"> <a href="{{ route('home') }}">Inicio</a> </li>
                                        <li> <a href="{{route('web.product')}}">Productos</a> </li>
                                        <li><a href="{{route('web.service')}}">Servicios</a></li>
                                        <li><a href="{{route('web.contact_us')}}">Contactanos</a></li>

                                        @if (auth()->guest())
                                        <li class="{{('login') }}"><a class="nav-link" href="login">Login</a></li>
                                        @else
                                        <li><a class="nav-link" href="../public/logout">Cerrar sesión</a></li>
                                        @endif

                                        @if (auth()->check())
                                        @if (auth()->user()->rol=='Administrador')

                                        <li><a href="">{{ auth()->user()->name }} {{ auth()->user()->lastname }} - Administrador</a></li>

                                        <li class="{{('products*') }}">
                                          <a class="nav-link" href="{{ route('products.index') }}">Panel Administrador</a>
                                        </li>

                                        @endif
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-6">
                        <div class="location_icon_bottum">
                            <ul>
                                <li><img src="{{asset('estilos/icon/call.png')}}" />999 926 7956</li>
                                <li><img src="{{asset('estilos/icon/email.png')}}" />guimeraccesorios@hotmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->
    </header>

      <div class="container-fluid">
       @yield('contenido')
     </div>
           <footer>
        <div id="contact" class="footer">
            <div class="container">
                <div class="row pdn-top-30">
                    <div class="col-md-12 ">
                        <div class="footer-box">
                            <div class="headinga">
                                <h3>Contacto</h3>
                                <span>Tienda mi holguin Yucatán, Mérida, Calle 22 #343A x31 y 31A Col.Adolfo López Mateos: 97140</span>
                                <p>999 926 7956
                                    <br>guimeraccesorios@hotmail.com</p>
                            </div>
                            <ul class="location_icon">
                                <li> <a href="https://www.facebook.com/GuimerAccesoriosyPolarizados" target="_blank"><i class="fa fa-facebook-f"></i></a></li>

                                <li> <a href="https://wa.me/9999267956?text=Me%20interesa%20información%20sobre%20productos%20y%20servicios." target="_blank"><i class="fa fa-whatsapp"></i></a></li>

                            </ul>
                            <div class="menu-bottom">
                                <ul class="link">
                                    <li> <a href="{{ route('home') }}">Inicio </a></li>
                                    <li> <a href="{{route('web.product')}}">Productos </a></li>
                                    <li> <a href="{{route('web.service')}}">Servicios </a></li>
                                    <li> <a href="{{route('web.blog')}}">Blogs </a></li>
                                    <li> <a href="{{route('web.about_us')}}">Acerca de </a></li>
                                    <li> <a href="{{route('web.contact_us')}}"> Contactanos</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p>© {{date('Y')}} Todos los derechos reservados. Designado por<a href="https://www.facebook.com/GuimerAccesoriosyPolarizados" target="_blank"> Guimer Accesorios y Polarizados</a></p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>