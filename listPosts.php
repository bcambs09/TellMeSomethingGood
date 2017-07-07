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
    $query = "SELECT * FROM good_messages WHERE approved='1' ORDER BY likes DESC, id DESC LIMIT $start_from, 10"; 
}else{
    $query = "SELECT * FROM good_messages WHERE approved='1' ORDER BY id DESC LIMIT $start_from, 10";
}

$goalDB = new mysqli($endpoint, $username, $password, $dbname);

if(mysqli_connect_errno()) {
    exit;
}

$posts = $goalDB->query($query);

if ($posts->num_rows > 0) {
    // output data of each row
    while($post = $posts->fetch_assoc()) {
        $formatDateParts = explode(" ", $post["date"]);
        $date = explode("-", $formatDateParts[0]);
        $time = $formatDateParts[1];
        
        echo "<div id=\"post\">".$post["message"]."<br><button type=\"button\" class=\"like\" id=".$post["id"].">Like</button>";
        echo " <p id=\"likeNum\" class=".$post["id"].">".$post["likes"]."</p></div><p class=\"tagline\">By ".$post["nickname"];
        echo " on ".$date[1]."-".$date[2]."-".$date[0]." at ".$time."<br><br>";
    }
} else {
    echo "0 results";
}

$goalDB->close();

