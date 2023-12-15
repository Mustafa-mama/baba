<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = "admins";
    protected $fillable = [
        'name',
        'email',
        'password',
         'img',
         'created_at',
         'updated_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
