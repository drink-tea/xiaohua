<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>详情页</title>
    <link rel="stylesheet" href="index.css" type="text/css" />
    <link href="{{URL::asset('/')}}css/index.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="nav">
    <ul>
        <li>
            <a href="{{url('index/index')}}">首页</a>
        </li>
        <li>
            <a href="{{url('index/scenery')}}">风景</a>

        </li>
        <li>
            <a href="{{url('index/fun')}}">搞笑</a>
        </li>
        <li>
            <a href="{{url('index/puppy')}}">小动物</a>
        </li>
        <li>
            <a href="{{url('index/strange')}}">猎奇</a>
        </li>
        <li>
            <a href="{{url('index/biaoqing')}}">表情</a>
        </li>
        <li>
            <a href="{{url('index/tech')}}">科技</a>
        </li>
    </ul>
</div>
<div id="left">
    <div class="image-box">
        <div class="image-title">
            这是一个测试的图片
        </div>
        <img src="{{URL::asset('/')}}image/1.jpg" width="400px" />
    </div>
    <div class="image-box">
        <div class="image-title">
            这是一个测试的图片
        </div>
        <img src="{{URL::asset('/')}}image/1.jpg" width="400px" />
    </div>

    <div id="recommend">
        <div class="recommend-con">
            recommend
        </div>
        <div class="recommend-con">
            recommend
        </div>
        <div class="recommend-con">
            recommend
        </div>
        <div class="recommend-con">
            recommend
        </div>
        <div class="recommend-con">
            recommend
        </div>
        <div class="recommend-con">
            recommend
        </div>
        <div class="recommend-con">
            recommend
        </div>
        <div class="recommend-con">
            recommend
        </div>
        <div class="recommend-con">
            recommend
        </div>
    </div>
    <div id="paginate">
    </div>
</div>
<div id="right">
    <div id="post">
        本站长期承接PHP程序开发，以及WordPress二次开发等付费服务
        本站长期承接PHP程序开发，以及WordPress二次开发等付费服务
        本站长期承接PHP程序开发，以及WordPress二次开发等付费服务
        本站长期承接PHP程序开发，以及WordPress二次开发等付费服务
    </div>

    <div id="hot-tag">
        hot-taghot-taghot-tag
        hot-taghot-taghot-tag
        hot-taghot-taghot-tag
        hot-taghot-taghot-tag
        hot-taghot-taghot-tag
        hot-taghot-taghot-tag
    </div>

    <div id="subscribe">
        subscribsubscribesubscribesubscribesub
        subscribesubscribesubscribesubscribe
        subscribesubscribesubscribesubscribe
        subscribesubscribesubscribesubscribe
    </div>

</div>
<div id="clear">
</div>
<div id="footer">
    footer
</div>
</body>
</html>