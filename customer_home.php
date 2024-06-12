<?php
session_start();
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo | Login Page</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon_ico.ico">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #F0F2F5;
        }
        .edit-store {
            background-color: #8A1C14;
            padding: 10px 20px;
            border-radius: 10px;
            margin: 20px auto;
            margin-left: 10%;
            margin-right: 10%; 
            max-width: 80%; 
        }

        .store-text {
            color: white;
            font-weight: bold;
            text-align: center;
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
        .pizza-menu {
            margin-top: 50px;
            padding: 0 20px;
        }

        .menu-container {
            display: grid;
            margin-left: 10%;
            margin-right: 10%; 
            max-width: 80%;  
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 20px;
        }

        .menu-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f9f9f9;
            padding: 0;
            border: 1px solid #DDDDDD;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
            overflow: hidden;
            text-align: center;
        }

        .menu-image-container {
            width: 100%;
            padding-top: 60%;
            position: relative;
        }

        .menu-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .menu-details {
            flex-grow: 1;
            padding: 20px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .menu-item:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .menu-item h3 {
            font-weight: bold;
            font-size: 15px;
            margin-top: 0;
            color: #333;
        }

        .menu-item h1 {
            font-weight: bold;
            color: #8A1C14;
            font-size: 18px;
            margin-bottom: 10;
        }

        .menu-item p {
            margin-bottom: 5px;
            color: #666;
            font-size: 12px;
        }
        
        .menu-details .select-button {
            background-color: #BD130E;
            color: white;
            border: none;
            padding: 4px 8px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
            font-size: 12px;
        }

        .menu-details .select-button:hover {
            background-color: rgba(189, 19, 14, 0.8);
        }

        .modal-dialog {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh; 
        max-width: 500px;
    }

    .modal-content {
        margin: auto; 
    }

    .modal-body {
            display: flex;
            align-items: flex-start;
        }

        .modal-body .menu-image-container {
            width: 50%;
            margin-right: 20px;
            border-radius: 10px;
            overflow: hidden;
        }

        .modal-body .menu-image {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            justify-content: center;
        }
        
        .modal-body h3 {
            font-weight: bold;
            font-size: 15px;
            margin-top: 0px;
            color: #333;
        }

        .modal-body h1 {
            font-weight: bold;
            color: #8A1C14;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .modal-body p {
            margin-bottom: 5px;
            color: #666;
            font-size: 12px;
        }

        .options {
            display: flex;
            justify-content: center;
        }

        .options label {
            margin-right: 10px;
            font-size: 10px;
            display: flex;
            align-items: center;
        }

        .options input[type="radio"] {
            margin-right: 5px;
            transform: scale(0.7);
            font-size: 10px;
        }

        .options .quantity {
            display: flex;
            align-items: center;
        }

        .options-row p {
            margin-top: 20px;
            color: #8A1C14;
            font-size: 12px;
            text-align: center;
            
        }

        .options-row .quantity input[type="number"] {
            width: 40px;
            text-align: center;
            border: none;
            font-size: 13px;
        }

        .options-row .quantity input[type="number"]::-webkit-outer-spin-button,
        .options-row .quantity input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .quantity button {
            width: 20px;
            height: 20px;
            font-size: 12px;
            background-color: #BD130E;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .quantity button:hover {
            background-color: rgba(189, 19, 14, 0.8);
        }

        .stock-text {
            margin-top: 5px;
            font-size: 10px;
            color: #666;
            text-align: center;
        }

        .add-to-cart {
            background-color: #BD130E;
            color: white;
            border: none;
            padding: 4px 8px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
            font-size: 12px;
            justify-content: center;
        }

        .add-to-cart:hover {
            background-color: rgba(189, 19, 14, 0.8);
        }
    </style>
</head>
<body>
    <header>
    <?php require_once('_header.php'); ?>
    </header>
    <div class="edit-store">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="store-text">
                        Store: Manila
                        <button class="btn btn-sm btn-light ml-2"><i class="fas fa-edit"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pizza-menu">
        <h2 class="text-center">Pizza Menu</h2>
        <div class="menu-container">
            <?php
            $sql_select_menu = "SELECT * FROM menu";
            $result_menu = mysqli_query($connect, $sql_select_menu);

            if (mysqli_num_rows($result_menu) > 0) {
                while ($row = mysqli_fetch_assoc($result_menu)) {
                    $item_id = $row['item_id'];
                    $item_name = $row['item_name'];
                    $item_description = $row['item_description'];
                    $item_price = $row['item_price'];
                    echo '<div class="menu-item">';
                    echo '    <div class="menu-image-container">';
                    echo '        <img src="assets/menu/' . $row["item_picture"] . '" alt="' . $row["item_name"] . '" class="menu-image">';
                    echo '    </div>';
                    echo '    <div class="menu-details">';
                    echo '        <h3>' . $row["item_name"] . '</h3>';
                    echo '        <h1>₱' . number_format($row["item_price"], 2) . '</h1>';
                    echo '        <p>' . $row["item_description"] . '</p>';
                    echo '        <button class="select-button" data-toggle="modal" data-target="#itemModal" data-id="' . $item_id . '" data-name="' . $item_name . '" data-description="' . $item_description . '" data-price="' . $item_price . '" data-image="assets/menu/' . $row["item_picture"] . '">Select</button>';
                    echo '    </div>';
                    echo '</div>';
                }
            } else {
                echo "No items found.";
            }
            ?>
        </div>
    </div>

    <div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="itemModalLabel">Item Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="menu-image-container">
                        <img id="modal-item-image" src="" alt="" class="menu-image">
                    </div>
                    <div class="menu-details">
                        <h3 id="modal-item-name"></h3>
                        <h1 id="modal-item-price"></h1>
                        <p id="modal-item-description"></p>
                        
                    <div class="options-row">
                        <p>Select toast and quantity</p>
                        <div class="options">
                            <label><input type="radio" name="toasted" value="Normal">Normal</label>
                            <label><input type="radio" name="toasted" value="Toasted">Toasted</label>
                        </div>
                    </div>
                    <div class="options-row">
                        <div class="options quantity">
                            <button onclick="decrementQuantity()">-</button>
                            <input type="number" name="quantity" id="quantity" value="1" min="1" max="10">
                            <button onclick="incrementQuantity()">+</button>
                        </div>
                        <div class="stock-text">Stock: 10</div>
                    </div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
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

        function toggleSidebarButtonVisibility() {
            const sidebarToggle = document.querySelector('.sidebar-toggle');
            if (window.innerWidth <= 768) {
                sidebarToggle.style.display = 'block';
            } else {
                sidebarToggle.style.display = 'none';
            }
        }

        window.addEventListener('resize', toggleSidebarButtonVisibility);
        window.addEventListener('load', toggleSidebarButtonVisibility);

        function incrementQuantity() {
            const quantityInput = document.getElementById('quantity');
            let quantity = parseInt(quantityInput.value);
            if (quantity < 10) {
                quantity++;
                quantityInput.value = quantity;
            }
        }

        function decrementQuantity() {
            const quantityInput = document.getElementById('quantity');
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantity--;
                quantityInput.value = quantity;
            }
        }

        $('#itemModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id');
            var name = button.data('name');
            var description = button.data('description');
            var price = button.data('price');
            var image = button.data('image');

            var modal = $(this);
            modal.find('.modal-title').text(name);
            modal.find('#modal-item-image').attr('src', image);
            modal.find('#modal-item-name').text(name);
            modal.find('#modal-item-price').text('₱' + parseFloat(price).toFixed(2));
            modal.find('#modal-item-description').text(description);
        });
    </script>
    <?php require_once('_footer.php'); ?>
</body>
</html>

