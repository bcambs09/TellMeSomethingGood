<?php

include 'config.php';

$text = filter_input(INPUT_POST, 'message');

echo "You said: $text<br>";

$goalDB = new mysqli($endpoint, $username, $password, $dbname);

if(mysqli_connect_errno()) {
    echo 'You messed up bro - DB conenction failed.';
    exit;
}

$stmt = $goalDB->prepare("INSERT INTO good_messages (id, message) VALUES (NULL, ?)");
$stmt->bind_param("s", $text);
$stmt->execute();

$stmt->close();
$goalDB->close();
