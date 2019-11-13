<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    protected $table = 'presentations';
    protected $fillable = ['name','description'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
