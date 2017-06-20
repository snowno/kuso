@extends('layouts.app')
@section('header_script')
    <!-- styles -->
    <link href="/css/jquery.fileuploader.css" media="all" rel="stylesheet">
    <link href="/css/jquery.fileuploader-theme-thumbnails.css" media="all" rel="stylesheet">
@stop
@section('content')

    {!! Form::open(array('url' => 'news/store','method' => 'post','files' => true)) !!}
    {!! Form::text('title') !!}
    {{--{!! Form::model($news, array('route' => array('news.create', $news->id))) !!}--}}
    {!! Form::file('files') !!}
    {!! Form::text('content') !!}
    {!! Form::submit('保存') !!}
    {!! Form::close() !!}
    <script src="/js/custom.js" type="text/javascript"></script>

@stop
@section('foot_script')
    <script src="/js/jquery.fileuploader.js" type="text/javascript"></script>

@stop