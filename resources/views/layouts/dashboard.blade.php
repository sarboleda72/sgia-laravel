<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-content">
                <div class="sidebar-item">
                    Inicio
                </div>
                <div class="sidebar-item">
                    Herramienta
                    <div class="submenu">
                        <div class="submenu-item">Crear</div>
                        <div class="submenu-item">Listar</div>
                        <div class="submenu-item">Actualizar</div>
                        <div class="submenu-item">Eliminar</div>
                    </div>
                </div>
                <div class="sidebar-item">
                    Préstamo
                    <div class="submenu">
                        <div class="submenu-item">Crear</div>
                        <div class="submenu-item">Actualizar</div>
                        <div class="submenu-item">Eliminar</div>
                    </div>
                </div>
                <div class="sidebar-item">
                    Usuarios
                    <div class="submenu">
                        <div class="submenu-item">Crear</div>
                        <div class="submenu-item">Actualizar</div>
                        <div class="submenu-item">Eliminar</div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content" id="main-content">
            <!-- Header -->
            <header class="header">
                <button class="menu-toggle" id="menu-toggle">☰</button>
                <div class="header-title">@yield('nameModule')</div>
                <div class="user-info">
                    <img src="user-profile.jpg" alt="Foto de Usuario" class="user-photo" id="user-photo">
                    <div class="dropdown" id="dropdown">
                        <div class="dropdown-menu">
                            <button class="dropdown-item">{{ Auth::User()->nombre_completo}}</button>
                            <button class="dropdown-item">Perfil</button>
                            <button class="dropdown-item">Cerrar sesión</button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{asset('js/script.js')}}"></script>
    @yield('js')
</body>
</html>
