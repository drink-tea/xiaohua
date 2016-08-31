<?php
if(Auth::check()){
    $login_user = Auth::user();
}
?>
        <!DOCTYPE html>
<!--[if lte IE 8]>
<html class="ie8 no-js" lang="en">
<![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="not-ie no-js" lang="en">
<!--<![endif]-->
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <meta property="qc:admins" content="25024577326724263757" />
    <meta property="wb:webmaster" content="da3ee99ac37a8ba9" />
    <link href="{{URL::asset('/')}}js/plugins/labcore/dist/css/labcore.css" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('/')}}js/plugins/labcore/dist/css/labui.css" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('/')}}css/styles.css" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('/')}}css/login.css" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('/')}}css/popup.css" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('/')}}css/ie.css" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('/')}}images/favicon.ico" rel="icon" type="image/png" />
    @yield('css')
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>
        @section('title')无界投融-中国首家OVO投融资综合服务平台@show
    </title>
    <meta name="keywords" content="@section('keywords')无界投融,OVO,投融资平台,路演,项目路演,项目融资,融资网,风险投资,融资@show">
    <meta name="description" content="@section('description')无界投融(www.wjtr.com)是中国首家OVO跨域投融资路演服务平台。OVO(Online-Video-Offline),在线上(online)实现投融资相关的项目方、投资方、服务方的信息聚合和需求交互，在线下(offline)运用跨域路演中心的高清视频(video)进行高效对接，解决了传统投融资行业存在的地域限制、信息不对称、效率低下等问题，实现行业信息流、资金流更高效、更直观、更精准的匹配。@show">
    <meta name="author" content="天涯若比邻">
    <link rel="icon" type="image/png" href="/images/favicon.ico">
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="{{URL::asset('/')}}css/ie.css" media="screen" />
    <script src="{{URL::asset('/')}}js/plugins/html5shiv/dist/html5shiv.js"></script>
    <![endif]-->

    <!-- modernizr.js -->
    <script src="{{URL::asset('/')}}js/plugins/vendor/modernizr.js"></script>
    <script>
                <?php if(isset($login_user)){
                        $realname=$login_user->realname?$login_user->realname:$login_user->nickname;
                        $login_username = $login_user->username;
                        $role=$login_user->roles->toArray();
                        $role_id=isset($role[0])?$role[0]['id']:1;
                }else{
                        $realname='';
                        $login_username='';
                        $role_id=1;
                    }?>

                    var labUser = {
                    'path':'{{URL::asset("/")}}',
                    'token':'{{ csrf_token() }}',
                    'uid':'<?php echo isset($login_user->uid)?$login_user->uid:0?>',
                    'realname':'<?php echo $realname?>',
                    'username':'<?php echo $login_username?>',
                    'institution_name':'<?php echo isset($login_user->userinfo->institution_name)?$login_user->userinfo->institution_name:''?>',
                    'avatar': '<?php echo isset($login_user->avatar)?getImage($login_user->avatar):''?>',
                    'role_id':'<?php echo $role_id; ?>',
                    'is_ztc':'<?php echo isset($login_user->is_ztc)?$login_user->is_ztc:''?>',
                    'business_card':'<?php echo isset($login_user->userinfo->business_card)?$login_user->userinfo->business_card:''?>',

                };
    </script>
</head>
<body @section('body')@show>

<div class="topBlock">
    <div class="welcome yh">
        <div class="container">
            <div class="l ml5">欢迎致电 400-033-0176</div>
            <div class="r mr15">
                <?php if(!isset($login_user)):?>
                <div><a href="javascript:void(0);" class="l clickLogin">登录</a>  丨 <a href="javascript:void(0);" class="clickReg">注册</a></div>
                <?php else:?>
                <div class="ml5 mr5 relative l custor user">Hi~<em class="orange ml5">@<?php echo !empty($login_user->realname) ? cut_str($login_user->realname, 6) : (!empty($login_user->nickname) ? cut_str($login_user->nickname,6) : $login_user->username);?></em>
                    <div class="absolute sub_nav">
                        <p class="bg"></p>
                        <ul>
                            <li><a href="{{URL::asset("/")}}user/index">用户大厅</a></li>
                            <li><a href="{{URL::asset("/")}}public/loginout">退出登录</a></li>
                            <li><a href="javascript:void(0)" class='clickLogin'>切换账号</a></li>
                        </ul>
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <div class="navs">
        <div class="container">
            <div class="l mt25 mb10"><a href="{{URL::asset('/')}}"><img src="{{URL::asset('/')}}images/logo.png"></a></div>
            <ul class="nav l">
                <li @if($controller == 'DefaultController') class="active" @endif><a href="{{URL::asset('/')}}" >首页</a></li>
                <li class="sanjiao relative @if($controller == 'ActivityController') active @endif">
                    <a href="{{URL::asset('/')}}activity">ovo路演/活动</a>
                    <div class="absolute sub_nav l2">
                        <p class="bg"></p>
                        <ul>
                            <li class="@if(isset($action) && $action == 'videolists') active @endif"><a href="{{url::asset('/')}}activity/videolists">活动视频</a></li>
                            <li class="@if(isset($action) && $action == 'trailerlists') active @endif"><a href="{{url::asset('/')}}activity/trailerlists">活动预告</a></li>
                            <?php if($role_id == config('system.maker')){ ?>
                            <li class="@if(isset($action) && $action == 'convenelists') active @endif"><a href="{{url::asset('/')}}activity/convenelists">跨域召集</a></li>
                            <?php }?>
                            <li class="@if(isset($action) && $action == 'live') active @endif"><a href="{{url::asset('/')}}live">活动直播</a></li>
                        </ul>
                    </div>
                </li>
                <li @if($controller == 'ProjectController') class="active"; @endif><a href="{{URL::asset('/')}}project">项目</a></li>
                <li @if($controller == 'InvestorController') class="active"; @endif><a href="{{URL::asset('/')}}investor">投资人</a></li>
                <li class="sanjiao2 sanjiao relative @if($controller == 'InstitutionController') active @endif" id="institution">
                    <a href="{{URL::asset('/')}}institution">创服机构</a>
                    <div class="absolute sub_nav l20">
                        <p class="bg"></p>
                        <ul>
                            <li class="maker @if(isset($action) && $action == 'maker') active @endif"><a href="{{URL::asset('/')}}institution">创客空间</a></li>
                            <li class="invest @if(isset($action) && $action == 'invest') active @endif"><a href="{{createUrl('institution/index',array('type'=>'invest'))}}">投资机构</a></li>
                            <li class="law @if(isset($action) && $action == 'law') active @endif"><a href="{{createUrl('institution/index',array('type'=>'law'))}}">法律机构</a></li>
                            <li class="finance @if(isset($action) && $action == 'finance') active @endif"><a href="{{createUrl('institution/index',array('type'=>'finance'))}}">财务机构</a></li>
                        </ul>
                    </div>
                </li>
                <li @if($controller == 'ArticleController') class="active"; @endif><a href="{{URL::asset('/')}}article">资讯</a></li>
            </ul>
            <div class="search l" >
                <button id="nav_search"></button>
                <div class="search_input tr" id="nav_search_input">
                    <form action="/search/index" method="get">
                        <div class="input_box">
                            <input placeholder="搜索" name="search_keyword">
                            <button class="search_btn2 l"></button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="screen">
                <a href="{{URL::route('app_download')}}"><img src="{{URL::asset('/')}}images/mobile.png">


                </a> <span class="f16" ><a href="{{URL::route('app_download')}}">APP下载</a></span>
                <div class="ewm f14">
                    <img src="{{URL::asset('/')}}images/erweima.png">
                    <p class="ios">Ios客户端</p>
                    <p class="android">Android客户端</p>
                </div>
            </div>
        </div>


    </div>
</div>
@yield('main')
@include('public.footer')
<div id="showLogin">

</div>
<div id="showReg">

</div>
<div id="showForgot">
    <?php $oauth_bind_login=session('oauth_bind_login');if($oauth_bind_login['time'] < time() - 600){Session::remove('oauth_bind_login');}if($oauth_bind_login){ //三方登录处理?>
    <div class="showLogin">
        <div class="login_mceng"></div>
        <div class="login_forgetBlock">
            <div class="login_bg"></div>
            <div class="login_reg">
                <div class="close"></div>
                <div class="logo"><img src="../../../images/logo.png"></div>
                <!-- 登录 -->
                <div id="login">
                    <p align="center">您当前是<b style="color: blue;">{{$oauth_bind_login['style_name']}}</b>登录，请选择绑定投融帐号方法，10分钟内有效！</p>
                    <div class="choose">
                        @if($oauth_bind_login['nickname'])
                            <div class="textcenter" style="color: blue;">
                                @if($oauth_bind_login['imgSrc'])
                                    <img src="{{$oauth_bind_login['imgSrc']}}" style="margin-right:20px;">
                                @endif
                                {{$oauth_bind_login['nickname']}}
                            </div>
                        @endif
                        <div class="textcenter">
                            <button ref="0" name="order" class="pc-btn r3 tf-btn active clickLogin" style="margin-top:0px;" onclick="showLogin();">已有投融账号</button>
                        </div>
                        <div class="textcenter">
                            <button ref="0" name="order" class="tf-btn  bg-f63 clickReg" style="margin-top:0px;">未注册投融账号</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</div>
<div id="showCity">

</div>
<div class="block labWindow" data-options="open:false" style="display: none;" id="ajax-window">
    <span class="close icon-all icon-close"></span>
    <div class="box relative tc delete_cy release-pro"></div>
</div>
<!-- jquery -->

<script type="text/javascript" src="{{URL::asset('/')}}js/jquery-1.11.0.min.js"></script>
<!-- bootstrap -->

<script type="text/javascript" src="{{URL::asset('/')}}js/plugins/labcore/dist/js/labcore.js"></script>
<script type="text/javascript" src="{{URL::asset('/')}}js/plugins/labcore/dist/js/labui.js"></script>

<script type="text/javascript" src="{{URL::asset('/')}}js/common.js"></script>
<script type="text/javascript" src="{{URL::asset('/')}}js/box.js"></script>


<!-- 网站JS脚本 -->
<!-- 放统计脚本 -->
<div class="hide"></div>
@yield('endjs')
</body>
</html>
