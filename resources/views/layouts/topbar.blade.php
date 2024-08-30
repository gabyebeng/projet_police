<div class="main-header">
    <div class="main-header-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="{{ asset('assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand" class="navbar-brand"
                    height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false" aria-haspopup="true">
                        <i class="fa fa-search"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-search animated fadeIn">
                        <form class="navbar-left navbar-form nav-search">
                            <div class="input-group">
                                <input type="text" placeholder="Search ..." class="form-control" />
                            </div>
                        </form>
                    </ul>
                </li>
                <li class="nav-item topbar-icon dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cogs"></i>
                        <span class="notification">2</span>
                    </a>
                    <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                        <li>
                            <div class="dropdown-title">
                                Configurations
                            </div>
                        </li>
                        <li>
                            <div class="notif-scroll scrollbar-outer">
                                <div class="notif-center">

                                    <div class="notif-content">
                                        @if (Auth::user()->role == 'Admin')
                                            <a class="dropdown-item" href="{{ route('export.unite') }}">Exportez les
                                                cofigurations "UNITE"</a>
                                            <a class="dropdown-item" href="{{ route('export.policier') }}">Exportez
                                                les
                                                cofigurations "POLICIER"</a>
                                        @else
                                            <a class="dropdown-item" href="{{ route('configuration.index') }}">Importez
                                                les
                                                cofigurations</a>
                                        @endif
                                        @if ($totalControl == 0)
                                            <a href="{{ route('control.charger') }}" class="dropdown-item">Charger les
                                                controls</a>
                                        @else
                                            <p class="dropdown-item">Liste Control chargée</p>
                                        @endif
                                    </div>
                                </div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item topbar-user dropdown hidden-caret">
                    <a class="fas fa-user dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                        aria-expanded="false">

                        <span class="profile-username ">
                            <span class="op-7">Bonjour,</span>
                            <span class="fw-bold">{{ Auth::user()->name }}</span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        <img src="assets/img/profile.jpg" alt="image profile"
                                            class="avatar-img rounded" />
                                    </div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p>
                                        @if ($totalControl == 0)
                                            <a href="{{ route('control.charger') }}"
                                                class="btn btn-xs btn-secondary btn-sm">Charger les
                                                controls</a>
                                        @else
                                            <p class="text-muted">Liste Control chargée</p>
                                        @endif

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Total Controlé Aujourd'hui :
                                    {{ $controlToday }}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('synchronisation') }}">Synchronisation</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('user.deconnecter') }}">Deconnecter</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>
