<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //表名
    protected $table = 'user_role';
    //主键名
    protected $primaryKey = 'role_id';
}
