<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>What's Good Today?</title>
        <link rel="stylesheet" href="../style.css">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body class="bodySubmitWrap">
        <div class="headerWrap">
            <div id="headerBar">
                <img class="headMessage" src="/TellMeSomethingGood/images/whatsgoodtoday_logo_small.png">
                <ul class="navList">
                    <li class="nav"><a class="navLink" href="../">Home</a></li>
                    <li class="slash">|</li>
                    <li class="nav"><a class="navLink" href="/TellMeSomethingGood/submit/">Submit Post</a></li>
                    <li class="slash">|</li>
                    <li class="nav"><a class="navLink" href="https://www.gofundme.com/whats-good-today" target="_blank">Support Mental Health</a></li>
                    <li class="slash">|</li>
                    <li class="nav"><a class="navLink" href="/TellMeSomethingGood/about/">About</a></li>
                </ul>
            </div>
        </div>
        <div id="header" class="submitWrap">
            <div id="messagePost">
                <p> Hi, thanks for visiting What's Good Today! My name is Brendan Campbell, and I am the founder of What's Good Today.
                    <br><br>
                Happiness for myself and others has always been important to me. I hope that my website makes you feel the same way.
                <br><br>
                If you have any questions or inquiries, contact me here:
                <br><br>
                </p>
                <?php
                    $action = (isset($_REQUEST['action']) ? $_REQUEST['action'] : null);
                    if ($action=="")    /* display the contact form */
                    {
                ?>
                        <form  action="" method="POST" enctype="multipart/form-data">
                        <input class="contactInput" type="hidden" name="action" value="submit">
                        Your name:<br>
                        <input class="contactInput" name="name" type="text" value="" size="30"/><br><br>
                        Your email:<br>
                        <input class="contactInput" name="email" type="text" value="" size="30"/><br><br>
                        Your message:<br>
                        <textarea id="happyMessage" name="message" rows="7" cols="30"></textarea><br>
                        <input type="submit" value="Send email"/>
                        </form>
                <?php
                    }else                /* send the submitted data */
                        {
                            $name=$_REQUEST['name'];
                            $email=$_REQUEST['email'];
                            $message=$_REQUEST['message'];
                            if (($name=="")||($email=="")||($message==""))
                                {
                                echo "All fields are required. Please <a href=\"\">click here to try again</a>.";
                                }
                            else{        
                                $from="From: $name<$email>\r\nReturn-path: $email";
                                $subject="What's Good Today message!";
                                mail("brendan@whatsgoodtoday.com", $subject, $message, $from);
                                echo "Email sent!";
                                }
                        }  
                    ?>
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