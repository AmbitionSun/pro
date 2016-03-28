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
          <li><a href="/Admin/Index/../user/logout"><span class="am-icon-power-off"></span> 退出</a></li>
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
        <li><a href="/Admin/Index/.."><span class="am-icon-home"></span> 首页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 常用模块</a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
            <li><a href="/Admin/Index/../user/all" class="am-cf"><span class="am-icon-check"></span>用户管理<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
            <li><a href="/Admin/Index/../cate/all"><span class="am-icon-puzzle-piece"></span> 类别管理</a></li>
            <li><a href="/Admin/Index/../item/all"><span class="am-icon-th"></span> 商品管理</a></li>
            <li><a href="/Admin/Index/../comment/all"><span class="am-icon-calendar"></span> 评论管理</a></li>
          </ul>
        </li>
        <li><a href="#"><span class="am-icon-table"></span> 表格</a></li>
        <li><a href="#"><span class="am-icon-pencil-square-o"></span> 表单</a></li>
        <li><a href="#"><span class="am-icon-th"></span> 相册页面<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
        <li><a href="/Admin/Index/../user/logout"><span class="am-icon-sign-out"></span> 注销</a></li>
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
  
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>一些常用模块</small></div>
    </div>

    <ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
      <li><a href="#" class="am-text-success"><span class="am-icon-btn am-icon-file-text"></span><br/>
      商品数<br/><?php echo ($itemNums); ?></a></li>
      <li><a href="#" class="am-text-warning"><span class="am-icon-btn am-icon-briefcase"></span><br/>
      评论数<br/><?php echo ($commentNums); ?></a></li>
      <li><a href="#" class="am-text-danger"><span class="am-icon-btn am-icon-recycle"></span><br/>
      用户数<br/><?php echo ($userNums); ?></a></li>
     <!-- <li><a href="#" class="am-text-secondary"><span class="am-icon-btn am-icon-user-md"></span><br/><br/></a></li>-->
    </ul>

    <div class="am-g">
      <div class="am-u-sm-12">
        <table class="am-table am-table-bd am-table-striped admin-content-table">
          <thead>
          <tr>
            <th>ID</th>
            <th>商品标题</th>
            <th>评论数</th>
            <th>用户</th>
            <th>发布时间</th>
            </tr>
          </thead>
          <tbody>
          <?php if(is_array($items)): $i = 0; $__LIST__ = $items;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($vo["id"]); ?></td><td><a href="/Admin/Index/../item/view?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></td> <td><span class="am-badge am-badge-success"><?php echo ($vo["comments"]); ?></span></td>
            <td><?php echo ($vo["username"]); ?></td>
            <td><?php echo ($vo["created"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="am-g">
      <div class="am-u-md-6">
        <div class="am-panel am-panel-default">
          <div class="am-panel-hd am-cf" data-am-collapse="{target: '#collapse-panel-2'}">活跃用户统计<span class="am-icon-chevron-down am-fr" ></span></div>
          <div id="collapse-panel-2" class="am-in">
            <table class="am-table am-table-bd am-table-bdrs am-table-striped am-table-hover">
              <tbody>
              <tr>
                <th class="am-text-center">#</th>
                <th>用户名</th>
                <th>登陆次数</th>
              </tr>
              <?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td class="am-text-center"><img src="https://wwc.alicdn.com/avatar/getAvatar.do?userId=0&width=60&height=60&type=sns" alt="" width="20"></td>
                <td><?php echo ($vo["username"]); ?></td>
                <td><?php echo ($vo["loginTimes"]); ?></td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="am-u-md-6">
        <div class="am-panel am-panel-default">
          <div class="am-panel-hd am-cf" data-am-collapse="{target: '#collapse-panel-3'}">最近留言<span class="am-icon-chevron-down am-fr" ></span></div>
          <div class="am-panel-bd am-collapse am-in am-cf" id="collapse-panel-3">
            <ul class="am-comments-list admin-content-comment">
            
              <?php if(is_array($comments)): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="am-comment">
                <a href="#"><img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/96/h/96" alt="" class="am-comment-avatar" width="48" height="48"></a>
                <div class="am-comment-main">
                  <header class="am-comment-hd">
                    <div class="am-comment-meta"><a href="#" class="am-comment-author"><?php echo ($vo["username"]); ?></a> 评论于 <time><?php echo ($vo["created"]); ?></time> 
                    @ <a href="/Admin/Index/../item/view?id=<?php echo ($vo["itemId"]); ?>"><?php echo ($vo["title"]); ?></a></div>
                  </header>
                  <div class="am-comment-bd"><p><?php echo ($vo["content"]); ?></p>
                  </div>
                </div>
              </li><?php endforeach; endif; else: echo "" ;endif; ?>
              
            </ul>
            <!--<ul class="am-pagination am-fr admin-content-pagination">
              <li class="am-disabled"><a href="#">&laquo;</a></li>
              <li class="am-active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">&raquo;</a></li>
            </ul>-->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content end -->

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