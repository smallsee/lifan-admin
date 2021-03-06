@extends('admin/master')

<link rel="stylesheet" href="{{asset('/admin/css/video.css')}}">
@section('content')
  <div class="pd-20">
    <div class="text-c"> 日期范围：
      <input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}'})" id="logmin" class="input-text Wdate" style="width:120px;">
      -
      <input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d'})" id="logmax" class="input-text Wdate" style="width:120px;">
      <input type="text" name="title" id="" placeholder=" 搜索标题" style="width:150px" class="input-text" value="{{$title}}">
      <input type="text" name="tab" id="" placeholder=" 搜索标签" style="width:150px" class="input-text" value="{{$tab}}">
      <input type="text" name="home" id="" placeholder=" 首页状态" style="width:100px" class="input-text" value="{{$home}}">
      <input type="text" name="state" id="" placeholder=" 审核状态" style="width:100px" class="input-text" value="{{$state}}">
      <button onclick="onSelect()" name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" onclick="product_add('添加本子','{{asset('/admin/book/add')}}')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加产品</a></span> <span class="r">共有数据：<strong>{{$num}}</strong> 条</span> </div>
    <div class="mt-20">
      <table class="table table-border table-bordered table-bg table-hover table-sort">
        <thead>
        <tr class="text-c">
          <th width="40"><input name="" type="checkbox" value=""></th>
          <th width="40">ID</th>
          <th width="60">缩略图</th>
          <th width="100">本子标题</th>
          <th>描述</th>
          <th width="100">标签</th>
          <th width="100">是否首页</th>
          <th width="60">发布状态</th>
          <th width="100">操作</th>
        </tr>
        </thead>
        <tbody>

        @foreach($books as $book)

        <tr class="text-c va-m">
          <td><input name="" type="checkbox" value=""></td>
          <td>{{$book->id}}</td>

          <td><a href="javascript:;"><img onclick="product_add('图片ID : {{$book->id}}','{{$book->book_thumb}}')" width="60" class="product-thumb" src="{{$book->book_thumb}}"></a></td>
          <td class="text-l">{{$book->book_title}}</td>
          <td class="text-l">{{$book->content}}</td>
          <td class="text-l">{{$book->tab}}</td>
          @if( $book->home == '1')
            <td style="cursor: pointer" class="td-status"><span class="label label-success radius" onclick="changeHome('{{$book->id}}','0')">首页</span></td>
          @else
            <td style="cursor: pointer" class="td-status"><span class="label label-default radius" onclick="changeHome('{{$book->id}}','1')">正常</span></td>
          @endif

          @if( $book->state == '1')
            <td style="cursor: pointer" class="td-status"><span class="label label-success radius" onclick="changeState('{{$book->id}}','0')">已发布</span></td>
          @else
            <td style="cursor: pointer" class="td-status"><span class="label label-danger radius" onclick="changeState('{{$book->id}}','1')">审核</span></td>
          @endif
          <td class="td-manage">
            <a onclick="product_add('预览','{{asset('/book/list?id=')}}{{$book->id}}')" style="text-decoration:none" onClick="" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe695;</i></a>
            <a style="text-decoration:none" class="ml-5" onclick="product_add('编辑本子','{{asset('/admin/book/edit?id=')}}{{$book->id}}')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
            <a style="text-decoration:none" class="ml-5" onclick="video_del('{{$book->id}}')"  href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>

    <div id="video_li_page">
      {!! $books->appends(['tab' => $tab,'title'=>$title,'state'=>$state,'home'=>$home])->links() !!}
    </div>

  </div>
@endsection

@section('my-js')

  <script>
    function onSelect(){
      var tab = $('input[name=tab]').val();
      var title = $('input[name=title]').val();
      var state = $('input[name=state]').val();
      var home = $('input[name=home]').val();

      var url ="{{asset('/admin/book?title=')}}"+title+"&tab="+tab+"&state="+state+"&home="+home;
      var index = layer.open({
        type: 2,
        title:false,
        content: url
      });

      layer.full(index);
    }
    function changeState(id,state){
      layer.open({
        content: '是否更改状态',
        icon: 4,
        btn: ['是', '否'],
        yes: function () {
          $.ajax({
            type: "POST",
            url: "{{asset('/api/bookState')}}",
            cache: false,
            data: { id:id,state:state,_token: "{{csrf_token()}}"},
            success: function(data) {

              if(data == '1'){
                dialog.success('更改状态成功',"{{asset('/admin/book')}}")
              }else{
                dialog.error(data);
              }

            },
            error: function(xhr, status, error) {
              console.log(xhr);
              console.log(status);
              console.log(error);
            }
          });

        }
      })

    }

    function changeHome(id,state){
      layer.open({
        content: '是否改变首页状态',
        icon: 4,
        btn: ['是', '否'],
        yes: function () {
          $.ajax({
            type: "POST",
            url: "{{asset('/api/bookHome')}}",
            cache: false,
            data: { id:id,state:state,_token: "{{csrf_token()}}"},
            success: function(data) {

              if(data == '1'){
                dialog.success('设置上首页',"{{asset('/admin/book')}}")
              }else{
                dialog.error(data);
              }

            },
            error: function(xhr, status, error) {
              console.log(xhr);
              console.log(status);
              console.log(error);
            }
          });

        }
      })

    }

    function video_del(id){

      layer.open({
        content : '是否真的删除',
        icon:5,
        btn : ['是','否'],
        yes : function(){
          $.ajax({
            type: "POST",
            url: "{{asset('/api/bookDel')}}",
            cache: false,
            data: { id:id,_token: "{{csrf_token()}}"},
            success: function(data) {

              if(data == '1'){
                dialog.success('删除成功',"{{asset('/admin/book')}}")
              }else{
                dialog.error(data);
              }

            },
            error: function(xhr, status, error) {
              console.log(xhr);
              console.log(status);
              console.log(error);
            }
          });
        }
      });

    }
    /*图片-添加*/
    function product_add(title,url){
      var index = layer.open({
        type: 2,
        title: title,
        content: url
      });
      layer.full(index);
    }


  </script>
@endsection
