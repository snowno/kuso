<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MiniDuck;
class DuckController extends Controller
{
    public function duck(){
        $duck = new MiniDuck();
        $data = $duck->DuckTest();
        var_dump($data);
    }
}
