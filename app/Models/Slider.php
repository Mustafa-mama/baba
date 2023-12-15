<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = "sliders";
    protected $fillable = [
        'id','imge',
        'created_at','updated_at',
        
    ];

    protected $hidden = [
        'vendor_id',        
        'created_at',
        'updated_at'
    ];
}
