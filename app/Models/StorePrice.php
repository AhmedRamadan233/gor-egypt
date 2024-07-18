<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorePrice extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'store_name', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
