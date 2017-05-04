function realResponsiveSlider(opt){
 var slider=opt.slider;
 var sliderW=slider.width();
 var slW=opt.fixWidth?jQuery('.slide',slider).outerWidth(true):slider.width();
 var slWMF=opt.fixWidth?jQuery('.slide',slider).width():slider.width();
 var slNum=Math.floor(sliderW/slW);

 for(var num=0;num<slNum;num++){
  jQuery('>.slide-container',slider).append(jQuery('>.slide-container>.slide:eq('+num+')',slider)[0].outerHTML);
 }
 jQuery('.slide',slider).css('display','inline-block');
 slider.css({width:slNum*slW});

 var slH=jQuery('.slide').height();

 jQuery('>.slide-container>.slide',slider).css({width:slWMF,height:slH});
 jQuery('>.slide-container',slider).css({width:jQuery('>.slide-container>.slide',slider).length*slW,height:slH,position:'relative'});

 var slLineW=jQuery('>.slide-container',slider).width();
 var sLAnimate=false;
 var slLeft=0;

 var sliderTimer=false;
 if(opt.slideTime){
  var timerSlide=setInterval(function(){ jQuery('.arr_next',slider).trigger('click') }, opt.slideTime);
  sliderTimer=true;
 }
 slider.on('mouseover',function(){
  if(sliderTimer){
   clearInterval(timerSlide);
  }
 });
 slider.on('mouseout',function(){
  if(sliderTimer){
   timerSlide=setInterval(function(){ jQuery('.arr_next',slider).trigger('click') }, opt.slideTime);
  }
 });

slider.parent().on('click','.arr_next, .arr_prev',function(e){
  if(!sLAnimate){
   sLAnimate=true;
   switch(jQuery(e.target).attr('class')){
   case 'arr_next':
    if(slLeft==(-(slLineW-slW*slNum))) {
   	 slLeft=0;
   	 jQuery('>.slide-container',slider).css('left',slLeft);
    }
    slLeft-=slW;
    break;
    case 'arr_prev':
     if(slLeft==0) {
   	  slLeft=(-(slLineW-slW*slNum));
   	  jQuery('>.slide-container',slider).css('left',slLeft);
     }
     slLeft+=slW;
     break;
   }
   jQuery('>.slide-container',slider).animate({left:slLeft},200,function(){
   	sLAnimate=false;
   });
  }
 });

}
