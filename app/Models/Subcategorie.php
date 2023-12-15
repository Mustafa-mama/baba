<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategorie extends Model
{
    use HasFactory;
    protected $table = "Subcategories";
    protected $fillable = [
        'translation_lang',
        'translation_off',
        'name',
         'slug',
         'active',        
         'created_at',
         'updated_at',
    ];

    protected $hidden = [
        
    ];
}
