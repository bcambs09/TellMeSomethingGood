<?php

include('config.php');

if (isset($_POST['id'])) {
    
    $dbConnection = new mysqli($endpoint, $username, $password, $dbname);
    
    function unlikePost($id, $dbConnection) {

        if(mysqli_connect_errno()) {
            echo 'You messed up bro - DB connection failed.';
            exit;
        }

        $query = "SELECT * FROM `Tell_Me_Something_Good_Dev`.`good_messages` WHERE `id`='".$id."'";
        $response = $dbConnection->query($query);
        $post = $response->fetch_assoc();
        $likes = $post["likes"];
        $likes--;
        if($likes < 0) $likes = 0;
        $query = "UPDATE `Tell_Me_Something_Good_Dev`.`good_messages` SET"
                . "`likes`='".$likes."' WHERE `id`='".$id."';";
        $dbConnection->query($query);

        echo $id;

        $dbConnection->close();
    }
    
    unlikePost($_POST['id'], $dbConnection);
}
