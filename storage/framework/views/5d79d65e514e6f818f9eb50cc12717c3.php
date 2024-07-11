<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Billing Invoice - Webjourney</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        * {
            font-family: 'Roboto', sans-serif;
            line-height: 26px;
            font-size: 15px;
        }

        /* Table Styles */
        .custom--table {
            width: 100%;
            color: inherit;
            vertical-align: top;
            font-weight: 400;
            border-collapse: collapse;
            margin-top: 0;
        }

        .table-title {
            font-size: 18px;
            font-weight: 600;
            line-height: 32px;
            margin-bottom: 10px;
        }

        .custom--table thead {
            border-top: 1px solid #eee;
            background: #eee;
            font-weight: 700;
            font-size: 16px;
            font-weight: 500;
        }

        .custom--table thead tr {
            text-align: left;
        }

        .custom--table thead tr th {
            text-align: left;
            font-size: 16px;
            padding: 10px 0;
        }

        .custom--table tbody {
            overflow: hidden;
            border-radius: 10px;
        }

        .custom--table tbody tr {
            vertical-align: top;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .custom--table tbody tr td {
            font-size: 14px;
            line-height: 18px;
            vertical-align: top;
            padding: 10px 0;
        }

        .custom--table tbody tr td:last-child {
            padding-bottom: 10px;
        }

        .custom--table tbody tr td .data-span {
            font-size: 14px;
            font-weight: 500;
            line-height: 18px;
        }

        /* Invoice Area Styles */
        .invoice-area {
            padding: 10px 0;
        }

        .invoice-wrapper {
            max-width: 650px;
            margin: 0 auto;
            box-shadow: 0 0 10px #f3f3f3;
            padding: 0px;
        }

        .invoice-header {
            margin-bottom: 40px;
        }

        .invoice-flex-contents {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            flex-wrap: wrap;
        }

        .invoice-title {
            font-size: 25px;
            font-weight: 700;
            text-align: center;
        }

        .invoice-details {
            margin-top: 20px;
        }

        .invoice-details-flex {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 24px;
            flex-wrap: wrap;
            border: none;
            background: none;
        }

        .invoice-details-title {
            font-size: 18px;
            font-weight: 700;
            line-height: 32px;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .invoice-single-details {
            width: 48%;
            border: none;
            background: none;
            padding: 0;
        }

        .details-list {
            margin: 0;
            padding: 0;
            list-style: none;
            margin-top: 10px;
        }

        .details-list .list {
            font-size: 14px;
            font-weight: 400;
            line-height: 18px;
            color: #666;
            margin: 0;
            padding-top: 5px;
            transition: all .3s;
        }

        .details-list .list strong {
            font-size: 14px;
            font-weight: 500;
            line-height: 18px;
            color: #666;
            margin: 0;
            padding: 0;
            transition: all .3s;
        }

        .details-list .list a {
            display: inline-block;
            color: #666;
            transition: all .3s;
            text-decoration: none;
            margin: 0;
            line-height: 18px;
        }

        /* Product and Invoice Total Styles */
        .item-description {
            margin-top: 10px;
            padding: 10px;
        }

        .products-item {
            text-align: left;
        }

        .invoice-total-count .list-single {
            display: flex;
            align-items: center;
            gap: 30px;
            font-size: 16px;
            line-height: 28px;
        }

        .invoice-subtotal {
            padding-bottom: 15px;
        }

        .invoice-total {
            padding-top: 10px;
        }

        .invoice-flex-footer {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
        }

        .single-footer-item {
            flex: 1;
        }

        .single-footer {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .single-footer .icon {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 30px;
            width: 30px;
            font-size: 16px;
            background-color: #000e8f;
            color: #fff;
        }

        /* Table Without Lines Styles */
        table.no-lines {
            border-collapse: collapse;
            width: 100%;
        }

        table.no-lines th,
        table.no-lines td {
            border: none;
            padding: 10px;
            text-align: left;
        }

        /* Equal Width Columns */
        .equal-width td {
            width: 50%;
        }
    </style>
</head>

<body>

    <!-- Invoice area Starts -->
    <div class="invoice-area">
        <div class="invoice-wrapper">
            <div class="invoice-header">
                <h1 class="invoice-title">Pizza Matteo Invoice</h1>
            </div>
            <div class="invoice-details">
                <table class="no-lines equal-width">
                    <tr>
                        <td>
                            <span style="font-size: 30px; font-weight: bold;">Order No: #0000</span><br>
                            <span>Invoice No: 12345</span>
                        </td>
                        <td>
                            <span>Invoice Date: 20 May, 2024</span><br>
                            <span>Status: Paid</span>
                        </td>
                    </tr>
                </table>



        

            <table class="no-lines">
                <tr>
                    <td class="invoice-single-details">
                        <h2 class="invoice-details-title">Invoice To:</h2>
                        <ul class="details-list">
                            <li class="list">Customer Name</li>
                            <li class="list">customer@gmail.com</li>
                            <li class="list">0167846483</li>
                        </ul>
                    </td>
                    <td class="invoice-single-details">
                        <h4 class="invoice-details-title">Invoice From:</h4>
                        <ul class="details-list">
                            <li class="list">Reseller Name</li>
                            <li class="list">Branch Name</li>
                            <li class="list">reseller@gmail.com</li>
                            <li class="list">0167846483</li>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>

        <div class="item-description">
            <table class="custom--table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Toast</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>House Cleaning</td>
                        <td>Yes</td>
                        <td>3</td>
                        <td>$10</td>
                        <td>$30</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2"><strong>Overall Total:</strong></td>
                        <td>$70</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
            <table class="no-lines">
                <tr>
                    <td class="invoice-single-details">
                        <h2 class="invoice-details-title">Customer Payment</h2>
                        <ul class="details-list">
                            <li class="list">Payment Method:</li>
                            <li class="list">Paid Amount:</li>
                            <li class="list">Gcash Number: </li>
                            <li class="list">Gcash Name: </li>
                        </ul>
                    </td>
                    <td class="invoice-single-details">
                        <h4 class="invoice-details-title">Reseller Payment</h4>
                        <ul class="details-list">
                            <li class="list">Reseller Account No:</li>
                            <li class="list">Gcash Number: </li>
                            <li class="list">Gcash Name: </li>
                            <li class="list"></li>
                        </ul>
                    </td>
                </tr>
            </table>
   

        <div class="item-description">
            <div class="table-responsive">
                <table class="custom--table no-lines">
                    <tr>
                        <td colspan="3">
                            <span class="data-span">Terms and Condition: </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque dolorem earum fugiat id ipsum nisi officia optio repellat ut? Cum.
                        </td>
                    </tr>
                </table>
            </div>
        </div>


<!-- Invoice area Ends -->

</body>
</html>
<?php /**PATH C:\xampp\htdocs\pizzamatteo\resources\views/mails/invoice.blade.php ENDPATH**/ ?>