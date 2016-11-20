@extends('admin/master')

@section('content')
  <div class="pd-20">
    <div class="text-c"> 日期范围：
      <input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}'})" id="logmin" class="input-text Wdate" style="width:120px;">
      -
      <input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d'})" id="logmax" class="input-text Wdate" style="width:120px;">
      <input type="text" name="title" id="" placeholder=" 搜索标题" style="width:250px" class="input-text">
      <input type="text" name="tab" id="" placeholder=" 搜索标签" style="width:250px" class="input-text">
      <button onclick="onSelect()" name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" onclick="product_add('添加视频','{{asset('/admin/video/add')}}')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加产品</a></span> <span class="r">共有数据：<strong>{{$num}}</strong> 条</span> </div>
    <div class="mt-20">
      <table class="table table-border table-bordered table-bg table-hover table-sort">
        <thead>
        <tr class="text-c">
          <th width="40"><input name="" type="checkbox" value=""></th>
          <th width="40">ID</th>
          <th width="60">缩略图</th>
          <th width="100">视频标题</th>
          <th>描述</th>
          <th width="100">标签</th>
          <th width="100">视频地址</th>
          <th width="60">发布状态</th>
          <th width="100">操作</th>
        </tr>
        </thead>
        <tbody>

        @foreach($videos as $video)

        <tr class="text-c va-m">
          <td><input name="" type="checkbox" value=""></td>
          <td>{{$video->id}}</td>

          <td><a href="javascript:;"><img width="60" class="product-thumb" src="{{$video->video_thumb}}"></a></td>
          <td class="text-l">{{$video->video_title}}</td>
          <td class="text-l">{{$video->content}}</td>
          <td class="text-l">{{$video->tab}}</td>
          <td>{{$video->video_url}}</td>
          @if( $video->state == '1')
            <td class="td-status"><span class="label label-success radius">已发布</span></td>
          @else
            <td class="td-status"><span class="label label-danger radius">审核</span></td>
          @endif
          <td class="td-manage"><a style="text-decoration:none" onClick="product_stop(this,'10001')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a> <a style="text-decoration:none" class="ml-5" onClick="product_edit('产品编辑','product-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="product_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>

        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    {!! $videos->appends(['tab' => $tab,'title'=>$title])->links() !!}
  </div>
@endsection

@section('my-js')
  <script>
    function onSelect(){
      var tab = $('input[name=tab]').val();
      var title = $('input[name=title]').val();


      var url ="{{asset('/admin/video?title=')}}"+title+"&tab="+tab
      var index = layer.open({
        type: 2,
        title:false,
        content: url
      });

      layer.full(index);
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