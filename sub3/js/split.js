$(document).ready(function(){
    
    var purl=window.location; 
    tmp=String(purl).split('?');
    
    if(tmp[1] != undefined){
    tmp2=tmp[1].split('='); 

    if(tmp2[1] == 0) {
        $("html, body").stop().animate({"scrollTop":650}, 500);
    } else if(tmp2[1] == 1) {
        $("html, body").stop().animate({"scrollTop":1200}, 500);
    } else if(tmp2[1] == 2) {
        $("html, body").stop().animate({"scrollTop":1740}, 500);
    } else if(tmp2[1] == 3) {
        $("html, body").stop().animate({"scrollTop":2280}, 500);
    } else if(tmp2[1] == 4) {
        $("html, body").stop().animate({"scrollTop":2820}, 500);
    } else if(tmp2[1] == 5) {
        $("html, body").stop().animate({"scrollTop":1800}, 500);
    }
}

});





