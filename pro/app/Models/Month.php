<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $table = 'months';
    protected $fillable = ['month'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
