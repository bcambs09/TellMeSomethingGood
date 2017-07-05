<?php

include 'config.php';
require_once "recaptchalib.php";

$response = null;
 
$reCaptcha = new ReCaptcha($secret);

$text = filter_input(INPUT_POST, 'message');
$nickname = filter_input(INPUT_POST, 'nickname');

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

    $stmt = $goalDB->prepare("INSERT INTO good_messages (id, message, nickname) VALUES (NULL, ?, ?)");
    if (!$stmt->bind_param("ss", $text, $nickname)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    $stmt->close();
    $goalDB->close();
} else {
    echo "INTRUDER<br>";
}
