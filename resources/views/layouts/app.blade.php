<!DOCTYPE HTML>
<!--
    Forty by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html  lang="{{ config('app.locale') }}">
    <head>
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="/css/main.css" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>

        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

        @yield('header_script')
    </head>
    <body>

        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Header -->
                    <header id="header" class="alt">
                        <a href="/" class="logo"><strong>Snowno's</strong> <span>space</span></a>
                        <script charset="Shift_JIS" src="http://chabudai.sakura.ne.jp/blogparts/honehoneclock/honehone_clock_tr.js"></script>

                        <nav>
                            <a href="#menu">Menu</a>
                        </nav>

                    </header>

                <!-- Menu -->
                    <nav id="menu">
                        <ul class="links">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="landing.html">Landing</a></li>
                            <li><a href="{{url('/vueMood')}}">Generic</a></li>
                            <li><a href="elements.html">Elements</a></li>
                        </ul>
                        <ul class="actions vertical">
                            <li><a href="#" class="button special fit">Get Started</a></li>
                             @if (!Auth::check())
                                <li><a href="{{ url('/login') }}" class="button fit">Log In</a></li>
                                <li><a href="{{ url('/register') }}" class="button fit">Register</a></li>
                            @else   
                               <li><a href="{{ route('logout') }}"  class="button fit">Log Out</a></li> 
                            @endif
                        </ul>
                    </nav>
                        @yield('content')
                    <!-- Contact -->
                    <section id="contact">
                        <div class="inner">
                            <section>
                                {!! Form::open(array('url' => 'message/store','method' => 'post')) !!}
                                    <div class="field half first">
                                        <label for="name">Name</label>
                                        {!! Form::text('name') !!}
                                    </div>
                                    <div class="field half">
                                        <label for="email">Email</label>
                                         {!! Form::text('email') !!}
                                    </div>
                                    <div class="field">
                                        <label for="message">Message</label>
                                         {!! Form::textarea('message') !!}
                                    </div>
                                    <ul class="actions">
                                        <li><!-- <input type="submit" value="Send Message" class="special" /> -->{!! Form::submit() !!}</li>
                                        <li><input type="reset" value="Clear" /></li>
                                    </ul>

                                {!! Form::close() !!}
                            </section>
                            <section class="split">
                                <section>
                                    <div class="contact-method">
                                        <span class="icon alt fa-envelope"></span>
                                        <h3>Email</h3>
                                        <a href="#">snownoxxxx@163.com</a>
                                    </div>
                                </section>
                                <section>
                                    <div class="contact-method">
                                        <span class="icon alt fa-phone"></span>
                                        <h3>Phone</h3>
                                        <span>(000) 000-0000 x12387</span>
                                    </div>
                                </section>
                                <section>
                                    <div class="contact-method">
                                        <span class="icon alt fa-home"></span>
                                        <h3>Address</h3>
                                        <span>1234 Somewhere Road #5432<br />
                                        Nashville,ChaoYang BeiJing<br />
                                        China</span>
                                    </div>
                                </section>
                            </section>
                        </div>
                    </section>

                <!-- Footer -->
                    <footer id="footer">
                        <div class="inner">
                            <ul class="icons">
                                <li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
                                <li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
                                <li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
                                <li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
                                <li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
                            </ul>
                            <ul class="copyright">
                                <li>&copy; Untitled</li><li>from :<a href="javascript:;"> snowno</a></li>
                            </ul>
                        </div>
                    </footer>

            </div>

        <!-- Scripts -->
            <script src="/js/jquery.min.js"></script>
            <script src="/js/jquery.scrolly.min.js"></script>
            <script src="/js/jquery.scrollex.min.js"></script>
            <script src="/js/skel.min.js"></script>
            <script src="/js/util.js"></script>
            <!--[if lte IE 8]><script src="/js/ie/respond.min.js"></script><![endif]-->
            <script src="/js/main.js"></script>
            @yield('foot_script')
    </body>
</html>