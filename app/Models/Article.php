<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = [
        "title",
        "description",
        "price",
        "category_id",
        "user_id",
    ];

    public function category(): BelongsTo{
       return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo{
       return $this->belongsTo(User::class);
    }

    public function setAccepted($value){
        $this->isAccepted=$value;
        $this->save();
        return true;
    }

    public static function toBeRevisedCount(){
        return Article::where("is_accepted",null)->count();
    }
}
