<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Pembayaran Kos', 'Pembayaran Kos') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

     <!-- Vendor CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="{{  asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{  asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{  asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{  asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{  asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{  asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{  asset('vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{  asset('css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('Pembayaran Kos', 'Pembayaran Kos') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            {{-- Profile Nav --}}
                            <li class="nav-item ">

                                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                                  <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                                  <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                                </a><!-- End Profile Iamge Icon -->
                      
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                  <li class="dropdown-header">
                                    <h6>Nagumo</h6>
                                    <span>Full Stack Developer</span>
                                  </li>
                                  <li>
                                    <hr class="dropdown-divider">
                                  </li>
                      
                                  <li>
                                    <a class="dropdown-item d-flex align-items-center" href="/post">
                                      <i class="bi bi-person"></i>
                                      <span>Pembayaran</span>
                                    </a>
                                  </li>
                                  <li>
                                    <hr class="dropdown-divider">
                                  </li>
                      
                                  <li>
                                    <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                      <i class="bi bi-gear"></i>
                                      <span>Account Settings</span>
                                    </a>
                                  </li>
                                  <li>
                                    <hr class="dropdown-divider">
                                  </li>
                      
                                  <li>
                                    <a class="dropdown-item d-flex align-items-center" href="/about">
                                      <i class="bi bi-question-circle"></i>
                                      <span>Need Help?</span>
                                    </a>
                                  </li>
                                  <li>
                                    <hr class="dropdown-divider">
                                  </li>
                      
                                  <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                      <i class="bi bi-box-arrow-right"></i>
                                        <span>{{ __('Sign Out') }}</span>
                                      
                                      
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>
                                    </a>
                                  </li>
                      
                                </ul><!-- End Profile Dropdown Items -->
                            </li>                            
                            <!-- End Profile Nav -->

                            <!-- ======= Sidebar ======= -->
                            {{-- <aside id="sidebar" class="sidebar">

                              <ul class="sidebar-nav" id="sidebar-nav">

                                <li class="nav-item">
                                  <a class="nav-link collapsed" href="index.html">
                                    <i class="bi bi-grid"></i>
                                    <span>Dashboard</span>
                                  </a>
                                </li><!-- End Dashboard Nav -->

                                <li class="nav-item">
                                  <a class="nav-link collapsed" href="/petugas">
                                    <i class="bi-file-earmark-person"></i>
                                    <span>Register Petugas</span>
                                  </a>
                                </li>

                                <li class="nav-item">
                                  <a class="nav-link collapsed" href="/penyewa">
                                    <i class="bi-person-check-fill"></i>
                                    <span>Register Penyewa</span>
                                  </a>
                                </li>

                                <li class="nav-item">
                                  <a class="nav-link collapsed" href="/">
                                    <i class="bi-cart-check"></i>
                                    <span>Pembayaran</span>
                                  </a>
                                </li>

                                <li class="nav-heading">Pages</li>

                                <li class="nav-item">
                                  <a class="nav-link collapsed" href="users-profile.html">
                                    <i class="bi bi-person"></i>
                                    <span>Profile</span>
                                  </a>
                                </li><!-- End Profile Page Nav -->

                                <li class="nav-item">
                                  <a class="nav-link collapsed" href="pages-faq.html">
                                    <i class="bi bi-question-circle"></i>
                                    <span>F.A.Q</span>
                                  </a>
                                </li><!-- End F.A.Q Page Nav -->

                                <li class="nav-item">
                                  <a class="nav-link collapsed" href="pages-contact.html">
                                    <i class="bi bi-envelope"></i>
                                    <span>Contact</span>
                                  </a>
                                </li><!-- End Contact Page Nav -->

                                <li class="nav-item">
                                  <a class="nav-link collapsed" href="/register">
                                    <i class="bi bi-card-list"></i>
                                    <span>Register</span>
                                  </a>
                                </li><!-- End Register Page Nav -->

                                <li class="nav-item">
                                  <a class="nav-link collapsed" href="/login">
                                    <i class="bi bi-box-arrow-in-right"></i>
                                    <span>Login</span>
                                  </a>
                                </li><!-- End Login Page Nav -->

                                <li class="nav-item">
                                  <a class="nav-link collapsed" href="/">
                                    <i class="bi bi-dash-circle"></i>
                                    <span>Error 404</span>
                                  </a>
                                </li><!-- End Error 404 Page Nav -->

                                <li class="nav-item">
                                  <a class="nav-link collapsed" href="/">
                                    <i class="bi bi-file-earmark"></i>
                                    <span>Blank</span>
                                  </a>
                                </li><!-- End Blank Page Nav -->

                              </ul>

                            </aside><!-- End Sidebar--> --}}

                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

   
</body>
</html>
