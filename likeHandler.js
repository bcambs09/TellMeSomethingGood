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


