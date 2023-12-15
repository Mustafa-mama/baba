<?php

namespace App\Models;

use App\Observers\CategorieObserve;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendoer;



class Categrie extends Model
{
    use HasFactory;
    protected $table = "min_catrgories";
    protected $fillable = [
        'translation_lang',
        'tarnslation_off',
        'name',
         'sulg',
         'active',
         'imge',
         'created_at',
         'updated_at',
    ];

    protected $hidden = [
        
    ];
    protected static function boot()
    {
    
        parent::boot();
        Categrie::observe(CategorieObserve::class);
    }
    public function ScopeActive($query)
    {
        return $query-> where('active','1');
    }
    public function getActive()    
    {
       return $this->active == 1 ? 'مفعل' : 'غير مفعل'; 
        
    }

    public function scopeSelected($query)
    {
        return $query->select('id','translation_lang','imge','tarnslation_off','name','sulg','active');
    }

    public function getImgeAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";

    }
    public function categorie()
    {
       return $this ->hasMany(self::class,'tarnslation_off');
    }
    public function vendores()
    {
       return $this->hasMany(Vendoer::class, 'cat_id');
    }
}
