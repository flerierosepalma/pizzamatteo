<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerForecastingMenu extends Model
{
    use HasFactory;

    protected $table = 'menu'; // Define the table name explicitly

    public function scopeForOwnerForecasting($query)
    {
        // Add any specific filtering or logic for owner forecasting menus here (optional)
        return $query;
    }
}