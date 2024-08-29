<?php
require 'QRGenerator.php';
require 'PaymentVerifier.php';

$config = include('config.php');

$transactionId = 'yourtr'; // Example transaction ID

$qrGenerator = new QRGenerator($config['upi_id']);
$qrCodeUrl = $qrGenerator->generateQRCode($config['amount'], $transactionId);

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paymentVerifier = new PaymentVerifier($config['merchant_id'], $config['token']);
    $result = $paymentVerifier->verifyPayment($_POST['utr'], $config['amount']);

    if ($result['status'] == 'success' && $result['message'] == 'Payment status: SUCCESS') {
        $message = "<div class='alert alert-success'>Payment is Valid!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Payment verification failed. Please try again.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Verification</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h2>Recharge</h2>
        </div>
        <div class="card-body">
            <?php echo $message; ?>
            <p><strong>Amount:</strong> ₹<?php echo $config['amount']; ?></p>
            <p><strong>UPI ID:</strong> <?php echo $config['upi_id']; ?></p>
            
            <div class="text-center mb-4">
                <img src="<?php echo $qrCodeUrl; ?>" alt="QR Code">
            </div>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="utr">Enter UTR (Unique Transaction Reference)</label>
                    <input type="text" class="form-control" id="utr" name="utr" required>
                </div>
                <button type="submit" class="btn btn-success btn-block">Submit</button>
            </form>
            <div class="text-center mt-3">
                <button onclick="window.location.href='/index.php'" class="btn btn-secondary">Go Back</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
