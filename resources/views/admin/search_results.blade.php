@extends('layout.admin_master')

@section('content')
<h2>Search Results for "{{ $query }}"</h2>

<h3>Users</h3>
@if($users->count())
<table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
    </tr>
    @endforeach
</table>
@else
<p>No users found.</p>
@endif

<h3>Products</h3>
@if($products->count())
<table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
    </tr>
    @endforeach
</table>
@else
<p>No products found.</p>
@endif
@endsection
