<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //表名
    protected $table = 'user_role';
    //主键名
    protected $primaryKey = 'role_id';

    //反向关联
    public function role(){
        return $this->belongsTo(User::class,'role_id','role_id');
    }

    //一对多
    public function roles(){
        return $this->hasMany(User::class,'role_id','role_id');
    }
}
