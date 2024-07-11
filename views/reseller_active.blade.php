<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseller's Dashboard</title>
    <link rel="icon" type="image/x-icon" href="https://scontent.fmnl4-7.fna.fbcdn.net/v/t1.15752-9/448200191_474132475099478_6596455881542556957_n.png?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_ohc=b4tF4OnvpwMQ7kNvgFrieEp&_nc_ht=scontent.fmnl4-7.fna&oh=03_Q7cD1QFjIEijnlQPvClN4SA7vvEb1V_1qxCAS2tnpsKMeMWxhg&oe=669489EE">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
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
    opacity: 30%;
    filter: blur(2px);
    height: 50%;
    pointer-events: none;
}

.home .bx-menu{
    z-index: 1;
}

.above-whiteboard {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 30px;
    background-color: var(--color_Light1);
    border-bottom: 1px solid #ccc;
}

/* =============== Home Section =============== */

/* Adjusted styles for text size */
.above-whiteboard h2 {
    font-size: 35px; /* Increased font size for "Active Orders" */
    font-weight: 600;
    color: var(--color_Dark1);
    margin-bottom: 0px;
}

.above-whiteboard .left-section {
    flex: 1;
}

.above-whiteboard .right-section {
    flex: 1;
    text-align: right;
}

/* Adjusted styles for real date and time */
.above-whiteboard .real-date-time {
    font-size: 14px; /* Decreased font size for real date and time */
    color: var(--color_Dark1);
}

/* Adjusted styles for instore input button */
.instore-input-btn {
    padding: 10px 30px;
    background-color: #fff; /* White background */
    color: #000; /* Black text */
    border: 2px solid #000; /* Black border */
    border-radius: 2px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
}

.instore-input-btn:hover {
    background-color: #901B16; /* Red hover background */
    color: #fff; /* White hover text */
    border-color: #901B16; /* Red hover border */
}

/* Content Above Whiteboard, Below Menu Bar*/

.top {
    width: 100%;
    height: 20%;
    z-index: 1;
}

.top .toggle-sidebar {
    cursor: pointer;
    border: none;
    margin-left: 1.5rem;
    font-weight: bold;
    font-size: 25px;
    color: black;
    background-color: transparent;
}

  
/* Content - Whiteboard Section*/
.content {
    z-index: 1;

    margin-left: 2%;
    margin-right: 2%;
    max-width: 100%;
    margin-bottom: 2%;
    height: 250%;
    top: 0;
    background-color: white;
    border: 3px solid black;
    border-radius: 10px;
}

/* Tabs */
.tabs {
    display: flex;
    justify-content: space-between;
    padding: 10px 20px 5px; /* Reduced bottom padding */
    margin-bottom: 10px;
    border-bottom: 2px solid #212121; /* Adding a bottom border */
}

.tab {
    cursor: pointer;
    padding: 12px 20px; /* Increased padding */
    background-color: #f0f2f5;
    color: #252527;
    font-weight: 600;
    margin-right: 25px;
    border-radius: 5px 5px 0 0;
    position: relative;
}

.tab.active {
    background-color: #901b16;
    color: white;
}

.tab-count {
    background-color: #8a1c14;
    color: white;
    font-size: 14px;
    padding: 2px 6px;
    border-radius: 10px;
    position: absolute;
    top: -8px;
    right: -8px;
}

/* Search Bar */
.search-container {
    display: flex;
    align-items: center;
    margin-bottom: 10px; /* Adjusted margin */
}

#search-input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 0px 5px 5px 0;
    font-size: 16px;
}

.search-btn {
    background-color: #901b16;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px 0px 0px 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.search-btn:hover {
    background-color: #6d1410;
}

.tab.active {
    background-color: #ddd;
}

#realtime-clock {
    margin-top: 10px;
    font-size: 16px;
    color: #333;
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
    font-size: .8em;
    margin-left: 10px;
    margin-right: 20px;
    }

tbody td {
    white-space: wrap;
    border-bottom: 1px solid #a6a6a6;
}

/*Style for See Order button*/
.see-order-btn {
    background-color: #007bff; 
    color: white; 
    padding: 8px 16px; 
    border: none; 
    cursor: pointer;
    border-radius: 4px; 
    transition: background-color 0.3s; 
}

.see-order-btn:hover {
    background-color: #0056b3; 
}

/* Style for See Payment button */
.see-receipt-btn {
    background-color: #ffc107;
    color: white;
    padding: 8px 16px; 
    border: none; 
    cursor: pointer; 
    border-radius: 4px; 
    transition: background-color 0.3s; 
}

.see-receipt-btn:hover {
    background-color: #ffb400; 
}


/* Styles for Complete button */
.complete-btn {
    background-color: green;
    color: white;
    border: none;
    padding: 8px 16px;
    cursor: pointer;
    border-radius: 4px;
}

/* Styles for Cancel button */
.cancel-btn {
    background-color: red;
    color: white;
    border: none;
    padding: 8px 16px;
    cursor: pointer;
    border-radius: 4px;
}

/* CSS for See Order Modal */
.see-order-modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 50%;
    top: 50%;
    transform: translate(80%, 10%);
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    max-width: 40%; /* Adjust max-width as needed */
    width: 600px;
    max-height: 100%;
    height: 500px;
}

.modal-order-content {
    max-width: 100%;
    overflow: auto;
}

.modal-order-content h2 {
    text-align: center;
    margin-bottom: 10px;
}

.modal-order-content p {
    margin-bottom: 5px;
}

.modal-order-content table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 10px;
}

.modal-order-content th,
.modal-order-content td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.modal-order-content .close-btn {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    cursor: pointer;
}

.modal-order-content .close-btn:hover {
    color: red;
}

.modal-payment-container button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
    transition: background-color 0.3s;
}

.modal-payment-container button:hover {
    background-color: #45a049;
}

.modal-payment-container p {
    margin-bottom: 10px;
}

.modal-payment-container img {
    display: block;
    margin: 0 auto;
    max-width: 100%;
    max-height: 200px;
    margin-top: 10px;
}

.flavor-dropdown {
    flex: 1;
    padding: 5px;
    width: 20px;
    width: 60%;
    margin: 10px;
    
}

.price, .subtotal {
    flex: 1;
    text-align: center;
    margin-left: -20px;
}

.quantity {
    display: flex;
    align-items: center;
    flex: 1;
    justify-content: center;
}

.minus-btn {
    padding: 3px;
    width: 20px;
    margin-left: 3px;
    margin-right: 3px;
    cursor: pointer;
    color: #fff;
    border-radius: 15px;
    background-color: #9f0505;
}

.add-btn {
    padding: 3px;
    width: 20px;
    margin-left: 3px;
    margin-right: 3px;
    cursor: pointer;
    color: #fff;
    border-radius: 10px;
    background-color: #25964d;
}

input[type="number"] {
    width: 40px;
    padding: 4px;
    text-align: center;
}

.doneness {
    flex: 1;
    text-align: center;
}

.doneness label {
    align-content: center;
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;

    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
    border: 2px solid #000;
}

.modal .modal-content {
    background-color: #fff;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 60%;
    text-align: center;
    border-radius: 8px;
    position: relative;
}

.modal .close-btn {
    position: absolute;
    right: 10px;
    top: 10px;
    font-size: 1.5rem;
    cursor: pointer;
    background-color: #c0251c;
    padding: 2px 8px 2px 8px;
    border-radius: 15px;
}

.modal .modal-container {
    margin-top: 20px;
    flex-direction: column;
    align-items: center;
}

.input-container {
    display: flex;
    flex-direction: column;
    border: 1px solid #000;
}

.input-container .input-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.input-container .input-row div,
.input-container .input-row select {
    flex: 1;
    text-align: center;
}


.close-btn {
    color: #ffffff;
    float: right;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
}

.close-btn:hover,
.close-btn:focus {
    color: black;
    text-decoration: none;
}

/* Blur effect on the whiteboard section */
.whiteboard-container.blurred {
    filter: blur(5px);
    pointer-events: none;
}

/* Overlay to dim the background when modal is open */
.overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1;
}


/* Add Flavor and Add Order Button Containers */
.add-flavor-btn-container,
.add-order-btn-container {
    display: flex;
    justify-content: space-between;
    margin-top: 10px; /* Adjust margin as needed */
    padding: 0 30px; /* Added padding for spacing */
}

/* Add Flavor Button */
.add-flavor-btn {
    padding: 10px 10px; /* Adjusted padding for button size */
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 25px;
    font-size: 16px;
    margin-bottom: 10px;
    align-items: flex-end;
}

/* Add Order Button */
.add-order-btn {
    padding: 10px 20px; /* Adjusted padding for button size */
    background-color: #901B16; /* Custom color */
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 25px;
    font-size: 16px;
    align-items: flex-end;
}

/* Style for order summary */
.order-summary {
    border-left: 1px solid #000;
    border-bottom: 1px solid #000;
    border-right: 1px solid #000;
    grid-area: order-summary; /* Assign grid area for order summary */
}

.order-summary h3 {
    margin-bottom: 10px;
}

#order-summary-content {
    padding: 10px;
    border-radius: 4px;
}

/* Style for overall total */
.overall-total {
    border-right: 1px solid #000;
    border-bottom: 1px solid #000;
    grid-area: overall-total; /* Assign grid area for overall total */
}

.overall-total h3 {
    margin-bottom: 10px;
}

#overall-total-content {
    padding: 10px;
    border-radius: 4px;
}

/* Style for payment method */
.payment-method {
    border-left: 1px solid #000;
    border-right: 1px solid #000;
    border-bottom: 1px solid #000;
    grid-area: payment-method; /* Assign grid area for payment method */
}

.payment-method h3 {
    margin-bottom: 10px;
}

.payment-options {
    margin-bottom: 10px;
}

.payment-option-btn {
    background-color: #008CBA;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-right: 10px;
    cursor: pointer;
    border-radius: 4px;
}

.payment-option-btn.active {
    background-color: #4CAF50;
}

.gcash-upload {
    margin-bottom: 10px;
    display: center;
    padding: 10px;
    align-content: center;
}

.gcash-upload h4 {
    margin-left: 100px;
    align-items: center;
    
}

.gcash-details {
    display: none;
    margin: 20px;

}

.gcash-details label {
    display: block;
    margin-bottom: 5px;
    align-items: center;
}

.gcash-details input[type="text"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    text-align: center;
}

/* Grid Container for Layout */
.dashboard-content {
    display: grid;
    grid-template-columns: 1fr 1fr; /* Two columns layout */
    grid-template-areas:
        "order-summary overall-total"
        "payment-method payment-method"; /* Define grid areas */
    gap: 0px; /* Adjust gap between grid items */
}



/* ============ Responsive / Breakpoints ========== */
@media (max-width: 1080px) {
    
}

/* For Medium Devices */
@media (max-width: 774px) {
    /* Adjustments for the sidebar toggle button */
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

    /* Adjust home section when sidebar is open */
    .home {
        left: 78px;
        width: calc(100% - 78px);
    }

    /* Apply blur filter to home content when sidebar is open */
    .sidebar ~ .home {
        filter: blur(5px);
    }

    /* Remove blur when sidebar is closed */
    .sidebar.close ~ .home {
        filter: none;
    }

    /* Adjust padding for submenu links */
    .submenu .link {
        padding: 12px 0px;
    }
}

@media (max-width: 560px) {

}

/* For Small Devices */
@media (max-width: 360px) {

}


    </style>
</head>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseller's Dashboard</title>
    <link rel="icon" type="image/x-icon"
        href="https://scontent.fmnl4-7.fna.fbcdn.net/v/t1.15752-9/448200191_474132475099478_6596455881542556957_n.png?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_ohc=b4tF4OnvpwMQ7kNvgFrieEp&_nc_ht=scontent.fmnl4-7.fna&oh=03_Q7cD1QFjIEijnlQPvClN4SA7vvEb1V_1qxCAS2tnpsKMeMWxhg&oe=669489EE">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="stylesheet" href="reseller-active.css">
</head>

<body>
    <div class="sidebar close">
        <button class="toggle-close">X</button>
        <a href="#" class="logo-box">
            <i class='bx bxs-pizza'></i>
            <div class="logo-name">Pizza &hearts; Matteo</div>
            <h5 class="branch">Manila</h5>
        </a>

        <ul class="sidebar-list">
            <li>
                <div class="title">
                    <a href="reseller-home.php" class="link">
                        <i class='bx bx-grid-alt'></i>
                        <span class="name">Home</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="reseller-home.php" class="link submenu-title">Home</a>
                </div>
            </li>

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
                    <a href="reseller-active.php" class="link">Active Orders</a>
                    <a href="reseller-history.php" class="link">Order History</a>
                    <a href="reseller-invoices.php" class="link">Invoices</a>
                </div>
            </li>

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
                    <a href="reseller-alerts.php" class="link">Stock Alerts</a>
                    <a href="reseller-restock.php" class="link">Restock Request</a>
                    <a href="reseller-data.php" class="link">Data Visibility</a>
                    <a href="reseller-forecasting.php" class="link">Forecasting</a>
                </div>
            </li>

            <li>
                <div class="title">
                    <a href="reseller-report-php" class="link">
                        <i class='bx bx-line-chart'></i>
                        <span class="name">Generate Report</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Generate Report</a>
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

    <section class="home">
        <div class="top">
            <button class="toggle-sidebar">☰</button>
        </div>

        <section class="above-whiteboard">
            <div class="left-section">
                <h2>Active Orders</h2>
                <div id="realtime-clock"></div>
            </div>
            <div class="right-section">
                <button class="instore-input-btn">IN STORE INPUT</button>
            </div>
        </section>

        <div class="content">
            <div class="tabs">
                <div class="tab" id="pending-tab">
                    <span>Pending</span>
                    <div class="tab-count" id="pending-count">0</div>
                </div>
                <div class="tab" id="preparing-tab">
                    <span>Preparing</span>
                    <div class="tab-count" id="preparing-count">0</div>
                </div>
                <div class="tab" id="pickup-tab">
                    <span>For PickUp</span>
                    <div class="tab-count" id="pickup-count">0</div>
                </div>
                <div class="search-container">
                    <button class="search-btn"><i class='bx bx-search'></i></button>
                    <input type="text" id="search-input" placeholder="Search">
                </div>
            </div>

            <div class="order-list">
                <div id="order-list-container" class="order-list">
                    <table id="order-table">
                        <thead>
                            <tr>

                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Order Placed</th>
                                <th>Order Summary</th>
                                <th>Total Cost</th>
                                <th>Purchase Type</th>
                                <th>Expected Order Completion</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="orders-data">
                                <td>#0000</td>
                                <td>Adrian</td>
                                <td>7-7-2023</td>
                                <td><button class="see-order-btn">See Order</button></td>
                                <td>80.00</td>
                                <td>Online</td>
                                <td>00-00-0000</td>
                                <td><button class="see-receipt-btn">See Payment</button></td>
                                <td><button class= 'complete-btn'>Complete button</button></td>
                                <td><button class= 'cancel-btn'>Cancel button</button></td>
                                
                        </tbody>
                        <tbody id="orders-data">
                                <td>#0000</td>
                                <td>Kate</td>
                                <td>7-7-2023</td>
                                <td><button class="see-order-btn">See Order</button></td>
                                <td>80.00</td>
                                <td>Online</td>
                                <td>00-00-0000</td>
                                <td><button class="see-receipt-btn">See Payment</button></td>
                                <td><button class= 'complete-btn'>Complete button</button></td>
                                <td><button class= 'cancel-btn'>Cancel button</button></td>
                                
                        </tbody>
                    </table>
                    <hr>
                </div>
            </div>
        </div>
    </section>

        <!-- See Order Modal -->
        <div id="see-order-modal" class="modal see-order-modal">
        <div class="modal-order-content">
            <span class="close-btn">&times;</span>
            <h2>Order Summary</h2>
            <p>Order ID: <span id="order-id"></span></p>
            <table id="order-details-table">
                <thead>
                    <tr>
                        <th>Flavor</th>
                        <th>Quantity</th>
                        <th>Doneness</th>
                    </tr>
                </thead>
                <tbody>
                    <td>ham and cheese</td>
                    <td>85.00</td>
                    <td>Normal</td>
                </tbody>
            </table>
            <p>Total Quantity: <span id="total-quantity"></span></p>
            <p>Total Cost: <span id="total-cost"></span></p>
        </div>
    </div>

    <!-- See Payment Modal -->
    <div id="see-payment-modal" class="modal see-payment-modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>Proof of Payment</h2>
            <div class="modal-payment-container">
                <img id="proof-of-payment-preview" src="#"  style="max-width: 100%; max-height: 200px; margin-top: 10px;">
                <br><p>Payment method: <span id="payment-method"></span></p><br>
                <p>G-cash Number: <span id="gcash-number"></span></p><br>
                <p>Name of Sender: <span id="sender-name"></span></p><br>
                <button> Payment Received</button>
            </div>
        </div>
    </div>

    <div id="instore-modal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>IN-STORE - INPUT</h2>
        <div class="modal-container">
            <div class="input-container">
                <div class="input-row">
                    <div>FLAVOR</div>
                    <div>PRICE</div>
                    <div>QUANTITY</div>
                    <div>SUBTOTAL</div>
                    <div>DONENESS</div>
                </div>
                <!-- Dynamic flavor selection -->
                <div class="flavor-selection">
                    <!-- Initial flavor row -->
                    <div class="input-row">
                            <select class="flavor-dropdown">
                                    <option value="" disabled selected>Choose flavor</option>
                                    <option value="Ham and Cheese" data-price="85">Ham and Cheese - ₱85.00</option>
                                    <option value="Hawaiian Delight" data-price="90">Hawaiian Delight - ₱90.00</option>
                                    <option value="Vegetarian Delight" data-price="90">Vegetarian Delight - ₱90.00</option>
                                    <option value="Pepperoni and Ham" data-price="90">Pepperoni and Ham - ₱90.00</option>
                                    <option value="Bacon and Mushroom" data-price="95">Bacon and Mushroom - ₱95.00</option>
                                    <option value="Beef and Mushroom" data-price="95">Beef and Mushroom - ₱95.00</option>
                                    <option value="Tuna and Mushroom" data-price="95">Tuna and Mushroom - ₱95.00</option>
                                    <option value="Meat Overload" data-price="100">Meat Overload - ₱100.00</option>
                                    <option value="Arabic Shawarma" data-price="100">Arabic Shawarma - ₱100.00</option>
                                    <option value="Sisig Special" data-price="100">Sisig Special - ₱100.00</option>
                                    <option value="Creamy Spinach" data-price="220">Creamy Spinach - ₱220.00</option>
                            </select>
                        <div class="price">0</div>
                        <div class="quantity">
                            <button class="minus-btn">-</button>
                            <input type="number" value="0" min="0" readonly>
                            <button class="add-btn">+</button>
                        </div>
                        <div class="subtotal">0</div>
                        <div class="doneness">
                            <label><input type="radio" name="doneness-1" value="normal" checked> Normal</label>
                            <label><input type="radio" name="doneness-1" value="toasted"> Toasted</label>
                        </div>
                    </div>
                </div>
                <div class="add-flavor-btn-container">
                    <button class="add-flavor-btn">Add More Flavor</button>
                </div>  
            </div>
            <!-- Order summary section -->
            <div class="dashboard-content">
                <div class="order-summary">
                    <h3>Order Summary:</h3>
                    <div id="order-summary-content">
                        <!-- Content for order summary goes here -->
                    </div>
                </div>
                <div class="overall-total">
                    <h3>Overall Total:</h3>
                    <div id="overall-total-content">
                        <!-- Content for overall total goes here -->
                    </div>
                </div>
                <div class="payment-method">
                    <h3>Payment Method:</h3>
                    <div class="payment-options">
                        <!-- Payment options buttons -->
                        <button class="payment-option-btn active">Cash</button>
                        <button class="payment-option-btn">G-cash</button>
                    </div>
                    <div class="gcash-upload">
                        <div class="gcash-details">
                            <label>G-cash Number:</label>
                            <input type="text" placeholder="Enter G-cash number">
                            <label>Name of Sender:</label>
                            <input type="text" placeholder="Enter sender's name">
                        </div>
                        <h4>Upload Proof of Payment : 
                        <input type="file" id="proof-of-payment" accept="image/*">
                        </h4>
                    </div>
                </div>
            </div>
            <div class="add-order-btn-container">
                <button class="add-order-btn">Add Order</button>
            </div>
            </div>
    </div>
</div>


    <script src="reseller.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    // Function to update time
    function updateTime() {
        const clock = document.getElementById('realtime-clock');
        const now = new Date();
        const formattedTime = now.toLocaleTimeString();
        const formattedDate = now.toLocaleDateString();
        clock.innerHTML = `Date: ${formattedDate}, Time: ${formattedTime}`;
    }

    // Update time every second
    setInterval(updateTime, 1000);
    updateTime(); // Initial call

    // Event listeners for tabs
    document.getElementById('pending-tab').addEventListener('click', function () {
        markTabActive('pending-tab');
    });

    document.getElementById('preparing-tab').addEventListener('click', function () {
        markTabActive('preparing-tab');
    });

    document.getElementById('pickup-tab').addEventListener('click', function () {
        markTabActive('pickup-tab');
    });

    // Search functionality
    document.querySelector('.search-btn').addEventListener('click', function () {
        const searchQuery = document.getElementById('search-input').value;
        const activeTab = document.querySelector('.tab.active').id;

        switch (activeTab) {
            case 'pending-tab':
                // Implement logic for pending tab search
                break;
            case 'preparing-tab':
                // Implement logic for preparing tab search
                break;
            case 'pickup-tab':
                // Implement logic for pickup tab search
                break;
        }
    });

    // Function to mark active tab
    function markTabActive(tabId) {
        document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
        document.getElementById(tabId).classList.add('active');
    }

    // Initial display on page load
    markTabActive('pending-tab');

    // Function to open See Order modal
    function openSeeOrderModal() {
        var modal = document.getElementById('see-order-modal');
        modal.style.display = 'block';
    }

    // Function to open See Payment modal
    function openSeePaymentModal() {
        var modal = document.getElementById('see-payment-modal');
        modal.style.display = 'block';
    }

    // Close modals when the close button is clicked
    var closeButtons = document.querySelectorAll('.close-btn');

    closeButtons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var modal = this.closest('.modal');
            modal.style.display = 'none';
        });
    });

    // Event listeners for See Order and See Payment buttons
    var seeOrderButtons = document.querySelectorAll('.see-order-btn');
    var seePaymentButtons = document.querySelectorAll('.see-receipt-btn');

    seeOrderButtons.forEach(function(btn) {
        btn.addEventListener('click', openSeeOrderModal);
    });

    seePaymentButtons.forEach(function(btn) {
        btn.addEventListener('click', openSeePaymentModal);
    });

    // Close modals when clicking outside the modal
    window.addEventListener('click', function(event) {
        var seeOrderModal = document.getElementById('see-order-modal');
        var seePaymentModal = document.getElementById('see-payment-modal');

        if (event.target == seeOrderModal) {
            seeOrderModal.style.display = 'none';
        }

        if (event.target == seePaymentModal) {
            seePaymentModal.style.display = 'none';
        }
    });

    // Modal close on overlay click
    var modalOverlay = document.querySelector('.overlay');

    window.addEventListener('click', function(event) {
        if (event.target == modalOverlay) {
            seeOrderModal.style.display = 'none';
            seePaymentModal.style.display = 'none';
        }
    });



    // Modal functionality
    const modal = document.getElementById('instore-modal');
    const btn = document.querySelector('.instore-input-btn');
    const span = document.querySelector('.close-btn');
    const whiteboardContainer = document.querySelector('.whiteboard-container');
    const overlay = document.createElement('div');
    overlay.className = 'overlay';
    document.body.appendChild(overlay);

    btn.addEventListener('click', function () {
        modal.style.display = 'block';
        whiteboardContainer.classList.add('blurred');
        overlay.style.display = 'block';
    });

    span.addEventListener('click', function () {
        modal.style.display = 'none';
        whiteboardContainer.classList.remove('blurred');
        overlay.style.display = 'none';
    });

    window.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.style.display = 'none';
            whiteboardContainer.classList.remove('blurred');
            overlay.style.display = 'none';
        }
    });

    // Quantity and subtotal functionality
    const minusBtn = document.querySelector('.minus-btn');
    const addBtn = document.querySelector('.add-btn');
    const quantityInput = document.querySelector('.quantity input');
    const priceElement = document.querySelector('.price');
    const subtotalElement = document.querySelector('.subtotal');

    const pricePerPizza = 85.00; // Example price per pizza
    priceElement.textContent = `${pricePerPizza}`;

    minusBtn.addEventListener('click', function () {
        let quantity = parseInt(quantityInput.value, 10);
        if (quantity > 0) {
            quantity--;
            quantityInput.value = quantity;
            updateSubtotal();
        }
    });

    addBtn.addEventListener('click', function () {
        let quantity = parseInt(quantityInput.value, 10);
        quantity++;
        quantityInput.value = quantity;
        updateSubtotal();
    });

    function updateSubtotal() {
        const quantity = parseInt(quantityInput.value, 10);
        const subtotal = quantity * pricePerPizza;
        subtotalElement.textContent = `${subtotal}.00`;
    }

    // Function to update order summary and overall total
    function updateOrderSummary() {
        // Calculate subtotal for all flavors
        let overallTotal = 0;
        let orderSummary = '';

        const flavorRows = document.querySelectorAll('.flavor-selection .input-row');
        flavorRows.forEach(row => {
            const flavorDropdown = row.querySelector('.flavor-dropdown');
            const priceElement = row.querySelector('.price');
            const quantityInput = row.querySelector('.quantity input');
            const subtotalElement = row.querySelector('.subtotal');

            const selectedOption = flavorDropdown.selectedOptions[0];
            const selectedFlavor = selectedOption.textContent.split(',')[0];
            const price = parseFloat(selectedOption.getAttribute('data-price')) || 0;
            const quantity = parseInt(quantityInput.value, 10);
            const subtotal = price * quantity;

            // Update subtotal display
            subtotalElement.textContent = `${subtotal}.00`;

            // Build order summary string
            if (quantity > 0) {
                orderSummary += `${selectedFlavor}: ${quantity} x ${price.toFixed(2)} = ${subtotal.toFixed(2)}<br>`;
            }

            // Accumulate overall total
            overallTotal += subtotal;
        });

        // Update order summary section
        const orderSummaryContent = document.getElementById('order-summary-content');
        orderSummaryContent.innerHTML = orderSummary;

        // Update overall total section
        const overallTotalContent = document.getElementById('overall-total-content');
        overallTotalContent.textContent = `₱${overallTotal.toFixed(2)}`;
    }

    // Flavor dropdown functionality
    const flavorSelectionContainer = document.querySelector('.flavor-selection');
    const addFlavorBtn = document.querySelector('.add-flavor-btn');
    let flavorCount = 1; // Assuming initial flavor count

    addFlavorBtn.addEventListener('click', function () {
        if (flavorCount < 10) { // Limiting to 10 flavors for demonstration
            flavorCount++;

            const newInputRow = document.createElement('div');
            newInputRow.classList.add('input-row');

            // Flavor dropdown
            const newFlavorDropdown = document.createElement('select');
            newFlavorDropdown.classList.add('flavor-dropdown');
            newFlavorDropdown.innerHTML = `
                <option value="" disabled selected>Choose flavor</option>
                <option value="Ham and Cheese" data-price="85">Ham and Cheese - ₱85.00</option>
                <option value="Hawaiian Delight" data-price="90">Hawaiian Delight - ₱90.00</option>
                <option value="Vegetarian Delight" data-price="90">Vegetarian Delight - ₱90.00</option>
                <option value="Pepperoni and Ham" data-price="90">Pepperoni and Ham - ₱90.00</option>
                <option value="Bacon and Mushroom" data-price="95">Bacon and Mushroom - ₱95.00</option>
                <option value="Beef and Mushroom" data-price="95">Beef and Mushroom - ₱95.00</option>
                <option value="Tuna and Mushroom" data-price="95">Tuna and Mushroom - ₱95.00</option>
                <option value="Meat Overload" data-price="100">Meat Overload - ₱100.00</option>
                <option value="Arabic Shawarma" data-price="100">Arabic Shawarma - ₱100.00</option>
                <option value="Sisig Special" data-price="100">Sisig Special - ₱100.00</option>
                <option value="Creamy Spinach" data-price="220">Creamy Spinach - ₱220.00</option>
            `;
            newFlavorDropdown.addEventListener('change', function () {
                const selectedOption = newFlavorDropdown.selectedOptions[0];
                const price = parseFloat(selectedOption.getAttribute('data-price')) || 0;
                const priceElement = newInputRow.querySelector('.price');
                const quantityInput = newInputRow.querySelector('.quantity input');
                const subtotalElement = newInputRow.querySelector('.subtotal');

                priceElement.textContent = `${price.toFixed(2)}`;
                quantityInput.value = 0;
                subtotalElement.textContent = '0.00';

                // Update order summary and overall total on flavor change
                updateOrderSummary();
            });
            newInputRow.appendChild(newFlavorDropdown);

            // Price
            const newPrice = document.createElement('div');
            newPrice.classList.add('price');
            newPrice.textContent = '0.00';
            newInputRow.appendChild(newPrice);

            // Quantity
            const newQuantity = document.createElement('div');
            newQuantity.classList.add('quantity');
            newQuantity.innerHTML = `
                <button class="minus-btn">-</button>
                <input type="number" value="0" min="0">
                <button class="add-btn">+</button>
            `;
            newInputRow.appendChild(newQuantity);

            // Subtotal
            const newSubtotal = document.createElement('div');
            newSubtotal.classList.add('subtotal');
            newSubtotal.textContent = '0.00';
            newInputRow.appendChild(newSubtotal);

            // Doneness
            const newDoneness = document.createElement('div');
            newDoneness.classList.add('doneness');
            newDoneness.innerHTML = `
                <label><input type="radio" name="doneness-${flavorCount}" value="normal" checked> Normal</label>
                <label><input type="radio" name="doneness-${flavorCount}" value="toasted"> Toasted</label>
            `;
            newInputRow.appendChild(newDoneness);

            // Append new input row to flavorSelectionContainer
            flavorSelectionContainer.appendChild(newInputRow);
        } else {
            alert('Maximum limit reached for flavors.');
        }
    });

    // Quantity functionality
    flavorSelectionContainer.addEventListener('click', function (event) {
        const target = event.target;
        if (target.classList.contains('minus-btn')) {
            const quantityInput = target.nextElementSibling;
            let quantity = parseInt(quantityInput.value, 10);
            if (quantity > 0) {
                quantity--;
                quantityInput.value = quantity;
                updateOrderSummary();
            }
        } else if (target.classList.contains('add-btn')) {
            const quantityInput = target.previousElementSibling;
            let quantity = parseInt(quantityInput.value, 10);
            quantity++;
            quantityInput.value = quantity;
            updateOrderSummary();
        }
    });

    flavorSelectionContainer.addEventListener('input', function (event) {
        const target = event.target;
        if (target.tagName.toLowerCase() === 'input') {
            updateOrderSummary();
        }
    });

        // Initial call to update order summary on page load
        updateOrderSummary();

    // Payment method selection
    const paymentOptions = document.querySelectorAll('.payment-option-btn');

    paymentOptions.forEach(function (option) {
        option.addEventListener('click', function () {
            paymentOptions.forEach(function (opt) {
                opt.classList.remove('active');
            });
            this.classList.add('active');

            // Toggle G-cash details visibility
            const gcashDetails = document.querySelector('.gcash-details');
            if (this.textContent.trim() === 'G-cash') {
                gcashDetails.style.display = 'block';
            } else {
                gcashDetails.style.display = 'none';
            }
        });
    });

    // Add order functionality
    const addOrderBtn = document.querySelector('.add-order-btn');

    addOrderBtn.addEventListener('click', function () {
        // Implement logic to add order here
        alert('Order added successfully!');
        // You can add further handling as per your application's needs
    });
});
</script>


</body>

</html>


</html>
