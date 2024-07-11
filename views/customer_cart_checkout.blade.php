<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo | Cart </title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon_ico.ico">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #F0F2F5;
        }

        #progressbar {
            display: flex;
            justify-content: center;
            list-style-type: none;
            padding: 0;
            margin: 20px auto;
            width: 50%;
            position: relative;
            z-index: 1;
        }

        #progressbar li {
            position: relative;
            text-align: center;
            flex: 1;
            font-size: 14px;
            color: #333;
        }

        #progressbar li:before {
            content: attr(data-step);
            width: 80px;
            height: 30px;
            line-height: 30px;
            display: block;
            background: #ddd;
            border-radius: 5px;
            margin: 0 auto 10px auto;
            z-index: 2;
            position: relative;
        }

        #progressbar li:after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background: #ddd;
            top: 15px;
            left: -50%;
            z-index: 1;
        }

        #progressbar li:first-child:after {
            content: none;
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #8A1C14;
            color: white;
        }

        .content-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 95vh;
            padding-bottom: 40px;
        }

        .container {
            margin: 0px auto;
            width: 90%;
            width: 600px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 30px;
            background-color: #f9f9f9;
            position: relative;
        }

        fieldset {
            border: none;
            display: none;
            position: relative;
        }

        fieldset.active {
            display: block;
        }

        .fieldset-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .fieldset-header h2 {
            font-size: 20px;
            font-weight: bold;
            color: black;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .empty-cart {
            text-align: center;
            font-weight: bold;
            margin: 20px;
            color: #8A1C14;
        }

        .button {
            display: block;
            background-color: #8A1C14;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 150px;
            text-align: center;
        }

        .button-back {
            margin-right: 10px;
        }

        .button:hover,
        .button-back:hover {
            background-color: #CB150F;
        }

        #cart .clear-cart-button {
            position: absolute;
            right: 0px;
            background-color: #ff914d;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #cart .clear-cart-button:hover {
            background-color: #FFCC00;
        }

        #cart .item {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        #cart .item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
            margin-right: 20px;
            border: 1px solid #ccc;
        }

        #cart .item-info {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            justify-content: space-between;
            min-width: 0;
        }

        #cart .item-info h3 {
            font-size: 18px;
            font-weight: bold;
            color: #8A1C14;
            margin: 0;
        }

        #cart .item-info-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 20px;
        }

        #cart .item-info-row p {
            font-size: 13px;

        }

        #cart .amount {
            margin: 0;
            font-size: 15px;
            font-weight: bold;
            text-align: left;
            margin-right: 20px;
        }

        #cart .total-amount {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
            margin-right: 30px;
        }

        #cart .remove-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #ff0000;
            cursor: pointer;
            transition: color 0.3s;
            font-size: 24px;
        }

        #cart .remove-icon:hover {
            color: #cc0000;
        }

        #cart .checkout .item {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        @media (max-width: 768px) {
            #progressbar {
                width: 80%;
            }

            .container {
                width: 90%;
            }

            #cart .item img {
                width: 80px;
                height: 80px;
                margin-right: 10px;
            }

            #cart .item-info h3 {
                font-size: 15px;
            }

            #cart .item-info span {
                font-size: 16px;
            }

            #cart .button {
                width: 150px;
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .fieldset-header h2 {
                font-size: 18px;
            }

            #cart .item-info h3 {
                font-size: 14px;
            }

            #cart .item-info p {
                font-size: 14px;
            }

            #cart .item-info span {
                font-size: 14px;
            }

            #cart .clear-cart-button {
                font-size: 10px;
                padding: 3px 7px;
            }

            #cart .button {
                width: 60%;
                font-size: 14px;
            }
        }

        .checkout-text {
            font-size: 18px;
            font-weight: bold;
            color: #8A1C14;
            margin-top: 10px;
            text-align: center;
        }

        #checkout .item {
            padding: 5px 0;
        }

        #checkout .item-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        #checkout .item-info p {
            margin: 0;
            font-size: 14px;
        }

        #checkout .total {
            text-align: right;
            border-bottom: 1px solid #ccc;
        }

        @media (max-width: 768px) {
            #checkout .item-info p {
                flex-basis: 80%;
                margin-top: 10px;
            }
        }

        .additional-info {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .additional-info p {
            font-size: 13px;
            margin: 10px 0;
        }

        .column-left {
            flex: 0 0 60%;
            padding-right: 10px;
        }

        .column-right {
            flex: 0 0 40%;
        }

        @media (max-width: 768px) {
            .additional-info {
                flex-direction: column;
            }

            .column-right {
                margin-top: 10px;
            }
        }


        .input-group-prepend .input-group-text {
            background-color: transparent;
            border: none;
        }

        .input-group-prepend .input-group-text .fas {
            color: #8A1C14;
        }

        .input-group input[type="text"],
        .input-group input[type="tel"],
        .input-group input[type="number"],
        .input-group select {
            border-left: none;
            border-radius: 0 5px 5px 0;
            font-size: 12px;
            outline: none;
            font-family: 'Poppins', sans-serif;
        }

        .input-group-prepend {
            border: 1px solid #ced4da;
            border-right: none;
            border-radius: 5px 0 0 5px;
            display: flex;
            align-items: center;
        }

        .input-group:focus-within .input-group-prepend,
        .input-group:focus-within input {
            border-color: #8A1C14;
            border-width: 2px;
        }

        .input-group input[type="text"]:focus,
        .input-group input[type="tel"]:focus,
        .input-group input[type="number"]:focus,
        .input-group select:focus {
            border-color: #8A1C14;
            border-width: 2px;
            outline: none;
            box-shadow: none;
        }

        .terms-condi {
            margin-top: 10px;
            font-size: 12px;
            text-align: center;

            font-weight: bold;
        }

        .terms-condi a {
            color: #8A1C14;
        }
    </style>
</head>

<body>
    <header>
        @include('_header')
    </header>

    <ul id="progressbar">
        <li class="active" data-step="Cart"></li>
        <li data-step="Checkout"></li>
    </ul>


    <div class="content-wrapper">
        <div class="container">
            <fieldset id="cart" class="active">
                <div class="fieldset-header">
                    <h2>My Cart ({{ $cartItemCount }})</h2>
                    <button class="clear-cart-button" onclick="clearCart()">Clear Cart</button>
                </div>
                @if ($cartItemCount > 0)
                    @foreach ($cartItems as $item)
                        <div class="item">
                            <img src="{{ asset('storage/menu/' . $item->menu_picture) }}" alt="{{ $item->menu_name }}">
                            <div class="item-info">
                                <h3>{{ $item->menu_name }}</h3>
                                <div class="item-info-row">
                                    <p>Toast: {{ $item->toast }}</p>
                                    <p>Quantity: {{ $item->quantity }}</p>
                                </div>
                                <p class="amount">Total: ₱{{ $item->quantity * $item->menu_price }}</p>
                            </div>
                            <div class="item-actions">
                                <i class="fas fa-trash remove-icon" onclick="removeItem({{ $item->cart_item_id }})"></i>
                            </div>
                        </div>
                    @endforeach
                    <div class="total">
                        <p class="total-amount">Order Total: ₱{{ $totalAmount }}</p>
                    </div>

                    <div class="button-group">
                        <button class="button button-back"
                            onclick="window.location.href='{{ route('back.customer.home') }}';">BACK</button>
                        <button class="button button-place-order" onclick="goToCheckout()">CHECKOUT</button>
                    </div>
                @else
                    <p class="empty-cart">Your cart is empty.</p>
                    <div class="button-group">
                        <button class="button button-back"
                            onclick="window.location.href='{{ route('back.customer.home') }}';">BACK</button>
                    </div>
                @endif
            </fieldset>

            <fieldset id="checkout">
                <div class="fieldset-header">
                    <h2>Checkout</h2>
                </div>
                <div class="checkout-text">Order Summary</div>
                @foreach ($cartItems as $item)
                    <div class="item">
                        <div class="item-info">
                            <p>{{ $item->quantity }} - {{ $item->menu_name }} [{{ $item->toast }}]</p>
                            <p>₱{{ $item->quantity * $item->menu_price }}</p>
                        </div>
                    </div>
                @endforeach
                <div class="total">
                    <p class="total-amount">Order Total: ₱{{ $totalAmount }}</p>
                </div>
                <form method="POST" action="{{ route('place.order') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="checkout-text">Other Information</div>
                    <div class="additional-info">
                        <div class="column-left">
                            <p>Name: <b> {{ $customer->customer_name }} </b></p>
                            <p>Email: <b> {{ $customer->user_email }}</b></p>
                            <p>Store: <b> {{ $reseller->store_name }}</b></p>
                            <p>Delivery Type: <b>Pick-up</b></p>
                            <p>Payment Method: <b>Gcash</b></p>
                            <p>Gcash Name: <b>{{ $reseller->store_gcash_name }} </b></p>
                            <p>Gcash Number: <b>{{ $reseller->store_gcash_number }} </b></p>
                        </div>
                        <div class="column-right">
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="tel" class="form-control" id="gcashNumber" name="gcashNumber"
                                        placeholder="Gcash Number" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="gcashName" name="gcashName"
                                        placeholder="Gcash Name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="amountPaid" name="amountPaid"
                                        placeholder="Amount Paid" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="paymentProof" style="font-size: 12px;">Upload proof of payment:</label>
                                <input type="file" style="font-size: 12px;" class="form-control-file"
                                    id="paymentProof" name="paymentProof">
                            </div>
                        </div>
                    </div>

                    <div class="terms-condi">
                        By completing this order, I agree to all
                        <a href="terms_and_conditions.html" target="_blank">terms and conditions</a>.
                    </div>

                    <div class="button-group">
                        <button class="button button-back" onclick="goToCart()">BACK</button>
                        <button type="submit" class="button button-place-order">PLACE ORDER</button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
    @include('_footer')
    <script>
        function goToCart() {
            document.getElementById('checkout').classList.remove('active');
            document.getElementById('cart').classList.add('active');
            updateProgressBar(1); 
        }

        function goToCheckout() {
            document.getElementById('cart').classList.remove('active');
            document.getElementById('checkout').classList.add('active');
            updateProgressBar(2);
        }

        function updateProgressBar(step) {
            var progressBarItems = document.querySelectorAll('#progressbar li');
            progressBarItems.forEach(function(item, index) {
                if (index < step) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        }

        function removeItem(itemId) {
            axios.delete(`/api/cart/${itemId}`)
                .then(function(response) {
                    console.log(response.data.message);
                    location.reload();
                })
                .catch(function(error) {
                    console.error('Error removing item from cart:', error);
                });
        }

        function clearCart() {
            axios.delete('/api/cart')
                .then(function(response) {
                    console.log(response.data.message);
                    location.reload();
                })
                .catch(function(error) {
                    console.error('Error clearing cart:', error);
                });
        }
    </script>
</body>

</html>
