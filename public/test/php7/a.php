<?php
/**
 * Created by PhpStorm.
 * User: msp
 * Date: 2018/12/29
 * Time: 上午10:49
 */
//declare(strict_types = 1);
//ini_set('display_errors',1);
//error_reporting(-1);

echo "<h2>太空船操作符 <=></h2>";
echo "<h3>整数比较</h3>";
var_dump( 1 <=> 2);
var_dump( 2 <=> 2);
var_dump( 3 <=> 2);

echo "<h3>浮点数比较</h3>";
var_dump( 1.6 <=> 2.1);
var_dump( 2.78 <=> 2.78);
var_dump( 3.23 <=> 2.97);

echo "<h3>字符串比较</h3>";
var_dump( 'abc' <=> "abd");
var_dump( "ddd" <=> 'ddd');
var_dump( "eee" <=> 'eac');


echo "<h3>严格模式</h3>";
function sumOfInts(int ...$ints)
{
    return '6adsf';//array_sum($ints);
}

var_dump(sumOfInts(1,7,3.2,'2.6'));


echo "<h3>:int 规定了返回值必须是int型</h3>";
function sumOfInts2(int ...$ints) :int
{
    return '6adsf';//array_sum($ints);
}

var_dump(sumOfInts2(1,7,3.2,'2.6'));



echo "<h3> 三元运算符 语法糖</h3>";
echo '原来这么写 $page = isset($_GET["page"]) ? $_GET["page"] : 0 ,现在可以这么写'."<br/>";
echo '$page = $_GET["page"] ?? 0 '."<br/>";
echo '意思是 ，那个变量存在且值不为null，它会返回自身的值，否则他会返回第二个操作数'."<br/>";
echo '当有连续的三元运算符，还可以这么写 '."<br/>";
echo '$page =  $_GET["page"] ?? $_GET["page"] ?? 0 '."<br/>";

$a = null;
var_dump($a ?? 3);
$b = 6;
var_dump($b ?? 3);


echo "<h3> 批量导入一个namesapce下的多个class</h3>";
echo '原来这么写：<br/>';
echo "use Space\\CalssA;<br/> use Space\\ClassB;<br/> useSpace\\ClassC as C;<br/>";
echo "现在这么写:<br/>use Space\\{ClassA,ClassB,ClassC as C};";

$arr = ['a','c',123,'uyyyy','666','9',9];
var_dump($arr);
[$a,$b,$c,$d,$e,$f,$g] = $arr;

var_dump($d);
