@extends('layout.master')

@section('content')
<h1 class="available">Available Product</h2>
    <div class="bidding-page">

        <!-- Left Side: Product Grid -->
        <div class="product-grid">
            <div class="product-card">
                <img class="product-img" src="{{ asset('car1.jpg') }}" alt="Product 1">
                <h2 class="product-name">Car 1</h2>
                <h2 class="product-price">Starting Price 600$</h2>
                <button class="bid-btn" data-id="1">Bid Now</button>
            </div>

            <div class="product-card">
                <img class="product-img" src="{{ asset('car2.jpg') }}" alt="Product 2">
                <h2 class="product-name">Car 2</h2>
                <h2 class="product-price">Starting Price 600$</h2>
                <button class="bid-btn" data-id="2">Bid Now</button>
            </div>

            <div class="product-card">
                <img class="product-img" src="{{ asset('car3.jpg') }}" alt="Product 3">
                <h2 class="product-name">Car 3</h2>
                <h2 class="product-price">Starting Price 600$</h2>
                <button class="bid-btn" data-id="3">Bid Now</button>
            </div>

            <div class="product-card">
                <img class="product-img" src="{{ asset('watch1.jpg') }}" alt="Product 4">
                <h2 class="product-name">Watch 1</h2>
                <h2 class="product-price">Starting Price 500$</h2>
                <button class="bid-btn" data-id="4">Bid Now</button>
            </div>

            <div class="product-card">
                <img class="product-img" src="{{ asset('watch2.jpg') }}" alt="Product 5">
                <h2 class="product-name">Watch 2</h2>
                <h2 class="product-price">Starting Price 500$</h2>
                <button class="bid-btn" data-id="5">Bid Now</button>
            </div>

            <div class="product-card">
                <img class="product-img" src="{{ asset('watch3.jpg') }}" alt="Product 6">
                <h2 class="product-name">Watch 3</h2>
                <h2 class="product-price">Starting Price 500$</h2>
                <button class="bid-btn" data-id="6">Bid Now</button>
            </div>

            <div class="product-card">
                <img class="product-img" src="{{ asset('home1.jpg') }}" alt="Product 7">
                <h2 class="product-name">Home 1</h2>
                <h2 class="product-price">Starting Price 400$</h2>
                <button class="bid-btn" data-id="7">Bid Now</button>
            </div>

            <div class="product-card">
                <img class="product-img" src="{{ asset('home2.jpg') }}" alt="Product 8">
                <h2 class="product-name">Home 2</h2>
                <h2 class="product-price">Starting Price 400$</h2>
                <button class="bid-btn" data-id="8">Bid Now</button>
            </div>

            <div class="product-card">
                <img class="product-img" src="{{ asset('home3.jpg') }}" alt="Product 9">
                <h2 class="product-name">Home 3</h2>
                <h2 class="product-price">Starting Price 400$</h2>
                <button class="bid-btn" data-id="9">Bid Now</button>
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
