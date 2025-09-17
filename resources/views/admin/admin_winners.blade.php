@extends('layout.admin_master')

@section('content')
    <h2>Winners</h2>
    <p>Here you will see auction winners.</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>User</th><th>Product</th><th>Winning Bid</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td><td>John</td><td>Car</td><td>$5500</td>
            </tr>
        </tbody>
    </table>
@endsection
