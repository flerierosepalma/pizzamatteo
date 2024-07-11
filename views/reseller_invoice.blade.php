<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseller's Dashboard</title>
    <link rel="icon" type="image/x-icon" href="https://scontent.fmnl4-7.fna.fbcdn.net/v/t1.15752-9/448200191_474132475099478_6596455881542556957_n.png?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_ohc=b4tF4OnvpwMQ7kNvgFrieEp&_nc_ht=scontent.fmnl4-7.fna&oh=03_Q7cD1QFjIEijnlQPvClN4SA7vvEb1V_1qxCAS2tnpsKMeMWxhg&oe=669489EE">
    <!-- Box Icons  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Styles  -->
    <link rel="shortcut icon" href="#" type="image/x-icon">


<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

/* Globals  */
*{
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    list-style: none;
    text-decoration: none;
}

/* Variables  */
:root{
    --color_Red: #8A1C14;
    --color_Dark1: #1e1e1e;
    --color_Dark2: #252527;
    --color_Light1: #F0F2F5;
    --color_Light2: #fff;
}

/* =============== Sidebar =============== */
.sidebar{
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 260px;
    background-color: #1A1D1F;
    transition: all .2s ease;
    z-index: 100;
}
.sidebar.close{
    width: 78px;
}

/* --------- Logo ------------ */
.logo-box{
    height: 60px;
    width: 100%;
    display: flex;
    align-items: center;
    color: var(--color_Light1);
    transition: all .5s ease;
}
.logo-box:hover{
    color: var(--color_Red);
}
.logo-box i{
    font-size: 30px;
    height: 50px;
    min-width: 78px;
    text-align: center;
    line-height: 50px;
    transition: all .5s ease;
}
.sidebar.close .logo-box i{
    transform: rotate(360deg);
}
.sidebar .logo-name{
    font-size: 22px;
    font-weight: 600;
    white-space: nowrap;
}

.logo-box h5{
    margin-top: 60px;
    margin-left: -110px;
}

.sidebar.close h5{
    opacity: 0;
}

/* ---------- Sidebar List ---------- */
.sidebar-list{
    height: 100%;
    padding: 30px 0 150px 0;
    overflow: auto;
}
.sidebar-list::-webkit-scrollbar{
    display: none;
}
.sidebar-list li{
    transition: all .5s ease;
}
.sidebar-list li:hover{
    background-color: var(--color_Dark2);
}
.sidebar-list li .title{
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all .5s ease;
    cursor: pointer;
}
.sidebar .bxs-chevron-down{
    color: black;
}
.sidebar-list li.active .title{
    background-color: var(--color_Blue);
}
.sidebar-list li.active .bxs-chevron-down{
    transition: all .5s ease;
    transform: rotate(180deg);
}
.sidebar-list li .title .link{
    display: flex;
    align-items: center;
}

.sidebar-list li .title i{
    height: 50px;
    min-width: 78px;
    text-align: center;
    line-height: 50px;
    color: var(--color_Light1);
    font-size: 20px;
}
.sidebar-list li .title .name{
    font-size: 18px;
    font-weight: 400;
    color: var(--color_Light1);
    white-space: nowrap;
}

/* ---------------- Submenu ------------- */
.sidebar-list li .submenu{
    width: 0;
    height: 0;
    opacity: 0;
    transition: all .2s ease;
}
.sidebar-list li.dropdown.active .submenu{
    width: unset;
    height: unset;
    opacity: 1;
    display: flex;
    flex-direction: column;
    padding: 6px 6px 14px 80px;
    background-color: var(--color_Dark2);
}
.submenu .link{
    color: var(--color_Light1);
    font-size: 16px;
    padding: 10px 0;
    transition: all .5s ease;
}
.submenu .link:hover{
    color: #fff;
}
.submenu-title{
    display: none;
}

/* ---------------- Submenu Close ------------- */
.sidebar.close .logo-name,
.sidebar.close .location,
.sidebar.close .title .name,
.sidebar.close .title .bxs-chevron-down
{
    display: none;
}

.sidebar.close .sidebar-list{
    overflow: visible;
}
.sidebar.close .sidebar-list li{
    position: relative;
}
.sidebar.close .sidebar-list li .submenu{
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
.sidebar.close .sidebar-list li:hover .submenu{
    opacity: 1;
    top: 0;
    pointer-events: initial;
    background-color: var(--color_Dark2);
}
.sidebar.close .submenu-title{
    display: block;
    font-style: 18px;
    color: var(--color_Light1);
}


/* Start - Logout Section - Username - Job - Button */

/*Close button that only appears when in mobile view*/
.sidebar.close .toggle-close{
    display: none;
}

.sidebar .toggle-close{
    display: none;
}
/*End*/

.sidebar .logout-section{
    position: sticky;
    bottom: 0;
    width: 260px;
    background: black;
    padding: 12px 0;
    transition: all 0.2s ease;
  }

  .sidebar .logout-section i{
    margin-left: 25px;
    font-size: 25px;
    color: #901B16;
  }

  .sidebar .logout-section .name-job{
    font-size: 25px;
    margin-left: 30px;
  }

  .sidebar .logout-section{
    display: flex;
    align-items: center;
  }

  .sidebar .logout-section .job{
    font-size: 12px;
    color: #901B16;
  }

  .sidebar .logout-section .profile_name,
  .sidebar .logout-section{
    color: #fff;
    font-size: 15px;
    font-weight: 500;
    white-space: nowrap;
    text-align: left;
  }

  .sidebar.close .logout-section{
    background: none;
  }
  .sidebar.close .logout-section{
    width: 78px;
  }

  .sidebar.close .logout-section .profile_name,
  .sidebar.close .logout-section .job{
    display: none;
  }

  .sidebar.close.bx-log-out-circle{
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
    flex-direction: column; /* Stack elements vertically */
  }
  
.sidebar.close ~ .home{
    left: 78px;
    width: calc(100% - 78px);
}

.home::before{
    background-image: url(https://scontent.fmnl4-1.fna.fbcdn.net/v/t1.6435-9/101067820_170353334508376_6406953870226858609_n.png?_nc_cat=103&ccb=1-7&_nc_sid=5f2048&_nc_ohc=-VeqrWNhA5wQ7kNvgEG20dR&_nc_ht=scontent.fmnl4-1.fna&oh=00_AYA6oD7Wdxt81gYAXUsg-vDxIlmoNOMx-2YHvv_k5km7wA&oe=6693FC90);
    background-size: cover;
    background-position: center;  /* Center the image */
    background-repeat: no-repeat;
    position: fixed;
    content: '';
    inset: 0;
    width: calc(100%-78px);
    opacity: 50%;
    filter: blur(2px);
    height: 60%;
    pointer-events: none;
}

.home .bx-menu{
    z-index: 1;
}


/* Content Above Whiteboard, Below Menu Bar*/

.top{
    width: 100%;
    height: 10%;
    z-index: 1;
    top: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.top .toggle-sidebar{
    margin-top: 0;
    cursor: pointer;
    border: none;
    margin-left: 1.5rem;
    font-weight: bold;
    font-size: 25px;
    color: black;
    background-color: transparent;
}

.top .toggle-sidebar .page-title, .date-picker, .all-download-btn {
    flex-direction: row; 
}

.top .page-title{
    font-size: 25px;
    font-weight: bold;
    margin-left: 3%;
    margin-right: auto;
}

.date-picker, .all-download-btn {
    margin-left: 15%;
    margin-right: auto;
}
.top .date-picker{
    font-size: 1rem;
    padding: 5px;
    border-radius: 10px;
}

.top .all-download-btn{
    font-size: .8rem;
    padding: 5px;
}
  
/* Content - Whiteboard Section*/
.content{
    margin-top: 1%;
    opacity: 100%;
    overflow-y: auto;
    z-index: 1;
    margin-left: 2%;
    margin-right: 2%;
    max-width: 100%;
    margin-bottom: 2%;
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
    padding: 10px 15px; 
    background-color: white;
    border-radius: 5px; 
    border-bottom: 1px solid gray;
}

.content-header .paid-toggle{
    margin-left: 10%;
    border: none;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    color: #A6A6A6;
    background: transparent;
}

.content-header .refunded-toggle{
    margin-left: 10%;
    border: none;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    color: #A6A6A6; 
    background: transparent;
}

.content-header .paid-toggle.active,
    .content-header .refunded-toggle.active {
        color: black;
        text-underline-offset: 5px;
        text-decoration: 2px solid underline;
        text-decoration-color: #901B16; 
    }

.content-header .download-btn {
    font-size: 25px;
    border: none;
    margin-right: 3%;  
    margin-left: auto;
    cursor: pointer;
    background: transparent;
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
    margin-right: 1rem;
    cursor: pointer; 
}

/* Table Elements */
table{
    border-collapse: collapse;
    margin: 0;
    width: 100%;
    box-shadow: 0 0 5px rgba(0, 0, 0, .25); 
    overflow-y: auto;
}
table tr{
    padding: .5em;
}

thead tr{
    background-color: #a6a6a6;
}

table th,
table td{
    font-size: .8em;
    padding: 1em;
    text-align: center;
}

thead th{
    color: color;
    font-size: 1em;
}


.row-download-btn {
    background-color: #901B16; 
    color: white;
    padding: 5px 10px; 
    border: none;
    border-radius: 5px; 
    font-size: 14px; 
    cursor: pointer; 
}

tbody tr:nth-child(odd){
    box-shadow: 0 0 5px rgba(0, 0, 0, .25);
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
@media (max-width: 774px){
    .sidebar .toggle-close{
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

    .sidebar .toggle-close:active{
        background-color: rgba(255, 0, 0, 0.5);
    }
    .home{
        left: 78px;
        width: calc(100% - 78px);
    }

    /* New rules for blurred home element with higher specificity */
    .sidebar ~ .home {
        filter: blur(5px); /* Apply blur filter when sidebar is open */
    }
    
    .sidebar.close ~ .home {
        filter: none; /* No blur when sidebar is closed */
    }

    .submenu .link{
        padding: 12px 0px;
    }

}


@media (max-width: 732px){

    .top .toggle-sidebar{
        margin-left: 1rem;
    }
    .top .page-title{
        font-size: 1.5rem;
        margin-left: .7rem;
    }

    .top .date-picker{
        font-size: 1rem;
        margin-left: 0;
        line-height: 1rem;
    }

    .top .all-download-btn{
        font-size: 1rem;
        margin-left: 0;
        font-weight: 300;
    }

    .content{
        height: 85%;
        margin-bottom: 1%;
    }
    .content-header .paid-toggle{
        font-size: .8rem;
        margin-left: 1%;
    }
    .content-header .refunded-toggle{
        font-size: .8rem;
        margin-left: 5%;
    }

    .content-header .download-btn{
        margin-left: 10%;
    }

    .content-header input[type="text"] {
        width: 60%;
        margin-left: 10%;
        margin-right: 1%;
        border: none;
        line-height: 1.2rem;
    }

    .content-header button[type="submit"] {
        margin-left: 0;
        margin-right: 0;
        border: 1px solid black;
        line-height: .6rem;
    }

    /* Table Elements */
    table thead tr{
        display: none;
    }
    table tr{
        display: block;
    }
    table th, table td{
        padding: .5em;
    }
    table td{
        text-align: right;
        display: block;
        font-size: 1em;
    }
    table td::before{
        content: attr(data-label);
        float: left;
        font-size: 1em;
        font-weight: bold;
        margin-right: 10%;
        text-align: center;
    }

    tbody tr:nth-child(even){
        background-color: brown;
        color: #ffff;
        border-bottom: 2px solid black 100%;
    }

    tbody tr:nth-child(even) .row-download-btn{
        background-color: #f0f2f5;
        color: black;
    }

    tbody tr:nth-child(odd){
        background-color: #f0f2f5;
        color: black;
        border-bottom: 2px solid black;
    }

    ::-webkit-scrollbar {
    width: 3px;
    }
    
}


@media (max-width: 550px){
    .top .toggle-sidebar{
        margin-left: 1rem;
    }
    .top .page-title{
        font-size: 1rem;
        margin-left: .7rem;
    }

    .top .date-picker{
        font-size: .7rem;
        margin-left: 0;
        line-height: 1.5rem;
        font-weight: 500;
    }

    .top .all-download-btn{
        font-size: .5rem;
        margin-left: 0;
        font-weight: 500;
        line-height: 1.5rem;
        margin-right: .5rem;
    }

    .content{
        height: 85%;
        margin-bottom: 1%;
    }
    .content-header .paid-toggle{
        font-size: .8rem;
        margin-left: 1%;
    }
    .content-header .refunded-toggle{
        font-size: .8rem;
        margin-left: 5%;
    }

    .content-header .download-btn{
        margin-left: 10%;
    }

    .content-header input[type="text"] {
        width: 60%;
        margin-left: 10%;
        margin-right: 1%;
        border: none;
        line-height: 1.2rem;
    }

    .content-header button[type="submit"] {
        margin-left: 0;
        margin-right: 0;
        border: 1px solid black;
        line-height: .6rem;
    }

    /* Table Elements */
    table thead tr{
        display: none;
    }
    table tr{
        display: block;
    }
    table th, table td{
        padding: .5em;
    }
    table td{
        text-align: right;
        display: block;
        font-size: .75em;
    }
    table td::before{
        content: attr(data-label);
        float: left;
        font-size: 1em;
        font-weight: bold;
        margin-right: 10%;
        text-align: center;
    }

    tbody tr:nth-child(even){
        background-color: brown;
        color: #ffff;
        border-bottom: 2px solid black 100%;
    }

    tbody tr:nth-child(even) .row-download-btn{
        background-color: #f0f2f5;
        color: black;
    }

    tbody tr:nth-child(odd){
        background-color: #f0f2f5;
        color: black;
        border-bottom: 2px solid black;
    }

    ::-webkit-scrollbar {
    width: 3px;
    }
    
}

@media (max-width: 420px){
    .content{
        margin-top: 2rem;
    }
        .top .date-picker,
        .top .all-download-btn {
           display: block;
           margin-left: 0;
           margin-top: 80px;
         }
        .top .toggle-sidebar{
            margin-left: 1rem;
        }
        .top .page-title{
            font-size: 1rem;
            margin-left: .7rem;
        }
    
        .top .date-picker{
            font-size: .5rem;
            margin-left: 0;
            line-height: 1.5rem;
            font-weight: 500;
        }
    
        .top .all-download-btn{
            font-size: .5rem;
            margin-left: 0;
            font-weight: 500;
            line-height: 1.5rem;
            margin-right: .5rem;
        }
    
        .content{
            height: 85%;
            margin-bottom: 1%;
        }
        .content-header .paid-toggle{
            font-size: .8rem;
            margin-left: 1%;
        }
        .content-header .refunded-toggle{
            font-size: .8rem;
            margin-left: 5%;
        }
    
        .content-header .download-btn{
            margin-left: 10%;
        }
    
        .content-header input[type="text"] {
            width: 60%;
            margin-left: 10%;
            margin-right: 1%;
            border: none;
            line-height: 1.2rem;
        }
    
        .content-header button[type="submit"] {
            margin-left: 0;
            margin-right: 0;
            border: 1px solid black;
            line-height: .6rem;
        }
    
        /* Table Elements */
        table thead tr{
            display: none;
        }
        table tr{
            display: block;
        }
        table th, table td{
            padding: .5em;
        }
        table td{
            text-align: right;
            display: block;
            font-size: .75em;
        }
        table td::before{
            content: attr(data-label);
            float: left;
            font-size: 1em;
            font-weight: bold;
            margin-right: 10%;
            text-align: center;
        }
    
        tbody tr:nth-child(even){
            background-color: brown;
            color: #ffff;
            border-bottom: 2px solid black 100%;
        }
    
        tbody tr:nth-child(even) .row-download-btn{
            background-color: #f0f2f5;
            color: black;
        }
    
        tbody tr:nth-child(odd){
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
                    <a href="{{ url('reseller_home') }}" class="link">
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
                    <a href="{{ url('active_orders') }}"class="link">Active Orders</a>
                    <a href="{{ url('order_history') }}"class="link">Order History</a>
                    <a href="{{ url('reseller_invoice') }}" class="link">Invoices</a>
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
                    <a href="{{ url('reseller_inventory') }}" class="link">Stock Alerts</a>
                    <a href="{{ url('reseller_restock_request') }}" class="link">Restock Request</a>
                    <a href="{{ url('data_visibility') }}" class="link">Data Visibility</a>
                    <a href="{{ url('reseller_forecasting') }}" class="link">Forecasting</a>
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="{{ url('generate_report') }}" class="link">
                        <i class='bx bx-line-chart'></i>
                        <span class="name">Generate Report</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="" class="link submenu-title">Generate Report</a>
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
            <span class="page-title">Invoices</span>
            <input type="date" id="birthday" name="birthday" class="date-picker">
            <button class="all-download-btn">DOWNLOAD ALL</button>
        </div>

        <!--Content inside the White Board-->
    <div class="content">
            <div class="content-header">
                <button onclick="showContent(1)" class="paid-toggle active">Paid</button>
                <button onclick="showContent(2)" class="refunded-toggle active">Refunded</button>
                <button class="download-btn"><i class="bx bx-download"></i></button>
                <form action="">
                    <input type="text" placeholder="&nbsp;&nbsp;Search.." name="search">
                    <button type="submit"><i class="bx bx-search"></i></button>
                </form>
            </div>
        <!--Table-->
            <div id="content-1" class="clickers">
        <table>
            <thead>
            <tr>
                <th>Order/Invoice ID</th>
                <th>Customer Name</th>
                <th>Invoice Date </th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td data-label="Order/Invoice ID:">#00000</td>
                <td data-label="Customer Name:">Juan Dela Cruz </td>
                <td data-label="Invoice Date:">MM/DD/YY 00:00</td>
                <td data-label="Amount:">₱000</td>
                <td data-label="Payment Method:">GCASH</td>
                <td><button class="row-download-btn"><i class="bx bx-download"></i></button></td>
            </tr>
            </tbody>
        </table>
        </div>

        <div id="content-2" class="clickers" style="display: none;">
        <table>
            <thead>
            <tr>
                <th>Order/Invoice ID</th>
                <th>Customer Name</th>
                <th>Invoice Date </th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td data-label="Order/Invoice ID:">#00000</td>
                <td data-label="Customer Name:">Juan Dela Cruz </td>
                <td data-label="Invoice Date:">MM/DD/YY 00:00</td>
                <td data-label="Amount:">₱000</td>
                <td data-label="Payment Method:">GCASH</td>
                <td><button class="row-download-btn"><i class="bx bx-download"></i></button></td>
            </tr>
            <tr>
                <td data-label="Order/Invoice ID:">#00000</td>
                <td data-label="Customer Name:">Juan Dela Cruz </td>
                <td data-label="Invoice Date:">MM/DD/YY 00:00</td>
                <td data-label="Amount:">₱000</td>
                <td data-label="Payment Method:">GCASH</td>
                <td><button class="row-download-btn"><i class="bx bx-download"></i></button></td>
            </tr>
            <tr>
                <td data-label="Order/Invoice ID:">#00000</td>
                <td data-label="Customer Name:">Juan Dela Cruz </td>
                <td data-label="Invoice Date:">MM/DD/YY 00:00</td>
                <td data-label="Amount:">₱000</td>
                <td data-label="Payment Method:">GCASH</td>
                <td><button class="row-download-btn"><i class="bx bx-download"></i></button></td>
            </tr>
            <tr>
                <td data-label="Order/Invoice ID:">#00000</td>
                <td data-label="Customer Name:">Juan Dela Cruz </td>
                <td data-label="Invoice Date:">MM/DD/YY 00:00</td>
                <td data-label="Amount:">₱000</td>
                <td data-label="Payment Method:">GCASH</td>
                <td><button class="row-download-btn"><i class="bx bx-download"></i></button></td>
            </tr>
            <tr>
                <td data-label="Order/Invoice ID:">#00000</td>
                <td data-label="Customer Name:">Juan Dela Cruz </td>
                <td data-label="Invoice Date:">MM/DD/YY 00:00</td>
                <td data-label="Amount:">₱000</td>
                <td data-label="Payment Method:">GCASH</td>
                <td><button class="row-download-btn"><i class="bx bx-download"></i></button></td>
            </tr>
            <tr>
                <td data-label="Order/Invoice ID:">#00000</td>
                <td data-label="Customer Name:">Juan Dela Cruz </td>
                <td data-label="Invoice Date:">MM/DD/YY 00:00</td>
                <td data-label="Amount:">₱000</td>
                <td data-label="Payment Method:">GCASH</td>
                <td><button class="row-download-btn"><i class="bx bx-download"></i></button></td>
            </tr>
            <tr>
                <td data-label="Order/Invoice ID:">#00000</td>
                <td data-label="Customer Name:">Juan Dela Cruz </td>
                <td data-label="Invoice Date:">MM/DD/YY 00:00</td>
                <td data-label="Amount:">₱000</td>
                <td data-label="Payment Method:">GCASH</td>
                <td><button class="row-download-btn"><i class="bx bx-download"></i></button></td>
            </tr>
            <tr>
                <td data-label="Order/Invoice ID:">#00000</td>
                <td data-label="Customer Name:">Juan Dela Cruz </td>
                <td data-label="Invoice Date:">MM/DD/YY 00:00</td>
                <td data-label="Amount:">₱000</td>
                <td data-label="Payment Method:">GCASH</td>
                <td><button class="row-download-btn"><i class="bx bx-download"></i></button></td>
            </tr>
            <tr>
                <td data-label="Order/Invoice ID:">#00000</td>
                <td data-label="Customer Name:">Juan Dela Cruz </td>
                <td data-label="Invoice Date:">MM/DD/YY 00:00</td>
                <td data-label="Amount:">₱000</td>
                <td data-label="Payment Method:">GCASH</td>
                <td><button class="row-download-btn"><i class="bx bx-download"></i></button></td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>

    </section> <!--End of Home Section-->

    <script>
        /* This is for the sub-item*/

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

  /*For Multiple Pages in One*/
    function showContent(contentId) {
      const content1 = document.getElementById("content-1");
      const content2 = document.getElementById("content-2");
      const buttons = document.querySelectorAll(".paid-toggle, .refunded-toggle");

      buttons.forEach(button => button.classList.remove("active"));

      content1.style.display = contentId === 1 ? "block" : "none";
      content2.style.display = contentId === 2 ? "block" : "none";


      document.querySelector(`button[onclick="showContent(${contentId})"]`).classList.add("active");
      }

      window.onload = function() {
      showContent(1);
      }
    </script> 
</body>
</html>