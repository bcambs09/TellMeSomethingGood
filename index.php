<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>What's Good Today?</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="header">
            <a class="donate" href="https://www.gofundme.com/whats-good-today">Donate to the
                Brain & Behavior Research Foundation</a>
        </div>
        <h1 class="headMessage">What's Good Today?</h1>
        <div id="messagePost">
            <form action="postMessage.php" method="POST">
                Message:<br>
                <input type="text" name="message">
                <br><br>
                <input type="submit" value="Post Message">
            </form>
        </div>
        <br><br>
        <div id="postList">
            <a href="index.php?sort=popular">Popular</a>
            <a href="index.php?sort=recent">Recent</a>
            <br><br>
            <?php include 'listPosts.php'; ?>
            <?php include 'addPagination.php'; ?>
            <script src="likeHandler.js"></script>
        </div>
    </body>
</html>