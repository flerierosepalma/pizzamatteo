<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo | Register Verification</title>
    <link rel="icon" type="image/x-icon" href="https://scontent.fmnl4-7.fna.fbcdn.net/v/t1.15752-9/448200191_474132475099478_6596455881542556957_n.png?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_ohc=b4tF4OnvpwMQ7kNvgFrieEp&_nc_ht=scontent.fmnl4-7.fna&oh=03_Q7cD1QFjIEijnlQPvClN4SA7vvEb1V_1qxCAS2tnpsKMeMWxhg&oe=669489EE">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #8A1C14 5%, black 70%);
            color: black;
        }

        .bg {
            background-size: cover;
            background-position: center;
            flex: 1;
        }

        
        .container-form {
            width: 500px;
            margin: 20px;
            margin-bottom: 50px;
            padding: 50px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }


        .header {
            background: linear-gradient(to right, #8A1C14 5%, black 70%);
            box-shadow: 0 4px 2px -2px gray;
            padding: 10px 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white; /* Ensure text color is white */
        }

        .header .back-button {
            margin-left: 20px;
            color: white;
            font-weight: bold;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        .header .logo-container {
            background-color: rgba(255, 255, 255, 0.9); /* Lighter background color */
            padding: 10px; /* Add padding around the logo */
            border-radius: 35px; /* Rounded corners */
            display: inline-block; /* Ensure the container fits tightly around the content */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Optional: add a subtle shadow */
        }


        .header .logo-container img {
            max-height: 50px;
            object-fit: contain;
            display: block; /* Ensure the image fits within the container */
        }
        
        .header .empty-space {
            width: 64px;
        }

        .user-icon {
            position: absolute;
            top: -35px;
            left: 50%;
            transform: translateX(-50%);
            background: #8A1C14;
            border-radius: 50%;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: white;
        }

        .content-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 95vh;
            padding-top: 80px;
            padding-bottom: 40px;
        }

        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .text-muted {
            color: black !important;
        }

        .btn-custom {
            background: linear-gradient(to right, #8A1C14 5%, black 70%);
            border: none;
            color: white;
            font-family: 'Poppins', sans-serif;
        }


        .btn-custom:hover {
            background: linear-gradient(to right, #CB150F 5%, black 70%);
            border: none;
            color: white;
        }

        .btn-custom:focus,
        .btn-custom:active {
            box-shadow: none;
        }


        .back-button:hover {
            color: #FFCC00;
        }

        .back-button {
            display: flex;
            align-items: center;
        }

        .back-button .fa-chevron-left {
            margin-right: 5px;
        }


    </style>
</head>

<body>
    <header class="header">
        <a href="<?php echo e(url('/')); ?>" class="back-button">
            <i class="fas fa-chevron-left"></i> Back </a>
        <div class="logo-container">
            <img src="<?php echo e(asset('assets/header_logo.png')); ?>" alt="Logo">
        </div>
        <div class="empty-space"></div>
    </header>

    <div class="content-wrapper">
        <div class="main-content bg">
            <div class="container-form">
                <div class="user-icon">
                    <i class="fas fa-user fa-3x"></i>
                </div>
                <h3 class="text-center"><strong>REGISTRATION SUCCESSFUL</strong></h3>
                <p class="text-center text-muted mb-2">Reseller's account has been created successfully.</p>
                <a href="<?php echo e(route('login')); ?>" class="btn btn-custom btn-block">LOGIN</a>
            </div>
        </div>
    </div>
    <?php echo $__env->make('_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\pizzamatteo\resources\views/owner_register_success.blade.php ENDPATH**/ ?>