// JavaScript Document

/*tabs*/
$(document).ready(function(){
  var cnt= $('.tabs .tab').length;  //탭메뉴개수  ***
    
  $('.content_area .contlist:eq(0)').show(); //첫번째 내용만 보여라
  $('.tabs .tab1').addClass('on');
  
  $('.tabs .tab').each(function (index) {  // index=> 0 1 2
    $(this).click(function(){   //각각의 탭메뉴를 클릭하면 
	  $('.content_area .contlist').hide(); // 모든 탭내용을 안보이게 한다
	  $('.content_area .contlist:eq('+index+')').show();
	  for(var i=1;i<=cnt;i++){
           $('.tab'+i).removeClass('on'); 
      } //모든 탭메뉴 비활성화 
      $(this).addClass('on'); 
   });
  });
});


/*tabs2*/
$(document).ready(function(){
  var cnt= $('.tabs2 .tab2').length;  //탭메뉴개수  ***
    
  $('.content_area .contlist2:eq(0)').show(); //첫번째 내용만 보여라
  $('.tabs2 .hall1').addClass('on2');
  
  $('.tabs2 .tab2').each(function (index) {  // index=> 0 1 2
    $(this).click(function(){   //각각의 탭메뉴를 클릭하면 
	  $('.content_area .contlist2').hide(); // 모든 탭내용을 안보이게 한다
	  $('.content_area .contlist2:eq('+index+')').show();
	  for(var i=1;i<=cnt;i++){
           $('.hall'+i).removeClass('on2'); 
      } //모든 탭메뉴 비활성화 
      $(this).addClass('on2'); 
   });
  });
});

/*tabs3*/
$(document).ready(function(){
  var cnt= $('.tabs3 .tab3').length;  //탭메뉴개수  ***
    
  $('.content_area .contlist3:eq(0)').show(); //첫번째 내용만 보여라
  $('.tabs3 .market1').addClass('on3');
  
  $('.tabs3 .tab3').each(function (index) {  // index=> 0 1 2
    $(this).click(function(){   //각각의 탭메뉴를 클릭하면 
	  $('.content_area .contlist3').hide(); // 모든 탭내용을 안보이게 한다
	  $('.content_area .contlist3:eq('+index+')').show();
	  for(var i=1;i<=cnt;i++){
           $('.market'+i).removeClass('on3'); 
      } //모든 탭메뉴 비활성화 
      $(this).addClass('on3'); 
   });
  });
});