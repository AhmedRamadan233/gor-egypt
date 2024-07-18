<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'SKU', 'description', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function storePrices()
    {
        return $this->hasMany(StorePrice::class);
    }


    public function scopeFilter(EloquentBuilder $builder, $filters)
    {
        $name = $filters['name'] ?? null;
        $category_name = $filters['category_name'] ?? null;
        $price = $filters['price'] ?? null;
        $SKU = $filters['SKU'] ?? null;
        $created_date = $filters['created_date'] ?? null;
        if ($name) {
            $builder->where('name', 'LIKE', "%$name%");
        }

        if ($category_name) {
            $builder->whereHas('category', function ($query) use ($category_name) {
                $query->where('name', 'LIKE', "%$category_name%");
            });
        }

        if ($price) {
            $builder->where('price', $price);
        }

        if ($SKU) {
            $builder->where('SKU', 'LIKE', "%$SKU%");
        }

        if ($created_date) {
            $builder->whereDate('created_at', $created_date);
        }
    }
}
