<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Message extends Model
{
    protected $table = 'message';

    protected $fillable = [
        'name', 'email', 'message','uid','created_at','updated_at',
    ];

    public function checkValidate($data){
        $rules = array(
            'name' => 'required|max:20',
            'email' => 'email',
            'message' => 'required|between:1,1000',
        );
        $message = array(
            "required"             => ":attribute 不能为空",
            "between"      => ":attribute 长度必须在 :min 和 :max 之间",
            "max"      => ":attribute 最多 :max",
            'email'    => ':attribute必须是邮箱格式',
        );

        $attributes = array(
            "name" => '名称',
            'message' => '内容',
            'email' => '邮箱',
        );

        $validate = Validator::make($data,$rules,$message,$attributes);
        return $validate;
    }
}