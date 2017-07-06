<?php

include('config.php');

if (isset($_POST['id'])) {
    
    $dbConnection = new mysqli($endpoint, $username, $password, $dbname);
    
    function likePost($id, $dbConnection) {

        if(mysqli_connect_errno()) {
            exit;
        }

        $query = "SELECT * FROM `dev-TellMeSomethingGood`.`good_messages` WHERE `id`='".$id."'";
        $response = $dbConnection->query($query);
        $post = $response->fetch_assoc();
        $likes = $post["likes"];
        $likes++;
        $query = "UPDATE `dev-TellMeSomethingGood`.`good_messages` SET"
                . "`likes`='".$likes."' WHERE `id`='".$id."';";
        $dbConnection->query($query);
        error_log($likes);
        echo $id;

        $dbConnection->close();
    }
    
    likePost($_POST['id'], $dbConnection);
}

