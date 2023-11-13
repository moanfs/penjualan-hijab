<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    // use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'title',
        'slug',
        'desc',
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'id');
    }
    public function getAllProduct()
    {
        DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->select('products.amount', 'categories.title')
            ->sum('amount');
    }
}
