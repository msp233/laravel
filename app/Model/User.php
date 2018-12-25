<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'uid';
    //用户与角色的关联
    public function userRole(){
        //第一个参数是 关联模型
        //第二个参数是 关联模型的关联字段
        //第三个参数是 本地模型关联的字段
        return $this->hasOne('App\Model\UserRole','role_id','role_id');
    }

    //多对多 查询用户所在用户组
    public function userGroup(){
        //参数1 关联模型
        //参数2 中间表名
        //参数3 指定中间表进行关联本地模型的字段
        //参数4 指定中间表进行关联 关联模型的字段
        //参数5 指定本地模型关联中间表字段
        //参数6 指定关联模型关联中间表的字段
        return $this->belongsToMany(UserGroup::class,'user_role','role_id','group_id_array','role_id','group_id');
    }
}
