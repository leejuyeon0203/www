$(document).ready(function() {
 	
   $(".btn").click(function() { //메뉴버튼 클릭시
   $(".navbtn").html('<i class="fas fa-angle-right"></i>');
       var documentHeight =  $(document).height();
       //실제 페이지의 높이 = $(document).height();
       $(".box").css('height',documentHeight);
       $("nav").css('height',documentHeight);
       //반투명박스와 네비의 높이를 실제 페이지의 높이로 바꾸어라   

       $("nav").animate({right:0,opacity:1}, 'slow');
       $(".box").show();
   });
   
   $(".box,.mclose").click(function() { //닫기버튼 클릭시
     $("nav").animate({right:'-100%',opacity:0}, 'fast');
     $(".box").hide();
   });
     
    //2depth 메뉴 교대로 열기 처리 
    var onoff=[false,false,false,false];
    //false일땐, 2댑스들이 닫혀 있는 상태, true일땐 열려있는 상태/ false와 true로 상태를 체킹해나가는 것임
    //false는 2댑스가 있는 nav의 개수 만큼 만들어 주면 됨
    var arrcount=onoff.length; //배열의 방 개수

    $('nav .depth1 h3>a').click(function(){
        var ind=$(this).parents('.depth1').index(); //각 메인메뉴 클릭시 index를 뽑아낸다
        $(this).find('.navbtn').html('<i class="fas fa-angle-right"></i>');
        
        console.log(ind);
        
       if(onoff[ind]==false){ //닫힌상태 체킹, 클릭한 해당 메뉴의 서브가 닫혀있나?
        //$('#gnb .depth1 ul').hide();
        $(this).parents('h3').next('ul').slideDown('slow');
        $(this).parents('.depth1').siblings('li').find('ul').slideUp('fast');
         for(var i=0; i<arrcount; i++) onoff[i]=false; 
         onoff[ind]=true;   

           $('.navbtn').html('<i class="fas fa-angle-right"></i>');
           $(this).find('.navbtn').html('<i class="fas fa-angle-up"></i>');
            
       }else{ //true => 열렸을때 상태 체킹, 클릭한 해당 메뉴의 서브가 열려있나?
         $(this).parents('h3').next('ul').slideUp('fast'); 
         onoff[ind]=false;   
          
           $(this).find('.navbtn').html('<i class="fas fa-angle-right"></i>');
       }
    });    
   
  });

