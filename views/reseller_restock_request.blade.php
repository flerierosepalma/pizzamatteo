<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo | Owner Inventory</title>
    <link rel="icon" type="image/x-icon" href="https://scontent.fmnl4-7.fna.fbcdn.net/v/t1.15752-9/448200191_474132475099478_6596455881542556957_n.png?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_ohc=b4tF4OnvpwMQ7kNvgFrieEp&_nc_ht=scontent.fmnl4-7.fna&oh=03_Q7cD1QFjIEijnlQPvClN4SA7vvEb1V_1qxCAS2tnpsKMeMWxhg&oe=669489EE">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" /> --}}
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
        .homecool {
            color: red;
            font-size: 30px;
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

        .top .stock-request {
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

        .top .stock-request:hover {
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

        .content-header .pending-toggle,
        .content-header .preparing-toggle,
        .content-header .completed-toggle,
        .content-header .cancelled-toggle {
            margin-left: 30px;
            border: none;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            color: #A6A6A6;
            background: transparent;
        }

        .content-header .pending-toggle.active,
        .content-header .preparing-toggle.active,
        .content-header .completed-toggle.active,
        .content-header .cancelled-toggle.active {
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

      
        .btn-summary, 
        .btn-cancel,
        .btn-accept,
        .btn-send,
        .btn-proof {
            padding: 8px 8px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .btn-summary {
            background-color: #ff9800; 
            color: white;
        }

        .btn-proof {
            background-color: #ff9800; 
            color: white;
        }

        .btn-accept,
        .btn-send {
            background-color: green; 
            color: white;
        }

        .btn-cancel {
            background-color: #d32f2f;
            color: white;
        }

        .receipt-icon {
          font-size: 30px; /* Adjust the size as needed */
        }

        /*========= SCROLLBAR ========= */
        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #555;

        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* ============ RESPONSIVE / BREAKPOINTS ========== */
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

            .sidebar~.home {
                filter: blur(5px);
            }

            .sidebar.close~.home {
                filter: none;
            }

            .submenu .link {
                padding: 12px 0px;
            }

            .logo {
                max-width: 40%;
                max-height: 40%;
                margin-right: 10px;
                ;
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
                margin-right: 10px;
                ;
            }
        }

        /* =============== ADD STOCK MODAL =============== */

        #stockRequestModal {
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

        #stockRequestModal .modal-content {
            position: relative;
            background-color: #fefefe;
            padding: 15px;
            border: 1px solid #888;
            max-width: 700px;
            border-radius: 10px;
            width: 80%;
            max-height: 80%;
            overflow-y: auto;
        }

        #stockRequestModal h2 {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        #stockRequestModal form {
            display: flex;
            flex-direction: column;
        }

        #stockRequestModal form label {
            margin-top: 10px;
            margin-bottom: 5px;
            text-align: left;
        }

        table.restock-menu {
        border: 3px solid black;
        width: 95%;
        text-align: center;
        border-collapse: collapse;
        margin-left: 2%;
        margin-right: 2%;
        margin-bottom: 1rem;
    }

    table.restock-menu > thead {
        border: 3px solid black;
        padding-bottom: 10rem;
    }

    table.restock-menu th {
        font-size: 1rem;
        font-weight: bold;
        padding: 10px;
    }

    table.restock-menu td {
        font-size: .75rem;
        border-bottom: 1px solid black;
        padding: 10px;
        white-space: normal;
    }

    table.restock-menu .table-cell:not(:nth-child(3)) {
        white-space: normal;
    }

    table.pending-order {
        border: 2px solid black;
        width: 95%;
        text-align: center;
        border-collapse: collapse;
        margin: 0 2% 1rem 2%;
    }

    table.pending-order > thead {
        border: 2px solid black;
    }

    table.pending-order th {
        font-size: 0.75rem;
        font-weight: bold;
        padding: 5px;
    }

    table.pending-order td {
        font-size: 0.75rem;
        border-bottom: 1px solid black;
        padding: 5px;
        white-space: normal;
    }

    table.pending-order tfoot {
        padding: 5px;
        text-align: center;
        font-weight: bold;
    }

    .quantity-counter button {
        padding: 5px; 
        border: 1px solid #ccc; 
        cursor: pointer; 
        border-radius: 50%;
        color: white;
        background-color: #8A1C14;
        width: 2rem;
        white-space: nowrap;
    }

    .quantity-counter input {
        width: 40px; /* Reduce the width to remove extra space */
        text-align: center;
        border: none; /* Remove border */
        margin-left: 10px; /* Remove margin to reduce space */
    }

    .quantity-counter {
        white-space: nowrap;
    }

    /* Quantity ID=input */

    .overall-total-row td {
        border-bottom: none; /* Remove the border below the overall total row */
        text-align: center;
        font-size: 1.25rem; /* Increase the font size for overall total */
        font-weight: bold; /* Make the overall total text bold */
    }

   .request-btn {
            background-color: #FFCC00;
            color: white;
            border-radius: 12px;
            cursor: pointer;
            width: 50%;
            font-size: 16px;
            padding: 10px;
            margin-left: auto;
            margin-right: auto;
            display: block;
            border: none;
        }

   .request-btn:hover {
            background-color: #45a049;
        }

        .additional-fields {
        display: flex;
        flex-direction: column;
        align-items: center; /* Center items horizontally */
        margin-top: 10px;
    }

    .form-group {
        margin-bottom: 10px;
        text-align: center; /* Center text within the form group */
    }

    .form-group label {
        font-size: 12px;
    }

    .form-group input[type="number"] {
        padding: 5px;
        width: 100%; 
        box-sizing: border-box; 
        max-width: 200px; 
    }

    .form-group input[type="file"] {
        padding: 5px;
        width: 100%; 
        box-sizing: border-box; 
        max-width: 300px; 
        margin: 0 auto;
    }

        #stockRequestModal .add-close-btn {
            position: absolute;
            top: 20px;
            right: 18px;
            width: 33px;
            height: 30px;
            border-radius: 50%;
            background-color: #ddd;
            color: #333;
            text-align: center;
            line-height: 30px;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #stockRequestModal .add-close-btn:hover {
            background-color: #8A1C14;
            color: #fff;
            outline: none;
        }
        #orderSummary {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #orderSummary .modal-content {
            position: relative;
            background-color: #fefefe;
            padding: 10px;
            border: 1px solid #888;
            width: 80%;
            max-width: 350px; 
            max-height: 80%;
            overflow-y: auto;
            border-radius: 10px;
        }

        #orderSummary h2 {
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        #orderSummary .summary-close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #ddd;
            color: #333;
            text-align: center;
            line-height: 30px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #orderSummary .summary-close-btn:hover {
            background-color: #8A1C14;
            color: #fff;
            outline: none;
        }

        #orderSummaryContent {
            margin-top: 10px;
        }

        #orderSummary .order-item {
            border-bottom: 1px solid #ddd;
            padding: 8px 0;
        }

        #orderSummary .order-item:last-child {
            border-bottom: none; 
        }

        #orderSummary .order-item h5 {
            font-size: 0.8rem;
            font-weight: bold;
            margin-bottom: 3px;
        }

        #orderSummary .order-item .item-details {
            display: flex;
            justify-content: space-between;
            font-size: 0.7rem; 
        }

        #orderSummary .order-item .item-details p {
            margin: 3px 0;
        }

        #orderSummary  .total-order {
            padding-top: 15px;
            margin-bottom: 15px;
            text-align: right;
            border-top: 1px solid #ddd;
        }

        #orderSummary.total-order h5 {
            font-size: 0.8rem;
            font-weight: bold;
        }

        #orderSummary .total-order span {
            font-size: 0.8rem;
            font-weight: normal;
        }

        
        #paymentProofModal {
            display: none; /* Hide the modal by default */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    justify-content: center;
    align-items: center;
}

#paymentProofModal .modal-content {
    position: relative;
    background-color: #fefefe;
    padding: 10px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px; 
    max-height: 80%;
    overflow-y: auto;
    border-radius: 10px;
}



.proof-close-btn {
    z-index: 1010;
    position: absolute;
    top: 10px;
    right: 10px;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: #ddd;
    color: #333;
    text-align: center;
    line-height: 30px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s;
}

    .proof-close-btn:hover {
        background-color: #8A1C14;
        color: #fff;
        outline: none;
    }

#paymentProofModal img {
    width: 100%;
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
                    <a href="{{ url('reseller_active_orders') }}"class="link">Active Orders</a>
                    <a href="{{ url('reseller_order_history') }}"class="link">Order History</a>
                    <a href="{{ url('reseller_invoice') }}" class="link">Invoices</a>
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
                    <a href="{{ url('reseller_inventory') }}" class="link">Inventory Stock</a>
                    <a href="{{ url('reseller_restock_request') }}" class="link">Restock Request</a>
                    <a href="{{ url('reseller_data_visibility') }}" class="link">Data Visibility</a>
                    <a href="{{ url('reseller_forecasting') }}" class="link">Forecasting</a>
                </div>
            </li>

            <li>
                <div class="title">
                    <a href="{{ url('reseller_generate_report') }}" class="link">
                        <i class='bx bx-line-chart'></i>
                        <span class="name">Generate Report</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="" class="link submenu-title">Generate Report</a>
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
            <span class="page-title">Reseller Restock</span>
            <button class="stock-request" onclick="showAddModal()" {{ !$isScheduledDay ? 'disabled' : '' }}>
                {{ $isScheduledDay ? 'Request Stock' : 'Request Stock Schedule: ' . implode(', ', $requestSchedule) }}
            </button>
            <img class="logo" src="{{ asset('assets/home_logo.png') }}" alt="Logos">
        </div>
        
        {{-- <p class="homecool">Request Schedule: {{ implode(', ', $requestSchedule) }}</p>
        <p class="homecool">Stock Deliver Schedule: {{ implode(', ', $stockDeliverSchedule) }}</p> --}}

        <!-- ============= WHITEBOARD=============== -->
        <div class="content">
            <div class="content-header">
                <div class="left-header">
                    <button onclick="showContent(1)" class="pending-toggle toggle-1 active">Pending</button>
                    <button onclick="showContent(2)" class="preparing-toggle toggle-2">Preparing</button>
                    <button onclick="showContent(3)" class="completed-toggle toggle-3">Completed</button>
                    <button onclick="showContent(4)" class="cancelled-toggle toggle-4">Cancelled</button>
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

              

            <div id="content-1" class="clickers">
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Branch</th>
                            <th>Order Date</th>
                            <th>Order</th>
                            <th>Proof</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-1-body">
                        @foreach ($pendingOrders as $order)
                            <tr>
                                <td>#{{ $order->order_id }}</td>
                                <td>{{ $order->store_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($order->order_timestamp)->format('F j, Y, g:i A') }}</td>
                                <td>
                                    <button class="btn-summary" onclick="showSummaryModal('{{ $order->order_id }}')">See Order</button>
                                </td>
                                <td>
                                    @if ($order->payment_proof)
                                        <button class="btn-proof" onclick="showPaymentProofModal('{{ asset('storage/' . $order->payment_proof) }}')">View Proof</button>
                                    @else
                                        No payment proof uploaded
                                    @endif
                                </td>
                                <td>₱{{ $order->order_total_amount }}</td>
                                <td>
                                    <button class="btn-cancel" data-order-id="{{ $order->order_id }}">Cancel</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
 </div>


    <div id="content-2" class="clickers" style="display: none;">
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Branch</th>
                    <th>Order Date</th>
                    <th>Order</th>
                    <th>Proof</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="table-2-body">
                @foreach ($preparingOrders as $order)
                    <tr>
                        <td>#{{ $order->order_id }}</td>
                        <td>{{ $order->store_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($order->order_timestamp)->format('F j, Y, g:i A') }}</td>
                        <td>
                            <button class="btn-summary" onclick="showSummaryModal('{{ $order->order_id }}')">See Order</button>
                        </td>
                        <td>
                            @if ($order->payment_proof)
                                <button class="btn-proof" onclick="showPaymentProofModal('{{ asset('storage/' . $order->payment_proof) }}')">View Proof</button>
                            @else
                                No payment proof uploaded
                            @endif
                        </td>
                        <td>₱{{ $order->order_total_amount }}</td>
                        <td>
                            <button class="btn-send" onclick="showSendStockModal('{{ $order->order_id }}')">Send Stock</button> <!-- Button to trigger modal for testing -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

            <div id="content-3" class="clickers" style="display: none;">
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Branch</th>
                            <th>Order Date</th>
                            <th>Order</th>
                            <th>Proof</th>
                            <th>Total Price</th>
                            <th>Order Completed</th>
                        </tr>
                    </thead>
                    <tbody id="table-3-body">
                        @foreach ($completedOrders as $order)
                            <tr>
                                <td>#{{ $order->order_id }}</td>
                                <td>{{ $order->store_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($order->order_timestamp)->format('F j, Y, g:i A') }}</td>
                                <td>
                                    <button class="btn-summary" onclick="showSummaryModal('{{ $order->order_id }}')">See Order Summary</button>
                                </td>
                                <td>
                                    @if ($order->payment_proof)
                                        <button class="btn-proof" onclick="showPaymentProofModal('{{ asset('storage/' . $order->payment_proof) }}')">View Proof</button>
                                    @else
                                        No payment proof uploaded
                                    @endif
                                </td>
                                <td>₱{{ $order->order_total_amount }}</td>
                                    <td>{{ \Carbon\Carbon::parse($order->order_completed)->format('F j, Y, g:i A') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       
            <div id="content-4" class="clickers" style="display: none;">
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Branch</th>
                            <th>Order Date</th>
                            <th>Order</th>
                            <th>Proof</th>
                            <th>Total Price</th>
                            <th>Cancelled By</th>
                        </tr>
                    </thead>
                    <tbody id="table-3-body">
                        @foreach ($cancelledOrders as $order)
                            <tr>
                                <td>#{{ $order->order_id }}</td>
                                <td>{{ $order->store_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($order->order_timestamp)->format('F j, Y, g:i A') }}</td>
                                <td>
                                    <button class="btn-summary" onclick="showSummaryModal('{{ $order->order_id }}')">See Order</button>
                                </td>
                                <td>
                                    @if ($order->payment_proof)
                                        <button class="btn-proof" onclick="showPaymentProofModal('{{ asset('storage/' . $order->payment_proof) }}')">View Proof</button>
                                    @else
                                        No payment proof uploaded
                                    @endif
                                </td>
                                <td>₱{{ $order->order_total_amount }}</td>
                                <td>{{ $order->order_status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>

        

        <div class="modal" id="stockRequestModal">
            <div class="modal-content">
                <span class="add-close-btn" onclick="closeAddModal()">&times;</span>
                <h2>REQUEST STOCK</h2>
                <form id="stockOrderForm" action="{{ route('submit.stock.order') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="restock-menu">
                        <thead>
                            <tr>
                                <th>ITEM</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>SUBTOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menuItems as $item)
                                <tr>
                                    <td>{{ $item->menu_name }}</td>
                                    <td>₱{{ number_format($item->menu_base_price, 2) }}</td>
                                    <td>
                                        <div class="quantity-counter">
                                            <button type="button" class="quantity-decrement">-</button>
                                            <input type="number" name="quantities[{{ $item->menu_id }}]" class="quantity-input" value="0" readonly>
                                            <button type="button" class="quantity-increment">+</button>
                                        </div>
                                    </td>
                                    <td>₱<span class="subtotal" data-price="{{ $item->menu_base_price }}">0.00</span></td>
                                </tr>
                            @endforeach
                            <tr class="overall-total-row">
                                <td colspan="4">
                                    OVERALL TOTAL: ₱<span id="overall-total-amount">0.00</span>
                                </td>
                            </tr>
                            <tr>
                        </tbody>
                    </table>
                    <div class="additional-fields">
                        <div class="form-group">
                            <label for="amountPaid">Amount Paid:</label>
                            <input type="number" id="amountPaid" name="amount_paid" step="0.01" placeholder="Enter Amount Paid" required>
                        </div>
                        <div class="form-group">
                            <label for="paymentProof">Upload proof of payment:</label>
                            <input type="file" id="paymentProof" name="paymentProof" accept="image/*">
                        </div>
                    </div>

                    <button type="submit" class="request-btn" id="submitBtn">SEND REQUEST</button>

                </form>
            </div>
        </div>
        
    
    
    


            <!-- ============= ORDER SUMMARY MODAL =============== -->
            <div class="modal" id="orderSummary">
                <div class="modal-content">
                    <span class="summary-close-btn">&times;</span>
                    <h2>Order Summary</h2>
                    <div class="modal-body">
                        <div id="orderSummaryContent">
                        </div>
                        <div class="total-order">
                            <h5>Total Order Amount: <span id="totalOrderAmount"></span></h5>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- ============= PAYMENT PROOF MODAL =============== -->
    <div id="paymentProofModal" class="modal">
        <div class="modal-content">
            <span class="proof-close-btn" onclick="closePaymentProofModal()">&times;</span>
            <img id="paymentProofImage" src="" alt="Payment Proof">
        </div>
    </div>








<script>

 //======= ADD STOCKS MODAL ======= //
 function showAddModal() {
        if ({{ json_encode($isScheduledDay) }}) {
            document.getElementById("stockRequestModal").style.display = "flex";
        } else {
            alert('Today is not a scheduled day for stock requests.');
        }
    }

    function closeAddModal() {
        document.getElementById("stockRequestModal").style.display = "none";
    }

    document.querySelector(".add-close-btn").addEventListener("click", closeAddModal);

    window.addEventListener("click", function (event) {
        if (event.target === document.getElementById("stockRequestModal")) {
            closeAddModal();
        }
    });


      // Function to show the payment proof modal
      function showPaymentProofModal(imageSrc) {
        var modal = document.getElementById("paymentProofModal");
        var modalImg = document.getElementById("paymentProofImage");
        modalImg.src = imageSrc;
        modal.style.display = "flex"; // Display modal when called
    }

    // Function to close the modal
    function closePaymentProofModal() {
        var modal = document.getElementById("paymentProofModal");
        modal.style.display = "none"; // Hide modal when called
    }

    // Event listener to close modal when clicking outside
    window.addEventListener("click", function(event) {
        var modal = document.getElementById("paymentProofModal");
        if (event.target == modal) {
            closePaymentProofModal();
        }
    });
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

document.querySelectorAll('.quantity-counter').forEach(counter => {
            const decrementButton = counter.querySelector('.quantity-decrement');
            const incrementButton = counter.querySelector('.quantity-increment');
            const quantityInput = counter.querySelector('.quantity-input');
            const subtotalElement = counter.parentElement.nextElementSibling.querySelector('.subtotal');
            const price = parseFloat(subtotalElement.getAttribute('data-price'));

            decrementButton.addEventListener('click', () => {
                let quantity = parseInt(quantityInput.value);
                if (quantity > 0) {
                    quantity -= 1;
                    quantityInput.value = quantity;
                    updateSubtotal(quantity, price, subtotalElement);
                    updateOverallTotal();
                }
            });

            incrementButton.addEventListener('click', () => {
                let quantity = parseInt(quantityInput.value);
                quantity += 1;
                quantityInput.value = quantity;
                updateSubtotal(quantity, price, subtotalElement);
                updateOverallTotal();
            });
        });

        function updateSubtotal(quantity, price, subtotalElement) {
            const subtotal = quantity * price;
            subtotalElement.textContent = subtotal.toFixed(2);
        }

        function updateOverallTotal() {
            let overallTotal = 0;
            document.querySelectorAll('.subtotal').forEach(subtotalElement => {
                overallTotal += parseFloat(subtotalElement.textContent);
            });
            document.getElementById('overall-total-amount').textContent = overallTotal.toFixed(2);
        }

            function showContent(contentId) {
        const content1 = document.getElementById("content-1");
        const content2 = document.getElementById("content-2");
        const content3 = document.getElementById("content-3");
        const content4 = document.getElementById("content-4"); // Corrected this ID
        const buttons = document.querySelectorAll(".pending-toggle, .preparing-toggle, .completed-toggle, .cancelled-toggle"); // Corrected the selector

        buttons.forEach(button => button.classList.remove("active"));

        content1.style.display = (contentId === 1) ? "block" : "none";
        content2.style.display = (contentId === 2) ? "block" : "none";
        content3.style.display = (contentId === 3) ? "block" : "none";
        content4.style.display = (contentId === 4) ? "block" : "none"; // Added display logic for content4


    const activeButton = document.querySelector(`button[onclick="showContent(${contentId})"]`);
    if (activeButton) {
        activeButton.classList.add("active");
    }
}

    window.onload = function() {
    showContent(1);
    }

    document.getElementById('stockOrderForm').addEventListener('submit', function(event) {
        // Check if paymentProof field is empty
        var paymentProof = document.getElementById('paymentProof');
        if (!paymentProof.files.length) {
            alert('Please upload proof of payment.');
            event.preventDefault();
            return;
        }

        // Check if any quantity is greater than 0
        var quantities = document.querySelectorAll('.quantity-input');
        var itemsSelected = Array.from(quantities).some(function(input) {
            return parseInt(input.value) > 0;
        });
        if (!itemsSelected) {
            alert('Please select at least one item.');
            event.preventDefault();
            return;
        }
    });

    function openEditPopup(orderId) {
        // Display the edit popup
        var popup = document.getElementById('editPopup');
        popup.style.display = 'block';

        // Optionally fetch current order details and populate the form fields
        // Example: Fetch order details via AJAX if needed

        // Populate the hidden input with order ID
        document.getElementById('editOrderId').value = orderId;
    }

    function closeEditPopup() {
        // Close the edit popup
        var popup = document.getElementById('editPopup');
        popup.style.display = 'none';
    }
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $(document).ready(function() {
        // Handle click on Cancel button
        $('.btn-cancel').on('click', function() {
            var orderId = $(this).data('order-id');
            updateOrderStatus(orderId, 'Reseller');
        });

        $('.btn-receive').on('click', function() {
            var orderId = $(this).data('order-id');
            updateOrderStatus(orderId, 'Completed');
        });


        // Function to cancel order via AJAX
        function updateOrderStatus(orderId, status) {
            if (confirm("Are you sure you want to update the order status?")) {
                $.ajax({
                    url: "{{ route('update.reseller.order.status') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        orderId: orderId,
                        status: status
                    },
                    dataType: 'json',
                    success: function(response) {
                        alert(response.message); // Display success message
                        // You can optionally update the UI or reload data here
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error updating order status. Please try again.');
                    }
                });
            }
        }
    });


    //============= SUMMARY MODAL ============ //
function showSummaryModal(orderId) {
    $.ajax({
        url: '{{ route("get.order.summary") }}',
        type: 'GET',
        data: { orderId: orderId },
        dataType: 'json',
        success: function(response) {
            var orderDetails = response.orderDetails;
            var totalOrderAmount = response.totalOrderAmount;

            var html = '';
            $.each(orderDetails, function(index, order) {
                html += '<div class="order-item">';
                html += '<h5>' + order.menu_name + '</h5>';
                html += '<div class="item-details">';
                html += '<p>Quantity: ' + order.quantity + '</p>';
                html += '<p>Amount: ₱' + order.amount + '</p>';
                html += '</div>'; 
                html += '</div>'; 
            });

            $('#orderSummaryContent').html(html);
            $('#totalOrderAmount').text(totalOrderAmount); 
            $('#orderSummary').css('display', 'flex'); 
        },
        error: function(xhr, status, error) {
            console.error('Error fetching order summary:', error);
            alert('Failed to fetch order summary. Please try again.');
        }
    });
}   

    function closeSummaryModal() {
        $('#orderSummary').css('display', 'none'); 
    }

    $('.summary-close-btn').click(function() {
        closeSummaryModal();
    });

    $(window).click(function(event) {
        if ($(event.target).hasClass('modal')) {
            closeSummaryModal();
        }
    });

    $(document).ready(function() {
        closeSummaryModal(); 
    });


        </script>

</body>
</html>
