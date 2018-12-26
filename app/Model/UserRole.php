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


    //反向关联
    public function role_group(){
        return $this->belongsTo(UserGroup::class,'group_id_array','group_id');
    }

    //定义获取器  IsRole = is_role
    public function getIsRoleAttribute($val){
        $data = [
            '0' => '没权限',
            '1' => '有权限',
        ];
        return $data[$val];
    }

    //定义修改器 RoleName = role_name
    public function setRoleNameAttribute($val){
        return $this->attributes['role_name'] = strtolower($val);
    }
}
