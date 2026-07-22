<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
class CreateArticleForm extends Component
{
    
    public $category;
    #[Validate('required', message: "Il campo è obbligatorio.")]
    public $title;
    #[Validate('required', message: "Il campo è obbligatorio.")]
    public $description;
    #[Validate('required', message: "Il campo è obbligatorio.")]
    public $price;
    #[Validate('required', message: "Seleziona almeno una categoria.")]
    public $category_id;
    public $user_id;

    public function store()
    {
        $this->validate();



        Article::create([
            "title" => $this->title,
            "description" => $this->description,
            "price" => $this->price,
            "category_id" => $this->category_id,
            "user_id" => Auth::id(),
        ]);
        $this->resetForm();
        session()->flash("message", "Annuncio creato con successo.");
    }

    public function resetForm()
    {
        $this->title = "";
        $this->description = "";
        $this->price = "";
        $this->category_id = "";
    }

    public function render()
    {
        return view('livewire.create-article-form');
    }
}
