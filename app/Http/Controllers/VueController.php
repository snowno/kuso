<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueController extends Controller
{
    public function create(){
        return view('vue/create');
    }
}
