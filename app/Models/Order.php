<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'invoice_id',
        'shipping_id',
        'user_id',
        'amount',
        'resi',
        'status',
    ];
}
