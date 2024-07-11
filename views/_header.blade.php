<style>
    .header {
        background-color: white;
        box-shadow: 0 4px 2px -2px gray;
        padding: 10px 0;
        width: 100%;
        z-index: 1000;
    }

    .header-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 100%;
        padding: 0 15px;
    }

    .header img {
        max-height: 50px;
        margin-left: 0;
        transition: max-height 0.3s;
    }

    .nav-buttons {
        display: flex;
        align-items: center;
        margin-left: auto;
    }

    .nav-buttons a {
        text-decoration: none;
        color: black;
        font-weight: 500;
        margin-left: 30px;
    }

    .nav-buttons a:hover {
        color: #CB150F;
        text-decoration: underline;
    }

    .nav-buttons .user-icon {
        margin-left: 30px;
        font-size: 24px;
        color: #8A1C14;
    }

    .sidebar-toggle {
        font-size: 30px;
        cursor: pointer;
        display: none;
        z-index: 1003;
        margin: 0;
        padding: 0;
    }

    .sidebar {
        position: fixed;
        top: 0;
        right: 0;
        width: 0;
        height: 100%;
        background-color: white;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
        transition: width 0.3s;
        z-index: 1002;
        overflow: hidden;
    }

    .sidebar .closebtn {
        color: #8A1C14;
        font-size: 30px;
    }

    .sidebar a {
        padding: 10px 15px;
        text-decoration: none;
        font-size: 18px;
        color: black;
        display: flex;
        align-items: center;
    }

    .sidebar a i {
        margin-right: 10px;
    }

    .sidebar a:hover {
        background-color: #f1f1f1;
        color: #CB150F;
    }

    .show-sidebar {
        width: 250px;
    }

    .hide-toggle {
        display: none !important;
    }

    .sidebar .current-page,
    .nav-buttons .current-page {
        background-color: #8A1C14;
        color: white;
        padding: 10px 15px;
        border-radius: 20px;
    }

    @media (max-width: 768px) {
        .header img {
            max-height: 30px;
        }

        .nav-buttons {
            display: none;
        }

        .sidebar-toggle {
            display: block;
        }
    }
</style>
@yield('styles')
</head>

<body>
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <img src="{{ asset('assets/header_logo.png') }}" alt="Logo">
            </div>
            <div class="nav-buttons d-none d-md-flex">
                <a href="{{ url('customer_home') }}">Home</a>
                <a href="{{ url('customer_cart_checkout') }}">Cart</a>
                <a href="{{ url('store') }}">Store</a>
                <a href="{{ url('customer_profile') }}" class="user-icon"><i class="fas fa-user"></i></a>
            </div>
            <div class="d-md-none sidebar-toggle" id="sidebarToggle" onclick="toggleSidebar()">&#9776;</div>
        </div>
    </header>

    <div class="sidebar" id="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()">&times;</a>
        <a href="{{ url('customer_home') }}"><i class="fas fa-home"></i>Home</a>
        <a href="{{ url('customer_cart_checkout') }}"><i class="fas fa-store"></i>Cart</a>
        <a href="{{ url('customer_store') }}"><i class="fas fa-store"></i>Store</a>
        <a href="{{ url('customer_profile') }}" class="user-icon"><i class="fas fa-user"></i>Account</a>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            if (sidebar.classList.contains('show-sidebar')) {
                sidebar.classList.remove('show-sidebar');
                sidebarToggle.classList.remove('hide-toggle');
            } else {
                sidebar.classList.add('show-sidebar');
                sidebarToggle.classList.add('hide-toggle');
            }
        }

        function highlightActiveLink() {
            var currentUrl = window.location.href;
            var navLinks = document.querySelectorAll('.nav-buttons a');
            var sidebarLinks = document.querySelectorAll('.sidebar a');

            navLinks.forEach(function(link) {
                var href = link.getAttribute('href');
                if (currentUrl.includes(href)) {
                    link.classList.add('current-page');
                } else {
                    link.classList.remove('current-page');
                }
            });

            sidebarLinks.forEach(function(link) {
                var href = link.getAttribute('href');
                if (currentUrl.includes(href)) {
                    link.classList.add('current-page');
                } else {
                    link.classList.remove('current-page');
                }
            });
        }

        function toggleSidebarButtonVisibility() {
            const sidebarToggle = document.querySelector('.sidebar-toggle');
            if (window.innerWidth <= 768) {
                sidebarToggle.style.display = 'block';
            } else {
                sidebarToggle.style.display = 'none';
            }
        }

        window.addEventListener('load', function() {
            highlightActiveLink();
            toggleSidebarButtonVisibility();
        });

        window.addEventListener('resize', toggleSidebarButtonVisibility);
    </script>

    @yield('content')

</body>

</html>
