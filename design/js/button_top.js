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
    if (!$('#fio').val()) {
        alert('Не указано ФИО');
        return false;
    }
    if (!$('#phone').val()) {
        alert('Не указан телефон');
        return false;
    }
    if (!$('#idea').val()) {
        alert('Вы не описали Вашу идею');
        return false;
    }
    $.post( "/site/idea", { fio: $('#fio').val(), phone: $('#phone').val(), idea: $('#idea').val(), _csrf: $('#_csrf').val() })
        .done(function( data ) {
          if (data === 'ok') {
              alert('Спасибо за отправку!');
              location.href = '/';
          }
          else alert(data);
        });
 });
 
 $('#sendtakepart').click(function() {
    if (!$('#venue').val()) {
        alert('Не указано мероприятие');
        return false;
    }
    if (!$('#fio').val()) {
        alert('Не указано ФИО');
        return false;
    }
    if (!$('#phone').val()) {
        alert('Не указан телефон');
        return false;
    }
    if (!$('#nko').val()) {
        alert('Не указано наименование НКО');
        return false;
    }
    $.post( "/site/takepart", { venue: $('#venue').val(), fio: $('#fio').val(), phone: $('#phone').val(), nko: $('#nko').val(), _csrf: $('#_csrf').val() })
        .done(function( data ) {
          if (data === 'ok') {
              alert('Спасибо за отправку!');
              location.href = '/';
          }
          else alert(data);
        });
 });
 
  $('#sendresource').click(function() {
     if (!$('#nko').val()) {
        alert('Не указано НКО');
        return false;
    }
    if (!$('#contacts').val()) {
        alert('Не указаны контакты');
        return false;
    }
    if (!$('#question').val()) {
        alert('Не указан вопрос');
        return false;
    }
    $.post( "/site/resource", { nko: $('#nko').val(), contacts: $('#contacts').val(), question: $('#question').val(), _csrf: $('#_csrf').val() })
        .done(function( data ) {
          if (data === 'ok') {
              alert('Спасибо за отправку!');
              location.href = '/';
          }
          else alert(data);
        });
 });
 
 $('#sendfeedback').click(function() {
    if (!$('#contacts').val()) {
        alert('Не указаны контакты');
        return false;
    }
    if (!$('#question').val()) {
        alert('Не указан текст сообщения');
        return false;
    }
    $.post( "/site/feedback", { contacts: $('#contacts').val(), question: $('#question').val(), _csrf: $('#_csrf').val() })
        .done(function( data ) {
          if (data === 'ok') {
              alert('Спасибо за отправку!');
              location.href = '/site/private';
          }
          else alert(data);
        });
 });
});