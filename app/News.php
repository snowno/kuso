<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class News extends Model
{
    protected $fillable = [
        'title', 'title_pic', 'content','uid','created_at','updated_at',
    ];

    public function checkValidate($data){
        $rules = array(
            'title' => 'required|max:20',
            'content' => 'required|between:1,100',
        );
        $message = array(
            "required"             => ":attribute 不能为空",
            "between"      => ":attribute 长度必须在 :min 和 :max 之间",
            "max"      => ":attribute 最多 :max"
        );

        $attributes = array(
            "title" => '标题',
            'content' => '内容',
            'title_pic' => '标题图片',
        );

        $validate = Validator::make($data,$rules,$message,$attributes);
        return $validate;
    }
}
