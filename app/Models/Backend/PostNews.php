<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostNews extends Model
{
    use HasFactory;

    protected $primaryKey  = 'id_news';
    protected $table = "post_news";



    public function category()
    {
        return $this->belongsTo(Category::class, 'category_slug','category_slug');
    }
}
