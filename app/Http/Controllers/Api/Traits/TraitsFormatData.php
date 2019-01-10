<?php
/**
 * Created by PhpStorm.
 * User: msp
 * Date: 2019/1/10
 * Time: 下午12:27
 */

namespace App\Http\Controllers\Api\Traits;


trait TraitsFormatData
{
    public function transFormat($code,$msg,$data){
        return [
            'code' => $code,
            'msg' => $msg,
            'data' => $data,
        ];
    }
}