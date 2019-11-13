<?php

namespace App\Models;

use App\User;
use App\Models\Menu;
use App\Models\MenuRol;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rols';
    protected $fillable = ['name','administrative'];

    public function setNameAttribute($valor) {
        $this->attributes['name'] = strtoupper($valor);    
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_rols');
    }

    public function user()
    {
        return $this->belongsTo(User::class)->using(MenuRol::class);   
    }
}
