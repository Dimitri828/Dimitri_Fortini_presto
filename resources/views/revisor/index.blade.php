@section('navbar-position', 'position-absolute')
<x-layout>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12 bg-category d-flex align-items-end">
                <h1 class="fw-bold title-category display-4 text-wh ps-3 pb-2">Revisor Dashboard</h1>
            </div>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="row justify-content-center">
            <div class="col-5 alert alert-success text-center shadow rounded">
                {{ session('message') }}
            </div>
        </div>
    @endif
    @if ($article_to_check)
        <main class="container my-5">
            <div class="row">
                <div class="col-12 col-md-7 text-center">
                    {{-- SWIPER --}}
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="/media/placeholder-show/1.png" />
                            </div>
                            <div class="swiper-slide">
                                <img src="/media/placeholder-show/2.png" />
                            </div>
                            <div class="swiper-slide">
                                <img src="/media/placeholder-show/3.png" />
                            </div>
                            <div class="swiper-slide">
                                <img src="/media/placeholder-show/5.png" />
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper3">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="/media/placeholder-show/1.png" />
                            </div>
                            <div class="swiper-slide">
                                <img src="/media/placeholder-show/2.png" />
                            </div>
                            <div class="swiper-slide">
                                <img src="/media/placeholder-show/3.png" />
                            </div>

                            <div class="swiper-slide">
                                <img src="/media/placeholder-show/5.png" />
                            </div>
                        </div>
                    </div>
                    {{-- SWIPER END --}}
                </div>
                <div class="col-12 col-md-4 d-flex flex-column align-items-start justify-content-center ps-5 ">
                    <h2 class="fw-semibold mb-3 product-title">{{ $article_to_check->title }}</h2>
                    <h3>Autore: {{ $article_to_check->user->name }}</h3>
                    <h4 class="fst-italic text-muted mb-3"># {{ $article_to_check->category->name }}</h4>

                    <h3 class=" h1 fw-bold h2 mb-1">{{ $article_to_check->price }} €</h3>
                    <p class="text-muted mb-4">Iva Inclusa</p>

                    <div class="d-flex pb-4 justify-content-around gap-5">
                        <form action="{{ route('reject',["article" =>$article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-review-danger btn-lg  py-2 px-4 fw-bold text-wh"><i
                                    class="fa-solid fa-x text-wh "></i> Rifiuta </button>
                        </form>
                        <form action="{{ route('accept',["article" =>$article_to_check] ) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button class="btn btn-review-success btn-lg py-2 px-5 fw-bold text-wh"><i
                                    class="fa-solid fa-check text-wh"></i> Accetta</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    {{-- ACCORDION --}}
                    <section class="product-info">

                        <div class="accordion-tabs">

                            <button class="accordion-tab active" data-tab="description">
                                Descrizione
                            </button>

                            <button class="accordion-tab" data-tab="information">
                                Informazioni
                            </button>

                            <button class="accordion-tab" data-tab="information2">
                                Placeholder
                            </button>

                        </div>


                        <div class="accordion-content">

                            <div class="panel active" id="description">
                                <p class="text-pr ">
                                    {{ $article_to_check->description }}
                                </p>

                            </div>


                            <div class="panel" id="information">
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto at quibusdam
                                    officia. Asperiores laudantium quaerat, deserunt quam, similique quibusdam animi ut
                                    amet
                                    nulla est modi repellat voluptatum pariatur labore quisquam?
                                </p>

                            </div>


                            <div class="panel" id="information2">
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea sunt dolor voluptatibus
                                    reprehenderit quia sit asperiores aliquid, cumque libero fugit? Hic eligendi, quis
                                    laboriosam rem autem beatae ea pariatur accusamus!
                                </p>

                            </div>

                        </div>

                    </section>
                    {{-- ACCORDION END --}}
                </div>
            @else
                <div class="row justify-content-center align-items-center ">
                    <div class="col 12">
                        <h2 class="text-secondary fw-semibold text-center mt-5">Nessun articolo da revisionare.</h2>
                    </div>
                </div>
    @endif

    </div>
    </main>
</x-layout>
