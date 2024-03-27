<?php

require __DIR__ . '/vendor/autoload.php';
$privateKeyLocation = (getenv('GR4VY_KEY_DIR') ?: __DIR__) . "/private_key.pem";
$config = new Gr4vy\Gr4vyConfig("partners", $privateKeyLocation, true, "sandbox", "wikimedia");
$checkoutSession = $config->newCheckoutSession();
$token = $config->getEmbedToken([
    "amount" => 200,
    "currency" => "USD",
], $checkoutSession["id"]);

?>

<!DOCTYPE html>
<html lang="en">
<body>
<h1>Gr4vy Forms</h1>
<ul>
    <li><a href="/embed.php">Embed Payment Form</a></li>
</ul>
</body>
</html>
