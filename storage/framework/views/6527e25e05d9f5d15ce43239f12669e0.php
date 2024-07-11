<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <style>
        /* Google Fonts  */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');


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


        .toggle-sidebar {
            background-color: transparent;
        }

        .toggle-sidebar .page-title {
            flex-direction: row;
        }

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

     
            .sidebar~.home {
                filter: blur(5px);
       
            }

 
            .submenu .link {
                padding: 12px 0px;
            }

        }

        @media (max-width: 640px) {

            .toggle-sidebar {
                margin-left: 1rem;
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
                    <a href="#" class="link">Stock Alerts</a>
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
 
            <button class="toggle-sidebar">☰</button>
    
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


    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\pizzamatteo\resources\views/_sidebar.blade.php ENDPATH**/ ?>