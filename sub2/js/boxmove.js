$(document).ready(function () {
        
        $('.content_text:eq(0)').addClass('boxMove'); //컨텐츠안에 있는 첫번째div에 boxmove를 붙여줘라.
        //첫번째 내용글 애니메이션 처리

        
         //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
            //스크롤top의 좌표를 담는다
            
            
            $('.text').text(scroll);
            //스크롤 좌표의 값을 찍는다.
            

            
            //스크롤의 거리의 범위를 처리
            if(scroll>=0 && scroll<400){
                $('.content_text .book_scroll:eq(0)').addClass('boxMove');
                //첫번째 내용 콘텐츠 애니메이
            }else if(scroll>=1300 && scroll<1600){
                 $('.content_text .book_scroll:eq(1)').addClass('boxMove2');
            }else if(scroll>=2100 && scroll<3000){
                 $('.content_text .book_scroll:eq(2)').addClass('boxMove');
            }
        });


    });