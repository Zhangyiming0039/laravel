@extends('public/extend')
    @section('content')
    <div class="col-md-7">
        <div class="s-content">
           <div class="category">
           <span class="roll"><span class="glyphicon glyphicon-calendar cate"></span></span> </div> 
           @foreach($data as $v)
            <div class="timeline">
             <span class="roll1"></span>
                   <div class="line-content">
                       <div class="line-title"><a href="{{url('public/index/'.$v->cate_id.'/article')}}">{{$v->cate_title}}</a></div>
                       <hr style="margin:0px">
                       <div class="details line-classify"style="margin-top:5px;margin-left:10px">
                                <div class="create-time"><span class="glyphicon glyphicon-calendar
"></span>{{$v->cate_time}}</div>
                                <div class="classify"><span class="glyphicon glyphicon-tag"></span>{{$v->cate_classify}}</div>
                                
                            </div>
                   </div>
            </div>
            @endforeach
        </div>
        <div style="width:100%;height:100px;display:flex;justify-content:center;align-items:center;">
                    {{$data->links()}}
                    </div>
    </div>
    @endsection