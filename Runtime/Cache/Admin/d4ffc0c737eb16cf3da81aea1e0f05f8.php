<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>闲鱼 Admin index Examples</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="闲鱼" />
  <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="/Public/assets/css/admin.css">
  <link rel="stylesheet" href="/Public/css/admin.css">
  
  <script src="/Public/artDialog/lib/jquery-1.10.2.js"></script>
  <link rel="stylesheet" href="/Public/artDialog/css/ui-dialog.css">
  <link rel="stylesheet" href="/Public/artDialog/css/skin.css">
  <script src="/Public/artDialog/dist/dialog-min.js"></script>
  
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，闲鱼 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar admin-header">
  <div class="am-topbar-brand">
    <strong>闲鱼</strong> <small>后台管理</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      <li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">5</span></a></li>
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> <?php echo (session('username')); ?> <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
          <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
          <li><a href="/Admin/Comment/../user/logout"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
      <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>

<div class="am-cf admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="/Admin/Comment/.."><span class="am-icon-home"></span> 首页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 常用模块</a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
            <li><a href="/Admin/Comment/../user/all" class="am-cf"><span class="am-icon-check"></span>用户管理<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
            <li><a href="/Admin/Comment/../cate/all"><span class="am-icon-puzzle-piece"></span> 类别管理</a></li>
            <li><a href="/Admin/Comment/../item/all"><span class="am-icon-th"></span> 商品管理</a></li>
            <li><a href="/Admin/Comment/../comment/all"><span class="am-icon-calendar"></span> 评论管理</a></li>
          </ul>
        </li>
        <li><a href="#"><span class="am-icon-table"></span> 表格</a></li>
        <li><a href="#"><span class="am-icon-pencil-square-o"></span> 表单</a></li>
        <li><a href="#"><span class="am-icon-th"></span> 相册页面<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
        <li><a href="/Admin/Comment/../user/logout"><span class="am-icon-sign-out"></span> 注销</a></li>
      </ul>

      <!--<div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span> 公告</p>
          <p>时光静好，与君语；细水流年，与君同。—— 闲鱼</p>
        </div>
      </div>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-tag"></span> wiki</p>
          <p>Welcome to the 闲鱼 wiki!</p>
        </div>
      </div>-->
    </div>
  </div>
  <!-- sidebar end -->

  <!-- content start -->
  <script language="javascript">
$(function(){
	$("#btnSelect").click(function(){
		$("input[name='id[]']:checkbox").each(function(){
			this.checked = !this.checked;							 
		});
	});	
	$("#btnSearch").click(function(){
		location.href = "/Admin/Comment/../comment/all?kw="+$("#kw").val();	
	});
});
</script>
<form method="post" action="/Admin/Comment/../comment/batch" id="form1">
<div class="admin-content">
  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">常用模块</strong> / <small>评论管理</small></div>
  </div>
  <div class="am-g">
    <div class="am-u-sm-12 am-u-md-6">
      <div class="am-btn-toolbar">
        <div class="am-btn-group am-btn-group-xs">
          <button type="button" class="am-btn am-btn-default" id="btnSelect">多选</button>
          <button type="submit" class="am-btn am-btn-default" name="batchDel" value="1" onclick="return delBatch(document.forms['form1'])"><span class="am-icon-trash-o"></span> 删除</button>
        </div>
      </div>
    </div>
    <div class="am-u-sm-12 am-u-md-3">
      
        <div class="am-input-group am-input-group-sm">
          <input type="text" name="kw" id="kw" class="am-form-field" value="<?php echo ($_GET['kw']); ?>">
          <span class="am-input-group-btn">
          <button class="am-btn am-btn-default" type="button" id="btnSearch">搜索</button>
          </span> </div>
      
    </div>
  </div>
  <div class="am-g">
    <div class="am-u-sm-12">
 
        <table class="am-table am-table-striped am-table-hover table-main">
          <thead>
            <tr>
              <th class="table-id">ID</th>
              <th class="table-title">评论内容</th>
              <th class="table-date am-hide-sm-only">发表人/时间</th>
              <th class="table-date am-hide-sm-only">商品标题</th>
              <th class="table-set">操作</th>
            </tr>
          </thead>
          <tbody>
          
          <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr <?php if(($vo["status"]) != "0"): ?>class="am-disabled"<?php endif; ?>>
            <td><input name="id[]" type="checkbox" id="id[]" value="<?php echo ($vo["id"]); ?>" />
            <?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["content"]); ?></td>
            <td class="am-hide-sm-only"><?php echo ($vo["username"]); ?>/<?php echo ($vo["created"]); ?><!--<?php if(!empty($vo["created"])): echo (date('Y-m-d H:i', $vo["created"])); endif; ?>--></td>
            <td class="am-hide-sm-only"><a href="/Admin/Comment/../item/view?id=<?php echo ($vo["itemId"]); ?>"><?php echo (mb_substr($vo["title"],0,18,'utf-8')); ?>..</a></td>
            <td><div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                  <button type="button" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" onclick="del('/Admin/Comment/../comment/del?id=<?php echo ($vo["id"]); ?>')"><span class="am-icon-trash-o"></span> 删除</button>
                </div>
              </div></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
          
        </table>
        <div class="am-cf"> 共 <?php echo ($count); ?> 条记录
          <div class="am-fr">
            <div class="flickr"><?php echo ($pageBar); ?></div>
          </div>
        </div>
        <p></p>

    </div>
  </div>
</div>
</form>
<link rel="stylesheet" type="text/css" href="/Public/css/page.css" />
<script type="text/javascript" src="/Public/js/admin.js"></script>

  <!-- content end -->

</div>

<a href="#" class="am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}">
  <span class="am-icon-btn am-icon-th-list"></span>
</a>

<footer>
  <hr>
  <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>


<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/Public/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/Public/assets/js/amazeui.min.js"></script>
<script src="/Public/assets/js/app.js"></script>

</body>
</html>