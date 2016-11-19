$('#indicatorContainer').radialIndicator({
  barColor: '#87CEEB',
  barWidth: 5,
  initValue: 0,
  roundCorner : true,
  displayNumber: false,
  radius:25
});
var radialObj = $('#indicatorContainer').data('radialIndicator');
//now you can use instance to call different method on the radial progress.
//like
var index = 0;
var progress = 0;
var $img = $('#left_ppt img');
var right_li =$('#right_ppt').find('li');
console.log(right_li)
var page = 0;
var imgLength = $('#left_ppt img').length;
var pptWidth = $('#left_ppt').width();
var pptHeight = $('#left_ppt').height();
window.progressTime = '';
$img.each(function(index,val){
  $(val).hide();
});
$img.eq(index).addClass('active').show();
right_li.each(function(index,val){
  $(val).css({
    'transform':'translateX(40px)',
  }).hide();
});
right_li.eq(index).css({
  'transform':'translateX(0px)',
}).show();
$('#left_ppt').hover(function(){
  clearInterval(progressTime);
},function(){
  timeToPPt()
});


function timeToPPt(){
  clearInterval(progressTime);
  window.progressTime = setInterval(function(){
    progress++;
    radialObj.value(progress);
    if (progress == 100){
      index++;
      clearInterval(progressTime);
      $img.each(function(index,val){
        if ($(val).attr('class') == 'active'){
          page =index;
        }
      });
      page = page + 1;
      if (page +1 >imgLength){
        page = 0
      }
      var url = $img.eq(page).attr('src');
      var move = $img.eq(page).attr('move');
      var num = $img.eq(page).attr('num');
      var css3 = $img.eq(page).attr('css3');
      makeActive(url,move,num,css3);
      progress=0;

      setTimeout(function(){
        timeToPPt();
        $img.each(function(index,val){
          $(val).removeClass('active').fadeOut();
        });
        $img.eq(page).addClass('active').fadeIn();

        // right_li.each(function(index,val){
        //   $(val).css({
        //     'transform':'translateX(40px)'
        //   }).fadeOut();
        // });
        // right_li.eq(page).css({
        //   'transform':'translateX(0px)',
        // }).fadeIn();
      },2000+(num-20)*40)
    }
  },25);
}


timeToPPt();

//设置动作
function makeActive(url,move,num,css3){
  var rotate=0;
  var skew = 0;
  var scale=0;
  if (css3 == 'rotate'){
    rotate = 30;
  }else if (css3 == 'skew'){
    skew = 10;
  }else if (css3 == 'scale'){
    scale=0.1;
  }
  if (move == 'up'){
    for(var i=0;i<num;i++){
      var little_icon =  $('<div>').addClass('little_icon').css({
        left:i*(100/num) + '%',
        width:(100/num)+'%',
        height:'100%',
        "background":'url('+url+') no-repeat ',
        "background-size":pptWidth+"px "+pptHeight+ "px",
        "background-position":(i+1)*(100/num) +  '% 0' ,
        'transform':'rotate('+i*rotate+'deg) skew('+i*skew+'deg,'+i*skew+'deg) scale('+i*scale+1+')',
        zIndex:2,
        opacity:0,
        position:'absolute',
        top:pptHeight + 100*i
      }).appendTo($('#left_ppt'));
    }
    setTimeout(function(){
      $('.little_icon').each(function(index,val){
        $(val).css({
          'transform':'rotate(0deg) skew(0deg,0deg) scale(1)',
        });
        $(val).animate({
          top:0,
          opacity:1
        },300+i*40,function(){

          $('.little_icon').each(function (index, val) {
            $(val).animate({
              opacity:0
            },1000,function(){
              $('.little_icon').remove();
            })
          })
        })
      })
    },1000)
  }

  if (move == 'bottom'){
    for(var i=0;i<num;i++){
      var little_icon =  $('<div>').addClass('little_icon').css({
        left:i*(100/num) + '%',
        width:(100/num)+'%',
        height:'100%',
        "background":'url('+url+') no-repeat ',
        "background-size":pptWidth+"px "+pptHeight+ "px",
        "background-position":(i+1)*(100/num) +  '% 0' ,
        'transform':'rotate('+i*rotate+'deg) skew('+i*skew+'deg,'+i*skew+'deg) scale('+i*scale+1+')',
        zIndex:2,
        opacity:0,
        position:'absolute',
        top:-(pptHeight+100*i)
      }).appendTo($('#left_ppt'));
    }
    setTimeout(function(){

      $('.little_icon').each(function(index,val){
        $(val).css({
          'transform':'rotate(0deg) skew(0deg,0deg) scale(1)',
        });
        $(val).animate({
          top:0,
          opacity:1
        },300+i*40,function(){

          $('.little_icon').each(function (index, val) {
            $(val).animate({
              opacity:0
            },1000,function(){
              $('.little_icon').remove();
            })
          })
        })
      })
    },1000)
  }


  if (move == 'left'){
    for(var i=0;i<num;i++){
      var little_icon =  $('<div>').addClass('little_icon').css({
        left:-(pptWidth + 100*i),
        width:'100%',
        height:(100/num) + '%',
        "background":'url('+url+') no-repeat ',
        "background-size":pptWidth+"px "+pptHeight+ "px",
        "background-position":'0 '  +(i+1)*(100/num) +  '%' ,
        'transform':'rotate('+i*rotate+'deg) skew('+i*skew+'deg,'+i*skew+'deg) scale('+i*scale+1+')',

        zIndex:2,
        opacity:0,
        position:'absolute',
        top:i*(100/num) + '%'
      }).appendTo($('#left_ppt'));
    }

    setTimeout(function(){
      $('.little_icon').each(function(index,val){
        $(val).css({
          'transform':'rotate(0deg) skew(0deg,0deg) scale(1)',
        });
        $(val).animate({
          left:0,
          opacity:1,
        },300+i*40,function(){

          $('.little_icon').each(function (index, val) {
            $(val).animate({
              opacity:0
            },1000,function(){
              $('.little_icon').remove();
            })
          })
        })
      })
    },1000)

  }
  if (move == 'right'){
    for(var i=0;i<num;i++){
      var little_icon =  $('<div>').addClass('little_icon').css({
        left:(pptWidth + 100*i),
        width:'100%',
        height:(100/num) + '%',
        "background":'url('+url+') no-repeat ',
        "background-size":pptWidth+"px "+pptHeight+ "px",
        "background-position":'0 '  +(i+1)*(100/num) +  '%' ,
        'transform':'rotate('+i*rotate+'deg) skew('+i*skew+'deg,'+i*skew+'deg) scale('+i*scale+1+')',

        zIndex:2,
        opacity:0,
        position:'absolute',
        top:i*(100/num) + '%'
      }).appendTo($('#left_ppt'));
    }

    setTimeout(function(){
      $('.little_icon').each(function(index,val){
        $(val).css({
          'transform':'rotate(0deg) skew(0deg,0deg) scale(1)',
        });
        $(val).animate({
          left:0,
          opacity:1,
        },300+i*40,function(){

          $('.little_icon').each(function (index, val) {
            $(val).animate({
              opacity:0
            },1000,function(){
              $('.little_icon').remove();
            })
          })
        })
      })
    },1000)

  }

}
