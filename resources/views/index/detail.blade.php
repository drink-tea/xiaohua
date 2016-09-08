@extends('layouts.default')
@section('left')
<div id="left">
    <div class="image-box" >
        <div class="image-author">
            <img class="image" src="{{getImage($list->p_path,'activity','',0)}}" />
            <span>{{$list->name}}</span>
        </div>
        <div class="image-title">
            <a href="{{url('index/detail?id=1')}}"><h3>{{$list->title}}</h3></a>
        </div>
        <div class="image-div">
            <img src="{{getImage($list->path,'activity','',0)}}" width="500px" />
        </div>
        <hr class="hr" />
        <div class="thumb">
            <span class="glyphicon glyphicon-thumbs-up blue ">10</span>
            <span class="glyphicon glyphicon-thumbs-down blue left10">1</span>
        </div>
    </div>

    <div id="recommend">

        @foreach($recs as $k=>$v)
            <div class="recommend-con">
                <div class="image-rec-div">
                    <img src="{{getImage($v->path, 'activity', '', 0)}}" width="210px" height="200px"/>
                </div>
            </div>
        @endforeach
            <div class="clear" ></div>

    </div>


    <div id="paginate">
    </div>
</div>
@stop
