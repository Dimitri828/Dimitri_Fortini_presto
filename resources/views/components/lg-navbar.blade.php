 {{-- SEARCH --}}
 <form action="{{ route('article.search') }}" method="GET" role="search" class="lg-navbar input-search nav-item my-3">
     <div class="input-group  ">
         <input type="search" name="query" class="form-control input-search mb-1" placeholder="{{ __('ui.search') }}"
         aria-label="search">
         <button type="submit" class="btn btn-search"><i class="fa-solid fa-magnifying-glass fa-2x text-wh "></i></button>
     </div>
 </form>
 {{-- SEARCH END --}}
 @guest
 <li class="nav-item">
     <a href="{{ route('login') }}" class="text-decoration-none lg-navbar  me-3 acces nav-link">{{ __('ui.login') }}</a>

 </li>
 <li class="nav-item">
     <a href="{{ route('register') }}" class="text-decoration-none lg-navbar  me-3 acces nav-link">{{ __('ui.register') }}</a>

 </li>
 @endguest
