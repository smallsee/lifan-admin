$(window).load(function() {
  var proSpeed = 0;
  var authorNum = 0;
  var canPass = true;
  var hover = true;
  var authorzIndex = 5;
  var fa = $('#scroll-author-video');
  var authorTab = $('.scroll-author-video-right>div');
  var authorTabLength = authorTab.length;

  if (hover){


    fa.on('mouseover',function(){
      clearInterval(proTimer);
    });

    fa.on('mouseout',function(){

      canPass=true;
      clearInterval(proTimer);
      proTime();

    })
  }
  function authorChanger(){
    authorTab.each(function(index,val){
      $(val).removeClass('active');
    });
    authorTab.eq(authorNum).addClass('active').css({
      zIndex:authorzIndex++
    });
  }

  function proTime(){
    if (canPass){
      canPass=false;
      window.proTimer = setInterval(function () {
        proSpeed++;
        radialObj.value(proSpeed);
        if (proSpeed==100){
          clearInterval(proTimer);
          canPass=true;
          $('.nivo-nextNav').click()
        }
      },30)
    }

  }
  var radialObj = radialIndicator('#indicatorContainer', {
    barColor : 'rgba(0,120,255,1)',
    barBgColor:'rgba(0,0,0,0.5)',
    barWidth: 5,
    initValue: 0,
    roundCorner : true,
    displayNumber: false,
    radius:15
  });

  $('#slider').nivoSlider({
    controlNav:true,
    animSpeed:500,
    manualAdvance:true,
    prevText:'',
    nextText:'',
    afterLoad:function(){
      proTime();
    },
    afterChange:function(){
      proSpeed = 0;
      hover = true;
      radialObj.value(proSpeed);
      clearInterval(proTimer);
      proTime();
    },
    beforeChange:function(){
      hover = false;
      authorNum++;
      if (authorNum>authorTabLength-1){
        authorNum =0;
      }
      authorChanger();
      clearInterval(proTimer);
    }
  });

  $('.nivo-control').text('')
});