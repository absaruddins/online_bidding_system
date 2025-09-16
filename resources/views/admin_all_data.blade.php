@extends('layout.admin_master')
@section('content')
    <h2>All Data</h2>
    <p>All bidding data is shown here.</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>User</th><th>Product</th><th>Bid Amount</th><th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td><td>Alice</td><td>Car</td><td>$5200</td><td>Pending</td>
            </tr>
        </tbody>
    </table>
@endsection
