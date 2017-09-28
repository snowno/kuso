<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    /*
     * $args 可变参数
     * */
    public static function getArg(...$args){

//        return func_get_arg(0);
        return $args;
    }
}
