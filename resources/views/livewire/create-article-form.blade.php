<div class="col-12 col-md-6">
    
    <form wire:submit="store" class="form-box mb-3">
        <div class="mb-5">
            <h2 class="text-center">{{__("ui.insert_new_listing")}}</h2>
        </div>

        <div class="mb-3">
            <label for="articleTitle" class="form-label">{{__("ui.name")}} {{__("ui.item")}}</label>
            <input wire:model="title" type="text" class="form-control" id="articleTitle">
            <div class="text-danger">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="articleDescription" class="form-label">{{__("ui.description")}} {{__("ui.item")}}</label>
            <textarea wire:model="description" class="form-control" id="articleDescription" cols="30" rows="10"></textarea>
            <div class="text-danger">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-3 ">
            <label for="articlePrice" class="form-label">{{__("ui.price")}} {{__("ui.item")}}</label>
            <div class="input-group">
                <input wire:model="price" type="number" step="0.01" min="0" class="form-control" id="articlePrice">
                <span class="input-group-text">€</span>
            </div>
            <div class="text-danger">
                @error('price')
                    {{ $message }}
                @enderror
            </div>

        </div>
        <div class="mb-3">
            <p>{{__("ui.categories")}}</p>
            <div class="text-danger">
                @error('categories')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-3 d-flex flex-wrap gap-4">
            @foreach ($categories as $category)
                <div class="form-check ">
                    <input class="form-check-input" type="radio" wire:model="category_id" value="{{ $category->id }}">

                    <label class="form-check-label">
                        {{ __("ui.$category->name") }}
                    </label>
                </div>
            @endforeach
        </div>
        <div class="text-danger">
            @error('category_id')
                {{ $message }}
            @enderror
        </div>
        <div class="d-flex justify-content-center mt-5 ">
            <button type="submit" class="btn-submit ">{{__("ui.enter")}}</button>
        </div>
    </form>
    <x-message/>
</div>
