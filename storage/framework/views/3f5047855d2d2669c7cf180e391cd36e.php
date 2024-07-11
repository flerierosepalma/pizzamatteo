<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoice</title>
</head>
<body>
    <h2>Order Invoice</h2>
    <p>Thank you for your order!</p>
    
    <?php if(is_array($orderDetails) || is_object($orderDetails)): ?>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Toast</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->menu_name); ?></td>
                        <td><?php echo e($item->quantity); ?></td>
                        <td><?php echo e($item->toast); ?></td>
                        <td>₱<?php echo e($item->quantity * $item->menu_price); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <p>Total Amount: ₱<?php echo e($order->order_total_amount); ?></p>
    <?php else: ?>
        <p>No order details found.</p>
    <?php endif; ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\pizzamatteo\resources\views/mails/order_invoice.blade.php ENDPATH**/ ?>