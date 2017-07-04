var id = window.setInterval( function(e) {
    var message = document.getElementById("changeText");
    var classNum = message.className.split(" ")[1];
    if(parseInt(classNum) === 1){
        $("#changeText").removeClass("1");
        $("#changeText").addClass("2");
        message.innerHTML = "HAPPY <i class=\"em em-blush\"></i>";
    }else if(parseInt(classNum) === 2){
        $("#changeText").removeClass("2");
        $("#changeText").addClass("3");
        message.innerHTML = "POSITIVE <i class=\"em em-laughing\"></i>";
    }else if(parseInt(classNum) === 3){
        $("#changeText").removeClass("3");
        $("#changeText").addClass("4");
        message.innerHTML = "OPTIMISTIC <i class=\"em em---1\"></i>";
    }else{
        $("#changeText").removeClass("4");
        $("#changeText").addClass("1");
        message.innerHTML = "GOOD <i class=\"em em-smile\"></i>";
    }
}, 1000);