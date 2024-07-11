<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo</title>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/favicon_ico.ico')); ?>">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #F0F2F5;
        }

        .content-wrapper {
            min-height: 95vh;
        }


        .red-background,
        .white-background {
            width: 100%;
        }

        .red-background {
            flex: 1;
            background: linear-gradient(to right, #8A1C14 5%, black 70%);
            display: flex;
            flex-wrap: wrap;
        }

        .white-background {
            background-color: #F0F2F5;
            padding: 20px;
        }

        .white-background h2 {
            font-weight: bold;
            margin-bottom: 15px;
            color: #8A1C14;
            text-align: center;
            font-size: 40px;
        }

        .column {
            flex: 1;
            display: flex;
            flex-direction: column;
            color: white;
            padding: 0 10px;
            box-sizing: border-box;
        }

        .column h3 {
            font-weight: bold;
            font-size: 75px;
            margin-top: 40px;
            margin-left: 60px;
            margin-bottom: 0;
            color: #FFCC00;
            text-align: left;
        }

        .column p {
            font-size: 25px;
            margin-left: 60px;
            margin-top: 0;
            margin-bottom: 70px;
            color: white;
            text-align: left;
        }

        .home-logo {
            max-width: 50%;
            max-height: 50%;
            border-radius: 50px;
            margin-top: 40px;
            margin-bottom: 20px;
            align-self: center;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
            transition: transform 0.5s ease;
        }

        .home-logo:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.9);
        }

        .pizza-background {
            max-width: 100%;
            max-height: 100%;
            border-radius: 10px;
            margin: auto;
        }

        .buttons-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .buttons-container button {
            padding: 10px 40px;
            margin: 0 30px;
            font-size: 16px;
            cursor: pointer;
            border: 2px solid white;
            background-color: transparent;
            color: white;
            width: 150px;
        }

        .buttons-container button:hover {
            background-color: #FFCC00;
            box-shadow: 0 5px 5px black;
            transform: scale(1.02);
            color: #8A1C14;
        }

        @media only screen and (max-width: 768px) {
            .red-background {
                flex-direction: column;
            }

            .column {
                width: 100%;
                padding: 20px;
            }

            .column h3 {
                font-size: 40px;
                margin-top: 10px;
            }

            .column p {
                font-size: 15px;
                margin-bottom: 10px;
            }

            .buttons-container button {
                margin: 10px 5px;
                font-size: 12px;
                width: 125px;
            }

            .home-logo {
                max-width: 60%;
                margin-top: 20px;
                margin-bottom: 20px;
            }
        }

        .pizza-menu {
            margin-top: 50px;
            padding: 0 20px;
        }

        .menu-container {
            display: grid;
            margin: 0 auto;
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
            margin-bottom: 10px;
        }

        .menu-item p {
            margin-bottom: 5px;
            color: #666;
            font-size: 12px;
        }

        .store {
            margin-top: 20px;
            padding: 0 20px;
            margin-bottom: 50px;
        }

        .store h2 {
            font-weight: bold;
            margin-bottom: 15px;
            color: #8A1C14;
            text-align: center;
            font-size: 40px;
        }

        .store-container {
            display: grid;
            margin-left: auto;
            margin-right: auto;
            max-width: 80%;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-gap: 20px;
        }

        .store-list {
            height: 300px;
            background-color: #f9f9f9;
            border: 1px solid #DDDDDD;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .store-list h3 {
            margin-top: 0;
            color: #8A1C14;
            font-size: 20px;
            text-align: center;
            font-weight: bold;
        }

        .store-list h2 {
            margin-top: 10px;
            margin-bottom: 0;
            color: black;
            font-size: 15px;
            text-align: left;
        }

        .store-list p {
            margin-bottom: 0;
            font-size: 14px;
        }

        .view-map-button {
            margin-top: auto;
            text-align: center;
        }

        .view-map-button button {
            background-color: #8A1C14;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .view-map-button button:hover {
            background-color: #CB150F;
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
            background-color: rgba(0, 0, 0, 0.4);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #888;
            width: 90%;
            max-width: 700px;
            border-radius: 10px;
            position: relative;
        }


        .close {
            color: #8A1C14;
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .map-iframe {
            width: 100%;
            height: 500px;
            border: 0;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .store h2 {
                font-size: 30px;
            }

            .store-list h3 {
                font-size: 25px;
            }

            .store-list h2 {
                font-size: 18px;
            }

            .store-list p {
                font-size: 14px;
            }

            .view-map-button button {
                padding: 8px 16px;
            }

            .map-iframe {
                height: 300px;
            }
        }
    </style>
</head>

<body>
<div class="content-wrapper">
    <div class="red-background">
        <div class="column" data-aos="fade-right">
            <img class="home-logo" src="<?php echo e(asset('assets/home_logo.png')); ?>" alt="Logos">
            <h3>DELICIOUS, HOT AND FRESH</h3>
            <p>Craving a pizza slice of happiness? <br> Place your order now!</p>
            <div class="buttons-container">
                <a href="<?php echo e(route('customer.register')); ?>"><button>Register</button></a>
                <a href="<?php echo e(route('login')); ?>"><button>Login</button></a>
            </div>
        </div>
        <div class="column" data-aos="fade-left">
            <img class="pizza-background" src="<?php echo e(asset('assets/pizza_bg.png')); ?>" alt="Pizzas">
        </div>
    </div>
    <div class="white-background">
        <div class="pizza-menu" data-aos="fade-up">
            <h2 class="text-center">Pizza Menu</h2>
            <div class="menu-container">
                <?php
                foreach ($menuItems as $menu) {
                    echo '<div class="menu-item" data-aos="fade-up">';
                    echo '    <div class="menu-image-container">';
                    echo '        <img src="' . asset('storage/menu/' . $menu->menu_picture) . '" alt="' . $menu->menu_name . '" class="menu-image">';
                    echo '    </div>';
                    echo '    <div class="menu-details">';
                    echo '        <h3>' . $menu->menu_name . '</h3>';
                    echo '        <h1>₱' . number_format($menu->menu_price, 2) . '</h1>';
                    echo '        <p>' . $menu->menu_description . '</p>';
                    echo '    </div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="white-background">
        <div class="store">
            <h2>STORES</h2>
            <div class="store-container">
                <?php
                    $resellers = DB::table('reseller_information')
                                    ->whereIn('store_status', ['online', 'offline'])
                                    ->get();
                ?>
                <?php if($resellers->isEmpty()): ?>
                    <p>No results found</p>
                <?php else: ?>
                    <?php $__currentLoopData = $resellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reseller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="store-list">
                            <h3><?php echo e($reseller->store_name); ?></h3>
                            <h2>Address:</h2>
                            <p><?php echo e($reseller->store_street); ?>, <?php echo e($reseller->store_barangay); ?>, <?php echo e($reseller->store_city); ?>, <?php echo e($reseller->store_province); ?></p>      
                            <h2>Contact Number:</h2>
                            <p><?php echo e($reseller->reseller_number); ?></p>
                            <div class="view-map-button">
                                <button onclick="openModal('modal-<?php echo e($reseller->reseller_id); ?>')">View Map</button>
                            </div>
                            <div id="modal-<?php echo e($reseller->reseller_id); ?>" class="modal">
                                <div class="modal-content">
                                    <span class="close" onclick="closeModal('modal-<?php echo e($reseller->reseller_id); ?>')">&times;</span>
                                    <iframe class="map-iframe" src="<?php echo e($reseller->store_map); ?>" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            
            </div>
        </div>
    </div>
  </div>
</div>
    <?php echo $__env->make('_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="https://unpkg.com/aos@next/dist/aos.js">
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>

    <script>
        function openModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.style.display = "flex";
        }

        function closeModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            var modals = document.getElementsByClassName('modal');
            for (var i = 0; i < modals.length; i++) {
                var modal = modals[i];
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\pizzamatteo\resources\views/index.blade.php ENDPATH**/ ?>