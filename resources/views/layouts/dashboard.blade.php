<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-content">
                <div class="sidebar-item" onclick="window.location.href='{{ route('dashboard') }}'" >
                    Inicio
                </div>
                <div class="sidebar-item" @if(Route::currentRouteName() != 'tools.index') onclick="window.location.href='{{ route('dashboard') }}'" @endif>
                    Herramientas
                    @if(Route::currentRouteName() == 'tools.index')
                        <div class="submenu">
                            <div class="submenu-item">Crear</div>
                        </div>
                    @endif
                </div>
                <div class="sidebar-item" @if(Route::currentRouteName() != 'loans.index') onclick="window.location.href='{{ route('dashboard') }}'" @endif>
                    Préstamos
                    @if(Route::currentRouteName() == 'loans.index')
                    <div class="submenu">
                        <div class="submenu-item">Crear</div>
                    </div>
                    @endif
                </div>
                <div class="sidebar-item" @if(Route::currentRouteName() != 'users.index') onclick="window.location.href='{{ route('users.index') }}'" @endif>
                    Usuarios
                    @if(Route::currentRouteName() == 'users.index')
                        <div class="submenu">
                            <div class="submenu-item">Crear</div>
                        </div>
                    @endif
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
                            <button class="dropdown-item">{{ Auth::User()->nombre_completo }}</button>
                            <button class="dropdown-item">Perfil</button>
                            <button class="dropdown-item">Cerrar sesión</button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="content">
                @yield('content')

                <!-- Modal Crear-->
                <div id="modal" class="modal-crear">
                    <div class="modal-content">
                        <span class="close-btn" id="close-btn-crear">&times;</span>
                        <h2>Formulario crear</h2>
                        @yield('formCreate')
                    </div>
                </div>
                <!-- Fin modal Crear-->

                <!-- Modal Actualizar-->
                <div id="editModal" class="modal-actualizar">
                    <div class="modal-content">
                        <span class="close-btn-actualizar">&times;</span>
                        <h2>Formulario editar</h2>
                        @yield('formEdit')
                    </div>
                </div>

                <!-- Fin modal Actualizar-->
            </div>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('js')
</body>

</html>
