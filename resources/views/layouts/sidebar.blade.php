<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('dashboard') }}" class="logo">
                <img src="{{ asset('assets/img/kaiadmin/logo_light.png') }}" alt="navbar brand" class="navbar-brand"
                    height="30" />
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

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a href="{{ route('dashboard') }}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Options Associées</h4>
                </li>
                @if (Auth::user()->role == 'Admin')
                    <li class="nav-item">
                        <a href="#base">
                            <p>Statistique Provinciales</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#base">
                            <p>Statistique Equipes</p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#controles">
                        <p>Contrôles</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="controles">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('control.index') }}">
                                    <span class="sub-item">Ajouter</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('control.index') }}">
                                    <span class="sub-item">Liste</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="{{ route('policier.index') }}">
                        <p>Policiers</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('unite.index') }}">
                        <p>Unités</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#missions">
                        <p>Missions</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="missions">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('mission.ajouter') }}">
                                    <span class="sub-item">Ajouter</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('mission.index') }}">
                                    <span class="sub-item">Liste</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                </li>
                <li class="nav-item">
                    <a href="{{ route('equipe.index') }}">
                        <i class="fas fa-users"></i>
                        <p>Equipes</p>
                        <span class="badge badge-success">{{ $totalEquipe }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}">
                        <i class="fas fa-user"></i>
                        <p>Utilisateurs</p>
                        <span class="badge badge-secondary">{{ $totalUser }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
