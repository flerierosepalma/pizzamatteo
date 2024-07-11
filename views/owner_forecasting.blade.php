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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

    <!--Styles Forecasting-->
    <style>
        /* Google Fonts  */
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
    cursor: pointer;
    border: none;
    margin-left: 1.5rem;
    font-weight: bold;
    font-size: 25px;
    color: black;
    background-color: transparent;
    margin-top: 0;
}

.top .toggle-sidebar .page-title{
    flex-direction: row; 
}

.top .page-title{
    font-size: 25px;
    font-weight: bold;
    margin-left: 3%;
    margin-right: auto;
}
  
/* Content - Whiteboard Section*/
.content{
    z-index: 1;
    margin-left: 2%;
    margin-right: 2%;
    max-width: 100%;
    margin-bottom: 2%;
    margin-top: 1%;
    opacity: 100%;
    overflow-y: auto;
    height: 85%;
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
    background-color: ;
    width: 100%;
    background-color: #1a1d1f;
    margin-bottom: 1rem;
    z-index: 10;
}

/* Dropdown Content (Hidden by Default) */
.dropbtn{
background-color: #8A1C14;
padding: 10px;
border: 3px solid red;
border-radius: 10px;
font-weight: bold;
cursor: pointer;
width: 160px;
color: white;

}
.dropbtn:hover, .dropbtn:focus {
    background-color: red;
    border: 3px solid #8A1C14;
}

.dropdown-content {
position: absolute;
left: 0;
background-color: #f1f1f1;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.9);
z-index: 1;
cursor: pointer;
display: none; /* add this to hide the content initially */
margin-left: 20px;
}
    
 /* Links inside the dropdown */
 .dropdown-content a {
color: black;
padding: 12px 16px;
text-decoration: none;
display: block;
font-size: 1rem;
border-bottom: 1px solid #a6a6a6;
font-weight: bold;
}
    
/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}
    
/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display: block;}
            
/* Scrollbar */
::-webkit-scrollbar {
width: 12px;
height: 10px;
 }

::-webkit-scrollbar-track {
background: #1a1d1f; 
}

::-webkit-scrollbar-thumb {
    background: #8A1C14;
}

::-webkit-scrollbar-thumb:hover {
 
}

/*Part of the content of the toggles */
.scroll-buttons-container {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px; /* Adjust margin as needed */
}

.frequency-header{
top: 0;
font-size: 1.5rem;
font-weight: bold;
text-align: center;
margin: 0 10px; /* Adjust margin as needed */
}

.scroll-buttons-container button {
  margin: 0 10px; /* Adjust spacing between buttons as needed */
  font-size: 1.5rem;
  width: 3rem;
  background-color: #8A1C14;
  font-weight: bold;
  cursor: pointer;
}

.scroll-buttons-container button:hover{
    background-color: red;
    border: 2px solid #8A1C14;
}

/* Table Elements */
.table-container {
 margin: 0 auto; /* This centers the table-container */
max-width: 80%; /* Adjust as needed */
height: 350px; /* Adjust as needed */
overflow-x: auto;
overflow-y: auto; /* Disable vertical scrolling */
margin-bottom: 4rem;
}

table{
    border-collapse: collapse;
    margin: 0;
    width: 100%;
    box-shadow: 0 0 5px rgba(0, 0, 0, .25); 
    overflow-y: auto;
    white-space: nowrap;
    width: max-content;
}

table tr{
    padding: .5em;
}

thead tr{
    background-color: #a6a6a6;
    border-top: 5px solid #1a1d1f;
    border-bottom: 5px solid #1a1d1f; 
}

table th,
table td{
    font-size: .8em;
    padding: 1em;
    text-align: center;
}

tbody tr:nth-child(odd){
box-shadow: 0 0 5px rgba(0, 0, 0, .8);
}

thead{
position: sticky;
top: 0;
z-index: 1;
box-shadow: inset 0 -2px 20px rgba(0, 0, 0, 1);
}

/*ChartJS Styles*/
.content-wrapper {
            overflow-y: auto;
            max-height: calc(100vh - 150px);
            /* Adjust this value as needed */
        }

        .chart-container {
            position: relative;
            height: 450px;
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
        }

        #weekly-chart {
            max-width: none;
            height: 100% !important;
        }

        #monthly-chart {
            max-width: none;
            height: 100% !important;
        }

        #quarterly-chart {
            max-width: none;
            height: 100% !important;
        }

        #yearly-chart {
            max-width: none;
            height: 100% !important;
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

@media (max-width: 640px){

    .top .toggle-sidebar{
        margin-left: 1rem;
    }
    .top .page-title{
        font-size: 1.5rem;
        margin-left: .7rem;
    }

    .content{
        height: 85%;
        margin-bottom: 1%;
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
                    <a href="{{ url('owner_home') }}" class="link">
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
                    <a href="{{ url('order_history') }}" class="link">Order History</a>
                    <a href="{{ url('owner_invoice') }}" class="link">Invoices</a>
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
                    <a href="{{ url('owner_inventory') }}" class="link">Stock Alerts</a>
                    <a href="{{ url('owner_stock_request') }}" class="link">Restock Request</a>
                    <a href="{{ url('owner_data_visibility') }}" class="link">Data Visibility</a>
                    <a href="{{ url('owner_forecasting') }}" class="link">Forecasting</a>
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="{{ url('owner_generate_report') }}" class="link">
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
            <span class="page-title">Forecasting</span>
        </div>

        <!--Content inside the White Board-->
    <div class="content">
            <div class="content-header">
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">Select Frequency: </button>
                        <div id="myDropdown" class="dropdown-content">
                        <a onclick="showContent(1)" class="weekly-toggle active">Weekly</a>
                        <a onclick="showContent(2)" class="monthly-toggle active">Monthly</a>
                        <a onclick="showContent(3)" class="quarterly-toggle active">Quarterly</a>
                        <a onclick="showContent(4)" class="yearly-toggle active">Yearly</a>
                        </div>
                </div>
            </div>

            
            <div id="content-1" class="clickers">
                    <div class="scroll-buttons-container">
                        <button id="scrollLeftBtn1">&lt;</button>
                        <span class="frequency-header">Tabular: Weekly</span>
                        <button id="scrollRightBtn1">&gt;</button>
                    </div>

                <div class="table-container" id="scrollableTable1">
                <table>
                    <thead>
                        <tr>
                            <th>Date Range</th>
                            @php
                                // Sort menu IDs in ascending order
                                $sortedMenuIds = array_keys($menuNames);
                                sort($sortedMenuIds);
                            @endphp
                            @foreach($sortedMenuIds as $menuId)
                                <th>{{ $menuNames[$menuId] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($weeklyData as $week)
                                <tr>
                                    <td>{{ $week['date_range'] }}</td>
                                    @foreach($sortedMenuIds as $menuId)
                                        @php
                                            // Access quantity for the current menuId (or set to 0 if missing)
                                            $quantity = isset($week['menu_quantities'][$menuId]) ? $week['menu_quantities'][$menuId] : 0;
                                        @endphp
                                        <td>{{ $quantity }}</td>
                                    @endforeach
                                </tr>
                            @endforeach

                                <tr style="background-color: #a6a6a6;">
                                    <td style="font-weight: bold;">Forecasted Data:</td>
                                    @foreach($sortedMenuIds as $menuId)
                                        @php
                                        // Get the last 3 quantities for the current menuId
                                        $quantities = array_slice(array_reverse($weeklyData), 0, 3);
                                        $sum = 0;
                                        foreach ($quantities as $week) {
                                            $sum += isset($week['menu_quantities'][$menuId]) ? $week['menu_quantities'][$menuId] : 0;
                                        }

                                        $forecast = $sum / 3;
                                        $decimalPart = $forecast - floor($forecast);  // Get the decimal part

                                        // Choose rounding threshold (e.g., 0.5 for rounding up on values closer to the next integer)
                                        $roundingThreshold = 0.5;

                                        if ($decimalPart >= $roundingThreshold) {
                                            $roundedForecast = ceil($forecast);  // Round up if decimal part meets or exceeds threshold
                                        } else {
                                            $roundedForecast = floor($forecast);  // Round down otherwise
                                        }
                                        @endphp
                                        <td style="font-weight: bold;">{{ $roundedForecast }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                            </table>
                                    </div><hr>
                    
                    <!-- Chart.js line chart -->
                    <h1 style="text-align: center; margin-bottom: .5rem;">Chart: Weekly</h1>

                <div class="content-wrapper">
                <div class="chart-container">
                    <canvas id="weekly-chart"></canvas>
                </div>
                </div>
            </div>
                

    
            <div id="content-2" class="clickers" style="display: none;">
                <div class="scroll-buttons-container">
                    <button id="scrollLeftBtn2">&lt;</button>
                    <span class="frequency-header">Tabular: Monthly</span>
                    <button id="scrollRightBtn2">&gt;</button>
                </div>

                    <div class="table-container" id="scrollableTable2">
                    <table>
                    <thead>
                        <tr>
                            <th>Date Range</th>
                            @php
                                // Sort menu IDs in ascending order
                                $sortedMenuIds = array_keys($menuNames);
                                sort($sortedMenuIds);
                            @endphp
                            @foreach($sortedMenuIds as $menuId)
                                <th>{{ $menuNames[$menuId] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($monthlyData as $monthlyDatum)
                                <tr>
                                    <td>{{ $monthlyDatum['date_range'] }}</td>
                                    @foreach($monthlyDatum['menu_quantities'] as $menuId => $quantity)
                                        <td>{{ $quantity }}</td>
                                    @endforeach
                                </tr>
                            @endforeach

                                <tr style="background-color: #a6a6a6;">
                                    <td style="font-weight: bold;">Forecasted Data:</td>
                                    @foreach($sortedMenuIds as $menuId)
                                        @php
                                        // Get the last 3 months' quantities for the current menuId
                                        $quantities = array_slice(array_reverse($monthlyData), 0, 3);
                                        $sum = 0;
                                        foreach ($quantities as $month) {
                                            $sum += isset($month['menu_quantities'][$menuId])? $month['menu_quantities'][$menuId] : 0;
                                        }

                                        $forecast = $sum / 3;
                                        $decimalPart = $forecast - floor($forecast);  // Get the decimal part

                                        // Choose rounding threshold (e.g., 0.5 for rounding up on values closer to the next integer)
                                        $roundingThreshold = 0.5;

                                        if ($decimalPart >= $roundingThreshold) {
                                            $roundedForecast = ceil($forecast);  // Round up if decimal part meets or exceeds threshold
                                        } else {
                                            $roundedForecast = floor($forecast);  // Round down otherwise
                                        }
                                        @endphp
                                    <td style="font-weight: bold;">{{ $roundedForecast }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table></div><hr>

                    <!-- Chart.js monthly chart for content-2 -->
                    <h1 style="text-align: center; margin-bottom: .5rem; ">Chart: Monthly</h1>

                    <div class="content-wrapper">
                    <div class="chart-container">
                        <canvas id="monthly-chart"></canvas>
                    </div>
                    </div>
                </div>
                       

            <div id="content-3" class="clickers" style="display: none;">
                <div class="scroll-buttons-container">
                        <button id="scrollLeftBtn3">&lt;</button>
                        <span class="frequency-header">Tabular: Quarterly</span>
                        <button id="scrollRightBtn3">&gt;</button>
                </div>

                    <div class="table-container" id="scrollableTable3">
                    <table>
                    <thead>
                        <tr>
                            <th>Date Range</th>
                            @php
                                // Sort menu IDs in ascending order
                                $sortedMenuIds = array_keys($menuNames);
                                sort($sortedMenuIds);
                            @endphp
                            @foreach($sortedMenuIds as $menuId)
                                <th>{{ $menuNames[$menuId] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($quarterlyData as $quarter)
                        <tr>
                            <td>{{ $quarter['date_range'] }}</td>
                            @foreach($sortedMenuIds as $menuId)
                                @php
                                    // Access quantity for the current menuId (or set to 0 if missing)
                                    $quantity = isset($quarter['menu_quantities'][$menuId]) ? $quarter['menu_quantities'][$menuId] : 0;
                                @endphp
                                <td>{{ $quantity }}</td>
                            @endforeach
                        </tr>
                    @endforeach

                    <tr style="background-color: #a6a6a6;">
                        <td style="font-weight: bold;">Forecasted Data:</td>
                        @foreach($sortedMenuIds as $menuId)
                            @php
                                // Get the last 3 quantities for the current menuId
                                $quantities = array_slice(array_reverse($quarterlyData), 0, 3);
                                $sum = 0;
                                foreach ($quantities as $quarter) {
                                    $sum += isset($quarter['menu_quantities'][$menuId]) ? $quarter['menu_quantities'][$menuId] : 0;
                                }

                                $forecast = $sum / 3;
                                $decimalPart = $forecast - floor($forecast);  // Get the decimal part

                                // Choose rounding threshold (e.g., 0.5 for rounding up on values closer to the next integer)
                                $roundingThreshold = 0.5;

                                if ($decimalPart >= $roundingThreshold) {
                                    $roundedForecast = ceil($forecast);  // Round up if decimal part meets or exceeds threshold
                                } else {
                                    $roundedForecast = floor($forecast);  // Round down otherwise
                                }
                            @endphp
                            <td style="font-weight: bold;">{{ $roundedForecast }}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table></div><hr>

                <!-- Chart.js quarterly chart for content-3 -->
                <h1 style="text-align: center; margin-bottom: .5rem; ">Chart: Quarterly</h1>
                
                <div class="content-wrapper">
                <div class="chart-container">
                    <canvas id="quarterly-chart"></canvas>
                </div>
                </div>
        </div>

            <div id="content-4" class="clickers" style="display: none;">
                <div class="scroll-buttons-container">
                    <button id="scrollLeftBtn4">&lt;</button>
                    <span class="frequency-header">Tabular: Yearly</span>
                    <button id="scrollRightBtn4">&gt;</button>
                </div>

                    <div class="table-container" id="scrollableTable4">
                    <table>
                    <thead>
                        <tr>
                            <th>Date Range</th>
                            @php
                                // Sort menu IDs in ascending order
                                $sortedMenuIds = array_keys($menuNames);
                                sort($sortedMenuIds);
                            @endphp
                            @foreach($sortedMenuIds as $menuId)
                                <th>{{ $menuNames[$menuId] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($yearlyData as $year)
                        <tr>
                            <td>{{ $year['date_range'] }}</td>
                            @foreach($sortedMenuIds as $menuId)
                                @php
                                    // Access quantity for the current menuId (or set to 0 if missing)
                                    $quantity = isset($year['menu_quantities'][$menuId]) ? $year['menu_quantities'][$menuId] : 0;
                                @endphp
                                <td>{{ $quantity }}</td>
                            @endforeach
                        </tr>
                    @endforeach

                    <tr style="background-color: #a6a6a6;">
                        <td style="font-weight: bold;">Forecasted Data:</td>
                        @foreach($sortedMenuIds as $menuId)
                            @php
                                // Get the last 3 quantities for the current menuId
                                $quantities = array_slice(array_reverse($yearlyData), 0, 3);
                                $sum = 0;
                                foreach ($quantities as $year) {
                                    $sum += isset($year['menu_quantities'][$menuId]) ? $year['menu_quantities'][$menuId] : 0;
                                }

                                $forecast = $sum / 3;
                                $decimalPart = $forecast - floor($forecast);  // Get the decimal part

                                // Choose rounding threshold (e.g., 0.5 for rounding up on values closer to the next integer)
                                $roundingThreshold = 0.5;

                                if ($decimalPart >= $roundingThreshold) {
                                    $roundedForecast = ceil($forecast);  // Round up if decimal part meets or exceeds threshold
                                } else {
                                    $roundedForecast = floor($forecast);  // Round down otherwise
                                }
                            @endphp
                            <td style="font-weight: bold;">{{ $roundedForecast }}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table></div><hr>
                <!--ChartJS for Yearly-->
                <h1 style="text-align: center; margin-bottom: .5rem; ">Chart: Yearly</h1>

                <div class="content-wrapper">
                <div class="chart-container">
                    <canvas id="yearly-chart"></canvas>
                </div>
                </div>
    </div>

    </section> <!--End of Home Section-->
    <script>
        
        //Start of Sidebar Code |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
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
        //End of Sidebar Script |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||


        //This script is for multiple pages in one html (weekly, monthly, quarterly, yearly) ||||||||||||||||
        function showContent(contentId) {
        const content1 = document.getElementById("content-1");
        const content2 = document.getElementById("content-2");
        const content3 = document.getElementById("content-3");
        const content4 = document.getElementById("content-4");
        const buttons = document.querySelectorAll(".weekly-toggle, .monthly-toggle, .quarterly-toggle, .yearly-toggle");

        buttons.forEach(button => button.classList.remove("active"));

        content1.style.display = contentId === 1 ? "block" : "none";
        content2.style.display = contentId === 2 ? "block" : "none";
        content3.style.display = contentId === 3 ? "block" : "none";
        content4.style.display = contentId === 4 ? "block" : "none";

        document.querySelector(`button[onclick="showContent(${contentId})"]`).classList.add("active");
        }
   
    //Start: This is for the Dropdown Content |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
        }

        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
            }
        }
        }
    //End: For the Dropdown Content  |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    
    //Start of ChartJS Table |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    
    window.onload = function() {

// Javascript to make the table-container shows the latest data
const tableContainer = document.querySelector('.table-container');
tableContainer.scrollTop = tableContainer.scrollHeight;

// Weekly Chart.js |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

const ctxWeekly = document.getElementById('weekly-chart').getContext('2d');

const weeklyChartData = {
  labels: [
    @foreach($weeklyData as $week)
      '{{ $week['date_range'] }}',
    @endforeach
    'Forecasted Data' // add the forecasted data label
  ],
  datasets: [
    @php
      $sortedMenuIds = array_keys($menuNames);
      sort($sortedMenuIds);
    @endphp
    @foreach($sortedMenuIds as $menuId)
    {
      label: '{{ $menuNames[$menuId] }}',
      data: [
        @foreach($weeklyData as $week)
          {{ isset($week['menu_quantities'][$menuId]) ? $week['menu_quantities'][$menuId] : 0 }},
        @endforeach
        // add the forecasted data for this menu
        {{ $roundedForecast }}
      ],
      borderColor: getRandomColor(),
      fill: false
    },
    @endforeach
  ]
};

const weeklyChart = new Chart(ctxWeekly, {
type: 'line',
data: weeklyChartData,
options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        x: {
            ticks: {
                maxRotation: 0,
                minRotation: 0,
                autoSkip: false,
                maxTicksLimit: 5
            }
        },
        y: {
            beginAtZero: true
        }
    },
    plugins: {
        legend: {
            position: 'top',
            labels: {
                boxWidth: 12,
                font: {
                    size: 15
                }
            }
        },
        title: {
            display: true,
            font: {
                size: 16
            }
        }
    }
}
});

// Monthly Chart.js |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
const ctxMonthly = document.getElementById('monthly-chart').getContext('2d');

const monthlyChartData = {
  labels: [
    @foreach($monthlyData as $month)
      '{{ $month['date_range'] }}',
    @endforeach
    'Forecasted Data' // add the forecasted data label
  ],
  datasets: [
    @php
      $sortedMenuIds = array_keys($menuNames);
      sort($sortedMenuIds);
    @endphp
    @foreach($sortedMenuIds as $menuId)
    {
      label: '{{ $menuNames[$menuId] }}',
      data: [
        @foreach($monthlyData as $month)
          {{ isset($month['menu_quantities'][$menuId]) ? $month['menu_quantities'][$menuId] : 0 }},
        @endforeach
        // add the forecasted data for this menu
        {{ $roundedForecast }}
      ],
      borderColor: getRandomColor(),
      fill: false
    },
    @endforeach
  ]
};

const monthlyChart = new Chart(ctxMonthly, {
type: 'line',
data: monthlyChartData,
options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        title: {
            display: true,
            font: {
                size: 16
            }
        }
    },
    scales: {
        x: {
            ticks: {
                maxRotation: 0,
                minRotation: 0,
                autoSkip: false,
                maxTicksLimit: 5
            }
        },
        y: {
            beginAtZero: true
        }
    },
    plugins: {
        legend: {
            position: 'top',
            labels: {
                boxWidth: 12,
                font: {
                    size: 10
                }
            }
        }
    }
}
});



// Quarterly Chart.js |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
const ctxQuarterly = document.getElementById('quarterly-chart').getContext('2d');

const quarterlyChartData = {
  labels: [
    @foreach($quarterlyData as $quarter)
      '{{ $quarter['date_range'] }}',
    @endforeach
    'Forecasted Data' // add the forecasted data label
  ],
  datasets: [
    @php
      $sortedMenuIds = array_keys($menuNames);
      sort($sortedMenuIds);
    @endphp
    @foreach($sortedMenuIds as $menuId)
    {
      label: '{{ $menuNames[$menuId] }}',
      data: [
        @foreach($quarterlyData as $quarter)
          {{ isset($quarter['menu_quantities'][$menuId]) ? $quarter['menu_quantities'][$menuId] : 0 }},
        @endforeach
        // add the forecasted data for this menu
        {{ $roundedForecast }}
      ],
      borderColor: getRandomColor(),
      fill: false
    },
    @endforeach
  ]
};

const quarterlyChart = new Chart(ctxQuarterly, {
type: 'line',
data: quarterlyChartData,
options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        title: {
            display: true,
            font: {
                size: 16
            }
        }
    },
    scales: {
        x: {
            ticks: {
                maxRotation: 0,
                minRotation: 0,
                autoSkip: false,
                maxTicksLimit: 5
            }
        },
        y: {
            beginAtZero: true
        }
    },
    plugins: {
        legend: {
            position: 'top',
            labels: {
                boxWidth: 12,
                font: {
                    size: 10
                }
            }
        }
    }
}
});


// Yearly Chart.js |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
const ctxYearly = document.getElementById('yearly-chart').getContext('2d');

const yearlyChartData = {
  labels: [
    @foreach($yearlyData as $year)
      '{{ $year['date_range'] }}',
    @endforeach
    'Forecasted Data' // add the forecasted data label
  ],
  datasets: [
    @php
      $sortedMenuIds = array_keys($menuNames);
      sort($sortedMenuIds);
    @endphp
    @foreach($sortedMenuIds as $menuId)
    {
      label: '{{ $menuNames[$menuId] }}',
      data: [
        @foreach($yearlyData as $year)
          {{ isset($year['menu_quantities'][$menuId]) ? $year['menu_quantities'][$menuId] : 0 }},
        @endforeach
        // add the forecasted data for this menu
        {{ $roundedForecast }}
      ],
      borderColor: getRandomColor(),
      fill: false
    },
    @endforeach
  ]
};

const yearlyChart = new Chart(ctxYearly, {
type: 'line',
data: yearlyChartData,
options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        title: {
            display: true,
            font: {
                size: 16
            }
        }
    },
    scales: {
        x: {
            ticks: {
                maxRotation: 0,
                minRotation: 0,
                autoSkip: false,
                maxTicksLimit: 5
            }
        },
        y: {
            beginAtZero: true
        }
    },
    plugins: {
        legend: {
            position: 'top',
            labels: {
                boxWidth: 12,
                font: {
                    size: 10
                }
            }
        }
    }
}
});


// Function to generate a random color for each dataset
function getRandomColor() {
  const letters = '0123456789ABCDEF';
  let color = '#';
  for (let i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

function resizeChartContainer() {
        const chartContainer = document.querySelector('.chart-container');
        const viewportWidth = window.innerWidth;

        if (viewportWidth <= 768) {
            chartContainer.style.width = `${viewportWidth * 2}px`; // Double the width for mobile
            chartContainer.style.height = '300px';
        } else {
            chartContainer.style.width = '100%';
            chartContainer.style.height = '450px'; // Reset to original height for larger screens
        }

        if (myChart) {
            myChart.resize(); // Trigger chart resize
        }
    }

    window.addEventListener('resize', resizeChartContainer);
    resizeChartContainer(); // Call on initial load

}; //End of ChartJS Code


  //This is to scroll the table horizontally.
  document.addEventListener('DOMContentLoaded', function() {
  // Table 1
  var scrollableTable1 = document.getElementById('scrollableTable1');
  var scrollLeftBtn1 = document.getElementById('scrollLeftBtn1');
  var scrollRightBtn1 = document.getElementById('scrollRightBtn1');

  scrollLeftBtn1.addEventListener('click', function() {
    scrollableTable1.scrollBy({
      left: -200, // Adjust scroll amount as needed
      behavior: 'smooth' // Optional, smooth scrolling
    });
  });

  scrollRightBtn1.addEventListener('click', function() {
    scrollableTable1.scrollBy({
      left: 200, // Adjust scroll amount as needed
      behavior: 'smooth' // Optional, smooth scrolling
    });
  });

  // Table 2
  var scrollableTable2 = document.getElementById('scrollableTable2');
  var scrollLeftBtn2 = document.getElementById('scrollLeftBtn2');
  var scrollRightBtn2 = document.getElementById('scrollRightBtn2');

  scrollLeftBtn2.addEventListener('click', function() {
    scrollableTable2.scrollBy({
      left: -200, // Adjust scroll amount as needed
      behavior: 'smooth' // Optional, smooth scrolling
    });
  });

  scrollRightBtn2.addEventListener('click', function() {
    scrollableTable2.scrollBy({
      left: 200, // Adjust scroll amount as needed
      behavior: 'smooth' // Optional, smooth scrolling
    });
  });

  // Table 3
  var scrollableTable3 = document.getElementById('scrollableTable3');
  var scrollLeftBtn3 = document.getElementById('scrollLeftBtn3');
  var scrollRightBtn3 = document.getElementById('scrollRightBtn3');

  scrollLeftBtn3.addEventListener('click', function() {
    scrollableTable3.scrollBy({
      left: -200, // Adjust scroll amount as needed
      behavior: 'smooth' // Optional, smooth scrolling
    });
  });

  scrollRightBtn3.addEventListener('click', function() {
    scrollableTable3.scrollBy({
      left: 200, // Adjust scroll amount as needed
      behavior: 'smooth' // Optional, smooth scrolling
    });
  });

  // Table 4
  var scrollableTable4 = document.getElementById('scrollableTable4');
  var scrollLeftBtn4 = document.getElementById('scrollLeftBtn4');
  var scrollRightBtn4 = document.getElementById('scrollRightBtn4');

  scrollLeftBtn4.addEventListener('click', function() {
    scrollableTable4.scrollBy({
      left: -200, // Adjust scroll amount as needed
      behavior: 'smooth' // Optional, smooth scrolling
    });
  });

  scrollRightBtn4.addEventListener('click', function() {
    scrollableTable4.scrollBy({
      left: 200, // Adjust scroll amount as needed
      behavior: 'smooth' // Optional, smooth scrolling
    });
  });
});


    </script>
</body>
</html>