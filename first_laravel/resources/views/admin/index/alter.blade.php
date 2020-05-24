<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
<title>今天很疯狂</title>
    <link rel="Bookmark" href="/favicon.ico">
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
<script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/admin/lib/respond.min.js"></script>
<![endif]-->
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
<script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->

    <style>
  .select-box{
    width:10%;
}

    </style>
</head>

<body>
    <article class="page-container">
        <form class="form form-horizontal" id="form-article-add" method="get" action="{{url('admin/index/'.$v->cate_id.'/update')}}">
            {{csrf_field()}}

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">文章标题：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" style="width:30%"class="input-text" value="{{$v -> cate_title}}" placeholder="" name="cate_title">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">分类栏目：</label>
                <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                        <select  class="select" name="cate_classify">
                            <!-- <option value="0">全部栏目</option> -->
                            <option value="前端">前端</option>
                            <option value="后端">后端</option>
                            <option value="Linux">Linux</option>
                            <!-- <option value="13">├行业新闻</option> -->
                        </select>
                    </span> </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">文章描述</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" style="width:50%"class="input-text" placeholder="" name="cate_description" value="{{$v -> cate_description}}">
                </div>
            </div>



            <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">文章内容</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <script id="editor" name="art_content" type="text/plain" style="width:100%;height:400px;"  ></script>
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">

                    <button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 确定</button>
                    <!-- <button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>
                    <button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button> -->
                </div>
            </div>
            
            
        </form>
    </article>

    <!--_footer 作为公共模版分离出去-->
    <script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
    <script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
    <script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
    <!--/_footer /作为公共模版分离出去-->

    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
    <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
    <script type="text/javascript" src="/admin/lib/webuploader/0.1.5/webuploader.min.js"></script>
    <script type="text/javascript" src="/admin/lib/ueditor/1.4.3/ueditor.config.js"></script>
    <script type="text/javascript" src="/admin/lib/ueditor/1.4.3/ueditor.all.min.js">
    </script>
    <script type="text/javascript" src="/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
    <script>
    document.getElementById("editor").value = '{!!$v->article_content->art_content!!}';

        function displayDate() {
            var d = new Date()
            var day = d.getDate()
            var month = d.getMonth() + 1
            var year = d.getFullYear()
            // var hour = d.getHours()
            // var minute = d.getMinutes()
            // var second = d.getSeconds()
            // document.write(day + "." + month + "." + year)
            // document.write("<br /><br />")
            // document.write(year + "/" + month + "/" + day)

            document.getElementById("demo").value = year + "-" + month + "-" + day;
        }
    </script>
    <script type="text/javascript">
        $(function() {


            var ue = UE.getEditor('editor');

        });
    </script>
    <!--/请在上方写此页面业务相关的脚本-->
</body>

</html>