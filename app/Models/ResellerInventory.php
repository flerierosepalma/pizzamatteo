<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResellerInventory extends Model
{
    protected $table = 'reseller_stock';
    protected $primaryKey = null; // assuming no primary key
    public $incrementing = false; // assuming no auto-incrementing primary key
    protected $keyType = 'string'; // assuming primary key is not an integer

    protected $fillable = [
        'reseller_id',
        'stock_item_id',
        'menu_id',
        'inventory_stock',
        'restock_date',
        'expiry_date',
    ];

    protected $dates = [
        'restock_date',
        'expiry_date',
    ];

    public function reseller()
    {
        return $this->belongsTo(ResellerInformation::class, 'reseller_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
