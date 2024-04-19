<?php

require __DIR__ . '/vendor/autoload.php';

$privateKeyLocation = (getenv('GR4VY_KEY_DIR') ?: __DIR__) . "/private_key.pem";
$config = new Gr4vy\Gr4vyConfig("wikimedia", $privateKeyLocation, true, "sandbox");

$checkoutSession = $config->newCheckoutSession();
$token = $config->getEmbedToken([
    "amount" => 200,
    "currency" => "USD",
], $checkoutSession["id"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Embed POC</title>
    <script src="https://cdn.partners.gr4vy.app/embed.latest.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        #payment-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<form action="/checkout.php" id="payment-form">
    <div class="container"></div>
    <input type="submit"/>
</form>

<script>
    gr4vy.setup({
        gr4vyId: "wikimedia",
        element: ".container",
        form: "#payment-form",
        amount: 200,
        currency: "USD",
        country: "US",
        token: '<?php echo $token; ?>',
        environment: "sandbox"
    });
</script>
</body>
</html>