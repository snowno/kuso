<?php

namespace App;

use App\FlyBehavior;

class FlyWithWings implements FlyBehavior {

    public function fly(){
        return 'It could  be flying..';
    }
}
