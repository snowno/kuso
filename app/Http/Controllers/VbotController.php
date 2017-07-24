<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hanson\Vbot\Example\Handlers\Contact\Hanson;
use Hanson\Vbot\Foundation\Vbot;

class VbotController extends Controller
{
    public function test(){
        $config = [];
        $vbot = new Vbot($config);
        $vbot->messageHandler->setHandler(function(Collection $mess){
            Text::send($mess['from']['UserName'],'Hey');
        });

    }
}
