@extends('layout.admin_master')

@section('content')
<div class="container mt-4">
    <h2>Edit Product</h2>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Price</label>
            <input type="text" name="price" value="{{ $product->price }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label>Image</label><br>
            @if($product->image)
            <img src="{{ asset('uploads/products/' . $product->image) }}" width="100" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.products.list') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
