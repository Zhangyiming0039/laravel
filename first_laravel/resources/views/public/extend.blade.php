<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link href="/admin/mystyles/style.css" rel="stylesheet">
    <style>
    
    </style>
</head>

<body style="background-color:#f5f5f5;">
  
    <div class="hheader">
        
                <div class="col-md-2 bbb">
                    <!-- <div class="img"> -->
                        <!-- <img src="/img/allen.png" alt=""> -->
                        <a href="#" >oohsehun</a>
                    <!-- </div> -->

                </div>
                <div class="col-md-8 aaa">
                   
                        <ul>
                           <li><a href="{{url('/public/index')}}">首页</a></li> 
                            <li><a href="{{url('/public/summary')}}">归档</a></li>
                            <li><a href="#">关于我</a></li>
                            <!-- <li><a href="#">4</a></li> -->
                        </ul>
                    <!-- </div> -->
                </div>
                <div class="col-md-2">
                <div class="op">
                <span class="glyphicon glyphicon-user"></span>
                        <a>用户登录</a>
                      
                </div>
                        
                    
                </div>

            
     

    </div>
    <!-- <div style=";margin-left:auto;margin-right:auto"> -->
    <div class="col-md-2" style="width:300px;margin-left:15px;">
               <div class="aside-left">
                   <div class="left-content">
                       <div style="text-align:center">
                       <a  target="_Blank" href="{{url('admin/public/login')}}">
                       <img src="/img/qq.jpg" class="img-circle" style="width:100px;">
                    </a>
                           
                           <div class="oohsehun">oohsehun<p>Zuaer</p>
                           <p class="glyphicon glyphicon-map-marker">河南·商丘</p></div>
                           
                           <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="background-color:#38b7ea;border:none;">
                                               加个好友吧
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <!-- <div class="modal-content"> -->
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div> -->
      <div class="modal-body" style="display:flex;justify-content:space-around;">
          <div class="qq">
          <img src="/img/qqma.png" alt="" style="width:200px;margin-right:20px;">
          <p style="font-size:15px;margin-top:10px;">QQ</p>
          </div>
        <div class="weixin">
        <img src="/img/erweima.png" alt="" style="width:200px">
        <p style="font-size:15px;margin-top:10px;" >微信</p>
        </div>
        
      </div>
      <!-- <div class="modal-footer"> -->
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      <!-- </div> -->
    <!-- </div> -->
  </div>
</div>
                       </div>
                    
                        
                   
                   </div>
               </div>
            </div>
    @yield('content')
    <div class="col-md-2">
                <div class="aside-right">
                    <div class="search">
                     
                        <form>
                            <input type="text" class="form-control " placeholder="Search ">
                            <button type="submit " class="btn btn-default " style="float: right;background-color: #ff5f49; color:white ">搜索</button>
                        </form>
                    </div>
                    <div class="most">
                        <div class="right-header">
                            最近文章
                        </div>
                        @foreach($lastarticles as $data)
                        
                        <div class="right-items">
                                
                                <div class="right-title">
                                    <a href="{{url('public/index/'.$data->cate_id.'/article')}}"">{{$data->cate_title}}</a></div>
                                    <div class="right-time">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        {{$data->cate_time}}
                                    </div>
                              
                       
                </div>
                        
                       
                        @endforeach
                    </div>
                    <div class="card">
                        <div class="span">
                            分类标签
                        </div>
                        <div class="cclassify" >
                            @foreach($classify as $v)
                            
                            <a href="{{url('/public/tags/'.$v->cate_classify.'/')}}" class="randomcolor" style="margin-bottom:5px;">{{$v->cate_classify}}</a> 
                  
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        <!-- </div> -->
     
    </div>
    </div>
    <script src="/bootstrap/js/jquery.min.js "></script>
    <script src="/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript">  
                        var a=document.querySelectorAll('.randomcolor');
                        for(var i=0;i<{{$j}};i++)
                        {
                            a[i].style.backgroundColor=getRandomColor();
                        }
                       
                        function getRandomColor(){
                            var Arr = ["#007bff","#17c671","#38b7ea",'#ff5f49']; 
                                     var n = Math.floor(Math.random() * Arr.length + 1)-1; 
                                     return(Arr[n]); 
                                }
            var x='{{$data->cate_time}}';
           
            // create={{$v->cate_time}};
            // var s = new String();
            s=x.split(' ',1);
            //  $("#createtime").val('1111');
             document.getElementById('createtime').innerHTML=s[0];
          
                    </script>
</body>

</html>