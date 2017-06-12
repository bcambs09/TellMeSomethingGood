<?php

include 'config.php';

if (isset($_GET["page"])) {
    $page = filter_input(INPUT_GET, "page");
    
} else {
    $page=1;
}

if (isset($_GET["sort"])) {
    $sort = filter_input(INPUT_GET, "sort");
    
} else {
    $sort = "recent";
}

$start_from = ($page-1) * 10;
if($sort == "popular") {
    $query = "SELECT * FROM good_messages ORDER BY likes DESC, id DESC LIMIT $start_from, 10"; 
}else{
    $query = "SELECT * FROM good_messages ORDER BY id DESC LIMIT $start_from, 10";
}

$goalDB = new mysqli($endpoint, $username, $password, $dbname);

if(mysqli_connect_errno()) {
    echo 'You messed up bro - DB connection failed.';
    exit;
}

$posts = $goalDB->query($query);

if ($posts->num_rows > 0) {
    // output data of each row
    $numPost = 1;
    while($post = $posts->fetch_assoc()) {
        echo $post["message"]." ".$post["likes"]."<br>";
        echo "<a href=likePost.php?id=".$post["id"].">Like</a><br><br>";
        $numPost++;
    }
} else {
    echo "0 results";
}

$goalDB->close();

