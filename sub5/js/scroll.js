$(document).ready(function () {
        $('.navBox .subnav li:eq(0)').find('a').addClass('spy'); //서브네비 첫번째li에 a를 찾아서 spy를 붙여줘라. 
        //첫번째 서브메뉴 활성화
        $('#content .nav:eq(0)').addClass('boxMove'); //컨텐츠안에 있는 첫번째div에 boxmove를 붙여줘라.
        //첫번째 내용글 애니메이션 처리
        var smh=$('.navBox').offset().top-220; //함수밖에서 smh의 높이를 한번 계산해야 높이들이 변하지 않음
        //함수 안에서 계산 할 경우 스크롤이 움직이면서 높이가 변해서 오류가 날 수 있음
        var h1= $('#content .nav:eq(0)').offset().top+300;
        var h2= $('#content .nav:eq(1)').offset().top+300;
        
         //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop(); //스크롤top의 좌표를 담는다
            //sticky menu 처리
            if(scroll>smh){ 
                $('.navBox').addClass('navOn');
                $('header').css('display','none');
                //스크롤의 거리가 350px 이상이면 서브메뉴 고정
            }else{
                $('.navBox').removeClass('navOn');
                $('header').css('display','block');
                //스크롤의 거리가 350px 보다 작으면 서브메뉴 원래 상태로
            }
            $('.subnav li').find('a').removeClass('spy');
            //모든 서브메뉴 비활성화~ 불꺼!!!
            
            
            //스크롤의 거리의 범위를 처리
            if(scroll>=0 && scroll<h1){
                $('.subnav li:eq(0)').find('a').addClass('spy');
                //첫번째 서브메뉴 활성화
                
                $('#content .nav:eq(0)').addClass('boxMove');
                //첫번째 내용 콘텐츠 애니메이
            }else if(scroll>=h1 && scroll<h2){
                $('.subnav li:eq(1)').find('a').addClass('spy');
                //두번째 서브메뉴 활성화
                
                 $('#content .nav:eq(1)').addClass('boxMove');
            }
        });
    });