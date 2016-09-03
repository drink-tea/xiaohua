<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link rel="stylesheet" href="index.css" type="text/css" />
    <link href="{{URL::asset('/')}}css/index.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
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

        <li>
            <a href="{{url('index/tech')}}">美食</a>
        </li>

        <li>
            <a href="{{url('index/girls')}}">妹子图</a>
        </li>
        <li>
            <a href="{{url('index/girls')}}">汉子图</a>
        </li>

        <li>
            <a href="{{url('index/girls')}}">名画</a>
        </li>

        <li>
            <a href="{{url('index/sport')}}">体育</a>
        </li>


        
    </ul>
</div>
<div id="left">
    @foreach($lists as $k=>$v)
    <div @if($k==0) class="image-box" @else class="image-box top15" @endif>
        <div class="image-title">
            <a href="{{url('index/detail?id=1')}}">{{$v->title}}</a>
        </div>
        <img src="{{getImage($v->path,'activity','',0)}}" width="400px" />
        <hr class="hr" />
        <div>

        </div>

    </div>
    @endforeach
    <div id="paginate">
        <?php echo $lists->render();?>

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