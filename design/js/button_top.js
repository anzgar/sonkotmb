$(function() {
 $(window).on('load',function(){
  $('body').append('<div id="toTop"></div>');
 });
 $(window).scroll(function() {
 if($(this).scrollTop() != 0) {
  $('#toTop').fadeIn();
 } else {
  $('#toTop').fadeOut();
 }
});
 
 $(document).on('click','#toTop',function() {
  $('body,html').animate({scrollTop:0},800);
 }); 
});