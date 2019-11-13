<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressOrder extends Model
{
    protected $table = 'progress_orders';
    protected $fillable = ['purchased_amount','order_statuses_id','detail_orders_id'];
}
