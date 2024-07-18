@extends('dashboard.layouts.master')

@section('content')
    <div class="container-fluid p-5 ">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header text-center">
                        <h2 class="m-0">Edit Product</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', ['product' => $editProduct->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group p-2">
                                <label for="category_id">Caegories</label>
                                <select class="form-control" id="category_id" name="category_id">
                                    <option value="{{ $editProduct->category->id }}">{{ $editProduct->category->name }}
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group p-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $editProduct->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group p-2 mb-3">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    value="{{ $editProduct->price }}">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group p-2 mb-3">
                                <label for="SKU">SKU</label>
                                <input type="text" class="form-control" id="SKU" name="SKU"
                                    value="{{ $editProduct->SKU }}">
                                @error('SKU')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group p-2 mb-3">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    value="{{ $editProduct->description }}">
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary p-2 ms-2">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
