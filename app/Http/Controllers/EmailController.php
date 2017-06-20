<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class EmailController extends Controller
{
    public function index($id)
    {
        $email = '542145728@qq.com';
        $name = 'this is name';
        $uid = 2;
        $data = ['email'=>$email, 'name'=>$name, 'uid'=>$uid, 'activationcode'=>'2'];
        Mail::send('activemail', $data, function($message) use($data)
        {
            $message->to($data['email'], $data['name'])->subject('这是一个测试');
        });
    }
}
