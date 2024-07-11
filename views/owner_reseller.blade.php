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
            color: #FFCC00;;
        }


        .top .add-reseller {
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

        .top .add-reseller:hover {
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
            justify-content: space-between; /* Aligns items to each end */
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

        .content-header h3 {
            font-size: 20px;
            color: #8A1C14;
            margin-right: 20px; /* Adjust as needed for spacing */
        }

        .content-header input[type="text"] {
            padding: 8px;
            background-color: #f0f2f5;
            border: 1px solid #ccc;
            border-radius: 5px;
            line-height: 1.5rem;
            transition: border-color 0.3s ease;
            margin-left: 10px; /* Add margin to the left */
        }

        .content-header input[type="text"]:focus {
            border-color: #8A1C14;
        }


        /* =============== ADD RESELLER MODAL =============== */

        #addresellerModal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            align-items: center;
            justify-content: center;
        }

        #addresellerModal .modal-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 380px;
            padding: 30px 20px;
            width: 100%;
            border-radius: 23px;
            background-color: #fefefe;
            position: relative;
        }

        .modal-box h2 {
            font-size: 25px;
            font-weight: 800;
            color: #333;
        }

        .modal-box h3 {
            margin-top: 20px;
            font-size: 16px;
            font-weight: 400;
            color: #333;
            text-align: center;
        }

        .modal-box .modal-buttons {
            border-radius: 50%;
            margin-top: 25px;
            display: flex;
            justify-content: center; /* Center the buttons */
            gap: 10px; /* Space between buttons */
            width: 100%;
        }

        .modal-box button { 
            border-radius: 15px;
            font-size: 14px;
            padding: 10px;  /* Adjust padding for a balanced look */
            margin: 10px; /* Remove extra margins */
            background-color: #fff;
            color: black;
            transition: background-color 0.3s;
            cursor: pointer;
            border: 1px solid #ccc;
            flex: 1;
            max-width: 140px; /* Set a max width for better responsiveness */
        }

        .modal-box button:hover,
        .modal-box button:focus {
            background-color: #8A1C14;
            color: #fff;
        }
        
        .close-modal {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            border-radius: 100%; /* Circle shape */
            background-color: #ccc; /* Gray background */
            color: #333;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
        }


        /*========= newly added-reseller ========= */

        .reseller-modal .modal-content {
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 900px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            margin: 20px auto;
        }

        .reseller-modal .modal-content h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .reseller-modal .modal-content .info {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 13px;
        }

        .reseller-modal .modal-content .info-item {
            background-color: white;
            color: black;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #8A1C14;
        }

        .reseller-modal .modal-content .info-item .label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .reseller-modal .modal-content .info-item .value {
            display: block;
        }

        .reseller-modal .modal-content .actions {
            display: flex;
            justify-content: right;
            gap: 10px;
            margin-top: 20px;
        }

        .reseller-modal .modal-content .btn-edit,
        .reseller-modal .modal-content .btn-delete {
            background-color: #d32f2f;
            border: none;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 8px;
            color: white;
            transition: background-color 0.3s;
        }

        .reseller-modal .modal-content .btn-edit:hover,
        .reseller-modal .modal-content .btn-delete:hover {
            background-color: #8A1C14;
        }


        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: normal;
            cursor: pointer;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
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
            width: 130px; /* Adjust width as needed */
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
            width: 100px; /* Adjust width as needed */
        }

        .sort-order:focus {
            outline: none;
            border-color: black;
        }

        /* Hover and Focus Effects */
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


        .content-header h3 {
            font-size: 20px;
            color: #8A1C14;
            margin-right: 20px; /* Adjust as needed for spacing */
        }

        .content-header input[type="text"] {
            padding: 5px;
            background-color: #f0f2f5;
            border-radius: 5px;
            cursor: pointer;
            line-height: 1.5rem;
        }

        /* Table Elements */
        


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

            tbody tr:nth-child(even) {
                background-color: brown;
                color: #ffff;
                border-bottom: 2px solid black 100%;
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
        #searchInput {
            padding-left: 30px; /* Adjust padding to accommodate the icon */
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 0 0 1.48-5.34c-.47-2.78-2.98-5-5.84-5.34a6.505 6.505 0 0 0-7.27 7.27c.34 2.86 2.56 5.37 5.34 5.84a6.5 6.5 0 0 0 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0 .41-.41.41-1.08 0-1.49L15.5 14zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>');
            background-size: 20px; /* Adjust size of the icon */
            background-position: 8px center; /* Adjust position of the icon */
            background-repeat: no-repeat;
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
                    <i class='bx bxs-user-detail'></i>
                        <span class="name">Resellers</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Resellers</a>
                    <!-- submenu links here  -->
                </div>
            </li>

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
            <span class="page-title">Resellers Details</span>
            <button class="add-reseller" onclick="showAddModal()">Add Reseller</button>
            <img class="logo" src="{{ asset('assets/home_logo.png') }}" alt="Logos">
        </div>

        <div class="content">
            <div class="content-header">
                <div class="left-header">
                </div>

                <div class="right-header">
                    <div id="sortControl">
                        <label for="sortColumn">SORT BY:</label>
                        <div class="sort-select-wrapper">
                            <select id="sortColumn" name="sortColumn" class="sort-select">
                                <option value="1">Reseller Name</option>
                                <option value="2">Branch</option>
                                <option value="3">Province</option>
                                <option value="4">Status</option>
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
        </div>


    </section>

    <!-- ADD MODAL -->
    <div id="addresellerModal">
        <div class="modal-box">
            <button class="close-modal" onclick="closeAddModal()">✖</button>
            <h2>REGISTRATION</h2>
            <h3>Fill out the following form to complete the Registration of the Reseller?</h3>
            <div class="modal-buttons">
                <button class="close-btn" onclick="closeAddModal()">No, Close</button>
                <button class="add-btn" onclick="redirectToRegister()">Yes, Add Reseller</button>
            </div>
        </div>
    </div>
                  
    
    <!-- For the newly added resellers -->

    <div class="reseller-modal">
    <div class="modal-content">
        <h2>Reseller Information</h2>
        <div class="info">
            <div class="info-item"><span class="label">Name:</span> <span class="value">John Doe</span></div>
            <div class="info-item"><span class="label">Gender:</span> <span class="value">Male</span></div>
            <div class="info-item"><span class="label">Birthday:</span> <span class="value">January 1, 1990</span></div>
            <div class="info-item"><span class="label">Selected Province:</span> <span class="value">Example Province</span></div>
            <div class="info-item"><span class="label">Store:</span> <span class="value">Example Store</span></div>
            <div class="info-item"><span class="label">City:</span> <span class="value">Example City</span></div>
            <div class="info-item"><span class="label">Barangay:</span> <span class="value">Example Barangay</span></div>
            <div class="info-item"><span class="label">Street Name:</span> <span class="value">123 Example Street</span></div>
            <div class="info-item"><span class="label">Phone Number:</span> <span class="value">123-456-7890</span></div>
            <div class="info-item"><span class="label">Email:</span> <span class="value">johndoe@example.com</span></div>
            <div class="info-item"><span class="label">Password:</span> <span class="value">********</span></div>
            <div class="info-item"><span class="label">Gcash Number:</span> <span class="value">0987-654-3210</span></div>
            <div class="info-item"><span class="label">Store Map:</span> <span class="value">Example Map Link</span></div>
            <div class="info-item"><span class="label">Selected Schedule:</span> <span class="value">Mon-Fri, 9AM-5PM</span></div>
            <div class="info-item"><span class="label">Pick-up Date:</span> <span class="value">July 15, 2024</span></div>
            <div class="info-item"><span class="label">Province:</span> <span class="value">Example Province</span></div>
        </div>
        <div class="actions">
            <button class="btn-edit" onclick="editReseller()">Edit</button>
            <button class="btn-delete" onclick="deleteReseller()">Delete</button>
        </div>
    </div>
</div>
    
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

        const searchInput = document.getElementById('searchInput');

function performSearch() {
    const searchTerm = searchInput.value.trim().toLowerCase();

    // Only search the visible table
    const activeContent = document.querySelector('.clickers:not([style*="display: none"]) tbody');
    const menuRows = activeContent.querySelectorAll('tr');

    menuRows.forEach(row => {
        let found = false; // Flag to check if row matches search criteria

        row.querySelectorAll('td').forEach(cell => {
            const cellText = cell.textContent.trim().toLowerCase();

            if (cellText.includes(searchTerm)) {
                found = true;
            }
        });

        row.style.display = found ? '' : 'none';
    });
}

searchInput.addEventListener('input', performSearch);



// FUNCTIONS ADD RESELLER UPPER BOX
function showAddModal() {
            document.getElementById('addresellerModal').style.display = 'flex';
        }

        function closeAddModal() {
            document.getElementById('addresellerModal').style.display = 'none';
        }

        function redirectToRegister() {
            window.location.href = 'reseller_register.blade.php';
        }
        
       
// FUNCTIONS EDIT AND DELETE BUTTON (reseller container)
function editReseller() {
    // Add your edit logic here
    console.log("Edit button clicked");
    // For example, you could open an edit form or enable editing of the current fields
}

function deleteReseller() {
    // Add your delete logic here
    console.log("Delete button clicked");
    // For example, you could show a confirmation dialog and then delete the reseller
    if (confirm("Are you sure you want to delete this reseller?")) {
        console.log("Reseller deleted");
        // Add code here to actually delete the reseller from your system
    }
}
       
</script>
</body>
</html>
