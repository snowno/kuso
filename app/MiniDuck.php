<?php

namespace App;

use App\MallardDuck;

class MiniDuck{

    public function DuckTest(){
        $duck = new MallardDuck();
        $obj = new FlyWithWings();
        return $duck->performFly($obj);
    }
}
