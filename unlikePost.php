<?php

include('config.php');

if (isset($_POST['id'])) {
    
    $dbConnection = new mysqli($endpoint, $username, $password, $dbname);
    
    function unlikePost($id, $dbConnection) {

        if(mysqli_connect_errno()) {
            exit;
        }

        $query = "SELECT * FROM `dev-TellMeSomethingGood`.`good_messages` WHERE `id`='".$id."'";
        $response = $dbConnection->query($query);
        $post = $response->fetch_assoc();
        $likes = $post["likes"];
        $likes--;
        if($likes < 0) $likes = 0;
        $query = "UPDATE `dev-TellMeSomethingGood`.`good_messages` SET"
                . "`likes`='".$likes."' WHERE `id`='".$id."';";
        $dbConnection->query($query);

        $dbConnection->close();
    }
    
    unlikePost($_POST['id'], $dbConnection);
}
