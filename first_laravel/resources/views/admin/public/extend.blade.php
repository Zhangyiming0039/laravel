
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<!--[if IE 6]>
<script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>我的桌面</title>
<style>
	table a{
		color:coral;
		text-decoration: none;
		
	}
	.page-container{
		
		border-radius: 15px;
		background-color: white;
	}
	body{
		background-color: #f5f5f5;
	}
</style>
</head>
<body >
	
<div style="float:right;display:flex;flex-direction:row; margin:10px">
	<form class="form-inline">
  <div class="form-group">
    <!-- <label for="exampleInputName2">Name</label> -->
	<input type="text" class="form-control" id="exampleInputName2" placeholder="搜索框">
  </div>
  <button type="submit"  style="margin-left:5px;background-color: #ff5f49;border-color:#ff5f49;color:white" class="btn ">搜索</button>
	</form>
</div>
 @yield('content')
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script src="/admin/lib/layer/2.4/layer.js"></script>
    <script src="/admin/mystyles/jQuery.Huifold.js"></script>
<script   type="text/javascript">
	
        function aalter(title,url){
                layer.open({
             type: 2,
             title:title,
            content: url,
                maxmin: true,
				area: ['1100px', '700px']
            });   
             }
			 
             function del(title,url){
                layer.open({
					
                 title:title,
                content: '确定删除',
               yes: function(index, layero){
					url:'/admin/public/myindex'
			   }
	                
            });   
             }
</script>

</body>
</html>