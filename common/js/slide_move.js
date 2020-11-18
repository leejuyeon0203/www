    $(document).ready(function () {    
              var th= $('#headerArea').height() + $('.main').height();
              $('.topMove').hide();
             
             //console.log(th);
             //console.log($('header').height());
             //console.log($('.main').height());
        
             $(window).on('scroll',function(){ //스크롤의 거리가 발생되면 
                  var scroll = $(window).scrollTop();
                  //스크롤이 움직이면 그해당 스크롤탑의 값이 저장된다.
                  //스크롤이라는 변수에 얼마만큼 내려왔는지 감지해서..
                 
                 
                  //$('.text').text(scroll);
                 
                  if(scroll>th){
                      $('.topMove').fadeIn('slow');
                  }else{
                      $('.topMove').fadeOut('fast');
                  }
             }); //if,else문 >> 만약에 스크롤이 250(th)보다 커지면 fadein해라 250(th)보다 작아지면 fadeout 해라!!
           
              $('.topMove').click(function(){
                  //상단으로 스르륵 이동합니다.
                 $("html,body").stop().animate({"scrollTop":0},1000); 
              }); //스크롤을 움직이면 ????
        
              
       });


//window는 >> 스크롤은 윈도우!! > 스크롤이벤트는 window에만 쓸수있다.
//animate에 쓸수있는 속성 left right top bottom margin padding scrollTop


// 34번 >> this가 가리키는 선택자가 slideMenu a이고, slideMenu a에서 클래스 link1을 선택했을때 ..해라..
