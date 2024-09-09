<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;

    protected $table = 'social_link';

    protected $primaryKey  = 'id';

    protected $fillable = [
        'social_name',
        'social_link',
        'social_url',
        'social_status'
    ];
}
