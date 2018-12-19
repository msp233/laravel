<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class DbController extends Controller
{
    //
    public function index(){
        $result = DB::select('select * from students');
        dd($result);
    }
}
