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
}
