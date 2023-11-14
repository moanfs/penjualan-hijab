<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'brand_id',
        'slug',
        'nama',
        'price',
        'discount',
        'dis_status',
        'amount',
        'desc',
        'status',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getGambar(Product $image)
    {
        $image =  Product::select('images.img as image', 'images.product_id as forid', 'products.id as id')
            ->leftJoin('images', 'products.id', '=', 'images.product_id')
            ->get();
    }
    public function scopeFilter($query, array $filters = []): void
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) => $query
            ->where('nama', 'LIKE', "%$search%"));
    }

    public static function getRelatedPost(Product $hijab, int $count = 4)
    {
        $relatedPost = collect();
        $allPost = Product::all();

        foreach ($allPost as $otherPost) {
            if ($otherPost->id != $hijab->id) {
                similar_text($otherPost->title, $hijab->nama, $percent);

                if ($percent >= 80) {
                    $relatedPost->push($otherPost);
                    if ($relatedPost->count() == $count) {
                        return $relatedPost->shuffle();
                    }
                }
            }
        }
        // if ($relatedPost->count() < $count) {
        //     $sameCategoryPosts = Post::where('blog_category_id', $hijab->blog_category_id)
        //         ->whereNot('id', $post->id)
        //         ->whereNotIn('id', $relatedPost->pluck('id')->toArray())
        //         ->take($count - $relatedPost->count())
        //         ->get();
        //     $relatedPost = $relatedPost->concat($sameCategoryPosts);
        // }
        // return $relatedPost->shuffle();
    }

    public function category(): HasMany
    {
        return $this->hasMany(Category::class, 'id');
    }
}
