<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>What's Good Today?</title>
        <link rel="stylesheet" href="../style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="/TellMeSomethingGood/cloudAnimate.js"></script>
        <script src="/TellMeSomethingGood/cloudSpawn.js"></script>
    </head>
    <body class="bodySubmitWrap">
        <div class="headerWrap">
            <div id="headerBar">
                <h1 class="headMessage">What's Good Today?</h1>
                <ul class="navList">
                    <li class="nav"><a class="navLink" href="../">Home</a></li>
                    <li class="slash">|</li>
                    <li class="nav"><a class="navLink" href="https://www.gofundme.com/whats-good-today">Submit Post</a></li>
                    <li class="slash">|</li>
                    <li class="nav"><a class="navLink" href="https://www.gofundme.com/whats-good-today" target="_blank">Support Mental Health</a></li>
                    <li class="slash">|</li>
                    <li class="nav"><a class="navLink" href="https://www.gofundme.com/whats-good-today">About</a></li>
                </ul>
            </div>
        </div>
        <div id="header" class="submitWrap">
            <div class ="animateRight"><img src="/TellMeSomethingGood/images/cloud.png"></div>
            <div id="messagePost">
                <h1>Submit a Post</h1>
                <p>Did you have something good happen to you today? Sometimes it can be hard
                to find the good in a situation, but there is always a positive takeaway. Whether you experienced
                an entirely happy moment, or a sad moment that taught you something useful, share it here to 
                inspire others!</p>
                <br>
                <form action="/TellMeSomethingGood/postMessage.php" method="POST">
                    <div class="formFold">
                        <p>Nickname</p>
                        <input type="text" id="nickname" name="nickname"></input>
                    </div>
                    <br>
                    <br>
                    <textarea id="happyMessage" name="message" placeholder="Tell me something good!"></textarea>
                    <br><br>
                    <div class="g-recaptcha" data-sitekey="6LcY_iYUAAAAACnEJcL5DhKEEHe5FedJPS-UMWLi"></div>
                    <div class="submitSection">
                        <input type="submit" value="Submit" id="submitButton">
                        <p style="display: inline-block; width: 60%; vertical-align: text-top;">Your post will be reviewed by an admin, and it will
                        appear on the homepage if it is approved.</p>
                    </div>
                </form>
            </div>
        </div>
        <div class="footerSubmit">
            <hr class="bottomPage">
            <div id="footer">
                <p style="color: black;">Copyright &copy; <?php echo date("Y"); ?> Brendan Campbell</p>
            </div>
        </div>
    </body>
</html>