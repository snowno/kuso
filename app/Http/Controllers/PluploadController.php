<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Illuminate\Support\Facades\Input;
use App\News;
use Tests\Feature\UserTest;

class PluploadController extends Controller
{
    public function create(){
        $qiniu = new UploadManager();
        $au = env('QINIU_ACCESSKEY');
        $sc = env('QINIU_SECRETKEY');
        $auth = new Auth($au,$sc);
        $bucket = env('QINIU_BUCKET');
        $token =$auth->uploadToken($bucket);
        $domain = env('UPLOADDOMAIN');
        return view('plupload/create',compact(['token','domain']));
    }

    /**
     * 一个表单提交，其中有图片上传的云存储例子.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new News;
        $data = Input::all();

        // get the uploaded files
        $validate = $model->checkValidate($data);
        if($validate->fails()){
            $warnings = $validate->messages();
            $show_warning = $warnings->first();
            print_r($warnings);
            print_r($show_warning);
        }else{
            $model->title = $data['title'];
            $model->content = $data['content'];
            $model->title_pic = $data['title_pic'];
            $model->uid = 2;
            $model->save();
            return redirect('news/index');
        }



    }
}
