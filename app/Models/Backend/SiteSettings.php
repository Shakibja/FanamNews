<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    use HasFactory;

    protected $primaryKey  = 'id';
    protected $table = 'site_settings';

    protected $fillable = [
        'site_title',
        'meta_title',
        'header_logo',
        'favicon',
        'editor_name',
        'phone_number',
        'email',
        'address',
        'copyright'
    ];
}
