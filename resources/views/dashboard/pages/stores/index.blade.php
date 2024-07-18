@extends('dashboard.layouts.master')



@section('content')
    <div class="container-fluid p-5 ">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="#" method="get" class="d-flex align-items-center">
                                <div class="form-group me-2">
                                    <label for="name" class="visually-hidden">Search by Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Search by name..." name="name" value="">
                                        <button type="submit" class="btn btn-primary me-2">Search</button>

                                    </div>
                                </div>
                            </form>
                            <a href="#" class="btn btn-primary">Add New Category</a>
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
                                    <th>Action</th>
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
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
