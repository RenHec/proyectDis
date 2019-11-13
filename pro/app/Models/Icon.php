<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $table = 'icons';
    protected $fillable = ['name','metadata'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
