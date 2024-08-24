<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="{{ route('dashboard') }}">
                    <span class="align-middle me-3">Alfa Travel</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">Beranda Umum</li>
                    <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="sidebar-link">
                            <i class="align-middle" data-feather="menu"></i>
                            <span class="align-middle">Beranda</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('travels.index') ? 'active' : '' }}">
                        <a href="{{ route('travels.index') }}" class="sidebar-link">
                            <i class="align-middle" data-feather="menu"></i>
                            <span class="align-middle">Data Travel</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('user.index') ? 'active' : '' }}">
                        <a href="{{ route('user.index') }}" class="sidebar-link">
                            <i class="align-middle" data-feather="menu"></i>
                            <span class="align-middle">Data User</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('destination.index') ? 'active' : '' }}">
                        <a href="{{ route('destination.index') }}" class="sidebar-link">
                            <i class="align-middle" data-feather="menu"></i>
                            <span class="align-middle">Data Destinasi</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('departure.index') ? 'active' : '' }}">
                        <a href="{{ route('departure.index') }}" class="sidebar-link">
                            <i class="align-middle" data-feather="menu"></i>
                            <span class="align-middle">Data Keberangkatan</span>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>
        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <span class="text-dark">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    Profile</a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Keluar</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
