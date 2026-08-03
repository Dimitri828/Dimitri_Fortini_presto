@section('navbar-position', 'position-absolute')
<x-layout>
    <div class="container-fluid  p-0">
        <div class="row">
            <div class="col-12">
                <header class="bg-category d-flex align-items-end">
                    <h1 class="fw-bold text-wh category-title pb-2 ps-4 display-4">{{ __("ui.$category->name") }}</h1>
                </header>
            </div>
        </div>
    </div>
    <main class="row justify-content-evenly">
        @forelse ($articles as $article)
            <div class="col-12 col-xl-3 col-lg-5 my-5 mx-3">
                <x-card :$article></x-card>
            </div>

        @empty
            <div class="col-12 my-5 ">
                <h3 class=" text-center text-secondary fw-semibold mb-5"> {{ __('ui.no_articles_in_category') }}
                </h3>
            </div>
            @auth
                <div class="col-12 text-center my-5 ">
                    <a href="{{ route('article.create') }}" class="btn-add text-decoration-none text-center py-4">
                        {{ __('ui.publish_article') }}
                    </a>

                </div>
            @endauth
        @endforelse
    </main>

</x-layout>
