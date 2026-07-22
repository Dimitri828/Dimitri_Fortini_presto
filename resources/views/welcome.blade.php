@section("navbar-position","position-absolute")
<x-layout>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12 p-0">
                <header class="header">
                    <video src="/media/header.mp4" autoplay muted loop playsinline class="img-fluid p-0"></video>
                </header>
            </div>
            <div class="col-12 ">
                <div class="swiper mySwiper py-5 px-5">
                    <div class="swiper-wrapper">
                        @forelse ($articles as $article )
                        <div class="swiper-slide">
                            <x-card :$article></x-card>
                        </div>
                        
                        @empty
                           <div class="swiper-slide">
                            <h3 class="text-center">Al momento non ci sono articoli disponibili</h3>
                        </div> 
                        @endforelse
                        
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
