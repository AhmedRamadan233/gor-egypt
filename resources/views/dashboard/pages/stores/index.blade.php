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
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="{{ route('stores.index') }}" method="get" class="form-inline">
                                <div class="form-group me-2">
                                    <label for="store_name" class="visually-hidden">Search by Store Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="store_name"
                                            placeholder="Search by store name..." name="store_name"
                                            value="{{ request('store_name') }}">

                                        <button type="submit" class="btn btn-primary me-2">Search</button>

                                    </div>
                                </div>
                            </form>
                            <a href="{{ route('stores.showPriceForm') }}" class="btn btn-primary">Get Salary Of Product</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="product-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Store Name</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($storePrices as $store)
                                    <tr>
                                        <td>{{ $store->id }}</td>
                                        <td>{{ $store->store_name }}</td>
                                        <td>{{ $store->product->name }}</td>
                                        <td>{{ $store->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $storePrices->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        function confirmDelete(productId) {
            if (confirm('Are you sure you want to delete this product?')) {
                document.getElementById('delete-form-' + productId).submit();
            }
        }
    </script> --}}
@endsection
