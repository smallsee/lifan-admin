$("#bette_video").ScrollXiaohai({
  name : {
    ul : ".scrollVideo-ul", //放置图片层的ul的class名字
    li : ".scrollVideo-li", //放置图片的li的class名字
    active : ".active", //高亮的class样式名字
    activeColor : "rgba(241,99,137,1)" //高亮时的背景颜色 主要用于icon
  },
  icon :{
    iconUl : ".scrollVideo-iconUl", //放置icon层的class样式名字 可以自由更改
    iconLi : ".scrollVideo-iconLi",//放置icon的class样式名字 可以自由更改
    height:30,//放置icon层的高度
    ulColor: "rgba(241,99,137,0)",//放置icon层的背景颜色
    liColor: 'rgba(255,255,255,0.5)',//icon的背景颜色
    top:0, // 水平 ? bottom 0 : top:0
    left:0,// 水平 ? left 0 : right:0
    iconWidth:7, //icon宽度
    iconHeight:7, // icon高度
    Radius:true, //icon是否圆角
    position:'middle', //icon在遮罩层的位置有 start end middle
    marginRight:5 //个个icon之间的距离
  },
  btn:{
    boxPrev : '.scrollVideo-boxPrev', //放置按钮层的class样式名字 可以自由更改
    boxNext : '.scrollVideo-boxNext', //放置按钮层的class样式名字 可以自由更改
    prev : '.scrollVideo-prev', //按钮的class样式名字 可以自由更改  =>按钮的图片建议自己 填写上去
    next : '.scrollVideo-next', //按钮的class样式名字 可以自由更改
    width: 50, //  水平 ? 安置按钮层的宽度 : 安置按钮层的高度
    spanHeight:50,//按钮高度
    spanWidth:50, //按钮宽度
    left: 0,    //放置按钮层 左右靠边距离
    color: "rgba(0,0,0,0)",    //放置按钮的层颜色
    btnColor: "rgba(0,0,0,0.5)", //按钮的背景颜色
    show:false  //是否移动到放置按钮的层颜色处才显示

  },
  width:1200,        //幻灯片宽度
  height:400,  //   幻灯片高度
  index : 0,		//页面开始的索引
  duration : 50000,		//自动播放时间
  easing : 500,     //切换速度
  autoPlay : true, //是否自动播放
  btnIcon:false,    //是否有按钮
  pageIcon : true,		//是否进行分页
  horizontal : "vertical",//是什么播放模式		//滑动方向vertical,horizontal

});