@extends('layout.master')

@section('content')

<!-- Hero Section -->
<section class="about-hero">
    <h1>About Our Bidding Platform</h1>
    <p>
        Secure and transparent online auctions for buyers and sellers worldwide.
        Join our platform to experience a fair and user-friendly bidding system.
    </p>
</section>

<!-- Mission & Vision Section -->
<section class="mission-vision">
    <div class="mission">
        <h2>Our Mission</h2>
        <p>To provide a safe and fair online marketplace for everyone.</p>
    </div>
    <div class="vision">
        <h2>Our Vision</h2>
        <p>To become the most trusted online auction platform globally.</p>
    </div>
</section>

<!-- How It Works / Features Section -->
<section class="features">
    <h2>How It Works</h2>
    <div class="feature-cards">
        <div class="card">
            <h3>List Products</h3>
            <p>Post your products for auction in minutes.</p>
        </div>
        <div class="card">
            <h3>Place Bids</h3>
            <p>Users can place bids safely and track their max bid.</p>
        </div>
        <div class="card">
            <h3>Secure Transactions</h3>
            <p>All transactions are secure and transparent.</p>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta">
    <h2>Ready to Start Bidding?</h2>
    <a href="/user_bidding_product">View Products</a>
</section>

@endsection
