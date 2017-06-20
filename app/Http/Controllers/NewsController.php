<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileUploader;
use App\News;
use Illuminate\Support\Facades\Input;

class NewsController extends Controller
{
    public function index(){

    }

    public function create(){
        $news = new News;
        return view('news/create',compact('news'));
    }

    public function store(){
        $model = new News;
        $data = Input::all();

        // initialize the FileUploader
        $FileUploader = new FileUploader('files', array(
            // Options will go here
        ));

        // call to upload the files
        $upload = $FileUploader->upload();

        if($upload['isSuccess']) {
            // get the uploaded files
            $files = $upload['files'];

                $validate = $model->checkValidate($data);

                if($validate->fails()){
                    $warnings = $validate->messages();
                    $show_warning = $warnings->first();
                    print_r($warnings);
                }else{
                    $model->title = $data['title'];
                    $model->content = $data['content'];
                    $model->title_pic = $files[0]['name'];
                    $model->uid = 2;
//                    var_dump($files);exit;
                    $model->save();
                    return redirect('news/index');
                }

        }
        if($upload['hasWarnings']) {
            // get the warnings
            $warnings = $upload['warnings'];
        };

    }

    public function show(Request $request){
        
        if(isset($request->all()['id'])){
            $id = $request->all()['id'];
            $news = News::find($id);
            // var_dump($news);exit;
            return view('news/view',compact('news'));
        }else{
            $news = News::all();
            return view('news/show',compact('news'));
        }
        
    }

    public function view(Request $request){

    }
}
