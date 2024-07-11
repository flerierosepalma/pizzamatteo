<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 50px;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            margin: 0 auto;
            max-width: 600px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .logo span {
            color: #8A1C14;
        }

        .logo span:nth-child(2) {
            color: #000000;
        }

        .slogan {
            text-align: center;
            font-size: 10px;
            color: #8A1C14;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .greeting {
            margin-bottom: 10px;
            font-size: 13px;
            font-weight: bold;
        }

        .otp-code {
            margin-top: 30px;
            font-size: 20px;
            color: #8A1C14;
            text-align: center;
            font-weight: bold;
        }

        .note {
            margin-top: 30px;
            margin-bottom: 30px;
            font-size: 13px;
            color: #333333;
        }

        .signature {
            margin-bottom: 10px;
            font-size: 13px;
            color: #333333;
        }

        .disclaimer {
            margin-top: 20px;
            font-size: 12px;
            color: #999999;
            line-height: 1.5em;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">PIZZA <span>MATTEO</span></div>
        <div class="slogan">DELICIOUS • HOT • FRESH</div>
        <p class="greeting">Dear user,</p>
        <p>Thank you for registering with <span style="color: #8A1C14; font-weight: bold;">Pizza</span> <span
                style="color: black; font-weight: bold;">Matteo</span>! To complete your registration, please use the
            following OTP to verify your email address:</p>
        <p class="otp-code">{{ $otp }}</p>
        <p class="note">Do not share your OTP with anyone. Please disregard if you did not initiate this request.</p>
        <p class="signature">Best regards,<br><strong>PIZZA MATTEO TEAM</strong></p>
        <p class="disclaimer">The message was sent automatically by the system. Please do not reply to this message.</p>
    </div>
</body>

</html>
