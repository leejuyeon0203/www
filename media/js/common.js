$(document).ready(function() {

    //topmenu > top_move
        $('.topmenu').click(function(){
              //상단으로 스르륵 이동합니다.
           $('html,body').stop().animate({'scrollTop':0},1000); 
        }); //여기까지 공통js => commom js에 놓고 쓰면 됨
    
});
