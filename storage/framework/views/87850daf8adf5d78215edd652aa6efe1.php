<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo | About Us</title>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/favicon_ico.ico')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roca+Serif&display=swap" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #F0F2F5;
            scroll-behavior: smooth;
        }

        .about-wrapper {
            min-height: 95vh;
        }

        .about {
            margin-top: 20px;
            padding: 0 20px;
            margin-bottom: 50px;
        }

        .about-wrapper h1 {
            font-weight: bold;
            margin-bottom: 15px;
            color: #8A1C14;
            text-align: center;
            font-size: 40px;
        }

        .tagline {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            max-width: 1200px; /* Set a max width */
            margin: 20px auto; /* Center the container */
        }

        .italian img {
            width: 45%;
            border-radius: 10px;
        }

        .text {
            width: 45%;
            text-align: left;
        }

        .text h2 {
            font-family: 'Roca Serif', serif;
            color: #8A1C14;
            font-size: 48px;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .text p {
            font-family: 'Roca Serif', serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
        }

        .links {
            margin-top: 20px;
        }

        .links a {
            margin: 0 10px;
            color: #8A1C14;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<div>
    <header>
        <?php echo $__env->make('_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>

    <div class="about-wrapper">
    <div class="about">
        <h1>About Us</h1>
        <div class="tagline">
            <img src="<?php echo e(asset('assets/italian.png')); ?>" alt="Pizza">              <h2>WHERE EVERY BITE IS A DELIGHT!</h2>
                <p>Since 2020, Pizza Matteo has served thousands of happy customers with classic personalized doughs.</p>
                <p>Now we're adding innovation and adaptability within the pizza industry, just in time for the integration of cutting-edge technologies. Coming soon to your browser!</p>
                <div class="links">
                    <a href="#">DEVELOPERS</a>
                    <a href="#">TERMS AND CONDITIONS</a>
                    <a href="#">PRIVACY POLICY</a>
                    <a href="#">CONTACT US</a>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    </div>  
</body>
</html>
<?php /**PATH C:\xampp\htdocs\pizzamatteo\resources\views/about_us.blade.php ENDPATH**/ ?>