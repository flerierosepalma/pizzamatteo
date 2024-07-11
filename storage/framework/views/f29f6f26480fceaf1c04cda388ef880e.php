<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner | Invoice</title>
    <link rel="icon" type="image/x-icon" href="https://scontent.fmnl4-7.fna.fbcdn.net/v/t1.15752-9/448200191_474132475099478_6596455881542556957_n.png?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_ohc=b4tF4OnvpwMQ7kNvgFrieEp&_nc_ht=scontent.fmnl4-7.fna&oh=03_Q7cD1QFjIEijnlQPvClN4SA7vvEb1V_1qxCAS2tnpsKMeMWxhg&oe=669489EE">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
        }

        :root {
            --color_Red: #8A1C14;
            --color_Dark1: #1e1e1e;
            --color_Dark2: #252527;
            --color_Light1: #F0F2F5;
            --color_Light2: #fff;
        }

        /*========= SIDE BAR ========= */
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

        .sidebar.close .toggle-close {
            display: none;
        }

        .sidebar .toggle-close {
            display: none;
        }

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


        /* =============== HOME SECTION =============== */

        .home {
            position: relative;
            background-color: var(--color_Light1);
            left: 260px;
            width: calc(100% - 260px);
            height: 100vh;
            transition: all .3s ease;
            display: flex;
            flex-direction: column;
        }

        .sidebar.close~.home {
            left: 78px;
            width: calc(100% - 78px);
        }

        .home::before {
            background: linear-gradient(to right, #8A1C14 5%, black 70%);
            background-size: cover;
            background-position: center;
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

        /*========= CONTENT ABOVE WHITEBOARD, BELOW MENU BAR ========= */

        .top {
            width: 100%;
            height: 10%;
            z-index: 1;
            margin-top: 20px;
            ;
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
            color: #FFCC00;
        }

        .top .add-stock {
            border: 2px solid black;
            background-color: #FFCC00;
            font-size: 1rem;
            color: black;
            font-weight: bold;
            padding: 10px;
            margin-right: 2%;
            margin-left: auto;
            border-radius: 5px;
            cursor: pointer;
            
        }

        .top .add-stock:hover {
            transition: background-color 0.3s;
            background-color: orange;
            color: white;
        }


        .logo {
            max-width: 60%;
            max-height: 60%;
            border-radius: 50px;
            margin-right: 40px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
            transition: transform 0.5s ease;
        }

        /*========= CONTENT - WHITEBOARD SECTION ========= */
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

        .content-header {
            position: sticky;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 15px;
            background-color: white;
            border-radius: 5px;
            border-bottom: 1px solid gray;
        }

        .content-header .left-header {
            display: flex;
            align-items: center;

        }

        .content-header .right-header {
            display: flex;
            align-items: center;
        }

        .content-header .active-toggle,
        .content-header .stock-toggle,
        .content-header .transfer-toggle,
        .content-header .update-toggle {
            margin-left: 30px;
            border: none;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            color: #A6A6A6;
            background: transparent;
        }

        .content-header .active-toggle.active,
        .content-header .stock-toggle.active,
        .content-header .transfer-toggle.active,
        .content-header .update-toggle.active {
            color: black;
            text-underline-offset: 5px;
            text-decoration: 2px solid underline;
            text-decoration-color: #901B16;
        }

        .content-header h3 {
            font-size: 20px;
            color: #8A1C14;
            margin-right: 20px;
        }

        .content-header input[type="text"] {
            padding: 8px;
            background-color: #f0f2f5;
            border: 1px solid #ccc;
            border-radius: 5px;
            line-height: 1.5rem;
            transition: border-color 0.3s ease;
            margin-left: 10px;
        }

        .content-header input[type="text"]:focus {
            border-color: #8A1C14;
        }

        #sortControl {
            display: flex;
            align-items: center;
        }

        #sortControl label {
            margin-right: 10px;
            font-size: 15px;
        }

        .sort-select-wrapper {
            position: relative;
            margin-right: 10px;
        }

        .sort-select {
            padding: 8.5px;
            background-color: #f0f2f5;
            border: 1px solid #ccc;
            border-radius: 5px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 130px;
        }

        .sort-select:focus {
            outline: none;
            border-color: #8A1C14;
        }

        .sort-order {
            padding: 8.5px;
            background-color: #f0f2f5;
            border: 1px solid #ccc;
            border-radius: 5px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 100px;
        }

        .sort-order:focus {
            outline: none;
            border-color: black;
        }

        .sort-select:hover,
        .sort-order:hover {
            border-color: black;
        }

        .sort-select:hover .select-arrow {
            border-top-color: white;
        }

        .sort-order:hover {
            border-color: black;
        }

        #searchInput {
            padding-left: 30px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 0 0 1.48-5.34c-.47-2.78-2.98-5-5.84-5.34a6.505 6.505 0 0 0-7.27 7.27c.34 2.86 2.56 5.37 5.34 5.84a6.5 6.5 0 0 0 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0 .41-.41.41-1.08 0-1.49L15.5 14zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>');
            background-size: 20px;
            background-position: 8px center;
            background-repeat: no-repeat;
        }

        /*========= TABLE ELEMENTS ========= */
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
        }

        @media (max-width: 640px) {

            .top .toggle-sidebar {
                margin-left: 1rem;
            }

            .top .page-title {
                font-size: 1.5rem;
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
                    <a href="<?php echo e(url('owner_home')); ?>" class="link">
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
                    <a href="<?php echo e(url('order_history')); ?>" class="link">Order History</a>
                    <a href="<?php echo e(url('owner_invoice')); ?>" class="link">Invoices</a>
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
                    <a href="<?php echo e(url('owner_inventory')); ?>" class="link">Stock Alerts</a>
                    <a href="<?php echo e(url('owner_stock_request')); ?>" class="link">Restock Request</a>
                    <a href="<?php echo e(url('owner_data_visibility')); ?>" class="link">Data Visibility</a>
                    <a href="<?php echo e(url('owner_forecasting')); ?>" class="link">Forecasting</a>
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="<?php echo e(url('owner_generate_report')); ?>" class="link">
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
    <div class="top">
            <button class="toggle-sidebar">☰</button>
            <span class="page-title">Invoice</span>
            <img class="logo" src="<?php echo e(asset('assets/home_logo.png')); ?>" alt="Logos">
        </div>



    <!-- ============= WHITEBOARD=============== -->
         
        <div class="content">
            <div class="content-header">
                <div class="left-header">
                </div>
                <div class="right-header">   
                    <div id="sortControl">
                        <label for="sortColumn">SORT BY:</label>
                        <div class="sort-select-wrapper">
                            <select id="sortColumn" name="sortColumn" class="sort-select">
                                <option value="0">Menu Name</option>
                                <option value="3">Price</option>
                                <option value="4">Available Stock</option>
                                <option value="5">Inventory Value</option>
                                <option value="6">Stock Date</option>
                                <option value="7">Days to Expiry</option>
                            </select>
                            <span class="select-arrow"></span>
                        </div>
                        <select id="sortOrder" name="sortOrder" class="sort-order">
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                    </div>
                    <div id="searchContainer">
                        <input type="text" placeholder="&nbsp;&nbsp;Search.." name="search" id="searchInput">
                    </div>
                </div>
            </div>

    <!-- ============= MENU TABLE =============== -->
    <table>
        <thead>
            <tr>
                <th>Invoice ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Store</th>
                <th>Amount Paid</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $invoiceData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>#<?php echo e($invoice->invoice_id); ?></td>
                    <td><?php echo e($invoice->reseller_name); ?></td>
                    <td><?php echo e($invoice->reseller_email); ?></td>
                    <td><?php echo e($invoice->store_name); ?></td>
                    <td>₱<?php echo e($invoice->amount_paid); ?></td>
                    <td><?php echo e($invoice->date_sent); ?></td>
                    <td><a href="<?php echo e(route('invoice.view', ['invoiceId' => $invoice->invoice_id])); ?>">View Invoice</a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

  
       
            
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

        // Existing sidebar toggle functionality
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


    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\pizzamatteo\resources\views/owner_invoice.blade.php ENDPATH**/ ?>