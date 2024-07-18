<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'B_percentage'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeFilter(EloquentBuilder $builder, $filters)
    {
        $name = $filters['name'] ?? null;
        if ($name) {
            $builder->where('name', 'LIKE', "%$name%");
        }
    }
}
