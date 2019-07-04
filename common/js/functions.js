;$(function() {
  'use strict';

  /*////////////////////////////
  スクロール処理
  /////////////////////////*/

  $(function(){
    $('.main-content-wrapper').stickyStack({
        containerElement: '.main-content-wrapper',
        stackingElement: '.contents-box'
    });
 })  
  /*////////////////////////////
  nav　ジャンプ処理
  ////////////////////////////*/

  $(function(){
    $('.nav_item > a[href^="#"]').click(function() {
      let speed = 600,
           href = $(this).attr('href'),
           target = $(href === '#' || href === '' ? 'html' : href);

           $('html, body').animate({
             scrollTop: target.offset().top
            }, speed, 'swing');
            return false;
    });
  });

  /*//////////////////////////
  nav部分のcolor
  //////////////////////////////*/
  let l = $('.nav_item');
  $(l).mouseover(function(){
    $(this).children().css('color', 'white');
  }).mouseout(function(){
    $(l).children().css('color', 'rgb(66, 66, 66)');
  });
  
  /*//////////////////////////
  スライドショー
  /////////////////////////////*/
  let timer = 6000,
      img = $('.slide_item'),
      i = 0,
      lastImg = $(img).length-1;

      $(img).hide();
      $(img).eq(i).fadeIn(3000);

      function n(){
        $(img).fadeOut(timer);
        $(img[i]).fadeIn(timer);
      };

      setInterval(function(){
        $(img[i]).fadeOut(timer);
        if(i >= lastImg){
          i = 0;
        } else {
          i++;
        }
        $(img[i]).fadeIn(timer);
      }, timer);
});

/*//////////////////////////////////
カレンダーprev next
/////////////////////////////////*/
