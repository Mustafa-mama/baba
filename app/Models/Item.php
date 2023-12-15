<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;
    protected $table = "items";
    protected $fillable = [
        'id','translation_lang','translation_off','name','vendor_id','price','status',
        'active','viwes','contry','descrip','imge','created_at','updated_at',

    ];

    protected $hidden = [
        'vendor_id',        
        'created_at',
        'updated_at'
    ];

    public function ScopeSelected($qu)
    {
       return $qu->select('id','vendor_id','translation_lang','translation_off','name','contry','descrip','price','status','imge','active',);  

    }
    public function ScopeActive($query)
    {
        return $query-> where('active','1');
    }
    // public function getActive()    
    // {
    //    return $this->active == 1 ? 'جدجد' : 'شبة جديد'; 
        
    // }



    public function getImgeAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";

    }
    public function item()
    {
       return $this ->hasMany(self::class,'translation_off');
    }

    public function vendor(){
       return $this->belongsTo(Vendoer::class,'vendor_id');
    }
}
