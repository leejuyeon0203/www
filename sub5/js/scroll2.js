$(document).ready(function () {
        //스크롤 탭 클릭 시 이동
        $('.tabs .tab').click(function(){
           var value=0;
            
            if($(this).hasClass('tab1')){
                value=$('.content_area .contlist:eq(0)').offset().top-120;
            }else if($(this).hasClass('tab2')){
                value=$('.content_area .contlist:eq(1)').offset().top-115;
            }
            $("html,body").stop().animate({"scrollTop":value},1000);//value값 +상단 헤더 덮일 거 생각해서 +값 주기
        });
});