<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $table = 'CUSTOMER';

    protected $fillable = [
        'customer_name',
        'email',
        'phone_number'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
