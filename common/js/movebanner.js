$(document).ready(function() {
   var position=0;  //최초위치 left값(목적지)
   var movesize=2; //이동되는 크기>>초당 이동되는 값>>속도(큰값을 줄수록 빨리움직임,but천천히 움직이는게 좋음)
   var timeonoff; //이미지의 정보
   
    //목록을 복제하여라
   $('.partnerBox ul').after($('.partnerBox ul').clone()); //after 앞에 부모를 (clone메소드>>)복제해서 after뒤에 갖다놓아라...
   
   function partnerMove(){
        position-=movesize;  // 2씩 감소 >> 포지션에다 movsize 2씩 감소하라! 
    	$('.partnerBox').css('left',position); //그리고 이포지션 값을 left에다가 넣어주라
		
		 if(position < -2000){
			   $('.partnerBox').css('left',0);
			   position=0; //포지선이 -645보다 작아지면 css값을 left값으로 0을 맞혀라
		 } 
		
   };

     timeonoff= setInterval(partnerMove, 100); //속도는0.1초, 1000는 1초 >> setinterval의 초와 변수 movesize를 조절해서 움직이는 속도를 결저앻라
    
   	$('.partnerBox').hover(function(){
		clearInterval(timeonoff);
	},function(){
		timeonoff= setInterval(partnerMove, 100);	
	});
	
    
 });