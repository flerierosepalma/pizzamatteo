<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb-4">Invoice</h1>
                <address>
                    <strong>Pizza Matteo</strong><br>
                    123 Main Street<br>
                    Cityville, ABC 12345<br>
                    Email: info@pizzamatteo.com
                </address>
            </div>
            <div class="col-md-6 text-md-end">
                <p><strong>Invoice Date:</strong> January 1, 2024</p>
                <p><strong>Due Date:</strong> January 31, 2024</p>
                <p><strong>Invoice Number:</strong> INV-001</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <h4>Customer Information:</h4>
                <address>
                    <strong>Customer Name:</strong> John Doe<br>
                    <strong>Address:</strong> 456 Elm Street, Townsville<br>
                    <strong>Email:</strong> john.doe@example.com<br>
                    <strong>Phone:</strong> 555-123-4567
                </address>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Pepperoni Pizza</td>
                            <td>$10.99</td>
                            <td>2</td>
                            <td>$21.98</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Cheese Pizza</td>
                            <td>$9.99</td>
                            <td>1</td>
                            <td>$9.99</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Soft Drinks</td>
                            <td>$1.99</td>
                            <td>3</td>
                            <td>$5.97</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <p class="fw-bold">Thank you for your business!</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p><strong>Subtotal:</strong> $37.94</p>
                <p><strong>Tax (10%):</strong> $3.79</p>
                <p><strong>Total:</strong> $41.73</p>
            </div>
        </div>
    </div>
</body>

</html>
