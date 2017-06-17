<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>What's Good Today?</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <h1>What's Good Today?</h1>
        <a href="https://www.gofundme.com/whats-good-today">Donate to the
            Brain & Behavior Research Foundation</a><br><br>
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
        <script>
            var buttons = document.getElementsByClassName("like");
            for(i = 0; i < buttons.length; i++) {
                (function(i) {
                    var id = buttons[i].id;
                    console.log(id);
                    document.getElementById(id).onclick = function () {
                        var likes = parseInt(document.getElementsByClassName(id)[0].innerHTML);
                        console.log(likes);
                        if(document.getElementById(id).className === "like") {
                            $.ajax({
                                async: true,
                                url  : 'likePost.php',
                                type : 'post',
                                data : {id : id},
                            });
                            document.getElementById(id).innerHTML = "Unlike";
                            likes++;
                            $(this).removeClass("like");
                            $(this).addClass("unlike");
                        }else{
                            $.ajax({
                                async: true,
                                url  : 'unlikePost.php',
                                type : 'post',
                                data : {id : id},
                            });
                            likes--;
                            document.getElementById(id).innerHTML = "Like";
                            $(this).removeClass("unlike");
                            $(this).addClass("like");
                        }
                        document.getElementsByClassName(id)[0].innerHTML = likes;
                    }
                })(i);
            }
        </script>
    </body>
</html>