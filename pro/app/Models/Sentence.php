<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    protected $table = 'sentences';
    protected $fillable = ['name','current','products_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
