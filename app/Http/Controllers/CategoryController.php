<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\StoreCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->query();
        $categories = Category::filter($filters)->paginate(2);
        return view('dashboard.pages.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.pages.categories.create', compact('categories'));
    }
    public function store(StoreCategoryRequest $request)
    {
        $validateCategoryData = $request->validated();
        $category = new Category();
        $category->name = $validateCategoryData['name'];
        $category->B_percentage = $validateCategoryData['B_percentage'];
        $category->save();
        
        $request->session()->flash('success', 'Category created successfully.');
        return redirect()->route('categories.index');
    }


    public function edit($id)
    {
        $editCategory = Category::findOrFail($id);
        return view('dashboard.pages.categories.edit', compact('editCategory'));
    }
    public function update(UpdateCategoryRequest $request, $id)
    {
        $validateCategoryData = $request->validated();
        $category =Category::findOrFail($id);
        $category->name = $validateCategoryData['name'];
        $category->B_percentage = $validateCategoryData['B_percentage'];
        $category->save();
        
        $request->session()->flash('success', 'Category updated successfully.');
        return redirect()->route('categories.index');

    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'category deleted successfully.');
    }
}
