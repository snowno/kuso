@extends('layouts.app')
@section('header_script')
<style type="text/css">

</style>
@stop
@section('content')
    <!-- Banner -->
                <!-- Note: The "styleN" class below should match that of the header element. -->
                    <section id="banner" class="style2">
                        <div class="inner">
                            <span class="image">
                                <img src="images/pic07.jpg" alt="" />
                            </span>
                            <header class="major">
                                <h1>Landing</h1>
                            </header>
                            <div class="content">
                                <p>Lorem ipsum dolor sit amet nullam consequat<br />
                                sed veroeros. tempus adipiscing nulla.</p>
                            </div>
                        </div>
                    </section>

                <!-- Main -->
                    <div id="main">

                        <!-- One -->
                            <section id="one">
                                <div class="inner">
                                    <header class="major">
                                        <h2>Sed amet aliquam</h2>
                                    </header>
                                    <p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis magna sed nunc rhoncus condimentum sem. In efficitur ligula tate urna. Maecenas massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis libero. Nullam et orci eu lorem consequat tincidunt vivamus et sagittis magna sed nunc rhoncus condimentum sem. In efficitur ligula tate urna.</p>
                                </div>
                            </section>

                            @if($news)
                                @foreach($news as $k=>$v)
                                <!-- Two -->
                                    <section id="two{{$k}}" class="spotlights">
                                        @if($k%3 == 0)
                                        <section>
                                            <a href="/news/show?id={{$v->id}}" class="image">
                                                <img src="<?=(substr($v->title_pic,0,4) == 'http')?'':'/uploads\\'?>{{$v->title_pic}}" alt="" data-position="center center" />
                                            </a>
                                            <div class="content">
                                                <div class="inner">
                                                    <header class="major">
                                                        <h3>{{$v->title}}</h3>
                                                    </header>
                                                    <p>{{$v->content}}.</p>
                                                    <ul class="actions">
                                                        <li><a href="/news/show?id={{$v->id}}" class="button">Learn more</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </section>
                                        @endif
                                        @if($k%3 == 1)
                                        <section>
                                            <a href="/news/show?id={{$v->id}}" class="image">
                                                <img src="<?=(substr($v->title_pic,0,4) == 'http')?'':'/uploads\\'?>{{$v->title_pic}}" alt="" data-position="top center" />
                                            </a>
                                            <div class="content">
                                                <div class="inner">
                                                    <header class="major">
                                                        <h3>{{$v->title}}</h3>
                                                    </header>
                                                    <p>{{$v->content}}.</p>
                                                    <ul class="actions">
                                                        <li><a href="/news/show?id={{$v->id}}" class="button">Learn more</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </section>
                                        @endif
                                        @if($k%3 ==2)
                                            <section>
                                                <a href="/news/show?id={{$v->id}}" class="image">
                                                    <img src="<?=(substr($v->title_pic,0,4) == 'http')?'':'/uploads\\'?>{{$v->title_pic}}" alt="" data-position="25% 25%" />
                                                </a>
                                                <div class="content">
                                                    <div class="inner">
                                                        <header class="major">
                                                            <h3>{{$v->title}}</h3>
                                                        </header>
                                                        <p>{{$v->content}}.</p>
                                                        <ul class="actions">
                                                            <li><a href="/news/show?id={{$v->id}}" class="button">Learn more</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </section>
                                        @endif
                                        <section>
                                            <a href="/news/show?id={{$v->id}}" class="image">
                                                <img src="<?=(substr($v->title_pic,0,4) == 'http')?'':'/uploads\\'?>{{$v->title_pic}}" alt="" data-position="center center" />
                                            </a>
                                            <div class="content">
                                                <div class="inner">
                                                    <header class="major">
                                                        <h3>{{$v->title}}</h3>
                                                    </header>
                                                    <p>{{$v->content}}.</p>
                                                    <ul class="actions">
                                                        <li><a href="/news/show?id={{$v->id}}" class="button">Learn more</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </section>
                                    </section>
                                @endforeach
                            @endif

                        <!-- Three -->
                            <section id="three">
                                <div class="inner">
                                    <header class="major">
                                        <h2>创建区</h2>
                                    </header>
                                    <p>新建新闻事件.</p>
                                    <ul class="actions">
                                        <li><a href="/news/create" class="button next">Go create</a></li>
                                    </ul>
                                </div>
                            </section>

                    </div>
@stop