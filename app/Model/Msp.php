<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//引入软删除类库
use Illuminate\Database\Eloquent\SoftDeletes;

class Msp extends Model
{
    use SoftDeletes;
    //设置表名
    protected $table = 'msp';

    //关闭自动更新时间字段
    //public $timestamps = false;

    //设置表名主键id 默认为 id
    protected $primaryKey = 'id';

    //允许操作的属性 //类似于白名单
    protected $fillable = ['name','email'];

    //禁止操作的属性  //类似于黑名单 ，只用写其中一种即可
    protected $guarded = ['email_verified_at',];
}
