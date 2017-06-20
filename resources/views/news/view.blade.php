@extends('layouts.app')
@section('header_script')
	<style type="text/css">
		.span{
			margin-left:10em;
		}

	</style>
@stop
@section('content')
	
	<span class="span"><a href="/news/index">return</a></span>
	<!-- Main -->
	<div id="main" class="alt">
		<section id="one">
			<div class="inner">
				<header class="major">
					<h1>{{$news->title}}</h1>
				</header>
				<span class="image main"><img src="<?=(substr($news->title_pic,0,4) == 'http')?'':'/uploads\\'?>{{$news->title_pic}}" alt="" /></span>
				<p>{{$news->content}}.</p>
			</div>
		</section>
	</div>
@stop