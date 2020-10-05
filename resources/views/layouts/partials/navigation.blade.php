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
        <img class="navbar-brand-logo p-0 m-0" src="{{ asset('rwanga/logo/rwanga_logo_white.png') }}" title="Rwanga Foundation">
        <span class="navbar-brand-text hidden-xs-down"> Rwanga Qutabkhana</span>
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
              <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>
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
      @if(auth()->user()->can('Dashboard Beneficiaries') || auth()->user()->can('Dashboard Team'))
      <li class="site-menu-item has-sub">
        <a href="javascript:void(0)">
                <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Dashboard</span>
                        <span class="site-menu-arrow"></span>
            </a>
        <ul class="site-menu-sub">
          @can('Dashboard Beneficiaries')
          <li class="site-menu-item">
            <a class="animsition-link" href="{{ route('admin.dashboard.beneficiaries') }}">
              <span class="site-menu-title">Beneficiaries</span>
            </a>
          </li>
          @endcan
          @can('Dashboard Team')
          <li class="site-menu-item">
            <a class="animsition-link" href="{{ route('admin.dashboard.team') }}">
              <span class="site-menu-title">Team</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endif

      @if(auth()->user()->can('Subjects Sections') || auth()->user()->can('Subjects Questions List'))
      <li class="site-menu-item has-sub">
        <a href="javascript:void(0)">
                <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                <span class="site-menu-title">Subjects</span>
                        <span class="site-menu-arrow"></span>
            </a>
        <ul class="site-menu-sub">
        @foreach($stages as $stage)
          <li class="site-menu-item has-sub">
            <a href="javascript:void(0)">
              <span class="site-menu-title">{{ $stage->name }}</span>
              <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
                @foreach($stage->subjects as $subject)
              <li class="site-menu-item">
                <a class="animsition-link" href="{{ route('admin.subject', $subject->id) }}">
                  <span class="site-menu-title">{{ $subject->name }}</span>
                </a>
              </li>
              @endforeach
            </ul>
          </li>
          @endforeach
        </ul>
      </li>
      @endif

      @if(auth()->user()->can('Feedback Open Reviews') || auth()->user()->can('Feedback Closed Reviews') || auth()->user()->can('Feedback Reported Questions'))
      <li class="site-menu-item has-sub">
        <a href="{{ route('admin.feedbacks') }}">
                <i class="site-menu-icon wb-chat-working" aria-hidden="true"></i>
                <span class="site-menu-title">Feedbacks</span>
                        {{-- <span class="site-menu-arrow"></span> --}}
            </a>
      </li>
      @endif

      @if(auth()->user()->can('Students List') || auth()->user()->can('Student Add'))
      <li class="site-menu-item has-sub">
        <a href="javascript:void(0)">
                <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                <span class="site-menu-title">Students</span>
                        <span class="site-menu-arrow"></span>
            </a>
        <ul class="site-menu-sub">
          @can('Students List')
          <li class="site-menu-item">
            <a class="animsition-link" href="{{ route('students.index') }}">
              <span class="site-menu-title">Students List</span>
            </a>
          </li>
          @endcan
          @can('Student Add')
          <li class="site-menu-item">
            <a class="animsition-link" href="{{ route('students.create') }}">
              <span class="site-menu-title">Add New Student</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endif

      @can('Root Permission')
      <li class="site-menu-item has-sub">
        <a href="javascript:void(0)">
                <i class="site-menu-icon wb-lock" aria-hidden="true"></i>
                <span class="site-menu-title">Security and Privacy</span>
                        <span class="site-menu-arrow"></span>
            </a>
        <ul class="site-menu-sub">
          <li class="site-menu-item">
            <a class="animsition-link" href="{{ route('roles.index') }}">
              <span class="site-menu-title">Roles and Permissions</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a class="animsition-link" href="{{ route('roles.create') }}">
              <span class="site-menu-title">Add New Role</span>
            </a>
          </li>
          <li class="site-menu-item">
            <a class="animsition-link" href="{{ route('roles.assign') }}">
              <span class="site-menu-title">Assign Users</span>
            </a>
          </li>
        </ul>
      </li>
      @endcan

      <li class="site-menu-item has-sub">
        <a href="{{ route('admin.settings.index') }}">
                <i class="site-menu-icon wb-settings" aria-hidden="true"></i>
                <span class="site-menu-title">Settings</span>
            </a>
      </li>

    </ul></div>    
    