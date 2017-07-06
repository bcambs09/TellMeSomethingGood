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
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script type="text/javascript">
          (function() {
            var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
            li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
          })();
        </script>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
          (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-3367848530373976",
            enable_page_level_ads: true
          });
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=0.35" />
    </head>
    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
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
                    <li class="nav"><a class="navLink" href="/TellMeSomethingGood/about/">About</a></li>
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
                    <div class="ad">
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
                    <div class="socialShare">
                       <h1>Sharing is Caring</h1>
                    <br>
                    <div class="fb-share-button" data-href="http://whatsgoodtoday.com" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwhatsgoodtoday.com%2F&amp;src=sdkpreparse">Share</a></div>
                    <br><br>
                    <div class="g-plus" data-action="share" data-annotation="bubble" data-height="24" data-href="http://www.whatsgoodtoday.com"></div>
                    <br><br>
                    <a href="https://twitter.com/share" class="twitter-share-button" data-size="large" data-text="Share life&#39;s happy moments on What&#39;s Good Today!" data-url="http://whatsgoodtoday.com" data-hashtags="whatsgoodtoday" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    <br><br>
                    <su:badge layout="2"></su:badge>
                        
                    </div>
                </div>
            </div>
            <hr class="bottomPage">
            <div id="footer">
                <p>Copyright &copy; <?php echo date("Y"); ?> Brendan Campbell</p>
            </div>
        </div>
    </body>
</html>