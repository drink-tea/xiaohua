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
        <div class="post_title">公告</div>
        <div class="clear"></div>
        本站长期承接PHP程序开发，以及WordPress二次开发等付费服务
        本站长期承接PHP程序开发，以及WordPress二次开发等付费服务
        本站长期承接PHP程序开发，以及WordPress二次开发等付费服务
        本站长期承接PHP程序开发，以及WordPress二次开发等付费服务
    </div>

    <div id="hot-tag">
        <div><span class="glyphicon glyphicon-tags left10 float-left"></span></div>
        <div class="left10 float-left">热门标签</div>
        <div class="clear" ></div>
        <div class="tags ">
            @foreach($tags as $k=>$v)
                <div class="tag float-left left10">
                    {{$v->name}}
                </div>
            @endforeach
        </div>
        <div class="clear" ></div>
    </div>

    <div id="search">
        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="输入关键字搜索">
            </div>
            <button type="submit" class="btn btn-default green">搜索</button>
        </form>
        <div class="clear" ></div>
    </div>



    <div id="right-recommend">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            {{--<ol class="carousel-indicators">--}}
                {{--<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>--}}
                {{--<li data-target="#carousel-example-generic" data-slide-to="1"></li>--}}
                {{--<li data-target="#carousel-example-generic" data-slide-to="2"></li>--}}
            {{--</ol>--}}

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active ">
                    <a href="http://www.baidu.com">
                        <img class="item-image" src="{{URL::asset('/')}}image/2.gif"  alt="...">
                    </a>
                    {{--<div class="carousel-caption">--}}
                        {{--...--}}
                    {{--</div>--}}
                </div>
                <div class="item ">
                    <a href="http://www.baidu.com">
                        <img class="item-image" src="{{URL::asset('/')}}image/1.jpg" alt="...">
                    </a>

                    {{--<div class="carousel-caption">--}}
                        {{--...--}}
                    {{--</div>--}}
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>


</div>
<div id="clear">
</div>
<div id="footer">
    footer
</div>


<script src="{{URL::asset('/')}}js/jquery.min.js"></script>
<script src="{{URL::asset('/')}}js/bootstrap.min.js"></script>
</body>
</html>