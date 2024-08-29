<?php
class PaymentVerifier
{
    private $merchantId;
    private $token;

    public function __construct($merchantId, $token)
    {
        $this->merchantId = $merchantId;
        $this->token = $token;
    }

    public function verifyPayment($utr, $amount)
    {
        $url = "https://api.golive.host/Payment/Bharatpe/v1?merchantId={$this->merchantId}&token={$this->token}&action=paymentstatus&utr={$utr}&amount={$amount}";
        $response = file_get_contents($url);
        return json_decode($response, true);
    }
}

// Usage Example
$config = include('config.php');
$paymentVerifier = new PaymentVerifier($config['merchant_id'], $config['token']);
$result = $paymentVerifier->verifyPayment($_POST['utr'], $config['amount']); // Example usage
?>
