@extends('dashboard.layouts.master')



@section('content')
    <div class="container-fluid p-5 ">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline shadow">
                    <div class="card-header">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <form action="{{ route('products.index') }}" method="GET"
                                class="d-flex flex-wrap align-items-center">
                                <div class="form-group me-2 mb-2">
                                    <label for="name" class="visually-hidden">Search by Name</label>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Search by name..." name="name" value="{{ request('name') }}">
                                </div>
                                <div class="form-group me-2 mb-2">
                                    <label for="category_name" class="visually-hidden">Search by Category</label>
                                    <input type="text" class="form-control" id="category_name"
                                        placeholder="Search by category..." name="category_name"
                                        value="{{ request('category_name') }}">
                                </div>
                                <div class="form-group me-2 mb-2">
                                    <label for="SKU" class="visually-hidden">Search by SKU</label>
                                    <input type="text" class="form-control" id="SKU" placeholder="Search by SKU..."
                                        name="SKU" value="{{ request('SKU') }}">
                                </div>
                                <div class="form-group me-2 mb-2">
                                    <label for="price" class="visually-hidden">Search by Price</label>
                                    <input type="number" class="form-control" id="price"
                                        placeholder="Search by price..." name="price" value="{{ request('price') }}">
                                </div>
                                <div class="form-group me-2 mb-2">
                                    <label for="created_date" class="visually-hidden">Search by Created Date</label>
                                    <input type="date" class="form-control" id="created_date" name="created_date"
                                        value="{{ request('created_date') }}">
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Search</button>
                            </form>
                            <a href="{{ route('products.create') }}" class="btn btn-primary mb-2">Add New Product</a>
                        </div>

                    </div>

                    <div class="card-body">
                        <table id="product-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category Name</th>
                                    <th>Price</th>
                                    <th>SKU</th>
                                    <th>description</th>
                                    <th>Price In Store A</th>
                                    <th>Price In Store B</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->SKU }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->price + ($product->price * $product->category->B_percentage) / 100 }}
                                        </td>

                                        <td>
                                            <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form id="delete-form-{{ $product->id }}"
                                                action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                                method="post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete({{ $product->id }})"
                                                    class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(productId) {
            if (confirm('Are you sure you want to delete this product?')) {
                document.getElementById('delete-form-' + productId).submit();
            }
        }
    </script>
@endsection
