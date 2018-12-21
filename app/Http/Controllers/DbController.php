<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class DbController extends Controller
{
    //
    public function index(){
        //默认的配置
        //$result = DB::select('select * from students');

        //指定配置连接
        $result = DB::connection('newmysql')->select('select * from students');
        dd($result);
    }

    //
    public function curd(){

        /*查询*/
        //预处理sql
        //select参数： 1、sql语句 2、预处理语句的值
        $result = DB::connection('newmysql')->select('select * from students where id = ?',[3]);
        var_dump($result);
        $result = DB::connection('newmysql')->select('select * from students where id = :id',['id'=>1]);
        var_dump($result);

        /*新增*/
        $result = DB::connection('newmysql')->select("insert into students (name,age,sex) values (:name,:age,:sex)",['name'=>'msp','age'=>18,'sex'=>'1']);
        //$result = DB::connection('newmysql')->select("insert into students (name,age,sex) values (?,?,?)",['zs','6','1']);
        var_dump($result);
        $result = DB::connection('newmysql')->select('select * from students');
        dd($result);

    }

    //
    public function trans(){
        //自动事务
        /*DB::transaction(function(){
            //修改
            $num = DB::update('update students set sex = :sex where id= :id',['id'=>3,'sex'=>'0' ]);

            //删除
            $num1 = DB::delete("delete from students where id = :id",['id'=>9999999]);//一定失败

            var_dump($num,$num1);
            try{
                if($num && $num1){
                    return '事物操作成功';
                }else{
                    throw new \Exception('事物操作失败');
                }
            }catch (Exception $e){
                return $e->getMessage();
            }
        });*/

        //手动事务
        DB::beginTransaction();
        //修改
        $num = DB::update('update students set sex = :sex where id= :id',['id'=>3,'sex'=>'1' ]);

        //删除
        $num1 = DB::delete("delete from students where id = :id",['id'=>9999999]);//一定失败

        if($num && $num1){
            //事务提交
            DB::commit();
            return '事务操作成功';
        }else{
            //事务回滚
            DB::rollback();
            return '事务操作失败';
        }
    }

}
