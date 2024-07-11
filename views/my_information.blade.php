<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pizza Matteo | My Information</title>
<link rel="icon" type="image/png" sizes="32x32" href="assets/favicon_ico.ico">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: 'Poppins', sans-serif;
    }
    .bg {
        background-size: cover;
        background-position: center;
        flex: 1;
    }

    .content-wrapper {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
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
    border: 2px solid #8A1C14;
    color: #ffffff;
    font-family: 'Poppins', sans-serif;
    padding: 10px 80px;
    border-radius: 50px;
    transition: background-color 0.3s ease, color 0.3s ease;
    margin: 35px;
    display: inline-block;
}

.btn-custom:hover {
    background-color: #ffffff;
    color: #8A1C14;
}

.btn-custom:focus, .btn-custom:active {
    outline: none;
    box-shadow: none;
}

/* Media query for smaller screens */
@media (max-width: 768px) {
    .btn-custom {
        padding: 10px 30px;
        width: 100%;
        margin: 10px 0;
        font-size: 14px;
    }
}

.tabs-container {
    max-width: 1300px;
    width: 100%;
    margin: auto;
    margin-top: -210px;
    margin-bottom: 50px;
    padding: 10px;
    padding-top: 0px;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 0px;
    box-shadow: 0 0 10px rgba(0.1, 0.1, 0.1, 0.1);
    position: relative;
}

.tabs-wrapper {
    max-width: 1400px;
    margin: 0 auto;
    width: 100%;
    padding: 0 20px;
    box-sizing: border-box;
}

.nav-tabs {
    justify-content: space-around;
    flex-wrap: wrap;
}

.nav-link {
    color: #8A1C14;
    font-family: 'Poppins', sans-serif;
    font-weight: bold;
}

.nav-link.active {
    background-color: #8A1C14;
    color: white;
}

/* Media query for smaller screens */
@media (max-width: 768px) {
    .nav-tabs {
        flex-direction: column;
    }

    .nav-item {
        width: 100%;
        text-align: center;
    }

    .nav-link {
        margin-bottom: 10px;
    }
}

    .nav-link.active {
        background-color: #8A1C14;
        color: white;
    }
    .user-info {
        list-style: none;
        padding: 0;
        text-align: left;
        margin: 10px 0;
    }
    .user-info li {
        margin-bottom: 10px;
    }
    .modal-content {
        border-radius: 15px;
        padding: 20px;
        border: 2px solid #8A1C14;
    }

    .modal-header {
        border-bottom: none;
        text-align: center;
    }

    .modal-header .close {
        margin: -10px -10px 0 0;
    }

    .modal-title {
        font-family: 'Poppins', sans-serif;
        font-weight: bold;
        color: #8A1C14;
    }

    .form-group label {
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #8A1C14;
        padding: 10px;
    }

    .modal-footer {
        border-top: none;
        justify-content: center;
    }

    .modal-footer .btn {
        border-radius: 50px;
        padding: 10px 30px;
        font-family: 'Poppins', sans-serif;
        font-weight: bold;
    }

    .btn-primary {
        background-color: #8A1C14;
        border: none;
        color: #ffffff;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #ffffff;
        color: #8A1C14;
        border: 2px solid #8A1C14;
    }

    .btn-secondary {
        background-color: #ffffff;
        color: #8A1C14;
        border: 2px solid #8A1C14;
    }

    .btn-secondary:hover {
        background-color: #8A1C14;
        color: #ffffff;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
    }

    .form-row .form-group {
        flex: 4;
        min-width: 140px;
        padding: 10px;
    }

    .form-row .form-group-full {
        flex: 150%;
        min-width: 100%;
    }
    .order-container {
    margin: 5px auto; 
    max-width: 1400px;
    width: 100%; 

}

    .order {
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid #8A1C14;
        border-radius: 10px;
        padding: 10px;
        margin-bottom: 20px;
    }

    .order h5 {
        color: #8A1C14;
        font-family: 'Poppins', sans-serif;
        font-weight: bold;
    }

    .order p {
        font-family: 'Poppins', sans-serif;
    }

    .order .btn-secondary {
        background-color: #ffffff;
        color: #8A1C14;
        border: 2px solid #8A1C14;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .order .btn-secondary:hover {
        background-color: #8A1C14;
        color: #ffffff;
    }
    .logout {
    background-color: #b00000;
    border: none;
    color: white;
    padding: 5px 40px;
    border-radius: 50px;
    font-size: 16px;
    cursor: pointer;
}

.logout:hover {
    background-color: #d00000;
}
</style>
</head>
<body>
<header>
        @include('_header')
    </header>


<style>
        .custom-red {
            background-color: #8A1C14;
            padding: 15px 20px;
            border: 0px;
            border-radius: 0 0 0 0;
            display: flex;
            align-items: center;
            color: white;
            justify-content: space-between;
            max-width: 1400px; /* Set the maximum width */
            margin: 0 auto; /* Center the element */
        }
        .custom-red .red-left {
            display: flex;
            align-items: center;
        }
        .custom-red .user-icon {
            font-size: 20px;
            border-radius: 50%;
            background-color: white;
            color: #800000;
            padding: 10px;
            margin-left: 10px;
        }
        .custom-red .logout {
            background-color: #b00000;
            border: none;
            color: white;
            padding: 5px 40px;
            border-radius: 50px;
            font-size: 16px;
            cursor: pointer;
        }
        .custom-red .logout:hover {
            background-color: #d00000;
        }
    </style>

    <!-- Upper section of the body -->
    <div class="custom-red">
        <div class="red-left">
            <div class="user-icon">
                <i class="fas fa-user fa-3x"></i>
            </div>
        </div>
        <button class="btn btn-danger logout">Logout</button>
    </div>

    <div class="tabs-wrapper">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#myInformation">My Information</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#pending">Pending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#completed">Completed</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#cancelled">Cancelled/Refunded</a>
        </li>
    </ul>
</div>


                <div class="tab-content mt-4">
                    <div id="myInformation" class="container tab-pane active">
                    <ul class="user-info">
                    <ul class="user-info">

                    <li>Name: <span id="name">John</span></li>
                    <li>Birthday: <span id="birthday">1990-01-01</span></li>
                    <li>Gender: <span id="gender">Male</span></li>
                    <li>Province: <span id="province">Metro Manila</span></li>
                    <li>Store: <span id="store">Doe</span></li>
                    <li>City: <span id="city">Manila</span></li>
                    <li>Barangay: <span id="barangay">Manila</span></li>
                    <li>Street: <span id="street">Manila, San Andres</span></li>
                    <li>Phone Number: <span id="number">09172380477</span></li>
                    
                </ul>
 
                        </ul>
                    <button class="btn btn-custom" onclick="toggleEditInformation()">Edit Information</button>
                    <button class="btn btn-custom" onclick="toggleChangeEmail()">Change Email</button>
                    <button class="btn btn-custom" onclick="toggleChangePassword()">Change Password</button>


                    </div>
                    <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
    <div class="d-flex justify-content-center">
        <div class="order-container" id="pending-orders">
            <div class="order" id="order-0000">
                <h5>ORDER ID: 0000</h5>
                <p>[ORDER DETAILS]</p>
                <p>Order Status: Preparing order</p>
                <button class="btn btn-secondary" onclick="markOrderAsReceived('order-0000')">Order Received</button>
            </div>
            <div class="order" id="order-0001">
                <h5>ORDER ID: 0001</h5>
                <p>[ORDER DETAILS]</p>
                <p>Order Status: On the way</p>
                <button class="btn btn-secondary" onclick="markOrderAsReceived('order-0001')">Order Received</button>
            </div>
        </div>
    </div>
</div>

<div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
    <div class="d-flex justify-content-center">
        <div class="order-container" id="completed-orders">
            <!-- Completed orders will be loaded here -->
        </div>
    </div>
</div>

<div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
    <div class="d-flex justify-content-center">
        <div class="order-container">
            <div class="order">
                <h5>ORDER ID: 5678</h5>
                <p>[ORDER DETAILS]</p>
                <p>Order Status: Cancelled</p>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>

   <!-- Modal for Edit Information -->
<div class="modal fade" id="editInformationModal" tabindex="-1" aria-labelledby="editInformationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInformationModalLabel">Edit Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group text-center form-group-full">
                        <label for="uploadProfilePicture">
                            <i class="fas fa-camera fa-2x"></i>
                        </label>
                        <input type="file" id="uploadProfilePicture" class="d-none">
                        <p>Upload Profile Picture</p>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="editName">Name</label>
                            <input type="text" class="form-control" id="editName" value="">
                        </div>
                        <div class="form-group">
                            <label for="editGender">Gender</label>
                            <input type="text" class="form-control" id="editGender" value="">
                        </div>
                        <div class="form-group">
                            <label for="editBirthday">Birthday</label>
                            <input type="date" class="form-control" id="editBirthday" value="">
                        </div>
                        <div class="form-group">
                            <label for="editProvince">Province</label>
                            <input type="text" class="form-control" id="editProvince" value="">
                        </div>
                        <div class="form-group">
                            <label for="editStore">Store</label>
                            <input type="text" class="form-control" id="editStore" value="">
                        </div>
                        <div class="form-group">
                            <label for="editCity">City</label>
                            <input type="text" class="form-control" id="editCity" value="">
                        </div>
                        <div class="form-group">
                            <label for="editBarangay">Barangay</label>
                            <input type="text" class="form-control" id="editBarangay" value="">
                        </div>
                        <div class="form-group">
                            <label for="editStreet">Street</label>
                            <input type="text" class="form-control" id="editStreet" value="">
                        </div>
                        <div class="form-group">
                            <label for="editNumber">Phone Number</label>
                            <input type="text" class="form-control" id="editNumber" value="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveInformation()">Save changes</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal for Change Email -->
<div class="modal fade" id="changeEmailModal" tabindex="-1" aria-labelledby="changeEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeEmailModalLabel">Change Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="newEmail">New Email</label>
                        <input type="email" class="form-control" id="newEmail" value="">
                        <small class="form-text text-muted">
                            <button type="button" class="btn btn-link" id="sendCode">Send Code</button>
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="verificationCode">Verification Code</label>
                        <input type="text" class="form-control" id="verificationCode" value="">
                        <small class="form-text text-muted">
                            <a href="#" id="resendVerificationCode">Send verification code again</a>
                        </small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="verifyAndSaveEmail()">Verify & Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    function verifyAndSaveEmail() {
        const newEmail = document.getElementById('newEmail').value;
        const verificationCode = document.getElementById('verificationCode').value;
        
        // Perform verification code validation here
        
        // If verification is successful, update the email
        // Example AJAX request (you'll need to implement server-side handling)
        $.ajax({
            url: '/update-email',
            type: 'POST',
            data: {
                email: newEmail,
                code: verificationCode
            },
            success: function(response) {
                // Handle successful response
                alert('Email updated successfully');
                $('#changeEmailModal').modal('hide');
            },
            error: function(error) {
                // Handle error
                alert('Error updating email');
            }
        });
    }
    
    document.getElementById('sendCode').addEventListener('click', function() {
        const newEmail = document.getElementById('newEmail').value;
        
        // Send verification code to the new email
        // Example AJAX request (you'll need to implement server-side handling)
        $.ajax({
            url: '/send-verification-code',
            type: 'POST',
            data: {
                email: newEmail
            },
            success: function(response) {
                // Handle successful response
                alert('Verification code sent');
            },
            error: function(error) {
                // Handle error
                alert('Error sending verification code');
            }
        });
    });

    document.getElementById('resendVerificationCode').addEventListener('click', function() {
        const newEmail = document.getElementById('newEmail').value;
        
        // Resend verification code to the new email
        // Example AJAX request (you'll need to implement server-side handling)
        $.ajax({
            url: '/resend-verification-code',
            type: 'POST',
            data: {
                email: newEmail
            },
            success: function(response) {
                // Handle successful response
                alert('Verification code resent');
            },
            error: function(error) {
                // Handle error
                alert('Error resending verification code');
            }
        });
    });
</script>


<!-- Modal for Change Password -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="currentPassword">Current Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="currentPassword" value="">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary toggle-password" onclick="togglePasswordVisibility('currentPassword')">
                                    <i class="fa fa-eye" id="currentPasswordToggle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="newPassword" value="">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary toggle-password" onclick="togglePasswordVisibility('newPassword')">
                                    <i class="fa fa-eye" id="newPasswordToggle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmNewPassword">Confirm New Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="confirmNewPassword" value="">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary toggle-password" onclick="togglePasswordVisibility('confirmNewPassword')">
                                    <i class="fa fa-eye" id="confirmNewPasswordToggle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveNewPassword()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility(passwordFieldId) {
        const passwordField = document.getElementById(passwordFieldId);
        const passwordToggle = document.getElementById(passwordFieldId + 'Toggle');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            passwordToggle.classList.remove('fa-eye');
            passwordToggle.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            passwordToggle.classList.remove('fa-eye-slash');
            passwordToggle.classList.add('fa-eye');
        }
    }

    function saveNewPassword() {
        const currentPassword = document.getElementById('currentPassword').value;
        const newPassword = document.getElementById('newPassword').value;
        const confirmNewPassword = document.getElementById('confirmNewPassword').value;

        // Perform password validation here
        
        // If validation is successful, update the password
        // Example AJAX request (you'll need to implement server-side handling)
        $.ajax({
            url: '/update-password',
            type: 'POST',
            data: {
                currentPassword: currentPassword,
                newPassword: newPassword,
                confirmNewPassword: confirmNewPassword
            },
            success: function(response) {
                // Handle successful response
                alert('Password updated successfully');
                $('#changePasswordModal').modal('hide');
            },
            error: function(error) {
                // Handle error
                alert('Error updating password');
            }
        });
    }
</script>

<!-- Add Font Awesome for the eye icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <script>
    function toggleEditInformation() {
    $('#editInformationModal').modal('toggle');
    document.getElementById('editName').value = document.getElementById('name').textContent;
    document.getElementById('editGender').value = document.getElementById('gender').textContent;
    document.getElementById('editBirthday').value = document.getElementById('birthday').textContent;
    document.getElementById('editProvince').value = document.getElementById('province').textContent;
    document.getElementById('editStore').value = document.getElementById('store').textContent;
    document.getElementById('editCity').value = document.getElementById('city').textContent;
    document.getElementById('editBarangay').value = document.getElementById('barangay').textContent;
    document.getElementById('editStreet').value = document.getElementById('street').textContent;
    document.getElementById('editNumber').value = document.getElementById('number').textContent;
}

function saveInformation() {
    document.getElementById('name').textContent = document.getElementById('editName').value;
    document.getElementById('gender').textContent = document.getElementById('editGender').value;
    document.getElementById('birthday').textContent = document.getElementById('editBirthday').value;
    document.getElementById('province').textContent = document.getElementById('editProvince').value;
    document.getElementById('store').textContent = document.getElementById('editStore').value;
    document.getElementById('city').textContent = document.getElementById('editCity').value;
    document.getElementById('barangay').textContent = document.getElementById('editBarangay').value;
    document.getElementById('street').textContent = document.getElementById('editStreet').value;
    document.getElementById('number').textContent = document.getElementById('editNumber').value;
    $('#editInformationModal').modal('toggle');

}


        function toggleChangeEmail() {
            $('#changeEmailModal').modal('toggle');
        }

        function saveNewEmail() {
            var newEmail = document.getElementById('newEmail').value;
            var confirmNewEmail = document.getElementById('confirmNewEmail').value;

            if (newEmail !== confirmNewEmail) {
                alert('Email addresses do not match.');
                return;
            }

            document.getElementById('email').textContent = newEmail;
            $('#changeEmailModal').modal('toggle');
        }

        function toggleChangePassword() {
            $('#changePasswordModal').modal('toggle');
        }

        function saveNewPassword() {
            var newPassword = document.getElementById('newPassword').value;
            var confirmNewPassword = document.getElementById('confirmNewPassword').value;

            if (newPassword !== confirmNewPassword) {
                alert('Passwords do not match.');
                return;
            }

          
            $('#changePasswordModal').modal('toggle');
        }
      
    function markOrderAsReceived(orderId) {
    
        var orderElement = document.getElementById(orderId);
        
        orderElement.querySelector('p:nth-of-type(2)').textContent = 'Order Status: Delivered';

        var button = orderElement.querySelector('button');
        if (button) {
            button.remove();
        }

       
        var completedOrdersContainer = document.getElementById('completed-orders');
        completedOrdersContainer.appendChild(orderElement);
    }


    </script>
</body>
</html>
