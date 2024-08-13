<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Coyca</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    @livewireStyles
    @vite(['resources/js/app.js'])
</head>

<body>
    <!-- Sidebar -->
    <div style="display: flex">
        <div id="app">
            <ul class="navbar-nav sidebar sidebar-dark" style="background-color: #388da8">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center">
                    <h2>Coyca</h2>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Blog -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-list-alt"></i>
                        <span>Blog</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('blog') }}">
                            <i class="fas fa-fw fa-list-alt"></i>
                            <span>Crear blogs</span>
                        </a>
                        <a class="dropdown-item" href="{{ route('comentarioBlog') }}">
                            <i class="fas fa-fw fa-list-alt"></i>
                            <span>Comentarios blog</span>
                        </a>
                    </div>
                </li>

                <!-- Nav Item - Categorias -->
                <li class="nav-item">
                    <a href="{{ route('categorias') }}" class="nav-link">
                        <i class="fas fa-fw fa-list-alt"></i>
                        <span>Categorias</span></a>
                </li>

                 <!-- Nav Item - Areas -->
                 <li class="nav-item">
                    <a href="{{ route('areas') }}" class="nav-link">
                        <i class="fas fa-fw fa-list-alt"></i>
                        <span>Areas</span></a>
                </li>

                 <!-- Nav Item - Consultorias -->
                 <li class="nav-item">
                    <a href="{{ route('consultorias') }}" class="nav-link">
                        <i class="fas fa-fw fa-list-alt"></i>
                        <span>Consultorias Incompany</span></a>
                </li>

                <!-- Nav Item - Recursos -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-list-alt"></i>
                        <span>Recursos</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('recursos') }}">
                            <i class="fas fa-fw fa-list-alt"></i>
                            <span>Crear recursos</span>
                        </a>
                        <a class="dropdown-item" href="{{ route('listadoUsuariosXDescarga') }}">
                            <i class="fas fa-fw fa-list-alt"></i>
                            <span>Usuarios que descargaron recursos</span>
                        </a>
                    </div>
                </li>

                <!-- Nav Item - Articulos -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-list-alt"></i>
                        <span>Articulos</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('articulos') }}">
                            <i class="fas fa-fw fa-list-alt"></i>
                            <span>Crear articulos</span>
                        </a>
                        <a class="dropdown-item" href="{{ route('listadoUsuariosXDescargaArticulo') }}">
                            <i class="fas fa-fw fa-list-alt"></i>
                            <span>Usuarios que descargaron articulos</span>
                        </a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-list-alt"></i>
                        <span>Cursos por Iniciar</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('capacitaciones') }}">
                            <i class="fas fa-fw fa-list-alt"></i>
                            <span>Listado de capacitaciones</span>
                        </a>
                        <a class="dropdown-item" href="{{ route('capacitacionesUsuarios') }}">
                            <i class="fas fa-fw fa-list-alt"></i>
                            <span>Usuarios registrados</span>
                        </a>
                    </div>
                </li>

                <!-- Nav Item - Capacitaciones Incompany -->
                <li class="nav-item">
                    <a href="{{ route('capacitacionesIncompany') }}" class="nav-link">
                        <i class="far fa-fw fa-folder-open"></i>
                        <span>Capacitaciones Incompany</span></a>
                </li>

                <!-- Nav Item - Reseñas -->
                <li class="nav-item">
                    <a href="{{ route('resenas') }}" class="nav-link">
                        <i class="fas fa-fw fa-list-alt"></i>
                        <span>Reseñas</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <div class="logo-usuario">
                    <p class="nombre-usuario">{{ Auth::user()->name }}</p>
                    <div class="dropdown user-menu">
                        <a class="dropdown-toggle user-toogle" id="dd-user-menu" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" style="cursor: pointer; color: white">
                            <span class="fi fi-br-menu-dots-vertical"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dd-user-menu">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-reply-all mr-3"></i>Cerrar sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
        </div>
        <main>
            @yield('content')
        </main>
    </div>
    @livewireScripts
</body>

</html>
