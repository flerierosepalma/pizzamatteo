<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo | Register</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon_ico.ico">
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
            width: 800px;
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
            align-items: center;
            justify-content: space-between;
        }

        .header .back-button {
            margin-left: 20px;
            color: #8A1C14;
            font-weight: bold;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        .header .logo-container {
            display: flex;
            justify-content: center;
            flex-grow: 1;
        }

        .header .logo-container img {
            max-height: 50px;
            object-fit: contain;
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

        .input-group input[type="email"],
        .input-group input[type="password"],
        .input-group input[type="text"],
        .input-group input[type="tel"],
        .input-group input[type="date"],
        .input-group select {
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

        .input-group input[type="email"]:focus,
        .input-group input[type="password"]:focus,
        .input-group input[type="text"]:focus,
        .input-group input[type="tel"]:focus,
        .input-group input[type="date"]:focus,
        .input-group select:focus {
            border-color: #8A1C14;
            border-width: 2px;
            outline: none;
            box-shadow: none;
        }

        .divider {
            text-align: center;
            margin: 10px 0;
        }

        .divider:before,
        .divider:after {
            content: '';
            display: inline-block;
            width: 30%;
            height: 1px;
            background-color: #ced4da;
            vertical-align: middle;
            margin: 0 10px;
        }

        .login-link {
            color: #8A1C14;
            font-family: 'Poppins', sans-serif;
        }

        .login-link:hover,
        .forgot-password a:hover,
        .back-button:hover {
            color: #CB150F;
        }

        .back-button {
            display: flex;
            align-items: center;
        }

        .back-button .fa-chevron-left {
            margin-right: 5px;
        }

        .input-group {
            position: relative;
        }

        .eye-toggle {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 100;
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
                <h3 class="text-center"><strong>REGISTER</strong></h3>
                <p class="text-center text-muted mb-2">Create your account</p>
                <form action="<?php echo e(route('customer.register.post')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="customerName" name="customerName"
                                    placeholder="Name" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                </div>
                                <select class="custom-select form-control" id="gender" name="gender" required>
                                    <option value=""disabled selected>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                                </div>
                                <input type="date" class="form-control" id="birthday" name="birthday"
                                    placeholder="Birthday" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <select class="custom-select form-control" id="province" name="province"
                                    onchange="updateStores()" required>
                                    <option value="" disabled selected>Select Province</option>
                                    <?php $__currentLoopData = $province; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storeProvince): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($storeProvince); ?>"><?php echo e($storeProvince); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                </div>
                                <select class="custom-select form-control" id="store" name="store" required>
                                    <option value=""disabled selected>Select Store</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-city"></i></span>
                                </div>
                                <input type="text" class="form-control" id="city" name="city"
                                    placeholder="City" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-road"></i></span>
                                </div>
                                <input type="text" class="form-control" id="barangay" name="barangay"
                                    placeholder="Barangay" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-road"></i></span>
                                </div>
                                <input type="text" class="form-control" id="street" name="street"
                                    placeholder="Street Name" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    placeholder="Phone Number" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email address" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" required>
                                <span class="eye-toggle" id="togglePassword" data-input="password">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" id="confirm-password"
                                    name="password_confirmation" placeholder="Confirm Password" required>
                                <span class="eye-toggle" id="toggleConfirmPassword" data-input="confirm-password">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-custom btn-block">REGISTER</button>
                    <div class="divider">or</div>
                    <p class="text-center mb-0">Already have an account? <a href="<?php echo e(route('login')); ?>"
                         class="login-link"><strong>Login</strong></a></p>
                </form>
            </div>
        </div>
    </div>

    <?php echo $__env->make('_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

            function togglePasswordVisibility(event) {
                const input = document.getElementById(event.currentTarget.getAttribute('data-input'));
                const icon = event.currentTarget.querySelector('i');
                const isPasswordVisible = input.type === 'password';
                input.type = isPasswordVisible ? 'text' : 'password';
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            }

            togglePassword.addEventListener('click', togglePasswordVisibility);
            toggleConfirmPassword.addEventListener('click', togglePasswordVisibility);
        });

        function updateStores() {
            var province = document.getElementById('province').value;
            var storeSelect = document.getElementById('store');
            storeSelect.innerHTML = '<option value="" disabled selected>Select Store</option>';
            <?php $__currentLoopData = $store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                if ("<?php echo e($store->store_province); ?>" === province) {
                    addOption(storeSelect, "<?php echo e($store->store_name); ?>", "<?php echo e($store->reseller_id); ?>");
                }
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        }

        function addOption(select, text, value) {
            var option = document.createElement('option');
            option.text = text;
            option.value = value;
            select.add(option);
        }
    </script>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\pizzamatteo\resources\views/customer_register.blade.php ENDPATH**/ ?>