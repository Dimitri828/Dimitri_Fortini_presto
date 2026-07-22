<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Article;

class Category extends Model
{
    public function articles():HasMany{
        return $this->hasMany(Article::class);
    }
}
