 <?php
 function upsql(){
     if(!pdo_fieldexists('xc_train_userinfo', 'shop_id')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_userinfo')." ADD `shop_id` int(11) DEFAULT NULL COMMENT '分校id'");
     }
     if(!pdo_tableexists('xc_train_nav')){
         $sql = <<<EOT
CREATE TABLE `ims_xc_train_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL COMMENT '名称',
  `simg` varchar(255) DEFAULT NULL COMMENT '图片',
  `link` varchar(255) DEFAULT NULL COMMENT '链接',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `status` int(11) DEFAULT '1' COMMENT '状态',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`sort`,`status`,`createtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='自定义导航';
EOT;
         pdo_run($sql);
     }
     if(!pdo_fieldexists('xc_train_prize', 'type')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_prize')." ADD `type` int(11) DEFAULT '1'");
     }
     if(!pdo_fieldexists('xc_train_prize', 'pid')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_prize')." ADD `pid` int(11) DEFAULT NULL COMMENT '奖品id'");
     }
     if(!pdo_tableexists('xc_train_gua')){
         $sql = <<<EOT
CREATE TABLE `ims_xc_train_gua` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL COMMENT '名称',
  `bimg` varchar(255) DEFAULT NULL COMMENT '图片',
  `times` int(11) DEFAULT NULL COMMENT '概率',
  `status` int(11) DEFAULT '1' COMMENT '状态',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='奖品';
EOT;
         pdo_run($sql);
     }
     if(!pdo_fieldexists('xc_train_active', 'gua_img')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_active')." ADD `gua_img` varchar(255) DEFAULT NULL COMMENT '刮刮卡图片'");
     }
     if(!pdo_fieldexists('xc_train_active', 'list')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_active')." ADD `list` longtext COMMENT '奖品'");
     }
     if(!pdo_fieldexists('xc_train_active', 'type')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_active')." ADD `type` int(11) DEFAULT '1' COMMENT '类型（1集卡2刮刮卡）'");
     }
     if(!pdo_fieldexists('xc_train_service_team', 'type')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_service_team')." ADD `type` int(11) DEFAULT '1' COMMENT '类型'");
     }
     if(!pdo_fieldexists('xc_train_order', 'can_use')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_order')." ADD `can_use` int(11) DEFAULT '1' COMMENT '核销次数'");
     }
     if(!pdo_fieldexists('xc_train_order', 'is_use')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_order')." ADD `is_use` int(11) DEFAULT '0' COMMENT '已核销次数'");
     }
     if(!pdo_fieldexists('xc_train_order', 'use_time')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_order')." ADD `use_time` longtext COMMENT '核销时间'");
     }
     if(!pdo_fieldexists('xc_train_article', 'link_type')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_article')." ADD `link_type` int(11) DEFAULT '1' COMMENT '模式'");
     }
     if(!pdo_fieldexists('xc_train_teacher', 'content2')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_service')." ADD `content2` longtext COMMENT '内容2'");
     }
     if(!pdo_fieldexists('xc_train_teacher', 'content_type')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_service')." ADD `content_type` int(11) DEFAULT '1' COMMENT '课程模式'");
     }
     if(!pdo_fieldexists('xc_train_service', 'can_use')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_service')." ADD `can_use` int(11) DEFAULT '1' COMMENT '核销次数'");
     }
     if(!pdo_fieldexists('xc_train_service', 'content2')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_service')." ADD `content2` longtext COMMENT '内容2'");
     }
     if(!pdo_fieldexists('xc_train_service', 'content_type')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_service')." ADD `content_type` int(11) DEFAULT '1' COMMENT '课程模式'");
     }

     if(!pdo_fieldexists('xc_train_discuss', 'type')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_discuss')." ADD `type` int(11) DEFAULT '1' COMMENT '类型（1课程2视频）'");
     }
     if(!pdo_fieldexists('xc_train_active', 'share_type')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_active')." ADD `share_type` int(11) DEFAULT '1' COMMENT '分享类型（1分享2分享点击）'");
     }
     if(!pdo_tableexists('xc_train_video')){
         $sql = <<<EOT
CREATE TABLE `ims_xc_train_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL COMMENT '名称',
  `video` varchar(255) DEFAULT NULL COMMENT '视频',
  `bimg` varchar(255) DEFAULT NULL COMMENT '封面',
  `price` decimal(10,2) DEFAULT NULL COMMENT '价格',
  `pid` int(11) DEFAULT NULL COMMENT '课程id',
  `cid` int(11) DEFAULT NULL COMMENT '分类',
  `teacher_id` int(11) DEFAULT NULL COMMENT '主讲教师',
  `teacher_name` varchar(50) DEFAULT NULL COMMENT '教师姓名',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `status` int(11) DEFAULT '1' COMMENT '状态',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`pid`,`sort`,`status`,`createtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='视频';
EOT;
         pdo_run($sql);
     }
     if(!pdo_tableexists('xc_train_video_class')){
         $sql = <<<EOT
CREATE TABLE `ims_xc_train_video_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL COMMENT '名称',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `status` int(11) DEFAULT '1' COMMENT '状态',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`sort`,`status`,`createtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='视频分来';
EOT;
         pdo_run($sql);
     }
     if(!pdo_fieldexists('xc_train_order', 'store')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_order')." ADD `store` int(11) DEFAULT NULL COMMENT '校区'");
     }
     if(!pdo_fieldexists('xc_train_order', 'content')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_order')." ADD `content` longtext COMMENT '备注'");
     }
     if(!pdo_fieldexists('xc_train_school', 'longitude')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_school')." ADD `longitude` decimal(10,7) DEFAULT NULL COMMENT '经度'");
     }
     if(!pdo_fieldexists('xc_train_school', 'latitude')) {
         pdo_query("ALTER TABLE ".tablename('xc_train_school')." ADD `latitude` decimal(10,7) DEFAULT NULL COMMENT '纬度'");
     }
     if(!pdo_tableexists('xc_train_login_log')){
         $sql = <<<EOT
CREATE TABLE `ims_xc_train_login_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` varchar(255) DEFAULT NULL,
  `openid` varchar(255) DEFAULT NULL COMMENT '用户id',
  `plan_date` varchar(50) DEFAULT NULL COMMENT '日期',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='登录日志';
EOT;
         pdo_run($sql);
     }
     $json = array('status' => 1, 'msg' => '更新成功');
     echo json_encode($json);
 }

