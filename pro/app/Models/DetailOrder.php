<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderStatus;
use App\Models\ProgressOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailOrder extends Model
{
    use SoftDeletes;

    protected $table = 'detail_orders';
    protected $fillable = ['quantity','sale_price','subtotal','observation',
                           'complete','products_id','orders_id'];
    protected $dates = ['deleted_at'];

    public function product()
    {
        return $this->hasOne(Product::class);
    }

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

    public function status()
    {
        return $this->belongsToMany(OrderStatus::class)->using(ProgressOrder::class);            
    }    
}
