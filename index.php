<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>What's Good Today?</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <div id="header">
            <a id="donate" href="https://www.gofundme.com/whats-good-today">Donate</a>
            <h1 class="headMessage">What's Good Today?</h1>
            <div id="messagePost">
                <form action="postMessage.php" method="POST">
                    <br>
                    <textarea id="happyMessage" name ="message" placeholder="Tell me something good"></textarea>
                    <br><br>
                    <div class="g-recaptcha" data-sitekey="6LcY_iYUAAAAACnEJcL5DhKEEHe5FedJPS-UMWLi"></div>
                    <br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
        <div id="sorting">
            <div id="buttons">
                <?php
                    $sort = "recent";
                    if (isset($_GET["sort"])) {
                        $sort = filter_input(INPUT_GET, "sort");

                    }
                    if($sort == "popular"){
                        echo "<a href='index.php?sort=popular' class='sort sortActive'>Popular</a>
                              <a href='index.php?sort=recent' class='sort'>Recent</a>";
                    }else{
                        echo "<a href='index.php?sort=popular' class='sort'>Popular</a>
                              <a href='index.php?sort=recent' class='sort sortActive'>Recent</a>";
                    }
                ?>
                
            </div>
        </div>
        <div id="dirt">
            <div id="postList">
                <br><br>
                <?php include 'listPosts.php'; ?>
                <?php include 'addPagination.php'; ?>
                <script src="likeHandler.js"></script>
            </div>
            <hr>
            <div id="footer">
                <p>Copyright &copy; <?php echo date("Y"); ?> Brendan Campbell</p>
            </div>
        </div>
    </body>
</html>