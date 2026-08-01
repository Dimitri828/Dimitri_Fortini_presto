<section class="product-info">

    <div class="accordion-tabs">

        <button class="accordion-tab active" data-tab="description">
            {{ __('ui.description') }}
        </button>

        <button class="accordion-tab" data-tab="information">
            {{ __('ui.information') }}
        </button>

        <button class="accordion-tab" data-tab="information2">
            Placeholder
        </button>

    </div>


    <div class="accordion-content">

        <div class="panel active" id="description">
            <p class="text-pr ">{{ $article->description }}</p>

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
