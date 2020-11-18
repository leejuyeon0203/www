// JavaScript Document

 $(document).ready(function () {
	var article = $('.content_area .article'); //모든 리스트들.....
	//article.find('.a').slideUp(100); //모든 답변을 닫아라..
     $('.a').hide();
     
	$('.content_area .article .trigger').click(function(){ //각각의 질문을 클릭하면
	var myArticle = $(this).parents('.article'); //trigger의 부모의 article을 찾아라 >>를 myarticle변수에 달아놓음
        // 클릭한 질문의 리스트
	
	if(myArticle.hasClass('hide')){   // 클릭한 리스트의 답변의 닫혀있어??
	    article.find('.a').slideUp(100); //모든 article안에 있는 답변을 닫아
		article.removeClass('show').addClass('hide'); //전부다 hide시켜!!
	    myArticle.removeClass('hide').addClass('show'); //자기꺼만 열어라..
	    myArticle.find('.a').slideDown(100);  //클릭한 li에 자손을 열어라..
        myArticle.find('.plus').text('-'); //myarticle 자손 span의 텍스트를..
        
	 } else {  //클릭한 리스트의 답변이 닫혀있어?? show
	   myArticle.removeClass('show').addClass('hide');  
	   myArticle.find('.a').slideUp(100);
       myArticle.find('.plus').text('+'); //myarticle 자손 span의 텍스트를..
	}  
  });    
	
	$('.all').toggle(function(){ 
	    article.find('.a').slideDown(100);
	    article.removeClass('hide').addClass('show');
	    article.find('.plus').text('-');
        $(this).text('Close △');
	},function(){ 
	    article.find('.a').slideUp(100);
	    article.removeClass('show').addClass('hide');
        article.find('.plus').text('+');
        $(this).text('Open ▽');
	});
	
});  


//article은 모든 리스트 myarticle은 클릭한 리스트
//hide는 display:none과 같음
//show는 display:block과 같음