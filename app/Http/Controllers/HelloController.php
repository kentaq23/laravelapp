<?php

namespace App\Http\Controllers;
//test2
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Person;
use Illuminate\Support\Facades\Auth;


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
   $user = Auth::user();
   if(isset($request->sort)){
      $sort = $request->sort;
   }else {
      $sort ='age';
   }
   $items = Person::orderBy($sort, 'asc')
       ->simplePaginate(5);
   $param = ['items' => $items, 'sort' => $sort, 'user' => $user];
   return view('hello.index', $param);
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

public function rest(Request $request)
{
   return view('hello.rest');
}

public function ses_get(Request $request)
{
   $sesdata = $request->session()->get('msg');
   return view('hello.session', ['session_data' => $sesdata]);
}

public function ses_put(Request $request)
{
   $msg = $request->input;
   $request->session()->put('msg', $msg);
   return redirect('hello/session');
}

public function getAuth(Request $request)
{
   $param = ['message' => 'ログインして下さい。'];
   return view('hello.auth', $param);
}

public function postAuth(Request $request)
{
   $email = $request->email;
   $password = $request->password;
   if (Auth::attempt(['email' => $email,
           'password' => $password])) {
       $msg = 'ログインしました。（' . Auth::user()->name . '）';
   } else {
       $msg = 'ログインに失敗しました。';
   }
   return view('hello.auth', ['message' => $msg]);
}
}