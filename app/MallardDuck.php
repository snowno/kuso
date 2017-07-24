<?php

namespace App;

use App\Duck;
use App\FlyWithWings;
use App\FlyNoWay;

class MallardDuck extends Duck
{
    public function MallardDuck(){
        return new FlyNoWay();
    }

    public function display(){
        return 'this is mallardDisplay';
    }
}
