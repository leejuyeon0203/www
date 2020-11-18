$(document).ready(function(){
    
    
    //<section 영역의 높이를 브라우저의 높이 값으로 자동 설정하기>
    $(document).ready(function(){

        //변수 ht에 브라우저의 높이값을 저장
        var ht = $(window).height();	
        //브라우저의 높이값을 section의 높이값으로 지정
        $("section").height(ht);

        //브라우저가 리사이즈 될 때마다 브라우저와 section의 높이값을 갱신
        $(window).on("resize",function(){
            ht = $(window).height();	
            $("section").height(ht);
        });	 

    });

    //메뉴 버튼 클릭시
	$("#menu li").on("click",function(e){ //메뉴에 li를 클릭하면
		e.preventDefault();
		
		//변수 ht에 브라우저의 높이값 저장
		var ht = $(window).height(); //윈도우의 높이를 빼네
		
		//변수 i에 현재 클릭한 li의 순서값을 저장
		var i = $(this).index(); //this에 index르빼네 0 1 2 3
		
		//브라우저의 높이값*박스의 순서값은 현재 박스의 스크롤 위치값과 동일
		var nowTop = i*ht;			
	
		//해당 스크롤 위치값으로 문서를 이동
		$("html,body").stop().animate({"scrollTop":nowTop},1400);
	});
    
    
    //<화면이 스크롤 될때마다 현재 영역에 해당하는 메뉴 활성화하기>


    $(window).on("scroll",function(){	//스크롤이 되는순간에

            //변수 ht에 현재 브라우저의 넓이값 저장
            ht = $(window).height(); //1000px

            //변수 scroll에 현재 문서가 스크롤된 거리 저장
            var scroll = $(window).scrollTop();
            
            //초심자용
            /*
            if(scroll>=ht*0 && scroll< ht*1){   // 0~999
                $("#menu li").removeClass();
                $("#menu li").eq(0).addClass("on");
            }
            if(scroll>=ht*1 && scroll< ht*2){   //1000~1999
                $("#menu li").removeClass();
                $("#menu li").eq(1).addClass("on");
            }
            if(scroll>=ht*2 && scroll< ht*3){   //2000~2999
                $("#menu li").removeClass();
                $("#menu li").eq(2).addClass("on");
            }
            if(scroll>=ht*3 && scroll< ht*4){   //3000~3999
                $("#menu li").removeClass();
                $("#menu li").eq(3).addClass("on");
            }
            */
            
            //반복문
            for(var i=0; i<7;i++){ //0 1 2 3 4 5 6 7
                if(scroll>=ht*i && scroll< ht*(i+1)){
                    $("#menu li").removeClass();
                    $("#menu li").eq(i).addClass("on");
                };
            }
        });
    
    
    /*기본적인 기능은 여기까지 다줌*/
    
    
    
    
    
    
    //각각의 section에서 마우스를 움직이면
	$("section").on("mousemove",function(e){   //각각의 section에서 마우스가 움직이면
        // 매개변수e에 마우스의 실제 x/y축의 실제 좌표 
	
		//변수 posX에 마우스 커서의 x축 위치 저장
		var posX= e.pageX;
		//변수 posY에 마우스 커서의 y축 위치 저장
		var posY= e.pageY;
		
		//첫 번째 박스의 이미지 위치값을 마우스 커서의 위치값과 연동
		$(".p11").css({"right":20-(posX/30) , "bottom":20-(posY/30) });
		$(".p12").css({"right":130+(posX/20) , "bottom":-40+(posY/20) });
		$(".p13").css({"right":60+(posX/20) , "top":180+(posY/20) });		
	
		//두 번째 박스의 이미지 위치값을 마우스 커서의 위치값과 연동
		$(".p21").css({"right":-180-(posX/30) , "bottom":-480-(posY/30) });
		$(".p22").css({"right":130+(posX/50) , "bottom":-40+(posY/50) });
		
		//세 번째 박스의 이미지 위치값을 마우스 커서의 위치값과 연동
		$(".p31").css({"right":280-(posX/30) , "bottom":30-(posY/30) });
		$(".p32").css({"right":110+(posX/20) , "bottom":-270+(posY/20) });
		$(".p33").css({"right":-70+(posX/20) , "bottom":-130+(posY/20) });	
		
		//네 번째 박스의 이미지 위치값을 마우스 커서의 위치값과 연동
		$(".p41").css({"right":20-(posX/30) , "bottom":-120-(posY/30) });
		$(".p42").css({"right":0+(posX/20) , "bottom":-180+(posY/20) });	
	});
    
    
    //section위에서 마우스 휠을 움직이면
		$("section").on("mousewheel",function(event,delta){    
            // dleta >> 휠을 위(+1)로 터치 / 아래(-1)로 터치
		
		//마우스 휠을 올렸을때	
          if (delta > 0) {  
			//변수 prev에 현재 휠을 움직인 section에서 이전 section의 offset().top위치 저장
             var prev = $(this).prev().offset().top;
			 //문서 전체를 prev에 저장된 위치로 이동
			 $("html,body").stop().animate({"scrollTop":prev},1400,"easeOutQuad");
              
              return false;
			 
		//마우스 휠을 내렸을때	 
          }else if (delta < 0) {  
			//변수 next에 현재 휠을 움직인 section에서 다음 section의 offset().top위치 저장
			 var next = $(this).next().offset().top;
			 //문서 전체를 next에 저장된 위치로 이동
			 $("html,body").stop().animate({"scrollTop":next},1400,"easeOutQuad"); 
              
              return false;
          }
          
     });
    
});

