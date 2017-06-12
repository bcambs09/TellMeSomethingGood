<?php

include 'config.php';

$query = "SELECT * FROM good_messages";
$goalDB = new mysqli($endpoint, $username, $password, $dbname);
$posts = $goalDB->query($query);
$total_records = $posts->num_rows;  //count number of records
$total_pages = ceil($total_records / 10); 

echo "<a href='index.php?page=1'>".'<<'."</a> "; // Goto 1st page  

for ($i=$page-2; $i<=$page; $i++) { 
    if($i > 0) echo "<a href='index.php?page=".$i."'>".$i."</a> "; 
}
for ($i=$page+1; $i<=$page+2; $i++) { 
    if($i <= $total_pages) echo "<a href='index.php?page=".$i."'>".$i."</a> "; 
}
echo "<a href='index.php?page=$total_pages'>".'>>'."</a> "; // Goto last page

