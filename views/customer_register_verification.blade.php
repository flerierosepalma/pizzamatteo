<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo | Register Verification</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon_ico.ico') }}">
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
            padding-top: 70px;
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
    </style>
</head>

<body>
    <header class="header">
        <a href="{{ route('customer.register') }}" class="back-button">
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
                <h3 class="text-center"><strong>VERIFICATION SENT</strong></h3>
                <p class="text-center text-muted mb-4">Please enter the 6 digit code sent to <span
                        style="color: #8A1C14; font-weight:bold;">{{ $email }}</span></p>
                <form method="POST" action="{{ route('customer.register.verify.post') }}">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="form-group">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                            </div>
                            <input type="number" class="form-control" name="otp"
                                placeholder="Enter verification code" required id="otp" oninput="maxLengthCheck(this)">
                        </div>
                    </div>
                    <p class="resend-otp"><a href="#" id="resendOtp">Resend OTP</a></p>
                    <button type="submit" class="btn btn-custom btn-block">VERIFY</button>
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
            </div>
        </div>
    </div>

    @include('_footer')

    <script>
        document.getElementById('resendOtp').addEventListener('click', function(event) {
            event.preventDefault();
            console.log('Resend OTP link clicked'); 
            fetch('{{ route('customer.register.resendOtp') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        email: '{{ $email }}'
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Response from server:', data);
                    if (data.success) {
                        alert('OTP resent successfully.');
                    } else {
                        alert('Error resending OTP.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error resending OTP.');
                });
        });

        function maxLengthCheck(input) {
            if (input.value.length > 6) {
                input.value = input.value.slice(0, 6);
            }
        }
    </script>
</body>

</html>
