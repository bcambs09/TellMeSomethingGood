<?php

include 'config.php';
require_once "recaptchalib.php";

$response = null;
 
$reCaptcha = new ReCaptcha($secret);

$text = filter_input(INPUT_POST, 'message');

if (filter_input(INPUT_POST, 'g-recaptcha-response')) {
    $response = $reCaptcha->verifyResponse(
        filter_input(INPUT_SERVER, 'REMOTE_ADDR'),
        filter_input(INPUT_POST, 'g-recaptcha-response')
    );
}

if ($response != null && $response->success) {
    echo "You said: $text<br>";
    $goalDB = new mysqli($endpoint, $username, $password, $dbname);

    if(mysqli_connect_errno()) {
        echo 'You messed up bro - DB connection failed.';
        exit;
    }

    $stmt = $goalDB->prepare("INSERT INTO good_messages (id, message) VALUES (NULL, ?)");
    $stmt->bind_param("s", $text);
    $stmt->execute();

    $stmt->close();
    $goalDB->close();
} else {
    echo "INTRUDER<br>";
}
