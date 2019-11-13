<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuRol extends Model
{
    protected $table = 'menu_rols';
    protected $fillable = ['rols_id','menus_id'];
}
