$(document).ready(function () {
        var smh=$('#content').offset().top; //함수밖에서 smh의 높이를 한번 계산해야 높이들이 변하지 않음
        //함수 안에서 계산 할 경우 스크롤이 움직이면서 높이가 변해서 오류가 날 수 있음
        
        //character
        var h1= $('#content .con3 ul').offset().top-700;
        //offset은 top부터 ul까지 읽어줌, top값은..(ul로부터 얼만큼??)

        //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
            //스크롤top의 좌표를 담는다
            
            //스크롤의 거리의 범위를 처리
            if(scroll>=h1){
                 $('#content .con3 ul').addClass('boxMove');
                //첫번째 내용 콘텐츠 애니메이
            }
        });
    
        
    
        //about img1
        var h2= $('#content .con1').offset().top-200;
        //offset은 top부터 ul까지 읽어줌, top값은..(ul로부터 얼만큼??)

        //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
            //스크롤top의 좌표를 담는다
            
            //스크롤의 거리의 범위를 처리
            if(scroll>=h2){
                 $('#content .con1 .img1').addClass('boxMove');
                //첫번째 내용 콘텐츠 애니메이
            }
        });
    
    
        //about img2
        var h3= $('#content .con1').offset().top-50;
        //offset은 top부터 ul까지 읽어줌, top값은..(ul로부터 얼만큼??)

        //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
            //스크롤top의 좌표를 담는다
            
            //스크롤의 거리의 범위를 처리
            if(scroll>=h3){
                 $('#content .con1 .img2').addClass('boxMove2');
                //첫번째 내용 콘텐츠 애니메이
            }
        });
    
        
        //about img3
        var h2= $('#content .con1').offset().top-200;
        //offset은 top부터 ul까지 읽어줌, top값은..(ul로부터 얼만큼??)

        //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
            //스크롤top의 좌표를 담는다
            
            //스크롤의 거리의 범위를 처리
            if(scroll>=h2){
                 $('#content .con1 .img3').addClass('boxMove');
                //첫번째 내용 콘텐츠 애니메이
            }
        });
    
    
        //about img4
        var h3= $('#content .con1').offset().top-50;
        //offset은 top부터 ul까지 읽어줌, top값은..(ul로부터 얼만큼??)

        //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
            //스크롤top의 좌표를 담는다
            
            //스크롤의 거리의 범위를 처리
            if(scroll>=h3){
                 $('#content .con1 .img4').addClass('boxMove2');
                //첫번째 내용 콘텐츠 애니메이
            }
        });
    
    
    
});    
