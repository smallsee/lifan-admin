<table border="1">
  <tr>
    <th>id</th>
    <th>标题</th>

    <th>标签</th>
    <th>封面图</th>
    <th>操作</th>
  </tr>
  @foreach ($books as $book)
    <tr>
      <td>{{$book->id}}</td>
      <td>{{$book->book_title}}</td>
      <td>{{$book->tab}}</td>
      <td>{{$book->book_thumb}}</td>
      <td><a href="{{asset('/api/book/del?id=')}}{{$book->id}}">删除</a><a href="">修改</a></td>

    </tr>
  @endforeach

</table>

{!! $users->links() !!}
<div class="container">

</div>
