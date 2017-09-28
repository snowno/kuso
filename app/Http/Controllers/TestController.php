<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Input;

class TestController extends Controller
{
    //

    public function index(){
        return 'test ok';
    }

    /*
     * 斐波那契
     * */
    public function fibonacci($number){
        $head = [0,1];
        $num = 2;
        $arr = [];
        while($num <= $number){
            $head[$num] = $head[$num-1]+$head[$num-2];
            $num++;
        }
        return $head[$number];
    }

    /*
     * 斐波那契递归
     * */
    public function fibonacciDG($num){
        if($num < 2){
            return $num;
        }else{
            return ($this->fibonacci($num-1)+$this->fibonacci($num-2));
        }
    }

    /*
     * 冒泡升序排序
     * */
    public function bubbleSort(){
        $num = [2,6,3,2,8,5,1];
        if(is_array($num)){
            $count = count($num);
            for($i=0;$i<$count;$i++){
                for($j = $i;$j<$count;$j++){
                    if($num[$i] > $num[$j]){
                        $t = $num[$j];
                        $num[$j] = $num[$i];
                        $num[$i] = $t;
                    }
                }
            }
            return $num;
        }
    }

    public function arg(){
        $arg = Input::getArg('1,2,3');
        var_dump($arg);
    }
}


