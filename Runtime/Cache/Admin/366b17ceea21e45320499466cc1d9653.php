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
          <li><a href="/admin/item/../user/logout"><span class="am-icon-power-off"></span> 退出</a></li>
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
        <li><a href="/admin/item/.."><span class="am-icon-home"></span> 首页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 常用模块</a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
            <li><a href="/admin/item/../user/all" class="am-cf"><span class="am-icon-check"></span>用户管理<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
            <li><a href="/admin/item/../cate/all"><span class="am-icon-puzzle-piece"></span> 类别管理</a></li>
            <li><a href="/admin/item/../item/all"><span class="am-icon-th"></span> 商品管理</a></li>
            <li><a href="/admin/item/../comment/all"><span class="am-icon-calendar"></span> 评论管理</a></li>
          </ul>
        </li>
        <li><a href="#"><span class="am-icon-table"></span> 表格</a></li>
        <li><a href="#"><span class="am-icon-pencil-square-o"></span> 表单</a></li>
        <li><a href="#"><span class="am-icon-th"></span> 相册页面<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
        <li><a href="/admin/item/../user/logout"><span class="am-icon-sign-out"></span> 注销</a></li>
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
  <style>
.detail_l{width:600px; float:left; margin-left:10px; padding-top:20px; font-size:15px;}
.detail_r{width:370px; float:left; margin-left:20px; padding-top:20px;}
.pic_box{width:120px; float:left; margin-right:20px; margin-bottom:10px;}
.pic_box img{width:100%;}
.price{color:#F30; font-size:16px; font-weight:bold; margin-right:10px;}
del{color:#999;}

.comment_box{border-bottom:1px dashed #EAEAEA; font-size:13px; padding-bottom:5px; margin-top:10px;}
.comment_box_l{width:35px; float:left; background:#eee; margin-right:10px;}
.comment_box_l img{width:35px;}
.comment_box_r{float:left;}
.time{color:#999;}
.username{color:#666; margin-right:10px;}
</style>
<div class="admin-content">
    <div class="detail_l">
    	<h1><?php echo ($vo["title"]); ?></h1>
        <p><?php echo ($vo["username"]); ?> 发表于<?php if(!empty($vo["created"])): echo (date('Y-m-d H:i', $vo["created"])); endif; ?></p>
        <p><span class="price">¥<?php echo ($vo["currentPrice"]); ?></span> <del>¥<?php echo ($vo["price"]); ?></del></p>
        <p><?php echo ($vo["content"]); ?></p>
        
        <h3>留言</h3>
        <hr/>
        <?php if(is_array($comment_list)): $i = 0; $__LIST__ = $comment_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="comment_box">
        	<div class="comment_box_l"><img src="https://wwc.alicdn.com/avatar/getAvatar.do?userId=0&width=60&height=60&type=sns"/></div>
            <div class="comment_box_r"><span class="username"><?php echo ($vo["username"]); ?> <?php if(!empty($vo["toUsername"])): ?>回复@<?php echo ($vo["toUsername"]); endif; ?>:</span> <?php echo ($vo["content"]); ?><br/>
                <span class="time"><?php if(!empty($vo["created"])): echo ($vo["created"]); endif; ?></span>
            </div>
            <div style="clear:both"></div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="detail_r"> 
    	<?php if(is_array($pic_list)): $i = 0; $__LIST__ = $pic_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pic): $mod = ($i % 2 );++$i;?><div class="pic_box">
        	<img src="<?php echo ($pic["url"]); ?>" style="margin-bottom:5px"/><button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" onclick="del('/admin/item/../pic/del?id=<?php echo ($pic["id"]); ?>')"><span class="am-icon-trash-o"></span> 删除</button>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
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