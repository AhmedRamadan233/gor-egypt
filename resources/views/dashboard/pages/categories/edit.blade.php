@extends('dashboard.layouts.master')

@section('content')
    <div class="container-fluid p-5 ">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header text-center">
                        <h2 class="m-0">Edit Category</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.update', ['category' => $editCategory->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group p-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $editCategory->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group p-2 mb-3">
                                <label for="B_percentage">B Percentage</label>
                                <input type="text" class="form-control" id="B_percentage" name="B_percentage"
                                    value="{{ $editCategory->B_percentage }}">
                                @error('B_percentage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary p-2 ms-2">Update Category</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
