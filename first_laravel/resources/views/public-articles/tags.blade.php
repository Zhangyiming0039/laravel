
    @extends('public/extend')
    @section('content')
    <!-- <div class="ccontainer" >
        <div class="row"> -->
           
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
                                <!-- <div class="author"><span class="glyphicon glyphicon-user"></span>{{$v->cate_author}}</div> -->
                            </div>
                            <div class="item-content">
                                <p>{!!$v->cate_description!!}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div style="width:100%;height:100px;display:flex;justify-content:center;align-items:center;">
                    {{$data->links()}}
                    </div>
                   
                </div>
            </div>
            @endsection
            