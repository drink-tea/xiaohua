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
@yield('left')
<div id="right">




    <div id="post">
        <div class="post_title">公告</div>
        <div class="clear"></div>
        本站专注于图片制作及分享，部分资料来源于互联网，
        凡本网站转载的所有的文章、图片、音频视频文件等资料的版权归版权所有人所有，
        本站采用的非本站原创作品等内容无法一一和版权者联系，如果本网所选内容的作
        者认为其作品不宜上网供大家浏览，或不应无偿使用，请根据《版权保护投诉指引
        》及时与我们联系，以便我们迅速采取删除等措施。
    </div>


    <div id="search">
        <form action="{{url('index/search')}}" method="post" class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" name="keyword" class="form-control" placeholder="输入关键字搜索">
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-default green">搜索</button>
        </form>
        <div class="clear" ></div>
    </div>

    <div id="hot-tag">
        <div><span class="glyphicon glyphicon-tags left10 float-left"></span></div>
        <div class="left10 float-left">热门标签</div>
        <div class="clear" ></div>
        <div class="tags ">
            @foreach($tags as $k=>$v)
                <div class="tag float-left left10 top4">
                    <?php $key = rand(0,4)?>
                    <a href="{{url('index/bytag?tag_id='.$k)}}"><button type="button"
                                                                        @if($key==0)
                                                                        class="btn btn-info"
                                                                        @elseif($key==1)
                                                                        class="btn btn-primary"
                                                                        @elseif($key==2)
                                                                        class="btn btn-success"
                                                                        @elseif($key==3)
                                                                        class="btn btn-warning"
                                                                        @else
                                                                        class="btn btn-danger"
                                @endif
                        >{{$v}}</button></a>
                </div>
            @endforeach
        </div>
        <div class="clear" ></div>
    </div>


    <div id="right-recommend">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner" role="listbox">
                @foreach($sides as $k=>$v)
                    <div @if($k==0) class="item active"@else class="item "@endif>
                        <a href="{{url('index/detail?id='.$v->id)}}">
                            <img class="item-image" src="{{getImage($v->path,'activity','',0)}}"  alt="...">
                        </a>
                    </div>
                @endforeach
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
    <div class="about">
        <span class="about-item">
            <a href="{{url('about/feed')}}">意见反馈</a>
        </span>
        <span class="about-vertical">
            |
        </span>
        <span class="about-item">
            <a href="{{url('about/about')}}">关于我们</a>
        </span>
        <span class="about-vertical">
            |
        </span>
        <span class="about-item">
            <a href="{{url('about/contact')}}">联系我们</a>
        </span>
        <span class="about-vertical">
            |
        </span>
        <span class="about-item">
            <a href="{{url('about/state')}}">免责声明</a>
        </span>
    </div>
</div>


<script src="{{URL::asset('/')}}js/jquery.min.js"></script>
<script src="{{URL::asset('/')}}js/bootstrap.min.js"></script>
</body>
</html>