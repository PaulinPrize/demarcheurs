@include('layouts.head')
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Démarcheurs</div>  
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item @if(request()->route()->getName() == 'user.index') active @endif">
          <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span>
          </a>  
        </li>

        <hr class="sidebar-divider">

        @can('user.all')
          <div class="sidebar-heading">
            Utilisateurs
          </div>
          <li class="nav-item @if(request()->route()->getName() == 'user.all') active @endif">
            <a class="nav-link" href="{{ route('user.all') }}">
              <i class="fas fa-fw fa-users"></i>
              <span>Gérer les utilisateurs</span>
            </a>  
          </li>
          <hr class="sidebar-divider">
        @endcan

        @can('role.index')
          <div class="sidebar-heading">
            Rôles
          </div>
          <li class="nav-item @if(request()->route()->getName() == 'role.index') active @endif">
            <a class="nav-link" href="{{ route('role.index') }}">
              <i class="fas fa-fw fa-lock"></i>
              <span>Gérer les rôles</span>
            </a>  
          </li>
          <hr class="sidebar-divider">
        @endcan

        @can('categorie.index')
          <div class="sidebar-heading">
            Catégories
          </div>
          <li class="nav-item @if(request()->route()->getName() == 'categorie.index') active @endif">
            <a class="nav-link" href="{{ route('categorie.index') }}">
              <i class="fas fa-fw fa-wrench"></i>
              <span>Gérer les catégories</span>
            </a>  
          </li>
          <hr class="sidebar-divider">
        @endcan

        @can('region.index')
          <div class="sidebar-heading">
            Régions
          </div>
          <li class="nav-item @if(request()->route()->getName() == 'region.index') active @endif">
            <a class="nav-link" href="{{ route('region.index') }}">
              <i class="fas fa-fw fa-wrench"></i>
              <span>Gérer les régions</span>
            </a>  
          </li>
          <hr class="sidebar-divider">
        @endcan

        <div class="sidebar-heading">
          Logements
        </div>

        @can('user.moderer')
          <li class="nav-item @if(request()->route()->getName() == 'user.moderer') active @endif">
            <a class="nav-link" href="{{ route('user.moderer') }}">
              <i class="fas fa-fw fa-question"></i>
              <span>A modérer</span>
            </a>
          </li>
        @endcan

        @can('user.obsoletes')
          <li class="nav-item @if(request()->route()->getName() == 'user.obsoletes') active @endif">
            <a class="nav-link" href="{{ route('user.obsoletes') }}">
              <i class="fas fa-fw fa-hourglass-end"></i>
              <span>Obsolètes</span>
            </a>
          </li>
        @endcan

        @can('user.actives')
          <li class="nav-item @if(request()->route()->getName() == 'user.actives') active @endif">
            <a class="nav-link" href="{{ route('user.actives') }}">
              <i class="fas fa-fw fa-hiking"></i>
              <span>Actifs</span>
            </a>
          </li>
        @endcan

        @can('user.attente')
          <li class="nav-item @if(request()->route()->getName() == 'user.attente') active @endif">
            <a class="nav-link" href="{{ route('user.attente') }}">
              <i class="fas fa-fw fa-hourglass-start"></i>
              <span>En attente</span>
            </a>
          </li>
        @endcan

        @can('user.obsolete')
          <li class="nav-item @if(request()->route()->getName() == 'user.obsolete') active @endif">
            <a class="nav-link" href="{{ route('user.obsolete') }}">
              <i class="fas fa-fw fa-hourglass-end"></i>
              <span>Obsolètes</span>
            </a>
          </li>
        @endcan

        @can('logement.all')
          <li class="nav-item @if(request()->route()->getName() == 'logement.all') active @endif">
            <a class="nav-link" href="{{ route('logement.all') }}">
              <i class="fas fa-fw fa-question"></i>
              <span>Tous les logements</span>
            </a>
          </li>
          <hr class="sidebar-divider">
        @endcan

        <div class="sidebar-heading">
          Messages
        </div>

        @can('user.messages')
          <li class="nav-item @if(request()->route()->getName() == 'user.messages') active @endif">
            <a class="nav-link" href="{{ route('user.messages') }}">
              <i class="fas fa-fw fa-question"></i>
              <span>A modérer</span>
            </a>
          </li>
        @endcan

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>
      <!-- End of Sidebar -->
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-bell fa-fw"></i>
                  <span class="badge badge-danger badge-counter">3+</span>
                </a>
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header">
                    Alertes
                  </h6>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                      <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500">December 12, 2019</div>
                      <span class="font-weight-bold">A new monthly report is ready to download!</span>
                    </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                      <div class="icon-circle bg-success">
                        <i class="fas fa-donate text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500">December 7, 2019</div>
                      $290.29 has been deposited into your account!
                    </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                      <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500">December 2, 2019</div>
                      Spending Alert: We've noticed unusually high spending for your account.
                    </div>
                  </a>
                  <a class="dropdown-item text-center small text-gray-500" href="#">Afficher toutes les alertes</a>
                </div>
              </li>              

              <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-envelope fa-fw"></i>
                  <!-- Counter - Messages -->
                  <span class="badge badge-danger badge-counter">7</span>
                </a>
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                  <h6 class="dropdown-header">
                    Messages
                  </h6>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                      <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                      <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                      <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                      <div class="small text-gray-500">Emily Fowler · 58m</div>
                    </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                      <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                      <div class="status-indicator"></div>
                    </div>
                    <div>
                      <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                      <div class="small text-gray-500">Jae Chun · 1d</div>
                    </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                      <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                      <div class="status-indicator bg-success"></div>
                    </div>
                    <div>
                      <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                      <div class="small text-gray-500">Chicken the Dog · 2w</div>
                    </div>
                  </a>
                  <a class="dropdown-item text-center small text-gray-500" href="#">Lire plus de messages</a>
                </div>
              </li>
              <div class="topbar-divider d-none d-sm-block"></div>
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                  <img class="img-profile rounded-circle" src="{{asset('public/img/avatars/'.Auth::user()->photo.'')}}" class="img-circle">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="https://www.demarcheurs.com">
                    <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                    Retour à l'accueil
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Outils
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Déconnexion
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->
          <!-- Begin Page Content -->
          <div class="container-fluid">
            @yield('content')
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; 2020 Démarcheurs. Tous droits réservés. Application web créée par Paulin Priso & Aurelien Mbend</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    @include('layouts.footer')