var scrollEnd = true;
function waterfall(){
  var main = $('#book-mainBox');
  var $boxs = $('#book-mainBox>div');
  var w = $boxs.eq(0).outerWidth();
  var cols = Math.floor(main.width()/w);
  main.width(w*cols+16)
  var hArr = [];
  $boxs.each(function(index,value){
    var h = $boxs.eq(index).outerHeight();
    if (index < cols){
      hArr[index] = h;
    }else{
      var minH = Math.min.apply(null,hArr);
      var minHIndex = $.inArray(minH,hArr);
      $(value).css({
        position:'absolute',

      }).animate({
        top:minH,
        left:minHIndex*w,
        opacity:1,
      },600);
      hArr[minHIndex]+=$boxs.eq(index).outerHeight();
    }
  });
}

function checkScrollSlide(){
  var $lastBox = $('#book-mainBox>div').last();
  var lastBoxDis = $lastBox.offset().top+Math.floor($lastBox.outerHeight()/2);
  var scrollTop = $(window).scrollTop();
  var documentH = $(window).height();
  var pass = '';
  if (scrollEnd){
    if (scrollTop > $('#book-mainBox').height()/3){
      scrollEnd = false;
      $('#book-mainBox').css({
        height:lastBoxDis
      });

      return true;

    }
  }
  else{

    pass = false;
  }
  return pass;
}
