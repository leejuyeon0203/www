
$(document).ready(function () {
    // top move

	 $('.topMove').click(function(){
                 $("html,body").stop().animate({"scrollTop":0},1000); 
     });  
        
	
	
	  //scroll event
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
              var winSize= $(window).width();           
              var winh= $(window).height(); 
            //$('.text').text(scroll);
          
     
            if(scroll>winh){ 
                $('#headerArea').css('background', 'rgba(0,0,0,.8)');
                
            }else{
                $('#headerArea').css('background', 'none');
            }
      
        });
});    
