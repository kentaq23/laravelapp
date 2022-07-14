@extends('layouts.jissyu')

@section('title', 'Jissyu')

@section('menu_title')
ユーザ情報削除画面
@endsection

@section('content')
   <form action="___(16)___" method="post">
   <table>
      @csrf
      <input type="hidden" name="id" value="___(17)___">
      <tr><th>name: </th><td>{{$item->name}}</td></tr>
      <tr><th>mail: </th><td>{{$item->mail}}</td></tr>
      <tr><th>age: </th><td>{{$item->age}}</td></tr>
      <tr><th></th><td><input type="submit" value="削除"></td></tr>
   </table>
   </form>
@endsection

@section('footer')
copyright 2020 東京情報クリエイター工学院専門学校.
@endsection
