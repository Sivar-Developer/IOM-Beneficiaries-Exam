<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
        data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
        data-toggle="collapse">
        <i class="icon wb-more-horizontal" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
        {{-- <img class="navbar-brand-logo p-0 m-0" src="{{ asset('rwanga/logo/rwanga_logo_white.png') }}" title="Rwanga Foundation"> --}}
        <span class="navbar-brand-text hidden-xs-down"> IOM - Test</span>
      </div>
      {{-- <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
        data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon wb-search" aria-hidden="true"></i>
      </button> --}}
    </div>
  
    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
          <li class="nav-item hidden-float" id="toggleMenubar">
            <a class="nav-link" data-toggle="menubar" href="#" role="button">
              <i class="icon hamburger hamburger-arrow-left">
                <span class="sr-only">Toggle menubar</span>
                <span class="hamburger-bar"></span>
              </i>
            </a>
          </li>
          <li class="nav-item hidden-sm-down" id="toggleFullscreen">
            <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
              <span class="sr-only">Toggle fullscreen</span>
            </a>
          </li>
          {{-- <li class="nav-item hidden-float">
            <a class="nav-link icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
              role="button">
              <span class="sr-only">Toggle Search</span>
            </a>
          </li> --}}
        </ul>
        <!-- End Navbar Toolbar -->
  
        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          <li class="nav-item dropdown">
            <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
              data-animation="scale-up" role="button">
              <span class="font-weight-600">{{ Auth::user()->name }}</span>
              <span class="avatar avatar-online">
                <img src="{{ asset('remark/global/portraits/5.jpg') }}" alt="...">
                <i></i>
              </span>
            </a>
            <div class="dropdown-menu" role="menu">
              <div class="dropdown-item font-weight-600 border-bottom">
                {{ Auth::user()->name }}
                <span class="font-size-10 font-weight-400 block">ID: {{ Auth::user()->email }}</span>
              </div>
              <div class="dropdown-divider"></div>
              <div class="dropdown-divider" role="presentation"></div>
              <a class="dropdown-item" role="menuitem"  href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                <i class="icon wb-power" aria-hidden="true"></i> Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
          
          <li class="nav-item" id="toggleChat">
            <a class="nav-link" data-toggle="site-sidebar" href="javascript:void(0)" title="Chat"
              data-url="site-sidebar.tpl">
              {{-- <i class="icon wb-chat" aria-hidden="true"></i> --}}
            </a>
          </li>
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->
  
    </div>
  </nav>    
  <div class="site-menubar">
    <ul class="site-menu">
      <li class="site-menu-item has-sub">
        <a href="javascript:void(0)">
                <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Beneficiaries</span>
                        <span class="site-menu-arrow"></span>
            </a>
        <ul class="site-menu-sub">
          <li class="site-menu-item">
            <a class="animsition-link" href="{{ route('beneficiaries.index') }}">
              <span class="site-menu-title">Beneficiaries List</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a class="animsition-link" href="#">
              <span class="site-menu-title">Add New Beneficiary</span>
            </a>
          </li>
        </ul>
      </li>

    </ul></div>    
    