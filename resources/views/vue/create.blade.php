@extends('layouts.app')
@section('header_script')
    <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
    <style>

        input{
            color:black;
        }
        .main{
            margin:2em 0 0 10em;
        }

    </style>
    <script>

    </script>
@stop

@section('content')
    {{--{{var_dump(phpinfo())}}--}}
    <div class="main">
    <div class="te">
        <h3>@{{mes}}</h3>
        <input v-model="mes">
    </div>

    <div class="ti">
        <ul>
            <li v-for="todo in todos">@{{ todo.text }}</li>
        </ul>
    </div>

    <div class="title" >
        @{{ message }}
        <button v-on:click="reverseMessage">reverse</button>
    </div>

    <div class="enup">
        <input v-model="newTodo" v-on:keyup.enter="addTodo">
        <ul>
            <li v-for="doe in does"><span>@{{ doe.text }}</span>
                <button v-on:click="removeTodo($index)">x</button>
            </li>
        </ul>

    </div>

    <div id="example">
        @{{ name }}
    </div>

    </div>
@stop

@section('foot_script')
    <script type="text/javascript" >
        new Vue({
            el:'.te',
            data:{
                mes:'',
            }
        });

        new Vue({
            el:'.ti',
            data:{
                todos:[
                    {text:'one'},
                    {text:'two'}
                ]
            }
        });

        new Vue({
            el:'.title',
            data:{
                message:'hello world!'
            },
            methods:{
                reverseMessage:function(){
                    this.message = this.message.split('').reverse().join('')
                }
            }
        });

        new Vue({
            el:'.enup',
            data:{
                newTodo:'',
                does:[
                    {text:'新建数据'}
                ]
            },
            methods:{
                addTodo:function(){
                    var text = this.newTodo.trim()
                    if(text){
                        this.does.push({ text:text })
                        this.newTodo = ''
                    }
                },
                removeTodo:function(index){
                    this.does.splice(index,1)
                }
            }

        });

        var bindData = {
            name:'snowno.com'
        };

        var exampleTest = new Vue({
            el:'#example',
            data: bindData

        })

    </script>
@stop