<?php
return array(
		//'配置项'=>'配置值'
		'DB_PARAMS'=>array(\PDO::ATTR_CASE => \PDO::CASE_NATURAL),
		'DB_TYPE'=>'mysql',// 数据库类型
		'DB_HOST'=>'localhost',// 服务器地址
		'DB_NAME'=>'quan',// 数据库名
		'DB_USER'=>'root2',// 用户名
		'DB_PWD'=>'root2asdfg',// 密码
		'DB_PORT'=>3310,// 端口
		'DB_PREFIX'=>'tp_',// 数据库表前缀
		'DB_CHARSET'=>'utf8',// 数据库字符集
		 // 数据库连接参数
		'URL_HTML_SUFFIX' => '', //URL在伪静态模式下的后缀
		'URL_CASE_INSENSITIVE'=>true, //URL不区分大小写,如果希望url全小写,应为true,同时要把APP_DEBUG在入口文件设为false
		'URL_MODEL'=>2, //URL模式,2为rewrite模式(在pathinfo的基础上,进一步省略掉index.php文件名)
		'TMPL_FILE_DEPR'=>'_', //配置视图目录层级
		'TAGLIB_BEGIN'=>'[',
		'TAGLIB_END'=>']',
		'uploadDirTemp'=>'./upload_temp/',//临时存储目录
		'uploadDir'=>'./upload/',//实际存储目录
		'DATA_CACHE_TYPE'=>'File',
		'DATA_CACHE_PREFIX'=>'xianyu_',
		'DATA_CACHE_TIME'=>10,
		

);