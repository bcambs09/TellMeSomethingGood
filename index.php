<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>What's Good Today?</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="./cloudAnimate.js"></script>
        <script src="./cloudSpawn.js"></script>
        <script src="./animateMessage.js"></script>
        <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    </head>
    <body>
        <div class="headerWrap">
            <div id="headerBar">
                <h1 class="headMessage">What's Good Today?</h1>
                <ul class="navList">
                    <li class="nav"><a class="navLink" href=".">Home</a></li>
                    <li class="slash">|</li>
                    <li class="nav"><a class="navLink" href="./submit">Submit Post</a></li>
                    <li class="slash">|</li>
                    <li class="nav"><a class="navLink" href="https://www.gofundme.com/whats-good-today" target="_blank">Support Mental Health</a></li>
                    <li class="slash">|</li>
                    <li class="nav"><a class="navLink" href="https://www.gofundme.com/whats-good-today">About</a></li>
                </ul>
            </div>
        </div>
        <div id="header">
            <div class="animateRight"><img src="./images/cloud.png"></div>
            <div class="introMessage">
                <br>
                <p class="introText">Tell me something...</p>
                <br>
                <p class="introText 1" id="changeText">GOOD <i class="em em-smile"></i></p>
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
            <div id="content">
                <div id="postList">
                    <div id="postsOnly">
                        <?php include 'listPosts.php'; ?>
                    </div>
                    <?php include 'addPagination.php'; ?>
                    <script src="likeHandler.js"></script>
                </div>
                <div id="sidebar">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- WhatsGoodTodayMediumRect -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:300px;height:250px"
                         data-ad-client="ca-pub-3367848530373976"
                         data-ad-slot="1396128844"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
            <hr class="bottomPage">
            <div id="footer">
                <p>Copyright &copy; <?php echo date("Y"); ?> Brendan Campbell</p>
            </div>
        </div>
    </body>
</html>