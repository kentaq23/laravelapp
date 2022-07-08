<?php

namespace App\Http\Controllers;
//test2
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
global $head, $style, $body, $end;
$head = '<html><head>';
$style = <<<EOF
<style>
body {font-size:16pt; color:#999; }
h1 { font-size:100pt; text-align:right; color:#eee;
   margin:-40px 0px -50px 0px; }
</style>
EOF;
$body = '</head><body>';
$end = '</body></html>';

function tag($tag, $txt) {
   return "<{$tag}>" . $txt . "</{$tag}>";
}

class HelloController extends Controller
{
  
   // -----------トップデータの表示-----------------

   public function index(Request $request)
{
   $items = DB::table('people')->get();
   return view('hello.index', ['items' => $items]);
}

   public function post(HelloRequest $request)
   {
       return view('hello.index', ['msg'=>'正しく入力されました！']);
   }

   // ---------------トップページの挿入-----------------
   public function add(Request $request)
   {
       return view('hello.add');
   }

   public function create(Request $request)
{
   $param = [
       'name' => $request->name,
       'mail' => $request->mail,
       'age' => $request->age,
   ];
   DB::table('people')->insert($param);
   return redirect('/hello');
}

   public function edit(Request $request)
{
   $param = ['id' => $request->id];
   $item = DB::select('select * from people where id = :id', $param);
   return view('hello.edit', ['form' => $item[0]]);
}

public function update(Request $request)
{
   $param = [
       'id' => $request->id,
       'name' => $request->name,
       'mail' => $request->mail,
       'age' => $request->age,
   ];
   DB::update('update people set name =:name, mail = :mail, age = :age where id = :id', $param);
   return redirect('/hello');
}

public function show(Request $request)
{
   $page = $request->page;
   $items = DB::table('people')
       ->offset($page * 3)
       ->limit(3)
       ->get();
   return view('hello.show', ['items' => $items]);
}
}