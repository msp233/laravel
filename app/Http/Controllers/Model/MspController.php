<?php

namespace App\Http\Controllers\Model;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Msp;
use App\Model\User;
use App\Model\UserRole;


class MspController extends Controller
{
    //
    public function index(){
        /*
        //查询所有
        dump(Msp::all());

        //查询单条
        //根据id查询单条
        dump(Msp::find(2));
        //返回结果集中的第一条数据
        dump(Msp::first());

        //object结果转化为array
        dump(Msp::where('id','=',5)->first()->toArray());
        */

        //新增  1、save   2、Msp::insert()
        /*$msp = new Msp;
        $msp->name = 'ceshi';
        $msp->email = 'test@qq.com';
        $bool = $msp->save();
        dump($bool);*/
        /*$bool = Msp::insert([
            'name' => 'admin',
            'email' => 'admin@163.com',
        ]);
        dump($bool);*/

        //修改
        /*
        $msp = Msp::find(3);
        $msp->name = 'DBA';
        $re = $msp->save();
        dump($re);*/

        //删除   1、直接删除  2、软删除

        //直接删除
        /*
        $msp = Msp::find(5);
        $re = $msp->delete();
        //$re = Msp::find(5)->delete();
        dump($re);
        */

        //软删除
        /*$re = Msp::find(10)->delete();
        dump($re);*/

        //强制查询软删除数据  withTrashed() 舍弃deleted_at字段的判断
        /*$re = Msp::withTrashed()->find(7)->toArray();
        dump($re);*/

        //恢复软删除的数据
        /*$re = Msp::where('id','=',7)->restore();
        //$re = Msp::withTrashed()->find(7)->restore();
        dump($re);*/

        //开启软删除后，进行强删除
        /*$re = Msp::where('id','=',10)->forceDelete();
        //$re = Msp::withTrashed()->find(10)->forceDelete();
        dump($re);*/

        //批量操作 create()
        $data = ['name' => '李四1' , 'email' => '1232316@126.com' , 'email_verified_at' => time()];
        $re = Msp::create($data);
        dump($re);


    }

    public function role(){
        //用户找角色
        /*$re = User::find(3)->userRole->toArray();
        dump($re);*/

        //角色找用户
        /*$re = UserRole::find(2)->role;
        dump($re);*/
    }
    public function roles(){
        $re = UserRole::find(4)->roles->toArray();
        dump($re);
    }
}
