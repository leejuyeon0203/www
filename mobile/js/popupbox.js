$(document).ready(function(){

  $('.openBtn').on('click', function(){
      $(this).next('.big').fadeIn('slow');
      $('.popupbox').show();
  });

 $('.closeBtn, .popupbox, .big').on('click', function(){
      $('.big').fadeOut('slow');
      $('.popupbox, .big').hide();
 });
});