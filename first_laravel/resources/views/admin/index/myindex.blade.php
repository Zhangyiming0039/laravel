<!-- error_reporting(0); -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>后台模板</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link href="/admin/mystyles/indexstyle.css" rel="stylesheet">
    <link href="/admin/mystyles/style.css" rel="stylesheet">
   
</head>

<body style="background-color: #f5f5f5;margin:0px">
    <div class="indexheader" ">
        <span style="margin-left:10px">Blog</span>
         <div class="user">
             <!-- <span style="color:black;font-size:15px; margin-right:5px;">超级管理员</span> -->
              <!-- <span>admin</span> -->
              <ul>
              <li role="presentation" class="dropdown" >
                        <a class="dropdown-toggle" style="font-size:15px;" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" id='name' >
                        {{ session('user')->username}}  
                         <span class="caret"></span>
                                </a>
                        <ul class="dropdown-menu">
                            <!-- <li><a href="javascript:;" onclick="add('新建文章','/admin/index/add')">个人信息</a></li> -->
                            <!-- <li><a href="javascript:;" onclick="out_success()",'/admin/index/add')">退出</a></li> -->
                            <li><a href="javascript:;" onclick="alter('修改密码','/admin/index/pass_alter')">修改密码</a></li>
                            <li><a href="{{url('/admin/public/logout')}}">退出</a></li>
                            
                        </ul>
                    </li>
              </ul>
             
              </div>
              
         </div>

    <div class="col-md-2" >
        <div class="aside-left" >
            <div class="header">
                导航检索
            </div>
            <div class="items">
                <ul class="nav nav-pills">

                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" style="font-size:15px;" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        文章管理    <span class="caret"></span>
                                </a>
                        <ul class="dropdown-menu">
                            <li><a onclick="add('新建文章','/admin/index/add')">新建文章</a></li>
                        </ul>
                    </li>
                    <li role="presentation" style="font-size:20px;" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        文章分类 <span class="caret"></span>
                          </a>
                        <ul class="dropdown-menu">
                            <li> <a id="all" onclick="all()">全部</a></li>
                        <li><a  id="before"onclick="before()">前端</a></li>
                        <li><a  id="after"onclick="after()">后端</a></li>
                        <li>新建</li>
                        </ul>

                    </li>
                    <li role="presentation" style="font-size:20px;" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        系统管理 <span class="caret"></span>
                            </a>
                        <ul class="dropdown-menu">
                        <li><a ></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        </ul>
                    </li>
                    <li role="presentation" style="font-size:20px;" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    近期发表<span class="caret"></span>
                                </a>
                        <ul class="dropdown-menu">
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                        </ul>
                    </li>

                </ul>
            </div>
            </div>
    </div>

            <div class="col-md-10">
                <!-- <a=  onclick="add()">新建文章</button> -->
                <div class="content" style="margin-top:20px;">
                <div id="content"></div>
                </div>
            </div>
            
     
    <!-- <button onclick="article()">
    打开弹窗
</button> -->

</div>
   
    <script src="/bootstrap/js/jquery.min.js "></script>
    <script src="/bootstrap/js/bootstrap.min.js "></script>
    <script src="/admin/lib/layer/2.4/layer.js"></script>
    <script src="/admin/mystyles/jQuery.Huifold.js"></script>
    <script>
     
        document.getElementById("content").innerHTML = '<object type="text/html" data="category" width="100%" height="700px"></object>';
        function add(title,url){
            layer.open({
                type:2,
                title:title,
               content:url,
                area:['800px', '700px']
            });
          
        };
        function article() {
            layer.open({
             type: 2,
            content: '/admin/index/add',
                area: ['800px', '700px'],
                maxmin: true
            });       
        }
        function alter(title,url){
            layer.open({
             type: 2,
             title:title,
            content: url,
                area: ['800px', '700px'],
                maxmin: true
            });       
        }
       
        function before(){
            
            document.getElementById("content").innerHTML = '<object type="text/html" data="article/before" width="100%" height="700px"></object>';
        }
        function after(){
            
            document.getElementById("content").innerHTML = '<object type="text/html" data="article/after" width="100%" height="700px"></object>';
        }
        function all(){
            document.getElementById("content").innerHTML = '<object type="text/html" data="category" width="100%" height="700px"></object>';
        }
  
        </script>
          
</body>

</html>