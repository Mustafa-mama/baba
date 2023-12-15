<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $table = "languages";
    protected $fillable = [
        'abrr',
        'local',
        'name',
         'direction',
         'active',
         'created_at',
         'updated_at',
    ];

    protected $hidden = [
      
        
    ];
    public function ScopeActive($query)
    {
        return $query ->where('active','1'); 
    }
    public function scopeSelected($query)
    {
        return $query->select('id','abrr','name','local','direction','active');
    }
    public function getActive()    
    {
       return $this->active == 1 ? 'مفعل' : 'غير مفعل'; 
        
    }
}
