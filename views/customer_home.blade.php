<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Menu | Home </title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon_ico.ico') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #F0F2F5;
        }

        .content-wrapper {
            min-height: 95vh;
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

        
        .change-store {
            margin: 0px;
            margin-top: 10px;
            font-size: 15px;
            color: white;
            text-align: center;
        }

        .pizza-menu {
            margin-top: 20px;
            padding: 0 20px;
            margin-bottom: 50px;
        }

        .pizza-menu h2 {
            font-weight: bold;
            margin-bottom: 15px;
            color: #8A1C14;
            text-align: center;
            font-size: 40px;
        }

        .pizza-menu p {
            margin-bottom: 15px;
            text-align: center;
            font-size: 20px;
        }


        .menu-container {
            display: grid;
            margin-left: 10%;
            margin-right: 10%;
            max-width: 80%;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 20px;
        }


        @media only screen and (max-width: 768px) {
            .menu-container {
                max-width: 90%;
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            }
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
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: auto;
            transform: translateY(-50%);
            border-radius: 10px;
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

        .cart-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #8A1C14;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s;
        }

        .cart-button:hover {
            background-color: #BD130E;
        }

        .form-group {
            margin-top: 10px;
        }

        .fa-edit {
            color: #8A1C14;
        }

        .btn-primary {
            color: white;
            background-color: #ff914d;
            border-color: #ff914d;
            font-size: 12px;
        }

        .btn-secondary {
            color: orange;
            background-color: white;
            border-color: orange;
            font-size: 12px;
        }

        .btn-primary:hover,
        .btn-secondary:hover {
            background-color: #FFCC00;
            border-color: orange;
        }

        .menu-item.sold-out {
            opacity: 0.5;
            pointer-events: none;
            position: relative;
        }


        @media only screen and (max-width: 768px) {
            .menu-item.sold-out::after {
                top: 15%;
            }
        }
    </style>
</head>

<body>
    <header>
        @include('_header')
    </header>
    <div class="content-wrapper">
        <div class="edit-store">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-8">
                        <div class="store-text">
                            Store: <span id="storeNames">{{ $storeNames }}</span>
                            <button class="btn btn-sm btn-light ml-2" onclick="toggleEditForm()"><i
                                    class="fas fa-edit"></i></button>
                        </div>
                        <div id="editForm" style="display: none;">
                            <p class= "change-store">Want to see more stores? Update your address!</p>
                            <form id="storeForm" method="POST" action="{{ route('update.store') }}">
                                @csrf
                                <div class="form-group">
                                    <select class="form-control" id="updateStore" name="updateStore"
                                        onchange="removePlaceholderOption()">
                                        <option selected hidden value="">{{ $storeNames }}</option>
                                        @foreach ($stores as $resellerId => $storeName)
                                            <option value="{{ $resellerId }}">{{ $storeName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-secondary"
                                        onclick="toggleEditForm()">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pizza-menu {{ $isOffline ? 'offline' : '' }}">
            @if ($isOffline)
                <h2>Store is offline</h2>
                <p>Choose other store!</p>
            @else
                <h2>Pizza Menu</h2>
                <div class="menu-container">
                    @foreach ($menuItems as $menu)
                        @php
                            $menuStock = DB::table('reseller_stock')
                                ->where('menu_id', $menu->menu_id)
                                ->where('reseller_id', $customerStore)
                                ->where('expiry_date', '>=', date('Y-m-d'))
                                ->sum('inventory_stock');
                        @endphp
                        @if ($menuStock > 0)
                            <div class="menu-item">
                                <div class="menu-image-container">
                                    <img src="{{ asset('storage/menu/' . $menu->menu_picture) }}" alt="{{ $menu->menu_name }}" class="menu-image">
                                </div>
                                <div class="menu-details">
                                    <h3>{{ $menu->menu_name }}</h3>
                                    <h1>₱{{ number_format($menu->menu_price, 2) }}</h1>
                                    <p>{{ $menu->menu_description }}</p>
                                    <button class="select-button" data-toggle="modal" data-target="#menuModal"
                                        data-id="{{ $menu->menu_id }}" data-name="{{ $menu->menu_name }}"
                                        data-description="{{ $menu->menu_description }}"
                                        data-price="{{ $menu->menu_price }}"
                                        data-image="{{ asset('storage/menu/' . $menu->menu_picture) }}">
                                        Select
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    @foreach ($menuItems as $menu)
                    @php
                        $menuStock = DB::table('reseller_stock')
                            ->where('menu_id', $menu->menu_id)
                            ->where('reseller_id', $customerStore)
                            ->where('expiry_date', '>=', date('Y-m-d'))
                            ->sum('inventory_stock');
                    @endphp
                    @if ($menuStock == 0)
                        <div class="menu-item sold-out">
                            <div class="menu-image-container">
                                <img src="{{ asset('storage/menu/' . $menu->menu_picture) }}" alt="{{ $menu->menu_name }}" class="menu-image">
                            </div>
                            <div class="menu-details">
                                <h3>{{ $menu->menu_name }}</h3>
                                <h1>₱{{ number_format($menu->menu_price, 2) }}</h1>
                                <p>{{ $menu->menu_description }}</p>
                                <button class="select-button" disabled>
                                    Sold Out
                                </button>
                            </div>
                        </div>
                    @endif
                @endforeach
                </div>
            @endif
        </div>

        <div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="menu-image-container">
                            <img id="modal-menu-image" src="" alt="" class="menu-image">
                        </div>
                        <div class="menu-details">
                            <h3 id="modal-menu-name"></h3>
                            <h1 id="modal-menu-price"></h1>
                            <p id="modal-menu-description"></p>

                            <form id="add-to-cart-form">
                                @csrf
                                <input type="hidden" name="menu_id" id="modal-menu-id">
                                <input type="hidden" name="toasted" value="Normal">
                                <div class="options-row">
                                    <p>Select toast and quantity</p>
                                    <div class="options">
                                        <label><input type="radio" name="toasted" value="Normal"
                                                checked>Normal</label>
                                        <label><input type="radio" name="toasted" value="Toasted">Toasted</label>
                                    </div>
                                </div>
                                <div class="options-row">
                                    <div class="options quantity">
                                        <button type="button" onclick="decrementQuantity()">-</button>
                                        <input type="number" name="quantity" id="quantity">
                                        <button type="button" onclick="incrementQuantity()">+</button>
                                    </div>
                                    <div class="stock-text"></div>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="add-to-cart" onclick="addToCart()">Add to
                                        Cart</button>
                                </div>
                            </form>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('_footer')

    <script>
        function incrementQuantity() {
            const quantityInput = document.getElementById('quantity');
            let quantity = parseInt(quantityInput.value);
            let stock = parseInt($('.stock-text').text().replace('Stock: ', ''));

            if (quantity < stock) {
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

        $('#menuModal').on('show.bs.modal', function(event) {
            var modal = $(this);
            modal.find('#quantity').val(1); 
            var button = $(event.relatedTarget); 
            var id = button.data('id');
            var name = button.data('name');
            var description = button.data('description');
            var price = button.data('price');
            var image = button.data('image');

            modal.find('.modal-title').text(name);
            modal.find('#modal-menu-image').attr('src', image);
            modal.find('#modal-menu-name').text(name);
            modal.find('#modal-menu-price').text('₱' + parseFloat(price).toFixed(2));
            modal.find('#modal-menu-description').text(description);
            modal.find('#modal-menu-id').val(id);

    $.ajax({
        type: "GET",
        url: "{{ route('stock.get') }}",
        data: {
            menu_id: id
        },
        success: function(response) {
            console.log('Stock response:', response);
            modal.find('.stock-text').text('Stock: ' + response.stock);
        },
        error: function(xhr, status, error) {
            console.error('Error retrieving stock information:', error);
            modal.find('.stock-text').text('Stock: N/A');
        }
    });
});


        function addToCart() {
            var formData = $("#add-to-cart-form").serialize();

            $.ajax({
                type: "POST",
                url: "{{ route('cart.add') }}",
                data: formData,
                success: function(response) {
                    alert(response.message);
                    $('#menuModal').modal('hide');
                },
                error: function(xhr, status, error) {
                    var response = JSON.parse(xhr.responseText);
                    alert('Error adding item to cart: ' + response.message);
                }
            });
        }

        function toggleEditForm() {
            var editForm = document.getElementById('editForm');
            if (editForm.style.display === 'none') {
                editForm.style.display = 'block';
            } else {
                editForm.style.display = 'none';
            }
        }

        function removePlaceholderOption() {
            var selectElement = document.getElementById('updateStore');
            var placeholderOption = selectElement.querySelector('option[value=""]');
            if (placeholderOption) {
                selectElement.removeChild(placeholderOption);
            }
        }
    </script>
</body>

</html>