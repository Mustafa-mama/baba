<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vendoer extends Model
{
    use Notifiable;
    use HasFactory;
    protected $table = "vendores";
  protected $fillable = [
        'id','name','phone','addres','email','password',
        'active','cat_id','created_at','updated_at',

    ];

    protected $hidden = [
        'cat_id',
        'password'
    ];  
    public function ScopeActive($qure)    
    {
        return $qure->where('active' ,'1');

    }
    public function getActive()    
    {
       return $this->active == 1 ? 'مفعل' : 'غير مفعل'; 
        
    }
    public function setPasswordAttribute($password)
    {
        if(!empty($password)){
            $this->attributes['password'] = bcrypt($password);
        }
        
    }
    public function scopeSelected($qure)
    {
        return $qure->select('id','name','phone','email','addres','password','cat_id','active');

    }
    public function categoriy()
    {
        return $this->belongsTo('App\Models\Categrie', 'cat_id');
    }
    public function item()
    {
        return $this->hasMany(Item::class, 'vendor_id');
    }
}