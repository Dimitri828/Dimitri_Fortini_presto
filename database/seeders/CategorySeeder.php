<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public $categories = [
        "Elettronica",
        "Abbigliamento",
        "Salute e Bellezza",
        "Casa e Giardinaggio",
        "Giocattoli",
        "Sport",
        "Animali Domestici",
        "Libri e Riviste",
        "Accessori",
        "Motori",
    ];
    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create([
                "name" => $category,
            ]);
        }
    }
}
