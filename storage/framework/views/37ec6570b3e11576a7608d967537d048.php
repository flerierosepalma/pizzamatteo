<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo | Reset Password Success</title>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/favicon_ico.ico')); ?>">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
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
            background-color: white;
            box-shadow: 0 4px 2px -2px gray;
            padding: 10px 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .header img {
            max-height: 50px;
        }

        .back-button {
            position: absolute;
            left: 10px;
            color: #8A1C14;
            font-weight: bold;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        .back-button i {
            margin-right: 5px;
        }

        .back-button:hover,
        .back-button:active,
        .back-button:focus {
            color: #CB150F;
            text-decoration: none;
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
            padding-bottom: 40px;
        }

        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .text-muted {
            color: black !important;
        }

        .btn-custom {
            background-color: #8A1C14;
            border-color: #8A1C14;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .btn-custom:hover {
            background-color: #CB150F;
            border-color: #E8302A;
            color: white;
        }

        .btn-custom:focus,
        .btn-custom:active {
            box-shadow: none;
        }
    </style>
</head>

<body>
    <header class="header">
        <a href="<?php echo e(url('/')); ?>" class="back-button">
            <i class="fas fa-chevron-left"></i> Back
        </a>
        <img src="<?php echo e(asset('assets/header_logo.png')); ?>" alt="Logo">
    </header>

    <div class="content-wrapper">
        <div class="main-content bg">
            <div class="container-form">
                <div class="user-icon">
                    <i class="fas fa-user fa-3x"></i>
                </div>
                <h3 class="text-center"><strong>PASSWORD SUCCESSFULLY CHANGED</strong></h3>
                <p class="text-center text-muted mb-2">Your password has been updated successfully.</p>
                <a href="<?php echo e(route('login')); ?>" class="btn btn-custom btn-block">LOGIN</a>
            </div>
        </div>
    </div>
    <?php echo $__env->make('_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\pizzamatteo\resources\views/password_success.blade.php ENDPATH**/ ?>