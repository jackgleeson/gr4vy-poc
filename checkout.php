<?php

require __DIR__ . '/vendor/autoload.php';
if(!empty($_GET['gr4vy_transaction_id'])) {
    $transactionId = $_GET['gr4vy_transaction_id'];
    $privateKeyLocation = (getenv('GR4VY_KEY_DIR') ?: __DIR__) . "/private_key.pem";

    $config = new Gr4vy\Gr4vyConfig("partners", $privateKeyLocation, true, "sandbox", "wikimedia");
    $transactionInfo = $config->getTransaction($transactionId);

    echo '<pre>';
    print_r($transactionInfo);
    echo '</pre>';
} else {
    echo "no 'gr4vy_transaction_id' query param present. something went wrong!";
}


