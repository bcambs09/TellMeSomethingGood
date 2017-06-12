<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>What's Good Today?</title>
    </head>
    <body>
        <h1>What's Good Today?</h1>
        <form action="postMessage.php" method="POST">
            Message:<br>
            <input type="text" name="message">
            <br><br>
            <input type="submit" value="Post Message">
        </form>
        <br><br>
        <a href="index.php?sort=popular">Popular</a>
        <a href="index.php?sort=recent">Recent</a>
        <br><br>
        <?php include 'listPosts.php'; ?>
        <?php include 'addPagination.php'; ?>
    </body>
</html>