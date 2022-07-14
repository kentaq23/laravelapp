@extends('layouts.jissyu')

@section('title', 'Jissyu')

@section('menu_title')
ユーザ情報詳細画面

@endsection
@section('content')
   <table>
   <tr><th>Name(Age)</th><th>Mail</th></tr>
       <tr>
           <td>___(12)___</td>
           <td>{{$item->mail}}</td>
       </tr>
   </table>
@endsection

@section('footer')
copyright 2020 東京情報クリエイター工学院専門学校.
@endsection
