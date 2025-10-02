@extends('layout.master')

@section('content')
<h1 class="available">Available Product</h2>
    <div class="bidding-page">


        <div class="product-grid">
            @if($products->count() > 0)

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
            <div class="pagination-wrapper">
                <div class="pagination-links">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>

            @else
            <div style="text-align:center; margin-top:20px;">
                <p><strong>No products found.</strong></p>
            </div>
            @endif
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
                <div class="input-row">
                    <input type="email" name="gmail" placeholder="Enter Gmail" required>
                    <input type="number" name="price" placeholder="Enter Price" required>
                </div>
                <button class="sbb" type="submit">Submit Bid</button>
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
    @push('scripts')
    <script>
        let timerInterval;

        // document.querySelectorAll('.bid-btn').forEach(btn => {
        //     btn.addEventListener('click', function() {
        //         let productId = this.dataset.id;
        //         document.getElementById('product_id').value = productId;
        //         console.log("Selected Product ID:", productId);
        //         document.getElementById('bidList').innerHTML = "";
        //         startTimer(60);
        //     });
        // });
        document.querySelectorAll('.bid-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                let productId = this.dataset.id;

                // hidden input এ product_id সেট
                document.getElementById('product_id').value = productId;

                // আগের bid history, winner reset
                document.getElementById('bidList').innerHTML = "";
                document.getElementById('winner').innerText = "No Winner Yet";
                document.getElementById('payBtn').style.display = "none";

                // Timer start
                startTimer(60);
            });
        });


        function startTimer(duration) {
            clearInterval(timerInterval);
            let time = duration;
            timerInterval = setInterval(() => {
                let minutes = Math.floor(time / 60);
                let seconds = time % 60;
                document.getElementById('timer').textContent =
                    `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                if (--time < 0) {
                    clearInterval(timerInterval);
                    declareWinner();
                }
            }, 1000);
        }

        //  Submit Bid
        document.getElementById('bidForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch("{{ route('bids.store') }}", {
                    method: "POST"
                    , headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                    , body: formData
                })
                .then(res => res.json())
                .then(data => { 
                    console.log("Server Response:", data);

                    let list = document.getElementById('bidList');
                    list.innerHTML = "";

                    if (Array.isArray(data)) {
                        data.forEach(bid => {
                            list.innerHTML += `<li>${bid.gmail} : $${bid.price}</li>`;
                        });
                    } else {
                        list.innerHTML += `<li>${data.gmail} : $${data.price}</li>`;
                    }

                    document.getElementById('bidForm').reset();
                })
                .catch(err => console.error("Bid submit error:", err));
        });






        // Declare Winner
        function declareWinner() {
            let productId = document.getElementById('product_id').value;

            fetch(`/winner/${productId}`)
                .then(res => res.json())
                .then(winner => {
                    if (winner) {
                        document.getElementById('winner').innerText =
                            `${winner.gmail} won with $${winner.price}`;
                        document.getElementById('payBtn').style.display = 'block';

                        // Winner DB তে save
                        fetch("{{ route('winners.store') }}", {
                                method: "POST"
                                , headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                    , "Content-Type": "application/json"
                                }
                                , body: JSON.stringify({
                                    product_id: productId
                                    , bid_id: winner.id || null
                                    , gmail: winner.gmail
                                    , price: winner.price
                                })
                            })
                            .then(r => r.json())
                            .then(savedWinner => console.log('Winner saved:', savedWinner))
                            .catch(err => console.error('Save winner error:', err));

                    } else {
                        document.getElementById('winner').innerText = "No Winner";
                    }
                })
                .catch(err => console.error('Winner fetch error:', err));
        }


        // Payment Button
        document.getElementById('payBtn').addEventListener('click', function() {
            // let productId = document.getElementById('product_id').value;
            window.location.href = "https://www.bkash.com/";
        });

    </script>
    @endpush
