<?php

include 'config.php';

$query = 'SELECT * FROM Tell_Me_Something_Good_Dev.good_messages';
$goalDB = new mysqli($endpoint, $username, $password, $dbname);

if(mysqli_connect_errno()) {
    echo 'You messed up bro - DB connection failed.';
    exit;
}

$posts = $goalDB->query($query);

if ($posts->num_rows > 0) {
    // output data of each row
    while($post = $posts->fetch_assoc()) {
        echo $post["message"]."<br>";
    }
} else {
    echo "0 results";
}

$goalDB->close();

