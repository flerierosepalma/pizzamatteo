<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo | Privacy Policy</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon_ico.ico') }}">
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
            <img src="{{ asset('assets/header_logo.png') }}" alt="Logo">
        </div>
        <div class="empty-space"></div>
    </header>

    <div class="content-wrapper">
        <div class="terms">
            <h1>PRIVACY POLICY</h1>

    <div class="section-container" onclick="toggleContent('introduction-content', this)">
    <h2>Introduction</h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="introduction-content" class="section-content">
                <p>This Privacy Statement explains data collection, processing, retention, sharing and disposal in strict compliance with the Data Privacy Act of 2012 and its Implementing Rules and Regulations. It governs the privacy policy for PIZZA MATTEO. </p>
                <p>We are committed to protecting your privacy. You can visit most pages on our sites without giving us any information about yourself. However, you will need to register if you want to place an order and/or register.  We need your personal information to provide you our products and services. Please note, however, that PIZZA MATTEO and its websites and mobile application are and shall not be responsible for the content and/or the privacy policies of websites to which they may link.</p>
            </div>

    <div class="section-container" onclick="toggleContent('What-We-Collect-content', this)">
    <h2>What We Collect</h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="What-We-Collect-content" class="section-content">    
            <ul>
                <li>We need information that personally identifies you and allows us to contact you. We ask for your House Number/Unit Number/Floor Number, Building Name/Village Name/Subdivision Name (if applicable), Street Name, Barangay, City/Municipality, andamong others. You will provide us with your contact information such as email address, mobile phone or telephone number. 
                </li>
                </ui>                
            </div>

    <div class="section-container" onclick="toggleContent('Why-We-Collect-Use-content', this)">
    <h2>Why We Collect & Use </h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="Why-We-Collect-Use-content" class="section-content">
                <p>The Personal Information collected are necessary to:</p>             
                    <p>(1) build your account, </p>     
                    <p>(2) to process your orders, as may be applicable, </p>     
                    <p>(3) to personalize the delivery of marketing contents to you by us or through our third-party digital solutions provider mentioned in this Privacy Statement, and </p>     
                    <p>(4) for us to reach you for all legal intents and purposes.</p>     
                    <p>All the information we collect from you will be primarily used to process your transaction, to provide you with our products and services, as well as for statistical and demographic reports, and for general marketing purposes. These statistics and aggregate reports will not contain any personally identifiable information. </p>     
            </div>

    <div class="section-container" onclick="toggleContent('With-Whom-We-Share-content', this)">
    <h2>With Whom We Share </h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="With-Whom-We-Share-content" class="section-content">
            <ul>
                <li>We do not collect and store any personal information upon payment processing. All online payments are linked to and handled by third-party provider GCash. We are and shall not be responsible for the content and/or the privacy policies of websites to which your chosen mode of payment may link.</li>       
                <li>We reserve the right to add and/or remove any third-party payment channel at any time without prior notice. However, we shall update the terms of this Privacy Statement to reflect such changes. </li>
            </ui>                
            </div>
    
    <div class="section-container" onclick="toggleContent('Use-Of-Your-Personal-Information-content', this)">
    <h2>Use of your Personal Information</h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="Use-Of-Your-Personal-Information-content" class="section-content">
            <ul>
                <li>Your personal information is collected for processing and documentation, statistics, marketing, and promotions, and as a reference in future communications with you. Also, collecting this information can limit abuse of the system, as it helps us detect duplicate or "shill" accounts. Your personal information is never displayed publicly. We require that you provide your account name or "handle" to be listed with your submissions.</li>
                <li>We require that you provide your real first and last names. Your account name or first name may be displayed throughout the back-end system alongside your transaction and in the User Directory. Your last name is never shown but is needed to help us understand and keep track of who is using our system.</li>
            </ul>
            </div>
    
    <div class="section-container" onclick="toggleContent('Your-Data-Subjects-Rights-content', this)">
    <h2>Your Data Subjects Rights</h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="Your-Data-Subjects-Rights-content" class="section-content">
                    <ul>
                    <li>When you create an account or otherwise give us your personal information, Pizza Matteo, will not share that information with third parties without your permission, apart from the limited exceptions already listed hereinabove. Registering also allows you to tell us how or whether you want us to communicate with you.</li>
                   </ui>                
            </div>

    <div class="section-container" onclick="toggleContent('Access-to-Your-Personal-Information-content', this)">
    <h2>Access to Your Personal Information</h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="Access-to-Your-Personal-Information-content" class="section-content">
                    <ul>
                    <li>We will provide you with the means to ensure that your personal information is correct and current. You can view, edit, and delete personal information you have already given us and change the options affecting the use and display of your personal information.</li>
                   </ui>                
            </div>             

    <div class="section-container" onclick="toggleContent('Security-of-Your-Personal-Information-content', this)">
    <h2>Security of Your Personal Information</h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="Security-of-Your-Personal-Information-content" class="section-content">
                    <ul>
                    <li>Pizza Matteo is committed to protecting the security of your personal information. We use information security tools and procedures to help protect your personal information from unauthorized access, use, or disclosure.
                    </li>
                   </ui>                
            </div>   

    <div class="section-container" onclick="toggleContent('Changes-to-this-Privacy-Policy-content', this)">
    <h2>Changes to this Privacy Policy</h2>
    <i class="fas fa-chevron-down"></i>
            </div>
            <div id="Changes-to-this-Privacy-Policy-content" class="section-content">
                    <ul>
                    <li>Pizza Matteo will occasionally update this privacy. When we do, we will also revise the "last updated" date of the Privacy Statement. For material changes to this statement, Pizza Matteo will notify you by placing a prominent notice on the main page.</li>
                   </ui>                
            </div>   

        </div>
        </div>
    </div>

    <footer>
        @include('_footer')
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
