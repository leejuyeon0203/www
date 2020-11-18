// JavaScript Document
 $(document).ready(function() {
   var position2=0;  //최초위치 목적지(left)
   var movesize2=1100; 

   
    $('.event_slide>div').after($('.event_slide>div').clone());
       //슬라이드 겔러리를 한번 복제

   $('.button').click(function(event){
	var $target=$(event.target);
	
	
	if($target.is('.leftBtn')){
	     
          if(position2==-3300){
			   $('.event_slide').css('left',0);
			   position2=0;
		    }
		
	     position2-=movesize2;  // 150씩 감소
    	     $('.event_slide').stop().animate({left:position2}, 'fast',
		  function(){							
		    if(position2==-3300){
			   $('.event_slide').css('left',0);
			   position2=0;
		    }
	      });
	}else if($target.is('.RightBtn')){
	    
         if(position2==0){
			   $('.event_slide').css('left',-3300);
			   position2=-3300;
		    }
        

          position2+=movesize2; // 150씩 증가
    	  $('.event_slide').stop().animate({left:position2}, 'fast',
		  function(){							
		    if(position2==0){
			   $('.event_slide').css('left',-3300);
			   position2=-3300;
		    }
	       });
	  }
   });
   
 
 });


