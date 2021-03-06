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
        dump(Msp::where('id','=',5)->first()->toArray());*/


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

        //恢复软删除的数据 1、检索软删除模型 2、强制查询软删除模型(withTrashed)
        $re = Msp::onlyTrashed()->find(7);
        $re2 = Msp::withTrashed()->find(7);
        dump($re,$re2);
        /*$re = Msp::where('id','=',7)->restore();
        //$re = Msp::withTrashed()->find(7)->restore();
        dump($re);*/

        //开启软删除后，进行强删除
        /*$re = Msp::where('id','=',10)->forceDelete();
        //$re = Msp::withTrashed()->find(10)->forceDelete();
        dump($re);*/

        //批量操作 create()
        /*$data = ['name' => '李四1' , 'email' => '1232316@126.com' , 'email_verified_at' => time()];
        $re = Msp::create($data);
        dump($re);*/


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
        //一对多
        /*$re = UserRole::find(4)->roles->toArray();
        dump($re);*/

        //多对多
        //查询某一指定用户所在的用户组
        /*$re = User::find(2)->UserGroup->toArray();
        dump($re);*/

        //远程一对多
        $re = User::find(2)->many->toArray();
        dump($re);
    }
    public function with(){
        /*$re = UserRole::all();
        dump($re);
        foreach ($re as $item) {
            dump($item->role->user_name);
        }*/

        //echo "<hr/>";
        //解决1+N
        /*$re = UserRole::with('role')->get();
        foreach ($re as $val){
            //查询什么关联数据，需要指定其关联模型属性
            dump($val->role->user_name);
        }*/

        /*$re = UserRole::with('role_group')->get();
        foreach ($re as $val){
            //查询什么关联数据，需要指定其关联模型属性
            dump($val->role_group->group_name);
        }*/

        //你的条件需要指定关联模型 ?报错
        $re = User::with(['userRole','many'])->get();
        foreach($re as $val){
            //查询什么关联数据，需要指定其关联模型属性
            dump($val->userRole->role_name);
            dump($val->many->toArray()[0]['group_name']);
        }
    }
    public function attr(){
        //获取处理数据
        /*$re = UserRole::find(4);
        dump($re,$re->is_role);*/

        //修改器效果
        $re = UserRole::find(2);
        dump($re,$re->role_name);

        $re->role_name = 'SDDSDFA';
        dump($re,$re->role_name);
    }
}
