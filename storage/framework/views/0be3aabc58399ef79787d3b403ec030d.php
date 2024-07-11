<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo | Stores</title>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/favicon_ico.ico')); ?>">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <link rel="stylesheet" href="path/to/bootstrap.min.css">

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



        .custom-red {
    background: linear-gradient(to right, #8A1C14 5%, black 70%);
    padding: 15px 20px;
    border: 0px;
    border-radius: 0 0 0 0;
    display: flex;
    align-items: center;
    width: 100%;
    margin: 0 auto;
    position: relative;
    height: 100px;
}

.custom-red p {
    font-size: 30px;
    color: white;
    padding: 10px;
    margin-left: 10px;
    margin: 0; 
    display: flex;
    align-items: center;
    height: 100%; 
}

.custom-red .logout {
    background-color: #b00000;
    border: none;
    color: white;
    padding: 5px 40px;
    border-radius: 50px;
    font-size: 16px;
    cursor: pointer;
    position: absolute;
    right: 20px;
}

.custom-red .logout:hover {
    background-color: #d00000;
}

.tabs-wrapper {
    max-width: 1400px;
    margin: 0 auto;
    width: 100%;
    padding: 0 30px;
    box-sizing: border-box;
    position: relative;
}

.scroll-indicator {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 16px;
    color: #8A1C14;
    padding: 5px;
    z-index: 10;
    display: none; 
}

.scroll-indicator.left {
    left: 5px; 
}

.scroll-indicator.right {
    right: 5px; 
}
.nav-tabs {
    display: flex;
    justify-content: space-between;
    flex-wrap: nowrap;
    overflow-x: auto;
    overflow-y: hidden; 
    -webkit-overflow-scrolling: touch; 
}

.nav-link {
    color: #8A1C14;
    font-family: 'Poppins', sans-serif;
    font-weight: bold;
    white-space: nowrap;
}

.nav-link.active {
    background-color: #8A1C14;
    color: white;
}

@media (max-width: 768px) {
    .scroll-indicator {
        display: block; 
    }
}

@media (min-width: 769px) {
    .nav-tabs {
        overflow: hidden; 
    }
}

.user-info {
    display: flex;
    justify-content: center; 
    flex-wrap: wrap;
    margin: 0 auto; 
    width: 80%; 
    
}

.column {
    flex: 1;
    padding: 0 10px;
}

.column ul {
    list-style: none;
    padding: 0;
}

.column h2 {
    color: #8A1C14;
    font-size: 20px;
    font-weight: bold;
    margin-top: 20px;
    margin-bottom: 10px;
}
    
.user-info h2 {
    font-size: 20px;
    color: #8A1C14;
    }
    .user-info li {
        margin-bottom: 10px;
    }


    .btn-custom {
    background-color: #8A1C14;
    border: 2px solid #8A1C14;
    color: #ffffff;
    font-family: 'Poppins', sans-serif;
    padding: 10px 80px;
    border-radius: 50px;
    transition: background-color 0.3s ease, color 0.3s ease;
    margin: 35px;
    display: inline-block;
}

.btn-custom:hover {
    background-color: #ffffff;
    color: #8A1C14;
}

.btn-custom:focus, .btn-custom:active {
    outline: none;
    box-shadow: none;
}

@media (max-width: 768px) {
    .btn-custom {
        padding: 10px 30px;
        width: 100%;
        margin: 10px 0;
        font-size: 14px;
    }
}



      #editInformation {
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
            overflow: auto;
        }

        #editInformation .modal-content {
            position: relative;
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            width: 800px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        #editInformation .modal-content h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }

        #editInformation  .modal-content form {
            display: flex;
            flex-direction: column;
        }

        #editInformation .modal-content form label {
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
            text-align: left;
        }

        #editInformation  .modal-content form input,
        #editInformation .modal-content form textarea,
        #editInformation .modal-content form button {
            padding: 11px;
            margin-bottom: 10px;
            border-radius: 12px;
            border: 1px solid #ddd;
            transition: color 0.3s ease, border-color 0.3s ease;
        }

        #editInformation .modal-content form input:hover,
        #editInformation .modal-content form textarea:hover {
            border-color: #8A1C14;
        }

        #editInformation .modal-content form button {
            background-color: #4CAF50;
            color: white;
            border-radius: 12px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        #editInformation .modal-content form button:hover {
            background-color: #45a049;
        }

        #editInformation .close-btn { /*close button style*/ 
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

        #editInformation .close-btn:hover,
        #editInformation .close-btn:focus {
            background-color: #8A1C14;
            color: #fff;
            outline: none;
        }

        /* edit and delete icons*/
        #editInformation .bx-edit,
        #editInformation  .bx-trash {
            color: #8A1C14;
            font-size: 2.1em;
            cursor: pointer;
        }

        #editInformation button {
            color: #8A1C14;
            background: none;
            border: none;
            cursor: pointer;
        }




        #changeEmail {
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

        #changeEmail .modal-content {
            position: relative;
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            width: 500px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        #changeEmail .modal-content h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }

        #changeEmail  .modal-content form {
            display: flex;
            flex-direction: column;
        }

        #changeEmail .modal-content form label {
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
            text-align: left;
        }

        #changeEmail  .modal-content form input,
        #changeEmail .modal-content form textarea,
        #changeEmail .modal-content form button,
        #changeEmail .modal-content form select {
            padding: 11px;
            margin-bottom: 10px;
            border-radius: 12px;
            border: 1px solid #ddd;
            transition: color 0.3s ease, border-color 0.3s ease;
        }

        #changeEmail .modal-content form input:hover,
        #changeEmail .modal-content form textarea:hover,
        #changeEmail .modal-content form select:hover {
            border-color: #8A1C14;
        }

        #changeEmail .modal-content form button {
            background-color: #4CAF50;
            color: white;
            border-radius: 12px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        #changeEmail .modal-content form button:hover {
            background-color: #45a049;
        }

        #changeEmail .close-btn { /*close button style*/ 
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

        #changeEmail .close-btn:hover,
        #changeEmail .close-btn:focus {
            background-color: #8A1C14;
            color: #fff;
            outline: none;
        }


        #changeEmail button {
            color: #8A1C14;
            background: none;
            border: none;
            cursor: pointer;
        }


        



        #changePassword {
            display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
        }

        #changePassword .modal-content {
            background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
    max-width: 500px; /* Maximum width */
    border-radius: 10px; /* Rounded corners */
        }

        #changePassword .modal-content h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }

        #changePassword  .modal-content form {
            display: flex;
            flex-direction: column;
        }

        #changePassword .modal-content form label {
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
            text-align: left;
        }

        #changePassword  .modal-content form input,
        #changePassword .modal-content form textarea,
        #changePassword .modal-content form button {
            padding: 11px;
            margin-bottom: 10px;
            border-radius: 12px;
            border: 1px solid #ddd;
            transition: color 0.3s ease, border-color 0.3s ease;
        }

        #changePassword .modal-content form input:hover,
        #changePassword .modal-content form textarea:hover {
            border-color: #8A1C14;
        }

        #changePassword .modal-content form button {
            background-color: #4CAF50;
            color: white;
            border-radius: 12px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        #changePassword .modal-content form button:hover {
            background-color: #45a049;
        }

        #changePassword .close-btn { /*close button style*/ 
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

        #changePassword .close-btn:hover,
        #changePassword .close-btn:focus {
            background-color: #8A1C14;
            color: #fff;
            outline: none;
        }

        /* edit and delete icons*/
        #changePassword .bx-edit,
        #changePassword  .bx-trash {
            color: #8A1C14;
            font-size: 2.1em;
            cursor: pointer;
        }

        #changePassword button {
            color: #8A1C14;
            background: none;
            border: none;
            cursor: pointer;
        }




        

        .custom-card {
            margin: 0 15px; /* Adjust this value for horizontal spacing */
        }

        .modal-header .modal-title {
            font-weight: bold;
        }

        .modal-body .card-text {
            margin: 0;
        }

        .modal-body hr {
            margin: 1rem 0;
        }

        .modal-footer .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        @media (max-width: 767.98px) {
            .custom-card {
                margin: 15px 0; /* Adjust this value for vertical spacing on smaller screens */
            }
        }




        .modal  {
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
    overflow-y: auto; /* Enable vertical scrolling */
}

.modal-content {
    position: relative;
    background-color: #fefefe;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px; /* Adjust maximum width as needed */
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    max-height: 80%; /* Maximum height for scroll */
    overflow: auto; /* Enable content scrolling */
}

.modal-content h2 {
    text-align: center;
    font-weight: bold;
    margin-bottom: 10px;
}

.summary-section {
    text-align: center;
    margin-bottom: 10px;
}

.flex-container {
    display: flex;
}

.flex-container .left-side {
    flex: 2;
    text-align: left;
}

.flex-container .right-side {
    flex: 1;
    text-align: right;
}
.divider {
    margin: 5px 0;
}

.section-heading {
    text-align: center;
}

.modal-body {
    /* Styles for other information content */
}

.additional-text {
    text-align: left;
    margin-top: 0;
}

.image-container {
    text-align: center;
    margin-top: 20px;
}

.image-container img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
}

.close-btn {
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

.close-btn:hover,
.close-btn:focus {
    background-color: #8A1C14;
    color: #fff;
    outline: none;
}

 button {
    color: #8A1C14;
    background: none;
    border: none;
    cursor: pointer;
}



#refundmodal {
    display: none; /* Hide modal by default */
    position: fixed; /* Fixed position to overlay content */
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    z-index: 1000; /* Ensure modal is above other content */
    overflow: auto; /* Allow scrolling if content exceeds viewport */
    padding-top: 50px; /* Space from top for close button */
}

/* Modal content */
#refundmodal .modal-content {
    background-color: #fefefe;
    margin: auto; /* Center modal on screen */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Adjust width as needed */
    max-width: 600px; /* Maximum width for larger screens */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Close button */
#refundmodal .close-btn {
    position: absolute;
    top: 20px;
    right: 30px;
    font-size: 30px;
    cursor: pointer;
    color: #aaa;
}

#refundmodal .close-btn:hover,
#refundmodal.close-btn:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}


    </style>
</head>

<body>
    <header>
        <?php echo $__env->make('_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>

    <div class="content-wrapper">
        <div class="custom-red">
            <p>Hi, <?php echo e($userDetails->customer_name); ?>!</p>
            <button class="btn btn-danger logout">Logout</button>
        </div>
    
        <div class="tabs-wrapper">
            <div class="scroll-indicator left" id="scroll-left">&lt;</div>
            <ul class="nav nav-tabs" id="tabs-container">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#myInformation">My Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#pending">Pending</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#completed">Completed</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#cancelled">Cancelled/Refunded</a>
                </li>
            </ul>
            <div class="scroll-indicator right" id="scroll-right">&gt;</div>
        </div>
    
        <div class="tab-content mt-4">
            <div id="myInformation" class="container tab-pane active">
                <div class="user-info">
                    <div class="column">
                        <h2>Personal Information</h2>
                        <ul>
                            <li>Name: <span id="name"><?php echo e($userDetails->customer_name); ?></span></li>
                            <li>Birthday: <span id="birthday"><?php echo e($userDetails->customer_birthday); ?></span></li>
                            <li>Gender: <span id="gender"><?php echo e($userDetails->customer_gender); ?></span></li>
                        </ul>
    
                        <h2>Location Information</h2>
                        <ul>
                            <li>Province: <span id="province"><?php echo e($userDetails->customer_province); ?></span></li>
                            <li>Store: <span id="store"><?php echo e($userDetails->store_name); ?></span></li>
                            <li>City: <span id="city"><?php echo e($userDetails->customer_city); ?></span></li>
                            <li>Barangay: <span id="barangay"><?php echo e($userDetails->customer_barangay); ?></span></li>
                            <li>Street: <span id="street"><?php echo e($userDetails->customer_street); ?></span></li>
                        </ul>
                    </div>
                    <div class="column">
                        <h2>Contact Information</h2>
                        <ul>
                            <li>Phone Number: <span id="number"><?php echo e($userDetails->customer_number); ?></span></li>
                            <li>Email: <span id="email"><?php echo e($userDetails->user_email); ?></span></li>
                        </ul>
                    </div>
                </div>
    
                <button class="btn btn-custom" onclick="openModal('editInformation')">Edit Information</button>
                <button class="btn btn-custom" onclick="openModal('changeEmail')">Change Email</button>
                <button class="btn btn-custom" onclick="openModal('changePassword')">Change Password</button>
            </div>
    
            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                <div class="container">
                    <div class="row">
                        <?php $__currentLoopData = $customerOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($order->order_status == 'Pending' || $order->order_status == 'Preparing' || $order->order_status == 'Ready for pickup'): ?>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <div class="card custom-card">
                                        <div class="card-body">
                                            <div class="text-center mb-3">
                                                <h5 class="card-title">Order ID #<?php echo e($order->order_id); ?></h5>
                                            </div>
                                            <div class="d-flex justify-content-center mb-3">
                                                <button class="btn btn-warning" onclick="openModal('orderDetailsPending<?php echo e($order->order_id); ?>')">View Order</button>
                                            </div>
                                            <div class="text-center mb-3">
                                                <p class="card-text">Status: <?php echo e($order->order_status); ?></p>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <?php if($order->order_status == 'Preparing' || $order->order_status == 'Pending'): ?>
                                                    <button class="btn btn-danger btn-sm" disabled>Order Received</button>
                                                <?php elseif($order->order_status == 'Ready for pickup'): ?>
                                                    <button class="btn btn-danger btn-sm" data-order-id="<?php echo e($order->order_id); ?>" onclick="markOrderReceived('<?php echo e($order->order_id); ?>')">Order Received</button>
                                                    <button class="btn btn-secondary btn-sm ml-2" onclick="openModal('refundModal<?php echo e($order->order_id); ?>')">Request Refund</button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <!-- Modal for Pending Order Details -->
                                <div class="modal" id="orderDetailsPending<?php echo e($order->order_id); ?>" style="display: none;">
                                    <div class="modal-content">
                                        <span class="close-btn" onclick="closeModal('orderDetailsPending<?php echo e($order->order_id); ?>')">&times;</span>
                                        <h2 id="orderID">Order ID #<?php echo e($order->order_id); ?></h2>
                                        <div class="summary-section">
                                            <p>Order Summary</p>
                                        </div>
                                        <?php
                                            $totalAmount = 0;
                                        ?>
                                        <?php $__currentLoopData = $orderInformation->where('order_id', $order->order_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="flex-container">
                                                <div class="left-side">
                                                    <p><?php echo e($info->quantity); ?> - <?php echo e($info->menu_name); ?> - [toast]</p>
                                                </div>
                                                <div class="right-side">
                                                    <p>₱<?php echo e($info->amount); ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
                                        <p style="text-align: right;">Order Total: ₱<?php echo e($order->order_total_amount); ?></p>
                                        <hr class="divider">
                                        <div class="modal-body">
                                            <p class="section-heading">Other Information</p>
                                            <p>Name: <?php echo e($order->customer_name); ?></p>
                                            <p>Store: <?php echo e($order->store_name); ?></p>
                                            <p>Purchase Type: <?php echo e($order->purchase_type); ?></p>
                                            <p>Payment Method: <?php echo e($order->payment_type); ?></p>
                                            <p>Amount Paid: <?php echo e($order->amount_paid); ?></p>
                                            <p>Gcash Name: <?php echo e($order->gcash_name); ?></p>
                                            <p>Gcash Number: <?php echo e($order->gcash_number); ?></p>
                                        </div>
                                        <div class="image-container">
                                            <img src="<?php echo e(asset('storage/' . $order->payment_proof)); ?>" alt="Payment Proof">
                                        </div>
                                    </div>
                                </div>
            
                                <!-- Refund Modal -->
                 <!-- Refund Modal -->
                 <div class="modal" id="refundModal<?php echo e($order->order_id); ?>" style="display: none;">
                    <div class="modal-content">
                        <span class="close-btn" onclick="closeModal('refundModal<?php echo e($order->order_id); ?>')">&times;</span>
                        <h2>Request Refund for Order ID #<?php echo e($order->order_id); ?></h2>
                
                        <form action="<?php echo e(route('refund.submit')); ?>" method="POST" enctype="multipart/form-data" class="refund-form">
                            <?php echo csrf_field(); ?>
                
                            <div class="form-group">
                                <label>Select Menu Items to Refund</label><br>
                                <?php $__currentLoopData = $orderInformation->where('order_id', $order->order_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check">
                                        <input class="form-check-input refund-checkbox" type="checkbox" name="refund_items[]" value="<?php echo e($info->menu_id); ?>">
                                        <label class="form-check-label">
                                            <?php echo e($info->menu_name); ?> - Quantity: <?php echo e($info->quantity); ?> - Amount: ₱<?php echo e($info->amount); ?>

                                        </label>
                                        <!-- Hidden inputs to capture quantity and amount -->
                                        <input type="hidden" name="refund_menu_ids[]" value="<?php echo e($info->menu_id); ?>">
                                        <input type="hidden" name="refund_amounts[]" value="<?php echo e($info->amount); ?>">
                                        <input type="number" class="form-control refund-quantity" name="refund_quantities[]" data-max="<?php echo e($info->quantity); ?>" placeholder="Quantity" min="1" max="<?php echo e($info->quantity); ?>">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                
                            <div class="form-group">
                                <label for="total_refund_amount">Total Refund Amount</label>
                                <input type="text" class="form-control total-refund-amount" name="total_refund_amount" readonly>
                            </div>
                
                            <div class="form-group">
                                <label for="reason">Reason for Refund</label>
                                <select class="form-control" id="reason" name="refund_reason" required>
                                    <option value="">Select Reason</option>
                                    <option value="Wrong Item">Wrong Item Received</option>
                                    <option value="Quality Issue">Quality Issue</option>
                                    <option value="Late Delivery">Late Delivery</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                
                            <div class="form-group">
                                <label for="refund_name">Recipient's Name</label>
                                <input type="text" class="form-control" id="refund_name" name="refund_name" placeholder="Recipient's Name" required>
                            </div>
                
                            <div class="form-group">
                                <label for="refund_number">Recipient's Contact Number</label>
                                <input type="text" class="form-control" id="refund_number" name="refund_number" placeholder="Recipient's Contact Number" required>
                            </div>
                
                            <div class="form-group">
                                <label for="refund_proof">Upload Proof (Optional)</label>
                                <input type="file" class="form-control-file" id="refund_proof" name="refund_proof">
                            </div>
                
                            <div class="form-group">
                                <label for="refund_description">Additional Description (Optional)</label>
                                <textarea class="form-control" id="refund_description" name="refund_description" rows="3"></textarea>
                            </div>
                
                            <button type="submit" class="btn btn-primary">Submit Refund Request</button>
                        </form>
                    </div>
                </div>

                               
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                <div class="container">
                    <div class="row">
                        <?php $__currentLoopData = $customerOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($order->order_status == 'Completed'): ?>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <div class="card custom-card">
                                        <div class="card-body">
                                            <div class="text-center mb-3">
                                                <h5 class="card-title">Order ID #<?php echo e($order->order_id); ?></h5>
                                            </div>
                                            <div class="d-flex justify-content-center mb-3">
                                                <button class="btn btn-warning" onclick="openModal('orderDetailsCompleted<?php echo e($order->order_id); ?>')">View Order</button>
                                            </div>
                                            <div class="text-center mb-3">
                                                <p class="card-text">Status:<?php echo e($order->order_status); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <!-- Modal for Completed Order Details -->
                                <div class="modal" id="orderDetailsCompleted<?php echo e($order->order_id); ?>" style="display: none;">
                                    <div class="modal-content">
                                        <span class="close-btn" onclick="closeModal('orderDetailsCompleted<?php echo e($order->order_id); ?>')">&times;</span>
                                        <h2 id="orderID">Order ID #<?php echo e($order->order_id); ?></h2>
                                        <div class="summary-section">
                                            <p>Order Summary</p>
                                        </div>
                                        <?php
                                            $totalAmount = 0;
                                        ?>
                                        <?php $__currentLoopData = $orderInformation->where('order_id', $order->order_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="flex-container">
                                                <div class="left-side">
                                                    <p><?php echo e($info->quantity); ?> - <?php echo e($info->menu_name); ?> - [toast]</p>
                                                </div>
                                                <div class="right-side">
                                                    <p>₱<?php echo e($info->amount); ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                        <p style="text-align: right;">Order Total: ₱<?php echo e($order->order_total_amount); ?></p>
                                        <hr class="divider">
                                        <div class="modal-body">
                                            <p class="section-heading">Other Information</p>
                                            <p>Name: <?php echo e($order->customer_name); ?></p>
                                            <p>Store: <?php echo e($order->store_name); ?></p>
                                            <p>Purchase Type: <?php echo e($order->purchase_type); ?></p>
                                            <p>Payment Method: <?php echo e($order->payment_type); ?></p>
                                            <p>Amount Paid: <?php echo e($order->amount_paid); ?></p>
                                            <p>Gcash Name: <?php echo e($order->gcash_name); ?></p>
                                            <p>Gcash Number: <?php echo e($order->gcash_number); ?></p>
                                        </div>
                                        <div class="image-container">
                                            <img src="<?php echo e(asset('storage/' . $order->payment_proof)); ?>" alt="Payment Proof">
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                <div class="container">
                    <div class="row">
                        <?php $__currentLoopData = $customerOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($order->order_status == 'Cancelled' || $order->order_status == 'Refunded'): ?>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <div class="card custom-card">
                                        <div class="card-body">
                                            <div class="text-center mb-3">
                                                <h5 class="card-title">Order ID #<?php echo e($order->order_id); ?></h5>
                                            </div>
                                            <div class="d-flex justify-content-center mb-3">
                                                <button class="btn btn-warning" onclick="openModal('orderDetailsCancelled<?php echo e($order->order_id); ?>')">View Order</button>
                                            </div>
                                            <div class="text-center mb-3">
                                                <p class="card-text">Status: <?php echo e($order->order_status); ?></p>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-danger btn-sm">Order Received</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <!-- Modal for Cancelled or Refunded Order Details -->
                                <div class="modal" id="orderDetailsCancelled<?php echo e($order->order_id); ?>" style="display: none;">
                                    <div class="modal-content">
                                        <span class="close-btn" onclick="closeModal('orderDetailsCancelled<?php echo e($order->order_id); ?>')">&times;</span>
                                        <h2 id="orderID">Order ID #<?php echo e($order->order_id); ?></h2>
                                        <div class="summary-section">
                                            <p>Order Summary</p>
                                        </div>
                                        <?php
                                            $totalAmount = 0;
                                        ?>
                                        <?php $__currentLoopData = $orderInformation->where('order_id', $order->order_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="flex-container">
                                                <div class="left-side">
                                                    <p><?php echo e($info->quantity); ?> - <?php echo e($info->menu_name); ?> - [toast]</p>
                                                </div>
                                                <div class="right-side">
                                                    <p>₱<?php echo e($info->amount); ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                        <p style="text-align: right;">Order Total: ₱<?php echo e($order->order_total_amount); ?></p>
                                        <hr class="divider">
                                        <div class="modal-body">
                                            <p class="section-heading">Other Information</p>
                                            <p>Name: <?php echo e($order->customer_name); ?></p>
                                            <p>Store: <?php echo e($order->store_name); ?></p>
                                            <p>Purchase Type: <?php echo e($order->purchase_type); ?></p>
                                            <p>Payment Method: <?php echo e($order->payment_type); ?></p>
                                            <p>Amount Paid: <?php echo e($order->amount_paid); ?></p>
                                            <p>Gcash Name: <?php echo e($order->gcash_name); ?></p>
                                            <p>Gcash Number: <?php echo e($order->gcash_number); ?></p>
                                        </div>
                                        <div class="image-container">
                                            <img src="<?php echo e(asset('storage/' . $order->payment_proof)); ?>" alt="Payment Proof">
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

            
            <div class="modal" id="refundModal<?php echo e($order->order_id); ?>" style="display: none;">
                <div class="modal-content">
                    <span class="close-btn" onclick="closeModal('refundModal<?php echo e($order->order_id); ?>')">&times;</span>
                    <h2 id="refundID">Refund Request for Order ID #<?php echo e($order->order_id); ?></h2>
                    <div class="refund-form">
                        <!-- Include your refund request form here -->
                        <form action="<?php echo e(route('refund.submit')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="reason">Reason for Refund</label>
                                <textarea class="form-control" id="reason" name="refund_reason" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Refund Request</button>
                        </form>
                    </div>
                </div>
            </div>





<div class="modal" id="editInformation" style="display: none;">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('editInformation')">&times;</span>
        <h2>EDIT INFORMATION</h2>
        <form action="<?php echo e(route('update.user')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="editName">Name</label>
                        <input type="text" class="form-control" id="editName" name="customer_name" value="<?php echo e($userDetails->customer_name); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="editGender">Gender</label>
                        <input type="text" class="form-control" id="editGender" name="customer_gender" value="<?php echo e($userDetails->customer_gender); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="editBirthday">Birthday</label>
                        <input type="date" class="form-control" id="editBirthday" name="customer_birthday" value="<?php echo e($userDetails->customer_birthday); ?>">
                    </div>
                </div>
            </div>          
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="editProvince">Province</label>
                        <select class="form-control" id="editProvince" name="customer_province" onchange="updateStores()" required>
                            <option value="" disabled>Select Province</option>
                            <?php $__currentLoopData = $province; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storeProvince): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($storeProvince); ?>" <?php if($storeProvince == $userDetails->customer_province): ?> selected <?php endif; ?>>
                                    <?php echo e($storeProvince); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="editStore">Store</label>
                        <select class="form-control" id="editStore" name="customer_store" required>
                            <option value="" disabled>Select Store</option>
                            <?php $__currentLoopData = $store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($s->store_province == $userDetails->customer_province): ?>
                                    <option value="<?php echo e($s->reseller_id); ?>" <?php if($s->reseller_id == $userDetails->customer_store): ?> selected <?php endif; ?>>
                                        <?php echo e($s->store_name); ?>

                                    </option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="editCity">City</label>
                        <input type="text" class="form-control" id="editCity" name="customer_city" value="<?php echo e($userDetails->customer_city); ?>">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="editBarangay">Barangay</label>
                        <input type="text" class="form-control" id="editBarangay" name="customer_barangay" value="<?php echo e($userDetails->customer_barangay); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="editStreet">Street</label>
                        <input type="text" class="form-control" id="editStreet" name="customer_street" value="<?php echo e($userDetails->customer_street); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="editNumber">Phone Number</label>
                        <input type="text" class="form-control" id="editNumber" name="customer_number" value="<?php echo e($userDetails->customer_number); ?>">
                    </div>
                </div>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>





<div class="modal" id="changeEmail" style="display: none;">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('changeEmail')">&times;</span>
        <h2>Change Email</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
        <div class="modal-body">
            <div class="form-group">
                <label for="newEmail">New Email</label>
                <input type="email" class="form-control" id="newEmail" value="">
                
            </div>
        </div>
            <button type="button" onclick="verifyAndSaveEmail()">Update</button>
        </form>
        </div>
    </div>
</div>

<div class="modal" id="changePassword" style="display: <?php echo e($errors->any() ? 'block' : 'none'); ?>;">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('changePassword')">&times;</span>
        <h2>Change Password</h2>
        <form action="<?php echo e(route('update.password')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="currentPassword">Current Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="currentPassword" name="current_password" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary toggle-password" onclick="togglePasswordVisibility('currentPassword')">
                                <i class="fa fa-eye" id="currentPasswordToggle"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="newPassword" name="new_password" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary toggle-password" onclick="togglePasswordVisibility('newPassword')">
                                <i class="fa fa-eye" id="newPasswordToggle"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmNewPassword">Confirm New Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="confirmNewPassword" name="new_password_confirmation" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary toggle-password" onclick="togglePasswordVisibility('confirmNewPassword')">
                                <i class="fa fa-eye" id="confirmNewPasswordToggle"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>






<?php if(session('success')): ?>
    <!-- Modal for Success Message -->
    <div class="modal show" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

</div>

    <script>
    $(document).ready(function() {
        // Event listener for changes in refund quantities
        $('.refund-quantity').change(function() {
            calculateTotalRefundAmount($(this).closest('.modal-content'));
        });

        // Function to calculate total refund amount for a specific modal
        function calculateTotalRefundAmount(modalContent) {
            var totalAmount = 0;

            // Iterate through each refund quantity input within the specific modal
            $(modalContent).find('.refund-quantity').each(function() {
                var quantity = parseInt($(this).val()); // Get quantity value
                var amount = parseFloat($(this).siblings('input[name="refund_amounts[]"]').val()); // Get amount value

                // Check if quantity and amount are valid numbers
                if (!isNaN(quantity) && !isNaN(amount)) {
                    // Calculate subtotal for this item
                    var subtotal = quantity * amount;

                    // Add subtotal to total amount
                    totalAmount += subtotal;
                }
            });

            // Update the total refund amount input field within the modal
            $(modalContent).find('.total-refund-amount').val('₱' + totalAmount.toFixed(2));
        }
    });





$(document).ready(function() {
            $('.btn-danger').on('click', function() {
                var orderId = $(this).data('order-id');
                updateOrderStatus(orderId, 'Completed'); 
            });

            function updateOrderStatus(orderId, status) {
                if (confirm("Are you sure you want to update the order status?")) {
                    $.ajax({
                        url: "<?php echo e(route('update.customer.order.status')); ?>",
                        type: 'POST',
                        data: {
                            _token: '<?php echo e(csrf_token()); ?>',
                            orderId: orderId,
                            status: status
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response); // Log the response
                            alert(response.message); 
                            // Optionally, refresh the page or update the UI to reflect the change
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('Error updating order status. Please try again.');
                        }
                    });
                }
            }
        });




function togglePasswordVisibility(fieldId) {
        var field = document.getElementById(fieldId);
        var icon = document.getElementById(fieldId + 'Toggle');
        if (field.type === 'password') {
            field.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            field.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

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

        function updateStores() {
        var province = document.getElementById('editProvince').value;
        var storeSelect = document.getElementById('editStore');
        storeSelect.innerHTML = '<option value="" disabled>Select Store</option>';

        <?php $__currentLoopData = $store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            if ("<?php echo e($s->store_province); ?>" === province) {
                addOption(storeSelect, "<?php echo e($s->store_name); ?>", "<?php echo e($s->reseller_id); ?>");
            }
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        // Optionally, reselect the current store if it matches
        var currentStore = "<?php echo e($userDetails->customer_store); ?>";
        for (var i = 0; i < storeSelect.options.length; i++) {
            if (storeSelect.options[i].value == currentStore) {
                storeSelect.options[i].selected = true;
                break;
            }
        }
    }

    function addOption(select, text, value) {
        var option = document.createElement('option');
        option.text = text;
        option.value = value;
        select.add(option);
    }

    document.addEventListener('DOMContentLoaded', function() {
        updateStores(); // Ensure stores are updated based on current province when the page loads
    });

function addOption(select, text, value) {
    var option = document.createElement('option');
    option.text = text;
    option.value = value;
    select.add(option);
}


$(document).ready(function() {
        if ($('#successModal').length > 0) {
            $('#successModal').modal('show');
            setTimeout(function() {
                $('#successModal').modal('hide');
            }, 3000); // 3000 milliseconds = 3 seconds
        }
    });

    // Optional: Close modal when user clicks outside or presses ESC key
    $('#successModal').on('hidden.bs.modal', function (e) {
        // Optional cleanup or actions after modal closes
    });
    </script>

    <?php echo $__env->make('_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\pizzamatteo\resources\views/customer_profile.blade.php ENDPATH**/ ?>