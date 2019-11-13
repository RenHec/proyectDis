<?php

namespace App\Models;

use App\Models\DetailOrder;
use App\Models\ProgressOrder;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'order_statuses';
    protected $fillable = ['status'];

    public function details()
    {
        return $this->belongsToMany(DetailOrder::class)->using(ProgressOrder::class);            
    }      
}
