<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'date', 'status', 'total_price', 'shipping_address', 'billing_address', 'payment_info'
    ];

    public function user()
    {
       
}
}