<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(){
        var_dump($_POST);var_dump($_FILES);exit;
    }
}
