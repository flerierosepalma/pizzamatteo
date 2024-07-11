<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo | Terms and Conditions</title>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/favicon_ico.ico')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #F0F2F5;
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


        .content-wrapper {
            min-height: 95vh; /* Ensure the content wrapper fills the available space minus the footer height */
            padding-bottom: 25px; /* Ensure there is space for the footer */
            background-color: #F0F2F5;

        }

        .terms {
            margin-top: 20px;
            padding: 0 20px;
            margin-bottom: 50px;
        }

        .terms h1 {
            font-weight: bold;
            margin-bottom: 15px;
            color: #8A1C14;
            text-align: center;
            font-size: 40px;
        }

        .section-container {
            position: relative; /* Ensure the icon can be positioned relative to the container */
            background-color: #F0F2F5;
            border: 2px solid #8A1C14;
            color: black;
            padding: 21px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 800px;
            margin: 20px auto;
            cursor: pointer;
        }

        .section-container i {
            font-size: 20px; /* Adjust the icon size as needed */
            color: #8A1C14; /* Icon color */
            transition: transform 0.3s; /* Smooth transition for rotation */
        }

        .section-container i.rotated {
            transform: rotate(180deg); /* Rotate the icon 180 degrees */
        }
        
        .section-content {
            text-align: center;
            margin: 0 auto;
            max-width: 800px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            display: none;
        }

        .section-content p {
            text-align: justify;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .section-content ul {
            list-style-type: disc; /* Default bullet style, you can change it to circle, square, etc. */
            padding-left: 20px; /* Add padding to indent the list */
        }

        .section-content ul li::marker {
                color: #8A1C14; /* Change bullet color to #8A1C14 */
        }

        .section-content li {
            margin-bottom: 12px; /* Space between list items */
            text-align: justify; /* Justify the text inside each list item */
        
    }

    </style>
</head>

<body>
    <header class="header">
        <a href="javascript:history.back()" class="back-button">
            <i class="fas fa-chevron-left"></i> Back
        </a>
        <div class="container text-center">
            <img src="<?php echo e(asset('assets/header_logo.png')); ?>" alt="Logo">
        </div>
        <div class="empty-space"></div>
    </header>

    <div class="content-wrapper">
        <div class="terms">
            <h1>TERMS AND CONDITIONS</h1>

    <div class="section-container" onclick="toggleContent('introduction-content', this)">
    <h2>INTRODUCTION</h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="introduction-content" class="section-content">
                <p>These Terms and Conditions (“Terms”) govern your (referred to as You, Guest, or User) use of the Pizza Pal: Integrated Management System with Forecasting and Data Visualization (developed by 3rd-year IT students, referred to as We, Us). Please read these Terms carefully.</p>
                <p>By accessing and using Pizza Matteo, you acknowledge that you have read, understood, and agreed to be bound by these Terms. Use this system solely for its intended purpose and in furtherance of Pizza Matteo’s legitimate business interests. Discontinue use if you object to any of these Terms.</p>
                <p>Pizza Matteo reserves the right to change or modify these Terms, including our Policies, at any time. It is strongly recommended that you read these Terms regularly. Continued use of Pizza Matteo following the posting of amended Terms indicates your agreement to the changes</p>
            </div>

    <div class="section-container" onclick="toggleContent('account-creation-content', this)">
    <h2>ACCOUNT CREATION</h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="account-creation-content" class="section-content">
                    <ul>
                <li>Registering through the Website will require you to provide your personal information and create a password. </li>
                <li>It is understood that you consent to Pizza Matteo collecting your personal information and agree with Pizza Matteo's Privacy Policy governing the collection and processing of the personal information they provide. </li>
                <li>Your password should remain confidential and must be updated regularly for account security. If you believe your password has been compromised, please change your password immediately. </li>
                <li>Upon logging in, you will undergo a two-factor authentication process to ensure security, granting you access to Pizza Matteo's online ordering system. </li>
                <li>Pizza Matteo reserves the right to suspend your accounts if you breach any provisions of these Terms. </li>
                    </ui>                
        </div>

    <div class="section-container" onclick="toggleContent('fulfillment-of-order-content', this)">
    <h2>FULFILLMENT OF ORDER</h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="fulfillment-of-order-content" class="section-content">
                    <ul>
                <li>This Terms and Conditions shall apply to all food orders made through Pizza Matteo’s Website. </li>
                <li>The ordering system only serves customers within the resellers' province. </li>
                    </ui>                
            </div>

    <div class="section-container" onclick="toggleContent('placing-an-order-content', this)">
    <h2>PLACING AN ORDER</h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="placing-an-order-content" class="section-content">
                    <ul>
                <li>Upon placing an order, a paid invoice serving as payment confirmation will be sent to your email, indicating that your order is being processed.</li>
                <li>During order placement and confirmation, you must ensure the correct and complete delivery address and mobile number to avoid any discrepancy or delivery delay.</li>
                <li>The system will display the order status, showing whether the order is being prepared, ready for pick-up, or completed. </li>
                   </ui>                
            </div>

    <div class="section-container" onclick="toggleContent('order-confirmation-changes-content', this)">
    <h2>ORDER CONFIRMATION & CHANGES </h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="order-confirmation-changes-content" class="section-content">
                    <ul>
                <li>Upon submission of your online order, you are authorizing us to process your online order and prepare the products you have specified on your order form. However, Pizza Matteo has full discretion to accept and/or validate order transactions.</li>
                <li>Pizza Matteo reserves the right to decline or modify the transaction based on product availability and/or store availability. The store may reach out to you through the contact information you provided via phone call, SMS, or email if they need to decline or modify the transaction or any part thereof, such as the food products ordered, among others.</li>
                <li>If another person orders and/or receives products on your behalf and uses your account, you agree that such order shall be considered as your own and shall be subject to these Terms and the Pizza Matteo Privacy Policy.</li>
                <li>Any change or cancellation will be dependent on the catering store’s acceptance. The catering store may reject the change or cancellation if the production of the order has already commenced. In case your request for a change of order is accepted by the catering store, you agree that such change will result in an extension of delivery time.</li>
                <li>Once you receive the order, you need to click the ‘order received’ button. If you forget to click it, the order will be marked as received the same day.</li>
                   </ui>                
            </div>
    
    <div class="section-container" onclick="toggleContent('delivery-conditions-content', this)">
    <h2>DELIVERY CONDITIONS</h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="delivery-conditions-content" class="section-content">
                    <ul>
                <li>Only the pick-up option is available for now due to limitations in resources such as staff and vehicle availability for delivery services. Please pick up your order at the store or manually arrange delivery using a third-party app once it is ready.</li>
                <li>Each store may have different operating hours. We can only service your order if the catering store, based on the address you have provided, is open and available.</li>
                   </ui>                
            </div>

    <div class="section-container" onclick="toggleContent('price-payment-refund-content', this)">
    <h2>PRICE, PAYMENT, & REFUND </h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="price-payment-refund-content" class="section-content">
                    <ul>
                <li>Prices of goods and services may be changed at any time without further notice. The third-party applications require a private API, so billing transactions will be processed manually.</li>
                <li>You can pay by any of the methods listed on the checkout screen. We currently accept the following forms of payment: Cash on Pick-up (COP) and GCash. If you use GCash as the mode of payment, you are required to upload your proof of payment to a designated page for manual verification by the store admin.</li>       
                <li>Online payments are charged immediately upon order placement. These may be subject to additional online charges, which you will be informed about before placing the order. </li>
                <li>We reserve the right to cancel your order at any stage if we encounter any issues with your payment.</li>
                <li>Orders can only be picked up during store hours. If the order is not picked up within this time, it will be automatically canceled and non-refundable.</li>
                <li>You can send a refund request as long as the order has not been marked as complete. You will need to provide the reason, description, refund method, and proof. If accepted, the refund will be sent manually to the provided method. You can also view your pending, completed, and refunded/canceled orders.</li>
                   </ui>                
            </div>

    <div class="section-container" onclick="toggleContent('limitation-liability-content', this)">
    <h2>LIMITATION & LIABILITY </h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="limitation-liability-content" class="section-content">
                    <ul>
                <li>We shall not be liable for any loss, expense, cost or damage arising directly or indirectly out of or in connection with: (i) your use of this site and/or application; or (ii) the delay beyond the estimated time or pick up; or (iii) availability of product/s at any given time; or (iv) force majeure; or (v) any circumstances beyond our control, and over which we could not have avoided even with the exercise of reasonable care, or any indirect or unforeseeable loss suffered or incurred by customers or third parties. In any event, our liability for any given transaction shall not exceed the total price charged for the relevant items.</li>
                <li>The Products ordered should be consumed immediately from their actual receipt. We will not be liable for any event that may arise as a result/consequence of consuming the Products beyond the specified time.</li>       
                    </ui>                
            </div>

    <div class="section-container" onclick="toggleContent('intellectual-property-content', this)">
    <h2>INTELLECTUAL PROPERTY </h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="intellectual-property-content" class="section-content">
                    <ul>
                <li>This Site contains the Pizza Matteo's logo, and other trademarks, service marks, product names, designs, titles, words or phrases, graphics and logos used in connection with the Site (collectively, the "Trademarks"), including, all text, images, photographs, illustrations, data, and/or other related information, and other materials featured, displayed, contained and available in and on the Site and (collectively, the "Content"), are owned by or licensed to Pizza Matteo. The Trademarks, Content and related proprietary property are protected from copying and imitation under national and international laws and are not to be used, reproduced, adapted (whether in its original form or derivations thereof), or copied, in whole or in part, without the express written permission of Pizza Matteo. Third parties are not allowed to use the Trademarks and Content in any manner, or for any other purpose, commercial or otherwise, without Pizza Matteo's prior express written consent.</li>       
                    </ui>                
            </div>

    <div class="section-container" onclick="toggleContent('virus-spam-protection-content', this)">
    <h2>VIRUS & SPAM PROTECTION </h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="virus-spam-protection-content" class="section-content">
                    <ul>
                <li>Pizza Matteo makes every effort to test and check material at all stages of production. It is always wise for the user to run an anti-virus program on all material downloaded from the internet. Pizza Matteo cannot accept any responsibility for any loss, including but not limited to indirect or consequential loss, disruption, or damage to your data or computer system that may occur whilst using material from the website. </li>       
                    </ui>                
            </div>

    <div class="section-container" onclick="toggleContent('termination-content', this)">
    <h2>TERMINATION </h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="termination-content" class="section-content">
                    <ul>
                <li>In their sole discretion, Pizza Matteo’s website may terminate or suspend your access to any part of the site or application, for any reason, including breach of these Terms. The restrictions regarding materials on the website, and the representations, warranties, indemnities, and limitations of liabilities outlined in these Terms will survive any such termination of access, use, or availability of the Website. </li>       
                    </ui>                
            </div>

    <div class="section-container" onclick="toggleContent('privacy-policy-content', this)">
    <h2>PRIVACY POLICY </h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="privacy-policy-content" class="section-content">
                    <ul>
                <li>Our Privacy Policy, and any changes thereto that we may implement from time to time, in connection with how we process your personal information collected from this Site may be found in the Privacy Policy. You agree that with your acceptance of these Terms and Conditions, you have read, understood, and accepted our Privacy Policy.  </li>       
                    </ui>                
            </div>


        </div>
        </div>
    </div>

    <footer>
        <?php echo $__env->make('_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>

    <script>
            function toggleContent(sectionId, container) {
                var section = document.getElementById(sectionId);
                var icon = container.querySelector('i');

                // Toggle the visibility of the selected section
                if (section.style.display === 'block') {
                    section.style.display = 'none';
                    icon.classList.remove('rotated');
                } else {
                    section.style.display = 'block';
                    icon.classList.add('rotated');
                }
            };

                var icons = document.querySelectorAll('.section-container i');
                icons.forEach(function(icon) {
                    icon.classList.remove('rotated');
                });

                var icon = container.querySelector('i');
                if (document.getElementById(sectionId).style.display === 'block') {
                    icon.classList.add('rotated');
                } else {
                    icon.classList.remove('rotated');
                }

    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\pizzamatteo\resources\views/terms_conditions.blade.php ENDPATH**/ ?>