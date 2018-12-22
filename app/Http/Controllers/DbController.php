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

    //查询构造器
    public function get(){
        //查询所有的数据
        //  查询构造器，返回的是一个staClass对象
        /*$result = DB::table('students')->get();

        foreach($result as $value){
            echo $value->id . ' ' . $value->name."<br/>";
        }

        var_dump($result);*/

        //对象转换成数组
        //toArray() 只能转换一维数组
        //  不建议转换，数据越多、纬度越深，消耗资源、时间越多，可以直接操作对象
        /*$result = DB::table('students')->get()->map(function ($value){
            return (array)$value;
        })->toArray();

        var_dump($result);*/

        //指定字段查询并去重
        /*$result = DB::table('students')->select('name','age')->distinct()->get();
        var_dump($result);*/

        /* where 条件 */
        //1、可以指定条件查询，默认是= 等号
        /*$result = DB::table('students')->where('id','>','1')->get();
        $result1 = DB::table('students')->where('id','1')->get();
        var_dump($result,$result1);*/

        //2、多个条件查询
        //注意：where 一维数组只能 key=>value 的形式，默认是=  ，二维数组需要指明条件
        /*$result = DB::table('students')->where([
            ['id','>=','5'],
            'name'=>'msp',
        ])->get();

        //or语句
        $result1 = DB::table('students')->where(DB::raw("name='msp' or id>1"))->get();

        //orwhere语句
        $result2 = DB::table('students')->where('name','msp')->orwhere('id','>',1)->get();
        var_dump($result,$result1,$result2);*/

        /* 分块操作 */
        //chunk参数：1、分块的大小 ； 2、闭合函数
        /*$result = DB::table('students')->orderBy('id')->chunk(2,function($citys){
            //var_dump($citys);
            foreach($citys as $val){
                echo $val->id . ' ' . $val->name . ' ' . $val->password . ' ' . $val->age . ' ' . $val->sex . "<br/>";
            }
            //终止分块操作
            //return false;
        });
        var_dump($result);*/

        /*  子查询  */
        /*$last = DB::table('students')
            ->select('id',DB::raw('name as username'))
            ->where('id','>=','2')
            ->orderBy('id','desc');
        //joinsub 子查询 参数：1、结果集 2、临时表别名 3、闭包函数
        $users = DB::table('abc')
            ->joinsub($last,'stu',function ($join){
                $join->on('abc.id','=','stu.id');
            })->get();
        var_dump($users);*/
        //select * from `abc` inner join (select `id`, name as username from `students` where `id` >= '2' order by `id` desc) as `stu` on `abc`.`id` = `stu`.`id`

        /*  排序：latest 降序；oldest 升序 默认按照created_at日期时间排序  */
        /*$result = DB::table('students')->latest('id')->get();
        var_dump($result);*/

        /*  分组  */
        //做分组，需要修改config下的database.php 文件下的mysql配置项的strict属性 改为false  (严格模式关闭)
        /*$result = DB::table('students')->groupBy('sex')->get();
        var_dump($result);*/

        /*  限制结果集  */


        /*$result1 = DB::table('students')->skip(1)->take(2)->get();
        $result2 = DB::table('students')->limit(2)->get();
        $result3 = DB::table('students')->offset(1)->limit(2)->get();
        $result4 = DB::table('students')->skip(1)->take(2)->get();
        var_dump($result1,$result2,$result3,$result4);*/

        /*  修改数据  */
        $result = DB::table('students')->where('id',3)->update(['name'=>'李四']);
        $re2 = DB::table('students')->get()->map(function ($val){
             return (array)$val;
        })->toArray();
        var_dump($result,$re2);




    }
}
