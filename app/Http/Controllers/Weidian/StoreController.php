<?php

namespace App\Http\Controllers\Weidian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    //
    public function index(Request $request){
        //var_dump($request->all());
        //return '这是 Weidian/StoreController 控制器首页';
        $data = array(
            'name'=>'msp',
        );
        return view('Weidian/store',$data);
    }

    public function choose(Request $request){
        //return '选择店铺商品的页面';
        return view('Weidian/choose');
    }
}
