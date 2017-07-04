<?php

include 'config.php';

$query = "SELECT * FROM good_messages WHERE approved='1'";
$goalDB = new mysqli($endpoint, $username, $password, $dbname);
$posts = $goalDB->query($query);
$total_records = $posts->num_rows;  //count number of records
$total_pages = ceil($total_records / 10); 

echo "<div id=\"paginationDiv\"><ul id='pageNumbers'>"; // Goto 1st page  

if($page < 0 || $page > $total_pages) $page = 1;

if($page > 3) {
    echo "<li id='pageList'><a id='pagination' href='index.php?page=1'>1</a></li><li id='pageList'>...</li>";
}

for ($i=$page-2; $i<$page; $i++) { 
    if($i > 0){ echo "<li id='pageList'><a id='pagination' href='index.php?page=".$i."'>".$i."</a></li>"; }
}

echo "<li id='pageList'><a id='pagination' class='active' href='index.php?page=".$page."'>".$page."</a></li>";

for ($i=$page+1; $i<=$page+2; $i++) { 
    if($i <= $total_pages){ echo "<li id='pageList'><a id='pagination' href='index.php?page=".$i."'>".$i."</a></li>"; }
}

if($page < $total_pages-2) {
    echo "<li id='pageList' class='dots'>...</li><li id='pageList'><a id='pagination' href='index.php?page=".$total_pages."'>".$total_pages."</a></li>";
}

echo "</div>";

