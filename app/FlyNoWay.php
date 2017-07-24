<?php

namespace App;

use App\FlyBehavior;

class FlyNoWay implements FlyBehavior
{
    public function fly(){
        return 'It could not be flying..';
    }
}
