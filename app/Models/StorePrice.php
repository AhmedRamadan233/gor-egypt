<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class StorePrice extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'store_name', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeFilter(EloquentBuilder $builder, $filters)
    {
        $store_name = $filters['store_name'] ?? null;
        if ($store_name) {
            $builder->where('store_name', 'LIKE', "%$store_name%");
        }
    }
}
