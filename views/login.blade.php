<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo | Login</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon_ico.ico') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #F0F2F5;
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
            justify-content: space-between;
            align-items: center;
        }

        .header img {
            max-height: 50px;
        }

        .header .empty-space {
            width: 64px;
        }

        .header .back-button {
            margin-left: 20px;
            color: #8A1C14;
            font-weight: bold;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
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
        .input-group select:focus {
            border-color: #8A1C14;
            border-width: 2px;
            outline: none;
            box-shadow: none;
        }

        .forgot-password {
            color: #8A1C14;
            text-align: right;
            font-size: 12px;
        }

        .forgot-password a {
            color: #8A1C14;
            text-decoration: none;
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

        .register-link {
            color: #8A1C14;
            font-family: 'Poppins', sans-serif;
        }

        .register-link:hover,
        .forgot-password a:hover,
        .back-button:hover {
            color: #CB150F;
        }

        h3,
        p,
        a,
        strong {
            font-family: 'Poppins', sans-serif;
        }

        .back-button {
            display: flex;
            align-items: center;
        }

        .back-button .fa-chevron-left {
            margin-right: 5px;
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
        <a href="{{ url('/') }}" class="back-button">
            <i class="fas fa-chevron-left"></i> Back
        </a>
        <div class="container text-center">
            <img src="{{ asset('assets/header_logo.png') }}" alt="Logo">
        </div>
        <div class="empty-space"></div>
    </header>
    <div class="content-wrapper">
        <div class="main-content bg">
            <div class="container-form">
                <div class="user-icon">
                    <i class="fas fa-user fa-3x"></i>
                </div>
                <h3 class="text-center"><strong>LOGIN</strong></h3>
                <p class="text-center text-muted mb-2">Welcome back!</p>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" id="email" name="email"
                                aria-describedby="emailHelp" placeholder="Email address" required>
                        </div>
                    </div>
                    <div class="form-group">
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
                    <p class="forgot-password"><a href="{{ route('forgot.password') }}">Forgot password?</a></p>
                    <button type="submit" class="btn btn-custom btn-block">LOGIN</button>
                    <div class="divider">or</div>
                    <p class="text-center mb-0">Don’t have an account? <a href="{{ route('customer.register') }}"
                            class="register-link"><strong>Register</strong></a></p>
                    <br>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
                </form>
            </div>
        </div>
    </div>
    @include('_footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');

            function togglePasswordVisibility(event) {
                const input = document.getElementById(event.currentTarget.getAttribute('data-input'));
                const icon = event.currentTarget.querySelector('i');
                const isPasswordVisible = input.type === 'password';
                input.type = isPasswordVisible ? 'text' : 'password';
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            }

            togglePassword.addEventListener('click', togglePasswordVisibility);

        });
    </script>

</body>

</html>
