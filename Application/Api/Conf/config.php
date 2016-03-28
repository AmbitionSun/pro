<?php
return array(
	//'配置项'=>'配置值'
	'URL_ROUTER_ON'=>true, //开启路由
	'URL_ROUTE_RULES'=>array(
		'comments/:username'=>array('comment/my', ':1', array('method'=>'get')),
		'comments/:id/:username'=>array('comment/del', ':1:2', array('method'=>'delete')),
		'comments'=>array('comment/post', array('method'=>'post')),
		'items/:id'=>array('item/edit', ':1', array('method'=>'put')),
	),
);