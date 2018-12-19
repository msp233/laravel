<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //
    public function with2(){
        return view('view.index')->with('name','lj')->with('sex','女');
    }
}
