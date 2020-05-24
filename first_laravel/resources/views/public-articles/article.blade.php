@extends('public/extend')
    @section('content')
            <div class="col-md-7">
                <div class="blogs">

                <div class="content">
                        @foreach($data as $v)
                        <div class="item">
                            <div class="title"><a href="{{url('public/index/'.$v->cate_id.'/article')}}">{{$v->cate_title}}</a></div>
                            <div class="details">
                                <div class="create-time"><span class="glyphicon glyphicon-calendar
"></span>{{$v->cate_time}}</div>
                                <div class="classify"><span class="glyphicon glyphicon-tag"></span>{{$v->cate_classify}}</div>
                                <div class="author"><span class="glyphicon glyphicon-user"></span>{{$v->cate_author}}</div>
                            </div>
                            <div class="item-decription">
                                <p>{!!$v->cate_description!!}</p>
                            </div>
                            
                        </div>
                       <div class="item-content">
                                <p>{!!$value->article_content->art_content!!}</p>
                            </div>
                            @endforeach
                    </div>
                </div>
                
            </div>
              
            @endsection