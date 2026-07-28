<?php

namespace App\Livewire;

use App\Jobs\ResizeImage;
use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class CreateArticleForm extends Component
{
    use WithFileUploads;    

    public $article;
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
    public $images=[];
    public $temporary_images;

    public function store()
    {
        $this->validate();



        $this->article=Article::create([
            "title" => $this->title,
            "description" => $this->description,
            "price" => $this->price,
            "category_id" => $this->category_id,
            "user_id" => Auth::id(),
        ]);

        if (count($this->images) >0) {
            foreach ($this->images as $image) {
                $newFileName="articles/{$this->article->id}";
                $newImage= $this->article->images()->create(["path"=> $image->store($newFileName,"public")]);
                dispatch(new ResizeImage($newImage->path,300,300));
               
            }
            File::deleteDirectory(storage_path("/app/livewire-tmp"));
        }
        session()->flash("message", "Annuncio creato con successo.");
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->title = "";
        $this->description = "";
        $this->price = "";
        $this->category_id = "";
        $this->images=[];
        $this->temporary_images=[];
    }

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            "temporary_images.*"=>"image|max:1024",
            "temporary_images" => "max:6"
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        if (in_array($key,array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }
    public function render()
    {
        return view('livewire.create-article-form');
    }
}
