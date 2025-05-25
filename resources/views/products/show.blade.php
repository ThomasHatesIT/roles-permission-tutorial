@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Product Details</div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $product->id }}</p>
            <p><strong>Name:</strong> {{ $product->name }}</p>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
