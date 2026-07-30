<nav class="navbar navbar-expand-xl pb-0 @yield('navbar-class') @yield('navbar-position') w-100 ">
    <div class="container-fluid">
        <div class="row w-100 mx-0">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <a class="navbar-brand " href="{{ route('home') }}">
                    <img src="{{ asset('media/logobianco2.png') }}" alt="logo sito"
                        class="img-fluid logo logo-bianco ms-md-3 mt-md-3 ">
                    <img src="{{ asset('media/logonero2.png') }}" alt="logo sito"
                        class="img-fluid logo logo-nero ms-md-3 mt-md-3 ">
                </a>
                {{-- SEARCH --}}
                <form action="{{ route('article.search') }}" method="GET" role="search" class="input-search">
                    <div class="input-group d-none d-xl-flex ">
                        <button type="submit" class="btn btn-search"><i
                                class="fa-solid fa-magnifying-glass fa-2x text-wh "></i></button>
                        <input type="search" name="query" class="form-control input-search mb-1"
                            placeholder="{{ __('ui.search') }}" aria-label="search">
                    </div>
                </form>
                {{-- SEARCH END --}}
                <div class="d-flex justify.content-end align-items-center  ">
                    @guest
                        <a href="{{ route('login') }}"
                            class="text-decoration-none d-none d-xl-flex me-3 acces">{{ __('ui.login') }}</a>
                        <a href="{{ route('register') }}"
                            class="text-decoration-none  d-none d-xl-flex me-3 acces">{{ __('ui.register') }}</a>
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
                                            class="text-decoration-none dropdown-item  text-blk h-100">{{ __('ui.logout') }}</button>
                                    </form>
                                </li>

                            </ul>
                        </div>


                    @endauth
                    <button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars navbar-toggler-icon text-white border-white"></i>
                    </button>
                    <div class="d-none d-xl-flex">
                        <x-_locale lang="it" />
                        <x-_locale lang="uk" />
                        <x-_locale lang="es" />
                    </div>
                </div>

            </div>
            {{-- SECOND ROW --}}
            <div class="col-12  ">
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav  mb-2 mb-lg-0 d-flex justify-content-between  w-100 align-items-start">
                        {{-- <x-lg-navbar /> --}}

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('home') }}">{{ __('ui.home') }}</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link font-wh"
                                href="{{ route('article.index') }}">{{ __('ui.all_articles') }}</a>
                        </li>
                        {{-- CATEGORIES --}}
                        <li class="nav-item ">
                            <a href="#categoriesMenu" class="nav-link active-color" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="categoriesMenu">
                                {{ __('ui.categories') }}
                            </a>
                            <div class="collapse dropdown-custom m-0 w-100" id="categoriesMenu">
                                <ul class="row mx-0 py-0 my-0 list-unstyled w-100 ul-dropdown">
                                    @foreach ($categories as $category)
                                        <li class="col-lg-4 nav-item mb-3">
                                            <a href="{{ route('article.category', $category) }}"
                                                class="text-decoration-none text-blk fw-semibold text-sec">
                                                {{ __("ui.$category->name") }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        {{-- <li class="nav-item text-center">
                            <a href="#" role="button" class="nav-link active-color dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('ui.categories') }}
                            </a>
                            <ul class="dropdown-menu  dropdown-custom m-0 ">
                                <div class="row mx-0 py-0">
                                    @foreach ($categories as $category)
                                        <li class="col-lg-4 nav-item  mb-3 ">
                                            <a href="{{ route('article.category', $category) }}"
                                                class="text-decoration-none text-blk fw-semibold text-sec">{{ __("ui.$category->name") }}</a>
                                        </li>
                                    @endforeach
                                </div>
                            </ul>
                        </li> --}}
                        @auth
                            <li class="nav-item">
                                <a class="nav-link font-wh "
                                    href="{{ route('article.create') }}">{{ __('ui.publish_article') }}</a>
                            </li>
                            @if (Auth::user()->is_revisor)
                                <li class="nav-item">
                                    <a class="nav-link font-wh position-relative"
                                        href="{{ route('revisor.index') }}">{{ __('ui.reviewer_area') }}
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ \App\Models\Article::toBeRevisedCount() }}</span>
                                    </a>
                                </li>
                            @endif
                        @endauth
                        <li class="nav-item ">
                            <a href="#languagesMenu" class="nav-link active-color w-100" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="languagesMenu">
                                {{ __('ui.languages') }}
                            </a>
                            <div class="collapse dropdown-custom m-0 w-100" id="languagesMenu">
                                <ul class="row mx-0 py-0 my-0 list-unstyled w-100 ul-dropdown">
                                    <li>
                                        <x-_locale lang="it" />                                        
                                    </li>
                                    <li>
                                        <x-_locale lang="uk" />                                        
                                    </li>
                                    <li>
                                        <x-_locale lang="es" />                                        
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
