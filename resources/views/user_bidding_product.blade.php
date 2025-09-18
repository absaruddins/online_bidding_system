@extends('layout.master')

@section('content')
<h1 class="available">Available Product</h2>
    <div class="bidding-page">

        <!-- Left Side: Product Grid -->

        <!-- Left Side: Product Grid -->
        <div class="product-grid">
            @foreach($products as $product)
            <div class="product-card">
                <img class="product-img" src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}">
                <h2 class="product-name">{{ $product->name }}</h2>
                <h2 class="product-price">Starting Price {{ $product->price }}$</h2>
                <p class="product-description">{{ $product->description }}</p>
                <button class="bid-btn" data-id="{{ $product->id }}">Bid Now</button>
            </div>
            @endforeach
            <!-- Pagination -->
            <div class="pagination-links" style="text-align:center; margin-top:20px;">
                {{ $products->links() }}
            </div>
        </div>




        <!-- Right Side: Bidding Panel -->
        <div class="bidding-panel">
            <h2>Live Bidding</h2>

            <!-- Timer -->
            <div class="timer-box">
                <span id="timer">01:00</span>
                <button id="startBtn">Start</button>
            </div>

            <!-- Bid Form -->
            <form id="bidForm">
                @csrf
                <input type="hidden" name="product_id" id="product_id">
                <input type="email" name="gmail" placeholder="Enter Gmail" required>
                <input type="number" name="price" placeholder="Enter Price" required>
                <button class="sbb" type=" submit">Submit Bid</button>
            </form>

            <!-- Bid History -->
            <div class="bid-history">
                <h3>Bid History</h3>
                <ul id="bidList"></ul>
            </div>

            <!-- Winner Section -->
            <div class="winner-box">
                <h3>Winner</h3>
                <p id="winner">No Winner Yet</p>
                <button id="payBtn" style="display:none;">Proceed to Payment</button>
            </div>
        </div>

    </div>
    @endsection
