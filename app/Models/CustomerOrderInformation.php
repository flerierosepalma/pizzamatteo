<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrderInformation extends Model
{
    use HasFactory;

    protected $table = 'customer_order_information';
    protected $primaryKey = 'order_item_id';
    public $timestamps = true;

    protected $fillable = [
        'order_item_id',
        'stock_item_id',
        'order_id',
        'menu_id',
        'toast',
        'quantity',
        'amount',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(CustomerOrder::class, 'order_id', 'order_id');
    }
}
