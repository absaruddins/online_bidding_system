@extends('layout.admin_master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">All Products</h2>

    @if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    @if($product->image)
                    <img src="{{ asset('uploads/products/' . $product->image) }}" width="80" height="80" alt="Product Image">
                    @else
                    <span>No Image</span>
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>

                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No Products Found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
