<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//万能路由，弊端，控制器函数的方法参数不能通过注入方式获得，可以通过助手函数或者门面来解决参数获取的问题
//http://localhost:8080/Weidian/store/menmian?name=123
//其中 Weidian模块下的Store控制器，将 use Illuminate\Http\Request;  改成   use Request;
Route::any('{module}/{class}/{action}',function($module,$class,$action){
    //$class =  'Module:'.$module.'; class:'.$class.'; action:'.$action;
    $class = 'App\\Http\\Controllers\\' . ucfirst(strtolower($module)) . '\\' . ucfirst(strtolower($class)).'Controller';
    if(class_exists($class)){
        $classObject = new $class;
        if(method_exists($classObject,$action)){
            return call_user_func(array($classObject,$action));
        }else {
            return 'in ' . $class . ' can not find ' . $action;
        }
    }else {
        return $class . ' can not find';
    }
});
//http://localhost:8080/blog/public/index.php
Route::get('/', function () {
    return view('welcome');
});

Route::get('index', function () {
    return 'index route text';
});

//http://localhost:8080/blog/public/index.php/store-my/食品/abc?aa=bb&cc=dd
/*路由参数的注入*/
Route::get('store-my/{type_id}/{agent_id}',function($type_id,$agent_id){
    dd($type_id,$agent_id,$_GET);
    return '我已经进入到'.$type_id.'分类，'.$agent_id.'店铺了！';
});

//http://localhost:8080/blog/public/index.php/test2?aa=bb&cc=dd
//http://localhost:8080/blog/public/index.php/test2/食品?aa=bb&cc=dd
//http://localhost:8080/blog/public/index.php/test2/食品/abc?aa=bb&cc=dd
/*路由参数的获取  ? 是可选参数  上面的三个地址都可以正常访问 */
Route::get('test2/{type_id?}/{agent_id?}',function(Request $request){
    //dd($request);
    //dd($request::url());
    //dd($request::ip());
    //dd($request::all());
    //dd($request::route());
    dd($request::route('agent_id'));
    dd($request::route()->parameters());//获取所有的路由参数
    //dd($_SERVER);
});

//http://localhost:8080/blog/public/index.php/test?aa=bb&cc=dd
//普通参数的获取方式
Route::get('/test', function (Request $request) {
    dd($request::all());
});


//http://localhost:8080/blog/public/index.php/user/456daf
/*路由参数的限制，利用正则限制参数的类型*/
Route::get('user/{name}',function($name) {
    return '通过参数检测';
    //dd($name);
})->where('name','\d+[a-zA-Z]+');

//用get访问，
Route::get('get/',function(){
    return '<form action="get_arr" method="get">' . csrf_field() . '
        <input type="text" name="username"/><br/>
        <input type="password" name="password"/><br/>
        <input type="submit" value="提交"/>
        </form>';
});
Route::get('get_arr/',function(Request $request){
    dd(session('_token'));
    dd('已经接收到post提交的数据了',$request::all());
    //return '已经接收到post提交的数据了';
});


//用post访问，
Route::get('form/',function(){
    return '<form action="login" method="post">' . csrf_field() . '
        <input type="text" name="username"/><br/>
        <input type="password" name="password"/><br/>
        <input type="submit" value="提交"/>
        </form>';
});

Route::post('login/',function(Request $request){
    //dd(session('_token'));
    //dd('已经接收到post提交的数据了',$request::all());
    //return '已经接收到post提交的数据了';
    return $request::all()['username'];
});


/////////// 作业：模拟其他形式表单提交，delete put ////////////
Route::get('put',function(){
    return '
<form action="put_out" method="post">
<input type="hidden" name="_method" value="PUT">' . csrf_field() . '
<input type="text" name="username"/>
<input type="password" name="password"/>
<input type="submit" value="提交"/>
</form>';
});

Route::put('put_out',function(Request $request){
    var_dump($request::all());
});

//////////////////
Route::get('delete',function(){
    return '
<form action="delete_out" method="post">
<input type="hidden" name="_method" value="delete">' . csrf_field() . '
<input type="text" name="username"/>
<input type="password" name="password"/>
<input type="submit" value="提交"/>
</form>';
});

Route::delete('delete_out',function(Request $request){
    dd($request::all());
});

//用get访问，
Route::get('get1/',function(){
    return '<form action="response" method="get">' . csrf_field() . '
        <input type="text" name="username"/><br/>
        <input type="password" name="password"/><br/>
        <input type="submit" value="提交"/>
        </form>';
});
//用post访问，
Route::get('post1/',function(){
    return '<form action="response" method="post">' . csrf_field() . '
        <input type="text" name="username"/><br/>
        <input type="password" name="password"/><br/>
        <input type="submit" value="提交"/>
        </form>';
});
//注册一个路由响应多种 HTTP 请求动作
Route::match(['get','post','options'],'/response',function (Request $request){
    dd($request::all());
});
Route::any('/any',function (Request $request){
    dd($request::all());
});


//兜底路由
Route::fallback(function(){
    return '没有这个路由';
});



//访问某一个应用下的控制器方法
//Route::get('/store ','Weidian\StoreController@index');
//http://localhost:8080/laravel/public/index.php/choose
Route::get('/choose','Weidian\StoreController@choose');

//http://localhost:8080/laravel/public/index.php/weidian/store?abc=aa
//http://localhost:8080/laravel/public/index.php/weidian/choose?abc=aa
//Route::get('/store ','Weidian\StoreController@index'); //Weidian是命名空间
//路由组，把相同的路由分一个组，共享信息
Route::group(['namespace'=>'Weidian','prefix'=>'weidian'],function(){
    Route::get('/store ','StoreController@index');
    Route::get('/choose','StoreController@choose');
});

//http://localhost:8080/laravel/public/index.php/store?abc=aa
//路由组，没有前缀的效果，可以省略了命名空间
Route::group(['namespace'=>'Wap'],function(){
    Route::get('/store ','StoreController@store');
});
//http://localhost:8080/laravel/public/index.php/wap/store?abc=aa
//不同的模块或应用可以放在不同的路由组下分配前缀
Route::group(['prefix'=>'wap'],function (){
    Route::get('/store',function(){
        dd('这是wap下的store');
    });
});

//单一控制器
//http://localhost:8080/laravel/public/index.php/only
Route::get('only','Only\SilpController');

//资源控制器
//http://localhost:8080/laravel/public/index.php/user
Route::resource('user','Api\UserController');
Route::resource('user1','Api\UserController')->Only(['index','store']);
Route::resource('user2','Api\UserController')->except(['index','store']);


//请求
Route::get('request',function(){
    return view('request/js');
});

//响应
Route::get('response',function(){
    return response('hello msp',200,['Content-type'=>'text/html']);
});

//下载
Route::get('download',function(){
    return response('hello msp',200,['Content-type'=>'application/download']);
});
Route::get('download11',function(){
    return response()->download(public_path('svg/404.svg'),'测试.svg');
});

//查看
Route::get('file',function(){
    return response()->file(public_path('img/ceshi.jpg'));
});

//响应json数据
Route::get('json',function(){
    return ['username'=>'msp'];
});
Route::get('json2',function(){
    return response()->json(['username'=>'msp']);
});

//重定向
//重定向到本地服务器其他位置
Route::get('return',function(){
    return redirect('file');
});
//重定向到外链
Route::get('return',function(){
    return redirect()->away('http://www.baidu.com');
});


//cookie session
//设置cookie
Route::get('setcookie','RequestController@setcookie');

//获取cookie
Route::get('getcookie','RequestController@getCookie');

//删除cookie
Route::get('delcookie','RequestController@delCookie');

//设置session
Route::get('setsession','RequestController@setSession');

//获取session
Route::get('getsession','RequestController@getSession');

//删除session
Route::get('delsession','RequestController@delSession');


//验证器
Route::match(['get','post'],'loginyzq','Admin\LoginController@login');


Route::any('/error','Admin\LoginController@error');
Route::any('/enter','Admin\LoginController@enter');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
