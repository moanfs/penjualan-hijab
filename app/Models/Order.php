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
        'product_id',
        'user_id',
        'amount',
        'city',
        'nama_jasa',
        'totalselurh',
        'status_pay',
        'address',
        'resi',
        'status',
        'nama_bank',
        'kode_pay',
        'bukti',
        'konfimasiadmin',
        'pesan',
        'etd',
        'ongkir',
        'diterima',
        'kurir'
    ];
}
