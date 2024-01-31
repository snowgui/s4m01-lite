<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('titulo')</title>

    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('font-awesome/css/font-awesome.css') !!}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{!! asset('css/plugins/toastr/toastr.min.css') !!}" rel="stylesheet">

    <link rel="stylesheet" href="{!! asset('componentes/sweet-alert/sweet-alert.css') !!}" />
    
    <!-- Gritter -->
    <link href="{!! asset('js/plugins/gritter/jquery.gritter.css') !!}" rel="stylesheet">

    <link href="{!! asset('css/animate.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">

    @section('styles')
    @show

</head>

<!-- SKIN 2 White
<body> -->
<body class="md-skin fixed-nav">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="img/gui_small.jpg" style="width:48px; heigth:48px;"/>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">Guilherme Correa</span>
                                <span class="text-muted text-xs block">Root <b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile.html">Perfil</a></li>
                                <li><a class="dropdown-item" href="contacts.html">Editar</a></li>
                            
                                <li class="dropdown-divider"></li>
                                
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            <i class="fa fa-snowflake-o" style="color:#1ab394; font-weight:700;"></i>
                        </div>
                    </li>

                    <li class="active">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> <span class="nav-label">Index</span></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Usuários</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="graph_flot.html">Gestão</a></li>
                        </ul>
                    </li>                                    
               
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Menu Levels </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="#" id="damian">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>

                                </ul>
                            </li>
                            <li><a href="#">Second Level Item</a></li>
                            <li>
                                <a href="#">Second Level Item</a></li>
                            <li>
                                <a href="#">Second Level Item</a></li>
                        </ul>
                    </li>
                 
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">

        <!-- SKIN 2 White  
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        -->
        <nav class="navbar navbar-fixed-top" role="navigation" style="margin-bottom: 0"> 
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li style="padding: 20px">
                    <span class="m-r-sm text-muted welcome-message">Bem vindo, <strong>Guilherme</strong></span>
                </li>

                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>{{ __('Sair') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>

        </nav>
    </div>