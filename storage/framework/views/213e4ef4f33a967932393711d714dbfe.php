<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseller's Dashboard</title>
    <link rel="icon" type="image/x-icon"
        href="https://scontent.fmnl4-7.fna.fbcdn.net/v/t1.15752-9/448200191_474132475099478_6596455881542556957_n.png?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_ohc=b4tF4OnvpwMQ7kNvgFrieEp&_nc_ht=scontent.fmnl4-7.fna&oh=03_Q7cD1QFjIEijnlQPvClN4SA7vvEb1V_1qxCAS2tnpsKMeMWxhg&oe=669489EE">
    <!-- Box Icons  -->
   
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Styles  -->
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <style>
        /* Google Fonts  */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        /* Globals  */
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
        }

        /* Variables  */
        :root {
            --color_Red: #8A1C14;
            --color_Dark1: #1e1e1e;
            --color_Dark2: #252527;
            --color_Light1: #F0F2F5;
            --color_Light2: #fff;
        }

        /* =============== Sidebar =============== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 260px;
            background-color: #1A1D1F;
            transition: all .2s ease;
            z-index: 100;
        }

        .sidebar.close {
            width: 78px;
        }

        /* --------- Logo ------------ */
        .logo-box {
            height: 60px;
            width: 100%;
            display: flex;
            align-items: center;
            color: var(--color_Light1);
            transition: all .5s ease;
        }

        .logo-box:hover {
            color: var(--color_Red);
        }

        .logo-box i {
            font-size: 30px;
            height: 50px;
            min-width: 78px;
            text-align: center;
            line-height: 50px;
            transition: all .5s ease;
        }

        .sidebar.close .logo-box i {
            transform: rotate(360deg);
        }

        .sidebar .logo-name {
            font-size: 22px;
            font-weight: 600;
            white-space: nowrap;
        }

        .logo-box h5 {
            margin-top: 60px;
            margin-left: -110px;
        }

        .sidebar.close h5 {
            opacity: 0;
        }

        /* ---------- Sidebar List ---------- */
        .sidebar-list {
            height: 100%;
            padding: 30px 0 150px 0;
            overflow: auto;
        }

        .sidebar-list::-webkit-scrollbar {
            display: none;
        }

        .sidebar-list li {
            transition: all .5s ease;
        }

        .sidebar-list li:hover {
            background-color: var(--color_Dark2);
        }

        .sidebar-list li .title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all .5s ease;
            cursor: pointer;
        }

        .sidebar .bxs-chevron-down {
            color: black;
        }

        .sidebar-list li.active .title {
            background-color: var(--color_Blue);
        }

        .sidebar-list li.active .bxs-chevron-down {
            transition: all .5s ease;
            transform: rotate(180deg);
        }

        .sidebar-list li .title .link {
            display: flex;
            align-items: center;
        }

        .sidebar-list li .title i {
            height: 50px;
            min-width: 78px;
            text-align: center;
            line-height: 50px;
            color: var(--color_Light1);
            font-size: 20px;
        }

        .sidebar-list li .title .name {
            font-size: 18px;
            font-weight: 400;
            color: var(--color_Light1);
            white-space: nowrap;
        }

        /* ---------------- Submenu ------------- */
        .sidebar-list li .submenu {
            width: 0;
            height: 0;
            opacity: 0;
            transition: all .2s ease;
        }

        .sidebar-list li.dropdown.active .submenu {
            width: unset;
            height: unset;
            opacity: 1;
            display: flex;
            flex-direction: column;
            padding: 6px 6px 14px 80px;
            background-color: var(--color_Dark2);
        }

        .submenu .link {
            color: var(--color_Light1);
            font-size: 16px;
            padding: 10px 0;
            transition: all .5s ease;
        }

        .submenu .link:hover {
            color: #fff;
        }

        .submenu-title {
            display: none;
        }

        /* ---------------- Submenu Close ------------- */
        .sidebar.close .logo-name,
        .sidebar.close .location,
        .sidebar.close .title .name,
        .sidebar.close .title .bxs-chevron-down {
            display: none;
        }

        .sidebar.close .sidebar-list {
            overflow: visible;
        }

        .sidebar.close .sidebar-list li {
            position: relative;
        }

        .sidebar.close .sidebar-list li .submenu {
            display: flex;
            flex-direction: column;
            position: absolute;
            left: 100%;
            top: -10px;
            margin-top: 0;
            padding: 10px 20px;
            border-radius: 0 6px 6px 0;
            height: max-content;
            width: max-content;
            opacity: 0;
            transition: all .5s ease;
            pointer-events: none;
        }

        .sidebar.close .sidebar-list li:hover .submenu {
            opacity: 1;
            top: 0;
            pointer-events: initial;
            background-color: var(--color_Dark2);
        }

        .sidebar.close .submenu-title {
            display: block;
            font-style: 18px;
            color: var(--color_Light1);
        }


        /* Start - Logout Section - Username - Job - Button */

        /*Close button that only appears when in mobile view*/
        .sidebar.close .toggle-close {
            display: none;
        }

        .sidebar .toggle-close {
            display: none;
        }

        /*End*/

        .sidebar .logout-section {
            position: sticky;
            bottom: 0;
            width: 260px;
            background: black;
            padding: 12px 0;
            transition: all 0.2s ease;
        }

        .sidebar .logout-section i {
            margin-left: 25px;
            font-size: 25px;
            color: #901B16;
        }

        .sidebar .logout-section .name-job {
            font-size: 25px;
            margin-left: 30px;
        }

        .sidebar .logout-section {
            display: flex;
            align-items: center;
        }

        .sidebar .logout-section .job {
            font-size: 12px;
            color: #901B16;
        }

        .sidebar .logout-section .profile_name,
        .sidebar .logout-section {
            color: #fff;
            font-size: 15px;
            font-weight: 500;
            white-space: nowrap;
            text-align: left;
        }

        .sidebar.close .logout-section {
            background: none;
        }

        .sidebar.close .logout-section {
            width: 78px;
        }

        .sidebar.close .logout-section .profile_name,
        .sidebar.close .logout-section .job {
            display: none;
        }

        .sidebar.close.bx-log-out-circle {
            display: relative;
            overflow: visible;
        }


        /* =============== Home Section =============== */

        .home {
            position: relative;
            background-color: var(--color_Light1);
            left: 260px;
            width: calc(100% - 260px);
            height: 100vh;
            transition: all .3s ease;
            display: flex;
            flex-direction: column;
            /* Stack elements vertically */
        }

        .sidebar.close~.home {
            left: 78px;
            width: calc(100% - 78px);
        }

        .home::before {
            background: linear-gradient(to right, #8A1C14 5%, black 70%);
            background-size: cover;
            background-position: center;
            /* Center the image */
            background-repeat: no-repeat;
            position: fixed;
            content: '';
            inset: 0;
            width: calc(100%-78px);

            height: 40%;
            pointer-events: none;
        }

        .home .bx-menu {
            z-index: 1;
        }


        /* Content Above Whiteboard, Below Menu Bar*/

        .top {
            width: 100%;
            height: 10%;
            z-index: 1;
            margin-top: 20px;;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .top .toggle-sidebar {
            cursor: pointer;
            border: none;
            margin-left: 1.5rem;
            font-weight: bold;
            font-size: 25px;
            color: #FFCC00;
            background-color: transparent;
            margin-top: 0;
        }

        .top .toggle-sidebar .page-title {
            flex-direction: row;
        }

        .top .page-title {
            font-size: 25px;
            font-weight: bold;
            margin-left: 3%;
            margin-right: auto;
            color: #FFCC00;;
        }

        /* Content - Whiteboard Section*/
        .content {
            z-index: 1;
            margin-left: 2%;
            margin-right: 2%;
            max-width: 100%;
            margin-bottom: 2%;
            margin-top: 1%;
            opacity: 100%;
            overflow-y: auto;
            height: 80%;
            top: 0;
            background-color: white;
            border: 3px solid black;
            border-radius: 10px;
        }

        /*Content Header Elements*/
        .content-header {
            position: sticky;
            top: 0;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            background-color: white;
            border-radius: 5px;
            border-bottom: 1px solid gray;
        }

        .content-header .sort-btn {
            font-size: 1rem;
            padding: 5px;
            margin-right: 2%;
            margin-left: auto;
            border-radius: 5px;
            cursor: pointer;
        }

        .content-header input[type="text"] {
            padding: 5px;
            background-color: #f0f2f5;
            border-radius: 5px;
            cursor: pointer;
            line-height: 1.5rem;
            
        }

        .content-header button[type="submit"] {
            font-size: 14px;
            padding: 5px;
            border: 2px solid black;
            border-radius: 0 0 10% 10%;
            background-color: transparent;
            margin-right: 2rem;
            cursor: pointer;
        }

        /* Table Elements */
        table {
            border-collapse: collapse;
            margin: 0;
            width: 100%;
            box-shadow: 0 0 5px rgba(0, 0, 0, .25);
            overflow-y: auto;
            white-space: wrap;
        }

        table tr {
            padding: .5em;
        }

        thead tr {
            background-color: #a6a6a6;
            border-top: 2px solid black;
            border-bottom: 2px solid black;

        }

        table th,
        table td {
            font-size: .8em;
            padding: 1em;
            text-align: center;
        }

        thead th {
            color: color;
            font-size: 1em;
        }

        tbody td {
            white-space: wrap;
            border-bottom: 1px solid #a6a6a6;
    
        }



        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: red;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .logo {
            max-width: 60%;
            max-height: 60%;
            border-radius: 50px;
            margin-right: 40px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
            transition: transform 0.5s ease;
        }


        /* ============ Responsive / Breakpoints ========== */
        /* For Medium Devices */
        @media (max-width: 774px) {
            .sidebar .toggle-close {
                display: block;
                font-weight: bold;
                font-size: 15px;
                cursor: pointer;
                background-color: rgba(255, 0, 0, 0.7);
                color: white;
                padding: 5px 5px;
                border: none;
                width: 15%;
                margin-top: 1rem;
                margin-right: 1rem;
                float: right;
            }

            .sidebar .toggle-close:active {
                background-color: rgba(255, 0, 0, 0.5);
            }

            .home {
                left: 78px;
                width: calc(100% - 78px);
            }

            /* New rules for blurred home element with higher specificity */
            .sidebar~.home {
                filter: blur(5px);
                /* Apply blur filter when sidebar is open */
            }

            .sidebar.close~.home {
                filter: none;
                /* No blur when sidebar is closed */
            }

            .submenu .link {
                padding: 12px 0px;
            }

            .logo {
            max-width: 40%;
            max-height: 40%;
            margin-right: 10px;;
        }
        }

        @media (max-width: 640px) {

            .top .toggle-sidebar {
                margin-left: 1rem;
            }

            .top .page-title {
                font-size: 1rem;
                margin-left: .7rem;
            }

            .content {
                height: 85%;
                margin-bottom: 1%;
            }

            .content-header .sort-btn {
                margin-left: 12%;
                font-size: .95rem;
                width: 50%;
                padding: 0 10px;
                background-color: #f0f2f5;
                white-space: nowrap;
            }


            .content-header input[type="text"] {
                width: 70%;
                margin-left: 5%;
                margin-right: 1%;
                border: 1px solid black;
                line-height: 1.15rem;
            }

            .content-header button[type="submit"] {
                margin-left: 0;
                margin-right: 0;
                border: 1px solid black;
                line-height: 1.15rem;
            }

            /* Table Elements */
            table thead tr {
                display: none;
            }

            table tr {
                display: block;
            }

            table th,
            table td {
                padding: .5em;
            }

            table td {
                text-align: right;
                display: block;
                font-size: .75em;
            }

            table td::before {
                content: attr(data-label);
                float: left;
                font-size: 1em;
                font-weight: bold;
                margin-right: 10%;
                text-align: center;
            }

            tbody tr:nth-child(even) {
                background-color: brown;
                color: #ffff;
                border-bottom: 2px solid black 100%;
            }

            tbody tr:nth-child(even) .row-sort-btn {
                background-color: #f0f2f5;
                color: black;
            }

            tbody tr:nth-child(odd) {
                background-color: #f0f2f5;
                color: black;
                border-bottom: 2px solid black;
            }

            ::-webkit-scrollbar {
                width: 3px;
            }
            
            .logo {
            max-width: 40%;
            max-height: 40%;
            margin-right: 10px;;
        }
        }
        .btn-red {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        .btn-orange {
            background-color: orange;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="sidebar close">
        <button class="toggle-close">X</button>
        <!-- ========== Logo ============  -->
        <a href="#" class="logo-box">
            <i class='bx bxs-pizza'></i>
            <div class="logo-name">Pizza &hearts; Matteo</div>
            <h5 class="branch">Manila</h5>
        </a>

        <!-- ========== List ============  -->
        <ul class="sidebar-list">
            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-grid-alt'></i>
                        <span class="name">Home</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Home</a>
                    <!-- submenu links here  -->
                </div>
            </li>

            <!-- -------- Dropdown List Item ------- -->
            <li class="dropdown">
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-package'></i>
                        <span class="name">Orders</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a class="link submenu-title">Orders</a>
                    <a href="#" class="link">Active Orders</a>
                    <a href="#" class="link">Order History</a>
                    <a href="#" class="link">Invoices</a>
                </div>
            </li>

            <!-- -------- Dropdown List Item ------- -->
            <li class="dropdown">
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bxs-report'></i>
                        <span class="name">Inventory</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Inventory</a>
                    <a href="#" class="link">Stock Inventory</a>
                    <a href="#" class="link">Restock Request</a>
                    <a href="#" class="link">Data Visibility</a>
                    <a href="#" class="link">Forecasting</a>
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-line-chart'></i>
                        <span class="name">Generate Report</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Generate Report</a>
                    <!-- submenu links here  -->
                </div>
            </li>
        </ul>

        <div class="logout-section">
            <i class='bx bx-log-out-circle'></i>
            <div class="name-job">
                <div class="profile_name">Juan Dela Cruz</div>
                <div class="job">Reseller</div>
            </div>
        </div>

    </div>

    <!-- ============= Home Section =============== -->
    <section class="home">
        <!-- ======= Top-Side Content =======-->
        <div class="top">
            <button class="toggle-sidebar">☰</button>
            <span class="page-title">Stock Inventory</span>
            <img class="logo" src="<?php echo e(asset('assets/home_logo.png')); ?>" alt="Logos">
        </div>

        <!--Content inside the White Board-->
        <div class="content">
            <div class="content-header">
                <button type="button" class="sort-btn" id="sortButton">SORT BY: Product Name&nbsp;&nbsp;<i class="bx bx-sort"></i></button>
                <form id="sortForm">
                    <label for="sortColumn">SORT BY:</label>
                    <select id="sortColumn" name="sortColumn">
                        <option value="0">Product Name</option>
                        <option value="3">Price</option>
                        <option value="4">Available Stock</option>
                        <option value="5">Inventory Value</option>
                        <option value="6">Stock Date</option>
                        <option value="7">Days to Expiry</option>
                    </select>
                
                    <select id="sortOrder" name="sortOrder">
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                
                    <button type="submit" class="sort-btn"><i class="bx bx-sort"></i> Sort</button>
                </form>
                <form id="searchForm">
                    <input type="text" placeholder="&nbsp;&nbsp;Search.." name="search" id="searchInput">
                    <button type="submit" class="btn btn-light"><i class="bx bx-search"></i></button>
                </form>
            </div>
            <!--Table-->
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Stock ID</th>
                        <th>Product ID</th>
                        <th>Price</th>
                        <th>Available Stock</th>
                        <th>Inventory Value</th>
                        <th>Stock Date</th>
                        <th>Days to Expiry</th>
                        <th>Stock Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sortedMenuItems = $menuItems->sortBy('menu_name');
                    ?>
                    <?php $__currentLoopData = $sortedMenuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $stocksForMenu = $stocks->where('menu_id', $menu->menu_id);
                            $totalStock = $stocksForMenu->sum('available_stock');
                            $stockStatus = $totalStock == 0 ? 'Out of Stock' : ($totalStock < 10 ? 'Low Stock' : 'Good Stock');
                            $bgColor = $totalStock == 0 ? '#ff6666' : ($totalStock < 10 ? '#ffcc66' : '#66ff66');
                        ?>
                        <?php if($stocksForMenu->isNotEmpty()): ?>
                            <?php $__currentLoopData = $stocksForMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $expiryDate = Carbon\Carbon::parse($stock->expiry_date);
                                    $now = now();
                                    $daysToExpire = intval($now->diffInDays($expiryDate, false));
                                    $isExpired = $daysToExpire <= 0;
                                    $expiryTextColor = 'black';
                                    if ($daysToExpire <= 0) {
                                        $expiryTextColor = 'red';
                                    } elseif ($daysToExpire <= 2) {
                                        $expiryTextColor = 'orange';
                                    } else {
                                        $expiryTextColor = 'green';
                                    }
                                    $formattedExpiryDate = $expiryDate->format('F d, Y');
                                    $formattedStockDate = Carbon\Carbon::parse($stock->stock_date)->format('F d, Y');
                                ?>
                                <tr>
                                    <td><?php echo e($menu->menu_name); ?></td>
                                    <td data-label="Stock ID:"><?php echo e($stock->stock_item_id); ?></td>
                                    <td data-label="Product ID:"><?php echo e($stock->menu_id); ?></td>
                                    <td data-label="Price:">₱<?php echo e($menu->menu_base_price); ?></td>
                                    <td data-label="Available Stock:"><?php echo e($stock->available_stock); ?></td>
                                    <td data-label="Inventory Value:">₱<?php echo e($stock->available_stock * $menu->menu_base_price); ?></td>
                                    <td data-label="Stock Date:"><?php echo e($formattedStockDate); ?></td>
                                    <td data-label="Days to Expiry:">
                                        <span style="color: <?php echo e($expiryTextColor); ?>;">
                                            <?php echo e($daysToExpire <= 0 ? 'Expired' : $daysToExpire . ' day' . ($daysToExpire > 1 ? 's' : '')); ?>

                                        </span>
                                        <br>
                                        <?php echo e($formattedExpiryDate); ?>

                                    </td>
                                    <td data-label="Stock Level" style="color: white; font-weight: bold; background-color: <?php echo e($bgColor); ?>;">
                                        <?php echo e($stockStatus); ?>

                                    </td>
                                    <td>
                                        <form action="<?php echo e(route('dispose.route', $stock->stock_item_id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="<?php echo e($isExpired ? 'btn-red' : 'btn-orange'); ?>">
                                                Dispose
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td><?php echo e($menu->menu_name); ?></td>
                                <td>None</td>
                                <td>None</td>
                                <td data-label="Price:">₱<?php echo e($menu->menu_base_price); ?></td>
                                <td>None</td>
                                <td>None</td>
                                <td>None</td>
                                <td>None</td>
                                <td style="color: white; font-weight: bold; background-color: #ff6666;">Out of Stock</td>
                                <td>Nothing to dispose</td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
              
            

            
            

    </section>
    <script>
        const listItems = document.querySelectorAll(".sidebar-list li");

        listItems.forEach((item) => {
            item.addEventListener("click", () => {
                let isActive = item.classList.contains("active");

                listItems.forEach((el) => {
                    el.classList.remove("active");
                });

                if (isActive) item.classList.remove("active");
                else item.classList.add("active");
            });
        });

        const toggleSidebar = document.querySelector(".toggle-sidebar");
        const logo = document.querySelector(".logo-box");
        const sidebar = document.querySelector(".sidebar");

        toggleSidebar.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });

        logo.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });

        // New functionality to close sidebar with toggle-close button (Mobile View)
        const closeSidebarButton = document.querySelector('.toggle-close');

        closeSidebarButton.addEventListener('click', () => {
            sidebar.classList.toggle('close');
        });

const searchForm = document.getElementById('searchForm');
const menuRows = document.querySelectorAll('tbody tr'); // Select all table rows

searchForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    const searchInput = document.getElementById('searchInput').value.trim().toLowerCase();

    menuRows.forEach(row => {
        let found = false; // Flag to check if row matches search criteria

        // Loop through each cell in the row and check if it contains search input
        row.querySelectorAll('td').forEach(cell => {
            const cellText = cell.textContent.trim().toLowerCase();
            
            // Check if any cell contains the search input
            if (cellText.includes(searchInput)) {
                found = true;
            }
        });

        // Display or hide row based on search result
        if (found) {
            row.style.display = ''; // Show row if any cell matches search input
        } else {
            row.style.display = 'none'; // Hide row if no cell matches
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const sortForm = document.getElementById('sortForm');
    const menuRows = document.querySelectorAll('tbody tr');

    sortForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        const sortColumn = parseInt(document.getElementById('sortColumn').value); // Get selected column index
        const sortOrder = document.getElementById('sortOrder').value; // Get selected sort order

        // Perform sorting based on selected column and order
        const sortedRows = Array.from(menuRows).sort((rowA, rowB) => {
            let cellA = rowA.querySelectorAll('td')[sortColumn].textContent.trim();
            let cellB = rowB.querySelectorAll('td')[sortColumn].textContent.trim();

            // Convert numeric values for Price, Available Stock, Inventory Value columns
            if (sortColumn === 3 || sortColumn === 4 || sortColumn === 5) {
                cellA = parseFloat(cellA.replace(/[^\d.-]/g, '')) || 0;
                cellB = parseFloat(cellB.replace(/[^\d.-]/g, '')) || 0;
            } else if (sortColumn === 6 || sortColumn === 7) { // Assuming 6 is Stock Date, 7 is Days to Expiry
                cellA = parseDate(cellA);
                cellB = parseDate(cellB);
            }

            function parseDate(dateString) {
                if (dateString.toLowerCase() === 'expired') {
                    return new Date(-8640000000000000); // Very early date for "Expired"
                }
                const date = new Date(dateString);
                return isNaN(date) ? new Date(-8640000000000000) : date;
            }

            if (sortOrder === 'asc') {
                return cellA - cellB;
            } else {
                return cellB - cellA;
            }
        });

        const tbody = document.querySelector('tbody');
        sortedRows.forEach((sortedRow) => {
            tbody.appendChild(sortedRow);
        });
    });
});


    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\pizzamatteo\resources\views/reseller_alerts.blade.php ENDPATH**/ ?>