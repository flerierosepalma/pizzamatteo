<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerCart extends Model
{
    protected $table = 'customer_cart'; 
    protected $primaryKey = 'cart_item_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'menu_id', 'toast', 'quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function menuItem()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}