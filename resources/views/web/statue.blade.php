@extends('web/master')


@section('title', '状态机')


@section('my-js')

  <script>
    dialog.confirm('{{$message}}','http://www.hlifan.com/login');
  </script>

@endsection
