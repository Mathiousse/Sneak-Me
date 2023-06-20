<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderItems extends Pivot
{
    protected $table = 'order_items';

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}