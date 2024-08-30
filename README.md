# UPI Payment Integration Kit

This UPI Payment Integration Kit is designed to simplify the process of integrating UPI-based payments into your PHP projects. With a few lines of code, you can generate a UPI payment QR code and verify transactions using the **Golive.host Bharatpe API**. This kit is ideal for developers looking for an easy and secure way to handle UPI payments without the need for database management.

## How It Works

The integration kit is built with simplicity and modularity in mind. Here's how it works:

1. **Configuration**: All necessary settings, such as the payment amount, merchant ID, API token, and UPI ID, are stored in a single configuration file (`config.php`). This allows you to easily modify these values as needed.

2. **QR Code Generation**: The `QRGenerator.php` script generates a QR code for the payment using the UPI ID and other details. The QR code is displayed on the payment page for users to scan, using the QR API.

3. **Payment Verification**: After the user makes the payment, they submit the Unique Transaction Reference (UTR) through a form. The `PaymentVerifier.php` script then verifies the payment status using the Golive.host Bharatpe API.

## APIs Used

This kit uses the **Golive.host Bharatpe API** to verify the status of UPI payments and a QR code generation API for displaying the payment QR code.

### Golive.host Bharatpe API

- **API Name**: Golive.host Bharatpe Payment Status API
- **Endpoint**: `https://api.golive.host/Payment/Bharatpe/v1`
- **Documentation**: [Golive.host Bharatpe API Docs](https://api.golive.host/Payment/Bharatpe/v1_docs)
- **Parameters**:
  - `merchantId`: Your BharatPe Merchant ID
  - `token`: Your BharatPe API token
  - `action`: The action to perform (`paymentstatus`)
  - `utr`: The Unique Transaction Reference of the payment
  - `amount`: The amount to verify

### QR Code API

- **API Name**: QR Code Generation API
- **Endpoint**: `https://api.golive.host/Generator/QR/v3/`
- **Documentation**: [QR Code API Docs](https://api.golive.host/Generator/QR/v3_docs)

## File Structure

Here is the structure of the key files in this integration kit:

- **`config.php`**: Stores configuration settings such as amount, merchant ID, API token, and UPI ID.
- **`QRGenerator.php`**: Generates a QR code for the UPI payment.
- **`PaymentVerifier.php`**: Verifies the payment status using the Golive.host Bharatpe API.
- **`index.php`**: The main script that ties everything together and provides the user interface.

## How to Integrate

1. Clone or download the repository.
2. Update the `config.php` file with your specific settings:
   - Amount
   - Merchant ID
   - API Token
   - UPI ID
3. Include the files in your project.
4. The `index.php` file will serve as your payment page. Customize it as needed to fit your application's design.

## Contact Us

If you need any assistance or want to integrate this UPI Payment Kit into your project, feel free to contact us:

- **Website**: [GoLive Host Contact Us](https://golive.host/contact-us)
