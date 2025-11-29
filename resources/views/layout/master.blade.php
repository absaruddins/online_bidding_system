<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/user_dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_bidding_product.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <title>Bidding System</title>
</head>

<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Bidding</h2>
            </div>
            <div class="menu">
                <ul>
                    <li> <a href="/">HOME</a></li>
                    <li> <a href="/user_bidding_product">BIDDING PRODUCT</a></li>
                    <li> <a href="/user_about">ABOUT</a></li>

                    <li> <a href="#footer">CONTACT</a></li>

                </ul>
            </div>
            {{-- <div class="search">
                <input class="srch" type="search" name="" placeholder="Type to text">
                <a href="#"><button class="btn">Search</button></a>
            </div> --}}
            <div class="news">

                <form action="{{ route('search') }}" method="GET" style="display: flex; align-items: center; border-radius: 5px; ">
                    <input id="src" type="text" name="query" placeholder="Search by product name" required>
                    <button id="sch" type="submit">Search</button>
                </form>

            </div>
            <div class="logout">

                @auth

                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button id="lg" type="submit">Logout</button>
                </form>

                @endauth
                @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                @endguest
            </div>

        </div>
        @yield('content')
    </div>


    <!-- FOOTER -->
    <footer class="footer" id="footer">
        <div class="footer-container">
            <!-- About -->
            <div class="footer-section">
                <h3>Bidding</h3>
                <p>Secure and transparent online auctions for buyers and sellers worldwide.</p>
                <!-- Contact -->
                <div class="contact_us">
                    <h4>Contact Us</h4>
                    <p>Email: support@bidding.com</p>
                    <p>Phone: +880 1234 567 890</p>
                </div>
                <!-- follow us -->

                <div class="follow_us">
                    <h4>Follow Us</h4>
                    <li><a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a></li>
                </div>


            </div>


            <!-- Quick Links -->
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Bidding Products</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <!-- Help & Policies -->
            <div class="footer-section">
                <h4>Help & Policies</h4>
                <ul>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>


        </div>

        <div class="footer-bottom">
            <p>&copy; 2025 Bidding System. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9SOeb+NfyCkpd4YefLgqfIj6xZME5VsmQ9fqs" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    {{-- Custom page scripts --}}
    @stack('scripts')
</body>

</html>
