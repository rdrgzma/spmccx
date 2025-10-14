<div class="navbar-expand-md " style="background-color: #009e2c;">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light" style="background-color: #009e2c;">
            <div class="container-xl">
                <ul class="navbar-nav">

                    <li class="nav-item @if (request()->routeIs('home')) active @endif">
                        <a class="nav-link" href="{{ route('home') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block text-white">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title text-white">
                                {{ __('Início') }}
                            </span>
                        </a>
                    </li>

                    <li class="nav-item dropdown @if (request()->routeIs('home')) active @endif">
                        <a class="nav-link dropdown-toggle text-white" hhref="#navbar-extra" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block text-white">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-dots"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                    </path>
                                    <path d="M9 14v.01"></path>
                                    <path d="M12 14v.01"></path>
                                    <path d="M15 14v.01"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title text-white">
                                {{ __('Cadastro') }}
                            </span>
                        </a>
                        <div class="dropdown-menu">

                            @if (auth()->user()->origem == 'site' && auth()->user()->has_cadastro_completo == '0')
                              
                                <a class="dropdown-item"
                                    href="{{ route('associado.form.pessoal', ['associado' => auth()->user()->id]) }}">
                                    {{ __('Associado') }}
                                </a>
                            @else
                                <a class="dropdown-item" href="{{ route('associado.create') }}">
                                    {{ __('Associado') }}
                            @endif

                            <a class="dropdown-item"
                                href="{{ route('dependentes.associado.show', ['id' => auth()->user()->id]) }}">
                                Dependente
                            </a>

                        </div>

                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#navbar-extra" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block text-white">
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-list-details" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M13 5h8"></path>
                                    <path d="M13 9h5"></path>
                                    <path d="M13 15h8"></path>
                                    <path d="M13 19h5"></path>
                                    <rect x="3" y="4" width="6" height="6" rx="1">
                                    </rect>
                                    <rect x="3" y="14" width="6" height="6" rx="1">
                                    </rect>
                                </svg>
                            </span>
                            <span class="nav-link-titl text-white">
                                Documentos
                            </span>
                        </a>

                        <div class="dropdown-menu">

                            <div class="dropend">

                                <a class="dropdown-item" href=#>
                                    Enviar Formulário de Cadastro
                                </a>
                                <a class="dropdown-item" href=#>
                                    Baixar Formulário de Cadastro
                                </a>

                                <a class="dropdown-item" href=#>
                                    Finalize o seu cadastro
                                </a>
                            </div>

                    </li>
                    @if (Auth::user()->isAdmin())
                        <li class="nav-item dropdown text-white">
                            <a class="nav-link dropdown-toggle text-white" href="#navbar-extra"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block text-white">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-list-details" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M13 5h8"></path>
                                        <path d="M13 9h5"></path>
                                        <path d="M13 15h8"></path>
                                        <path d="M13 19h5"></path>
                                        <rect x="3" y="4" width="6" height="6"
                                            rx="1"></rect>
                                        <rect x="3" y="14" width="6" height="6"
                                            rx="1"></rect>
                                    </svg>
                                </span>
                                <span class="nav-link-title text-white">
                                    {{ __('Associados') }}
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('lista.index') }}">
                                    Listar cadastros
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.form.pessoal') }}">
                                    Cadastrar novo associado
                                </a>

                            </div>
                        </li>

                        <li class="nav-item @if (request()->routeIs('about')) active @endif">
                            <a class="nav-link" href="{{ route('about') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block text-white">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/file-text -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-info-circle" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                        <polyline points="11 12 12 12 12 16 13 16"></polyline>
                                    </svg>
                                </span>
                                <span class="nav-link-title text-white">
                                    {{ __('Arquivos') }}
                                </span>
                            </a>
                        </li>

                        <li class="nav-item dropdown text-white">
                            <a class="nav-link dropdown-toggle text-white" href="#navbar-extra"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block text-white">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-list-details" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M13 5h8"></path>
                                        <path d="M13 9h5"></path>
                                        <path d="M13 15h8"></path>
                                        <path d="M13 19h5"></path>
                                        <rect x="3" y="4" width="6" height="6"
                                            rx="1"></rect>
                                        <rect x="3" y="14" width="6" height="6"
                                            rx="1"></rect>
                                    </svg>
                                </span>
                                <span class="nav-link-title text-white">
                                    Listas de Presenças
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('lista.geral') }}">
                                    Geral
                                </a>
                                <a class="dropdown-item" href="{{ route('lista.capao') }}">
                                    Capão da Canoa
                                </a>
                                <a class="dropdown-item" href="{{ route('lista.xangrila') }}">
                                    Xangri-Lá
                                </a>
                            </div>


                        </li>
                        <li class="nav-item text-white">
                            <a class="nav-link" href="{{ route('convenios') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block text-white">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/file-text -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-info-circle" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                        <polyline points="11 12 12 12 12 16 13 16"></polyline>
                                    </svg>
                                </span>
                                <span class="nav-link-title text-white">
                                    {{ __('Convênios') }}
                                </span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
