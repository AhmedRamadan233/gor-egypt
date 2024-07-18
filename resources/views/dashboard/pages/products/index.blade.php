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
                                    <th>Name</th>
                                    <th>Category Name</th>
                                    <th>Price</th>
                                    <th>SKU</th>
                                    <th>description</th>
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
