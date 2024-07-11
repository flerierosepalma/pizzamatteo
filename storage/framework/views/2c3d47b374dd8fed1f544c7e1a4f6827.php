<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Matteo | Register</title>
    <link rel="icon" type="image/x-icon" href="https://scontent.fmnl4-7.fna.fbcdn.net/v/t1.15752-9/448200191_474132475099478_6596455881542556957_n.png?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_ohc=b4tF4OnvpwMQ7kNvgFrieEp&_nc_ht=scontent.fmnl4-7.fna&oh=03_Q7cD1QFjIEijnlQPvClN4SA7vvEb1V_1qxCAS2tnpsKMeMWxhg&oe=669489EE">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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

        .header .back-button:hover {
            color: #CB150F;
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
            background: linear-gradient(to right, #8A1C14 5%, black 70%);
            border: none;
            color: white;
            font-family: 'Poppins', sans-serif;
        }


        .btn-custom:hover {
            background: linear-gradient(to right, #CB150F 5%, black 70%);
            border: none;
            color: white;
        }

        .btn-custom:focus,
        .btn-custom:active {
            box-shadow: none;
        }

        .input-group-prepend {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(to right, #8A1C14 5%, black 70%);
            color: white;
            padding: 0 10px; /* Adjust padding as needed */
            border: 1px solid #ced4da;
            border-right: none;
            border-radius: 5px 0 0 5px;
            }

        .input-group-prepend .input-group-text {
            background-color: transparent;
            border: none;
            padding: 0;
        }

        .input-group-prepend .input-group-text .fas {
            color: white; /* Ensure the icon color matches the theme */
        }

        .input-group .form-control {
            flex: 1; /* Allow the input to take the remaining space */
            border-left: none;
            border-radius: 0 5px 5px 0;
            font-size: 14px;
            outline: none;
            font-family: 'Poppins', sans-serif;
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
            color: black;
            text-align: center;
            margin: 10px 0;
        }

        .divider:before,
        .divider:after {
            content: '';
            display: inline-block;
            width: 30%;
            height: 1px;
            background-color: black;
            color: black;
            vertical-align: middle;
            margin: 0 10px;
        }

        .login-link {
            color: #8A1C14;
            font-family: 'Poppins', sans-serif;
        }

        .login-link:hover,
        .forgot-password a:hover {
            color: #FFCC00;
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

        .form-label {
            font-family: 'Poppins', sans-serif;
            color: black;
        }

        .form-group {
            margin-top: 10px;
            text-align: center;
        }

        .form-control {
            margin: 0 auto;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            border: 1px solid #ced4da;
            border-radius: 10px;
            outline: none;
        }

        .form-control:focus {
            border-color: #8A1C14;
            border-width: 2px;
            box-shadow: none;
        }
        .weekly-calendar {
    display: flex;
    justify-content: space-around;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 15px;
}

.day {
    padding: 10px;
    cursor: pointer;
    user-select: none;
    border: 1px solid transparent;
    transition: background-color 0.3s, border-color 0.3s;
}

.day.selected {
    background-color:  #FFCC00;
    color: white;
    border-radius: 5px;
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
                <p class="text-center text-muted mb-2">Create Reseller Account </p>
                <form action="<?php echo e(route('reseller.register.post')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="resellerName" name="resellerName"
                                    placeholder="Name" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                </div>
                                <select class="custom-select form-control" id="gender" name="gender" required>
                                    <option value="" disabled selected>Select Gender</option>
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
                                    <option value="" disabled selected> Select Province</option>
                                    <option value="Abra">Abra</option>
                                    <option value="Agusan del Norte">Agusan del Norte</option>
                                    <option value="Agusan del Sur">Agusan del Sur</option>
                                    <option value="Aklan">Aklan</option>
                                    <option value="Albay">Albay</option>
                                    <option value="Antique">Antique</option>
                                    <option value="Apayao">Apayao</option>
                                    <option value="Aurora">Aurora</option>
                                    <option value="Basilan">Basilan</option>
                                    <option value="Bataan">Bataan</option>
                                    <option value="Batanes">Batanes</option>
                                    <option value="Batangas">Batangas</option>
                                    <option value="Benguet">Benguet</option>
                                    <option value="Biliran">Biliran</option>
                                    <option value="Bohol">Bohol</option>
                                    <option value="Bukidnon">Bukidnon</option>
                                    <option value="Bulacan">Bulacan</option>
                                    <option value="Cagayan">Cagayan</option>
                                    <option value="Camarines Norte">Camarines Norte</option>
                                    <option value="Camarines Sur">Camarines Sur</option>
                                    <option value="Camiguin">Camiguin</option>
                                    <option value="Capiz">Capiz</option>
                                    <option value="Catanduanes">Catanduanes</option>
                                    <option value="Cavite">Cavite</option>
                                    <option value="Cebu">Cebu</option>
                                    <option value="Cotabato">Cotabato</option>
                                    <option value="Davao de Oro">Davao de Oro</option>
                                    <option value="Davao del Norte">Davao del Norte</option>
                                    <option value="Davao del Sur">Davao del Sur</option>
                                    <option value="Davao Occidental">Davao Occidental</option>
                                    <option value="Davao Oriental">Davao Oriental</option>
                                    <option value="Dinagat Islands">Dinagat Islands</option>
                                    <option value="Eastern Samar">Eastern Samar</option>
                                    <option value="Guimaras">Guimaras</option>
                                    <option value="Ifugao">Ifugao</option>
                                    <option value="Ilocos Norte">Ilocos Norte</option>
                                    <option value="Ilocos Sur">Ilocos Sur</option>
                                    <option value="Iloilo">Iloilo</option>
                                    <option value="Isabela">Isabela</option>
                                    <option value="Kalinga">Kalinga</option>
                                    <option value="La Union">La Union</option>
                                    <option value="Laguna">Laguna</option>
                                    <option value="Lanao del Norte">Lanao del Norte</option>
                                    <option value="Lanao del Sur">Lanao del Sur</option>
                                    <option value="Leyte">Leyte</option>
                                    <option value="Maguindanao">Maguindanao</option>
                                    <option value="Marinduque">Marinduque</option>
                                    <option value="Masbate">Masbate</option>
                                    <option value="Metro Manila">Metro Manila</option>
                                    <option value="Misamis Occidental">Misamis Occidental</option>
                                    <option value="Misamis Oriental">Misamis Oriental</option>
                                    <option value="Mountain Province">Mountain Province</option>
                                    <option value="Negros Occidental">Negros Occidental</option>
                                    <option value="Negros Oriental">Negros Oriental</option>
                                    <option value="Northern Samar">Northern Samar</option>
                                    <option value="Nueva Ecija">Nueva Ecija</option>
                                    <option value="Nueva Vizcaya">Nueva Vizcaya</option>
                                    <option value="Occidental Mindoro">Occidental Mindoro</option>
                                    <option value="Oriental Mindoro">Oriental Mindoro</option>
                                    <option value="Palawan">Palawan</option>
                                    <option value="Pampanga">Pampanga</option>
                                    <option value="Pangasinan">Pangasinan</option>
                                    <option value="Quezon">Quezon</option>
                                    <option value="Quirino">Quirino</option>
                                    <option value="Rizal">Rizal</option>
                                    <option value="Romblon">Romblon</option>
                                    <option value="Samar">Samar</option>
                                    <option value="Sarangani">Sarangani</option>
                                    <option value="Siquijor">Siquijor</option>
                                    <option value="Sorsogon">Sorsogon</option>
                                    <option value="South Cotabato">South Cotabato</option>
                                    <option value="Southern Leyte">Southern Leyte</option>
                                    <option value="Sultan Kudarat">Sultan Kudarat</option>
                                    <option value="Sulu">Sulu</option>
                                    <option value="Surigao del Norte">Surigao del Norte</option>
                                    <option value="Surigao del Sur">Surigao del Sur</option>
                                    <option value="Tarlac">Tarlac</option>
                                    <option value="Tawi-Tawi">Tawi-Tawi</option>
                                    <option value="Zambales">Zambales</option>
                                    <option value="Zamboanga del Norte">Zamboanga del Norte</option>
                                    <option value="Zamboanga del Sur">Zamboanga del Sur</option>
                                    <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" id="storeName" name="storeName" placeholder="Store Name" required>
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
                                    placeholder="Email Address" required>
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
            
                    <div class="form-row">
                    <div class="form-group col-md-4">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" id="gcashName" name="gcashName" placeholder="Gcash Name" required>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="tel" class="form-control" id="gcashNumber" name="gcashNumber"
                                    placeholder="Gcash Number" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" id="map" name="map"
                                    placeholder="Store Map" required>
                            </div>
                        </div>

                </div>
                

                <div class="form-group">
                    <label for="weeklyCalendar" class="form-label">Set a Schedule</label>
                    <div id="weeklyCalendar" class="weekly-calendar"></div>
                    <input type="hidden" id="selectedDates" name="scheduleDate">
                </div>
                
                <div class="form-group">
                    <label for="pickupCalendar" class="form-label">Pick up Date</label>
                    <div id="pickupCalendar" class="weekly-calendar"></div>
                    <input type="hidden" id="selectedPickupDates" name="deliverDate">
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
                </form>
            </div>
        </div>
    </div>
</div>

  

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

        function addOption(select, text, value) {
            var option = document.createElement('option');
            option.text = text;
            option.value = value;
            select.add(option);
        }
    </script>
    
    <script>
 document.addEventListener("DOMContentLoaded", function() {
    const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

    // Function to create a weekly calendar
    function createWeeklyCalendar(calendarId, inputId) {
        const weeklyCalendar = document.getElementById(calendarId);
        const selectedDatesInput = document.getElementById(inputId);
        let selectedDates = [];

        // Create day elements
        days.forEach(day => {
            const dayElement = document.createElement("div");
            dayElement.className = "day";
            dayElement.textContent = day;
            dayElement.dataset.day = day;

            dayElement.addEventListener("click", function() {
                if (dayElement.classList.contains("selected")) {
                    dayElement.classList.remove("selected");
                    selectedDates = selectedDates.filter(selectedDay => selectedDay !== day);
                } else {
                    dayElement.classList.add("selected");
                    selectedDates.push(day);
                }
                selectedDatesInput.value = selectedDates.join(",");
            });

            weeklyCalendar.appendChild(dayElement);
        });
    }

    // Create both calendars
    createWeeklyCalendar("weeklyCalendar", "selectedDates");
    createWeeklyCalendar("pickupCalendar", "selectedPickupDates");
});



</script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\pizzamatteo\resources\views/reseller_register.blade.php ENDPATH**/ ?>