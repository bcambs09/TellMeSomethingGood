<?php

error_log("in like post");

if (isset($_POST['id'])) {

    echo $_POST['id'];
    
    function likePost($id) {

        
        $endpoint = 'tellmesomethinggood.c4hut6i7bvsw.us-west-2.rds.amazonaws.com';
        $username = 'brendan';
        $password = 't5U4c8K3r!';
        $dbname = 'Tell_Me_Something_Good_Dev';
        
        $dbConnection = new mysqli($endpoint, $username, $password, $dbname);
        if(mysqli_connect_errno()) {
            echo 'You messed up bro - DB connection failed.';
            exit;
        }

        $query = "SELECT * FROM `Tell_Me_Something_Good_Dev`.`good_messages` WHERE `id`='".$id."'";
        $response = $dbConnection->query($query);
        $post = $response->fetch_assoc();
        $likes = $post["likes"];
        $likes++;
        $query = "UPDATE `Tell_Me_Something_Good_Dev`.`good_messages` SET"
                . "`likes`='".$likes."' WHERE `id`='".$id."';";
        $dbConnection->query($query);

        echo $id;

        $dbConnection->close();
    }
    
    likePost($_POST['id']);
}

