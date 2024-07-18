<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrices\StoreStorePriceRequest;
use App\Models\Product;
use App\Models\StorePrice;
use Illuminate\Http\Request;

class StorePriceController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->query();
        $storePrices = StorePrice::filter($filters)->paginate(10);
        return view('dashboard.pages.stores.index', compact('storePrices'));
    }

    public function calculateProductPrice($productId, $storeName)
    {
        $product = Product::with('category')->find($productId);

        if (!$product) {
            throw new \Exception('Product not found.');
        }

        $originalPrice = $product->price;
        $category = $product->category;

        if ($storeName == 'Store A') {
            return $originalPrice;
        } elseif ($storeName == 'Store B') {
            return $originalPrice + ($originalPrice * $category->B_percentage / 100);
        } else {
            throw new \Exception('Unknown store.');
        }
    }

    public function showPriceForm()
    {
        $products = Product::all();
        return view('dashboard.pages.stores.price-form', compact('products'));
    }

    public function getProductPrice(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'store_name' => 'required|in:Store A,Store B',
        ]);

        $productId = $validatedData['product_id'];
        $storeName = $validatedData['store_name'];
        
        $product = Product::find($productId);
        $productName = $product->name;

        $price = $this->calculateProductPrice($productId, $storeName);

        return view('dashboard.pages.stores.price-result', compact('price', 'storeName', 'productName'));
    }
}
