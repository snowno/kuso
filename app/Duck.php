<?php

namespace App;
use App\FlyBehavior;
use App\FlyWithWings;
use App\FlyNoWay;

abstract  class Duck
{

    public function  performFly($fly){
        if(is_object($fly)){
            return $fly->fly();
        }
    }
}
