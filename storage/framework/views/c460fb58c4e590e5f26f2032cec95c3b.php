<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .footer {
        background: black;
        color: white;
        padding: 30px;
        text-align: center;
    }

    .footer .main {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .footer-column {
        width: 100%;
        margin-bottom: 20px;
    }

    .footer-column h4 {
        font-size: 18px;
        text-transform: capitalize;
        margin-bottom: 20px;
        font-weight: 600;
        position: relative;
        color: white;
    }

    .footer-column h4::before {
        content: '';
        position: absolute;
        left: 50%;
        bottom: -6px;
        transform: translateX(-50%);
        background: #8A1C14;
        height: 3px;
        box-sizing: border-box;
        width: 125px;
    }

    .footer-column ul {
        list-style: none;
        padding: 0;
    }

    .footer-column ul li {
        margin-bottom: 20px;
    }

    .footer-column ul li a {
        text-decoration: none;
        color: #6d6d6d;
        transition: color 0.3s;
    }

    .footer-column ul li a:hover {
        color: #FFCC00;
    }

    .copy-right {
        width: 100%;
        text-align: center;
        font-size: 14px;
        color: white;
        text-decoration: none;
    }

    @media (min-width: 768px) {
        .footer-column {
            width: 30%;
        }
    }
</style>

<footer class="footer">
    <div class="main">
        <div class="footer-column">
            <h4>CONTACT US</h4>
            <ul>
                <li><i style="font-size: 19px; color: #8A1C14;" class="fa fa-envelope"></i> <a
                        href="mailto:info@example.com">pizzamatteomailer@gmail.com</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>INFORMATION</h4>
            <ul>
                <li><a href="<?php echo e(url('about_us')); ?>">About Us</a></li>
                <li><a href="<?php echo e(url('privacy_policy')); ?>">Privacy Policy</a></li>
                <li><a href="<?php echo e(url('terms_conditions')); ?>">Terms and Condition</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>SOCIAL MEDIA</h4>
            <ul>
                <li><a href="https://www.facebook.com/pizzamatteoph"><i
                            style="font-size: 40px; color: #8A1C14 !important;"
                            class="fab fa-facebook fa-2x fa-fw text-muted link"></i></a></li>
            </ul>
        </div>
    </div>
    <p class="copy-right"> Copyright © 2024 Pizza Matteo. All Rights Reserved.</p>
</footer>
<?php /**PATH C:\xampp\htdocs\pizzamatteo\resources\views/_footer.blade.php ENDPATH**/ ?>