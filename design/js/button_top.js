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
 
 
 $('#sendidea').click(function() {
    $.post( "/site/idea", { fio: $('#fio').val(), phone: $('#phone').val(), idea: $('#idea').val(), _csrf: $('#_csrf').val() })
        .done(function( data ) {
          if (data === 'ok') {
              alert('Спасибо за отправку!');
              location.href = '/';
          }
          else alert(data);
        });
});
});