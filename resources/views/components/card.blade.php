<div class="bg-wh shadow card-custom">
    <a href="{{ route('article.show', compact('article')) }}" class="card-link">
        @if ($article->images->isNotEmpty())
        <div class="overflow-hidden card-container">
            <img src="{{Storage::url($article->images->first()->path)}}" alt="Placeholder immagine prodotto" class="img-fluid card-img mb-4">

        </div>
        
        @else
        <div class="overflow-hidden card-container">

            <img src="/media/product.png" alt="Placeholder immagine prodotto" class="card-img mb-4">
        </div>
        @endif

        <div class="text-center">
            <h3 class="fw-bold mb-3 title-card">{{ $article->title }}</h3>

            <p class="mb-5 py-2 px-3 text-pr">
                {{ $article->description }}
            </p>

            <p class="mb-3 fw-semibold h3">
                {{ $article->price }}€
            </p>
        </div>
    </a>

    <div class="text-center pb-4">
        <button class="btn-buy">
            {{ __('ui.add_to_cart') }}
        </button>
    </div>
</div>
