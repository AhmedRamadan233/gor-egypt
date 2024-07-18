@extends('dashboard.layouts.master')



@section('content')
    <div class="container-fluid p-5 ">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline shadow">
                    <div class="card-header text-center">
                        <h2 class="m-0">Database and CRUD Operations Setup</h2>
                    </div>

                    <div class="card-body">
                        <p>
                            This section describes the setup process for creating the necessary database tables and
                            implementing CRUD operations for categories, products, and store prices. The steps include
                            generating migrations, establishing relationships, and implementing validation.
                        </p>

                        <h3>Database Setup</h3>
                        <ul>
                            <li>
                                <strong>Category Table:</strong> Contains columns for 'id', 'name', and 'B_percentage'. Each
                                category has a relation with multiple products.
                            </li>
                            <li>
                                <strong>Product Table:</strong> Contains columns for 'id', 'category_id', 'name', 'price',
                                'SKU', and 'description'. Displays products associated with categories.
                            </li>
                            <li>
                                <strong>Store Prices Table:</strong> Contains columns for 'product_id', 'store_name', and
                                'price'. Ensures unique combinations of 'product_id' and 'store_name'.
                            </li>
                        </ul>

                        <h3>Validation</h3>
                        <p>
                            Implement validation in the request classes to ensure clean and consistent data entry. This
                            includes ensuring the presence and correctness of fields such as 'category_id', 'name', 'price',
                            and 'store_name'.
                        </p>

                        <h3>CRUD Operations</h3>
                        <ul>
                            <li>
                                <a href="{{ route('categories.index') }}">Category Management</a>: Create, read, update, and
                                delete categories.
                            </li>
                            <li>
                                <a href="{{ route('products.index') }}">Product Management</a>: Manage products within their
                                respective categories.
                            </li>
                            <li>
                                <a href="{{ route('stores.showPriceForm') }}">Store Price Calculation</a>: Select a product
                                and store to view the calculated price.
                            </li>
                        </ul>

                        <h3>Additional Features</h3>
                        <p>
                            Implement local scope functions to facilitate searching and filtering in each page. This
                            improves the user experience by allowing easy access to specific entries.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
