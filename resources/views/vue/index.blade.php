@extends('layouts.app')
@section('header_script')
    <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
    <style>
        .dad-div{
            margin-left:400px;
        }
    </style>
@stop
@section('content')

    <div  >
        <div id="app" v-bind:class="dad-div">
           @{{ message }}
        </div>

        <?php
            $a = [1, [0,1], 1,[0, 1]];
            $mem = '';

            for($i=0;$i<count($a);$i++){
                if(is_array($a[$i])){
                    foreach($a[$i] as $k => $v){
                        $mem .= $v[$k];
                    }
                }else{
                    $mem .= ''
                }

            }

            ?>
    </div>
    @stop

@section('foot_script')
    <script>
        var app = new Vue({
            el:'#app',
            data:{
                message:'hhahahahah'
            }
        })
    </script>
    @stop
