<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey  = 'id_category';

    protected $fillable = [
        'category_id',
        'category_name',
        'category_slug',
        'category_status',
        'priority'
    ];


    public function postNews()
    {
        return $this->hasMany(PostNews::class);
    }
}
