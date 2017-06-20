<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileUploader;
use App\Message;
use Illuminate\Support\Facades\Input;

class MessageController extends Controller
{

	public  function store(Request $request){

		$data = $request->all();
		$model = new Message;

        $validate = $model->checkValidate($data);
        if($validate->fails()){
            $warnings = $validate->messages();
            $show_warning = $warnings->first();
            print_r($warnings);
            print_r($show_warning);
        }else{
            $model->name = $data['name'];
            $model->message = $data['message'];
            $model->email = $data['email'];
            $model->uid = 2;
            $model->save();
            return redirect('news/index');
        }

	}
}