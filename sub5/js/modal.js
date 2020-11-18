$(document).ready(function(){

    $('.events li').each(function(index){

        $(this).click(function(){
            $('.modal_box').fadeIn('normal');
            $('.event'+ (index+1)).css('transform', 'scaleX(1)');
        });

        $('.modal_box').click(function(){
            $('.modal_box').fadeOut('fast');
            $('.event' + (index+1)).css('transform', 'scaleX(0)');
        });
    });
    
    // index.html에서 sub페이지(a=1/a=2/a=3)로 이동했을 때의 스타일 적용
    var purl=window.location; 
    tmp=String(purl).split('?');
    if(tmp[1] != undefined){
    tmp2=tmp[1].split('='); 

    if(tmp2[1] == 1) {
        $("html, body").stop().animate({"scrollTop":800}, 500, function(){
            $('.modal_box').fadeIn('normal');
            $('.event1').css('transform', 'scaleX(1)');
        })
    } else if(tmp2[1] == 2) {
        $("html, body").stop().animate({"scrollTop":800}, 500, function(){
            $('.modal_box').fadeIn('normal');
            $('.event2').css('transform', 'scaleX(1)');
        })
    } else if(tmp2[1] == 3) {
        $("html, body").stop().animate({"scrollTop":1400}, 500, function(){
            $('.modal_box').fadeIn('normal');
            $('.event3').css('transform', 'scaleX(1)');
        })
    } else if(tmp2[1] == 4) {
        $("html, body").stop().animate({"scrollTop":1800}, 500, function(){
            $('.modal_box').fadeIn('normal');
            $('.md7').css('transform', 'scaleX(1)');
        })
    }
    
    }
    
});