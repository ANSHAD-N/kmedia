<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Askbootstrap">
        <meta name="author" content="Askbootstrap">
        <title>K-Media | Home</title>

        <link rel="icon" type="image/png" href="/favicon.ico">
        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <link href="{{asset('css/home.css')}}" rel="stylesheet">
        <link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet">
        <link href="{{asset('css/owl.theme.css')}}" rel="stylesheet">
        <script src="https://apis.google.com/js/platform.js"></script> 
        <style>
            p {
    word-break: break-all;
    white-space: normal;
}
        </style>  
         
    </head>
    <body id="page-top" >
        @if($show_navigation)
            <nav class="navbar navbar-expand navbar-light bg-white static-top osahan-nav sticky-top" >
                &nbsp;&nbsp;

                <a class="navbar-brand mr-1" href="index.php"><img class="img-fluid logo" alt="kmedia-logo" src="{{ asset('/img/kmedia.png') }}"></a>
                <div style=" margin-left: 40px;">
                    <div class="g-ytsubscribe" style=" margin-left: 40px;" data-channel="GoogleDevelopers" data-layout="default"
                        data-count="default"></div>
                </div>
                
                <form action="" method="post"
                    class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-5 my-2 my-md-0 osahan-navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for..." name="key">
                        <div class="input-group-append">
                            <button class="btn btn-light" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                     <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

                <ul class="navbar-nav ml-auto ml-md-0 osahan-right-navbar">

                </ul>
            </nav>
            <div id="wrapper">
                <ul class="sidebar navbar-nav">
                    @if($show_panel)
                        @foreach($admin_sidebar as $sidebar)
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ $sidebar['url'] }}">
                                    <i class="fas fa-fw fa-{{ $sidebar['icon'] }}"></i>
                                    <span>{{ $sidebar['name'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    @else
                        @foreach($user_sidebar as $sidebar)
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ $sidebar['url'] }}">
                                    <i class="fas fa-fw fa-{{ $sidebar['icon'] }}"></i>
                                    <span>{{ $sidebar['name'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <div id="content-wrapper">
                    <div class="container-fluid pb-0">
                        <div class="top-mobile-search">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="mobile-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search for..." class="form-control">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-dark"><i
                                                        class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="video-block section-padding">
                            <div class="row">
                                 @yield('content')
                            </div>
                        </div>
                        <hr style="margin-top: 10vh;">
                    </div>
                    <footer class="sticky-footer" id="footer" >
                        <div class="container">
                            <div class="row no-gutters">
                                <div class="col-lg-6 col-sm-6">
                                    <p class="mt-1 mb-0">&copy; Copyright 2020 <strong class="text-dark">Carpe Daws</strong>.
                                        All Rights Reserved<br>
                                    </p>
                                </div>
                                <div class="col-lg-6 col-sm-6 text-right">

                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        @endif
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <script src="{{asset('js/owl.carousel.js')}}"></script>
    </body>
</html>
