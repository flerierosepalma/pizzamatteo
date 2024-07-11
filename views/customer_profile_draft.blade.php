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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
body,
html {
    height: 100%;
    margin: 0;
    font-family: 'Poppins', sans-serif;
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

.custom-red {
    background: linear-gradient(to right, #8A1C14 5%, black 70%);
    padding: 15px 20px;
    border: 0px;
    border-radius: 0 0 0 0;
    display: flex;
    align-items: center;
    width: 100%;
    margin: 0 auto;
    position: relative;
    height: 100px;
}

.custom-red p {
    font-size: 30px;
    color: white;
    padding: 10px;
    margin-left: 10px;
    margin: 0; 
    display: flex;
    align-items: center;
    height: 100%; 
}

.custom-red .logout {
    background-color: #b00000;
    border: none;
    color: white;
    padding: 5px 40px;
    border-radius: 50px;
    font-size: 16px;
    cursor: pointer;
    position: absolute;
    right: 20px;
}

.custom-red .logout:hover {
    background-color: #d00000;
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
    padding: 0 30px;
    box-sizing: border-box;
    position: relative;
}

.scroll-indicator {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 16px;
    color: #8A1C14;
    padding: 5px;
    z-index: 10;
    display: none; 
}

.scroll-indicator.left {
    left: 5px; 
}

.scroll-indicator.right {
    right: 5px; 
}
.nav-tabs {
    display: flex;
    justify-content: space-between;
    flex-wrap: nowrap;
    overflow-x: auto;
    overflow-y: hidden; 
    -webkit-overflow-scrolling: touch; 
}

.nav-link {
    color: #8A1C14;
    font-family: 'Poppins', sans-serif;
    font-weight: bold;
    white-space: nowrap;
}

.nav-link.active {
    background-color: #8A1C14;
    color: white;
}

@media (max-width: 768px) {
    .scroll-indicator {
        display: block; 
    }
}

@media (min-width: 769px) {
    .nav-tabs {
        overflow: hidden; 
    }
}



.user-info {
    display: flex;
    justify-content: center; 
    flex-wrap: wrap;
    margin: 0 auto; 
    width: 80%; 
    
}

.column {
    flex: 1;
    padding: 0 10px;
}

.column ul {
    list-style: none;
    padding: 0;
}

.column h2 {
    color: #8A1C14;
    font-size: 20px;
    font-weight: bold;
    margin-top: 20px;
    margin-bottom: 10px;
}
    
.user-info h2 {
    font-size: 20px;
    color: #8A1C14;
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
    display: flex;
    flex-wrap: wrap;
    gap: 60px; /* Default gap */
    justify-content: space-around; /* Distribute space between the items */
    align-items: flex-start; /* Align items to the top */
}

.order {
    background: rgba(255, 255, 255, 0.8);
    border: 1px solid #8A1C14;
    border-radius: 10px;
    padding: 10px;
    margin-bottom: 20px;
    width: 400px; /* Fixed width for each order */
    box-sizing: border-box; /* Include padding and border in the element's total width and height */
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

@media (max-width: 768px) {
    .order-container {
        gap: 10px; 
        justify-content: center; 
    }

    .order {
        width: 90%; 
    }
}

@media (max-width: 576px) {
    .order-container {
        gap: 5px; 
        justify-content: center; 
    }

    .order {
        width: 90%; 
    }
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

@media (max-width: 768px) {
    .btn-custom {
        padding: 10px 30px;
        width: 100%;
        margin: 10px 0;
        font-size: 14px;
    }
}



    </style>
</head>

<body>
    <header>

    </header>
    <div class="content-wrapper">
    <div class="custom-red">
            <p>Hi, Name!</p>
        <button class="btn btn-danger logout">Logout</button>
    </div>

 <div class="tabs-wrapper">
    <div class="scroll-indicator left" id="scroll-left">&lt;</div>
    <ul class="nav nav-tabs" id="tabs-container">
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
    <div class="scroll-indicator right" id="scroll-right">&gt;</div>
</div>





    <div class="tab-content mt-4">
        <div id="myInformation" class="container tab-pane active">
            <div class="user-info">
                <div class="column">
                    <h2>Personal Information</h2>
                    <ul>
                        <li>Name: <span id="name">John</span></li>
                        <li>Birthday: <span id="birthday">1990-01-01</span></li>
                        <li>Gender: <span id="gender">Male</span></li>
                    </ul>
        
                    <h2>Location Information</h2>
                    <ul>
                        <li>Province: <span id="province">Metro Manila</span></li>
                        <li>Store: <span id="store">Doe</span></li>
                        <li>City: <span id="city">Manila</span></li>
                        <li>Barangay: <span id="barangay">Manila</span></li>
                        <li>Street: <span id="street">Manila, San Andres</span></li>
                    </ul>
                </div>
                <div class="column">
                    <h2>Contact Information</h2>
                    <ul>
                        <li>Phone Number: <span id="number">09172380477</span></li>
                        <li>Email: <span id="email">siaproject@gmail.com</span></li>
                    </ul>
                </div>
            </div>
        
            <button class="btn btn-custom" onclick="toggleEditInformation()">Edit Information</button>
            <button class="btn btn-custom" onclick="toggleChangeEmail()">Change Email</button>
            <button class="btn btn-custom" onclick="toggleChangePassword()">Change Password</button>
        </div>

        <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
    <div class="d-flex justify-content-center">
        <div class="order-container" id="pending-orders">
            <div class="order" id="order-0000">
            <div class="text-center">
                <h5>ORDER ID: 0000</h5>
                <p>[ORDER DETAILS]</p>
                <p>Order Status: Preparing order</p>
                <button class="btn btn-secondary" onclick="markOrderAsReceived('order-0000')">Order Received</button>
                <button class="btn btn-danger" onclick="openRefundModal('order-0000')">Refund Request</button>
            </div>
            </div>
            <div class="order" id="order-0001">
                <div class="text-center">
                <h5>ORDER ID: 0001</h5>
                <p>[ORDER DETAILS]</p>
                <p>Order Status: On the way</p>
                <button class="btn btn-secondary" onclick="markOrderAsReceived('order-0001')">Order Received</button>
                <button class="btn btn-danger" onclick="openRefundModal('order-0001')">Refund Request</button>
            </div>
            </div>
            <div class="order" id="order-0002">
            <div class="text-center">
                <h5>ORDER ID: 0002</h5>
                <p>[ORDER DETAILS]</p>
                <p>Order Status: On the way</p>
                <button class="btn btn-secondary" onclick="markOrderAsReceived('order-0002')">Order Received</button>
                <button class="btn btn-danger" onclick="openRefundModal('order-0002')">Refund Request</button>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Refund Request Modal -->
<div class="modal fade" id="refundModal" tabindex="-1" aria-labelledby="refundModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="refundModalLabel">REFUND REQUEST</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="refundForm">
                    <input type="hidden" id="orderId" name="orderId">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="reason" class="form-label">Reason</label>
                                <select class="form-select custom-select" id="reason" name="reason">
                                    <option value="reason1">Wrong item/s</option>
                                    <option value="reason2">Incomplete item/s</option>
                                    <option value="reason3">Something is wrong with the item/s</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="gcashName" class="form-label">GCash Name of Receiver</label>
                                <input type="text" class="form-control" id="gcashName" name="gcashName">
                            </div>
                            <div class="mb-3">
                                <label for="gcashNumber" class="form-label">GCash Number of Receiver</label>
                                <input type="text" class="form-control" id="gcashNumber" name="gcashNumber">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="upload" class="form-label">Upload Picture/Video</label>
                                <input type="file" class="form-control" id="upload" name="upload">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="d-grid text-center">
                         <button type="button" class="btn btn-primary btn-lg" onclick="submitRefundRequest()">Send Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Order Status Container -->
<div id="orderStatusContainer">
    <!-- Existing orders status elements -->
</div>

<!-- Include Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>

<!-- Custom CSS -->
<style>
    /* Custom styling for modal close button specific to refund modal */
    #refundModal .btn-close {
        position: absolute;
        top: 10px;
        right: 10px;
        background: none;
        border: none;
        font-size: 1.5rem;
        color: #000;
        opacity: 0.7;
        cursor: pointer;
    }

    #refundModal .btn-close:hover {
        color: #000;
        opacity: 1;
    }

    #refundModal .btn-close::before {
        content: '×';
    }

    /* Modal Body Styling */
    .modal-body {
        padding: 20px;
    }

    /* Form Labels Styling */
    .form-label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    /* Form Controls Styling */
    .form-control,
    .form-select {
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    /* Custom Select Styling */
    .custom-select {
        padding-right: 38px;
        padding-left: 10px;
        width: 100%;
    }

    /* Button Styling */
    .btn-primary {
        background-color: #8A1C14;
        border: none;
        color: #ffffff;
        transition: background-color 0.3s ease, color 0.3s ease;
        align: center;
        border-radius: 50px; /* Adjust border-radius to make the button more circular */
        height: 60px; /* Set a fixed height for consistency */
        width: 200px;
        margin-top: 10px;
        
    }

    .btn-primary:hover {
        background-color: #a43729;
        border-color: #a43729;
    }

    /* Align modal to center */
    .modal-dialog-centered {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Additional Styling */
    .modal-content {
        border: 2px solid #811b07;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    /* Custom styling for file input to remove the box */
    #upload {
        padding: 0;
        border: none;
        margin-bottom: 10px;
    }

    /* Adjust the column layout to provide more space */
    .col-md-4 {
        padding-left: 10px;
        padding-right: 10px;
    }

    /* Ensure all form controls are the same height */
    .form-control,
    .form-select {
        height: 42px;
    }

    /* Ensure upload button is centered */
    .custom-file {
        text-align: center;
    }
</style>



        
        <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
            <div class="d-flex justify-content-center">
                <div class="order-container" id="completed-orders">

                </div>
            </div>
        </div>
        
        <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
            <div class="d-flex justify-content-center">
                <div class="order-container">
                    <div class="order">
                    <div class="text-center">
                        <h5>ORDER ID: 5678</h5>
                        <p>[ORDER DETAILS]</p>
                        <p>Order Status: Cancelled</p>
                        </div>
                    </div>
                    <div class="order">
                    <div class="text-center">
                        <h5>ORDER ID: 5679</h5>
                        <p>[ORDER DETAILS]</p>
                        <p>Order Status: Cancelled</p>
                        </div>
                    </div>
                    <div class="order">
                    <div class="text-center">
                        <h5>ORDER ID: 5680</h5>
                        <p>[ORDER DETAILS]</p>
                        <p>Order Status: Cancelled</p>
                        </div>
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
                        
                    </div>
                    <div class="modal-footer">
    
                        <button type="button" class="btn btn-primary" onclick="verifyAndSaveEmail()">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Enter Verification Code -->
<div class="modal fade" id="verificationCodeModal" tabindex="-1" aria-labelledby="verificationCodeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verificationCodeModalLabel">Enter Verification Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="verificationCodeInput">Verification Code</label>
                        <input type="text" class="form-control" id="verificationCodeInput" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="verifyCode()">Verify Code</button>
            </div>
        </div>
    </div>
</div>

        <script>
    function verifyAndSaveEmail() {
        const newEmail = document.getElementById('newEmail').value;
        const verificationCode = document.getElementById('verificationCode').value;
        $.ajax({
            url: '/update-email',
            type: 'POST',
            data: {
                email: newEmail,
                code: verificationCode
            },
            success: function(response) {
                alert('Email updated successfully');
                $('#changeEmailModal').modal('hide');
            },
            error: function(error) {
                alert('Error updating email');
            }
        });
    }

    document.getElementById('sendCode').addEventListener('click', function() {
        const newEmail = document.getElementById('newEmail').value;
        $('#verificationCodeModal').modal('show');
        // Optionally, you can store the email to use in the verification code request
        localStorage.setItem('emailForVerification', newEmail);
    });

    function verifyCode() {
        const verificationCode = document.getElementById('verificationCodeInput').value;
        const newEmail = localStorage.getItem('emailForVerification');
        $.ajax({
            url: '/verify-code',
            type: 'POST',
            data: {
                email: newEmail,
                code: verificationCode
            },
            success: function(response) {
                alert('Code verified successfully');
                $('#verificationCodeModal').modal('hide');
            },
            error: function(error) {
                alert('Invalid verification code');
            }
        });
    }

    document.getElementById('resendVerificationCode').addEventListener('click', function() {
        const newEmail = document.getElementById('newEmail').value;
        $.ajax({
            url: '/resend-verification-code',
            type: 'POST',
            data: {
                email: newEmail
            },
            success: function(response) {
                alert('Verification code resent');
            },
            error: function(error) {
                alert('Error resending verification code');
            }
        });
    });
</script>

<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>

        
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
        
                $.ajax({
                    url: '/update-password',
                    type: 'POST',
                    data: {
                        currentPassword: currentPassword,
                        newPassword: newPassword,
                        confirmNewPassword: confirmNewPassword
                    },
                    success: function(response) {
                       
                        alert('Password updated successfully');
                        $('#changePasswordModal').modal('hide');
                    },
                    error: function(error) {
                        alert('Error updating password');
                    }
                });
            }
        </script>
        
       
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
    
    // Update order status
    orderElement.querySelector('p:nth-of-type(2)').textContent = 'Order Status: Delivered';
    
    // Remove the "Order Received" button
    var receivedButton = orderElement.querySelector('button.btn-secondary');
    if (receivedButton) {
        receivedButton.remove();
    }
    
    // Remove the "Refund Request" button
    var refundButton = orderElement.querySelector('button.btn-danger');
    if (refundButton) {
        refundButton.remove();
    }

    // Move completed order to the completed orders container
    var completedOrdersContainer = document.getElementById('completed-orders');
    completedOrdersContainer.appendChild(orderElement);
}

function openRefundModal(orderId) {
    document.getElementById('orderId').value = orderId;
    var refundModal = new bootstrap.Modal(document.getElementById('refundModal'));
    refundModal.show();
}

function submitRefundRequest() {
    var form = document.getElementById('refundForm');
    var formData = new FormData(form);

    // Add your logic here to handle the form submission, e.g., send it to your server
    console.log('Refund Request Submitted:', formData);

    // Close the modal after submission
    var refundModal = bootstrap.Modal.getInstance(document.getElementById('refundModal'));
    refundModal.hide();
}

  function submitRefundRequest() {
        const orderId = document.getElementById('orderId').value;
        const reason = document.getElementById('reason').value;
        const amount = document.getElementById('amount').value;
        const gcashName = document.getElementById('gcashName').value;
        const gcashNumber = document.getElementById('gcashNumber').value;
        const upload = document.getElementById('upload').files[0];
        const description = document.getElementById('description').value;

        // Create a FormData object to send the form data
        let formData = new FormData();
        formData.append('orderId', orderId);
        formData.append('reason', reason);
        formData.append('amount', amount);
        formData.append('gcashName', gcashName);
        formData.append('gcashNumber', gcashNumber);
        formData.append('upload', upload);
        formData.append('description', description);

        $.ajax({
            url: '/submit-refund-request', // URL to handle the form submission
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                alert('Refund Request Sent!');
                $('#refundModal').modal('hide');
                // Optionally, update the UI to reflect the submitted request
                const refundStatus = `<div class="alert alert-success mt-3" role="alert">Refund Request Sent!</div>`;
                $('#orderStatusContainer').append(refundStatus);
            },
            error: function(error) {
                alert('Error submitting refund request');
            }
        });
    }


            </script>
        </body>
        </html>
        
