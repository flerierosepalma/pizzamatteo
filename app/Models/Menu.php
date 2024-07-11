<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu'; // Specify the table name if it's different from the model name

    protected $primaryKey = 'menu_id';

    protected $fillable = [
        'menu_name', 'menu_description', 'menu_price', 'menu_base_price', 'menu_picture', 'menu_status', 
    ];

    public function cartItems()
    {
        return $this->hasMany(CustomerCart::class, 'menu_id');
    }

    public function resellerInventory()
    {
        return $this->hasOne(ResellerInventory::class, 'menu_id', 'menu_id');
    }
}

