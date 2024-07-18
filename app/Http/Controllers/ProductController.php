<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\StorePrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['name', 'category_name', 'price', 'SKU', 'created_date']);
        $products = Product::filter($filters)->paginate(10);
        return view('dashboard.pages.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.pages.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        try {
            DB::beginTransaction();

            $validateProductData = $request->validated();
            $product = new Product();
            $product->category_id = $validateProductData['category_id'];
            $product->name = $validateProductData['name'];
            $product->price = $validateProductData['price'];
            $product->SKU = $validateProductData['SKU'];
            $product->description = $validateProductData['description'];

            $product->save();

            $category = Category::find($product->category_id);
            $originalPrice = $product->price;
            $increasedPrice = $originalPrice + ($originalPrice * $category->B_percentage / 100);

            StorePrice::create([
                'product_id' => $product->id,
                'store_name' => 'Store A',
                'price' => $originalPrice,
            ]);

            StorePrice::create([
                'product_id' => $product->id,
                'store_name' => 'Store B',
                'price' => $increasedPrice,
            ]);

            DB::commit();

            $request->session()->flash('success', 'Product created successfully.');
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            DB::rollBack();
            $request->session()->flash('error', 'Failed to create product. ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $categories = Category::all();
        $editProduct = Product::with('category')->findOrFail($id);
        return view('dashboard.pages.products.edit', compact('editProduct', 'categories'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        try {
            $validateProductData = $request->validated();
            $product = Product::findOrFail($id);
            $originalCategory = $product->category_id;

            $product->category_id = $validateProductData['category_id'];
            $product->name = $validateProductData['name'];
            $product->price = $validateProductData['price'];
            $product->SKU = $validateProductData['SKU'];
            $product->description = $validateProductData['description'];

            $product->save();

            DB::beginTransaction();
            try {
                $originalPrice = $product->price;
                StorePrice::where('product_id', $product->id)
                    ->where('store_name', 'Store A')
                    ->update(['price' => $originalPrice]);
                $category = Category::find($product->category_id);
                $increasedPrice = $originalPrice + ($originalPrice * $category->B_percentage / 100);
                StorePrice::where('product_id', $product->id)
                    ->where('store_name', 'Store B')
                    ->update(['price' => $increasedPrice]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                throw $e; 
            }

            $request->session()->flash('success', 'Product updated successfully.');
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Failed to update product. ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'product deleted successfully.');
    }
}
