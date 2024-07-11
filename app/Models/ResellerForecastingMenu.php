<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResellerForecastingMenu extends Model
{
    use HasFactory;

    protected $table = 'menu'; // Define the table name explicitly

    public function scopeForResellerForecasting($query)
    {
        // Add any specific filtering or logic for reseller forecasting menus here (optional)
        return $query;
    }
}
