<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard' }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f5f5f5;
        }

        /* NAVBAR */
        .navbar {
            height: 72px;
            background: #0A1F44;
            color: white;
            display: flex;
            align-items: center;
            padding: 0 25px;
            gap: 18px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1200;
        }

        .menu-icon {
            font-size: 30px;
            cursor: pointer;
            font-weight: bold;
        }

        .navbar img.logo {
            width: 46px;
            height: 46px;
            border-radius: 50%;
        }

        .navbar-title {
            font-size: 20px;
            font-weight: 600;
        }

        .logout-btn {
            margin-left: auto;
            color: white;
            text-decoration: none;
            background: transparent;
            padding: 8px 15px;
            border-radius: 6px;
            font-size: 14px;
            border: 1px solid white;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            background: white;
            position: fixed;
            top: 72px;
            left: 0;
            height: calc(100vh - 72px);
            border-right: 1px solid #e1e1e1;
            padding-top: 10px;
            transition: 0.25s ease;
        }

        .sidebar.closed {
            left: -260px;
        }

        .sidebar h3 {
            margin: 18px 0 10px 20px;
            font-size: 14px;
            color: #6b6b6b;
            font-weight: 600;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            border-radius: 8px;
            margin: 6px 10px;
            cursor: pointer;
        }

        .menu-item:hover {
            background: #f2f6ff;
        }

        .dot {
            width: 9px;
            height: 9px;
            background: #007bff;
            border-radius: 50%;
            margin-right: 10px;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 25px;
            left: 20px;
            font-size: 13px;
            color: #525252;
        }

        /* CONTENT */
        .content {
            margin-left: 260px;
            margin-top: 95px;
            padding: 25px 35px;
            transition: 0.25s ease;
        }

        .content.expanded {
            margin-left: 20px;
        }

        /* DASHBOARD CARDS */
        .cards {
            display: flex;
            gap: 20px;
            margin-top: 25px;
        }

        .card {
            width: 240px;
            border-radius: 12px;
            padding: 20px;
            color: white;
        }

        .blue {
            background: #1A73E8;
        }

        .yellow {
            background: #FBBC04;
        }

        .green {
            background: #34A853;
        }

        .red {
            background: #EA4335;
        }

        .card-title {
            font-size: 17px;
            font-weight: 500;
        }

        .card-value {
            font-size: 26px;
            margin: 12px 0;
            font-weight: 600;
        }

        .card-link {
            font-size: 13px;
            opacity: 0.9;
        }
    </style>

</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <div class="menu-icon" onclick="toggleSidebar()">≡</div>

       <img src="{{ asset('logo/Logo_PI.jpeg') }}" class="logo">
        <div class="navbar-title">Kurikulum PI</div>

        <a href="{{ route('logout') }}" class="logout-btn">Logout</a>
    </div>

    <!-- SIDEBAR -->
    <div id="sidebar" class="sidebar">
        <h3>Home</h3>
        <a href="{{ route('dashboard') }}" class="menu-item" style="text-decoration:none; color:black;">
            <div class="dot"></div> Dashboard
        </a>

        <h3>Admin</h3>
        <div class="menu-item">
            <div class="dot"></div> User
        </div>
        <div class="menu-item">
            <div class="dot"></div> Ganti Password
        </div>

        <h3>Data</h3>
        <a href="{{ route('siswa.index') }}" class="menu-item" style="text-decoration:none; color:black;">
            <div class="dot"></div> Siswa
        </a>

        <a href="{{ route('guru.index') }}" class="menu-item" style="text-decoration:none; color:black;">
            <div class="dot"></div> Guru
        </a>

        <div class="sidebar-footer">
            Logged in as <b>Admin</b>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div id="content" class="content">
        @yield('content')
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("closed");
            document.getElementById("content").classList.toggle("expanded");
        }
    </script>

</body>

</html>