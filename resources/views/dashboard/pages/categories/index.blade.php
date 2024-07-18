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
                            <form action="{{ route('categories.index') }}" method="get" class="form-inline">
                                <div class="form-group me-2">
                                    <label for="name" class="visually-hidden">Search by Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Search by name..." name="name" value="{{ request('name') }}">

                                        <button type="submit" class="btn btn-primary me-2">Search</button>

                                    </div>
                                </div>
                            </form>
                            <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New Category</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="product-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>B Percentage</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->B_percentage }}</td>
                                        <td>
                                            <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form id="delete-form-{{ $category->id }}"
                                                action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                                method="post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete({{ $category->id }})"
                                                    class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script>
        function confirmDelete(categoryId) {
            if (confirm('Are you sure you want to delete this category?')) {
                document.getElementById('delete-form-' + categoryId).submit();
            }
        }
    </script>
@endsection
