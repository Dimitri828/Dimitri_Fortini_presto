@section('navbar-class', 'navbar-bg')
<x-layout>
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
                <h2 class="fw-semibold mb-3 product-title">{{ $article->title }}</h2>
                <h3 class=" h1 fw-bold h2 mb-1">{{ $article->price }} €</h3>
                <p class="text-muted mb-5">Iva Inclusa</p>
                <button class="btn-buy btn-detail">AGGIUNGI AL CARRELLO</button>
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
                                {{ $article->description }}
                            </p>

                        </div>


                        <div class="panel" id="information">
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto at quibusdam
                                officia. Asperiores laudantium quaerat, deserunt quam, similique quibusdam animi ut amet
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


        </div>
    </main>
</x-layout>
