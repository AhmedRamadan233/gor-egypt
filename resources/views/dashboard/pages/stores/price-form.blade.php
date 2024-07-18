@extends('dashboard.layouts.master')

@section('content')
    <div class="container-fluid p-5 ">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header text-center">
                        <h2 class="m-0">Get Product Price</h2>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('stores.getProductPrice') }}" method="get">
                            <div class="form-group p-2">
                                <label for="product_id">Products</label>
                                <select class="form-control" id="product_id" name="product_id">
                                    <option value="">Select product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group p-2">
                                <label for="store_name">Store</label>
                                <select class="form-control" id="store_name" name="store_name">
                                    <option value="Store A">Store A</option>
                                    <option value="Store B">Store B</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary p-2 ms-2">Get Price</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
