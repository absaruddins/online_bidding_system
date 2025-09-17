@extends('layout.admin_master')

@section('content')
<h2>Products</h2>
<div class="card mb-4">
    @if(session('status'))
    <h6 class="Alert alert-success">{{session('status')}}</h6>
    @endif
    <div class="card-header">Add Product</div>

    <div class="card-body">
        <form action="{{ route('admin.store_product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Starting_Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
</div>



@endsection
