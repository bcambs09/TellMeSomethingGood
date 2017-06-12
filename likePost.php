<?php

include 'config.php';

if (isset($_GET["id"])) {
    $id = filter_input(INPUT_GET, "id");

    $dbConnection = new mysqli($endpoint, $username, $password, $dbname);

    $query = "SELECT * FROM `Tell_Me_Something_Good_Dev`.`good_messages` WHERE `id`='".$id."'";
    $response = $dbConnection->query($query);
    $post = $response->fetch_assoc();
    $likes = $post["likes"];
    $likes++;
    $query = "UPDATE `Tell_Me_Something_Good_Dev`.`good_messages` SET"
            . "`likes`='".$likes."' WHERE `id`='".$id."';";
    $dbConnection->query($query);

    $dbConnection->close();
}

header("Location: http://localhost:8888/TellMeSomethingGood/"); /* Redirect browser */
exit();

