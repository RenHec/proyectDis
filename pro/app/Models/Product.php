<?php

namespace App\Models;

use App\Models\Price;
use App\Models\Category;
use App\Models\Sentence;
use App\Models\DetailOrder;
use App\Models\Presentation;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','categories_id','presentations_id'];

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function presentation()
    {
        return $this->hasOne(Presentation::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function sentences()
    {
        return $this->hasMany(Sentence::class);
    }

    public function detail()
    {
        return $this->belongsTo(DetailOrder::class);
    }
}
