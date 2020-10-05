
<!DOCTYPE html>
<html class="no-js css-menubar" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="{{ config('app.name') }} Admin Panel">
    <meta name="author" content="Sivar Sarkawt">

    <title>{{ config('app.name') }} | IOM</title>

    <link rel="apple-touch-icon" href="{{ asset('remark/mmenu/assets/images/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('remark/mmenu/assets/images/favicon.ico') }}">

    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('remark/global/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('remark/global/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('remark/mmenu/assets/css/site.min.css') }}">
          {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}

    {{-- Plugins --}}
    <link rel="stylesheet" href="{{ asset('remark/global/vendor/animsition/animsition.css') }}">
    <link rel="stylesheet" href="{{ asset('remark/global/vendor/asscrollable/asScrollable.css') }}">
    <link rel="stylesheet" href="{{ asset('remark/global/vendor/switchery/switchery.css') }}">
    <link rel="stylesheet" href="{{ asset('remark/global/vendor/intro-js/introjs.css') }}">
    <link rel="stylesheet" href="{{ asset('remark/global/vendor/slidepanel/slidePanel.css') }}">
    <link rel="stylesheet" href="{{ asset('remark/global/vendor/jquery-mmenu/jquery-mmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('remark/global/vendor/flag-icon-css/flag-icon.css') }}">

    {{-- Theme Color --}}
    <link rel="stylesheet" href="{{ asset('remark/mmenu/assets/skins/rwanga_skin.css') }}">


    {{-- Fonts --}}
    {{-- @if(app()->getLocale() === 'ku')
    <link rel="stylesheet" href="{{ asset('fonts/font.css') }}">
    @endif --}}
    <link rel="stylesheet" href="{{ asset('remark/global/fonts/web-icons/web-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('remark/global/fonts/font-awesome/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('remark/global/fonts/material-design/material-design.css')}}">
    <link rel="stylesheet" href="{{ asset('remark/global/fonts/themify/themify.css')}}">
    <link rel="stylesheet" href="{{ asset('remark/global/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    {{-- Vue scripts
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.js"></script> --}}

    {{-- Scripts to import --}}
    @yield('header')
    @stack('head')

    <!--[if lt IE 9]>
    <script src="{{ asset('remark/global/vendor/html5shiv/html5shiv.min.js') }}"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="{{ asset('remark/global/vendor/media-match/media.match.min.js') }}"></script>
    <script src="{{ asset('remark/global/vendor/respond/respond.min.js') }}"></script>
    <![endif]-->

    <script src="{{ asset('remark/global/vendor/breakpoints/breakpoints.js') }}"></script>
    <script>
      Breakpoints();
    </script>
  </head>
  <body class="animsition site-navbar-small site-menubar-unfold">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

        @include('layouts.partials.navigation')

    <div class="page">

      @include('layouts.partials.alert')
        @yield('content')

    </div>

    <footer class="site-footer">
      <div class="site-footer-legal"> © {{ Carbon\Carbon::now()->format('Y') }} <a href="{{ config('app.url') }}">{{ config('app.name') }}</a></div>
    </footer>
    {{-- Core --}}
    <script src="{{ asset('remark/global/vendor/babel-external-helpers/babel-external-helpers.js') }}"></script>
    <script src="{{ asset('remark/global/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('remark/global/vendor/popper-js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('remark/global/vendor/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('remark/global/vendor/animsition/animsition.js') }}"></script>
    <script src="{{ asset('remark/global/vendor/mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('remark/global/vendor/asscrollbar/jquery-asScrollbar.js') }}"></script>
    <script src="{{ asset('remark/global/vendor/asscrollable/jquery-asScrollable.js') }}"></script>

    {{-- Plugins --}}
    <script src="{{ asset('remark/global/vendor/jquery-mmenu/jquery.mmenu.min.all.js') }}"></script>
    <script src="{{ asset('remark/global/vendor/switchery/switchery.js') }}"></script>
    <script src="{{ asset('remark/global/vendor/intro-js/intro.js') }}"></script>
    <script src="{{ asset('remark/global/vendor/screenfull/screenfull.js') }}"></script>
    <script src="{{ asset('remark/global/vendor/slidepanel/jquery-slidePanel.js') }}"></script>

    {{-- Scripts --}}
    <script src="{{ asset('remark/global/js/Component.js') }}"></script>
    <script src="{{ asset('remark/global/js/Plugin.js') }}"></script>
    <script src="{{ asset('remark/global/js/Base.js') }}"></script>
    <script src="{{ asset('remark/global/js/Config.js') }}"></script>

    <script src="{{ asset('remark/mmenu/assets/js/Section/Menubar.js') }}"></script>
    <script src="{{ asset('remark/mmenu/assets/js/Section/Sidebar.js') }}"></script>
    <script src="{{ asset('remark/mmenu/assets/js/Section/PageAside.js') }}"></script>
    <script src="{{ asset('remark/mmenu/assets/js/Section/GridMenu.js') }}"></script>

    {{-- Config --}}
    <script src="{{ asset('remark/global/js/config/colors.js') }}"></script>
    <script src="{{ asset('remark/mmenu/assets/js/config/tour.js') }}"></script>

    {{-- Page --}}
    <script src="{{ asset('remark/mmenu/assets/js/Site.js') }}"></script>
    <script src="{{ asset('remark/global/js/Plugin/asscrollable.js') }}"></script>
    <script src="{{ asset('remark/global/js/Plugin/slidepanel.js') }}"></script>
    <script src="{{ asset('remark/global/js/Plugin/switchery.js') }}"></script>

    {{-- Import body scripts --}}
    @yield('footer')
    @stack('scripts')

    <script>
      (function(document, window, $){
        'use strict';

        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
    </script>

  </body>
</html>
