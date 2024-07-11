<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo | Stores</title>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/favicon_ico.ico')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
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
        }

        .store-list h2 {
            margin-top: 0;
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
        }

        .close {
            color: #8A1C14;
            float: right;
            font-size: 28px;
            font-weight: bold;
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
    <header>
        <?php echo $__env->make('_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>

    <div class="content-wrapper">
    <div class="store">
        <h2>STORES</h2>
        <div class="store-container">
            <?php
                $resellers = DB::table('reseller_information')->get();
            ?>
            <?php if($resellers->isEmpty()): ?>
                <p>No results found</p>
            <?php else: ?>
                <?php $__currentLoopData = $resellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reseller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="store-list">
                        <h3><?php echo e($reseller->store_name); ?></h3>
                        <h2>Address:</h2>
                        <p><?php echo e($reseller->store_barangay); ?><?php echo e($reseller->store_street); ?></p>
                        <h2>Contact Number:</h2>
                        <p><?php echo e($reseller->reseller_number); ?></p>
                        <div class="view-map-button">
                            <button onclick="openModal('modal-<?php echo e($reseller->reseller_id); ?>')">View Map</button>
                        </div>
                        <div id="modal-<?php echo e($reseller->reseller_id); ?>" class="modal">
                            <div class="modal-content">
                                <span class="close"
                                    onclick="closeModal('modal-<?php echo e($reseller->reseller_id); ?>')">&times;</span>
                                <iframe class="map-iframe" src="<?php echo e($reseller->store_map); ?>" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

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

    <?php echo $__env->make('_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\pizzamatteo\resources\views/store.blade.php ENDPATH**/ ?>