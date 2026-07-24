<nav class="navbar navbar-expand pb-0 @yield('navbar-class') @yield('navbar-position') w-100 ">
    <div class="container-fluid">
        <div class="row w-100 mx-0">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('media/logobianco2.png') }}" alt="logo sito"
                        class="img-fluid logo logo-bianco ms-3 my-3">
                    <img src="{{ asset('media/logonero2.png') }}" alt="logo sito"
                        class="img-fluid logo logo-nero ms-3 my-3 ">
                </a>
                <div class="d-flex align-items-center gap-4">
                    <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars navbar-toggler-icon text-white border-white"></i>
                    </button>
                    @guest
                        <a href="{{ route('login') }}" class="text-decoration-none  acces">Accedi</a>
                        <a href="{{ route('register') }}" class="text-decoration-none  acces">Registrati</a>
                    @endguest
                    @auth
                        <div class="dropdown d-flex align-items-end">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-circle-user fa-2x "></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        <button type="submit"
                                            class="text-decoration-none dropdown-item  text-blk h-100">Esci
                                            dall'account</button>
                                    </form>
                                </li>

                            </ul>
                        </div>


                    @endauth
                </div>

            </div>
            <div class="col-12  ">
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-between w-100">
                        <li class="nav-item">
                            <a class="nav-link pb-0" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" role="button" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Categorie
                            </a>
                            <ul class="dropdown-menu  dropdown-custom m-0 ">
                                <div class="row mx-0">
                                    @foreach ($categories as $category)
                                        <li class="col-lg-4 nav-item  mb-3 ">
                                            <a href="{{route("article.category",$category)}}" class="text-decoration-none text-blk fw-semibold text-sec">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </div>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-wh" href="{{ route('article.index') }}">Tutti gli Annunci</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link font-wh" href="{{ route('article.create') }}">Pubblica Annuncio</a>
                            </li>
                            @if (Auth::user()->is_revisor)
                            <li class="nav-item">
                                <a class="nav-link font-wh position-relative" href="{{ route('revisor.index') }}">Zona Revisore
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{\App\Models\Article::toBeRevisedCount()}}</span>
                                </a>
                            </li>
                                
                            @endif
                        @endauth


                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
