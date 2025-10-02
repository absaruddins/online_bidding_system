<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 220px;
            background: #343a40;
            color: #fff;
            flex-shrink: 0;
            padding: 20px 0;
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            background: #f8f9fa;
        }

        .admin-navbar {
            width: 100%;
            position: fixed;
            top: 0;

            z-index: 1000;
            display: flex;
            gap: 20px;
            padding: 10px 30px;
        }

        .admin-navbar .news {
            margin-left: auto;

            display: flex;
            align-items: center;
        }

        .admin-navbar .logout {
            margin-left: 20px;
            display: flex;
            align-items: center;



        }

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="admin-navbar">
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

    </nav>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Admin Panel</h4>
        <a href="{{ route('admin.admin_dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.admin_add_products') }}">Add Product</a>
        <a href="{{ route('admin.products.list') }}">Products List</a>

        <a href="{{ route('admin.admin_winners') }}">Winners list</a>
        <a href="{{ route('admin.registerlist') }}">Registered list</a>

        {{--
        <a href="{{ route('admin.products') }}">Products</a>

        <a href="{{ route('admin.all_data') }}">All Data</a> --}}

    </div>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
