<?php

include '../config.php';
require_once "../recaptchalib.php";

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
    $goalDB = new mysqli($endpoint, $username, $password, $dbname);

    if(mysqli_connect_errno()) {
        header('Location: /TellMeSomethingGood/error/');
    }

    $stmt = $goalDB->prepare("INSERT INTO good_messages (id, message, nickname) VALUES (NULL, ?, ?)");
    if (!$stmt->bind_param("ss", $text, $nickname)) {
        header('Location: /TellMeSomethingGood/error/');
    }

    if (!$stmt->execute()) {
        header('Location: /TellMeSomethingGood/error/');
    }

    $stmt->close();
    $goalDB->close();
    
    mail("brendan@whatsgoodtoday.com", "New post to review", $text, $nickname);
    header('Location: /TellMeSomethingGood/thank-you/');
} else {
    header('Location: /TellMeSomethingGood/error/');
}
