<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cart_id', // temporário para testes
        'address_id',
        'billing_address_id',
        'payment_type_id',
        'total'
    ];
}
