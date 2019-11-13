<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';
    protected $fillable = ['price','current','products_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
