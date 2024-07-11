<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerInformation extends Model
{
    protected $table = 'customer_information';
    protected $primaryKey = 'user_id';
    public $timestamps = false; // Disable timestamps

    protected $fillable = [
    'customer_name', 'customer_gender', 'customer_birthday', 'customer_province', 'customer_store', 'customer_city', 'customer_barangay', 'customer_street', 'customer_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
