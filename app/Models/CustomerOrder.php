<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;

    protected $table = 'customer_order';
    protected $primaryKey = 'order_id';
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'user_id',
        'reseller_id',
        'order_total_amount',
        'purchase_type',
        'payment_type',
        'amount_paid',
        'payment_proof',
        'gcash_name',
        'gcash_number',
        'order_status',
        'order_timestamp',
        'order_expected_completion',
    ];

    public function customerInformation()
    {
        return $this->belongsTo(CustomerInformation::class, 'user_id', 'user_id');
    }

    public function orderInformation()
    {
        return $this->hasMany(CustomerOrderInformation::class, 'order_id', 'order_id');
    }
}
