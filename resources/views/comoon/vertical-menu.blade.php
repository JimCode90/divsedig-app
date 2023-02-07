<div class="vertical-menu">

    <div data-simplebar class="h-100">


        <div class="user-sidebar text-center">
            <div class="dropdown">
                <div class="user-img">
                    <img src="{{ asset('assets/images/agente.png') }}" alt="" class="rounded-circle">
                    <span class="avatar-online bg-success"></span>
                </div>
                <div class="user-info">
                    <h5 class="mt-3 font-size-16 text-white">{{ Auth::user()->grado["descripcion"] }} {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}</h5>
                    <span class="font-size-13 text-white-50">Administrator</span>
                </div>
            </div>
        </div>



        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title">Home</li>
                <li>
                    <a href="{{ route('home') }}" class="waves-effect">
                        <i class="dripicons-home"></i><span class="badge rounded-pill bg-info float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-title">Datos Generales</li>
                <li>
                    <a href="{{ route('perfil') }}" class=" waves-effect">
                        <i class="dripicons-calendar"></i>
                        <span>Mi perfil</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('cursos') }}" class=" waves-effect">
                        <i class="dripicons-document"></i>
                        <span>Mis cursos</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('proyectos') }}" class=" waves-effect">
                        <i class="dripicons-folder-open"></i>
                        <span>Mis proyectos</span>
                    </a>
                </li>
                <li class="menu-title">Jefatura</li>
                <li>
                    <a href="{{ route('reportes') }}" class=" waves-effect">
                        <i class="dripicons-article"></i>
                        <span>Reportes</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
