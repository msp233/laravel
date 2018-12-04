<html>
<head>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-title" content="微店">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no, address=no">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="pragram" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache,must-revalidate">
    <title>六星微店</title>
    <link rel="stylesheet" href="{{URL::asset('weidian/css/normalize.css')}}">
    <link rel="stylesheet" href="{{URL::asset('weidian/css/common.css')}}">
    <link rel="stylesheet" href="{{URL::asset('weidian/css/swiper.css')}}">
    <link rel="stylesheet" href="{{URL::asset('weidian/css/gotop.css')}}">
    <link rel="stylesheet" href="{{URL::asset('weidian/css/chuangke.css')}}">
    <script src="{{URL::asset('weidian/js/flexible.js')}}"></script>
    <script src="{{URL::asset('weidian/js/zepto.js')}}"></script>
    <script src="{{URL::asset('weidian/js/swiper.js')}}"></script>
    <script src="{{URL::asset('weidian/js/scroll.js')}}"></script>
    <script src="{{URL::asset('weidian/js/sortplan.js')}}"></script>
    <script src="{{URL::asset('weidian/js/spinner.js')}}"></script>
    <script src="{{URL::asset('weidian/js/chuangke.js')}}"></script>
    <script src="{{URL::asset('weidian/js/wxsdk.js')}}"></script>
</head>
<body>
<div class="container" id="app">
    <header>
        <div id="banner" class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="http://youam.yunyiwd.com/upload/image/gh_8ac59f118265/20160810/20160810154422_50.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="search-box">
            <a href="search.html">
                <button type="button"></button>
                <input type="text" value=""  placeholder="请输入搜索商品">
            </a>
        </div>
    </header>
    <ul id="sort-nav" class="sort-nav">
        <li>
            <a href="javascript:;">奖金排序<i data-id="1" class="icon-arrow"></i></a>
        </li>
        <li>
            <a href="javascript:;">最新上架<i data-id="2" class="icon-arrow"></i></a>
        </li>
        <li>
            <a href="javascript:;">价格排序<i data-id="3" class="icon-arrow"></i></a>
        </li>
    </ul>
@yield('content')