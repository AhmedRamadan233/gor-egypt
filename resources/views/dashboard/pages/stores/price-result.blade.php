@extends('dashboard.layouts.master')

@section('content')
    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-primary card-outline">
                    <div class="card-header text-center">
                        <h2 class="m-0">Store: {{ $storeName }}</h2>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Product: {{ $productName }}</h5>
                        <h5 class="card-text fw-bold">Price: {{ $price }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
