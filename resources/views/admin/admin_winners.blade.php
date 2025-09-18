@extends('layout.admin_master')

@section('content')
<h2>Winners</h2>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Gmail</th>
            <th>Price</th>
            <th>Paid</th>
            <th>Recorded At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($winners as $w)
        <tr>
            <td>{{ $w->id }}</td>
            <td>{{ $w->product->name ?? '—' }}</td>
            <td>{{ $w->gmail }}</td>
            <td>{{ $w->price }}</td>
            <td>{{ $w->paid ? 'Yes' : 'No' }}</td>
            <td>{{ $w->created_at }}</td>
            <td>
                @if(!$w->paid)
                <form action="{{ route('winners.paid', $w->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-success">Mark Paid</button>
                </form>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $winners->links() }}
@endsection
