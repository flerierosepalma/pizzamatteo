<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $timestamps = false; // Disable timestamps

    protected $fillable = [
        'user_email', 'user_password', 'user_role',
    ];

    protected $hidden = [
        'user_password',
    ];

    public function getAuthPassword()
    {
        return $this->user_password;
    }

    public function customerInformation()
    {
        return $this->hasOne(CustomerInformation::class, 'user_id');
    }

    public function resellerInformation()
    {
        return $this->hasOne(ResellerInformation::class, 'user_id');
    }

    public function customerCart()
    {
        return $this->hasMany(CustomerCart::class, 'user_id');
    }
}
