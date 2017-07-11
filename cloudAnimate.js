var id = window.setInterval( function(e) {
    if(document.hasFocus()) {
        var elemsRight = document.getElementsByClassName("animateRight");
        for(var i = 0; i < elemsRight.length; i++) {
            var pos = parseFloat(elemsRight[i].style.left);
            if(isNaN(pos)) {
                pos = -350;
            }
            if (pos === screen.width) {
                var parent = document.getElementById("header");
                parent.removeChild(elemsRight[i]);
            } else {
                pos += 0.5; 
                elemsRight[i].style.left = pos + 'px';
            }
        }
    }
}, 10);

