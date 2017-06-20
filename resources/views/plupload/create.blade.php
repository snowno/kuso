@extends('layouts.app')
@section('header_script')
    <script src="http://cdn.staticfile.org/Plupload/2.1.1/plupload.full.min.js"></script>
    <script src="https://cdn.staticfile.org/qiniu-js-sdk/1.0.14-beta/qiniu.js"></script>
    <style>
        li{
            min-height: 30px;
            margin-bottom: 20px;
            line-height: 30px;
            display: list-item;
            text-align: -webkit-match-parent;
        }
        .company_r .cpy_type,.company_r .lxs_type {float: left;}
        .cpy_type>input[type=radio] ,.lxs_type>input[type=radio] {margin-right: 5px;float: left;margin-top: 9px;}
        .cpy_type>label ,.lxs_type>label{margin-right: 90px;float: left;}
        .company_r .ipt_select {min-width: 116px;height: 30px;text-indent: 10px;}
        .company_r .ipt_select+.ipt_select {margin-left: 50px;}
        .mess-cont ul>li>.title_l {display: inline-block;width: 130px;font-size: 12px;color: #333333;font-weight: 600;}
        .mess-cont ul>li i {color: red;margin-left: 10px;font-style: normal;font-size: 12px;float: left;line-height: 30px;}
        .company_r .ipt_long {width: 442px;height: 30px;line-height: 30px;border: 1px solid #EFEFEF;float:left;}
        .company_r .company_ins {width: 442px;height: 90px;border: 1px solid #EFEFEF;resize:none;float:left;}
        .tg_picbox {
            width:500px;

        }
        .tg_picbox .zheng,.tg_picbox .fan {
            width:200px;
            float: left;}
        .tg_picbox .fan {
            margin-left: 20px}
        .tg_picbox .tgpic_item {
            width: 200px;
            height:150px;
            border:1px solid #EFEFEF;
            overflow: hidden;
            position: relative;
        ;}
        .tgpic_item .file_upload {
            opacity:0;filter:alpha(opacity=0);
            width:200px;
            height:150px;
            position: absolute;
            top:0;
            left:0;
            z-index: 1;}
        .tgpic_item .tg_add {position: absolute;
            left: 38%;
            top: 35%;
            width: 50px;
            transform: (-50% -50%);
            z-index: 0;}
        .tgpic_item .close {
            display: none;
            position: absolute;
            top:10px;
            right:10px;
            z-index:3}
        .zigezheng {
            text-align: center;
        }
        .tgpic_item .pic_box {
            width:200px;
            height:150px;
            overflow: hidden;
            position: absolute;
            top:0;
            left:0;
        }
        .fieldbr{
            padding: 0 1em 1em 5em;
            width:50%;
        }
        .clearfix,.fieldbr{
            padding: 0 1em 1em 5em;
            width:50%;
        }
        ul li{
            list-style: none;
        }
    </style>
@stop
@section('content')
    {!! Form::open(array('url' => 'plupload/store','method' => 'post','files' => true)) !!}
    <div class="fieldbr">
        <span class="title_l fl">标题：</span>
       {!! Form::text('title') !!} 
    </div>

    <div class="fieldbr">
         <span class="title_l fl">内容：</span>
    {!! Form::textarea('content') !!}
    </div>
    <input type="text" id="domain"  value="{{$domain}}" >

    <p id="container">
       
        <div id="file-list"></div>

        <ul>
            <li class="clearfix">
                <span class="title_l fl">头像：</span>
                <div class="company_r fl">
                    <div class="tg_picbox">
                        <div class="tgpic_item" >
                            <img src="/images/add_pic.png" alt="" class="add1 tg_add">
                            <img src="" class="pic_box" id="browse" />
                            <input type="hidden" class="dyz file_upload1_hid" value="0" name="title_pic" id="title_pic">
                        </div>
                        <i></i>
                    </div>
                    <i></i>
                </div>
            </li>
        </ul>
<br>
<br>
</p>
<div class="fieldbr">
{!! Form::submit() !!}
</div>

{!! Form::close() !!}

    <script>

        var uploader = Qiniu.uploader({
            runtimes: 'html5,flash,html4',      // 上传模式,依次退化
            browse_button: 'browse',         // 上传选择的点选按钮，**必需**
//        filters: {
//            mime_types: [ //只允许上传图片文件和rar压缩文件
//                {title: "图片文件", extensions: "jpg,gif,png,bmp"},
//                {title: "RAR压缩文件", extensions: "zip"}
//            ],
////            max_file_size: '100kb', //最大只能上传100kb的文件
////            prevent_duplicates: true //不允许队列中存在重复文件
//        },

            // 在初始化时，uptoken, uptoken_url, uptoken_func 三个参数中必须有一个被设置
            // 切如果提供了多个，其优先级为 uptoken > uptoken_url > uptoken_func
            // 其中 uptoken 是直接提供上传凭证，uptoken_url 是提供了获取上传凭证的地址，如果需要定制获取 uptoken 的过程则可以设置 uptoken_func
            uptoken: "<?php echo $token;?>", // uptoken 是上传凭证，由其他程序生成
            // uptoken_url: '/uptoken',         // Ajax 请求 uptoken 的 Url，**强烈建议设置**（服务端提供）
            // uptoken_func: function(file){    // 在需要获取 uptoken 时，该方法会被调用
            //    // do something
            //    return uptoken;
            // },
            get_new_uptoken: false,             // 设置上传文件的时候是否每次都重新获取新的 uptoken
            // downtoken_url: '/downtoken',
            // Ajax请求downToken的Url，私有空间时使用,JS-SDK 将向该地址POST文件的key和domain,服务端返回的JSON必须包含`url`字段，`url`值为该文件的下载地址
//        unique_names: true,              // 默认 false，key 为文件名。若开启该选项，JS-SDK 会为每个文件自动生成key（文件名）
            // save_key: true,                  // 默认 false。若在服务端生成 uptoken 的上传策略中指定了 `sava_key`，则开启，SDK在前端将不对key进行任何处理
            domain: 'http://img.tgljweb.com/',     // bucket 域名，下载资源时用到，**必需**
            container: 'container',             // 上传区域 DOM ID，默认是 browser_button 的父元素，
            max_file_size: '200mb',             // 最大文件体积限制
            flash_swf_url: 'http://cdn.staticfile.org/Plupload/2.1.1/Moxie.swf',  //引入 flash,相对路径
            max_retries: 3,                     // 上传失败最大重试次数
            dragdrop: true,                     // 开启可拖曳上传
            drop_element: 'container',          // 拖曳上传区域元素的 ID，拖曳文件或文件夹后可触发上传
            chunk_size: '4mb',                  // 分块上传时，每块的体积
            auto_start: true,                   // 选择文件后自动上传，若关闭需要自己绑定事件触发上传,
            //x_vars : {
            //    自定义变量，参考http://developer.qiniu.com/docs/v6/api/overview/up/response/vars.html
            //    'time' : function(up,file) {
            //        var time = (new Date()).getTime();
            // do something with 'time'
            //        return time;
            //    },
            //    'size' : function(up,file) {
            //        var size = file.size;
            // do something with 'size'
            //        return size;
            //    }
            //},
            init: {
                'FilesAdded': function (up, files) {
//                plupload.each(files, function (file) {
//                    // 文件添加进队列后,处理相关的事情
//                });
                    for (var i = 0, len = files.length; i < len; i++) {
                        var file_name = files[i].name; //文件名
                        var html = '<li id="file-' + files[i].id + '"><p class="file-name">' + file_name + '</p><p class="progress"></p></li>';
//                        $(html).appendTo('#file-list');
                        !function (i) {
                            previewImage(files[i], function (imgsrc) {
//                                $('#file-' + files[i].id).append('<img src="' + imgsrc + '" />');
                                $('#browse').attr('src',imgsrc);
                            })
                        }(i);
                    }
                },
                'BeforeUpload': function (up, file) {
                    // 每个文件上传前,处理相关的事情
                },
                'UploadProgress': function (up, file) {
//                console.log(file);
//                    console.log(file.percent);

                    $('.progress').css('width', file.percent + '%');//控制进度条

                    // 每个文件上传时,处理相关的事情
                },
                'FileUploaded': function (up, file, info) {
                    // 每个文件上传成功后,处理相关的事情
                    // 其中 info 是文件上传成功后，服务端返回的json，形式如
                    // {
                    //    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
                    //    "key": "gogopher.jpg"
                    //  }
                    // 参考http://developer.qiniu.com/docs/v6/api/overview/up/response/simple-response.html
                     var domain = up.getOption('domain');
                     var res = $.parseJSON(info);
                     var sourceLink = domain + res.key;
//                    alert('success')
                    $('#title_pic').val(sourceLink);
                    console.log(sourceLink);

                },
                'Error': function (up, err, errTip) {
//                    console.log(errTip);
                    //上传出错时,处理相关的事情
                },
                'UploadComplete': function () {
                    //队列文件处理完毕后,处理相关的事情
                },
                'Key': function (up, file) {
                    // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                    // 该配置必须要在unique_names: false，save_key: false时才生效
                    var ext = Qiniu.getFileExtension(file.name);

                    var key = Date.parse(new Date()) + ext;
                    localStorage.key1 = '' + key;
                    // do something with key here
                    return key
                },

            }
        });


        function previewImage(file, callback) {//file为plupload事件监听函数参数中的file对象,callback为预览图片准备完成的回调函数
            if (!file || !/image\//.test(file.type)) return; //确保文件是图片
            if (file.type == 'image/gif') {//gif使用FileReader进行预览,因为mOxie.Image只支持jpg和png
                var fr = new mOxie.FileReader();
                fr.onload = function () {
                    callback(fr.result);
                    fr.destroy();
                    fr = null;
                }
                fr.readAsDataURL(file.getSource());
            } else {
                var preloader = new mOxie.Image();
                preloader.onload = function () {
                    preloader.downsize(300, 300);//先压缩一下要预览的图片,宽300，高300
                    var imgsrc = preloader.type == 'image/jpeg' ? preloader.getAsDataURL('image/jpeg', 80) : preloader.getAsDataURL(); //得到图片src,实质为一个base64编码的数据
                    callback && callback(imgsrc); //callback传入的参数为预览图片的url
                    preloader.destroy();
                    preloader = null;
                };
                preloader.load(file.getSource());
            }
        }

        // $('#start_upload').click(function () {
        //     uploader.start(); //开始上传
        // });

        // domain 为七牛空间（bucket)对应的域名，选择某个空间后，可通过"空间设置->基本设置->域名设置"查看获取
        // uploader 为一个 plupload 对象，继承了所有 plupload 的方法，参考http://plupload.com/docs
    </script>

@stop
