<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link rel="stylesheet" href="index.css" type="text/css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{URL::asset('/')}}css/index.css" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('/')}}css/bootstrap.min.css" rel="stylesheet">

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
        <div class="image-author">
            <img class="image" src="{{getImage($v->p_path,'activity','',0)}}" />
            <span>{{$v->name}}</span>
        </div>
        <div class="image-title">
            <a href="{{url('index/detail?id=1')}}"><h3>{{$v->title}}</h3></a>
        </div>
        <div class="image-div">
            <img src="{{getImage($v->path,'activity','',0)}}" width="500px" />
        </div>
        <hr class="hr" />
        <div class="thumb">
            <span class="glyphicon glyphicon-thumbs-up blue ">10</span>
            <span class="glyphicon glyphicon-thumbs-down blue left10">1</span>
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
        <span class="glyphicon glyphicon-tags left10 float-left"></span><div class="left10 float-left">热门标签</div>
        <div class="tags clear">
            @foreach($tags as $k=>$v)
                <div class="tag float-left left10">
                    {{$v->name}}
                </div>
            @endforeach
        </div>
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


<script src="{{URL::asset('/')}}js/jquery.min.css"></script>
<script src="{{URL::asset('/')}}js/bootstrap.min.css"></script>
</body>
</html>