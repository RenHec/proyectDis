<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Balance;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table = 'years';
    protected $fillable = ['year'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }    

    public function balance()
    {
        return $this->belongsTo(Balance::class);
    }    
}
