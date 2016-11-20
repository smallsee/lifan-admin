@extends('web/master')
@section('title','book')
@section('content')

<div id="book-mainBox">


  <div class="book-box box-clone">
    <div class="book-pic" style="width: 210px; opacity: 1;z-index: 1000">
      <a href="{{asset('/admin/book/add')}}"><div class="book-newPost">发新帖</div></a>

      <div class="book-category" style="height: 110px;">
        <div>分类:</div>
        <div class="book-category-icon category-tab active " onclick="loadNewData(this)">全部</div>
        <div class="book-category-icon category-tab " onclick="loadNewData(this)">动漫图集</div>
        <div class="book-category-icon category-tab " onclick="loadNewData(this)">杂志画集</div>
        <div class="book-category-icon category-tab " onclick="loadNewData(this)">网站推荐</div>
        <div class="book-category-icon category-tab" onclick="loadNewData(this)">游戏CG</div>
        <div class="book-category-icon category-tab" onclick="loadNewData(this)">个人动画</div>
      </div>

      <div class="book-category" style="height: 30px;">
        <div>筛选:</div>
        <div class="book-category-icon active">全部</div>
        <div class="book-category-icon">人气</div>
        <div class="book-category-icon">精华</div>
      </div>

      <div class="book-category" style="height: 110px;">
        <div>排序:</div>
        <div class="book-category-icon active">按发表时间</div>
        <div class="book-category-icon">按回复时间</div>
        <div class="book-category-icon">按查看次数</div>
        <div class="book-category-icon">按回复次数</div>
        <div class="book-category-icon">随机</div>
      </div>
    </div>

  </div>


</div>
<div class="page_list end">
  已经加载完了
</div>

<div class="page_list page_num_xiaohai">
  <ul>

  </ul>
</div>


@endsection

@section('my-js')
  <script>
    $('.end').hide();
    $('.page_list').css({
      marginRight:($(window).width()-$('#book-mainBox').width())/2 +25
    });
    $(window).resize(function(){
      $('.page_list').css({
        marginRight:($(window).width()-$('#book-mainBox').width())/2 +25
      });
    });
    var img_tab = '全部';
    var li_page_num = 0;
    var img_page = 1;
    var li_page_father = $('.page_num_xiaohai ul');

    $tab = $('.box-clone');
    $category_tab = $('.box-clone .category-tab');
    setTimeout(function(){
      waterfall();
    },800);

    function loadNewData(me){
      $('#book-mainBox').html($tab);
      $category_tab.each(function(index,val){
        $(val).removeClass('active');
      });
      $(me).addClass('active');
      img_tab = $(me).text();
      li_page_num = 0;
      img_page = 1;
      $('.end').hide();
      stratData();
    }

    function stratData(){

    $.ajax({
      type: "get",
      url: "{{asset('/api/book_list/data?page=')}}"+img_page+'&tab='+img_tab,
      cache: false,
      success: function(data) {

        if (data == 'end'){
          $('.end').show()
        }
        $.each(data,function (key,value){
          li_page_num++;
          var  main = $('#book-mainBox');
          var oBox = $('<div>').addClass('book-box').appendTo(main);
          var oPic = $('<div>').addClass('book-pic').appendTo(oBox);
          var aA = $('<a />').attr('href',"{{asset('/book/list?id=')}}"+value.id).appendTo(oPic);
          var img = $('<img>').attr('src',value.book_thumb).appendTo(aA);
          var oTitle = $('<div>').addClass('book-title').html('近期P站图分享-11-4【482P】').appendTo(aA);

          var oContetn = $('<div>').addClass('book-content').html('1773918635[/bobomusic]**** 本内容被作者隐藏 ****').appendTo(oPic);
          var oIcon = $('<div>').addClass('book-icon').appendTo(oPic);
          var iconLoive = $('<div>').addClass('icon-eye-open').html( value.see+'·' +value.reply+'查看').appendTo(oIcon);
          var iconSee = $('<div>').addClass('icon-comments-alt').html(value.reply+'回复').appendTo(oIcon);

          var oUsername = $('<div>').addClass('book-username').appendTo(oPic);
          var img = $('<img>').attr('src',value.user_thumb).appendTo(oUsername);
          var oUserName = $('<div>').html(value.username).appendTo(oUsername);
        });
        waterfall();
        li_page_father.html('');
        for(var i=1;i<=Math.ceil((img_page)/2)+1;i++){
          $('<li>').html(i).attr('onclick','page_click('+i+',"'+img_tab+'")').appendTo(li_page_father);
        }
        li_page_father.children('li').eq((img_page - 1)).addClass('active');
        scrollEnd = true;

      },
      error: function(xhr, status, error) {
        console.log('已经加载完了');
      }
    });
  }

    stratData();

    function xiaohaiAjax(){
      $.ajax({
        type: "get",
        url: "{{asset('/api/book_list/data?page=')}}"+img_page+'&dowm=10&tab='+img_tab,
        cache: false,
        success: function(data) {

          if (data == 'end'){
            $('.end').show()
          }
          $.each(data,function (key,value){
            li_page_num++;
            var  main = $('#book-mainBox');
            var oBox = $('<div>').addClass('book-box').appendTo(main);

            var oPic = $('<div>').addClass('book-pic').appendTo(oBox);
            var aA = $('<a />').attr('href',"{{asset('/book/list?id=')}}"+value.id).appendTo(oPic);
            var img = $('<img>').attr('src',value.book_thumb).appendTo(aA);
            var oTitle = $('<div>').addClass('book-title').html('近期P站图分享-11-4【482P】').appendTo(aA);

            var oContetn = $('<div>').addClass('book-content').html('1773918635[/bobomusic]**** 本内容被作者隐藏 ****').appendTo(oPic);
            var oIcon = $('<div>').addClass('book-icon').appendTo(oPic);
            var iconLoive = $('<div>').addClass('icon-eye-open').html( value.see+'·' +value.reply+'查看').appendTo(oIcon);
            var iconSee = $('<div>').addClass('icon-comments-alt').html(value.reply+'回复').appendTo(oIcon);

            var oUsername = $('<div>').addClass('book-username').appendTo(oPic);
            var img = $('<img>').attr('src',value.user_thumb).appendTo(oUsername);
            var oUserName = $('<div>').html(value.username).appendTo(oUsername);
          });
          waterfall();
          li_page_father.html('');

          console.log(img_page)
          for(var i=1;i<=Math.ceil((img_page*2)/2)+1;i++){
            $('<li>').html(i).attr('onclick','page_click('+i+',"'+img_tab+'")').appendTo(li_page_father);
          }
          li_page_father.children('li').eq((img_page - 1)).addClass('active');
        },
        error: function(xhr, status, error) {
          console.log('已经加载完了');
        }
      });
    }

    function page_click(page,tab){
      img_page = page;
      $('#book-mainBox').html($tab);
      stratData();

      setTimeout(function(){
        $('#book-mainBox').css({
          height:$('#book-mainBox>div').last().offset().top + $('#book-mainBox>div').last().height()/2+10
        })
      },600);
      $('#scrollToTop .backToTop-xiaohai').click();


    }

    $(window).on('load',function(){
      waterfall();
      $(window).on('scroll',function(){
        if (checkScrollSlide()){
          xiaohaiAjax();
        }
        waterfall();
        $('#book-mainBox').css({
          height:$('#book-mainBox>div').last().offset().top + $('#book-mainBox>div').last().height()/2+10
        })
      })
    });





  </script>
@endsection