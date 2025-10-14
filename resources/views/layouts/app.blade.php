<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom styles for this Page-->
    @yield('custom_styles')

</head>

<body class="theme-light"   >
    <div class="page">
        <div class="sticky-top" >
            <header class="navbar navbar-expand-md navbar-light sticky-top d-print-none" style= "background-image: url({{asset('img/imagem_header.jpeg')}}); 
   height: 122px;">
                <div class="container-xl"   >
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="d-flex justify-content-center align-items-center m-2">
            <img src="{{ asset('img/fd.png') }}" alt="{{ config('app.name') }}" class="mx-2" style="width: 100px;">
            <h2 class="text-center mx-2 p-2 text-white ">          
                        Sindicato dos Profissionais do Magistério Municipal de Capão da Canoa e Xangri-lá
                    </h2>
            </div>
              
                    <div class="navbar-nav flex-row order-md-last" >

                        @auth
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                                    aria-label="Open user menu">
                                    <span class="avatar avatar-sm"
                                        style="background-image: url(https://eu.ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }})"></span>
                                    <div class="d-none d-xl-block ps-2 text-white">
                                        {{ auth()->user()->name ?? null }}
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <a href="{{ route('profile.show') }}" class="dropdown-item">{{ __('Perfil') }}</a>
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" class="dropdown-item"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Sair') }}
                                        </a>
                                    </form>
                                </div>
                            </div>
                        @endauth

                    </div>
                </div>
            </header>
@if(!auth()->user()->isConvenio())
            @include('layouts.navigation')
@else
            @include('layouts.navigation_convenio')
@endif

        </div>
        <div class="page-wrapper">

            @yield('content')

            <footer class="footer footer-transparent d-print-none text-white" style="background-color: #009e2c;">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item text-white"><a href="#" target="_blank" class="link-secondary text-white"
                                        rel="noopener">Site SPMCCX</a></li>
                                <li class="list-inline-item">
                                    <a href="https:fabricadanet.com.br" target="_blank" class="link-secondary text-white"
                                        rel="noopener">Feito com
                                        <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon text-pink icon-filled icon-inline" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                        </svg>
                                        pela Fábrica da Net.
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    &copy; {{ date('Y') }}
                                    <a href="{{ config('app.url') }}"
                                        class="link-secondary text-white">SistemaDOC</a>
                                </li>
                                <li class="list-inline-item">
                                    Version 1.1.5
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    </div>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Page level custom scripts -->
    @yield('custom_scripts')

</body>

</html>
