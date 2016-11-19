
(function($){
  "use strict";

  var BackToTop = (function(){
    function BackToTop(element, options){
      var me = this;

      this.settings = $.extend(true, $.fn.BackToTop.defaults, options||{});
      this.element = element;
      this.init();

    }

    BackToTop.prototype = {
      //初始化组件
      init : function(){
        var me = this;
        this.style = this.settings.style;
        this.backBox = $('<div class='+this.style.className+'>').css({
          width:this.style.width,
          height:this.style.height,
          backgroundColor:this.style.backgroundColor,
          position:'fixed',
          right:this.style.right,
          bottom:this.style.bottom,
          backgroundUrl:this.backgroundUrl
        }).hide();

        this.element.append(this.backBox);

        //滚动条事件
        me.windowHeight=$(window).height();
        $(window).scroll(function(){
          me.scrollHeight=$(window).scrollTop();
          me.windowHeight=$(window).height();
          if(me.scrollHeight>me.windowHeight){
            me.backBox.fadeIn();
          }else{
            me.backBox.fadeOut();
          }

          if ($(window).scrollTop() <= 0){
            clearInterval(me.timer)
          }

        });
        //点击
        this.element.on('click',function(){

            me.timer =setInterval(function(){
               $(window).scrollTop($(window).scrollTop() - me.settings.speed) ;
          },30)


        })


      }
    };
    return BackToTop;
  })();


  $.fn.BackToTop = function(options){
    return this.each(function(){
      var me = $(this),
        instance = me.data("BackToTop");

      if(!instance){
        me.data("BackToTop", (instance = new BackToTop(me, options)));
      }

      if($.type(options) === "string") return instance[options]();
    });
  };

  $.fn.BackToTop.defaults = {
    style:{
      className:'backToTop-xiaohai',
      width:103,
      height:207,
      backgroundColor:'red',
      backgroundUrl:null,
      right:0,
      bottom:0
    },
    speed:150
  };


})(jQuery);