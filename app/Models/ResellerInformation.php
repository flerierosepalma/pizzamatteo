<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResellerInformation extends Model
{
    protected $table = 'reseller_information'; 
    protected $primaryKey = 'reseller_id';
    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'reseller_name',
        'reseller_gender',
        'reseller_birthday',
        'reseller_number',
        'store_province',
        'store_city',
        'store_barangay',
        'store_street',
        'store_gcash_name',
        'store_gcash_number',
        'store_name',
        'store_map',
        'store_request_schedule',
        'store_stock_deliver',
        'store_status'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    

}
