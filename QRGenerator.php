<?php
class QRGenerator
{
    private $upi;

    public function __construct($upi)
    {
        $this->upi = $upi;
    }

    public function generateQRCode($amount, $transactionId)
    {
        $qrData = "upi://pay?pa=" . urlencode($this->upi) .
                  "&pn=NAME" .
                  "&tr=" . urlencode($transactionId) .
                  "&am=" . urlencode($amount) .
                  "&cu=INR";
        return "https://api.golive.host/Generator/QR/v3?size=300x300&data=" . urlencode($qrData);
    }
}

// Usage Example
$config = include('config.php');
$qrGenerator = new QRGenerator($config['upi_id']);
$qrCodeUrl = $qrGenerator->generateQRCode($config['amount'], 'yourtr'); // Example usage
?>
