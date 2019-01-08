<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

class AuthController extends Controller
{
    //访问认证成功的用户
    public function auth(){
        //访问当前用户信息
        dump(Auth::user());
        dump(Auth::id());
    }

    public function authentic(Request $request){
        $crde = $request->only('email','password');
        //dump($crde);
        if(Auth::attempt($crde)){
            //intended 重定向到指定url
            return redirect()->intended('home');
        }else{
            return redirect()->intended('login');
        }
    }

    public function test(){
        return '这是auth认证';
    }

    //http的请求认证
    public function basic(){
        dd('这是http认证');
    }

    //加密
    public function crypt(){
        //加密
        $name = encrypt('msp');
        dump($name);

        //解密
        dump(decrypt($name));

        //hash加密
        $password = Hash::make('msp');
        dump($password);

        //hash密码判断
        dump(Hash::check('msp',$password));
    }
}
