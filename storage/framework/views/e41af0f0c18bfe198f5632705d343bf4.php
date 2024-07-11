<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo | Forgot Password Verification</title>
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
            width: 450px;
            margin: 20px;
            margin-top: 10px;
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
            padding-top: 80px;
            padding-bottom: 40px;
        }

        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            /* Added padding to create space from the edge */
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

        .input-group-prepend .input-group-text {
            background-color: transparent;
            border: none;
        }

        .input-group-prepend .input-group-text .fas {
            color: #8A1C14;
        }

        .input-group input[type="number"] {
            border-left: none;
            border-radius: 0 5px 5px 0;
            font-size: 14px;
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

        .input-group input[type="number"]:focus {
            border-color: #8A1C14;
            border-width: 2px;
            outline: none;
            box-shadow: none;
        }

        .resend-otp {
            color: #8A1C14;
            text-align: right;
            font-size: 12px;
        }

        .resend-otp a {
            color: #8A1C14;
            text-decoration: none;
        }

        .resend-otp a:hover {
            color: #CB150F;
        }

        h3,
        p,
        a,
        strong {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <header class="header">
        <a href="javascript:history.back()" class="back-button">
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
                <h3 class="text-center"><strong>VERIFY OTP</strong></h3>
                <p class="text-center text-muted mb-2">Please enter the OTP sent to your email address.</p>
                <form method="POST" action="<?php echo e(route('forgot.password.verify.otp')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                            </div>
                            <input type="number" class="form-control" name="otp"
                                placeholder="Enter verification code" required id="otp" oninput="maxLengthCheck(this)">
                        </div>
                    </div>
                    <p class="resend-otp"><a href="<?php echo e(route('forgot.password.resend.otp')); ?>"
                            onclick="event.preventDefault(); document.getElementById('resend-otp-form').submit();">Resend
                            OTP</a></p>
                    <input type="hidden" name="email" value="<?php echo e(session('otp_email')); ?>">
                    <button type="submit" class="btn btn-custom btn-block">VERIFY</button>
                </form>
                <form id="resend-otp-form" method="POST" action="<?php echo e(route('forgot.password.resend.otp')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="email" value="<?php echo e(session('otp_email')); ?>">
                    <br>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    <?php echo $__env->make('_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        function maxLengthCheck(input) {
            if (input.value.length > 6) {
                input.value = input.value.slice(0, 6);
            }
        }
    </script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\pizzamatteo\resources\views/forgot_password_verification.blade.php ENDPATH**/ ?>