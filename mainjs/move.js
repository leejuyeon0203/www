/*
// JavaScript Document

$(document).ready(function() {

    var timeonoff;   //타이머 처리  홍길동 정보
    var imageCount=4;   //이미지개수
    var cnt=1;   //이미지 순서 1 2 3 4 5 1 2 3 4 5....
    var onoff=true; // true=>타이머 동작중 , false=>동작하지 않을때
    
    $('.btn1').css('background','#169dd9'); //첫번째 불켜
    $('.btn1').css('width','30');
    
    $('.gallery .link1').fadeIn('slow'); //첫번째 이미지 보인다..
 
    function moveg(){
      cnt++;  //카운트 1씩 증가.. 5가되면 다시 초기화 0  1 2 3 4 5 1 2 3 4 5..
     for(var i=1;i<=imageCount;i++){
            $('.gallery .link'+i).hide(); //모든 이미지를 보이지 않게.
     }
     $('.gallery .link'+cnt).fadeIn('slow'); //자신만 이미지가 보인다..
	 		                    
     for(var i=1;i<=imageCount;i++){
          $('.btn'+i).css('background','#eaeaea'); //버튼불다꺼!!
         $('.btn'+i).css('width','16'); 
      }
      $('.btn'+cnt).css('background','#169dd9');//자신만 불켜
        $('.btn'+cnt).css('width','30');                
       if(cnt==imageCount)cnt=0;
     }
    timeonoff= setInterval( moveg , 4000);// 타이머를 동작 1~5이미지를 순서대로 자동 처리
      //setInterval( function(){처리코드} , 4000)
 
    
   $('.mbutton').click(function(event){  //각각의 버튼 클릭시
	     var $target=$(event.target); //클릭한 버튼 $target
         clearInterval(timeonoff); //타이머 중지     
	 
	     for(var i=1;i<=imageCount;i++){
	         $('.gallery .link'+i).hide(); //모든 이미지 안보인다.
         } 
	 
		  if($target.is('.btn1')){
				 cnt=1;
		  }else if($target.is('.btn2')){
				 cnt=2; 
		  }else if($target.is('.btn3')){ 
				 cnt=3; 
		  }else if($target.is('.btn4')){
				 cnt=4; 
		  }
		  $('.gallery .link'+cnt).fadeIn('slow');  //자기 자신만 이미지가 보인다
		  
		  for(var i=1;i<=imageCount;i++){
			  $('.btn'+i).css('background','#eaeaea'); //버튼 모두불꺼
              $('.btn'+i).css('width','16');
		  }
          $('.btn'+cnt).css('background','#169dd9');//자신 버튼만 불켜 
           $('.btn'+cnt).css('width','30');
       
          if(cnt==imageCount)cnt=0;  //카운트 초기화
          timeonoff= setInterval( moveg , 4000); //타이머의 부활!!!
       
          if(onoff==false){
		   onoff=true;
		   $('.ps').css('background','url(images/stop.png)');
	     }
        
    });

	 //stop/play 버튼 클릭시 타이머 동작/중지
  $('.ps').click(function(){ 
       if(onoff==true){
	       clearInterval(timeonoff);   // stop버튼 클릭시
		   $(this).css('background','url(images/play.png)');
           onoff=false;   
	   }else{  // false
		  timeonoff= setInterval( moveg , 4000); //play버튼 클릭시
		   $(this).css('background','url(images/stop.png)');
		   onoff=true; 
	   }
  });	
});
*/



// JavaScript Document

$(document).ready(function() {
  var timeonoff; //자동기능 구현
  var imageCount=4;  //이미지 개수 *** 
  var cnt=1;  //이미지 순서 1 2 3 4 5 4 3 2 1 2 3 4 5 ...
  var direct=1;  //1씩 증가(+1)/감소(-1)
  var position=0; //겔러리 무비의 left값 0 -1000 -2000 -3000 -4000
  var onoff=true; // true=>타이머 동작중 , false=>동작하지 않을때
    
     $('.btn1').css('background','#169dd9'); //첫번째 불켜
    $('.btn1').css('width','30');

 function moveg(){
      cnt+=direct;  //카운트가 1 2 3 4 5 4 3 2 1 2 3 4 5 ......
	     //각각의 카운트에 대한 left 좌표값을 처리
		if(cnt==1){
		   position=0;  
		}else if(cnt==2){
	       position=-2000;
		}else if(cnt==3){
		   position=-4000;
		}else if(cnt==4){
		   position=-6000;
		}
                                                
	   for(var i=1;i<=imageCount;i++){
          $('.btn'+i).css('background','#eaeaea'); //버튼불다꺼!!
         $('.btn'+i).css('width','16'); 
      }
      $('.btn'+cnt).css('background','#169dd9');//자신만 불켜
      $('.btn'+cnt).css('width','30');   
                           
		$('.gallery').animate({left:position}, 'slow'); //겔러리 무비의 left값을 움직여라~
		if(cnt==imageCount)direct=-1;
        if(cnt==1)direct=1;
 }

  timeonoff= setInterval( moveg , 4000); //4초마다 자동기능 

  $('.mbutton').click(function(event){  //각각의 버튼을 클릭한다면...

	var $target=$(event.target); //$target == this =>실제 클릭한 버튼
	clearInterval(timeonoff);   //타이머를 중지!!

	for(var i=1;i<=imageCount;i++){
			  $('.btn'+i).css('background','#eaeaea'); //버튼 모두불꺼
              $('.btn'+i).css('width','16');
    }

	if($target.is('.btn1')){  //첫번째 버튼을 클릭했다면...
    	   $('.gallery').animate({left:0}, 'slow');
                cnt=1;
                direct=1;
	}else if($target.is('.btn2')){ //두번째 버튼을 클릭했다면...
    	   $('.gallery').animate({left:-2000}, 'slow');
                cnt=2;
	}else if($target.is('.btn3')){ //세번째 버튼을 클릭했다면...
    	   $('.gallery').animate({left:-4000}, 'slow');
                cnt=3;
	}else if($target.is('.btn4')){  //네번째 버튼을 클릭했다면...
    	   $('.gallery').animate({left:-6000}, 'slow');
                cnt=4;
                direct=-1;
	}
      
    $('.btn'+cnt).css('background','#169dd9');//자신 버튼만 불켜 
    $('.btn'+cnt).css('width','30');
      
    timeonoff= setInterval( moveg , 4000);  //타이머의 재 동작
      
    if(onoff==false){
		   onoff=true;
		   $('.ps').css('background','url(images/stop.png)');
     }  
  });
 
     //stop/play 버튼 클릭시 타이머 동작/중지
  $('.ps').click(function(){ 
       if(onoff==true){
	       clearInterval(timeonoff);   // stop버튼 클릭시
		   $(this).css('background','url(images/play.png)');
           onoff=false;   
	   }else{
		  timeonoff= setInterval( moveg , 4000); //play버튼 클릭시
		   $(this).css('background','url(images/stop.png)');
		   onoff=true; 
	   }
  });	
  
});


