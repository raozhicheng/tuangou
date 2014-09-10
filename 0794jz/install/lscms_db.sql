--乐尚团购CMS,Version：1.0
--Mysql VERSION：5.5.20
--Create time：2014-03-13 21:58:46
DROP TABLE IF EXISTS `cms_admin`;
CREATE TABLE `cms_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adm_name` varchar(255) NOT NULL,
  `adm_password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `role_id` int(11) NOT NULL,
  `login_time` int(11) NOT NULL,
  `login_ip` varchar(255) NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_adm_name` (`adm_name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gbk;
DROP TABLE IF EXISTS `cms_adv`;
CREATE TABLE `cms_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `code` text,
  `status` tinyint(1) NOT NULL,
  `begin_time` int(11) DEFAULT '0',
  `end_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gbk;
INSERT INTO `cms_adv` VALUES ('6','我的广告','头部','<div><img border=\"0\" alt=\"\" src=\"http://localhost/admin/uploadFiles/40dd2729de930b06c0a5b192a0293d9f.jpg\" /></div>','1','0','0');
DROP TABLE IF EXISTS `cms_city`;
CREATE TABLE `cms_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `pid` int(11) NOT NULL,
  `is_open` tinyint(1) NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `notice` text NOT NULL,
  `seo_title` text,
  `seo_keyword` text,
  `seo_description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=gbk COMMENT='城市';
INSERT INTO `cms_city` VALUES ('91','石家庄','xdfsda','1','0','90','1','1','每天提供一单精品消费，为您精选餐厅、酒吧、KTV、SPA、美发店、瑜伽馆等特色商家，只要凑够最低团购人数就能享受无敌折扣','<p>欢迎您光临</p>','','','');
INSERT INTO `cms_city` VALUES ('94','小小石','xxs','1','1','91','1','0','adsfasdf','asdfasdfsadf','','','');
INSERT INTO `cms_city` VALUES ('90','河北','kobe','1','0','0','1','0','asdfasdfasd','asdfasdfasf','','','');
INSERT INTO `cms_city` VALUES ('95','太原市','taiyuan','1','0','0','1','0','aaa2222','<p>太原团购欢迎您的到来！</p>','c','d','e');
INSERT INTO `cms_city` VALUES ('96','小店','xiaodian','1','0','95','1','0','c','c','','','');
DROP TABLE IF EXISTS `cms_config`;
CREATE TABLE `cms_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `input_type` tinyint(1) NOT NULL COMMENT '??????? 0:???? 1:????? 2:???? 3:???',
  `value_scope` text NOT NULL COMMENT '配置输入的类型 0:文本输入 1:下拉框输入 2:图片上传 3:编辑器',
  `show_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=gbk;
INSERT INTO `cms_config` VALUES ('1','URL_MODEL','0','1','0,1','URL模式');
INSERT INTO `cms_config` VALUES ('2','TIME_ZONE','8','1','0,8','服务器时区');
INSERT INTO `cms_config` VALUES ('3','ADMIN_LOG','1','1','0,1','系统日志');
INSERT INTO `cms_config` VALUES ('4','FILE_MAXSIZE','1000000','0','','文件上传大小（字节）');
INSERT INTO `cms_config` VALUES ('5','ALLOW_FILE_EXT','jpg,gif,png,rar,zip,doc,bmp','0','','上传文件类型');
INSERT INTO `cms_config` VALUES ('6','GOOGLE_API_KEY','','0','','GOOGLE地图密钥');
INSERT INTO `cms_config` VALUES ('7','IS_CART','1','1','0,1','开启购物车');
INSERT INTO `cms_config` VALUES ('8','SUBMIT_DELAY','1','0','','表单防刷间隔（秒）');
INSERT INTO `cms_config` VALUES ('9','APP_MSG_SEND','1','1','0,1','消息前台发送');
INSERT INTO `cms_config` VALUES ('10','ADMIN_MSG_SEND','1','1','0,1','消息后台发送');
INSERT INTO `cms_config` VALUES ('11','IS_SITE_OPEN','1','1','0,1','网站开关');
INSERT INTO `cms_config` VALUES ('12','SITE_CLOSE_HTML','<div class=\"closed_box\">
<div class=\"closed_body_top\">&nbsp;</div>
<div class=\"closed_body\">
<div class=\"content\">网站已关闭<br />
请您稍后访问</div>
</div>
<div class=\"closed_shadow\">&nbsp;</div>
<div class=\"clear\">&nbsp;</div>
</div>','3','','网站关闭页');
INSERT INTO `cms_config` VALUES ('13','IS_GZIP','0','1','0,1','GZIP压缩');
INSERT INTO `cms_config` VALUES ('14','IS_CACHE','1','1','0,1','缓存开启状态');
INSERT INTO `cms_config` VALUES ('15','EXPIRED_TIME','1','0','','后台超时时间（秒）');
INSERT INTO `cms_config` VALUES ('16','BIG_WIDTH','100','0','','大图宽度');
INSERT INTO `cms_config` VALUES ('17','BIG_HEIGHT','100','0','','大图高度');
INSERT INTO `cms_config` VALUES ('18','SMALL_WIDTH','50','0','','小图宽度');
INSERT INTO `cms_config` VALUES ('19','SMALL_HEIGHT','50','0','','小图高度');
INSERT INTO `cms_config` VALUES ('20','WATER_MARK','41710042a5353b42e8659c4b26a6ccd8.jpg','2','','水印图片');
INSERT INTO `cms_config` VALUES ('21','MARK_ALPHA','100','0','','水印透明度');
INSERT INTO `cms_config` VALUES ('22','MARK_POSITION','1','1','1,2,3,4,5','水印位置');
INSERT INTO `cms_config` VALUES ('23','IMG_MAXSIZE','100000','0','','上传图片大小');
INSERT INTO `cms_config` VALUES ('24','ALLOW_IMG_EXT','jpg,gif,png','0','','上传图片类型');
INSERT INTO `cms_config` VALUES ('25','BG_COLOR','#ffffff','0','','背景色');
INSERT INTO `cms_config` VALUES ('26','IS_MARK_OPEN','0','1','0,1','开启水印');
INSERT INTO `cms_config` VALUES ('27','USER_VERIFY','0','1','0,1','会员注册验证');
INSERT INTO `cms_config` VALUES ('28','INVITE_REFERRALS','20','0','','邀请返利');
INSERT INTO `cms_config` VALUES ('29','REFERRALS_TYPE','0','1','0,1','返利类型');
INSERT INTO `cms_config` VALUES ('30','MSG_AUTO_EFFECT','1','1','0,1','留言自动生效');
INSERT INTO `cms_config` VALUES ('31','REFERRAL_LIMIT','10','0','','购买返利次数');
INSERT INTO `cms_config` VALUES ('32','REFERRAL_DELAY','1','0','','返利延时（分钟）');
INSERT INTO `cms_config` VALUES ('33','MOBILE_MUST','0','1','0,1','会员手机必填');
INSERT INTO `cms_config` VALUES ('34','CURRENCY_UNIT','0','1','0,1','货币单位');
INSERT INTO `cms_config` VALUES ('35','SCORE_UNIT','积分','0','','积分单位');
INSERT INTO `cms_config` VALUES ('36','SITE_LOGO','ae2032bbda6523589c4b5adc8da1541a.png','2','','网站标识');
INSERT INTO `cms_config` VALUES ('37','SITE_TITLE','乐尚团购系统,国内最优秀的PHP开源团购系统','0','','站点名称');
INSERT INTO `cms_config` VALUES ('38','SITE_KEYWORD','aa','0','','关键字');
INSERT INTO `cms_config` VALUES ('39','SITE_DESCRIPTION','aa','0','','站点描述');
INSERT INTO `cms_config` VALUES ('40','SITE_TEL','0351-3378551','0','','联系电话');
INSERT INTO `cms_config` VALUES ('41','SIDE_DEAL_NUM','4','1','1,2,3,4','侧栏团购列表个数');
INSERT INTO `cms_config` VALUES ('42','SIDE_MSG_NUM','5','1','1,2,3,4,5,6,7,8','侧栏留言列表数');
INSERT INTO `cms_config` VALUES ('43','ONLINE_QQ','111111,222222','0','','在线QQ');
INSERT INTO `cms_config` VALUES ('44','ONLINE_TIME','周一至周六 9:00-18:00','0','','客服工作时间');
INSERT INTO `cms_config` VALUES ('45','DEAL_PAGE_SIZE','6','0','','团购分页量');
INSERT INTO `cms_config` VALUES ('46','PAGE_SIZE','10','0','','其他分页');
INSERT INTO `cms_config` VALUES ('47','HELP_CATE_NUM','5','0','','帮助分类数');
INSERT INTO `cms_config` VALUES ('48','HELP_ITEM_NUM','5','0','','帮助显示数');
INSERT INTO `cms_config` VALUES ('49','SITE_FOOTER','版权所有 &copy;&nbsp; 2013&nbsp; 乐尚科技&nbsp;&nbsp; 订购电话：15903467483&nbsp; <a target=\"_blank\" href=\"http://www.miibeian.gov.cn/\">晋ICP备09007422号</a>','3','','站点底部信息');
INSERT INTO `cms_config` VALUES ('50','REFERRAL_HELP','Dadsfasdf','3','','返利帮助说明');
INSERT INTO `cms_config` VALUES ('51','REFERRAL_SIDE_HELP','&nbsp;','3','','返利页右侧栏说明');
INSERT INTO `cms_config` VALUES ('52','COUPON_NAME','乐尚券','0','','团购券名称');
INSERT INTO `cms_config` VALUES ('53','COUPON_PRT_TPL','<div style=\"border-bottom: #000000 1px solid; border-left: #000000 1px solid; padding-bottom: 10px; margin: 0px auto; padding-left: 10px; width: 600px; padding-right: 10px; font-size: 14px; border-top: #000000 1px solid; border-right: #000000 1px solid; padding-top: 10px\">
<table class=\"dataEdit\" cellspacing=\"0\" cellpadding=\"0\">
    <tbody>
        <tr>
            <td width=\"400\"><img border=\"0\" alt=\"\" src=\"&lt;{$coupon.logo}&gt;\" /></td>
            <td style=\"font-family: verdana; font-size: 22px; font-weight: bolder\" width=\"43%\">序列号：&lt;{$coupon.sn}&gt;<br />
            密码：&lt;{$coupon.password}&gt;</td>
        </tr>
        <tr>
            <td height=\"1\" colspan=\"2\">
            <div style=\"border-bottom: #000000 1px solid; width: 100%\">&nbsp;</div>
            </td>
        </tr>
        <tr>
            <td height=\"8\" colspan=\"2\"><br />
            &nbsp;</td>
        </tr>
        <tr>
            <td style=\"padding-bottom: 5px; padding-left: 5px; padding-right: 5px; font-family: 微软雅黑; height: 50px; font-size: 28px; font-weight: bolder; padding-top: 5px\" colspan=\"2\">&lt;{$coupon.deal_name}&gt;</td>
        </tr>
        <tr>
            <td style=\"line-height: 22px; padding-right: 20px; font-size: 14px\" valign=\"top\" width=\"400\">&lt;{$coupon.user_name}&gt;<br />
            生效时间:&lt;{$coupon.begin_time}&gt;<br />
            过期时间:&lt;{$coupon.end_time}&gt;<br />
            商家电话： &lt;{$coupon.tel}&gt;<br />
            商家地址: &lt;{$coupon.address}&gt;<br />
            交通路线: &lt;{$coupon.route}&gt;<br />
            营业时间： &lt;{$coupon.open_time}&gt;<br />
            &nbsp;</td>
            <td>
            <div style=\"width: 255px; height: 255px\" id=\"map_canvas\">&nbsp;</div>
            <br />
            &nbsp;</td>
        </tr>
    </tbody>
</table>
</div>','3','','团购券打印模板');
INSERT INTO `cms_config` VALUES ('54','SHOW_DEAL_CATE','1','1','0,1','显示团购分类');
INSERT INTO `cms_config` VALUES ('55','REFERRAL_IP_LIMIT','0','1','0,1','购买返利IP限制');
INSERT INTO `cms_config` VALUES ('56','UNSUBSCRIBE_MAIL_TIP','您收到此邮件是因为您订阅了%s每日推荐更新。如果您不想继续接收此类邮件，可随时%s','0','','推广邮件退订提示');
INSERT INTO `cms_config` VALUES ('57','FOOTER_LOGO','2750be3d2a7649e27e2baac04e6e7c76.png','2','','底部标识');
INSERT INTO `cms_config` VALUES ('58','SITE_TITLE','乐尚团购系统,国内最优秀的PHP开源团购系统','0','','站点标题');
INSERT INTO `cms_config` VALUES ('59','COUPON_MAIL_NOTICE','1','1','0,1','团购券邮件通知');
INSERT INTO `cms_config` VALUES ('60','COUPON_SMS_NOTICE','1','1','0,1','团购券短信通知');
INSERT INTO `cms_config` VALUES ('61','PAYMENT_MAIL_NOTICE','1','1','0,1','收款单邮件通知');
INSERT INTO `cms_config` VALUES ('62','PAYMENT_SMS_NOTICE','0','1','0,1','收款单短信通知');
INSERT INTO `cms_config` VALUES ('63','REPLY_MAIL_ADD','ffff@qq.com','0','','邮件回复地址');
INSERT INTO `cms_config` VALUES ('64','DELIVERY_MAIL_NOTICE','1','1','0,1','发货邮件通知');
INSERT INTO `cms_config` VALUES ('65','DELIVERY_SMS_NOTICE','0','1','0,1','发货短信通知');
INSERT INTO `cms_config` VALUES ('66','MAIL_ON','1','1','0,1','开启邮件功能');
INSERT INTO `cms_config` VALUES ('67','SMS_ON','0','1','0,1','开启短信功能');
INSERT INTO `cms_config` VALUES ('68','COUPON_MAIL_LIMIT','3','0','','团购券邮件通知次数');
INSERT INTO `cms_config` VALUES ('69','COUPON_SMS_LIMIT','3','0','','团购券短信通知次数');
DROP TABLE IF EXISTS `cms_deal`;
CREATE TABLE `cms_deal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `description` text,
  `begin_time` int(11) NOT NULL DEFAULT '0',
  `end_time` int(11) NOT NULL DEFAULT '0',
  `min_bought` int(11) NOT NULL DEFAULT '0',
  `max_bought` int(11) NOT NULL DEFAULT '0',
  `user_min_bought` int(11) NOT NULL DEFAULT '0',
  `user_max_bought` int(11) NOT NULL DEFAULT '0',
  `origin_price` double(20,4) NOT NULL DEFAULT '0.0000',
  `current_price` double(20,4) NOT NULL DEFAULT '0.0000',
  `city_id` int(11) NOT NULL,
  `is_coupon` tinyint(1) NOT NULL,
  `is_delivery` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `user_count` int(11) NOT NULL DEFAULT '0',
  `buy_count` int(11) NOT NULL DEFAULT '0',
  `time_status` tinyint(1) NOT NULL,
  `buy_status` tinyint(1) NOT NULL DEFAULT '0',
  `deal_type` tinyint(1) NOT NULL,
  `allow_promote` tinyint(1) NOT NULL DEFAULT '0',
  `return_money` double(20,4) NOT NULL DEFAULT '0.0000',
  `return_score` int(11) NOT NULL DEFAULT '0',
  `brief` text,
  `sort` int(11) NOT NULL,
  `deal_goods_type` int(11) NOT NULL DEFAULT '0',
  `success_time` int(11) NOT NULL DEFAULT '0',
  `coupon_begin_time` int(11) NOT NULL DEFAULT '0',
  `coupon_end_time` int(11) NOT NULL DEFAULT '0',
  `code` varchar(255) DEFAULT NULL,
  `weight` double(20,4) NOT NULL DEFAULT '0.0000',
  `weight_id` int(11) NOT NULL,
  `is_referral` tinyint(1) NOT NULL,
  `buy_type` tinyint(1) NOT NULL DEFAULT '0',
  `discount` double(20,4) NOT NULL DEFAULT '0.0000',
  `seo_title` text,
  `seo_keyword` text,
  `seo_description` text,
  `notice` tinyint(1) NOT NULL DEFAULT '0',
  `free_delivery` tinyint(1) NOT NULL DEFAULT '0',
  `define_payment` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk;
INSERT INTO `cms_deal` VALUES ('1','【胜利南路】棒槌自助骨头馆','自助骨头馆','1','1','826de0b232653aaedd4158b89e1eef2b_new.jpg','套餐介绍【铁东区】仅27元，享价值29元『棒槌自助骨头馆』单人自助套餐1位！无需预约！吃的实惠吃的美味！<br />
购买须知温馨提示<br />
有效日期：<br />
2013年12月19日-2014年06月18日<br />
限购数量：<br />
本商品不限购买<br />
使用规则：<br />
每张百度团购券最多1人使用，不论是否儿童均计入人数<br />
预约提醒：<br />
该商品无需预约<br />
节假说明：<br />
周末、法定节假日通用<br />
其他提示：<br />
最多可用餐2小时 <br />
部分菜品因时令原因有所不同，请以店内当日实际供应为准 <br />
本商品不享受店内其他优惠，优惠券不兑换、不找零 <br />','0','0','100','200','1','1','29.0000','27.0000','91','1','0','1','0','0','0','1','0','0','0','0.0000','2','','1','0','0','1394118017','1394118017','tg','0.0000','0','0','0','0.0000','棒槌自助骨头馆','棒槌自助骨头馆','棒槌自助骨头馆','0','0','0');
INSERT INTO `cms_deal` VALUES ('2','魏家凉皮','魏家凉皮','1','3','7f56cf5e6ffea5ec21b3de62c7961759_new.jpg','西安街头的凉皮，叫卖时米皮白且透亮，蒸笼有多大就能蒸出多大一张，蒸好后一张与一张之间略抹熟菜油，再一层层摞起来，堆在案头如同招牌一般。吃的时候，摊主取一张放在铺了雪白纱布的案上，用一把大如铡刀的利刀，&ldquo;咣、咣、咣&hellip;&hellip;&rdquo;几下便把皮子切成筷子般粗细，然后放上盐、醋、特制的调料水等，最后用筷子挑起一撮皮子在盛满红亮的辣椒油的罐子里美美一蘸，洁白的米皮、红亮的辣油，不等入口，香味就已经谗的人口水直流。拌匀了尝一口，皮子筋道，口味酸辣，美味非常。<br />
魏家的凉皮，分为米皮和面皮。米皮分为普通米皮以及麻酱凉皮，面皮分为普通面皮以及秘制凉皮两种。魏家四种凉皮继承了陕西凉皮的传统味道。不同的是，明快舒适的环境取代了小摊吃饭的窘迫。点一份凉皮，要是再配上一个外酥里嫩的肉夹馍，便是心满意足的简餐。<br />','0','0','100','100','1','1','18.0000','12.6000','91','0','0','1','0','0','1','1','0','0','0','0.0000','0','西北特色凉皮，传统地道风味。仅售12.6元！价值18元的魏家凉皮单人餐，米皮/面皮可选。洁白的米皮、红亮的辣油，口味酸辣，美味非常','2','0','0','1394362027','1394362027','wj','0.0000','0','0','0','0.0000','魏家凉皮','魏家凉皮','魏家凉皮','0','0','0');
INSERT INTO `cms_deal` VALUES ('3','觉品壹号','觉品壹号','1','4','3cfd1a96b2967154331ba47985eb0a58_new.jpg','温馨提示<br />
有效日期：<br />
2014年02月13日-05月31日<br />
限购数量：<br />
本商品不限购买<br />
使用规则：<br />
每张优惠券仅限使用1次，建议4人使用<br />
预约提醒：<br />
请提前1天致电预约<br />
其他提示：<br />
仅限大厅用餐，商家无包间<br />
仅限堂食，不提供餐前外带，餐毕如需打包，需到店另付打包费1元/盒<br />
酒水、饮料等问题，请致电商家咨询，以商家反馈为准<br />
商家免费提供WiFi<br />
商家提供收费停车位150个，收费标准8元/小时<br />
本商品不享受店内其他优惠，优惠券不兑换、不找零','0','0','100','100','0','0','988.0000','188.0000','91','1','0','1','0','0','1','1','0','0','0','0.0000','0','【宣武门】仅188元，享价值988元『觉品壹号』四人套餐！免费提供Wifi！在这里就餐，不寂寞，不冷落，只是有一种舒适小憩的感觉！','3','0','0','1394362987','1394362987','Jp','0.0000','0','0','0','0.0000','觉品壹号','觉品壹号','觉品壹号','0','0','0');
INSERT INTO `cms_deal` VALUES ('4','【广外大街】砂锅家厨','砂锅家厨','1','5','7681568c0d46384091ec0c46bfb17719_new.jpg','商家介绍<br />
砂锅是以砂质陶器制成的锅，有时候部分上釉。<br />
依靠砂锅的菜谱有砂锅鸡、砂锅豆腐、砂锅鱼头等。<br />
特点：<br />
保温能力强。<br />
质地多孔，能少量吸附和释放食物味道。<br />
刚买来时需要处理（例如加洗米水煮沸）以使其不容易碎裂。<br />
不耐温差变化，主要用于小火慢熬。<br />
砂锅的保养<br />
砂锅是由石英、长石、粘土等多种原料制成的陶制品，经高温烧炼，锅体形成一种玻璃体。这种玻璃体对温差适应能力较差。砂锅骤然受热受冷，会引起急剧膨胀或收缩，因而造成破裂。针对砂锅这一特性，使用时必须注意以下几个方面：<br />
1、要逐渐加温，不要骤然在大火上烧，以免胀裂。<br />
2、烧好食物后，砂锅离火时，用木片把锅架起来，使其均匀散热，缓慢冷却，以免缩裂。也可根据砂锅大小，做一个铁圈，当砂锅离火后，放在铁圈上，使其底部不直接触地，悬空自然降温，可使砂锅使用时间更长些。<br />
3、新买来的砂锅，往往漏水，这是因有许多砂眼的缘故。新锅第一次使用时，最好做面汤或稀粥，吃完后，先不刷锅，把它放火炉边烤一下，使锅里的面糊干结，堵住锅壁上那些微小的砂眼，然后洗净。这样，砂锅就不会漏水了。','0','0','100','100','0','0','60.0000','42.0000','91','1','0','1','0','0','1','1','0','0','0','0.0000','0','【西城区】仅42元，享价值60元『砂锅家厨』双人套餐二选一！不一样的美食享受！定会让你流连忘返！','4','0','0','0','0','sg','0.0000','0','0','0','0.0000','砂锅家厨','砂锅家厨','砂锅家厨','0','0','0');
INSERT INTO `cms_deal` VALUES ('5','湘菜公主','湘菜公主','1','6','5ea522bca7b89b5d98d2fddb73b86065_new.jpg','<table style=\"border-bottom: rgb(226,226,226) 1px solid; border-left: rgb(226,226,226) 1px solid; widows: 2; text-transform: none; background-color: rgb(255,255,255); text-indent: 0px; border-spacing: 0px; border-collapse: collapse; font: 14px/21px tahoma, arial, 宋体, sans-serif; white-space: normal; orphans: 2; margin-bottom: 18px; letter-spacing: normal; color: rgb(51,51,51); border-top: rgb(226,226,226) 1px solid; border-right: rgb(226,226,226) 1px solid; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">
    <tbody>
        <tr>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">干锅牛蛙</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">1份</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">46元</td>
        </tr>
        <tr>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">湖南小炒肉</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">1份</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">26元</td>
        </tr>
        <tr>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">粉丝蒸娃娃菜</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">1份</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">22元</td>
        </tr>
        <tr>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">海带排骨汤</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">1份</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">20元</td>
        </tr>
        <tr>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">米饭</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">2份</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">6元</td>
        </tr>
        <tr>
            <th style=\"border-bottom: 0px; border-left: 0px; padding-bottom: 0px; font-style: normal; margin: 0px; outline-style: none; outline-color: invert; padding-left: 0px; outline-width: 0px; padding-right: 0px; border-top: 0px; font-weight: normal; border-right: 0px; padding-top: 0px\" colspan=\"3\">以下内容2选1</th>
        </tr>
        <tr>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">冰淇淋球</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">2个</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">40元</td>
        </tr>
        <tr>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">橙汁、鲜梨汁、胡萝卜汁3选1</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">2杯</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">40元</td>
        </tr>
    </tbody>
</table>','1394364951','1425900953','50','50','1','1','160.0000','39.9000','91','1','0','1','0','0','5','1','0','0','0','0.0000','0','仅售39.9元,价值160元超划算双人套餐!坚持时尚健康美食,营养美味快活享不停!','5','0','0','1394364949','1394364949','xc','0.0000','0','0','0','0.0000','湘菜公主','湘菜公主','湘菜公主','0','0','0');
INSERT INTO `cms_deal` VALUES ('6','【西四】古秦食府','古秦食府','1','1','868325ebc97cbff0ab90d87da38c2ac4_new.jpg','古秦食府主题为【融】捭阖六国，傲视群雄，古秦食府的特色在沅陵虎溪山出土的竹简《美食方》的基础上形成，此可谓是集八大菜系为一体，收七国佳肴于一席，每道菜都有详细的历史渊源，如【秦皇瓦罐】【帅账干锅】等。 古秦食府的菜经深研细考，自成一体，请南北巧厨高手近百名，与时俱进，涵盖美食之精华，收闽、广之海鲜，纳西北之杂粮，备苏、鲁醇和之美食，集川、贵辛辣之佳肴，兼容中求拓展，嫁接里有提高&hellip;&hellip;','1425902698','0','1','5','1','1','3032.0000','488.0000','91','1','0','1','0','0','0','0','0','0','0','0.0000','0','【西四】仅488元，享价值3032元『古秦食府』豪华8-10人餐！集八大菜系为一体，经典湘菜，粤菜小炒！大众消费，好吃不贵！','6','0','0','0','0','gq','0.0000','0','0','0','0.0000','古秦食府','古秦食府','古秦食府','0','0','0');
DROP TABLE IF EXISTS `cms_deal_attr`;
CREATE TABLE `cms_deal_attr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `goods_type_attr_id` int(11) NOT NULL,
  `price` double(20,4) NOT NULL,
  `deal_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
DROP TABLE IF EXISTS `cms_deal_cart`;
CREATE TABLE `cms_deal_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `attr` varchar(255) NOT NULL,
  `unit_price` double(20,4) NOT NULL,
  `number` int(11) NOT NULL,
  `total_price` double(20,4) NOT NULL,
  `verify_code` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `return_money` double(20,4) NOT NULL,
  `return_total_money` double(20,4) NOT NULL,
  `return_score` int(11) NOT NULL,
  `return_total_score` int(11) NOT NULL,
  `buy_type` tinyint(1) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;
INSERT INTO `cms_deal_cart` VALUES ('1','j55bvvd70r6ru6odlkt94skl40','0','1','【胜利南路】棒槌自助骨头馆','0','27.0000','1','27.0000','72e6f6e0f08ca88f02b1480464afd55b','1394284854','1394284854','0.0000','0.0000','2','2','0','自助骨头馆');
DROP TABLE IF EXISTS `cms_deal_category`;
CREATE TABLE `cms_deal_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `brief` text,
  `pid` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk;
INSERT INTO `cms_deal_category` VALUES ('1','食品','','0','0','1','1');
INSERT INTO `cms_deal_category` VALUES ('2','家居','','0','0','1','2');
DROP TABLE IF EXISTS `cms_deal_coupon`;
CREATE TABLE `cms_deal_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `begin_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `is_valid` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_deal_id` int(11) NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  `supplier_id` int(11) NOT NULL,
  `confirm_account` int(11) NOT NULL DEFAULT '0',
  `is_delete` tinyint(1) NOT NULL,
  `confirm_time` int(11) NOT NULL DEFAULT '0',
  `mail_count` int(11) NOT NULL DEFAULT '0',
  `sms_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unk_sn` (`sn`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=gbk;
INSERT INTO `cms_deal_coupon` VALUES ('12','EASETHINK318215','66633664','1387636699','1419518299','1','38','155','9','9','0','5','0','0','0','0','0');
INSERT INTO `cms_deal_coupon` VALUES ('13','EASETHINK704055','64663139','0','0','1','1','155','9','9','0','5','0','0','0','0','0');
INSERT INTO `cms_deal_coupon` VALUES ('14','SOLDOUT923452','38343732','0','0','1','12','155','81','42','0','5','0','0','0','0','0');
INSERT INTO `cms_deal_coupon` VALUES ('15','EASETHINK965832','33616236','1389970861','1389970861','1','12','155','21','19','1','5','0','0','0','0','0');
INSERT INTO `cms_deal_coupon` VALUES ('24','8zcq5s5b','anyu7n03rc2e','0','0','1','12','155','0','0','0','13','0','0','0','0','0');
INSERT INTO `cms_deal_coupon` VALUES ('18','609683','30356161','1341185971','1341531575','1','12','155','11','11','0','5','0','0','0','0','0');
INSERT INTO `cms_deal_coupon` VALUES ('23','8tvsb5h','125c4yb5sm07','0','0','1','12','155','82','43','0','13','0','0','0','0','0');
INSERT INTO `cms_deal_coupon` VALUES ('20','266195','34376537','1341185971','1341531575','1','13','155','22','20','0','5','0','0','0','0','0');
INSERT INTO `cms_deal_coupon` VALUES ('21','410363','32316366','1343328441','1343414837','1','13','155','23','21','1','5','0','0','0','0','0');
INSERT INTO `cms_deal_coupon` VALUES ('22','137161','38363363','1343328441','1343414837','1','13','155','24','22','0','5','0','0','0','0','0');
INSERT INTO `cms_deal_coupon` VALUES ('26','ydr98vbg','coqbo9303kz8','0','0','1','13','155','0','0','0','13','0','0','0','0','0');
INSERT INTO `cms_deal_coupon` VALUES ('28','7zz9zrum','2xrgbhbg5vov','1351779030','1351779030','1','29','155','0','0','0','13','0','0','0','0','0');
INSERT INTO `cms_deal_coupon` VALUES ('32','vwzw3c5c','i1sek15vyx5','1350540813','1351059213','0','0','157','0','0','0','14','0','0','0','0','0');
INSERT INTO `cms_deal_coupon` VALUES ('33','699dnl5','xw5zxpj766po','1350540813','1351059213','0','0','157','0','0','0','14','0','0','0','0','0');
INSERT INTO `cms_deal_coupon` VALUES ('34','kucpnup7','brhf4oway7n4','1350540813','1351059213','0','0','157','0','0','0','14','0','0','0','0','0');
INSERT INTO `cms_deal_coupon` VALUES ('35','be0r7xni','1sstn7d0k1n','1350540813','1351059213','0','0','157','0','0','0','14','0','0','0','0','0');
INSERT INTO `cms_deal_coupon` VALUES ('36','f68udc1','izvdfken2a9m','0','0','1','12','155','83','44','0','13','0','0','0','0','0');
INSERT INTO `cms_deal_coupon` VALUES ('37','3kcxmlsa','xh4961bd3mvq','1350540813','1351059213','0','0','157','0','0','0','14','0','0','0','0','0');
DROP TABLE IF EXISTS `cms_deal_imgs`;
CREATE TABLE `cms_deal_imgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `sort` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=286 DEFAULT CHARSET=gbk;
INSERT INTO `cms_deal_imgs` VALUES ('1','','19','0');
INSERT INTO `cms_deal_imgs` VALUES ('2','','20','0');
INSERT INTO `cms_deal_imgs` VALUES ('3','','20','1');
INSERT INTO `cms_deal_imgs` VALUES ('4','60986c97ff7a2ed2f7988e801cfd2b32.jpg','23','0');
INSERT INTO `cms_deal_imgs` VALUES ('5','0635ac333f15c4122586a6ce4a0693a4.jpg','23','1');
INSERT INTO `cms_deal_imgs` VALUES ('6','b140f41b88e47e2de3f7e7bdab06e11d.jpg','24','0');
INSERT INTO `cms_deal_imgs` VALUES ('7','fa6ce5c909c6cb77fe988e00078e986b.jpg','24','1');
INSERT INTO `cms_deal_imgs` VALUES ('8','347c373e53fb72dff4048b245f9c2e3b.jpg','24','2');
INSERT INTO `cms_deal_imgs` VALUES ('9','5f9db5effaed620eb3afa28fc09baeab.jpg','25','0');
INSERT INTO `cms_deal_imgs` VALUES ('10','de0a5a75037f50e885459ba3021b919d.jpg','25','1');
INSERT INTO `cms_deal_imgs` VALUES ('11','138bf471b703dffb3542063c449df94e.jpg','26','0');
INSERT INTO `cms_deal_imgs` VALUES ('12','15527b14a9922a15aa7b3e2609593996.jpg','27','0');
INSERT INTO `cms_deal_imgs` VALUES ('13','ef0d64df90a73bba38dc68897c127555.jpg','27','1');
INSERT INTO `cms_deal_imgs` VALUES ('14','953a090b9aefffbdafe2889a93459e5d.jpg','27','2');
INSERT INTO `cms_deal_imgs` VALUES ('15','6a3f0ec1bd14e3e38f92782328cc2568.jpg','28','0');
INSERT INTO `cms_deal_imgs` VALUES ('16','3723afd2a96b52cfe7d74bcbd9682f4c.jpg','28','1');
INSERT INTO `cms_deal_imgs` VALUES ('17','e359356341577f00640eb9a1fad52eb5.jpg','29','0');
INSERT INTO `cms_deal_imgs` VALUES ('18','aae197d069cdf71482e0ddf1c54ddc24.jpg','29','1');
INSERT INTO `cms_deal_imgs` VALUES ('19','1589b24a6fb4dd1da93a5ac7c4ea33e2.jpg','30','0');
INSERT INTO `cms_deal_imgs` VALUES ('20','90a5de8d7c9696651b1a20c3a151b004.jpg','31','0');
INSERT INTO `cms_deal_imgs` VALUES ('21','9cfd7d312cdf6cf0476a72b3f05605eb.jpg','32','0');
INSERT INTO `cms_deal_imgs` VALUES ('22','9acdf0d4a35f9687df02e0dd7dc0e163.jpg','33','0');
INSERT INTO `cms_deal_imgs` VALUES ('23','a14e0e7711774c0e40eaed78d86c8360.jpg','34','0');
INSERT INTO `cms_deal_imgs` VALUES ('24','0b00e05bd047814d5ff1e8eecdcb5e62.jpg','35','0');
INSERT INTO `cms_deal_imgs` VALUES ('25','0cbe45cd325ca35d9c04c6e0866509bc.jpg','35','1');
INSERT INTO `cms_deal_imgs` VALUES ('26','61ec734c5b2f18097fcdd3bb64dbc1df.jpg','36','0');
INSERT INTO `cms_deal_imgs` VALUES ('27','4639570445654cac0318bf78d60b02b6.jpg','37','0');
INSERT INTO `cms_deal_imgs` VALUES ('28','05fc7ab2a50cd1a0ca8f8776c2fdae9c.jpg','37','1');
INSERT INTO `cms_deal_imgs` VALUES ('29','3a9872c6bc48ab1dd1f07e46fb018511.jpg','38','0');
INSERT INTO `cms_deal_imgs` VALUES ('30','d804593e65a22d2b5d8558071825c684.jpg','38','1');
INSERT INTO `cms_deal_imgs` VALUES ('31','667908e6d71827927e8f056d95ee9919.jpg','39','0');
INSERT INTO `cms_deal_imgs` VALUES ('32','a45c72328cf314eaf4593f96eac9a5da.jpg','39','1');
INSERT INTO `cms_deal_imgs` VALUES ('33','2518c4d6800c90e6e18c34a1cef8ab01.gif','40','0');
INSERT INTO `cms_deal_imgs` VALUES ('34','c4f06e275a7e50cf91a1657aecf99d74.jpg','40','1');
INSERT INTO `cms_deal_imgs` VALUES ('35','84aededba2f10955b6a5955531795457.jpg','40','2');
INSERT INTO `cms_deal_imgs` VALUES ('36','85fe66b7511f281e51358e4d49cf1843.jpg','41','0');
INSERT INTO `cms_deal_imgs` VALUES ('37','b213a419dbc3aabd2b21c84dff5108da.jpg','42','0');
INSERT INTO `cms_deal_imgs` VALUES ('38','aac0d9444423b9c5b0cded5e5bd9c3f5.jpg','42','1');
INSERT INTO `cms_deal_imgs` VALUES ('39','84e185580dcd14fe2414fd6de640573a.jpg','43','0');
INSERT INTO `cms_deal_imgs` VALUES ('40','2174f62e0464ee41becaf3308e867d58.jpg','44','0');
INSERT INTO `cms_deal_imgs` VALUES ('41','15eae2284bf415a4a7fdc186e2a5a853.jpg','45','0');
INSERT INTO `cms_deal_imgs` VALUES ('42','3a22fd6dd5828a4a01510cbcea3f8835.jpg','45','1');
INSERT INTO `cms_deal_imgs` VALUES ('43','23d51d3a6b722fa24b40df508c7c8955.jpg','46','0');
INSERT INTO `cms_deal_imgs` VALUES ('44','f4f85e2a3e5161887bc88d1e6bef76d9.jpg','46','1');
INSERT INTO `cms_deal_imgs` VALUES ('45','bbd22cedf4558651f027fc5df50fbf2d.jpg','47','0');
INSERT INTO `cms_deal_imgs` VALUES ('46','4846ebdc2dc5998e138c26415c8a5a65.jpg','47','1');
INSERT INTO `cms_deal_imgs` VALUES ('47','1e4542498478943c2406031df5d3c023.jpg','48','0');
INSERT INTO `cms_deal_imgs` VALUES ('48','f98e78861b3ff03e8ca6c38a3ed13422.jpg','49','0');
INSERT INTO `cms_deal_imgs` VALUES ('49','925979d8b63449832aaebfc10a2c56e9.jpg','49','1');
INSERT INTO `cms_deal_imgs` VALUES ('50','d66b92fa2ab286dbc24b4bcc804c4b46.jpg','50','0');
INSERT INTO `cms_deal_imgs` VALUES ('51','8adefd4e3ead62b7b6e225df3405c8de.jpg','50','1');
INSERT INTO `cms_deal_imgs` VALUES ('52','c30dbc9c989e7ab7ddc1cc2d7f4d1036.jpg','51','0');
INSERT INTO `cms_deal_imgs` VALUES ('53','bce453cc0842ce1e5986cc8f1899d167.jpg','51','1');
INSERT INTO `cms_deal_imgs` VALUES ('54','2703533eb2023b557bcbc3f0bccf3917.jpg','52','0');
INSERT INTO `cms_deal_imgs` VALUES ('55','c65add7eca085ec7b69244298751ee82.jpg','52','1');
INSERT INTO `cms_deal_imgs` VALUES ('56','9eb9b947906c6350957b63e1b8dadc86.jpg','53','0');
INSERT INTO `cms_deal_imgs` VALUES ('57','','54','0');
INSERT INTO `cms_deal_imgs` VALUES ('58','67f6bb16036eeb431864595e193a6b64.jpg','55','0');
INSERT INTO `cms_deal_imgs` VALUES ('59','979acf89a8ffcbe10e28c5a73e040717.jpg','55','1');
INSERT INTO `cms_deal_imgs` VALUES ('60','f5e3075affe4102a0035d96e718c3f02.jpg','56','0');
INSERT INTO `cms_deal_imgs` VALUES ('61','02f7a3f2614a779e0fcbd3034175df39.jpg','56','1');
INSERT INTO `cms_deal_imgs` VALUES ('62','67a30f5d47e3c2995c7db81e4245a7f6.jpg','57','0');
INSERT INTO `cms_deal_imgs` VALUES ('63','673cc4307754a810f0628e36f8801712.jpg','57','1');
INSERT INTO `cms_deal_imgs` VALUES ('64','83d6bbfad98aea27a7985c482946f24a.jpg','58','0');
INSERT INTO `cms_deal_imgs` VALUES ('65','c9ee71a31c4a052fe5df7359997c616f.jpg','59','0');
INSERT INTO `cms_deal_imgs` VALUES ('66','fd3a7e5b53887767d33f05b265f621f7.jpg','59','1');
INSERT INTO `cms_deal_imgs` VALUES ('67','537fe366062dcd77982effc3576a7a61.jpg','60','0');
INSERT INTO `cms_deal_imgs` VALUES ('68','2eae532a485fc5a3e9a754c31be8582f.jpg','60','1');
INSERT INTO `cms_deal_imgs` VALUES ('69','0af7661fb9bdc355b5f5a760514677f7.jpg','61','0');
INSERT INTO `cms_deal_imgs` VALUES ('70','b1a69f99ac5143f51465fb9bcbf72f7e.jpg','62','0');
INSERT INTO `cms_deal_imgs` VALUES ('71','da01a35e76113179248b190d72a2ec1b.jpg','62','1');
INSERT INTO `cms_deal_imgs` VALUES ('72','9513c8da2a6f64ea69a02f42dafecf2e.jpg','63','0');
INSERT INTO `cms_deal_imgs` VALUES ('73','48047700e8b0a3e58fcc091339110d00.jpg','63','1');
INSERT INTO `cms_deal_imgs` VALUES ('74','70e587f9d0ccc513524674e27d5abefd.jpg','64','0');
INSERT INTO `cms_deal_imgs` VALUES ('75','36807c72aa94b158ad8da8ca5de9c395.jpg','65','0');
INSERT INTO `cms_deal_imgs` VALUES ('76','5102084ac70450f2bf17b462adfb3678.jpg','65','1');
INSERT INTO `cms_deal_imgs` VALUES ('77','891e3bb2c0ffa826863dfff4450f84f3.jpg','66','0');
INSERT INTO `cms_deal_imgs` VALUES ('78','6d0fca657310127ef29133f05f72f7a3.jpg','67','0');
INSERT INTO `cms_deal_imgs` VALUES ('79','7db8e8b4a0020920cea62a9d86c2a029.jpg','67','1');
INSERT INTO `cms_deal_imgs` VALUES ('80','','68','0');
INSERT INTO `cms_deal_imgs` VALUES ('81','','69','0');
INSERT INTO `cms_deal_imgs` VALUES ('82','8f854bfad9c4cfd4128251cd4de3b82b.jpg','70','0');
INSERT INTO `cms_deal_imgs` VALUES ('83','794a1ce27be06a5a5405472e6acf672f.jpg','71','0');
INSERT INTO `cms_deal_imgs` VALUES ('84','cac37093a0de9b92f3c709e3ae9a6ce2.jpg','71','1');
INSERT INTO `cms_deal_imgs` VALUES ('85','458f93d65946583231784bbe298b023d.jpg','72','0');
INSERT INTO `cms_deal_imgs` VALUES ('86','','73','0');
INSERT INTO `cms_deal_imgs` VALUES ('87','f953fcd814747dde9081ff0f365cf0cf.jpg','74','0');
INSERT INTO `cms_deal_imgs` VALUES ('88','aa864dc369eac30802878bf6e7c12596.jpg','74','1');
INSERT INTO `cms_deal_imgs` VALUES ('89','0775f983de34d769d6c64cd23360a10a.jpg','75','0');
INSERT INTO `cms_deal_imgs` VALUES ('90','d750434adfaeb2010965d150c9dae115.jpg','75','1');
INSERT INTO `cms_deal_imgs` VALUES ('91','b96422ec515456b352fca6b5ba3335e7.jpg','76','0');
INSERT INTO `cms_deal_imgs` VALUES ('92','6c7449ccfa95350d34a452507c59bb4c.jpg','77','0');
INSERT INTO `cms_deal_imgs` VALUES ('93','38f0244ef82740ea7e37c2f8dfb2d80f.jpg','77','1');
INSERT INTO `cms_deal_imgs` VALUES ('94','','77','2');
INSERT INTO `cms_deal_imgs` VALUES ('95','','78','0');
INSERT INTO `cms_deal_imgs` VALUES ('96','','79','0');
INSERT INTO `cms_deal_imgs` VALUES ('97','','80','0');
INSERT INTO `cms_deal_imgs` VALUES ('98','f3ba937685f0a9a8579ea4329ee8c60c.jpg','81','0');
INSERT INTO `cms_deal_imgs` VALUES ('99','36d37bc7053bdb4ef4bf2b42bf755a3e.jpg','81','1');
INSERT INTO `cms_deal_imgs` VALUES ('100','8be08b3af8ade45fbd8562a8458e8198.jpg','82','0');
INSERT INTO `cms_deal_imgs` VALUES ('101','e055b52bec9301f92afd0885771a8d5d.jpg','82','1');
INSERT INTO `cms_deal_imgs` VALUES ('102','cf0bedc3eadc2c1a2a757f994db3b0b3.jpg','84','0');
INSERT INTO `cms_deal_imgs` VALUES ('103','8a5da30cfdda82f32594dc32d2e2cef4.jpg','84','1');
INSERT INTO `cms_deal_imgs` VALUES ('104','70203a5208dae24373f00decca1d9b15.jpg','85','0');
INSERT INTO `cms_deal_imgs` VALUES ('105','a6e9203111fe14aa0382bcc327d4bd70.jpg','85','1');
INSERT INTO `cms_deal_imgs` VALUES ('106','a360422d5b3c0e3ff85ad9b697e64ae9.jpg','86','0');
INSERT INTO `cms_deal_imgs` VALUES ('107','07fe13ea92ee06a694102433f57dbc55.jpg','86','1');
INSERT INTO `cms_deal_imgs` VALUES ('108','4916c479f3034dfc71690995b384aae2.jpg','87','0');
INSERT INTO `cms_deal_imgs` VALUES ('109','c0459f6c246229b764483ec1c75fac21.jpg','87','1');
INSERT INTO `cms_deal_imgs` VALUES ('110','','88','0');
INSERT INTO `cms_deal_imgs` VALUES ('111','287b38ebd666b1fba598a937a905b8c1.jpg','89','0');
INSERT INTO `cms_deal_imgs` VALUES ('112','cfa74e4e5aaf62e326672ce12115f6f3.jpg','89','1');
INSERT INTO `cms_deal_imgs` VALUES ('113','39ea771799615250015c7f7b42c8a8d0.jpg','90','0');
INSERT INTO `cms_deal_imgs` VALUES ('114','312b94e1856069fc48ac2e6beebf8865.jpg','90','1');
INSERT INTO `cms_deal_imgs` VALUES ('115','74ed1b3ba2a4f830f5caa023e23b147b.jpg','90','2');
INSERT INTO `cms_deal_imgs` VALUES ('116','ee956cd8695f69ae900ceb1149e0e8c5.jpg','90','3');
INSERT INTO `cms_deal_imgs` VALUES ('117','f16f47f498bab7215f6d7632e9cbe4bb.jpg','90','4');
INSERT INTO `cms_deal_imgs` VALUES ('118','ee3df9ef789c0eab7faafd33ee0f1e37.jpg','91','0');
INSERT INTO `cms_deal_imgs` VALUES ('119','6bab429599eaab8c2494afde3479127d.jpg','91','1');
INSERT INTO `cms_deal_imgs` VALUES ('120','769c7245e56f4012c6112358759d29eb.jpg','92','0');
INSERT INTO `cms_deal_imgs` VALUES ('121','2f60bba44e7694168ef12d03346e3e46.jpg','92','1');
INSERT INTO `cms_deal_imgs` VALUES ('122','','93','0');
INSERT INTO `cms_deal_imgs` VALUES ('123','05d84f4785473d6bda5689b96f092fd3.jpg','94','0');
INSERT INTO `cms_deal_imgs` VALUES ('124','7e1c847bc86e2f36934d0f2d990c91a9.jpg','94','1');
INSERT INTO `cms_deal_imgs` VALUES ('125','74f064a461b6f51725da2c0059befeb5.jpg','105','0');
INSERT INTO `cms_deal_imgs` VALUES ('126','719b98ecd88ca253e5ffd29a36fa4fb6.jpg','106','0');
INSERT INTO `cms_deal_imgs` VALUES ('127','28644adce19792f0d1be8947bf220f4a.jpg','107','0');
INSERT INTO `cms_deal_imgs` VALUES ('128','4816e5f5474dfb5bbff5094e2f92922c.jpg','108','0');
INSERT INTO `cms_deal_imgs` VALUES ('129','2a8cbf32f78459f344770d7c4d43b37d.jpg','109','0');
INSERT INTO `cms_deal_imgs` VALUES ('130','511a2727d7234190f387c96568099500.jpg','110','0');
INSERT INTO `cms_deal_imgs` VALUES ('131','0d3645aaef4a1394646b60aac214095d.jpg','111','0');
INSERT INTO `cms_deal_imgs` VALUES ('132','d4988b680f21feaecd185829502f6b05.jpg','112','0');
INSERT INTO `cms_deal_imgs` VALUES ('133','9bf62f8d8090405d22448d748a6f3196.jpg','112','1');
INSERT INTO `cms_deal_imgs` VALUES ('134','dc64f1655fd2490a9e7f5309e35ad75a.jpg','113','0');
INSERT INTO `cms_deal_imgs` VALUES ('135','c71c6e3bd6f6041c4ad5590daf491174.jpg','114','0');
INSERT INTO `cms_deal_imgs` VALUES ('136','bc64a23beb621dc5a72e38bac10d602f.jpg','114','1');
INSERT INTO `cms_deal_imgs` VALUES ('137','c27d1eb1d32ea57c5bcb7d5fae86ed40.jpg','115','0');
INSERT INTO `cms_deal_imgs` VALUES ('138','4802084624afd6e32632ba23b85f8060.jpg','116','0');
INSERT INTO `cms_deal_imgs` VALUES ('139','2902b155e5a071dfb1f92a0dbf3dae73.jpg','116','1');
INSERT INTO `cms_deal_imgs` VALUES ('140','b95679cdc50bb072bb4e8b0a73a3a70a.jpg','117','0');
INSERT INTO `cms_deal_imgs` VALUES ('141','6da6bcf9f91097431d5c74c7eea3a3ff.jpg','117','1');
INSERT INTO `cms_deal_imgs` VALUES ('142','9f6db2fa5a27ae2fa6998351b2c2bd13.jpg','118','0');
INSERT INTO `cms_deal_imgs` VALUES ('143','33cb0df26d68a553f6fa3e1470ad7591.jpg','119','0');
INSERT INTO `cms_deal_imgs` VALUES ('144','674027e0f032bc8cc85ba230e81a0051.jpg','119','1');
INSERT INTO `cms_deal_imgs` VALUES ('145','91f2c3257e9124fdb177a691aae2108f.jpg','122','0');
INSERT INTO `cms_deal_imgs` VALUES ('146','54ac49722b1252186e765691c7f413f3.jpg','122','1');
INSERT INTO `cms_deal_imgs` VALUES ('147','ccd006b354f095d08e9f883b0445ff06.jpg','122','2');
INSERT INTO `cms_deal_imgs` VALUES ('148','813f2adf13d8157e27e9fed91cb81cfe.jpg','123','0');
INSERT INTO `cms_deal_imgs` VALUES ('149','363a95986012a5d8f3b0aea081d526a1.jpg','123','1');
INSERT INTO `cms_deal_imgs` VALUES ('150','10262774fe30e6d8dfad01a10a3abe09.jpg','125','0');
INSERT INTO `cms_deal_imgs` VALUES ('151','53529939241d09044ce4084235343af8.jpg','125','1');
INSERT INTO `cms_deal_imgs` VALUES ('152','b8bfe4d8983850273f193e9d3c58e291.jpg','125','2');
INSERT INTO `cms_deal_imgs` VALUES ('153','90d64d98f042111aa9d8fbddc726cbf7.jpg','132','0');
INSERT INTO `cms_deal_imgs` VALUES ('154','642de21f7969b9e7bf0c020f12b6f078.jpg','132','1');
INSERT INTO `cms_deal_imgs` VALUES ('155','e37a10e49d3cc35be9aa02a6bbbfd409.jpg','133','0');
INSERT INTO `cms_deal_imgs` VALUES ('156','97fbe9ee5d96bb14ac759d748e3daf7c.jpg','133','1');
INSERT INTO `cms_deal_imgs` VALUES ('157','af56277b70ff4b451df6db3eb37e6bbd.jpg','136','0');
INSERT INTO `cms_deal_imgs` VALUES ('158','9f7c415c1e900290007dbf47bdf262bf.jpg','136','1');
INSERT INTO `cms_deal_imgs` VALUES ('159','93d991cfd4b2aa5e77f8bc37f014329f.jpg','137','0');
INSERT INTO `cms_deal_imgs` VALUES ('160','f98eb8753111a1c2e4cac2af7aebc1a4.jpg','137','1');
INSERT INTO `cms_deal_imgs` VALUES ('161','9c1a1817a1259b7737a4233c95ac9ea6.jpg','137','2');
INSERT INTO `cms_deal_imgs` VALUES ('162','d830ac024130c4e4e36ac89312412691.jpg','137','3');
INSERT INTO `cms_deal_imgs` VALUES ('163','49534eae7b02ea32cddf9bb716f24b26.jpg','137','4');
INSERT INTO `cms_deal_imgs` VALUES ('164','fdebaf7d06c1622e894d6515b8cf44de.jpg','138','0');
INSERT INTO `cms_deal_imgs` VALUES ('165','11e73acd8b9216dba438fb8465657270.jpg','138','1');
INSERT INTO `cms_deal_imgs` VALUES ('166','d6d8beb6dd2efc3cf30804e5bd2145e1.jpg','138','2');
INSERT INTO `cms_deal_imgs` VALUES ('168','c2c8ebae23a98f9404731967618c0e09.jpg','138','3');
INSERT INTO `cms_deal_imgs` VALUES ('169','dc5d00e09d3f8b0ba75d0ab523af68cf.jpg','138','4');
INSERT INTO `cms_deal_imgs` VALUES ('170','8354892bd272c74ecc329a8d4cb368e3.jpg','156','0');
INSERT INTO `cms_deal_imgs` VALUES ('171','bf09a4c312b8631f8a21b943b16caf89.jpg','156','1');
INSERT INTO `cms_deal_imgs` VALUES ('172','368e80ebf95094a2654daeacd4d04e58.jpg','157','0');
INSERT INTO `cms_deal_imgs` VALUES ('173','575b7b9f7f3570e1fa5b3ce11b03c032.jpg','157','1');
INSERT INTO `cms_deal_imgs` VALUES ('174','8917d3ca6718521f64b199ff752eb545.jpg','157','2');
INSERT INTO `cms_deal_imgs` VALUES ('175','58d64b6e1d5d31e4ccf17d61127e9841.jpg','157','3');
INSERT INTO `cms_deal_imgs` VALUES ('176','1143131263c8a082ab73bb4578e9a564.jpg','157','4');
INSERT INTO `cms_deal_imgs` VALUES ('177','236e3c19b1a8cb62b19581b407075f6a.jpg','11','0');
INSERT INTO `cms_deal_imgs` VALUES ('178','4262fea81dd27385fdae712cf1c62195.jpg','11','1');
INSERT INTO `cms_deal_imgs` VALUES ('179','fb2c1dc45e2adb3ebb1b27026019130f.jpg','11','2');
INSERT INTO `cms_deal_imgs` VALUES ('180','363038be65e39ece24610d3999bf7d98.jpg','11','3');
INSERT INTO `cms_deal_imgs` VALUES ('181','d368353cb3fd6e2aa3db772aa7b3eccb.jpg','11','4');
INSERT INTO `cms_deal_imgs` VALUES ('182','448c631d4feee4aa3f54581e6ae1e2cc.jpg','158','0');
INSERT INTO `cms_deal_imgs` VALUES ('183','b9e5185439f0070217280c31278bc21e.jpg','158','1');
INSERT INTO `cms_deal_imgs` VALUES ('184','a4ebd22d6585bb8cf3687e324af60055.jpg','160','0');
INSERT INTO `cms_deal_imgs` VALUES ('185','069921281c66002eddb8704d8a369ee8.jpg','156','2');
INSERT INTO `cms_deal_imgs` VALUES ('186','0f0fd1c43d1365116a943c70a1e8a5cc.jpg','156','3');
INSERT INTO `cms_deal_imgs` VALUES ('187','9decc21b773ed99d6cdabef69e3b970e.jpg','161','0');
INSERT INTO `cms_deal_imgs` VALUES ('188','1f7692e7ea215d24972739eae925974e.jpg','161','1');
INSERT INTO `cms_deal_imgs` VALUES ('189','5a893b92a5ae472cb5f9d74966a0c329.jpg','160','1');
INSERT INTO `cms_deal_imgs` VALUES ('190','6a71d8f1f452ff35e083bb170b4dc685.jpg','156','4');
INSERT INTO `cms_deal_imgs` VALUES ('191','bddfe1060921974b0411026690b1c037.jpg','163','4');
INSERT INTO `cms_deal_imgs` VALUES ('192','11d9f65a9257febc36ae94210aa178cb.jpg','163','1');
INSERT INTO `cms_deal_imgs` VALUES ('193','c87bfb1a70119d6770dc9533ee146226.jpg','163','0');
INSERT INTO `cms_deal_imgs` VALUES ('194','7770f1cbe4b5b02569d1abdf79c00286.jpg','163','2');
INSERT INTO `cms_deal_imgs` VALUES ('195','aeea01ed0b71bf12beff403e998964ed.jpg','163','3');
INSERT INTO `cms_deal_imgs` VALUES ('196','74e7e315a6cb4d062ad1bb4890fee24b.jpg','171','0');
INSERT INTO `cms_deal_imgs` VALUES ('197','3f8d872bfd590fced4e94faa429d42c2.jpg','171','1');
INSERT INTO `cms_deal_imgs` VALUES ('198','73d8e1777c075781b0a8ede61d99c5d5.jpg','173','0');
INSERT INTO `cms_deal_imgs` VALUES ('199','6e59b299f56e78cfb54be06083bb4ba0.jpg','173','1');
INSERT INTO `cms_deal_imgs` VALUES ('200','e51d944ec3001446173e8237fae7c1db.jpg','173','2');
INSERT INTO `cms_deal_imgs` VALUES ('201','a6f40eccea812986933f59a5eea658c1.jpg','171','2');
INSERT INTO `cms_deal_imgs` VALUES ('202','fa74e165f187a736e537760e5a7ed60f.jpg','171','3');
INSERT INTO `cms_deal_imgs` VALUES ('203','d8e1f33cdf84e86044d4a99c3285e1a2.jpg','171','4');
INSERT INTO `cms_deal_imgs` VALUES ('204','c81b89301451dc9e8bb8253cd0048e2b.jpg','173','3');
INSERT INTO `cms_deal_imgs` VALUES ('205','c02f7d0dd7366953f87ec4f3d2e141ea.jpg','173','4');
INSERT INTO `cms_deal_imgs` VALUES ('206','f1fba7b881a49f8516e5b2d339fd1e7a.jpg','168','0');
INSERT INTO `cms_deal_imgs` VALUES ('207','37ce4d1e108b57648cbe3789309d8441.jpg','168','1');
INSERT INTO `cms_deal_imgs` VALUES ('208','7b15d44649357b9d172cc41df8ba0ba3.jpg','168','2');
INSERT INTO `cms_deal_imgs` VALUES ('209','103322042046d76f6f8629c83a5069f8.jpg','168','3');
INSERT INTO `cms_deal_imgs` VALUES ('210','56f6daa9e85046a2cb4dceee4278bf72.jpg','168','4');
INSERT INTO `cms_deal_imgs` VALUES ('211','68e283d934cdf67a93efa5e364520694.jpg','164','0');
INSERT INTO `cms_deal_imgs` VALUES ('212','2721e4ad8aee85eb6eac65698c346179.jpg','164','1');
INSERT INTO `cms_deal_imgs` VALUES ('213','e4f0187811a3ef66f06774642a4c980d.jpg','164','2');
INSERT INTO `cms_deal_imgs` VALUES ('214','453b534e13ac39311afb9ccbeb368b07.jpg','164','3');
INSERT INTO `cms_deal_imgs` VALUES ('215','14acff589a3f8c9a8b865498fa2c6919.jpg','166','0');
INSERT INTO `cms_deal_imgs` VALUES ('216','5c566dedea07f5aa348d31cbc3309844.jpg','166','1');
INSERT INTO `cms_deal_imgs` VALUES ('217','16d0f08544395aef83a2ef842e0434b7.jpg','166','2');
INSERT INTO `cms_deal_imgs` VALUES ('218','f7643463245c83ae2bc4d3c20e6cfdc2.jpg','166','3');
INSERT INTO `cms_deal_imgs` VALUES ('219','8da248ed9423e423f928b47b3acb3189.jpg','166','4');
INSERT INTO `cms_deal_imgs` VALUES ('220','ca90e0ec5d9afc069fc6943dcd4b0aab.jpg','176','0');
INSERT INTO `cms_deal_imgs` VALUES ('221','c509b09363a61b49c65589026ce3d768.jpg','176','1');
INSERT INTO `cms_deal_imgs` VALUES ('222','55c45b525403e9dd2c60e3a45ef4df4b.jpg','176','2');
INSERT INTO `cms_deal_imgs` VALUES ('223','0cd4748ca1ad0cea41b4247d4e298885.jpg','177','0');
INSERT INTO `cms_deal_imgs` VALUES ('224','ff827e7a2fba5ad39439e7ae3e819a63.jpg','177','1');
INSERT INTO `cms_deal_imgs` VALUES ('225','86d7ec853c4ec455a65e462d5f2a1e48.jpg','177','3');
INSERT INTO `cms_deal_imgs` VALUES ('226','abf68a2ce0ee9431156d8ac49b261d63.jpg','178','0');
INSERT INTO `cms_deal_imgs` VALUES ('227','c49dcb93ac8bae30b6dab5ce961a0540.jpg','178','1');
INSERT INTO `cms_deal_imgs` VALUES ('228','354ae9639a42f90b44a17e347d33320d.jpg','178','4');
INSERT INTO `cms_deal_imgs` VALUES ('229','76ce1a17dd1d8334f28b4322d8b66733.jpg','179','0');
INSERT INTO `cms_deal_imgs` VALUES ('230','6ebc603c3baa070d6e303d667a87e346.jpg','179','1');
INSERT INTO `cms_deal_imgs` VALUES ('231','b3a8ff971305d24c63f80db17532c584.jpg','180','0');
INSERT INTO `cms_deal_imgs` VALUES ('232','e10aedd6f8553dbc040a351f4ef71c4d.jpg','180','1');
INSERT INTO `cms_deal_imgs` VALUES ('233','46dfdd217e167dc664d0f45733c63913.jpg','181','0');
INSERT INTO `cms_deal_imgs` VALUES ('234','2b9478e63ab7e71a46ca626722caeb16.jpg','181','1');
INSERT INTO `cms_deal_imgs` VALUES ('235','e2d645fc5e37d7b6024242d1e213c1ec.jpg','181','2');
INSERT INTO `cms_deal_imgs` VALUES ('236','f21c768db9af96499938a144a792c605.jpg','182','0');
INSERT INTO `cms_deal_imgs` VALUES ('237','019bf8d0dc3496e314992e73e4a6f091.jpg','182','1');
INSERT INTO `cms_deal_imgs` VALUES ('238','0fc34ee93aa747a045192d96a6eff04e.jpg','183','0');
INSERT INTO `cms_deal_imgs` VALUES ('239','2ce5d8e6c7eb8d1d9740060a5efe25a8.jpg','183','1');
INSERT INTO `cms_deal_imgs` VALUES ('240','c6081c3f05b96c5799a4ce79e3bf0d77.jpg','183','2');
INSERT INTO `cms_deal_imgs` VALUES ('241','6a38695eed0c0eef8a33433bd62c07ac.jpg','184','0');
INSERT INTO `cms_deal_imgs` VALUES ('242','cf5e15a8226dab83399b38feef0e3a02.jpg','184','1');
INSERT INTO `cms_deal_imgs` VALUES ('243','2c11e3c3c25394b04b9d4b17d8050cb7.jpg','184','2');
INSERT INTO `cms_deal_imgs` VALUES ('244','e8d0cf2b538e10cf850809df2928d387.jpg','185','0');
INSERT INTO `cms_deal_imgs` VALUES ('245','ae65817ea007597f131976425ff81be8.jpg','185','1');
INSERT INTO `cms_deal_imgs` VALUES ('246','3449b83b54d803ce7a21d0d27a4894a4.jpg','186','0');
INSERT INTO `cms_deal_imgs` VALUES ('247','2c9d7480ca94368f88b3fe0e3143d6e3.jpg','186','2');
INSERT INTO `cms_deal_imgs` VALUES ('248','4b028dba2620ca3d906efa62793f584a.jpg','186','4');
INSERT INTO `cms_deal_imgs` VALUES ('249','d6b0a6600baf7ea0180282bd7bfa6c73.jpg','187','0');
INSERT INTO `cms_deal_imgs` VALUES ('250','23c68d70e5a828bf4336dbe9cc729618.jpg','187','1');
INSERT INTO `cms_deal_imgs` VALUES ('251','9cf769123a658b6f9613e57618fa55ec.jpg','187','2');
INSERT INTO `cms_deal_imgs` VALUES ('252','096c0cb9b59abbcbcdd4dc2bff3791bf.jpg','187','4');
INSERT INTO `cms_deal_imgs` VALUES ('253','ea354123e4c2dc5960b100d2c2327f11.jpg','179','3');
INSERT INTO `cms_deal_imgs` VALUES ('254','b8399687518dfc826745d1ef5f384b30.jpg','179','4');
INSERT INTO `cms_deal_imgs` VALUES ('255','08bf1584bfc5475d525644bf1add907b.jpg','179','2');
INSERT INTO `cms_deal_imgs` VALUES ('256','b8eaed5a21589269c3ad431c5488ebba.jpg','169','0');
INSERT INTO `cms_deal_imgs` VALUES ('257','3112ab5e6912000b0347bc855507f07a.jpg','169','1');
INSERT INTO `cms_deal_imgs` VALUES ('258','826de0b232653aaedd4158b89e1eef2b.jpg','1','0');
INSERT INTO `cms_deal_imgs` VALUES ('259','e4634aa6ba80d0cb47ef86ae37f6749e.jpg','1','1');
INSERT INTO `cms_deal_imgs` VALUES ('260','bad0a27471a32c88d2428298c96a17c3.jpg','1','2');
INSERT INTO `cms_deal_imgs` VALUES ('261','921867e6943219673afa2bd853597d17.jpg','1','3');
INSERT INTO `cms_deal_imgs` VALUES ('262','40332aecf6321d333cf07fbd31cb77a8.jpg','1','4');
INSERT INTO `cms_deal_imgs` VALUES ('263','7f56cf5e6ffea5ec21b3de62c7961759.jpg','2','0');
INSERT INTO `cms_deal_imgs` VALUES ('264','e80ace4d1acd5b344a9dd8f9287bde6b.jpg','2','1');
INSERT INTO `cms_deal_imgs` VALUES ('265','aba00406d0aeef71166ba7f2b1206f34.jpg','2','2');
INSERT INTO `cms_deal_imgs` VALUES ('266','3cfd1a96b2967154331ba47985eb0a58.jpg','3','0');
INSERT INTO `cms_deal_imgs` VALUES ('267','1843a559edc312eaaadeb73ced2ff4bb.jpg','3','1');
INSERT INTO `cms_deal_imgs` VALUES ('268','a364ad322ab503655a4177da23ab9a57.jpg','3','2');
INSERT INTO `cms_deal_imgs` VALUES ('269','54c201f49657cc104d89fbe758fc0f70.jpg','3','3');
INSERT INTO `cms_deal_imgs` VALUES ('270','e28d6336d95eb7967bbdc84dbdfbb4f8.jpg','3','4');
INSERT INTO `cms_deal_imgs` VALUES ('271','7681568c0d46384091ec0c46bfb17719.jpg','4','0');
INSERT INTO `cms_deal_imgs` VALUES ('272','4fd8cb43ba999d2205d157f3bfd4c443.jpg','4','1');
INSERT INTO `cms_deal_imgs` VALUES ('273','f61961e8e93bf79a9ec4536d475169f3.jpg','4','2');
INSERT INTO `cms_deal_imgs` VALUES ('274','5f4ae2d357e3ed38ad1f7283e33d6f1e.jpg','4','3');
INSERT INTO `cms_deal_imgs` VALUES ('275','51f5ddf541d6cc131554ce1ec1d73e03.jpg','4','4');
INSERT INTO `cms_deal_imgs` VALUES ('276','5ea522bca7b89b5d98d2fddb73b86065.jpg','5','0');
INSERT INTO `cms_deal_imgs` VALUES ('277','947d7b4e3835943e4f129637df62e13f.jpg','5','1');
INSERT INTO `cms_deal_imgs` VALUES ('278','47d7fbc08735f1d0580e7acf4e18bbf9.jpg','5','2');
INSERT INTO `cms_deal_imgs` VALUES ('279','a17cccc4647d41c747c36aa5ad2c1304.jpg','5','3');
INSERT INTO `cms_deal_imgs` VALUES ('280','2a6b8d8d43a8c740a7a9c6a1a3517b97.jpg','5','4');
INSERT INTO `cms_deal_imgs` VALUES ('281','868325ebc97cbff0ab90d87da38c2ac4.jpg','6','0');
INSERT INTO `cms_deal_imgs` VALUES ('282','c9ba4f00d25d485bdcad8386999332b1.jpg','6','1');
INSERT INTO `cms_deal_imgs` VALUES ('283','bc343d80e393fe590bbbd6aa4545614c.jpg','6','2');
INSERT INTO `cms_deal_imgs` VALUES ('284','33b32692d3d34ce1657ea5f303d5f3ae.jpg','6','3');
INSERT INTO `cms_deal_imgs` VALUES ('285','274dcc913c25a445863c751f18b2b45e.jpg','6','4');
DROP TABLE IF EXISTS `cms_deal_msg_list`;
CREATE TABLE `cms_deal_msg_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dest` varchar(255) NOT NULL,
  `send_type` tinyint(1) NOT NULL,
  `content` text NOT NULL,
  `send_time` int(11) NOT NULL,
  `is_send` tinyint(1) NOT NULL,
  `create_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `result` text,
  `is_success` tinyint(1) NOT NULL DEFAULT '0',
  `is_html` tinyint(1) NOT NULL,
  `title` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
DROP TABLE IF EXISTS `cms_deal_order_item`;
CREATE TABLE `cms_deal_order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `unit_price` double(20,4) NOT NULL,
  `total_price` double(20,4) NOT NULL,
  `delivery_status` tinyint(1) NOT NULL,
  `name` text NOT NULL,
  `return_score` int(11) NOT NULL,
  `return_total_score` int(11) NOT NULL,
  `attr` varchar(255) NOT NULL,
  `verify_code` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `return_money` double(20,4) NOT NULL,
  `return_total_money` double(20,4) NOT NULL,
  `buy_type` tinyint(1) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=gbk;
INSERT INTO `cms_deal_order_item` VALUES ('9','157','2','999.0000','1998.0000','1','??????V1.0?????','10','20','0','72e6f6e0f08ca88f02b1480464afd55b','9','0.0000','0.0000','0','????');
INSERT INTO `cms_deal_order_item` VALUES ('10','157','1','65.0000','65.0000','1','??????????????????100????????????','0','0','0','af641c6a59282d6d76766e6dfa42d113','11','0.0000','0.0000','0','YJ');
INSERT INTO `cms_deal_order_item` VALUES ('11','10','1','0.0000','0.0000','0','abc','0','0','0','b1ec8d6630f87f78c7f88e62b7195bad','11','0.0000','0.0000','0','abc');
INSERT INTO `cms_deal_order_item` VALUES ('12','10','1','0.0000','0.0000','0','abc','0','0','0','b1ec8d6630f87f78c7f88e62b7195bad','13','0.0000','0.0000','0','abc');
INSERT INTO `cms_deal_order_item` VALUES ('13','8','1','0.0000','0.0000','0','????','0','0','0','b22c4b251251b4e4ec75ec0de1bde7d6','15','0.0000','0.0000','0','asdfsadfsa');
INSERT INTO `cms_deal_order_item` VALUES ('14','8','1','0.0000','0.0000','0','????','0','0','0','b22c4b251251b4e4ec75ec0de1bde7d6','16','0.0000','0.0000','0','asdfsadfsa');
INSERT INTO `cms_deal_order_item` VALUES ('15','8','1','0.0000','0.0000','0','????','0','0','0','b22c4b251251b4e4ec75ec0de1bde7d6','17','0.0000','0.0000','0','asdfsadfsa');
INSERT INTO `cms_deal_order_item` VALUES ('16','8','1','0.0000','0.0000','0','????','0','0','0','b22c4b251251b4e4ec75ec0de1bde7d6','18','0.0000','0.0000','0','asdfsadfsa');
INSERT INTO `cms_deal_order_item` VALUES ('17','8','1','0.0000','0.0000','0','????','0','0','0','b22c4b251251b4e4ec75ec0de1bde7d6','19','0.0000','0.0000','0','asdfsadfsa');
INSERT INTO `cms_deal_order_item` VALUES ('18','8','1','0.0000','0.0000','0','????','0','0','0','b22c4b251251b4e4ec75ec0de1bde7d6','20','0.0000','0.0000','0','asdfsadfsa');
INSERT INTO `cms_deal_order_item` VALUES ('19','1','1','999.0000','999.0000','1','??????V1.0?????','10','10','0','72e6f6e0f08ca88f02b1480464afd55b','21','0.0000','0.0000','0','????');
INSERT INTO `cms_deal_order_item` VALUES ('20','10','2','0.0000','0.0000','0','abc','0','0','0','b1ec8d6630f87f78c7f88e62b7195bad','22','0.0000','0.0000','0','abc');
INSERT INTO `cms_deal_order_item` VALUES ('21','11','1','55.0000','55.0000','1','????','40','40','0','aeac628ef298335bf2cb3665ab4af740','23','40.0000','40.0000','0','new');
INSERT INTO `cms_deal_order_item` VALUES ('22','11','1','55.0000','55.0000','1','????','40','40','0','aeac628ef298335bf2cb3665ab4af740','24','40.0000','40.0000','0','new');
INSERT INTO `cms_deal_order_item` VALUES ('31','11','1','55.0000','55.0000','1','????','40','40','0','aeac628ef298335bf2cb3665ab4af740','35','40.0000','40.0000','0','new');
INSERT INTO `cms_deal_order_item` VALUES ('32','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','71','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('33','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','72','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('34','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','73','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('35','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','74','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('36','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','75','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('37','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','76','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('38','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','77','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('39','155','5','8.0000','40.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','78','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('40','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','79','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('41','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','80','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('42','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','81','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('43','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','82','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('44','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','83','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('45','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','84','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('46','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','85','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('47','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','86','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('48','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','87','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('49','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','88','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('50','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','89','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('51','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','90','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('52','169','1','55.0000','55.0000','0','仅售63元！价值78元的火宴山经典自助餐1位','0','0','0','09a08a724fc5c77095f6a700f7e31a4c','90','0.0000','0.0000','0','aaaa');
INSERT INTO `cms_deal_order_item` VALUES ('53','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','91','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('54','169','1','55.0000','55.0000','0','仅售63元！价值78元的火宴山经典自助餐1位','0','0','0','09a08a724fc5c77095f6a700f7e31a4c','92','0.0000','0.0000','0','aaaa');
INSERT INTO `cms_deal_order_item` VALUES ('55','169','1','55.0000','55.0000','0','仅售63元！价值78元的火宴山经典自助餐1位','0','0','0','09a08a724fc5c77095f6a700f7e31a4c','93','0.0000','0.0000','0','aaaa');
INSERT INTO `cms_deal_order_item` VALUES ('56','169','1','55.0000','55.0000','0','仅售63元！价值78元的火宴山经典自助餐1位','0','0','0','09a08a724fc5c77095f6a700f7e31a4c','94','0.0000','0.0000','0','aaaa');
INSERT INTO `cms_deal_order_item` VALUES ('57','169','1','55.0000','55.0000','0','仅售63元！价值78元的火宴山经典自助餐1位','0','0','0','09a08a724fc5c77095f6a700f7e31a4c','95','0.0000','0.0000','0','aaaa');
INSERT INTO `cms_deal_order_item` VALUES ('58','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','96','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('59','169','1','55.0000','55.0000','0','仅售63元！价值78元的火宴山经典自助餐1位','0','0','0','09a08a724fc5c77095f6a700f7e31a4c','97','0.0000','0.0000','0','aaaa');
INSERT INTO `cms_deal_order_item` VALUES ('60','169','1','55.0000','55.0000','0','仅售63元！价值78元的火宴山经典自助餐1位','0','0','0','09a08a724fc5c77095f6a700f7e31a4c','98','0.0000','0.0000','0','aaaa');
INSERT INTO `cms_deal_order_item` VALUES ('61','169','1','55.0000','55.0000','0','仅售63元！价值78元的火宴山经典自助餐1位','0','0','0','09a08a724fc5c77095f6a700f7e31a4c','99','0.0000','0.0000','0','aaaa');
INSERT INTO `cms_deal_order_item` VALUES ('62','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','100','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('63','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','101','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('64','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','102','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('65','155','2','8.0000','16.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','103','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('66','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','104','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('67','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','105','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('68','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','106','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('69','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','107','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('70','155','1','8.0000','8.0000','1','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','108','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('71','155','1','8.0000','8.0000','1','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','109','0.0000','0.0000','0','ddddd');
DROP TABLE IF EXISTS `cms_deal_order_log`;
CREATE TABLE `cms_deal_order_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_info` text NOT NULL,
  `log_time` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `log_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
DROP TABLE IF EXISTS `cms_deal_orders`;
CREATE TABLE `cms_deal_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `pay_status` tinyint(1) NOT NULL,
  `total_price` double(20,4) NOT NULL,
  `pay_amount` double(20,4) NOT NULL,
  `delivery_status` tinyint(1) NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `return_total_score` int(11) NOT NULL,
  `refund_amount` double(20,4) NOT NULL,
  `admin_memo` text NOT NULL,
  `memo` text NOT NULL,
  `region_lv1` int(11) NOT NULL,
  `region_lv2` int(11) NOT NULL,
  `region_lv3` int(11) NOT NULL,
  `region_lv4` int(11) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `consignee` varchar(255) NOT NULL,
  `deal_total_price` double(20,4) NOT NULL,
  `discount_price` double(20,4) NOT NULL,
  `delivery_fee` double(20,4) NOT NULL,
  `ecv_money` double(20,4) NOT NULL,
  `account_money` double(20,4) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `payment_fee` double(20,4) NOT NULL,
  `return_total_money` double(20,4) NOT NULL,
  `extra_status` tinyint(1) NOT NULL,
  `after_sale` tinyint(1) NOT NULL,
  `refund_money` double(20,4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_sn` (`order_sn`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
DROP TABLE IF EXISTS `cms_delivery_area`;
CREATE TABLE `cms_delivery_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '????',
  `level` tinyint(4) NOT NULL COMMENT '1:? 2:? 3:?(?) 4:?(?)',
  `sort` int(11) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=gbk;
INSERT INTO `cms_delivery_area` VALUES ('1','0','北京市','1','1','0');
INSERT INTO `cms_delivery_area` VALUES ('2','0','天津市','1','2','0');
INSERT INTO `cms_delivery_area` VALUES ('3','0','上海市','1','3','0');
INSERT INTO `cms_delivery_area` VALUES ('4','0','广东省','1','4','0');
INSERT INTO `cms_delivery_area` VALUES ('5','1','北京市','2','1','0');
INSERT INTO `cms_delivery_area` VALUES ('6','5','东城区','3','1','0');
INSERT INTO `cms_delivery_area` VALUES ('7','5','西城区','3','2','0');
INSERT INTO `cms_delivery_area` VALUES ('8','5','海淀区','3','3','0');
INSERT INTO `cms_delivery_area` VALUES ('9','5','朝阳区','3','4','0');
INSERT INTO `cms_delivery_area` VALUES ('10','5','崇文区','3','5','0');
INSERT INTO `cms_delivery_area` VALUES ('11','5','宣武区','3','6','0');
INSERT INTO `cms_delivery_area` VALUES ('12','5','丰台区','3','7','0');
INSERT INTO `cms_delivery_area` VALUES ('13','5','石景山区','3','8','0');
INSERT INTO `cms_delivery_area` VALUES ('14','5','房山区','3','9','0');
INSERT INTO `cms_delivery_area` VALUES ('15','5','门头沟区','3','10','0');
INSERT INTO `cms_delivery_area` VALUES ('16','5','通州区','3','11','0');
INSERT INTO `cms_delivery_area` VALUES ('17','5','顺义区','3','12','0');
INSERT INTO `cms_delivery_area` VALUES ('18','5','昌平区','3','13','0');
INSERT INTO `cms_delivery_area` VALUES ('19','5','怀柔区','3','14','0');
INSERT INTO `cms_delivery_area` VALUES ('20','5','平谷区','3','15','0');
INSERT INTO `cms_delivery_area` VALUES ('21','5','大兴区','3','16','0');
INSERT INTO `cms_delivery_area` VALUES ('22','5','密云县','3','17','0');
INSERT INTO `cms_delivery_area` VALUES ('23','5','延庆县','3','18','0');
INSERT INTO `cms_delivery_area` VALUES ('24','4','广州','2','1','0');
INSERT INTO `cms_delivery_area` VALUES ('25','4','深圳','2','2','0');
INSERT INTO `cms_delivery_area` VALUES ('26','4','潮州','2','3','0');
INSERT INTO `cms_delivery_area` VALUES ('27','4','东莞','2','4','0');
INSERT INTO `cms_delivery_area` VALUES ('28','4','佛山','2','5','0');
INSERT INTO `cms_delivery_area` VALUES ('29','4','河源','2','6','0');
INSERT INTO `cms_delivery_area` VALUES ('30','4','惠州','2','7','0');
INSERT INTO `cms_delivery_area` VALUES ('31','4','江门','2','8','0');
INSERT INTO `cms_delivery_area` VALUES ('32','4','揭阳','2','9','0');
INSERT INTO `cms_delivery_area` VALUES ('33','4','茂名','2','10','0');
INSERT INTO `cms_delivery_area` VALUES ('34','4','梅州','2','11','0');
INSERT INTO `cms_delivery_area` VALUES ('35','4','清远','2','12','0');
INSERT INTO `cms_delivery_area` VALUES ('36','4','汕头','2','13','0');
INSERT INTO `cms_delivery_area` VALUES ('37','4','汕尾','2','14','0');
INSERT INTO `cms_delivery_area` VALUES ('38','4','韶关','2','15','0');
INSERT INTO `cms_delivery_area` VALUES ('39','4','阳江','2','16','0');
INSERT INTO `cms_delivery_area` VALUES ('40','4','云浮','2','17','0');
INSERT INTO `cms_delivery_area` VALUES ('41','4','湛江','2','18','0');
INSERT INTO `cms_delivery_area` VALUES ('42','4','肇庆','2','19','0');
INSERT INTO `cms_delivery_area` VALUES ('43','0','安徽省','1','5','0');
INSERT INTO `cms_delivery_area` VALUES ('44','0','福建省','1','6','0');
DROP TABLE IF EXISTS `cms_delivery_fee`;
CREATE TABLE `cms_delivery_fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_id` int(11) NOT NULL,
  `area_ids` text NOT NULL,
  `area_name` text NOT NULL,
  `first_fee` double(20,4) NOT NULL,
  `first_weight` double(20,4) NOT NULL,
  `continue_fee` double(20,4) NOT NULL,
  `continue_weight` double(20,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=gbk;
INSERT INTO `cms_delivery_fee` VALUES ('79','22','1,3407,3408','山西省,太原市1,杏花岭区','2.0000','2.0000','2.0000','2.0000');
INSERT INTO `cms_delivery_fee` VALUES ('72','23','3406,3413','河南省,林州市','3.0000','3.0000','3.0000','2.0000');
INSERT INTO `cms_delivery_fee` VALUES ('73','23','3407','太原市1','2.0000','2.0000','1.0000','1.0000');
INSERT INTO `cms_delivery_fee` VALUES ('78','22','3408,3413','杏花岭区,林州市','1.0000','1.0000','1.0000','1.0000');
INSERT INTO `cms_delivery_fee` VALUES ('66','25','3416','秦皇岛','2.0000','1.0000','1.0000','1.0000');
INSERT INTO `cms_delivery_fee` VALUES ('67','27','3413','林州市','11.0000','11.0000','23.0000','23.0000');
INSERT INTO `cms_delivery_fee` VALUES ('68','27','3408','杏花岭区','34.0000','34.0000','34.0000','34.0000');
INSERT INTO `cms_delivery_fee` VALUES ('82','29','1','山西省','5.0000','4.0000','7.0000','6.0000');
INSERT INTO `cms_delivery_fee` VALUES ('81','29','3408','杏花岭区','2.0000','2.0000','2.0000','2.0000');
INSERT INTO `cms_delivery_fee` VALUES ('80','22','3413,3418','林州市,南昌市','6.0000','5.0000','3.0000','7.0000');
INSERT INTO `cms_delivery_fee` VALUES ('83','29','3413','林州市','34.0000','34.0000','34.0000','34.0000');
DROP TABLE IF EXISTS `cms_delivery_notice`;
CREATE TABLE `cms_delivery_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_sn` varchar(255) NOT NULL,
  `delivery_time` int(11) NOT NULL,
  `is_arrival` tinyint(1) NOT NULL,
  `arrival_time` int(11) NOT NULL,
  `order_item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `memo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=gbk;
INSERT INTO `cms_delivery_notice` VALUES ('1','ABCDE','1289862972','1','1289863012','4','1','????');
INSERT INTO `cms_delivery_notice` VALUES ('2','ABCDE','1289862972','0','0','5','1','????');
INSERT INTO `cms_delivery_notice` VALUES ('3','bbcde','1290014604','0','0','4','1','????????');
INSERT INTO `cms_delivery_notice` VALUES ('4','20101118093651518','1290015411','0','1289863012','10','1','????????');
INSERT INTO `cms_delivery_notice` VALUES ('5','20110911095353198','1315720434','0','0','9','1','');
INSERT INTO `cms_delivery_notice` VALUES ('6','20120331114430598','1333179871','0','0','19','12','');
INSERT INTO `cms_delivery_notice` VALUES ('7','20120726105800128','1343242681','0','0','21','13','');
INSERT INTO `cms_delivery_notice` VALUES ('8','20120726010439455','1343250280','1','0','22','13','');
INSERT INTO `cms_delivery_notice` VALUES ('9','20121124120237939','1353657757','0','0','10','12','asdfasd');
INSERT INTO `cms_delivery_notice` VALUES ('10','20121127085743798','1353992263','0','0','31','12','');
INSERT INTO `cms_delivery_notice` VALUES ('11','20121127090821363','1353992901','0','0','31','12','');
INSERT INTO `cms_delivery_notice` VALUES ('12','20121127095838171','1353995918','1','1380375286','31','12','');
INSERT INTO `cms_delivery_notice` VALUES ('13','20121127102240257','1353997360','1','1380300547','31','12','花样百出');
INSERT INTO `cms_delivery_notice` VALUES ('14','20121127104052180','1353998452','1','0','31','12','');
INSERT INTO `cms_delivery_notice` VALUES ('15','20140305113429996','1394033669','0','0','71','12','');
INSERT INTO `cms_delivery_notice` VALUES ('16','20140305113656977','1394033816','0','0','70','12','');
DROP TABLE IF EXISTS `cms_delivery_way`;
CREATE TABLE `cms_delivery_way` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `first_fee` double(20,4) NOT NULL,
  `allow_default` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `first_weight` double(20,4) NOT NULL,
  `continue_weight` double(20,4) NOT NULL,
  `continue_fee` double(20,4) NOT NULL,
  `weight_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
DROP TABLE IF EXISTS `cms_info_cate`;
CREATE TABLE `cms_info_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `type` varchar(15) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=gbk;
INSERT INTO `cms_info_cate` VALUES ('20','用户帮助','1','0','help','4');
INSERT INTO `cms_info_cate` VALUES ('15','获取更新','1','0','help','2');
INSERT INTO `cms_info_cate` VALUES ('17','公司信息','1','0','help','1');
INSERT INTO `cms_info_cate` VALUES ('18','商务合作','1','0','help','3');
INSERT INTO `cms_info_cate` VALUES ('21','公告信息','1','0','normal','5');
INSERT INTO `cms_info_cate` VALUES ('22','团购动态','1','0','normal','1');
DROP TABLE IF EXISTS `cms_infos`;
CREATE TABLE `cms_infos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `add_admin_id` int(11) NOT NULL COMMENT '???',
  `status` tinyint(4) NOT NULL,
  `rel_url` varchar(255) DEFAULT NULL,
  `update_admin_id` int(11) NOT NULL COMMENT '???',
  `is_delete` tinyint(4) NOT NULL,
  `click_count` int(11) NOT NULL COMMENT '???',
  `sort` int(11) NOT NULL,
  `seo_title` text,
  `seo_keyword` text,
  `seo_description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=gbk;
INSERT INTO `cms_infos` VALUES ('34','请在这里填加公告信息','请在这里填加公告信息','21','1394369322','0','6','1','','0','0','0','1','','','');
INSERT INTO `cms_infos` VALUES ('35','请在这里填加公告信息','请在这里填加公告信息','21','1394369361','0','6','1','','0','0','0','2','','','');
INSERT INTO `cms_infos` VALUES ('36','请在这里填加公告信息','请在这里填加公告信息','21','1394369369','0','6','1','','0','0','0','3','','','');
INSERT INTO `cms_infos` VALUES ('37','请在这里填加公告信息','请在这里填加公告信息','21','1394369381','0','6','1','','0','0','0','4','','','');
INSERT INTO `cms_infos` VALUES ('38','请在这里填加公告信息','请在这里填加公告信息','21','1394369389','0','6','1','','0','0','0','5','','','');
INSERT INTO `cms_infos` VALUES ('39','帮助问题','帮助问题','20','1394440861','0','6','1','','0','0','0','10','','','');
INSERT INTO `cms_infos` VALUES ('40','帮助问题','帮助问题','20','1394442469','0','6','1','','0','0','0','11','','','');
INSERT INTO `cms_infos` VALUES ('41','合作信息','合作信息','18','1394442503','0','6','1','','0','0','0','13','','','');
INSERT INTO `cms_infos` VALUES ('42','合作信息','合作信息','18','1394442520','0','6','1','','0','0','0','14','','','');
INSERT INTO `cms_infos` VALUES ('43','更新内容','更新内容','15','1394442536','0','6','1','','0','0','0','15','','','');
INSERT INTO `cms_infos` VALUES ('44','更新内容','更新内容','15','1394442553','0','6','1','','0','0','0','16','','','');
INSERT INTO `cms_infos` VALUES ('45','关于我们','关于我们','17','1394442565','0','6','1','','0','0','0','17','','','');
INSERT INTO `cms_infos` VALUES ('46','加入我们','加入我们','17','1394442582','0','6','1','','0','0','0','18','','','');
INSERT INTO `cms_infos` VALUES ('26','上半年南京人均团购约39元','出去吃饭之前，到网上搜一下有什么团购的餐厅，进了电影院里，用手机查一下是否有票正在团购，团购已变成年轻人一种生活方式。扬子晚报记者从&ldquo;团800&rdquo;网站（目前国内大型的独立团购导航网站）的调查报告上获悉，今年上半年，南京人团购总额达到历史最高记录，平均每天都有3万人参加团购。跟以往不同，更多的人爱上用手机团购，从下单到消费在1个小时内完成。<br />
<br />
数据来自12家团购网站<br />
<br />
&ldquo;平时跟朋友聚会吃饭都喜欢找团购，以前团购都是套餐，现在越来越多变成券，这样可以随意点菜，更加方便，一般折扣度都在7折左右，比如50块的现金券团购价格30块。看电影是一定要团购的，一般都能打五折。&rdquo;在新街口一家外企上班的徐小姐告诉记者，在朋友当中，团购已经是一种不可或缺的生活方式。<br />
<br />
近日，团购导航网站团800公布了《2013年6月中国团购市场统计报告》，该调查报告的数据来源包括拉手网、大众点评网、窝窝团、美团等共12家知名的团购网站。<br />
<br />
团购中美食占了六成<br />
<br />
扬子晚报记者在报告内看到，2013年1-6月份也就是上半年，南京本地团购成交额为31741.2万元，参团人数为548.7万人次，跟去年同期相比，分别增长了五成和三成。按照这个数据来计算，平均每天都有3万人参加团购。如果南京800万人口算，上半年人均团购约39元。<br />
<br />
以南京人团购的类目来看，足以看到南京人&ldquo;吃货&rdquo;本质，因为通过这些网站的销售额可以看到，其中美食所占的比例为60.2%，比例最大，也就是说，南京人在今年半年团吃花费达到1.8亿。其他团购方面，如休闲娱乐比例为19.7%，酒店旅游9.0%，生活服务8.8%，商品及其他2.2%。<br />
<br />
手机团购渐渐成主力<br />
<br />
随着智能手机的普及，越来越多的上班族和学生都在团购的方式上有所改变，从过去用电脑团购变成现在手机团购。<br />
<br />
&ldquo;先在网上搜下，附近有什么团购的餐厅，然后打电话去问问，有没有位置，确定有就可以团购了，从团购到消费时间很短。&rdquo;市民蒋先生告诉记者，最近一年和女朋友约会，经常采用这种方式，可以说省了不少银子。&ldquo;以前有团购好了的，忘记用过期了，也有需要用的时候，一过去说今天已经满了，相比之下，这样随用随团更方便高效。&rdquo;<br />
<br />
<br />
手机团购热潮催生&ldquo;一小时消费&rdquo;现象。团购从下单到消费使用需要多久的时间？与3年前用户提前&ldquo;抢购囤券&rdquo;留着未来使用的习惯大相径庭，通过对&ldquo;团购大全&rdquo;手机应用30万单购买样本的统计分析发现，35%的手机用户在购买团购后1小时内就到店消费，这其中又有近四成用户从下单至到店兑换消费只花了10分钟。<br />
<br />
可以想象这批消费者几乎&ldquo;不是在店内就是在去店里消费团购的路上&rdquo;，而使用电脑购买团购的用户从下单到消费的时间在1小时之内的比例只有7%。更令人出乎意料的是，在各细分品类团购购买及消费时间差上，竟然有15%的火锅类手机团购会在下单1小时之内被使用，而电影票团购其实只有6%的人敢在1小时内挑战错过开场的刺激，让人不禁感叹&ldquo;吃货们，你们是有多着急&rdquo;。 扬子晚报记者 柳扬<br />
<br />
作者：柳扬','22','1375185043','1375185224','6','1','','6','0','0','1','','','');
INSERT INTO `cms_infos` VALUES ('27','据调查显示：杭州人最爱在西湖边团购美食','在国内零售业仍然增长疲乏之时，团购市场却呈现不同趋势。从杭州地区来看，今年迄今共有468.2万人次参与了团购，其中西湖、黄龙沿线成为每日消费次数最多的地方，在所有团购中，美食类仍占据五成以上。<br />
<br />
　　此外，随着团购手机应用的普及，吃货们从下单到进店的速度也越来越快，不少客人下单后10分钟就进店消费了。<br />
<br />
　　然而，越来越多的餐饮店却陷入两难。它们既需要&ldquo;亏本赚吆喝&rdquo;，又不免担心，如果没有团购，客人还会主动来吗？<br />
<br />
　　杭州人最爱在西湖边团购美食<br />
<br />
　　天气越来越炎热，不少年轻人都习惯在外面吃饭，夜宵店的生意越来越火，这也带动了团购业务的增长。<br />
<br />
　　近日，团800网站公布了杭州各大商圈的&ldquo;团购热点地图&rdquo;，其中西湖、西湖北线、黄龙、北山路、文三路、古荡一带成为最受杭州人欢迎的团购地点，每日的消费次数达到了2708，紧随其后的是建国路、潮鸣、长庆、庆春路沿线、凤起路沿线地带，每日团购消费次数达到了2568。<br />
<br />
　　在团购种类上，美食餐饮类依旧成为杭州人的最爱，数据显示有52.1%都为美食类团购，其余部分被休闲娱乐、生活服务、酒店旅游等瓜分。<br />
<br />
　　此外，团购手机应用的发展，让客人&ldquo;下单到进店&rdquo;的速度又一次提升。团800网站通过对&ldquo;团购大全&rdquo;手机应用30万单购买样本的统计分析发现，35%的手机用户在购买团购后1小时内就到店消费，其中有近40%用户从下单到进店只花了不到10分钟。<br />
<br />
　　餐饮店做团购陷入两难<br />
<br />
　　越来越多的餐饮店投身到团购大军中，然而在&ldquo;亏本赚吆喝&rdquo;的心态之下，它们仍然隐忧重重。<br />
<br />
　　上周末，在体育场路上班的小张约上好友去市区吃夜宵，他在手机上团购了一席地的两人餐，&ldquo;我特意看了一下，确实没有提前预约之类的约束条件才下的单。&rdquo;小张说，但当他和朋友进店消费时，被服务员告知：&ldquo;9点以后不能使用团购券了，因为无法按团购价下单。&rdquo;<br />
<br />
　　据悉，不少美食团购都是以原价的4折至5折出售，&ldquo;团购价肯定都是亏本卖的，主要为了赚人气，所以老板们总要设置一些附加条件，甚至一些团购餐的用料都和其他的是有区别的，&rdquo;建国路上一家餐饮店的负责人说，&ldquo;但是现在的人可选择的餐厅太多，我们也担心，如果不是偶然在团购网站看到，也许都不会主动过来。&rdquo;<br />','22','1375185306','0','6','1','','0','0','0','2','','','');
INSERT INTO `cms_infos` VALUES ('28','蓝图二期晒结婚证秀幸福第二季来袭 新闻网独家团购6300元/㎡5千最高抵7万','核心提示：蓝图二期晒结婚证秀幸福第二季火爆来袭，网友只需关注青岛新闻网房产频道官方微博，并转发活动标语，即有机会赢取两张电影票看大片，参与就有机会，不要错过。目前蓝图二期联合青岛新闻网推出独家团购活动，抄底起价6300元/㎡，5千最高抵7万，户型面积为94-143㎡，套二、套三均有销售，有6种户型供置业者选择，2013年底交付，准现房发售&gt;&gt;点击进入青岛新闻网房产官方微博','22','1375185528','0','6','1','','0','0','0','3','','','');
INSERT INTO `cms_infos` VALUES ('29','移动端引团购网站逆袭 流量占比激增六成','根据团购导航网站团800数据显示，国内主流团购网站今年前半年成交额为141.3亿元，同比增长46%，每月市场规模呈稳步增长态势，与去年同期过山车式的表现形成强烈对比。<br />
　　流量占比激增六成<br />
　　虽然网民整体规模进入平台期，但这并不影响团购成为网络应用里用户增速最快的行业。根据中国互联网络信息中心(CNNIC)近日发布的最新数据显示，团购在前半年的网民规模为1.01亿人，半年增长率21.2%排名业界第一。<br />
　　在此大背景下，团购上半年成交额被拉升至141.3亿元，同比增长46%，该数据超过2011年全年的110亿元，相当于去年全年213.9亿元交易额的2/3。据团800数据显示，6月团购行业以26.1亿元的成交额再创新高，较上月净增约1.5亿元，同比增幅56.3%，同样上涨的还有39.9万期的在售团单数量，环比增长3.6%。按此计算，上半年共有在售团单216.3万期，相当于去年同期的3倍。<br />
　　不可否认的是，上半年141.3亿元的总成交额其中很大贡献来自各家团购网站在手机平台上的迅猛推广。据了解，各大团购网站在去年底移动端的流量及销量占比平均不到30%，而短短半年时间内部分网站已经提前将这一比例提升到50%，增长率超六成。其中，美团移动端交易额占比几近一半，移动流量占比超50%，窝窝团移动端流量占比接近50%。值得注意的是，截至今年二季度大众点评网移动端浏览量占比更是首超七成，移动端用户突破7500万。<br />
　　目前发力移动团购市场已成为主流团购网站共同的目标，其希望通过&ldquo;免预约&rdquo;和&ldquo;随时退&rdquo;等创新，在提高手机团购用户粘性的同时打破购买人次4500万的魔咒。<br />
　　或左右行业格局<br />
　　&ldquo;其实，团购和电子优惠券早因手机购买的热潮合二为一，这不但有效填补了历史上优惠券市场的不足，并将为更进一步的虚拟会员卡营销铺垫了想象空间&rdquo;，消费专家、团800联合创始人胡琛对移动团购兴起十分乐观。<br />
　　胡琛认为，移动端占比将进一步提升，甚至年末呈现7：3的倒挂现象。&ldquo;考虑到移动新入口和对本地生活市场的渗透价值，可能会引发国内互联网巨头对团购网站商业价值的再次评估，甚至再次发生重量级的并购或者整合。&rdquo;胡琛如是说。<br />
　　据悉目前美团、拉手、糯米等团购网站纷纷通过电影票、酒店等细分领域客户端，试图将移动端作为新的业务突破口和重心。值得团购网站注意的是，虽然同样是团购业务，但是用户在移动端和PC端的玩法差别不小。<br />
　　团800通过对&ldquo;团购大全&rdquo;手机应用30万单购买样本的统计分析发现，35%的手机用户在购买团购后1小时内就到店消费，这其中又有近四成用户从下单至到店兑换消费只花了10分钟不到，而使用电脑团购的用户从下单到消费的时间在1小时之内的比例只有7%。业内人士指出，移动团购用户要求的LBS(地理位置服务)+O2O整合性服务将成为业界未来竞争的重点。','22','1375185558','0','6','1','','0','0','0','4','','','');
INSERT INTO `cms_infos` VALUES ('30','100%返现＋赠礼 百度团购独享青岛啤酒节官方折扣','记者日前获悉，第23届青岛国际啤酒节将于8月10号盛大开幕。和往年单一的线下购票方式相比，今年主办方还开通了线上购票方式。作为青岛国际啤酒节唯一指定的售卖门票和官方纪念品的网络平台，百度团购（购票地址：http://tuan.baidu.com/event/2013qdbeer/index.html#top1 ）特意搭建了一个售卖门票的专题页面，网友可通过PC端、手机端等进行线上购买，并独享百度团购专供的两大福利：100%购票以及100%购票有礼。<br />
<br />
　　兑票就返现<br />
<br />
　　本届青岛国际啤酒节门票分为18元和9元的甲、乙两等。通过百度团购门票的用户，在线下专属兑换口完成纸质票兑换，即可100%随机获赠百度团购5元或20元不等的代金券。记者从啤酒节官网得知，纸质门票预计在8月1日后开售，通过百度团购门票的用户可在8月10-25日，前往青岛国际啤酒节售票中心验证兑换。<br />
<br />
　　购票100%有礼<br />
<br />
　　通过百度团购购票的用户可在专题页面上参与开瓶有礼的抽奖，且中奖率百分之百。用户择一点击页面上跳动的四瓶啤酒图样，即可角逐从啤酒无限畅饮特权、1000元海鲜大餐、2000元海景房免费，到价值1.6W的韩国豪华游轮双人游等豪奖。<br />
<br />
<br />
（青岛国际啤酒节百度团购售票专题页面）<br />
<br />
　　据了解，百度团购成立于2011年6月，凭借着&ldquo;百度团购导航+百度自营团购&rdquo;的双轮驱动模式，两年来百度团购获得了快速的成长。相比于其它的团购网站，百度团购拥有无与伦比的四大优势。首先百度团购覆盖了100余家主流团购网站的50余万款团购商品，堪称全网最全；其次位置定位等独特功能，能够帮助用户轻松寻找周边的团购和优惠信息；再次通过对支付宝等支付方式的引入，能为用户提供便捷的支付服务；此外&ldquo;账号一站通&rdquo;、以及各种爆款、满减、返券等活动，也都给广大用户营造了不一样的优质体验。<br />
<br />
　　百度团购相关负责人介绍说，百度团购导航是唯一一家坚持&ldquo;不商业化&rdquo;的团购导航， &ldquo;客观中立&rdquo;的独特标签，让百度的导航服务变得更加真实、精准、可靠。此外，百度团购自营业务的领先功能和丰富品类，也为广大用户提供了一个简单快捷的个性化团购体验。也正是这些原因，让百度团购得以突出重围，获得青岛国际啤酒节主办方的认可。对于承担此次青岛啤酒节网上售票的任务，这位负责人充满信心地表示，&ldquo;将以最先进的技术和最优质的服务，搭建一个绿色的购票快通道，为广大网民和游客提供最愉悦的购票体验。&rdquo;','22','1375185686','0','6','1','','0','0','0','5','','','');
INSERT INTO `cms_infos` VALUES ('31','瑞安康达三菱V3菱悦夏季团购优惠','大暑已至，意味着夏季进入最酷热的时候，届时浙江康达汽车也给出了更大的购车优惠，即日起7月31日，到浙江康达4S店购买东南V3菱悦除了享受5.98万起的夏季团购价，还可以参与以下购车优惠活动：<br />
<br />
1)5.98万起，加1元享万元优惠<br />
<br />
1元钱，不起眼，但如果说花一元就可以享有10000元的购车优惠，那绝对算是超值。到浙江康达4S店，您加一元，可以享受到万元的购车礼遇，包含现金优惠8000元（3000节能补贴、3000元车价优惠、2000元油卡），另外还有3800的装潢礼包（价值2000元）。如此丰厚大礼，绝对称得上物超所值.<br />
<br />
<br />
<br />
2)最低8800元首付日供不到50元<br />
<br />
除了车价上大力度的促销，V3菱悦还推出了20%低首付按揭方案。目前低配的V3菱悦车型车款首付只要8800元，日供仅需50元不到。并且免担保、无抵押、不限户籍。<br />
<br />
3)购车享整车3年10万公里质保<br />
<br />
相对之前整车2年5万公里的质保期，现在购买V3菱悦可以享受3年10万公里的超长质保。让您的用车生活无后顾之忧，这也不难看出，东南汽车对V3菱悦品质的信心。<br />
<br />
截止到目前，V3菱悦用户已突破40万，伴随着40万家庭一同成长。强劲的动力、丰富的配置和超高性价比让V3菱悦在同级别车型中优势明显，成为5-7万级家用轿车的首选车型。<br />
<br />
经销商：浙江康达汽车工贸有限公司瑞安分公司店面地址：浙江康达汽车工贸有限公司瑞安分公司<br />
<br />
销售热线：15558799900 （联系时，若提及易车网，将有更多优惠）','22','1375186259','0','6','1','','0','0','0','6','','','');
INSERT INTO `cms_infos` VALUES ('32','快讯：左右沙发首届工厂直销团购大会在深成功举行','<br />
左右沙发首届工厂直销团购大会<br />
<br />
&emsp;&emsp;新浪家居 深圳报道：7月28日，主题为&ldquo;全省一起去工厂买家具&rdquo; 左右沙发首届工厂直销团购大会在深圳左右家私总部展厅盛大开启，来自广东省各地业主齐聚左右，现场异常火爆，左右集团总裁、深圳家具协会会长黄华坤先生亲临现场助阵。<br />
<br />
<br />
团购现场异常火爆<br />
<br />
&emsp;&emsp;据了解，此次左右沙发工厂直销团购大会为左右工厂团购首次之旅，在各大媒体、团购网站召集之时已有数千人参加报名，作为亚洲超大沙发制造商及中国驰名商标，品牌及产品质量已深入消费者人心，在现场，有消费者接受采访提到：&ldquo;我们作为普通消费者，其实都想要一款物美价廉的产品，左右沙发在我们消费者心中比较有信誉，毕竟它做沙发有这么多年了，在看到工厂有团购直销时候，我们毫不犹豫报名参加。在这个展厅确实有些产品性价比高，我希望以后能有更多机会参加这样的团购。&rdquo;<br />
<br />
<br />
左右沙发首届工厂直销团购大会在深成功举行<br />
<br />
&emsp;&emsp;左右家私是一家集研发、生产和销售高档家私为一体的大型企业，总部位于深圳市龙岗区，创立于1986年，拥有管理、技术等各类人才近3000名。历经27年的稳健发展，左右家私凭借雄厚的设计研发实力，引进顶级皮布面料，结合东方人的体格特点，开发大批适合中国家庭的高档沙发，创造中国客厅文化的第一品牌。目前拥有亚洲超大沙发制造基地，并成为唯一一家在国际展销会上连续十二次摘取软体家具设计冠军称号的沙发企业，并在2007年荣获&ldquo;中国名牌&rdquo;荣誉称号，2012年荣获&ldquo;中国驰名商标&rdquo;等重量级殊荣。','22','1375186344','0','6','1','','0','0','0','7','','','');
INSERT INTO `cms_infos` VALUES ('33','读者期待商报能多组织汽车团购活动','本报讯（记者 戈伟 实习生 刘晓雪）7月28日，长江商报&middot;车商社区行在南湖邻里文化广场顺利举行。<br />
<br />
近200人挤爆活动现场，不时有消费者前来咨询团购事宜，居民们对汽车团购充满了热情，同时也表达了自己对价格的诉求，最后，现场的两名销售人员在现场客户的需求下，向公司做出了申请，最终为顾客争取到了最大的让利政策：其中，全新荣威550在活动中送5千元礼包；老款荣威550优惠现金25000元；MG3优惠现金1万元，并送3000元礼包一份；W5优惠现金两万，并送5000元礼包一份；MG5优惠现金8千元，并送3000元礼包；950优惠现金20000元；350优惠现金17000元，以及送5千礼包一份。<br />
<br />
居民王先生对记者说到：&ldquo;长江商报&middot;车商社区行活动真实惠，服务到家门口的活动，我们老百姓是很喜欢的，希望长江商报以后能多举办类似的活动。&rdquo;与此同时，现场不少居民表示希望本报能多组织团购活动，帮他们挑好车，谈好折扣。<br />','22','1375186375','0','6','1','','0','0','0','8','','','');
DROP TABLE IF EXISTS `cms_links`;
CREATE TABLE `cms_links` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=gbk;
INSERT INTO `cms_links` VALUES ('2','百度','http://www.baidu.com','1','4a0789303c368d63e33decb649261ac8.jpg','1');
INSERT INTO `cms_links` VALUES ('3','谷歌','http://www.google.com','1','d4513e6cec0b28227ac75ffc49f1790b.jpg','2');
DROP TABLE IF EXISTS `cms_log`;
CREATE TABLE `cms_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_info` text NOT NULL,
  `log_time` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `log_ip` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `module` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
DROP TABLE IF EXISTS `cms_mail_list`;
CREATE TABLE `cms_mail_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_address` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
DROP TABLE IF EXISTS `cms_mail_server`;
CREATE TABLE `cms_mail_server` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `smtp_server` varchar(255) NOT NULL,
  `smtp_name` varchar(255) NOT NULL,
  `smtp_pwd` varchar(255) NOT NULL,
  `is_ssl` tinyint(1) NOT NULL,
  `smtp_port` varchar(255) NOT NULL,
  `use_limit` int(11) NOT NULL,
  `is_reset` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `total_use` int(11) NOT NULL,
  `is_verify` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `is_default` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=gbk;
INSERT INTO `cms_mail_server` VALUES ('8','smtp.qq.com','cms74@qq.com','o0o0o00','1','25','0','1','1','0','1','0','0');
INSERT INTO `cms_mail_server` VALUES ('9','smtp.126.com','sonik@126.com','13935169347','1','25','1','1','1','1','1','0','1');
INSERT INTO `cms_mail_server` VALUES ('10','aaaa','bbadf','asdf','1','25','0','0','1','0','1','0','0');
DROP TABLE IF EXISTS `cms_message`;
CREATE TABLE `cms_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `admin_reply` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_member` tinyint(1) NOT NULL,
  `city_id` int(11) NOT NULL,
  `is_delete` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
DROP TABLE IF EXISTS `cms_message_group`;
CREATE TABLE `cms_message_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `preset` tinyint(1) NOT NULL,
  `show_name` varchar(255) NOT NULL,
  `is_member` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `is_delete` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=gbk;
INSERT INTO `cms_message_group` VALUES ('1','extracts_cash','1','提现申请','1','1','0');
INSERT INTO `cms_message_group` VALUES ('2','business','1','商务合作','1','2','0');
INSERT INTO `cms_message_group` VALUES ('3','feedback','1','意见反馈','1','3','0');
INSERT INTO `cms_message_group` VALUES ('4','deal_order','1','订单留言','1','4','0');
INSERT INTO `cms_message_group` VALUES ('5','question','1','问题答疑','0','5','0');
INSERT INTO `cms_message_group` VALUES ('13','before_sale','0','售前咨询','0','5','0');
INSERT INTO `cms_message_group` VALUES ('10','before_sale','0','售前咨询','0','8','0');
INSERT INTO `cms_message_group` VALUES ('11','deal_trade','0','团购交易','0','7','0');
INSERT INTO `cms_message_group` VALUES ('12','after_sale','0','售后服务','1','6','0');
DROP TABLE IF EXISTS `cms_msg_template`;
CREATE TABLE `cms_msg_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ch_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `type` tinyint(1) NOT NULL,
  `is_html` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=gbk;
INSERT INTO `cms_msg_template` VALUES ('1','团购券邮件通知模板','TPL_MAIL_COUPON','<{$coupon_data.user_name}>你好! 你购买的<{$coupon_data.deal_name}>已购买成功，团购券序列号<{$coupon_data.sn}>密码<{$coupon_data.password}>,有效期为<{$coupon_data.begin_time_format}>到<{$coupon_data.end_time_format}>','1','1');
INSERT INTO `cms_msg_template` VALUES ('2','团购券短信通知模板','TPL_SMS_COUPON','<{$coupon.user_name}>你好! 你购买的<{$coupon.deal_name}>已购买成功，团购券序列号<{$coupon.sn}>密码<{$coupon.password}>,有效期为<{$coupon.begin_time_format}>到<{$coupon.end_time_format}>','0','0');
INSERT INTO `cms_msg_template` VALUES ('3','会员验证邮件','TPL_MAIL_USER_VERIFY','<{$user.user_name}>你好，请点击以下链接验证你的会员身份
</p>
<a href=\'<{$user.verify_url}>\'><{$user.verify_url}></a>','1','1');
INSERT INTO `cms_msg_template` VALUES ('4','会员取回密码邮件','TPL_MAIL_USER_PASSWORD','<{$user.user_name}>你好，请点击以下链接修改您的密码
</p>
<a href=\'<{$user.password_url}>\'><{$user.password_url}></a>','1','0');
INSERT INTO `cms_msg_template` VALUES ('5','收款短信通知模板','TPL_SMS_PAYMENT','{$payment_notice.user_name}你好,你所下订单{$payment_notice.order_sn}的收款单{$payment_notice.notice_sn}金额{$payment_notice.money_format}于{$payment_notice.pay_time_format}支付成功','0','0');
INSERT INTO `cms_msg_template` VALUES ('6','收款邮件通知模板','TPL_MAIL_PAYMENT','{$payment_notice.user_name}你好,你所下订单{$payment_notice.order_sn}的收款单{$payment_notice.notice_sn}金额{$payment_notice.money_format}于{$payment_notice.pay_time_format}支付成功','1','0');
INSERT INTO `cms_msg_template` VALUES ('7','发货短信通知模板','TPL_SMS_DELIVERY','{$delivery_notice.user_name}你好,你所下订单{$delivery_notice.order_sn}的商品{$delivery_notice.deal_names}于{$delivery_notice.delivery_time_format}发货成功,发货单号{$delivery_notice.notice_sn}','0','0');
INSERT INTO `cms_msg_template` VALUES ('8','发货邮件通知模板','TPL_MAIL_DELIVERY','<{$delivery_notice.user_name}>你好,你所下订单<{$delivery_notice.order_sn}>的商品<{$delivery_notice.deal_names}>于<{$delivery_notice.delivery_time_format}>发货成功,发货单号<{$delivery_notice.notice_sn}>','1','0');
INSERT INTO `cms_msg_template` VALUES ('9','发送短信认证码模板','TPL_SMS_VERIFY_CODE','你的手机号为{$verify.mobile},验证码为{$verify.code}','0','0');
INSERT INTO `cms_msg_template` VALUES ('10','团购短信通知模板','TPL_DEAL_NOTICE_SMS','{$notice.site_name}又有新团购啦!{$notice.deal_name},欢迎来抢团{$notice.site_url}','0','0');
INSERT INTO `cms_msg_template` VALUES ('11','邮件退订验证模板','TPL_MAIL_UNSUBSCRIBE','您好，您确定要退订<{$mail.mail_address}>吗？要退订请点击<a href=\"<{$mail.url}>\">完成退订</a>','1','1');
DROP TABLE IF EXISTS `cms_nav`;
CREATE TABLE `cms_nav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `rank` tinyint(3) DEFAULT NULL,
  `is_newWindow` tinyint(1) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `module` varchar(100) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gbk;
INSERT INTO `cms_nav` VALUES ('1','今日团购','1','1','0','','index','','0');
INSERT INTO `cms_nav` VALUES ('2','团购列表','1','2','0','','deals','list','0');
INSERT INTO `cms_nav` VALUES ('3','往期团购','1','3','0','','deals','history','0');
INSERT INTO `cms_nav` VALUES ('4','团购预告','1','4','0','','deals','forecast','0');
INSERT INTO `cms_nav` VALUES ('5','团购动态','1','5','0','','infos','','22');
INSERT INTO `cms_nav` VALUES ('6','讨论区','1','6','0','','message','','0');
INSERT INTO `cms_nav` VALUES ('7','备用菜单','1','7','1','http://www.baidu.com','define_url','','0');
DROP TABLE IF EXISTS `cms_payment`;
CREATE TABLE `cms_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `online_pay` tinyint(1) NOT NULL,
  `fee_amount` double(20,4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `total_amount` double(20,4) NOT NULL,
  `parameters` text NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `installed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=gbk;
INSERT INTO `cms_payment` VALUES ('1','Alipay','1','1','13.0000','支付宝','全球领先的独立第三方支付平台','23523.0000','a:4:{s:7:\"partner\";s:3:\"aaa\";s:7:\"account\";s:3:\"bbb\";s:3:\"key\";s:3:\"111\";s:7:\"service\";s:1:\"0\";}','9f1a90f2466abe7d33f7de4b858f51fa.jpg','1','1');
INSERT INTO `cms_payment` VALUES ('3','Tenpay','1','1','0.0000','财付通 ','腾讯公司创办的中国领先的在线支付平台','0.0000','a:3:{s:9:\"tenpay_id\";s:6:\"adfabb\";s:3:\"key\";s:3:\"123\";s:4:\"sign\";s:3:\"abc\";}','cf1a02cc02749cfc040e38b7a8d2f441.jpg','3','1');
INSERT INTO `cms_payment` VALUES ('2','Chinabank','1','1','0.0000','网银在线','全面支持全国19家银行的信用卡及借记卡实现网上支付','0.0000','a:2:{s:7:\"account\";s:4:\"afbd\";s:3:\"key\";s:4:\"1123\";}','34b829b2cacecc5473ee7355292f9239.jpg','2','1');
INSERT INTO `cms_payment` VALUES ('4','Account','1','1','0.0000','余额支付','余额支付','1000.0000','None','','4','1');
INSERT INTO `cms_payment` VALUES ('5','Voucher','1','1','0.0000','代金券支付','','0.0000','none','','5','1');
DROP TABLE IF EXISTS `cms_payment_notice`;
CREATE TABLE `cms_payment_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_sn` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  `pay_time` int(11) NOT NULL DEFAULT '0',
  `order_id` int(11) NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `memo` text NOT NULL,
  `money` double(20,4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `notice_sn_unk` (`notice_sn`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
DROP TABLE IF EXISTS `cms_receiving`;
CREATE TABLE `cms_receiving` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receiving_sn` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  `pay_time` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `is_paid` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `money` double(20,4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `receiving_sn_unk` (`receiving_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=gbk;
INSERT INTO `cms_receiving` VALUES ('9','20101124053513381','1290562513','1290562513','9','1','1','1','','1598.4000');
INSERT INTO `cms_receiving` VALUES ('10','20101211100023149','1292047223','1324106591','10','1','1','2','','100.0000');
INSERT INTO `cms_receiving` VALUES ('11','2011050305471518','1304387235','0','11','0','12','2','','75.0000');
INSERT INTO `cms_receiving` VALUES ('12','2012012805285757','1327714137','0','21','0','12','2','','1009.0000');
DROP TABLE IF EXISTS `cms_referrals`;
CREATE TABLE `cms_referrals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `rel_user_id` int(11) NOT NULL,
  `money` double(20,4) NOT NULL,
  `create_time` int(11) NOT NULL,
  `pay_time` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;
INSERT INTO `cms_referrals` VALUES ('1','12','13','13.0000','1363005490','1363005490','11','23','0');
DROP TABLE IF EXISTS `cms_role`;
CREATE TABLE `cms_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `access` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=gbk;
INSERT INTO `cms_role` VALUES ('1','主管理员','1','0','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,158,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,153,42,43,44,45,46,47,48,49,50,51,52,53,159,54,55,56,57,58,59,60,160,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,149,150,163,165,84,85,164,86,87,88,89,90,91,92,93,94,95,96,161,167,168,97,98,99,100,101,102,103,104,105,106,107,108,109,162,166,110,111,112,113,114,115,116,151,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,148,143,139,140,141,142,154,155,144,145,146,147,152,156,157');
INSERT INTO `cms_role` VALUES ('9','测试管理员','1','0','1,5,9,10,11,12,13,14,15,16,17,18,19,20,158,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,153,42,43,44,45,46,47,48,49,50,51,52,53,159,54,55,56,57,58,59,60,160,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,149,150,163,165,84,85,164,86,87,88,89,90,91,92,93,94,95,96,161,97,98,99,100,101,102,103,104,105,106,107,108,109,162,166,110,111,112,113,114,115,116,151,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,148,143,139,140,141,142,154,155,144,145,146,147,152,156');
DROP TABLE IF EXISTS `cms_role_module`;
CREATE TABLE `cms_role_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `main_act` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=gbk;
INSERT INTO `cms_role_module` VALUES ('1','deals','团购列表','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('2','deals_category','团购分类列表','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('3','supplier','供应商列表','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('4','supplier_account','供应商帐号','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('5','supplier_location','供应商店面','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('6','city','团购城市列表','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('7','weight','重量单位','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('8','deals_recycle','团购管理回收站','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('9','info_cate','信息分类列表','1','0','front');
INSERT INTO `cms_role_module` VALUES ('11','nav','主导航','1','0','front');
INSERT INTO `cms_role_module` VALUES ('12','adv','广告管理列表','1','0','front');
INSERT INTO `cms_role_module` VALUES ('13','links','友情管理列表','1','0','front');
INSERT INTO `cms_role_module` VALUES ('14','templates','模版管理列表','1','0','front');
INSERT INTO `cms_role_module` VALUES ('15','message_group','留言分组列表','1','0','front');
INSERT INTO `cms_role_module` VALUES ('16','message','留言管理列表','1','0','front');
INSERT INTO `cms_role_module` VALUES ('17','front_recycle','前台管理回收站','1','0','front');
INSERT INTO `cms_role_module` VALUES ('18','user','会员列表','1','0','user');
INSERT INTO `cms_role_module` VALUES ('19','user_group','会员分组列表','1','0','user');
INSERT INTO `cms_role_module` VALUES ('20','user_field','会员扩展列表','1','0','user');
INSERT INTO `cms_role_module` VALUES ('21','referrals','邀请返利列表','1','0','user');
INSERT INTO `cms_role_module` VALUES ('22','member_recycle','会员回收站','1','0','user');
INSERT INTO `cms_role_module` VALUES ('23','deal_orders','团购订单列表','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('24','recharge_orders','充值订单列表','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('25','receiving','收款单列表','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('26','payment','支付接口列表','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('27','delivery_area','配送地区列表','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('28','delivery_way','配送方式列表','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('29','orders_recycle','订单管理回收站','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('30','msg_template','消息模版列表','1','0','mail_mess');
INSERT INTO `cms_role_module` VALUES ('31','mail_list','邮件订阅列表','1','0','mail_mess');
INSERT INTO `cms_role_module` VALUES ('32','mail_server','邮件服务器列表','1','0','mail_mess');
INSERT INTO `cms_role_module` VALUES ('33','sms_list','短信接口列表','1','0','mail_mess');
INSERT INTO `cms_role_module` VALUES ('34','sms_subscription','短信订阅列表','1','0','mail_mess');
INSERT INTO `cms_role_module` VALUES ('35','msg_queue','消息队列列表','1','0','mail_mess');
INSERT INTO `cms_role_module` VALUES ('36','msg_recycle','消息回收站','1','0','mail_mess');
INSERT INTO `cms_role_module` VALUES ('37','sys_config','系统配置','1','0','sys_config');
INSERT INTO `cms_role_module` VALUES ('38','role','管理员分组列表','1','0','sys_config');
INSERT INTO `cms_role_module` VALUES ('39','admin','管理员列表','1','0','sys_config');
INSERT INTO `cms_role_module` VALUES ('40','backup','数据备份列表','1','0','sys_config');
INSERT INTO `cms_role_module` VALUES ('41','log','系统日志','1','0','sys_config');
INSERT INTO `cms_role_module` VALUES ('42','sys_recycle','系统设置回收站','1','0','sys_config');
INSERT INTO `cms_role_module` VALUES ('43','login','后台登陆','1','0','login');
INSERT INTO `cms_role_module` VALUES ('10','infos','信息列表','1','0','front');
INSERT INTO `cms_role_module` VALUES ('44','do_incharge','管理员收款','1','0','do_incharge');
INSERT INTO `cms_role_module` VALUES ('45','deal_coupon','团购券','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('46','user_log','会员日志','1','0','user');
INSERT INTO `cms_role_module` VALUES ('47','deal_orders_log','团购订单日志','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('48','paymentNotice','付款单管理','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('49','clear_cache','清除缓存','1','0','sys_config');
DROP TABLE IF EXISTS `cms_role_node`;
CREATE TABLE `cms_role_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) NOT NULL,
  `edit` varchar(100) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=169 DEFAULT CHARSET=gbk;
INSERT INTO `cms_role_node` VALUES ('2','add_deals','add','新增团购','1');
INSERT INTO `cms_role_node` VALUES ('3','add_deals','mod','编辑团购','1');
INSERT INTO `cms_role_node` VALUES ('4','deals','del','删除团购','1');
INSERT INTO `cms_role_node` VALUES ('1','deals','','团购列表','1');
INSERT INTO `cms_role_node` VALUES ('5','deals_category','','分类列表','2');
INSERT INTO `cms_role_node` VALUES ('6','add_dealsCate','add','新增分类','2');
INSERT INTO `cms_role_node` VALUES ('7','add_dealsCate','mod','编辑分类','2');
INSERT INTO `cms_role_node` VALUES ('8','deals_category','del','删除分类','2');
INSERT INTO `cms_role_node` VALUES ('9','supplier','','供应商列表','3');
INSERT INTO `cms_role_node` VALUES ('10','add_supplier','add','新增供应商','3');
INSERT INTO `cms_role_node` VALUES ('11','add_supplier','mod','编辑供应商','3');
INSERT INTO `cms_role_node` VALUES ('12','supplier','del','删除供应商','3');
INSERT INTO `cms_role_node` VALUES ('13','supplier_account','','供应商帐号','4');
INSERT INTO `cms_role_node` VALUES ('14','add_supplierAccount','add','新增帐号','4');
INSERT INTO `cms_role_node` VALUES ('15','add_supplierAccount','mod','编辑帐号','4');
INSERT INTO `cms_role_node` VALUES ('16','supplier_account','del','删除帐号','4');
INSERT INTO `cms_role_node` VALUES ('17','supplier_location','','供应商店面','5');
INSERT INTO `cms_role_node` VALUES ('18','add_supplierLocation','add','新增店面','5');
INSERT INTO `cms_role_node` VALUES ('19','add_supplierLocation','mod','编辑店面','5');
INSERT INTO `cms_role_node` VALUES ('20','supplier_location','del','删除店面','5');
INSERT INTO `cms_role_node` VALUES ('21','city','','城市列表','6');
INSERT INTO `cms_role_node` VALUES ('22','add_city','add','新增城市','6');
INSERT INTO `cms_role_node` VALUES ('23','add_city','mod','编辑城市','6');
INSERT INTO `cms_role_node` VALUES ('24','city','del','删除城市','6');
INSERT INTO `cms_role_node` VALUES ('25','set_default','','设为默认','6');
INSERT INTO `cms_role_node` VALUES ('26','weight','','重量单位列表','7');
INSERT INTO `cms_role_node` VALUES ('27','add_weight','add','新增单位','7');
INSERT INTO `cms_role_node` VALUES ('28','add_weight','mod','编辑单位','7');
INSERT INTO `cms_role_node` VALUES ('29','weight','del','删除单位','7');
INSERT INTO `cms_role_node` VALUES ('30','deals_recycle','','团购管理回收站','8');
INSERT INTO `cms_role_node` VALUES ('31','deals_recycle','restore','还原','8');
INSERT INTO `cms_role_node` VALUES ('32','deals_recycle','del','删除','8');
INSERT INTO `cms_role_node` VALUES ('33','info_cate','','信息分类列表','9');
INSERT INTO `cms_role_node` VALUES ('34','add_infoCate','add','新增分类','9');
INSERT INTO `cms_role_node` VALUES ('35','add_infoCate','mod','编辑分类','9');
INSERT INTO `cms_role_node` VALUES ('36','info_cate','del','删除分类','9');
INSERT INTO `cms_role_node` VALUES ('37','infos','','信息列表','10');
INSERT INTO `cms_role_node` VALUES ('38','add_infos','add','新增信息','10');
INSERT INTO `cms_role_node` VALUES ('39','add_infos','mod','编辑信息','10');
INSERT INTO `cms_role_node` VALUES ('40','infos','del','删除信息','10');
INSERT INTO `cms_role_node` VALUES ('41','mod_nav','mod','编辑导航','11');
INSERT INTO `cms_role_node` VALUES ('42','adv','','广告列表','12');
INSERT INTO `cms_role_node` VALUES ('43','add_adv','add','新增广告','12');
INSERT INTO `cms_role_node` VALUES ('44','add_adv','mod','编辑广告','12');
INSERT INTO `cms_role_node` VALUES ('45','adv','del','删除广告','12');
INSERT INTO `cms_role_node` VALUES ('46','links','','友情链接列表','13');
INSERT INTO `cms_role_node` VALUES ('47','add_links','add','新增友情链接','13');
INSERT INTO `cms_role_node` VALUES ('48','add_links','mod','编辑友情链接','13');
INSERT INTO `cms_role_node` VALUES ('49','links','del','删除友情链接','13');
INSERT INTO `cms_role_node` VALUES ('50','templates','','模版列表','14');
INSERT INTO `cms_role_node` VALUES ('51','add_templates','add','新增模版','14');
INSERT INTO `cms_role_node` VALUES ('52','add_templates','mod','编辑模版','14');
INSERT INTO `cms_role_node` VALUES ('53','templates','del','删除模版','14');
INSERT INTO `cms_role_node` VALUES ('54','message_group','','留言分组列表','15');
INSERT INTO `cms_role_node` VALUES ('55','add_messageGroup','add','新增留言分组','15');
INSERT INTO `cms_role_node` VALUES ('56','add_messageGroup','mod','编辑留言分组','16');
INSERT INTO `cms_role_node` VALUES ('57','message_group','del','删除留言分组','16');
INSERT INTO `cms_role_node` VALUES ('58','message','','留言列表','16');
INSERT INTO `cms_role_node` VALUES ('59','reply_message','','查看留言','16');
INSERT INTO `cms_role_node` VALUES ('60','message','del','删除留言','16');
INSERT INTO `cms_role_node` VALUES ('61','front_recycle','','前台管理回收站','17');
INSERT INTO `cms_role_node` VALUES ('62','front_recycle','restore','还原','17');
INSERT INTO `cms_role_node` VALUES ('63','front_recycle','del','删除','17');
INSERT INTO `cms_role_node` VALUES ('64','user','','会员管理列表','18');
INSERT INTO `cms_role_node` VALUES ('65','add_user','add','新增会员','18');
INSERT INTO `cms_role_node` VALUES ('66','add_user','mod','编辑会员','18');
INSERT INTO `cms_role_node` VALUES ('67','user','del','删除会员','18');
INSERT INTO `cms_role_node` VALUES ('68','user_group','','会员分组管理','19');
INSERT INTO `cms_role_node` VALUES ('69','add_userGroup','add','新增会员分组','19');
INSERT INTO `cms_role_node` VALUES ('70','add_userGroup','mod','编辑会员分组','19');
INSERT INTO `cms_role_node` VALUES ('71','user_group','del','删除会员分组','19');
INSERT INTO `cms_role_node` VALUES ('72','user_field','','会员扩展列表','20');
INSERT INTO `cms_role_node` VALUES ('73','add_userField','add','新增会员扩展','20');
INSERT INTO `cms_role_node` VALUES ('74','add_userField','mod','编辑会员扩展','20');
INSERT INTO `cms_role_node` VALUES ('75','user_field','del','删除会员扩展','20');
INSERT INTO `cms_role_node` VALUES ('76','referrals','','邀请返利列表','21');
INSERT INTO `cms_role_node` VALUES ('77','referrals','del','删除返利','21');
INSERT INTO `cms_role_node` VALUES ('78','member_recycle','','会员管理回收站','22');
INSERT INTO `cms_role_node` VALUES ('79','member_recycle','restore','还原','22');
INSERT INTO `cms_role_node` VALUES ('80','member_recycle','del','删除','22');
INSERT INTO `cms_role_node` VALUES ('81','deal_orders','','团购订单列表','23');
INSERT INTO `cms_role_node` VALUES ('82','view_order','','处理订单','23');
INSERT INTO `cms_role_node` VALUES ('83','deal_orders','del','删除订单','23');
INSERT INTO `cms_role_node` VALUES ('84','recharge_orders','','充值订单列表','24');
INSERT INTO `cms_role_node` VALUES ('85','recharge_orders','del','删除订单','24');
INSERT INTO `cms_role_node` VALUES ('86','receiving','','收款单列表','25');
INSERT INTO `cms_role_node` VALUES ('87','payment','','支付接口列表','26');
INSERT INTO `cms_role_node` VALUES ('88','edit_payment','mod','编辑接口','26');
INSERT INTO `cms_role_node` VALUES ('89','delivery_area','','配送地区列表','27');
INSERT INTO `cms_role_node` VALUES ('90','add_deliveryArea','add','新增配送地区','27');
INSERT INTO `cms_role_node` VALUES ('91','add_deliveryArea','mod','编辑配送地区','27');
INSERT INTO `cms_role_node` VALUES ('92','delivery_area','del','删除配送地区','27');
INSERT INTO `cms_role_node` VALUES ('93','delivery_way','','配送方式列表','28');
INSERT INTO `cms_role_node` VALUES ('94','add_deliveryWay','add','新增配送方式','28');
INSERT INTO `cms_role_node` VALUES ('95','add_deliveryWay','mod','编辑配送方式','28');
INSERT INTO `cms_role_node` VALUES ('96','delivery_way','del','删除配送方式','28');
INSERT INTO `cms_role_node` VALUES ('97','orders_recycle','','订单管理回收站','29');
INSERT INTO `cms_role_node` VALUES ('98','orders_recycle','restore','还原','29');
INSERT INTO `cms_role_node` VALUES ('99','orders_recycle','del','删除','29');
INSERT INTO `cms_role_node` VALUES ('100','msg_template','','消息模板列表','30');
INSERT INTO `cms_role_node` VALUES ('101','edit_msgTemplate','','编辑模板','30');
INSERT INTO `cms_role_node` VALUES ('102','mail_list','','邮件订阅列表','31');
INSERT INTO `cms_role_node` VALUES ('103','add_mailList','add','新增邮件订阅','31');
INSERT INTO `cms_role_node` VALUES ('104','add_mailList','mod','编辑邮件订阅','31');
INSERT INTO `cms_role_node` VALUES ('105','mail_list','del','删除邮件订阅','31');
INSERT INTO `cms_role_node` VALUES ('106','mail_server','','邮件服务器列表','32');
INSERT INTO `cms_role_node` VALUES ('107','add_mailServer','add','新增邮件服务器','32');
INSERT INTO `cms_role_node` VALUES ('108','add_mailServer','mod','编辑邮件服务器','32');
INSERT INTO `cms_role_node` VALUES ('109','mail_server','del','删除邮件服务器','32');
INSERT INTO `cms_role_node` VALUES ('110','sms_list','','短信接口管理','33');
INSERT INTO `cms_role_node` VALUES ('111','sms_subscription','','短信订阅列表','34');
INSERT INTO `cms_role_node` VALUES ('112','add_smsSubscription','add','新增短信订阅','34');
INSERT INTO `cms_role_node` VALUES ('113','add_smsSubscription','mod','编辑短信订阅','34');
INSERT INTO `cms_role_node` VALUES ('114','sms_subscription','del','删除短信订阅','34');
INSERT INTO `cms_role_node` VALUES ('115','msg_queue','','消息队列列表','35');
INSERT INTO `cms_role_node` VALUES ('116','msg_queue','del','删除消息队列','35');
INSERT INTO `cms_role_node` VALUES ('117','msg_recycle','','消息回收站','36');
INSERT INTO `cms_role_node` VALUES ('118','msg_recycle','restore','还原','36');
INSERT INTO `cms_role_node` VALUES ('119','msg_recycle','del','删除','36');
INSERT INTO `cms_role_node` VALUES ('120','sys_config','','系统配置','37');
INSERT INTO `cms_role_node` VALUES ('121','sys_config','mod','编辑','37');
INSERT INTO `cms_role_node` VALUES ('122','role','','管理员分组列表','38');
INSERT INTO `cms_role_node` VALUES ('123','add_role','add','新增管理员分组','38');
INSERT INTO `cms_role_node` VALUES ('124','add_role','mod','编辑管理员分组','38');
INSERT INTO `cms_role_node` VALUES ('125','role','del','删除管理员分组','38');
INSERT INTO `cms_role_node` VALUES ('126','admin','','管理员列表','39');
INSERT INTO `cms_role_node` VALUES ('127','add_admin','add','新增管理员','39');
INSERT INTO `cms_role_node` VALUES ('128','add_admin','mod','编辑管理员','39');
INSERT INTO `cms_role_node` VALUES ('129','admin','del','删除管理员','39');
INSERT INTO `cms_role_node` VALUES ('130','backup','','数据备份列表','40');
INSERT INTO `cms_role_node` VALUES ('131','do_backup','','备份','40');
INSERT INTO `cms_role_node` VALUES ('132','backup','restore','恢复','40');
INSERT INTO `cms_role_node` VALUES ('133','backup','del','删除','40');
INSERT INTO `cms_role_node` VALUES ('134','log','','日志列表','41');
INSERT INTO `cms_role_node` VALUES ('135','log','del','删除日志','41');
INSERT INTO `cms_role_node` VALUES ('136','sys_recycle','','系统设置回收站','42');
INSERT INTO `cms_role_node` VALUES ('137','sys_recycle','restore','还原','42');
INSERT INTO `cms_role_node` VALUES ('138','sys_recycle','del','删除','42');
INSERT INTO `cms_role_node` VALUES ('139','deal_coupon','','团购券列表','45');
INSERT INTO `cms_role_node` VALUES ('140','add_dealCoupon','add','新增团购券','45');
INSERT INTO `cms_role_node` VALUES ('141','add_dealCoupon','mod','编辑团购券','45');
INSERT INTO `cms_role_node` VALUES ('142','deal_coupon','del','删除团购券','45');
INSERT INTO `cms_role_node` VALUES ('143','order_incharge','do_incharge','管理员收款','44');
INSERT INTO `cms_role_node` VALUES ('145','user_log','del','删除日志','46');
INSERT INTO `cms_role_node` VALUES ('144','user_log','','浏览日志','46');
INSERT INTO `cms_role_node` VALUES ('146','deal_orders_log','','订单日志列表','47');
INSERT INTO `cms_role_node` VALUES ('147','deal_orders_log','del','删除日志','47');
INSERT INTO `cms_role_node` VALUES ('148','login','','允许登陆','43');
INSERT INTO `cms_role_node` VALUES ('149','view_order','open_order','开放订单','23');
INSERT INTO `cms_role_node` VALUES ('150','view_order','finish_order','结单','23');
INSERT INTO `cms_role_node` VALUES ('151','send_deal_msg',' ','发送','35');
INSERT INTO `cms_role_node` VALUES ('152','paymentNotice',' ','付款单列表','48');
INSERT INTO `cms_role_node` VALUES ('153','nav',' ','导航列表','11');
INSERT INTO `cms_role_node` VALUES ('154','send_coupon_sms',' ','发送短信','45');
INSERT INTO `cms_role_node` VALUES ('155','send_coupon_mail',' ','发送邮件','45');
INSERT INTO `cms_role_node` VALUES ('156','clear_cache','    ','清除缓存列表','49');
INSERT INTO `cms_role_node` VALUES ('157','do_clearCache','','清除缓存','49');
INSERT INTO `cms_role_node` VALUES ('158','set_location_main',' ','设置默认店面','5');
INSERT INTO `cms_role_node` VALUES ('159','set_temp_default',' ','设置模版风格','14');
INSERT INTO `cms_role_node` VALUES ('160','reply_message','reply','回复留言','16');
INSERT INTO `cms_role_node` VALUES ('161','delivery_areaTree',' ','选择配送地区','28');
INSERT INTO `cms_role_node` VALUES ('162','send_test',' ','发送测试邮件','32');
INSERT INTO `cms_role_node` VALUES ('163','deal_orders','search','筛选订单','23');
INSERT INTO `cms_role_node` VALUES ('164','recharge_orders','pay_incharge','管理员支付','24');
INSERT INTO `cms_role_node` VALUES ('165','order_incharge',' ','管理员收款','23');
INSERT INTO `cms_role_node` VALUES ('166','set_mailServer_default',' ','设置默认邮件服务器','32');
INSERT INTO `cms_role_node` VALUES ('167','delivery',' ','发货管理','28');
INSERT INTO `cms_role_node` VALUES ('168','delivery','do_delivery','发货确认操作','28');
DROP TABLE IF EXISTS `cms_sms`;
CREATE TABLE `cms_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `server_url` text NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gbk;
INSERT INTO `cms_sms` VALUES ('1','国宇短信PHP接口','adfasdfasdfasdf','SmsList','a','admin','e00cf25ad42683b3df678c61f42c6bda');
DROP TABLE IF EXISTS `cms_sms_subscription`;
CREATE TABLE `cms_sms_subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gbk;
INSERT INTO `cms_sms_subscription` VALUES ('7','15903467483','91','','1','0');
DROP TABLE IF EXISTS `cms_supplier`;
CREATE TABLE `cms_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk;
INSERT INTO `cms_supplier` VALUES ('1','俏江南','2d2f370d9168a9060ab89ff54493ae5b.jpg','测试供应商','1','1');
INSERT INTO `cms_supplier` VALUES ('2','家居供应商','../images/no_image.gif','家居供应商','2','2');
INSERT INTO `cms_supplier` VALUES ('3','魏家凉皮','../images/no_image.gif','<span style=\"widows: 2; text-transform: none; background-color: rgb(255,255,255); text-indent: 0px; display: inline !important; font: 14px/21px Tahoma, Helvetica, arial, sans-serif; white-space: normal; orphans: 2; float: none; letter-spacing: normal; color: rgb(0,0,0); word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px\">魏家的凉皮，分为米皮和面皮。米皮分为普通米皮以及麻酱凉皮，面皮分为普通面皮以及秘制凉皮两种。魏家四种凉皮继承了陕西凉皮的传统味道。不同的是，明快舒适的环境取代了小摊吃饭的窘迫。点一份凉皮，要是再配上一个外酥里嫩的肉夹馍，便是心满意足的简餐。</span>','1','3');
INSERT INTO `cms_supplier` VALUES ('4','觉品壹号','../images/no_image.gif','无','1','4');
INSERT INTO `cms_supplier` VALUES ('5','砂锅家厨','../images/no_image.gif','','1','5');
INSERT INTO `cms_supplier` VALUES ('6','湘菜公主','../images/no_image.gif','湘菜公主坐落于知春路甲48号盈都大厦，经营正宗湘菜，香辣口味得到各方好评！装修风格，古香古色，在宽敞的大厅，柔和的灯光下用餐，客人都会放松心情，品味正宗湘菜！多款招牌菜式，引来四面八方的食客！风味十足，分量也公道，来这里用餐，享受货真价实的菜品，贴心的服务，和独特风格的优雅！','1','6');
DROP TABLE IF EXISTS `cms_supplier_account`;
CREATE TABLE `cms_supplier_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(255) NOT NULL,
  `account_password` varchar(255) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `login_ip` varchar(255) DEFAULT NULL,
  `login_time` int(11) DEFAULT '0',
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unk_account_name` (`account_name`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=gbk;
INSERT INTO `cms_supplier_account` VALUES ('37','just','202cb962ac59075b964b07152d234b70','5','1','0','','','0','1346086322');
INSERT INTO `cms_supplier_account` VALUES ('38','abc','90e49ea2910e0fa199d5a644eab28adb','5','1','0','aaaaaaaaaa','','0','1393945054');
INSERT INTO `cms_supplier_account` VALUES ('33','sadfasdf','f1c1592588411002af340cbaedd6fc33','12','1','0','asdfasf','','0','1320422637');
INSERT INTO `cms_supplier_account` VALUES ('32','aaaa3','202cb962ac59075b964b07152d234b70','7','1','0','asdf','','0','1320415289');
INSERT INTO `cms_supplier_account` VALUES ('31','asdfasdf','123','7','1','0','as','','0','1320461527');
INSERT INTO `cms_supplier_account` VALUES ('35','aaa','21232f297a57a5a743894a0e4a801fc3','8','1','0','','','0','1335880779');
INSERT INTO `cms_supplier_account` VALUES ('27','safsd5','123','7','1','0','111','','0','1320412716');
DROP TABLE IF EXISTS `cms_supplier_location`;
CREATE TABLE `cms_supplier_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `route` text,
  `address` text,
  `tel` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `point` varchar(255) DEFAULT NULL,
  `supplier_id` int(11) NOT NULL,
  `open_time` varchar(255) DEFAULT NULL,
  `brief` text,
  `is_main` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `api_address` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=gbk;
INSERT INTO `cms_supplier_location` VALUES ('14','测试用','asdf','asdfasdf','sadfasdfasf','sadfasdf','112.5427407','14','sadf','asdfasdf','1','0','山西省太原市金刚里');
INSERT INTO `cms_supplier_location` VALUES ('16','部门二','','','123123','','112.544121','5','','','0','1','山西省太原市金刚里');
INSERT INTO `cms_supplier_location` VALUES ('21','测试','辽宁省鞍山市铁东区胜利路家乐福对面农行入口50米','辽宁省鞍山市铁东区胜利路家乐福对面农行入口50米','00000000','test','(41.108647, 122.994329)','1','','','1','0','辽宁省鞍山市');
INSERT INTO `cms_supplier_location` VALUES ('15','asdfasdfasd','','','','','','7','','','0','0','');
INSERT INTO `cms_supplier_location` VALUES ('17','砂锅家厨','','北京市西城区广安门外红居南街远见名苑5号楼底商','','','(39.8906, 116.351)','5','','','1','0','北京市西城区广安门外红居南街远见名苑5号楼底商');
INSERT INTO `cms_supplier_location` VALUES ('18','dddddd','','','','','','13','','','1','0','');
INSERT INTO `cms_supplier_location` VALUES ('19','gggggg','','aaadddd','','','','13','','','0','0','');
INSERT INTO `cms_supplier_location` VALUES ('20','工夺','随便走','太原市金刚里南区','13004958192','李先生','108.940175','14','3点到9点','本部门没有简介，谢谢！','0','0','陕西西安');
INSERT INTO `cms_supplier_location` VALUES ('22','俏江南（翠微广场店）(北京)','','海淀区复兴路33号新翠微广场5楼东侧315-318（公主坟西北）','00000000','','(39.907753, 116.30388600000003)','1','','','0','0','海淀区复兴路33号新翠微广场5楼东侧315-318（公主坟西北）');
INSERT INTO `cms_supplier_location` VALUES ('23','魏家凉皮（劲松店）','距劲松站约455米','朝阳区劲松中街19-10号（大成家对面）','010-67731290','','(39.8845602, 116.45619950000002)','3','','','1','0','朝阳区劲松中街19-10号');
INSERT INTO `cms_supplier_location` VALUES ('24','湘菜公主','','海淀区知春路盈都大厦3楼','010-58732215','','(39.9765311, 116.33592529999998)','6','','','1','0','海淀区知春路盈都大厦3楼');
DROP TABLE IF EXISTS `cms_templates`;
CREATE TABLE `cms_templates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `style` varchar(255) NOT NULL,
  `is_default` tinyint(4) NOT NULL,
  `preview` varchar(255) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;
INSERT INTO `cms_templates` VALUES ('1','默认风格','default','1','','0');
INSERT INTO `cms_templates` VALUES ('2','fdgfdgfd1','aa1','0','1144978a4b712c77322ed20c8e3daee3.jpg','1');
INSERT INTO `cms_templates` VALUES ('4','asdfasdf','asdfasdf','0','9e8ee3548fd144ba9f26819555e71e16.jpg','1');
INSERT INTO `cms_templates` VALUES ('5','我的模版','yyu','0','80088a27d4a4738dbb0dbf7ce6abdfba.jpg','1');
DROP TABLE IF EXISTS `cms_user`;
CREATE TABLE `cms_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `login_ip` varchar(255) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `score` int(11) NOT NULL,
  `money` double(20,4) NOT NULL,
  `verify` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `pid` int(11) NOT NULL,
  `login_time` int(11) NOT NULL,
  `referral_count` int(11) NOT NULL,
  `password_verify` varchar(255) DEFAULT NULL,
  `integrate_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unk_user_name` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;
INSERT INTO `cms_user` VALUES ('1','kobe810223','90e49ea2910e0fa199d5a644eab28adb','1324024631','1393847116','::1','1','1','0','15919572@qq.com','15903467483','0','1237708.0000','297119','','0','1393847116','0','877956','0');
DROP TABLE IF EXISTS `cms_user_consignee`;
CREATE TABLE `cms_user_consignee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `region_lv1` int(11) NOT NULL,
  `region_lv2` int(11) NOT NULL,
  `region_lv3` int(11) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `consignee` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=gbk;
INSERT INTO `cms_user_consignee` VALUES ('12','1','1','4','53','??????','13333333333','350000','?????');
INSERT INTO `cms_user_consignee` VALUES ('16','12','1','3407','3408','小东门新开南巷','13834544816','030013','李文');
INSERT INTO `cms_user_consignee` VALUES ('17','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('18','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('19','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('20','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('21','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('22','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('23','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('24','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('25','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('26','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('27','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('28','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('29','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('30','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('31','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('32','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('33','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('34','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('35','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('36','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('37','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('38','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('39','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('40','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('41','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('42','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('43','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('44','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('45','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('46','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('47','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('48','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('49','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('50','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('51','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('52','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('53','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('54','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('55','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('56','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('57','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('58','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('59','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('60','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('61','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('62','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('63','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('64','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('65','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('66','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('67','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('68','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('69','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('70','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('71','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('72','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('73','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('74','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('75','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('76','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('77','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('78','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('79','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('80','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('81','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('82','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('83','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('84','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('85','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('86','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('87','12','1','3407','3408','','13834544816','030013','');
INSERT INTO `cms_user_consignee` VALUES ('88','12','1','3407','3408','','13834544816','030013','');
DROP TABLE IF EXISTS `cms_user_extend`;
CREATE TABLE `cms_user_extend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=gbk;
INSERT INTO `cms_user_extend` VALUES ('50','8|9|10|11','1','afasdfasdf|dddd|11134|11555');
INSERT INTO `cms_user_extend` VALUES ('54','8|9|10|11','12','afasdfasdf|是不是|yyy|fff');
INSERT INTO `cms_user_extend` VALUES ('53','8|9|10|11','30','aaa|oooooooooo1|222444|');
INSERT INTO `cms_user_extend` VALUES ('55','8|9|10|11','33','afasdfasdf|sadfasdasdf112|asdfasdfsadfasdf|asdfasdfasdfasdf');
INSERT INTO `cms_user_extend` VALUES ('56','8|9|10|11','34','afasdfasdf|just|believe|yourself');
INSERT INTO `cms_user_extend` VALUES ('57','8|9|10|11','35','afasdfasdf|ho2|ho3|ho4');
INSERT INTO `cms_user_extend` VALUES ('58','8|9|10|11','36','afasdfasdf|aa|bb|cc');
INSERT INTO `cms_user_extend` VALUES ('59','8|9|10|11','37','afasdfasdf|11111|11|2');
INSERT INTO `cms_user_extend` VALUES ('60','8|9|10|11','38','afasdfasdf|1|1|1');
DROP TABLE IF EXISTS `cms_user_field`;
CREATE TABLE `cms_user_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(255) NOT NULL,
  `field_show_name` varchar(255) NOT NULL,
  `input_type` tinyint(1) NOT NULL,
  `value_scope` text NOT NULL,
  `is_must` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unk_field_name` (`field_name`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=gbk;
INSERT INTO `cms_user_field` VALUES ('8','asdfa','我的字段','1','afasdfasdf,aaa','1','1','0');
INSERT INTO `cms_user_field` VALUES ('9','test','临时字段','0','','0','2','0');
INSERT INTO `cms_user_field` VALUES ('10','list','新测试','0','','1','3','0');
INSERT INTO `cms_user_field` VALUES ('11','temp','临时字段','0','','0','5','0');
DROP TABLE IF EXISTS `cms_user_group`;
CREATE TABLE `cms_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `discount` double(20,4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;
INSERT INTO `cms_user_group` VALUES ('1','普通会员','0','1.0000','0');
INSERT INTO `cms_user_group` VALUES ('2','VIP会员','100','0.8000','0');
DROP TABLE IF EXISTS `cms_user_log`;
CREATE TABLE `cms_user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_info` text NOT NULL,
  `log_time` int(11) NOT NULL,
  `log_admin_id` int(11) NOT NULL DEFAULT '0',
  `log_user_id` int(11) NOT NULL DEFAULT '0',
  `money` double(20,4) NOT NULL,
  `score` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;
DROP TABLE IF EXISTS `cms_weight`;
CREATE TABLE `cms_weight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rate` double(20,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gbk;
INSERT INTO `cms_weight` VALUES ('4','千克','1.0000');
INSERT INTO `cms_weight` VALUES ('6','克','0.5000');
