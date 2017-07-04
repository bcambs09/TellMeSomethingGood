window.setInterval(function(e) {
    if(document.hasFocus()) {
        var img = document.createElement("img");
        img.src = "/TellMeSomethingGood/images/cloud.png";
        var cloud = document.createElement("div");
        cloud.className = "animateRight";
        var height = (Math.random()*150) + 60;
        cloud.style.top = height + 'px';
        cloud.appendChild(img);
        document.getElementById("header").appendChild(cloud);
    }
}, 8000);




