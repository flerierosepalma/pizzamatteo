<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo | Owner Inventory</title>
    <link rel="icon" type="image/x-icon"
        href="https://scontent.fmnl4-7.fna.fbcdn.net/v/t1.15752-9/448200191_474132475099478_6596455881542556957_n.png?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_ohc=b4tF4OnvpwMQ7kNvgFrieEp&_nc_ht=scontent.fmnl4-7.fna&oh=03_Q7cD1QFjIEijnlQPvClN4SA7vvEb1V_1qxCAS2tnpsKMeMWxhg&oe=669489EE">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
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
            ;
        }

        .top .add-stock {
            border: 2px solid black;
            background-color: #f0f2f5;
            font-size: 1rem;
            color: #1A1D1F;
            padding: 5px;
            margin-right: 2%;
            margin-left: auto;
            border-radius: 5px;
            cursor: pointer;
        }

        .top .add-stock:hover {
            border: 2px solid black;
            background-color: #f0f2f5;
            font-size: 1rem;
            color: #1A1D1F;
            padding: 5px;
            margin-right: 2%;
            margin-left: auto;
            border-radius: 5px;
            cursor: pointer;
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

        .btn-red, 
        .btn-orange {
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

        .btn-red {
            background-color: #f44336; 
            color: white;
        }

        .btn-orange {
            background-color: #ff9800; 
            color: white;
        }

        .btn-red:hover, 
        .btn-orange:hover {
            background-color: #d32f2f; 
        }

        .btn-edit {
            background-color: #d32f2f;
            border: none;
            cursor: pointer;
            font-size: 16px;
            padding: 0;
            border-radius: 4px;
            color: white;
        }

        .btn-edit:hover {
            color: yellow; 
        }

        .btn-edit i {
            padding: 10px; 
        }

        .btn-delete {
            background-color: #d32f2f;
            border: none;
            cursor: pointer;
            font-size: 16px;
            padding: 0;
            border-radius: 4px;
            color: white;
        }

        .btn-delete:hover {
            color: yellow; 
        }

        .btn-delete i {
            padding: 10px; 
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

        #addStocksModal {
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

        #addStocksModal .modal-content {
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

        #addStocksModal h2 {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        #addStocksModal form {
            display: flex;
            flex-direction: column;
        }

        #addStocksModal form label {
            margin-top: 10px;
            margin-bottom: 5px;
            text-align: left;
        }

        #addStocksModal .quantity-counter button {
            padding: 2px;
            border: 1px solid #ccc;
            cursor: pointer;
            border-radius: 50%;
            color: white;
            background-color: #8A1C14;
            width: 1.5rem;
            height: 1.5rem;
            font-size: 0.8rem;
        }

        #addStocksModal .quantity-counter input {
            width: 40px;
            text-align: center;
            border: none;
            margin-left: 10px;
        }

        #addStocksModal .quantity-counter {
            white-space: nowrap;
        }

        #addStocksModal .add-btn {
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

        #addStocksModal .add-btn:hover {
            background-color: #45a049;
        }

        #addStocksModal #overall-total {
            font-size: .75rem;
            font-weight: bold;
            display: block;
            text-align: center;
        }

        #addStocksModal table.add-stock {
            border: 2px solid black;
            width: 95%;
            text-align: center;
            border-collapse: collapse;
            margin-left: 2%;
            margin-right: 2%;
            margin-bottom: 0.5rem;
        }

        #addStocksModal table.add-stock>thead {
            border: 2px solid black;
        }

        #addStocksModal table.add-stock th {
            font-size: 1rem;
            font-weight: bold;
            padding: 5px;
        }

        #addStocksModal table.add-stock td {
            font-size: 0.8rem;
            border-bottom: 1px solid black;
            padding: 5px;
            white-space: normal;
        }

        #addStocksModal table.add-stock td input.expiry-date-input {
            width: 100%;
            padding: 8px;
            border: none;
            font-size: 0.8rem;
            text-align: center;
        }

        #addStocksModal table.add-stock .table-cell:not(:nth-child(3)) {
            white-space: normal;
        }

        #addStocksModal table.pending-order {
            border: 2px solid black;
            width: 95%;
            text-align: center;
            border-collapse: collapse;
            margin: 0 2% 0.5rem 2%;
        }

        #addStocksModal table.pending-order>thead {
            border: 2px solid black;
        }

        #addStocksModal table.pending-order th {
            font-size: 0.7rem;
            font-weight: bold;
            padding: 5px;
        }

        #addStocksModal table.pending-order td {
            font-size: 0.7rem;
            border-bottom: 1px solid black;
            padding: 5px;
            white-space: normal;
        }

        #addStocksModal table.pending-order tfoot {
            padding: 5px;
            text-align: center;
            font-weight: bold;
        }

        #addStocksModal .add-close-btn {
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

        #addStocksModal .add-close-btn:hover {
            background-color: #8A1C14;
            color: #fff;
            outline: none;
        }


        #editStockModal {
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

        #editStockModal .modal-content {
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

        #editStockModal h2 {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        #editStockModal form {
            display: flex;
            flex-direction: column;
        }

        #editStockModal form label {
            margin-top: 10px;
            margin-bottom: 5px;
            text-align: left;
        }

        #editStockModal form input,
        #editStockModal form textarea,
        #editStockModal form select,
        #editStockModal form button {
            padding: 11px;
            margin-bottom: 10px;
            border-radius: 12px;
            border: 1px solid #ddd;
            transition: color 0.3s ease, border-color 0.3s ease;
        }

        #editStockModal form input:hover,
        #editStockModal form textarea:hover,
        #editStockModal form select:hover {
            border-color: #8A1C14;
        }

        #editStockModal  .form-group.row {
            display: flex; /* Make each row a flexbox */
            justify-content: space-between; /* Distribute items evenly */
            }

        #editStockModal .form-group.row label,
        #editStockModal .form-group.row .col-sm-4 {
            align-items: center;
            display: flex; 
            margin: 0;
            padding: 0;
        }


        /* Approach 2: Allow some wrapping */
        #editStockModal .span-text {
        max-width: 100%; /* Adjust as needed */
        }

        #editStockModal .edit-btn {
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

        #editStockModal .edit-btn:hover {
        background-color: #45a049;
        }

        #editStockModal .edit-close-btn {
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

        #editStockModal .edit-close-btn:hover {
        background-color: #8A1C14;
        color: #fff;
        outline: none;
        }


/* Modal Container */
#disposeModal {
    display: none; /* Hide modal by default */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
}

/* Modal Content */
#disposeModal .modal-content {
    background-color: #fefefe; /* White background */
    margin: 15% auto; /* Center modal vertically and horizontally */
    padding: 20px;
    border: 1px solid #888;
    width: 60%; /* Adjust width as needed */
    max-width: 500px; /* Limit maximum width */
    border-radius: 8px;
    position: relative;
}

/* Close Button */
#disposeModal .dispose-close-btn {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

#disposeModal .dispose-close-btn:hover,
#disposeModal .dispose-close-btn:focus {
    color: black;
    text-decoration: none;
}

/* Dispose Button */
#disposeModal .modal-content button {
    background-color: #4CAF50; /* Green */
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    font-size: 16px;
}

#disposeModal .modal-content button:hover {
    background-color: #45a049; /* Darker green on hover */
}

/* Dispose Quantity Input */
#disposeModal .modal-content input[type=number] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

/* Dispose Modal Title */
#disposeModal .modal-content h2 {
    margin-top: 0;
    color: #333;
}

/* Dispose Modal Paragraphs */
#disposeModal .modal-content p {
    margin-top: 0;
    margin-bottom: 10px;
    font-size: 16px;
    color: #555;
}

/* Responsive Layout Adjustments */
@media screen and (max-width: 600px) {
    #disposeModal .modal-content {
        width: 80%;
    }
}

   

    

    </style>
</head>

<body>
    <div class="sidebar close">
        <button class="toggle-close">X</button>

        <!-- ========== SIDE BAR ============  -->
        <a href="#" class="logo-box">
            <i class='bx bxs-pizza'></i>
            <div class="logo-name">Pizza &hearts; Matteo</div>
            <h5 class="branch">Manila</h5>
        </a>

        <ul class="sidebar-list">
            <li>
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-grid-alt'></i>
                        <span class="name">Home</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Home</a>
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
                    <a href="#" class="link">Active Orders</a>
                    <a href="#" class="link">Order History</a>
                    <a href="#" class="link">Invoices</a>
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
                    <a href="#" class="link">Stock Inventory</a>
                    <a href="#" class="link">Restock Request</a>
                    <a href="#" class="link">Data Visibility</a>
                    <a href="#" class="link">Forecasting</a>
                </div>
            </li>
            <li>
                <div class="title">
                    <a href="#" class="link">
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

    <!-- ============= Home Section =============== -->
    <section class="home">
        <div class="top">
            <button class="toggle-sidebar">☰</button>
            <span class="page-title">Stock Inventory</span>
            <button class="add-stock" onclick="showAddModal()">Add Stock</button>
            <img class="logo" src="<?php echo e(asset('assets/home_logo.png')); ?>" alt="Logos">
        </div>

        <!-- ============= WHITEBOARD=============== -->
        <div class="content">
            <div class="content-header">
                <div class="left-header">
                    <button onclick="showContent(1)" class="active-toggle toggle-1 active">Active Inventory</button>
                    <button onclick="showContent(2)" class="stock-toggle toggle-2">Stock Log</button>
                    <button onclick="showContent(3)" class="transfer-toggle toggle-3">Transfer Log</button>
                    <button onclick="showContent(4)" class="update-toggle toggle-4">Update Log</button>
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

              

            <!-- ============= ACTIVE INVENTORY =============== --> 
            <div id="content-1" class="clickers">
               <table>
    <thead>
        <tr>
            <th>Menu Name</th>
            <th>Stock ID</th>
            <th>Price</th>
            <th>Available Stock</th>
            <th>Inventory Value</th>
            <th>Stock Date</th>
            <th>Days to Expiry</th>
            <th>Stock Level</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="table-1-body">
        <?php
            $sortedMenuItems = $menuItems->sortBy('menu_name');
        ?>
        <?php $__currentLoopData = $sortedMenuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $stocksForMenu = $stocks->where('menu_id', $menu->menu_id);
                $totalStock = $stocksForMenu->sum('inventory_stock');
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
                        $formattedStockDate = Carbon\Carbon::parse($stock->stock_date)->format(
                            'F d, Y',
                        );
                    ?>
                    <tr>
                        <td><?php echo e($menu->menu_name); ?></td>
                        <td data-label="Stock ID">#<?php echo e($stock->stock_item_id); ?></td>
                        <td data-label="Price">₱<?php echo e($menu->menu_base_price); ?></td>
                        <td data-label="Available Stock"><?php echo e($stock->inventory_stock); ?></td>
                        <td data-label="Inventory Value">₱<?php echo e($stock->inventory_stock * $menu->menu_base_price); ?></td>
                        <td data-label="Stock Date"><?php echo e($formattedStockDate); ?></td>
                        <td data-label="Days to Expiry">
                            <span style="color: <?php echo e($expiryTextColor); ?>;">
                                <?php echo e($daysToExpire <= 0 ? 'Expired' : $daysToExpire . ' day' . ($daysToExpire > 1 ? 's' : '')); ?>

                            </span>
                            <br>
                            <?php echo e($formattedExpiryDate); ?>

                        </td>
                        <td data-label="Stock Level"
                            style="color: white; font-weight: bold; background-color: <?php echo e($bgColor); ?>;">
                            <?php echo e($stockStatus); ?>

                        </td>
                        <td data-label="Action">

                            <button type="button" onclick="showDisposeModal('<?php echo e($stock->stock_item_id); ?>', '<?php echo e($menu->menu_name); ?>', '<?php echo e($stock->inventory_stock); ?>')" class="btn-dispose <?php echo e($isExpired ? 'btn-red' : 'btn-orange'); ?>">Dispose</button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr>
                    <td><?php echo e($menu->menu_name); ?></td>
                    <td>None</td>
                    <td data-label="Price">₱<?php echo e($menu->menu_base_price); ?></td>
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
 </div>

    <!-- ============= STOCK LOG =============== --> 

    <div id="content-2" class="clickers" style="display: none;">
        <table>
            <thead>
                <tr>
                    <th>Stock ID</th>
                    <th>Menu Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Stock Date</th>
                    <th>Expiry Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="table-2-body">
                <?php $__currentLoopData = $stockLog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr data-stock-id="#<?php echo e($stock->stock_item_id); ?>">
                        <td data-label="Stock ID"><?php echo e($stock->stock_item_id); ?></td>
                        <td data-label="Menu Name"><?php echo e($stock->menu_name); ?></td>
                        <td data-label="Price">₱<?php echo e($stock->menu_base_price); ?></td>
                        <td data-label="Quantity"><?php echo e($stock->total_stock); ?></td>
                        <td data-label="Total Price">₱<?php echo e($stock->menu_base_price * $stock->total_stock); ?></td>
                        <td data-label="Stock Date"><?php echo e(\Carbon\Carbon::parse($stock->stock_date)->format('F d, Y')); ?></td>
                        <td data-label="Expiry Date"><?php echo e(\Carbon\Carbon::parse($stock->expiry_date)->format('F d, Y')); ?></td>
                        <td data-label="Action">
                            <button type="button" class="btn-edit" data-toggle="modal" data-target="#editStockModal"
                            data-id="<?php echo e($stock->stock_item_id); ?>" 
                            data-name="<?php echo e($stock->menu_name); ?>"
                            data-quantity="<?php echo e($stock->total_stock); ?>" 
                            data-expiry="<?php echo e(\Carbon\Carbon::parse($stock->expiry_date)->format('Y-m-d')); ?>">
                        <i class="fas fa-edit"></i> <!-- Font Awesome edit icon -->
                    </button>
                    <button type="button" class="btn-delete" data-id="<?php echo e($stock->stock_item_id); ?>">
                        <i class="fas fa-trash-alt"></i> <!-- Font Awesome delete icon -->
                    </button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

            <div id="content-3" class="clickers" style="display: none;">
                <table>
                    <thead>
                        <tr>
                            <th>Stock Id</th>
                            <th>Menu</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>From</th>
                            <th></th>
                            <th>To</th>
                        </tr>
                    </thead>
                    <tbody id="table-3-body">
                        <?php $__currentLoopData = $stockTransfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>#<?php echo e($transfer->stock_item_id); ?></td>
                                <td><?php echo e($transfer->menu_name); ?></td>
                                <td><?php echo e($transfer->quantity); ?></td>
                                <td><?php echo e($transfer->transfer_date); ?></td>
                                <td><?php echo e($transfer->source_person); ?></td>
                                <td>→</td>
                                <td><?php echo e($transfer->destination_branch); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
       
            <div id="content-4" class="clickers" style="display: none;">
                <table>
                    <thead>
                        <tr>
                            <th>Stock ID</th>
                            <th>Old Menu</th>
                            <th>New Menu</th>
                            <th>Old Quantity</th>
                            <th>New Quantity</th>
                            <th>Old Expiry</th>
                            <th>New Expiry</th>
                            <th>Update Type</th>
                            <th>Update Date</th>
                        </tr>
                    </thead>
                    <tbody id="table-4-body">
                        <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>#<?php echo e($log->stock_item_id); ?></td>
                            <td><?php echo e($log->old_menu_name); ?></td>
                            <td><?php echo e($log->new_menu_name); ?></td>
                            <td><?php echo e($log->old_total_stock); ?></td>
                            <td><?php echo e($log->new_total_stock); ?></td>
                            <td><?php echo e($log->old_expiry_date); ?></td>
                            <td><?php echo e($log->new_expiry_date); ?></td>
                            <td><?php echo e($log->update_action); ?></td>
                            <td><?php echo e($log->updated_at); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

        </div>

   




    <!-- Add Stocks Modal -->
    <div class="modal" id="addStocksModal">
        <div class="modal-content">
            <span class="add-close-btn" onclick="closeAddModal()">&times;</span>
            <h2>ADD STOCK</h2>
            <form id="addStockForm" action="<?php echo e(route('submit.owner.stock')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <table class="add-stock">
                    <thead>
                        <tr>
                            <th>ITEM</th>
                            <th>PRICE</th>
                            <th>QUANTITY</th>
                            <th>SUBTOTAL</th>
                            <th>EXPIRY DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->menu_name); ?></td>
                                <td>₱<?php echo e(number_format($item->menu_base_price, 2)); ?></td>
                                <td>
                                    <div class="quantity-counter">
                                        <button type="button" class="quantity-decrement" onclick="changeQuantity(this, -1)">-</button>
                                        <input type="number" name="quantities[<?php echo e($item->menu_id); ?>]" class="quantity-input" value="0" readonly>
                                        <button type="button" class="quantity-increment" onclick="changeQuantity(this, 1)">+</button>
                                    </div>
                                </td>
                                <td>₱<span class="subtotal" data-price="<?php echo e($item->menu_base_price); ?>">0.00</span></td>
                                <td><input type="date" name="expiry_dates[<?php echo e($item->menu_id); ?>]" class="expiry-date-input"></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <span id="overall-total">OVERALL TOTAL: ₱<span id="overall-total-amount">0.00</span></span><br>
                <button type="submit" class="add-btn">SUBMIT</button>
            </form>
        </div>
    </div>


    <!-- Edit Stock Modal -->
    <div class="modal" id="editStockModal">
        <div class="modal-content">
            <span class="edit-close-btn" onclick="closeEditModal()">&times;</span>
            <h2>Edit Stock</h2>
            <form id="editStockForm">
                <?php echo csrf_field(); ?> <!-- CSRF token for Laravel -->
    
                <!-- Hidden field for stock_item_id -->
                <input type="hidden" id="stock_item_id" name="stock_item_id">
    
                <div class="form-group row">
                    <label for="stock_id" class="col-sm-2 col-form-label">Stock ID:</label>
                    <div class="col-sm-4">
                        <span id="stock_id" class="span-text"></span>
                    </div>
                    <label for="stock_date" class="col-sm-2 col-form-label text-right">Stock Date:</label>
                    <div class="col-sm-4">
                        <span id="stock_date" class="span-text"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stock_price" class="col-sm-2 col-form-label">Price:</label>
                    <div class="col-sm-4">
                        <span id="stock_price" class="span-text"></span>
                    </div>
                    <label for="total_price" class="col-sm-2 col-form-label text-right">Total Price:</label>
                    <div class="col-sm-4">
                        <span id="total_price" class="span-text"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_menu_name">Menu Name:</label>
                    <select id="edit_menu_name" name="menu_name" class="form-control" required>
                        <option value="">Select Menu Name</option>
                        <?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($menu->menu_name); ?>"><?php echo e($menu->menu_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit_total_stock">Quantity:</label>
                    <input type="number" id="edit_total_stock" name="total_stock" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edit_expiry_date">Expiry Date:</label>
                    <input type="date" id="edit_expiry_date" name="expiry_date" class="form-control" required>
                </div>
                <button type="submit" class="edit-btn">Save Changes</button>
            </form>
        </div>
    </div>




<!-- Dispose Stock Modal -->
<div id="disposeModal" class="modal">
    <div class="modal-content">
        <span class="dispose-close-btn" onclick="disposeModal()">&times;</span>
        <h2>Dispose Stock</h2>
        <form id="disposeStockForm">
            <?php echo csrf_field(); ?> <!-- CSRF token for Laravel -->

            <!-- Hidden field for stock_item_id -->
            <input type="hidden" id="disposeStockItemId" name="stock_item_id">
            
            <!-- Display stock item details -->
            <div class="form-group">
                <label for="disposeMenuName">Menu Name:</label>
                <span id="disposeMenuName" class="span-text"></span>
            </div>
            <div class="form-group">
                <label for="disposeInventoryStock">Available Stock:</label>
                <span id="disposeInventoryStock" class="span-text"></span>
            </div>
            <div class="form-group">
                <label for="disposeQuantity">Quantity to Dispose:</label>
                <input type="number" id="disposeQuantity" name="dispose_quantity" class="form-control" min="1" required>
            </div>
            <button type="button" onclick="disposeStock()" class="edit-btn">Dispose</button>
        </form>
    </div>
</div>







<script>

function showDisposeModal(stockItemId, menuName, inventoryStock) {
    // Populate modal with data
    document.getElementById("disposeStockItemId").value = stockItemId;
    document.getElementById("disposeMenuName").textContent = menuName;
    document.getElementById("disposeInventoryStock").textContent = inventoryStock;

    // Display the modal
    var modal = document.getElementById("disposeModal");
    modal.style.display = "block";

    console.log(`Showing dispose modal for stock item ID ${stockItemId}`);
}

// Function to close the dispose modal
function disposeModal() {
    var modal = document.getElementById("disposeModal");
    modal.style.display = "none";

    console.log("Closing dispose modal");
}

// Function to handle stock disposal
function disposeStock() {
    // Get form data
    var stockItemId = document.getElementById("disposeStockItemId").value;
    var disposeQuantity = document.getElementById("disposeQuantity").value;

    // Validate input (optional in frontend for UX improvement)
    if (!stockItemId || !disposeQuantity || isNaN(disposeQuantity) || disposeQuantity <= 0) {
        alert("Please enter a valid quantity to dispose.");
        console.error("Invalid disposal quantity:", disposeQuantity);
        return;
    }

    // AJAX request to update stock data
    $.ajax({
        type: "POST",
        url: "/dispose-stock",
        data: {
            stock_item_id: stockItemId,
            dispose_quantity: disposeQuantity,
            _token: "<?php echo e(csrf_token()); ?>",
        },
        success: function(response) {
            // Handle success, update UI if needed
            console.log("Stock disposal successful:", response);
            // Close the modal after successful disposal
            disposeModal();
            // Reload or update the table content
            location.reload(); // Example: Reload the page to refresh data
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error("Error disposing stock:", error);
            alert("Failed to dispose stock. Please try again.");
        }
    });
}



  


    //======= SIDEBAR ======= //
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


    //======= CLOSE BUTTON IN MOBILE VIEW ======= //
    const closeSidebarButton = document.querySelector('.toggle-close');

    closeSidebarButton.addEventListener('click', () => {
        sidebar.classList.toggle('close');
    });

    const searchInput = document.getElementById('searchInput');


    //======= SEARCH ======= //
    function performSearch() {
        const searchTerm = searchInput.value.trim().toLowerCase();

        const activeContent = document.querySelector('.clickers:not([style*="display: none"]) tbody');
        const menuRows = activeContent.querySelectorAll('tr');

        menuRows.forEach(row => {
            let found = false; 

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


    //======= PAGE TOGGLE ======= //
    function showContent(contentId) {
        const content1 = document.getElementById("content-1");
        const content2 = document.getElementById("content-2");
        const content3 = document.getElementById("content-3");
        const content4 = document.getElementById("content-4"); // Corrected this ID
        const buttons = document.querySelectorAll(".active-toggle, .stock-toggle, .transfer-toggle, .update-toggle"); // Corrected the selector

        buttons.forEach(button => button.classList.remove("active"));

        content1.style.display = (contentId === 1) ? "block" : "none";
        content2.style.display = (contentId === 2) ? "block" : "none";
        content3.style.display = (contentId === 3) ? "block" : "none";
        content4.style.display = (contentId === 4) ? "block" : "none"; // Added display logic for content4

        document.querySelector(`button[onclick="showContent(${contentId})"]`).classList.add("active");
    }

    //======= SORT ======= //
    document.addEventListener('DOMContentLoaded', function () {
        const sortControl = document.getElementById('sortControl');

        function performSorting() {
            const sortColumn = parseInt(document.getElementById('sortColumn').value);
            const sortOrder = document.getElementById('sortOrder').value;

            const activeContent = document.querySelector('.clickers:not([style*="display: none"]) tbody');
            const menuRows = activeContent.querySelectorAll('tr');

            const sortedRows = Array.from(menuRows).sort((rowA, rowB) => {
                let cellA = rowA.querySelectorAll('td')[sortColumn].textContent.trim();
                let cellB = rowB.querySelectorAll('td')[sortColumn].textContent.trim();

                if (sortColumn === 3 || sortColumn === 4 || sortColumn === 5) {
                    cellA = parseFloat(cellA.replace(/[^\d.-]/g, '')) || 0;
                    cellB = parseFloat(cellB.replace(/[^\d.-]/g, '')) || 0;
                } else if (sortColumn === 6 || sortColumn === 7) {
                    cellA = parseDate(cellA);
                    cellB = parseDate(cellB);
                }

                function parseDate(dateString) {
                    if (dateString.toLowerCase().includes('expired')) {
                        return -1;
                    } else if (dateString.toLowerCase() === 'none') {
                        return 9999;
                    } else {
                        const daysLeft = parseInt(dateString.split(' ')[0]);
                        return isNaN(daysLeft) ? 0 : daysLeft;
                    }
                }

                return sortOrder === 'asc' ? cellA - cellB : cellB - cellA;
            });

            activeContent.innerHTML = '';
            sortedRows.forEach((sortedRow) => {
                activeContent.appendChild(sortedRow);
            });
        }

        sortControl.addEventListener('change', function () {
            performSorting();
        });

        performSorting();
    });

    
    //======= ADD STOCKS MODAL ======= //
    function showAddModal() {
        document.getElementById("addStocksModal").style.display = "flex";
    }

    function closeAddModal() {
        document.getElementById("addStocksModal").style.display = "none";
    }

    document.querySelector(".add-close-btn").addEventListener("click", closeAddModal);

    window.addEventListener("click", function (event) {
        if (event.target === document.getElementById("addStocksModal")) {
            closeAddModal();
        }
    });

    //======= MODAL QUANTITY COUNTER ======= //
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


    //======= MODAL TOTAL======= //
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

</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

//======= ADD STOCK FORM VALIDATION ======= //
        $(document).ready(function() {
    $('#addStockForm').submit(function(e) {
        e.preventDefault();

        let isValid = true;

        $('.add-stock tbody tr').each(function() {
            let $row = $(this);
            let quantity = $row.find('.quantity-input').val();
            let expiryDate = $row.find('.expiry-date-input').val();

            if (quantity > 0) {
                if (quantity == '0' || expiryDate == '') {
                    isValid = false;
                    $row.addClass('error');
                } else {
                    $row.removeClass('error');
                }
            }
        });

        if (!isValid) {
            alert('Please fill out both quantity and expiry date for rows you want to add.');
            return false;
        }

        this.submit();
    });


//======= DELETE STOCK ======= //
$(document).ready(function() {
    $('.btn-delete').on('click', function() {
        var stockId = $(this).data('id');

        if (confirm("Are you sure you want to delete this stock item?")) {
            $.ajax({
                url: "<?php echo e(route('owner.delete.stock')); ?>",
                type: 'POST',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: stockId
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', xhr.responseText);
                    alert('Error deleting stock item. Please try again.');
                }
            });
        }
    });
});



//======= EDIT STOCK ======= //
    $('#editStockForm').on('submit', function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: "<?php echo e(route('owner.update.stock')); ?>",
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    alert(response.message);
                    $('#editStockModal').modal('hide');
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error updating stock. Please try again.');
            }
        });
    });


    $('.quantity-input, .expiry-date-input').focus(function() {
                    $(this).closest('tr').removeClass('error');
                });
            });
        
    $('.btn-edit').on('click', function() {
        var stockId = $(this).data('id');
        var menuName = $(this).data('name');
        var quantity = $(this).data('quantity');
        var expiryDate = $(this).data('expiry');
        var stockPrice = $(this).closest('tr').find('td[data-label="Price"]').text().replace('₱', ''); 
        var stockItemId = $(this).data('id');

        console.log('Stock ID:', stockId);
        console.log('Stock Item ID:', stockItemId);

        $('#edit_menu_name').val(menuName);
        $('#edit_total_stock').val(quantity);
        $('#edit_expiry_date').val(expiryDate);
        $('#stock_item_id').val(stockItemId);
        $('#stock_id').text(stockId);

        var tableRow = $(this).closest('tr'); 
        $('#stock_price').text('₱' + tableRow.find('td[data-label="Price"]').text().replace('₱', '')); // Get price from table cell
        $('#total_price').text('₱' + (parseFloat(quantity) * parseFloat(stockPrice)).toFixed(2)); // Calculate and display total price
        $('#stock_date').text(tableRow.find('td[data-label="Stock Date"]').text().trim()); // Get stock date from table cell

        $('#edit_total_stock').on('change', function() {
            var newQuantity = $(this).val();
            updateTotalPrice(newQuantity, stockPrice);
        });
    });

        function updateTotalPrice(quantity, price) {
        var totalPrice = parseFloat(quantity) * parseFloat(price);
        $('#total_price').text('₱' + totalPrice.toFixed(2));
    }


    //======= EDIT STOCKS MODAL ======= //
    function showEditModal() {
        document.getElementById("editStockModal").style.display = "flex";
    }

    function closeEditModal() {
        document.getElementById("editStockModal").style.display = "none";
    }

    document.querySelector(".edit-close-btn").addEventListener("click", closeEditModal);

    window.addEventListener("click", function (event) {
        if (event.target === document.getElementById("editStockModal")) {
            closeEditModal();
        }
    });

    document.querySelectorAll('.btn-edit').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); 
            showEditModal(); 
        });
    });

        </script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\pizzamatteo\resources\views/owner_stock_inventory.blade.php ENDPATH**/ ?>