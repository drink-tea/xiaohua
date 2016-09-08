@extends('layouts.default')
@section('left')
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
@stop
