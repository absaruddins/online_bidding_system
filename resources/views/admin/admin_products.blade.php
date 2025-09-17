@extends('layout.admin_master')

@section('content')
    <h2>Products</h2>
    <p>Here you will manage products (Add, Update, Delete).</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Price</th><th>Description</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td><td>Car</td><td>$5000</td><td>Luxury Car</td>
                <td>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
