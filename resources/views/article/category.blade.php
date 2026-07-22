@section('navbar-position', 'position-absolute')
<x-layout>
    <div class="container-fluid  p-0">
        <div class="row">
            <div class="col-12">
                <header class="bg-category d-flex align-items-end">
                    <h1 class="fw-bold text-wh category-title pb-2 ps-4 display-4">{{ $category->name }}</h1>
                </header>
            </div>
        </div>
    </div>
    <main class="row ">
        @forelse ($articles as $article)
            <div class="col-12 col-lg-3 col-md-6 my-5 mx-3">
                <x-card :$article></x-card>
            </div>

        @empty
            <div class="col-12 my-5 ">
                <h3 class=" text-center text-secondary fw-semibold mb-5">Al momento non sono presenti articoli per questa categoria.</h3>
            </div>
        @endforelse
        @auth
            <div class="col-12 text-center my-5 ">
                <a href="{{ route('article.create') }}" class="btn-add text-decoration-none text-center py-4">Pubblica un articolo</a>

            </div>
        @endauth
    </main>

</x-layout>
