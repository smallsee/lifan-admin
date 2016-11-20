
{{--@yield('title')--}}

  {{--@yield('content')--}}

{{--@yield('my-js')--}}

  <!DOCTYPE HTML>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <LINK rel="Bookmark" href="{{asset('/admin/favicon.ico')}}" >
    <LINK rel="Shortcut Icon" href="{{asset('/admin/favicon.ico')}}" />
    <link href="{{asset('/admin/css/H-ui.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/admin/css/H-ui.admin.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/admin/lib/icheck/icheck.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/admin/lib/Hui-iconfont/1.0.7/iconfont.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/admin/skin/default/skin.css')}}" rel="stylesheet" type="text/css" id="skin" />
    <title>@yield('title')</title>
    <meta name="keywords" content="H-ui.admin v2.3,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v2.3，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
  </head>
  <body>
  @yield('content')
  <script src="{{ asset('/web/lib/jquery.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/admin/lib/My97DatePicker/WdatePicker.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/admin/lib/datatables/1.10.0/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/admin/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/admin/lib/icheck/jquery.icheck.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/admin/lib/Validform/5.3.2/Validform.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/admin/js/H-ui.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/admin/js/H-ui.admin.js') }}"></script>

  <script src="{{ asset('/web/lib/layer/layer.js') }}"></script>
  <script src="{{ asset('/web/lib/layer/dialog.js') }}"></script>
  <script src="{{ asset('/web/js/uploadFile.js') }}"></script>
  <script src="{{ asset('/web/lib/kindeditor/kindeditor.js') }}"></script>
  @yield('my-js')
  </body>
  </html>