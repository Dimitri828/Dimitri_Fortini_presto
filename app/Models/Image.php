<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    protected $fillable = ["path",];

    public function article() :BelongsTo{
        return $this->belongsTo(Article::class);
    }
}
