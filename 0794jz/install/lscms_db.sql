--�����Ź�CMS,Version��1.0
--Mysql VERSION��5.5.20
--Create time��2014-03-13 21:58:46
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
INSERT INTO `cms_adv` VALUES ('6','�ҵĹ��','ͷ��','<div><img border=\"0\" alt=\"\" src=\"http://localhost/admin/uploadFiles/40dd2729de930b06c0a5b192a0293d9f.jpg\" /></div>','1','0','0');
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
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=gbk COMMENT='����';
INSERT INTO `cms_city` VALUES ('91','ʯ��ׯ','xdfsda','1','0','90','1','1','ÿ���ṩһ����Ʒ���ѣ�Ϊ����ѡ�������ưɡ�KTV��SPA�������ꡢ�٤�ݵ���ɫ�̼ң�ֻҪ�չ�����Ź��������������޵��ۿ�','<p>��ӭ������</p>','','','');
INSERT INTO `cms_city` VALUES ('94','ССʯ','xxs','1','1','91','1','0','adsfasdf','asdfasdfsadf','','','');
INSERT INTO `cms_city` VALUES ('90','�ӱ�','kobe','1','0','0','1','0','asdfasdfasd','asdfasdfasf','','','');
INSERT INTO `cms_city` VALUES ('95','̫ԭ��','taiyuan','1','0','0','1','0','aaa2222','<p>̫ԭ�Ź���ӭ���ĵ�����</p>','c','d','e');
INSERT INTO `cms_city` VALUES ('96','С��','xiaodian','1','0','95','1','0','c','c','','','');
DROP TABLE IF EXISTS `cms_config`;
CREATE TABLE `cms_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `input_type` tinyint(1) NOT NULL COMMENT '??????? 0:???? 1:????? 2:???? 3:???',
  `value_scope` text NOT NULL COMMENT '������������� 0:�ı����� 1:���������� 2:ͼƬ�ϴ� 3:�༭��',
  `show_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=gbk;
INSERT INTO `cms_config` VALUES ('1','URL_MODEL','0','1','0,1','URLģʽ');
INSERT INTO `cms_config` VALUES ('2','TIME_ZONE','8','1','0,8','������ʱ��');
INSERT INTO `cms_config` VALUES ('3','ADMIN_LOG','1','1','0,1','ϵͳ��־');
INSERT INTO `cms_config` VALUES ('4','FILE_MAXSIZE','1000000','0','','�ļ��ϴ���С���ֽڣ�');
INSERT INTO `cms_config` VALUES ('5','ALLOW_FILE_EXT','jpg,gif,png,rar,zip,doc,bmp','0','','�ϴ��ļ�����');
INSERT INTO `cms_config` VALUES ('6','GOOGLE_API_KEY','','0','','GOOGLE��ͼ��Կ');
INSERT INTO `cms_config` VALUES ('7','IS_CART','1','1','0,1','�������ﳵ');
INSERT INTO `cms_config` VALUES ('8','SUBMIT_DELAY','1','0','','����ˢ������룩');
INSERT INTO `cms_config` VALUES ('9','APP_MSG_SEND','1','1','0,1','��Ϣǰ̨����');
INSERT INTO `cms_config` VALUES ('10','ADMIN_MSG_SEND','1','1','0,1','��Ϣ��̨����');
INSERT INTO `cms_config` VALUES ('11','IS_SITE_OPEN','1','1','0,1','��վ����');
INSERT INTO `cms_config` VALUES ('12','SITE_CLOSE_HTML','<div class=\"closed_box\">
<div class=\"closed_body_top\">&nbsp;</div>
<div class=\"closed_body\">
<div class=\"content\">��վ�ѹر�<br />
�����Ժ����</div>
</div>
<div class=\"closed_shadow\">&nbsp;</div>
<div class=\"clear\">&nbsp;</div>
</div>','3','','��վ�ر�ҳ');
INSERT INTO `cms_config` VALUES ('13','IS_GZIP','0','1','0,1','GZIPѹ��');
INSERT INTO `cms_config` VALUES ('14','IS_CACHE','1','1','0,1','���濪��״̬');
INSERT INTO `cms_config` VALUES ('15','EXPIRED_TIME','1','0','','��̨��ʱʱ�䣨�룩');
INSERT INTO `cms_config` VALUES ('16','BIG_WIDTH','100','0','','��ͼ���');
INSERT INTO `cms_config` VALUES ('17','BIG_HEIGHT','100','0','','��ͼ�߶�');
INSERT INTO `cms_config` VALUES ('18','SMALL_WIDTH','50','0','','Сͼ���');
INSERT INTO `cms_config` VALUES ('19','SMALL_HEIGHT','50','0','','Сͼ�߶�');
INSERT INTO `cms_config` VALUES ('20','WATER_MARK','41710042a5353b42e8659c4b26a6ccd8.jpg','2','','ˮӡͼƬ');
INSERT INTO `cms_config` VALUES ('21','MARK_ALPHA','100','0','','ˮӡ͸����');
INSERT INTO `cms_config` VALUES ('22','MARK_POSITION','1','1','1,2,3,4,5','ˮӡλ��');
INSERT INTO `cms_config` VALUES ('23','IMG_MAXSIZE','100000','0','','�ϴ�ͼƬ��С');
INSERT INTO `cms_config` VALUES ('24','ALLOW_IMG_EXT','jpg,gif,png','0','','�ϴ�ͼƬ����');
INSERT INTO `cms_config` VALUES ('25','BG_COLOR','#ffffff','0','','����ɫ');
INSERT INTO `cms_config` VALUES ('26','IS_MARK_OPEN','0','1','0,1','����ˮӡ');
INSERT INTO `cms_config` VALUES ('27','USER_VERIFY','0','1','0,1','��Աע����֤');
INSERT INTO `cms_config` VALUES ('28','INVITE_REFERRALS','20','0','','���뷵��');
INSERT INTO `cms_config` VALUES ('29','REFERRALS_TYPE','0','1','0,1','��������');
INSERT INTO `cms_config` VALUES ('30','MSG_AUTO_EFFECT','1','1','0,1','�����Զ���Ч');
INSERT INTO `cms_config` VALUES ('31','REFERRAL_LIMIT','10','0','','����������');
INSERT INTO `cms_config` VALUES ('32','REFERRAL_DELAY','1','0','','������ʱ�����ӣ�');
INSERT INTO `cms_config` VALUES ('33','MOBILE_MUST','0','1','0,1','��Ա�ֻ�����');
INSERT INTO `cms_config` VALUES ('34','CURRENCY_UNIT','0','1','0,1','���ҵ�λ');
INSERT INTO `cms_config` VALUES ('35','SCORE_UNIT','����','0','','���ֵ�λ');
INSERT INTO `cms_config` VALUES ('36','SITE_LOGO','ae2032bbda6523589c4b5adc8da1541a.png','2','','��վ��ʶ');
INSERT INTO `cms_config` VALUES ('37','SITE_TITLE','�����Ź�ϵͳ,�����������PHP��Դ�Ź�ϵͳ','0','','վ������');
INSERT INTO `cms_config` VALUES ('38','SITE_KEYWORD','aa','0','','�ؼ���');
INSERT INTO `cms_config` VALUES ('39','SITE_DESCRIPTION','aa','0','','վ������');
INSERT INTO `cms_config` VALUES ('40','SITE_TEL','0351-3378551','0','','��ϵ�绰');
INSERT INTO `cms_config` VALUES ('41','SIDE_DEAL_NUM','4','1','1,2,3,4','�����Ź��б����');
INSERT INTO `cms_config` VALUES ('42','SIDE_MSG_NUM','5','1','1,2,3,4,5,6,7,8','���������б���');
INSERT INTO `cms_config` VALUES ('43','ONLINE_QQ','111111,222222','0','','����QQ');
INSERT INTO `cms_config` VALUES ('44','ONLINE_TIME','��һ������ 9:00-18:00','0','','�ͷ�����ʱ��');
INSERT INTO `cms_config` VALUES ('45','DEAL_PAGE_SIZE','6','0','','�Ź���ҳ��');
INSERT INTO `cms_config` VALUES ('46','PAGE_SIZE','10','0','','������ҳ');
INSERT INTO `cms_config` VALUES ('47','HELP_CATE_NUM','5','0','','����������');
INSERT INTO `cms_config` VALUES ('48','HELP_ITEM_NUM','5','0','','������ʾ��');
INSERT INTO `cms_config` VALUES ('49','SITE_FOOTER','��Ȩ���� &copy;&nbsp; 2013&nbsp; ���пƼ�&nbsp;&nbsp; �����绰��15903467483&nbsp; <a target=\"_blank\" href=\"http://www.miibeian.gov.cn/\">��ICP��09007422��</a>','3','','վ��ײ���Ϣ');
INSERT INTO `cms_config` VALUES ('50','REFERRAL_HELP','Dadsfasdf','3','','��������˵��');
INSERT INTO `cms_config` VALUES ('51','REFERRAL_SIDE_HELP','&nbsp;','3','','����ҳ�Ҳ���˵��');
INSERT INTO `cms_config` VALUES ('52','COUPON_NAME','����ȯ','0','','�Ź�ȯ����');
INSERT INTO `cms_config` VALUES ('53','COUPON_PRT_TPL','<div style=\"border-bottom: #000000 1px solid; border-left: #000000 1px solid; padding-bottom: 10px; margin: 0px auto; padding-left: 10px; width: 600px; padding-right: 10px; font-size: 14px; border-top: #000000 1px solid; border-right: #000000 1px solid; padding-top: 10px\">
<table class=\"dataEdit\" cellspacing=\"0\" cellpadding=\"0\">
    <tbody>
        <tr>
            <td width=\"400\"><img border=\"0\" alt=\"\" src=\"&lt;{$coupon.logo}&gt;\" /></td>
            <td style=\"font-family: verdana; font-size: 22px; font-weight: bolder\" width=\"43%\">���кţ�&lt;{$coupon.sn}&gt;<br />
            ���룺&lt;{$coupon.password}&gt;</td>
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
            <td style=\"padding-bottom: 5px; padding-left: 5px; padding-right: 5px; font-family: ΢���ź�; height: 50px; font-size: 28px; font-weight: bolder; padding-top: 5px\" colspan=\"2\">&lt;{$coupon.deal_name}&gt;</td>
        </tr>
        <tr>
            <td style=\"line-height: 22px; padding-right: 20px; font-size: 14px\" valign=\"top\" width=\"400\">&lt;{$coupon.user_name}&gt;<br />
            ��Чʱ��:&lt;{$coupon.begin_time}&gt;<br />
            ����ʱ��:&lt;{$coupon.end_time}&gt;<br />
            �̼ҵ绰�� &lt;{$coupon.tel}&gt;<br />
            �̼ҵ�ַ: &lt;{$coupon.address}&gt;<br />
            ��ͨ·��: &lt;{$coupon.route}&gt;<br />
            Ӫҵʱ�䣺 &lt;{$coupon.open_time}&gt;<br />
            &nbsp;</td>
            <td>
            <div style=\"width: 255px; height: 255px\" id=\"map_canvas\">&nbsp;</div>
            <br />
            &nbsp;</td>
        </tr>
    </tbody>
</table>
</div>','3','','�Ź�ȯ��ӡģ��');
INSERT INTO `cms_config` VALUES ('54','SHOW_DEAL_CATE','1','1','0,1','��ʾ�Ź�����');
INSERT INTO `cms_config` VALUES ('55','REFERRAL_IP_LIMIT','0','1','0,1','������IP����');
INSERT INTO `cms_config` VALUES ('56','UNSUBSCRIBE_MAIL_TIP','���յ����ʼ�����Ϊ��������%sÿ���Ƽ����¡����������������մ����ʼ�������ʱ%s','0','','�ƹ��ʼ��˶���ʾ');
INSERT INTO `cms_config` VALUES ('57','FOOTER_LOGO','2750be3d2a7649e27e2baac04e6e7c76.png','2','','�ײ���ʶ');
INSERT INTO `cms_config` VALUES ('58','SITE_TITLE','�����Ź�ϵͳ,�����������PHP��Դ�Ź�ϵͳ','0','','վ�����');
INSERT INTO `cms_config` VALUES ('59','COUPON_MAIL_NOTICE','1','1','0,1','�Ź�ȯ�ʼ�֪ͨ');
INSERT INTO `cms_config` VALUES ('60','COUPON_SMS_NOTICE','1','1','0,1','�Ź�ȯ����֪ͨ');
INSERT INTO `cms_config` VALUES ('61','PAYMENT_MAIL_NOTICE','1','1','0,1','�տ�ʼ�֪ͨ');
INSERT INTO `cms_config` VALUES ('62','PAYMENT_SMS_NOTICE','0','1','0,1','�տ����֪ͨ');
INSERT INTO `cms_config` VALUES ('63','REPLY_MAIL_ADD','ffff@qq.com','0','','�ʼ��ظ���ַ');
INSERT INTO `cms_config` VALUES ('64','DELIVERY_MAIL_NOTICE','1','1','0,1','�����ʼ�֪ͨ');
INSERT INTO `cms_config` VALUES ('65','DELIVERY_SMS_NOTICE','0','1','0,1','��������֪ͨ');
INSERT INTO `cms_config` VALUES ('66','MAIL_ON','1','1','0,1','�����ʼ�����');
INSERT INTO `cms_config` VALUES ('67','SMS_ON','0','1','0,1','�������Ź���');
INSERT INTO `cms_config` VALUES ('68','COUPON_MAIL_LIMIT','3','0','','�Ź�ȯ�ʼ�֪ͨ����');
INSERT INTO `cms_config` VALUES ('69','COUPON_SMS_LIMIT','3','0','','�Ź�ȯ����֪ͨ����');
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
INSERT INTO `cms_deal` VALUES ('1','��ʤ����·�����������ͷ��','������ͷ��','1','1','826de0b232653aaedd4158b89e1eef2b_new.jpg','�ײͽ��ܡ�����������27Ԫ�����ֵ29Ԫ�����������ͷ�ݡ����������ײ�1λ������ԤԼ���Ե�ʵ�ݳԵ���ζ��<br />
������֪��ܰ��ʾ<br />
��Ч���ڣ�<br />
2013��12��19��-2014��06��18��<br />
�޹�������<br />
����Ʒ���޹���<br />
ʹ�ù���<br />
ÿ�Űٶ��Ź�ȯ���1��ʹ�ã������Ƿ��ͯ����������<br />
ԤԼ���ѣ�<br />
����Ʒ����ԤԼ<br />
�ڼ�˵����<br />
��ĩ�������ڼ���ͨ��<br />
������ʾ��<br />
�����ò�2Сʱ <br />
���ֲ�Ʒ��ʱ��ԭ��������ͬ�����Ե��ڵ���ʵ�ʹ�ӦΪ׼ <br />
����Ʒ�����ܵ��������Żݣ��Ż�ȯ���һ��������� <br />','0','0','100','200','1','1','29.0000','27.0000','91','1','0','1','0','0','0','1','0','0','0','0.0000','2','','1','0','0','1394118017','1394118017','tg','0.0000','0','0','0','0.0000','���������ͷ��','���������ͷ��','���������ͷ��','0','0','0');
INSERT INTO `cms_deal` VALUES ('2','κ����Ƥ','κ����Ƥ','1','3','7f56cf5e6ffea5ec21b3de62c7961759_new.jpg','������ͷ����Ƥ������ʱ��Ƥ����͸���������ж������������һ�ţ����ú�һ����һ��֮����Ĩ����ͣ���һ��������������ڰ�ͷ��ͬ����һ�㡣�Ե�ʱ��̯��ȡһ�ŷ�������ѩ��ɴ���İ��ϣ���һ�Ѵ���ա����������&ldquo;�ۡ��ۡ���&hellip;&hellip;&rdquo;���±��Ƥ���гɿ��Ӱ��ϸ��Ȼ������Ρ��ס����Ƶĵ���ˮ�ȣ�����ÿ�������һ��Ƥ����ʢ�������������͵Ĺ���������һպ����׵���Ƥ�����������ͣ�������ڣ���ζ���Ѿ������˿�ˮֱ���������˳�һ�ڣ�Ƥ�ӽ������ζ��������ζ�ǳ���<br />
κ�ҵ���Ƥ����Ϊ��Ƥ����Ƥ����Ƥ��Ϊ��ͨ��Ƥ�Լ��齴��Ƥ����Ƥ��Ϊ��ͨ��Ƥ�Լ�������Ƥ���֡�κ��������Ƥ�̳���������Ƥ�Ĵ�ͳζ������ͬ���ǣ��������ʵĻ���ȡ����С̯�Է��ľ��ȡ���һ����Ƥ��Ҫ��������һ���������۵�����ɣ�������������ļ�͡�<br />','0','0','100','100','1','1','18.0000','12.6000','91','0','0','1','0','0','1','1','0','0','0','0.0000','0','������ɫ��Ƥ����ͳ�ص���ζ������12.6Ԫ����ֵ18Ԫ��κ����Ƥ���˲ͣ���Ƥ/��Ƥ��ѡ����׵���Ƥ�����������ͣ���ζ��������ζ�ǳ�','2','0','0','1394362027','1394362027','wj','0.0000','0','0','0','0.0000','κ����Ƥ','κ����Ƥ','κ����Ƥ','0','0','0');
INSERT INTO `cms_deal` VALUES ('3','��ƷҼ��','��ƷҼ��','1','4','3cfd1a96b2967154331ba47985eb0a58_new.jpg','��ܰ��ʾ<br />
��Ч���ڣ�<br />
2014��02��13��-05��31��<br />
�޹�������<br />
����Ʒ���޹���<br />
ʹ�ù���<br />
ÿ���Ż�ȯ����ʹ��1�Σ�����4��ʹ��<br />
ԤԼ���ѣ�<br />
����ǰ1���µ�ԤԼ<br />
������ʾ��<br />
���޴����òͣ��̼��ް���<br />
������ʳ�����ṩ��ǰ������ͱ����������赽���������1Ԫ/��<br />
��ˮ�����ϵ����⣬���µ��̼���ѯ�����̼ҷ���Ϊ׼<br />
�̼�����ṩWiFi<br />
�̼��ṩ�շ�ͣ��λ150�����շѱ�׼8Ԫ/Сʱ<br />
����Ʒ�����ܵ��������Żݣ��Ż�ȯ���һ���������','0','0','100','100','0','0','988.0000','188.0000','91','1','0','1','0','0','1','1','0','0','0','0.0000','0','�������š���188Ԫ�����ֵ988Ԫ����ƷҼ�š������ײͣ�����ṩWifi��������Ͳͣ�����į�������䣬ֻ����һ������С�ĸо���','3','0','0','1394362987','1394362987','Jp','0.0000','0','0','0','0.0000','��ƷҼ��','��ƷҼ��','��ƷҼ��','0','0','0');
INSERT INTO `cms_deal` VALUES ('4','�������֡�ɰ���ҳ�','ɰ���ҳ�','1','5','7681568c0d46384091ec0c46bfb17719_new.jpg','�̼ҽ���<br />
ɰ������ɰ�������ƳɵĹ�����ʱ�򲿷����ԡ�<br />
����ɰ���Ĳ�����ɰ������ɰ��������ɰ����ͷ�ȡ�<br />
�ص㣺<br />
��������ǿ��<br />
�ʵض�ף��������������ͷ�ʳ��ζ����<br />
������ʱ��Ҫ���������ϴ��ˮ��У���ʹ�䲻�������ѡ�<br />
�����²�仯����Ҫ����С��������<br />
ɰ���ı���<br />
ɰ������ʯӢ����ʯ��ճ���ȶ���ԭ���Ƴɵ�����Ʒ�������������������γ�һ�ֲ����塣���ֲ�������²���Ӧ�����ϲɰ����Ȼ�������䣬�����𼱾����ͻ����������������ѡ����ɰ����һ���ԣ�ʹ��ʱ����ע�����¼������棺<br />
1��Ҫ�𽥼��£���Ҫ��Ȼ�ڴ�����գ��������ѡ�<br />
2���պ�ʳ���ɰ�����ʱ����ľƬ�ѹ���������ʹ�����ɢ�ȣ�������ȴ���������ѡ�Ҳ�ɸ���ɰ����С����һ����Ȧ����ɰ�����󣬷�����Ȧ�ϣ�ʹ��ײ���ֱ�Ӵ��أ�������Ȼ���£���ʹɰ��ʹ��ʱ�����Щ��<br />
3����������ɰ��������©ˮ�������������ɰ�۵�Ե�ʡ��¹���һ��ʹ��ʱ�������������ϡ�࣬������Ȳ�ˢ���������Ż�¯�߿�һ�£�ʹ���������ɽᣬ��ס��������Щ΢С��ɰ�ۣ�Ȼ��ϴ����������ɰ���Ͳ���©ˮ�ˡ�','0','0','100','100','0','0','60.0000','42.0000','91','1','0','1','0','0','1','1','0','0','0','0.0000','0','������������42Ԫ�����ֵ60Ԫ��ɰ���ҳ���˫���ײͶ�ѡһ����һ������ʳ���ܣ�������������������','4','0','0','0','0','sg','0.0000','0','0','0','0.0000','ɰ���ҳ�','ɰ���ҳ�','ɰ���ҳ�','0','0','0');
INSERT INTO `cms_deal` VALUES ('5','��˹���','��˹���','1','6','5ea522bca7b89b5d98d2fddb73b86065_new.jpg','<table style=\"border-bottom: rgb(226,226,226) 1px solid; border-left: rgb(226,226,226) 1px solid; widows: 2; text-transform: none; background-color: rgb(255,255,255); text-indent: 0px; border-spacing: 0px; border-collapse: collapse; font: 14px/21px tahoma, arial, ����, sans-serif; white-space: normal; orphans: 2; margin-bottom: 18px; letter-spacing: normal; color: rgb(51,51,51); border-top: rgb(226,226,226) 1px solid; border-right: rgb(226,226,226) 1px solid; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">
    <tbody>
        <tr>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">�ɹ�ţ��</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">1��</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">46Ԫ</td>
        </tr>
        <tr>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">����С����</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">1��</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">26Ԫ</td>
        </tr>
        <tr>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">��˿�����޲�</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">1��</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">22Ԫ</td>
        </tr>
        <tr>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">�����Ź���</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">1��</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">20Ԫ</td>
        </tr>
        <tr>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">�׷�</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">2��</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">6Ԫ</td>
        </tr>
        <tr>
            <th style=\"border-bottom: 0px; border-left: 0px; padding-bottom: 0px; font-style: normal; margin: 0px; outline-style: none; outline-color: invert; padding-left: 0px; outline-width: 0px; padding-right: 0px; border-top: 0px; font-weight: normal; border-right: 0px; padding-top: 0px\" colspan=\"3\">��������2ѡ1</th>
        </tr>
        <tr>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">�������</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">2��</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">40Ԫ</td>
        </tr>
        <tr>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">��֭������֭�����ܲ�֭3ѡ1</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">2��</td>
            <td style=\"border-bottom: rgb(226,226,226) 1px solid; text-align: center; border-left: rgb(226,226,226) 1px solid; padding-bottom: 0px; line-height: 26px; margin: 0px; outline-style: none; outline-color: invert; padding-left: 10px; outline-width: 0px; padding-right: 10px; font-size: 14px; word-break: break-all; border-top: rgb(226,226,226) 1px solid; font-weight: normal; border-right: rgb(226,226,226) 1px solid; padding-top: 0px\">40Ԫ</td>
        </tr>
    </tbody>
</table>','1394364951','1425900953','50','50','1','1','160.0000','39.9000','91','1','0','1','0','0','5','1','0','0','0','0.0000','0','����39.9Ԫ,��ֵ160Ԫ������˫���ײ�!���ʱ�н�����ʳ,Ӫ����ζ�����ͣ!','5','0','0','1394364949','1394364949','xc','0.0000','0','0','0','0.0000','��˹���','��˹���','��˹���','0','0','0');
INSERT INTO `cms_deal` VALUES ('6','�����ġ�����ʳ��','����ʳ��','1','1','868325ebc97cbff0ab90d87da38c2ac4_new.jpg','����ʳ������Ϊ���ڡ���������������Ⱥ�ۣ�����ʳ������ɫ�����껢Ϫɽ�����������ʳ�����Ļ������γɣ��˿�ν�Ǽ��˴��ϵΪһ�壬���߹�������һϯ��ÿ���˶�����ϸ����ʷԨԴ���硾�ػ��߹ޡ���˧�˸ɹ����ȡ� ����ʳ���Ĳ˾�����ϸ�����Գ�һ�壬���ϱ��ɳ����ֽ���������ʱ�����������ʳ֮��������������֮���ʣ�������֮���������ա�³����֮��ʳ��������������֮���ȣ�����������չ���޽��������&hellip;&hellip;','1425902698','0','1','5','1','1','3032.0000','488.0000','91','1','0','1','0','0','0','0','0','0','0','0.0000','0','�����ġ���488Ԫ�����ֵ3032Ԫ������ʳ��������8-10�˲ͣ����˴��ϵΪһ�壬������ˣ�����С�����������ѣ��óԲ���','6','0','0','0','0','gq','0.0000','0','0','0','0.0000','����ʳ��','����ʳ��','����ʳ��','0','0','0');
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
INSERT INTO `cms_deal_cart` VALUES ('1','j55bvvd70r6ru6odlkt94skl40','0','1','��ʤ����·�����������ͷ��','0','27.0000','1','27.0000','72e6f6e0f08ca88f02b1480464afd55b','1394284854','1394284854','0.0000','0.0000','2','2','0','������ͷ��');
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
INSERT INTO `cms_deal_category` VALUES ('1','ʳƷ','','0','0','1','1');
INSERT INTO `cms_deal_category` VALUES ('2','�Ҿ�','','0','0','1','2');
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
INSERT INTO `cms_deal_order_item` VALUES ('52','169','1','55.0000','55.0000','0','����63Ԫ����ֵ78Ԫ�Ļ���ɽ����������1λ','0','0','0','09a08a724fc5c77095f6a700f7e31a4c','90','0.0000','0.0000','0','aaaa');
INSERT INTO `cms_deal_order_item` VALUES ('53','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','91','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('54','169','1','55.0000','55.0000','0','����63Ԫ����ֵ78Ԫ�Ļ���ɽ����������1λ','0','0','0','09a08a724fc5c77095f6a700f7e31a4c','92','0.0000','0.0000','0','aaaa');
INSERT INTO `cms_deal_order_item` VALUES ('55','169','1','55.0000','55.0000','0','����63Ԫ����ֵ78Ԫ�Ļ���ɽ����������1λ','0','0','0','09a08a724fc5c77095f6a700f7e31a4c','93','0.0000','0.0000','0','aaaa');
INSERT INTO `cms_deal_order_item` VALUES ('56','169','1','55.0000','55.0000','0','����63Ԫ����ֵ78Ԫ�Ļ���ɽ����������1λ','0','0','0','09a08a724fc5c77095f6a700f7e31a4c','94','0.0000','0.0000','0','aaaa');
INSERT INTO `cms_deal_order_item` VALUES ('57','169','1','55.0000','55.0000','0','����63Ԫ����ֵ78Ԫ�Ļ���ɽ����������1λ','0','0','0','09a08a724fc5c77095f6a700f7e31a4c','95','0.0000','0.0000','0','aaaa');
INSERT INTO `cms_deal_order_item` VALUES ('58','155','1','8.0000','8.0000','0','ggggaaaaaaaa','0','0','0','efe67fc48043a73a83de70dbb9eaacfa','96','0.0000','0.0000','0','ddddd');
INSERT INTO `cms_deal_order_item` VALUES ('59','169','1','55.0000','55.0000','0','����63Ԫ����ֵ78Ԫ�Ļ���ɽ����������1λ','0','0','0','09a08a724fc5c77095f6a700f7e31a4c','97','0.0000','0.0000','0','aaaa');
INSERT INTO `cms_deal_order_item` VALUES ('60','169','1','55.0000','55.0000','0','����63Ԫ����ֵ78Ԫ�Ļ���ɽ����������1λ','0','0','0','09a08a724fc5c77095f6a700f7e31a4c','98','0.0000','0.0000','0','aaaa');
INSERT INTO `cms_deal_order_item` VALUES ('61','169','1','55.0000','55.0000','0','����63Ԫ����ֵ78Ԫ�Ļ���ɽ����������1λ','0','0','0','09a08a724fc5c77095f6a700f7e31a4c','99','0.0000','0.0000','0','aaaa');
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
INSERT INTO `cms_delivery_area` VALUES ('1','0','������','1','1','0');
INSERT INTO `cms_delivery_area` VALUES ('2','0','�����','1','2','0');
INSERT INTO `cms_delivery_area` VALUES ('3','0','�Ϻ���','1','3','0');
INSERT INTO `cms_delivery_area` VALUES ('4','0','�㶫ʡ','1','4','0');
INSERT INTO `cms_delivery_area` VALUES ('5','1','������','2','1','0');
INSERT INTO `cms_delivery_area` VALUES ('6','5','������','3','1','0');
INSERT INTO `cms_delivery_area` VALUES ('7','5','������','3','2','0');
INSERT INTO `cms_delivery_area` VALUES ('8','5','������','3','3','0');
INSERT INTO `cms_delivery_area` VALUES ('9','5','������','3','4','0');
INSERT INTO `cms_delivery_area` VALUES ('10','5','������','3','5','0');
INSERT INTO `cms_delivery_area` VALUES ('11','5','������','3','6','0');
INSERT INTO `cms_delivery_area` VALUES ('12','5','��̨��','3','7','0');
INSERT INTO `cms_delivery_area` VALUES ('13','5','ʯ��ɽ��','3','8','0');
INSERT INTO `cms_delivery_area` VALUES ('14','5','��ɽ��','3','9','0');
INSERT INTO `cms_delivery_area` VALUES ('15','5','��ͷ����','3','10','0');
INSERT INTO `cms_delivery_area` VALUES ('16','5','ͨ����','3','11','0');
INSERT INTO `cms_delivery_area` VALUES ('17','5','˳����','3','12','0');
INSERT INTO `cms_delivery_area` VALUES ('18','5','��ƽ��','3','13','0');
INSERT INTO `cms_delivery_area` VALUES ('19','5','������','3','14','0');
INSERT INTO `cms_delivery_area` VALUES ('20','5','ƽ����','3','15','0');
INSERT INTO `cms_delivery_area` VALUES ('21','5','������','3','16','0');
INSERT INTO `cms_delivery_area` VALUES ('22','5','������','3','17','0');
INSERT INTO `cms_delivery_area` VALUES ('23','5','������','3','18','0');
INSERT INTO `cms_delivery_area` VALUES ('24','4','����','2','1','0');
INSERT INTO `cms_delivery_area` VALUES ('25','4','����','2','2','0');
INSERT INTO `cms_delivery_area` VALUES ('26','4','����','2','3','0');
INSERT INTO `cms_delivery_area` VALUES ('27','4','��ݸ','2','4','0');
INSERT INTO `cms_delivery_area` VALUES ('28','4','��ɽ','2','5','0');
INSERT INTO `cms_delivery_area` VALUES ('29','4','��Դ','2','6','0');
INSERT INTO `cms_delivery_area` VALUES ('30','4','����','2','7','0');
INSERT INTO `cms_delivery_area` VALUES ('31','4','����','2','8','0');
INSERT INTO `cms_delivery_area` VALUES ('32','4','����','2','9','0');
INSERT INTO `cms_delivery_area` VALUES ('33','4','ï��','2','10','0');
INSERT INTO `cms_delivery_area` VALUES ('34','4','÷��','2','11','0');
INSERT INTO `cms_delivery_area` VALUES ('35','4','��Զ','2','12','0');
INSERT INTO `cms_delivery_area` VALUES ('36','4','��ͷ','2','13','0');
INSERT INTO `cms_delivery_area` VALUES ('37','4','��β','2','14','0');
INSERT INTO `cms_delivery_area` VALUES ('38','4','�ع�','2','15','0');
INSERT INTO `cms_delivery_area` VALUES ('39','4','����','2','16','0');
INSERT INTO `cms_delivery_area` VALUES ('40','4','�Ƹ�','2','17','0');
INSERT INTO `cms_delivery_area` VALUES ('41','4','տ��','2','18','0');
INSERT INTO `cms_delivery_area` VALUES ('42','4','����','2','19','0');
INSERT INTO `cms_delivery_area` VALUES ('43','0','����ʡ','1','5','0');
INSERT INTO `cms_delivery_area` VALUES ('44','0','����ʡ','1','6','0');
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
INSERT INTO `cms_delivery_fee` VALUES ('79','22','1,3407,3408','ɽ��ʡ,̫ԭ��1,�ӻ�����','2.0000','2.0000','2.0000','2.0000');
INSERT INTO `cms_delivery_fee` VALUES ('72','23','3406,3413','����ʡ,������','3.0000','3.0000','3.0000','2.0000');
INSERT INTO `cms_delivery_fee` VALUES ('73','23','3407','̫ԭ��1','2.0000','2.0000','1.0000','1.0000');
INSERT INTO `cms_delivery_fee` VALUES ('78','22','3408,3413','�ӻ�����,������','1.0000','1.0000','1.0000','1.0000');
INSERT INTO `cms_delivery_fee` VALUES ('66','25','3416','�ػʵ�','2.0000','1.0000','1.0000','1.0000');
INSERT INTO `cms_delivery_fee` VALUES ('67','27','3413','������','11.0000','11.0000','23.0000','23.0000');
INSERT INTO `cms_delivery_fee` VALUES ('68','27','3408','�ӻ�����','34.0000','34.0000','34.0000','34.0000');
INSERT INTO `cms_delivery_fee` VALUES ('82','29','1','ɽ��ʡ','5.0000','4.0000','7.0000','6.0000');
INSERT INTO `cms_delivery_fee` VALUES ('81','29','3408','�ӻ�����','2.0000','2.0000','2.0000','2.0000');
INSERT INTO `cms_delivery_fee` VALUES ('80','22','3413,3418','������,�ϲ���','6.0000','5.0000','3.0000','7.0000');
INSERT INTO `cms_delivery_fee` VALUES ('83','29','3413','������','34.0000','34.0000','34.0000','34.0000');
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
INSERT INTO `cms_delivery_notice` VALUES ('13','20121127102240257','1353997360','1','1380300547','31','12','�����ٳ�');
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
INSERT INTO `cms_info_cate` VALUES ('20','�û�����','1','0','help','4');
INSERT INTO `cms_info_cate` VALUES ('15','��ȡ����','1','0','help','2');
INSERT INTO `cms_info_cate` VALUES ('17','��˾��Ϣ','1','0','help','1');
INSERT INTO `cms_info_cate` VALUES ('18','�������','1','0','help','3');
INSERT INTO `cms_info_cate` VALUES ('21','������Ϣ','1','0','normal','5');
INSERT INTO `cms_info_cate` VALUES ('22','�Ź���̬','1','0','normal','1');
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
INSERT INTO `cms_infos` VALUES ('34','����������ӹ�����Ϣ','����������ӹ�����Ϣ','21','1394369322','0','6','1','','0','0','0','1','','','');
INSERT INTO `cms_infos` VALUES ('35','����������ӹ�����Ϣ','����������ӹ�����Ϣ','21','1394369361','0','6','1','','0','0','0','2','','','');
INSERT INTO `cms_infos` VALUES ('36','����������ӹ�����Ϣ','����������ӹ�����Ϣ','21','1394369369','0','6','1','','0','0','0','3','','','');
INSERT INTO `cms_infos` VALUES ('37','����������ӹ�����Ϣ','����������ӹ�����Ϣ','21','1394369381','0','6','1','','0','0','0','4','','','');
INSERT INTO `cms_infos` VALUES ('38','����������ӹ�����Ϣ','����������ӹ�����Ϣ','21','1394369389','0','6','1','','0','0','0','5','','','');
INSERT INTO `cms_infos` VALUES ('39','��������','��������','20','1394440861','0','6','1','','0','0','0','10','','','');
INSERT INTO `cms_infos` VALUES ('40','��������','��������','20','1394442469','0','6','1','','0','0','0','11','','','');
INSERT INTO `cms_infos` VALUES ('41','������Ϣ','������Ϣ','18','1394442503','0','6','1','','0','0','0','13','','','');
INSERT INTO `cms_infos` VALUES ('42','������Ϣ','������Ϣ','18','1394442520','0','6','1','','0','0','0','14','','','');
INSERT INTO `cms_infos` VALUES ('43','��������','��������','15','1394442536','0','6','1','','0','0','0','15','','','');
INSERT INTO `cms_infos` VALUES ('44','��������','��������','15','1394442553','0','6','1','','0','0','0','16','','','');
INSERT INTO `cms_infos` VALUES ('45','��������','��������','17','1394442565','0','6','1','','0','0','0','17','','','');
INSERT INTO `cms_infos` VALUES ('46','��������','��������','17','1394442582','0','6','1','','0','0','0','18','','','');
INSERT INTO `cms_infos` VALUES ('26','�ϰ����Ͼ��˾��Ź�Լ39Ԫ','��ȥ�Է�֮ǰ����������һ����ʲô�Ź��Ĳ��������˵�ӰԺ����ֻ���һ���Ƿ���Ʊ�����Ź����Ź��ѱ��������һ�����ʽ�����������ߴ�&ldquo;��800&rdquo;��վ��Ŀǰ���ڴ��͵Ķ����Ź�������վ���ĵ��鱨���ϻ�Ϥ�������ϰ��꣬�Ͼ����Ź��ܶ�ﵽ��ʷ��߼�¼��ƽ��ÿ�춼��3���˲μ��Ź�����������ͬ��������˰������ֻ��Ź������µ���������1��Сʱ����ɡ�<br />
<br />
��������12���Ź���վ<br />
<br />
&ldquo;ƽʱ�����Ѿۻ�Է���ϲ�����Ź�����ǰ�Ź������ײͣ�����Խ��Խ����ȯ���������������ˣ����ӷ��㣬һ���ۿ۶ȶ���7�����ң�����50����ֽ�ȯ�Ź��۸�30�顣����Ӱ��һ��Ҫ�Ź��ģ�һ�㶼�ܴ����ۡ�&rdquo;���½ֿ�һ�������ϰ����С����߼��ߣ������ѵ��У��Ź��Ѿ���һ�ֲ��ɻ�ȱ�����ʽ��<br />
<br />
���գ��Ź�������վ��800�����ˡ�2013��6���й��Ź��г�ͳ�Ʊ��桷���õ��鱨���������Դ���������������ڵ������������š����ŵȹ�12��֪�����Ź���վ��<br />
<br />
�Ź�����ʳռ������<br />
<br />
�����������ڱ����ڿ�����2013��1-6�·�Ҳ�����ϰ��꣬�Ͼ������Ź��ɽ���Ϊ31741.2��Ԫ����������Ϊ548.7���˴Σ���ȥ��ͬ����ȣ��ֱ���������ɺ����ɡ�����������������㣬ƽ��ÿ�춼��3���˲μ��Ź�������Ͼ�800���˿��㣬�ϰ����˾��Ź�Լ39Ԫ��<br />
<br />
���Ͼ����Ź�����Ŀ���������Կ����Ͼ���&ldquo;�Ի�&rdquo;���ʣ���Ϊͨ����Щ��վ�����۶���Կ�����������ʳ��ռ�ı���Ϊ60.2%���������Ҳ����˵���Ͼ����ڽ�������ųԻ��Ѵﵽ1.8�ڡ������Ź����棬���������ֱ���Ϊ19.7%���Ƶ�����9.0%���������8.8%����Ʒ������2.2%��<br />
<br />
�ֻ��Ź�����������<br />
<br />
���������ֻ����ռ���Խ��Խ����ϰ����ѧ�������Ź��ķ�ʽ�������ı䣬�ӹ�ȥ�õ����Ź���������ֻ��Ź���<br />
<br />
&ldquo;�����������£�������ʲô�Ź��Ĳ�����Ȼ���绰ȥ���ʣ���û��λ�ã�ȷ���оͿ����Ź��ˣ����Ź�������ʱ��̡ܶ�&rdquo;�����������߼��ߣ����һ���Ů����Լ�ᣬ�����������ַ�ʽ������˵ʡ�˲������ӡ�&ldquo;��ǰ���Ź����˵ģ������ù����ˣ�Ҳ����Ҫ�õ�ʱ��һ��ȥ˵�����Ѿ����ˣ����֮�£������������Ÿ������Ч��&rdquo;<br />
<br />
<br />
�ֻ��Ź��ȳ�����&ldquo;һСʱ����&rdquo;�����Ź����µ�������ʹ����Ҫ��õ�ʱ�䣿��3��ǰ�û���ǰ&ldquo;������ȯ&rdquo;����δ��ʹ�õ�ϰ�ߴ��ྶͥ��ͨ����&ldquo;�Ź���ȫ&rdquo;�ֻ�Ӧ��30�򵥹���������ͳ�Ʒ������֣�35%���ֻ��û��ڹ����Ź���1Сʱ�ھ͵������ѣ����������н��ĳ��û����µ�������һ�����ֻ����10���ӡ�<br />
<br />
�����������������߼���&ldquo;�����ڵ��ھ�����ȥ���������Ź���·��&rdquo;����ʹ�õ��Թ����Ź����û����µ������ѵ�ʱ����1Сʱ֮�ڵı���ֻ��7%�������˳������ϵ��ǣ��ڸ�ϸ��Ʒ���Ź���������ʱ����ϣ���Ȼ��15%�Ļ�����ֻ��Ź������µ�1Сʱ֮�ڱ�ʹ�ã�����ӰƱ�Ź���ʵֻ��6%���˸���1Сʱ����ս��������Ĵ̼������˲�����̾&ldquo;�Ի��ǣ��������ж��ż�&rdquo;�� ���������� ����<br />
<br />
���ߣ�����','22','1375185043','1375185224','6','1','','6','0','0','1','','','');
INSERT INTO `cms_infos` VALUES ('27','�ݵ�����ʾ������������������Ź���ʳ','�ڹ�������ҵ��Ȼ����ƣ��֮ʱ���Ź��г�ȴ���ֲ�ͬ���ơ��Ӻ��ݵ�������������������468.2���˴β������Ź��������������������߳�Ϊÿ�����Ѵ������ĵط����������Ź��У���ʳ����ռ��������ϡ�<br />
<br />
�������⣬�����Ź��ֻ�Ӧ�õ��ռ����Ի��Ǵ��µ���������ٶ�ҲԽ��Խ�죬���ٿ����µ���10���Ӿͽ��������ˡ�<br />
<br />
����Ȼ����Խ��Խ��Ĳ�����ȴ�������ѡ����Ǽ���Ҫ&ldquo;����׬ߺ��&rdquo;���ֲ��ⵣ�ģ����û���Ź������˻�����������<br />
<br />
��������������������Ź���ʳ<br />
<br />
��������Խ��Խ���ȣ����������˶�ϰ��������Է���ҹ���������Խ��Խ����Ҳ�������Ź�ҵ���������<br />
<br />
�������գ���800��վ�����˺��ݸ�����Ȧ��&ldquo;�Ź��ȵ��ͼ&rdquo;�������������������ߡ���������ɽ·������·���ŵ�һ����Ϊ���ܺ����˻�ӭ���Ź��ص㣬ÿ�յ����Ѵ����ﵽ��2708�����������ǽ���·�����������졢�촺·���ߡ�����·���ߵش���ÿ���Ź����Ѵ����ﵽ��2568��<br />
<br />
�������Ź������ϣ���ʳ���������ɳ�Ϊ�����˵����������ʾ��52.1%��Ϊ��ʳ���Ź������ಿ�ֱ��������֡�������񡢾Ƶ����εȹϷ֡�<br />
<br />
�������⣬�Ź��ֻ�Ӧ�õķ�չ���ÿ���&ldquo;�µ�������&rdquo;���ٶ���һ����������800��վͨ����&ldquo;�Ź���ȫ&rdquo;�ֻ�Ӧ��30�򵥹���������ͳ�Ʒ������֣�35%���ֻ��û��ڹ����Ź���1Сʱ�ھ͵������ѣ������н�40%�û����µ�������ֻ���˲���10���ӡ�<br />
<br />
�������������Ź���������<br />
<br />
����Խ��Խ��Ĳ�����Ͷ���Ź�����У�Ȼ����&ldquo;����׬ߺ��&rdquo;����̬֮�£�������Ȼ�������ء�<br />
<br />
��������ĩ����������·�ϰ��С��Լ�Ϻ���ȥ������ҹ���������ֻ����Ź���һϯ�ص����˲ͣ�&ldquo;�����⿴��һ�£�ȷʵû����ǰԤԼ֮���Լ���������µĵ���&rdquo;С��˵�������������ѽ�������ʱ��������Ա��֪��&ldquo;9���Ժ���ʹ���Ź�ȯ�ˣ���Ϊ�޷����Ź����µ���&rdquo;<br />
<br />
������Ϥ��������ʳ�Ź�������ԭ�۵�4����5�۳��ۣ�&ldquo;�Ź��ۿ϶����ǿ������ģ���ҪΪ��׬�����������ϰ�����Ҫ����һЩ��������������һЩ�Ź��͵����϶�����������������ģ�&rdquo;����·��һ�Ҳ�����ĸ�����˵��&ldquo;�������ڵ��˿�ѡ��Ĳ���̫�࣬����Ҳ���ģ��������żȻ���Ź���վ������Ҳ����������������&rdquo;<br />','22','1375185306','0','6','1','','0','0','0','2','','','');
INSERT INTO `cms_infos` VALUES ('28','��ͼ����ɹ���֤���Ҹ��ڶ�����Ϯ �����������Ź�6300Ԫ/�O5ǧ��ߵ�7��','������ʾ����ͼ����ɹ���֤���Ҹ��ڶ�������Ϯ������ֻ���ע�ൺ����������Ƶ���ٷ�΢������ת���������л���Ӯȡ���ŵ�ӰƱ����Ƭ��������л��ᣬ��Ҫ�����Ŀǰ��ͼ���������ൺ�������Ƴ������Ź�����������6300Ԫ/�O��5ǧ��ߵ�7�򣬻������Ϊ94-143�O���׶��������������ۣ���6�ֻ��͹���ҵ��ѡ��2013��׽�����׼�ַ�����&gt;&gt;��������ൺ�����������ٷ�΢��','22','1375185528','0','6','1','','0','0','0','3','','','');
INSERT INTO `cms_infos` VALUES ('29','�ƶ������Ź���վ��Ϯ ����ռ�ȼ�������','�����Ź�������վ��800������ʾ�����������Ź���վ����ǰ����ɽ���Ϊ141.3��Ԫ��ͬ������46%��ÿ���г���ģ���Ȳ�����̬�ƣ���ȥ��ͬ�ڹ�ɽ��ʽ�ı����γ�ǿ�ҶԱȡ�<br />
��������ռ�ȼ�������<br />
������Ȼ���������ģ����ƽ̨�ڣ����Ⲣ��Ӱ���Ź���Ϊ����Ӧ�����û�����������ҵ�������й�����������Ϣ����(CNNIC)���շ���������������ʾ���Ź���ǰ����������ģΪ1.01���ˣ�����������21.2%����ҵ���һ��<br />
�����ڴ˴󱳾��£��Ź��ϰ���ɽ��������141.3��Ԫ��ͬ������46%�������ݳ���2011��ȫ���110��Ԫ���൱��ȥ��ȫ��213.9��Ԫ���׶��2/3������800������ʾ��6���Ź���ҵ��26.1��Ԫ�ĳɽ����ٴ��¸ߣ������¾���Լ1.5��Ԫ��ͬ������56.3%��ͬ�����ǵĻ���39.9���ڵ������ŵ���������������3.6%�����˼��㣬�ϰ��깲�������ŵ�216.3���ڣ��൱��ȥ��ͬ�ڵ�3����<br />
�������ɷ��ϵ��ǣ��ϰ���141.3��Ԫ���ܳɽ������кܴ������Ը����Ź���վ���ֻ�ƽ̨�ϵ�Ѹ���ƹ㡣���˽⣬�����Ź���վ��ȥ����ƶ��˵�����������ռ��ƽ������30%�����̶̰���ʱ���ڲ�����վ�Ѿ���ǰ����һ����������50%�������ʳ����ɡ����У������ƶ��˽��׶�ռ�ȼ���һ�룬�ƶ�����ռ�ȳ�50%���������ƶ�������ռ�Ƚӽ�50%��ֵ��ע����ǣ�������������ȴ��ڵ������ƶ��������ռ�ȸ����׳��߳ɣ��ƶ����û�ͻ��7500��<br />
����Ŀǰ�����ƶ��Ź��г��ѳ�Ϊ�����Ź���վ��ͬ��Ŀ�꣬��ϣ��ͨ��&ldquo;��ԤԼ&rdquo;��&ldquo;��ʱ��&rdquo;�ȴ��£�������ֻ��Ź��û�ճ�Ե�ͬʱ���ƹ����˴�4500���ħ�䡣<br />
������������ҵ���<br />
����&ldquo;��ʵ���Ź��͵����Ż�ȯ�����ֻ�������ȳ��϶�Ϊһ���ⲻ����Ч�����ʷ���Ż�ȯ�г��Ĳ��㣬����Ϊ����һ���������Ա��Ӫ���̵�������ռ�&rdquo;������ר�ҡ���800���ϴ�ʼ�˺�衶��ƶ��Ź�����ʮ���ֹۡ�<br />
���������Ϊ���ƶ���ռ�Ƚ���һ��������������ĩ����7��3�ĵ�������&ldquo;���ǵ��ƶ�����ںͶԱ��������г�����͸��ֵ�����ܻ��������ڻ�������ͷ���Ź���վ��ҵ��ֵ���ٴ������������ٴη����������Ĳ����������ϡ�&rdquo;�������˵��<br />
������ϤĿǰ���š����֡�Ŵ�׵��Ź���վ�׷�ͨ����ӰƱ���Ƶ��ϸ������ͻ��ˣ���ͼ���ƶ�����Ϊ�µ�ҵ��ͻ�ƿں����ġ�ֵ���Ź���վע����ǣ���Ȼͬ�����Ź�ҵ�񣬵����û����ƶ��˺�PC�˵��淨���С��<br />
������800ͨ����&ldquo;�Ź���ȫ&rdquo;�ֻ�Ӧ��30�򵥹���������ͳ�Ʒ������֣�35%���ֻ��û��ڹ����Ź���1Сʱ�ھ͵������ѣ����������н��ĳ��û����µ�������һ�����ֻ����10���Ӳ�������ʹ�õ����Ź����û����µ������ѵ�ʱ����1Сʱ֮�ڵı���ֻ��7%��ҵ����ʿָ�����ƶ��Ź��û�Ҫ���LBS(����λ�÷���)+O2O�����Է��񽫳�Ϊҵ��δ���������ص㡣','22','1375185558','0','6','1','','0','0','0','4','','','');
INSERT INTO `cms_infos` VALUES ('30','100%���֣����� �ٶ��Ź������ൺơ�ƽڹٷ��ۿ�','������ǰ��Ϥ����23���ൺ����ơ�ƽڽ���8��10��ʢ��Ļ�������굥һ�����¹�Ʊ��ʽ��ȣ��������췽����ͨ�����Ϲ�Ʊ��ʽ����Ϊ�ൺ����ơ�ƽ�Ψһָ����������Ʊ�͹ٷ�����Ʒ������ƽ̨���ٶ��Ź�����Ʊ��ַ��http://tuan.baidu.com/event/2013qdbeer/index.html#top1 ��������һ��������Ʊ��ר��ҳ�棬���ѿ�ͨ��PC�ˡ��ֻ��˵Ƚ������Ϲ��򣬲�����ٶ��Ź�ר������������100%��Ʊ�Լ�100%��Ʊ����<br />
<br />
������Ʊ�ͷ���<br />
<br />
���������ൺ����ơ�ƽ���Ʊ��Ϊ18Ԫ��9Ԫ�ļס������ȡ�ͨ���ٶ��Ź���Ʊ���û���������ר���һ������ֽ��Ʊ�һ�������100%��������ٶ��Ź�5Ԫ��20Ԫ���ȵĴ���ȯ�����ߴ�ơ�ƽڹ�����֪��ֽ����ƱԤ����8��1�պ��ۣ�ͨ���ٶ��Ź���Ʊ���û�����8��10-25�գ�ǰ���ൺ����ơ�ƽ���Ʊ������֤�һ���<br />
<br />
������Ʊ100%����<br />
<br />
����ͨ���ٶ��Ź���Ʊ���û�����ר��ҳ���ϲ��뿪ƿ����ĳ齱�����н��ʰٷ�֮�١��û���һ���ҳ������������ƿơ��ͼ�������ɽ����ơ�����޳�����Ȩ��1000Ԫ���ʴ�͡�2000Ԫ��������ѣ�����ֵ1.6W�ĺ�����������˫���εȺ�����<br />
<br />
<br />
���ൺ����ơ�ƽڰٶ��Ź���Ʊר��ҳ�棩<br />
<br />
�������˽⣬�ٶ��Ź�������2011��6�£�ƾ����&ldquo;�ٶ��Ź�����+�ٶ���Ӫ�Ź�&rdquo;��˫������ģʽ���������ٶ��Ź�����˿��ٵĳɳ���������������Ź���վ���ٶ��Ź�ӵ�������ױȵ��Ĵ����ơ����Ȱٶ��Ź�������100��������Ź���վ��50������Ź���Ʒ������ȫ����ȫ�����λ�ö�λ�ȶ��ع��ܣ��ܹ������û�����Ѱ���ܱߵ��Ź����Ż���Ϣ���ٴ�ͨ����֧������֧����ʽ�����룬��Ϊ�û��ṩ��ݵ�֧�����񣻴���&ldquo;�˺�һվͨ&rdquo;���Լ����ֱ����������ȯ�Ȼ��Ҳ��������û�Ӫ���˲�һ�����������顣<br />
<br />
�����ٶ��Ź���ظ����˽���˵���ٶ��Ź�������Ψһһ�Ҽ��&ldquo;����ҵ��&rdquo;���Ź������� &ldquo;�͹�����&rdquo;�Ķ��ر�ǩ���ðٶȵĵ��������ø�����ʵ����׼���ɿ������⣬�ٶ��Ź���Ӫҵ������ȹ��ܺͷḻƷ�࣬ҲΪ����û��ṩ��һ���򵥿�ݵĸ��Ի��Ź����顣Ҳ������Щԭ���ðٶ��Ź�����ͻ����Χ������ൺ����ơ�ƽ����췽���Ͽɡ����ڳе��˴��ൺơ�ƽ�������Ʊ��������λ�����˳������ĵر�ʾ��&ldquo;�������Ƚ��ļ����������ʵķ��񣬴һ����ɫ�Ĺ�Ʊ��ͨ����Ϊ���������ο��ṩ�����õĹ�Ʊ���顣&rdquo;','22','1375185686','0','6','1','','0','0','0','5','','','');
INSERT INTO `cms_infos` VALUES ('31','�𰲿�������V3�����ļ��Ź��Ż�','������������ζ���ļ���������ȵ�ʱ�򣬽�ʱ�㽭��������Ҳ�����˸���Ĺ����Żݣ�������7��31�գ����㽭����4S�깺����V3���ó�������5.98������ļ��Ź��ۣ������Բ������¹����Żݻ��<br />
<br />
1)5.98���𣬼�1Ԫ����Ԫ�Ż�<br />
<br />
1ԪǮ�������ۣ������˵��һԪ�Ϳ�������10000Ԫ�Ĺ����Żݣ��Ǿ������ǳ�ֵ�����㽭����4S�꣬����һԪ���������ܵ���Ԫ�Ĺ��������������ֽ��Ż�8000Ԫ��3000���ܲ�����3000Ԫ�����Żݡ�2000Ԫ�Ϳ��������⻹��3800��װ���������ֵ2000Ԫ������˷����񣬾��ԳƵ����ﳬ��ֵ.<br />
<br />
<br />
<br />
2)���8800Ԫ�׸��չ�����50Ԫ<br />
<br />
���˳����ϴ����ȵĴ�����V3���û��Ƴ���20%���׸����ҷ�����Ŀǰ�����V3���ó��ͳ����׸�ֻҪ8800Ԫ���չ�����50Ԫ�����������ⵣ�����޵�Ѻ�����޻�����<br />
<br />
3)����������3��10�����ʱ�<br />
<br />
���֮ǰ����2��5������ʱ��ڣ����ڹ���V3���ÿ�������3��10����ĳ����ʱ����������ó������޺��֮�ǣ���Ҳ���ѿ���������������V3����Ʒ�ʵ����ġ�<br />
<br />
��ֹ��Ŀǰ��V3�����û���ͻ��40�򣬰�����40���ͥһͬ�ɳ���ǿ���Ķ������ḻ�����úͳ����Լ۱���V3������ͬ���������������ԣ���Ϊ5-7�򼶼��ýγ�����ѡ���͡�<br />
<br />
�����̣��㽭����������ó���޹�˾�𰲷ֹ�˾�����ַ���㽭����������ó���޹�˾�𰲷ֹ�˾<br />
<br />
�������ߣ�15558799900 ����ϵʱ�����ἰ�׳��������и����Żݣ�','22','1375186259','0','6','1','','0','0','0','6','','','');
INSERT INTO `cms_infos` VALUES ('32','��Ѷ������ɳ���׽칤��ֱ���Ź��������ɹ�����','<br />
����ɳ���׽칤��ֱ���Ź����<br />
<br />
&emsp;&emsp;���˼Ҿ� ���ڱ�����7��28�գ�����Ϊ&ldquo;ȫʡһ��ȥ������Ҿ�&rdquo; ����ɳ���׽칤��ֱ���Ź�������������Ҽ�˽�ܲ�չ��ʢ���������Թ㶫ʡ����ҵ��������ң��ֳ��쳣�𱬣����Ҽ����ܲá����ڼҾ�Э��᳤�ƻ������������ֳ�����<br />
<br />
<br />
�Ź��ֳ��쳣��<br />
<br />
&emsp;&emsp;���˽⣬�˴�����ɳ������ֱ���Ź����Ϊ���ҹ����Ź��״�֮�ã��ڸ���ý�塢�Ź���վ�ټ�֮ʱ������ǧ�˲μӱ�������Ϊ���޳���ɳ�������̼��й������̱꣬Ʒ�Ƽ���Ʒ�������������������ģ����ֳ����������߽��ܲɷ��ᵽ��&ldquo;������Ϊ��ͨ�����ߣ���ʵ����Ҫһ�����������Ĳ�Ʒ������ɳ�����������������бȽ����������Ͼ�����ɳ������ô�����ˣ��ڿ����������Ź�ֱ��ʱ�����Ǻ�����ԥ�����μӡ������չ��ȷʵ��Щ��Ʒ�Լ۱ȸߣ���ϣ���Ժ����и������μ��������Ź���&rdquo;<br />
<br />
<br />
����ɳ���׽칤��ֱ���Ź��������ɹ�����<br />
<br />
&emsp;&emsp;���Ҽ�˽��һ�Ҽ��з������������۸ߵ���˽Ϊһ��Ĵ�����ҵ���ܲ�λ����������������������1986�꣬ӵ�й��������ȸ����˲Ž�3000��������27����Ƚ���չ�����Ҽ�˽ƾ���ۺ������з�ʵ������������Ƥ�����ϣ���϶����˵�����ص㣬���������ʺ��й���ͥ�ĸߵ�ɳ���������й������Ļ��ĵ�һƷ�ơ�Ŀǰӵ�����޳���ɳ��������أ�����ΪΨһһ���ڹ���չ����������ʮ����ժȡ����Ҿ���ƹھ��ƺŵ�ɳ����ҵ������2007���ٻ�&ldquo;�й�����&rdquo;�����ƺţ�2012���ٻ�&ldquo;�й������̱�&rdquo;�����������١�','22','1375186344','0','6','1','','0','0','0','7','','','');
INSERT INTO `cms_infos` VALUES ('33','�����ڴ��̱��ܶ���֯�����Ź��','����Ѷ������ ��ΰ ʵϰ�� ����ѩ��7��28�գ������̱�&middot;�������������Ϻ������Ļ��㳡˳�����С�<br />
<br />
��200�˼�����ֳ�����ʱ��������ǰ����ѯ�Ź����ˣ������Ƕ������Ź����������飬ͬʱҲ������Լ��Լ۸����������ֳ�������������Ա���ֳ��ͻ��������£���˾���������룬����Ϊ�˿���ȡ���������������ߣ����У�ȫ������550�ڻ����5ǧԪ������Ͽ�����550�Ż��ֽ�25000Ԫ��MG3�Ż��ֽ�1��Ԫ������3000Ԫ���һ�ݣ�W5�Ż��ֽ����򣬲���5000Ԫ���һ�ݣ�MG5�Ż��ֽ�8ǧԪ������3000Ԫ�����950�Ż��ֽ�20000Ԫ��350�Ż��ֽ�17000Ԫ���Լ���5ǧ���һ�ݡ�<br />
<br />
�����������Լ���˵����&ldquo;�����̱�&middot;���������л��ʵ�ݣ����񵽼��ſڵĻ�������ϰ����Ǻ�ϲ���ģ�ϣ�������̱��Ժ��ܶ�ٰ����ƵĻ��&rdquo;���ͬʱ���ֳ����پ����ʾϣ�������ܶ���֯�Ź�������������ó���̸���ۿۡ�<br />','22','1375186375','0','6','1','','0','0','0','8','','','');
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
INSERT INTO `cms_links` VALUES ('2','�ٶ�','http://www.baidu.com','1','4a0789303c368d63e33decb649261ac8.jpg','1');
INSERT INTO `cms_links` VALUES ('3','�ȸ�','http://www.google.com','1','d4513e6cec0b28227ac75ffc49f1790b.jpg','2');
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
INSERT INTO `cms_message_group` VALUES ('1','extracts_cash','1','��������','1','1','0');
INSERT INTO `cms_message_group` VALUES ('2','business','1','�������','1','2','0');
INSERT INTO `cms_message_group` VALUES ('3','feedback','1','�������','1','3','0');
INSERT INTO `cms_message_group` VALUES ('4','deal_order','1','��������','1','4','0');
INSERT INTO `cms_message_group` VALUES ('5','question','1','�������','0','5','0');
INSERT INTO `cms_message_group` VALUES ('13','before_sale','0','��ǰ��ѯ','0','5','0');
INSERT INTO `cms_message_group` VALUES ('10','before_sale','0','��ǰ��ѯ','0','8','0');
INSERT INTO `cms_message_group` VALUES ('11','deal_trade','0','�Ź�����','0','7','0');
INSERT INTO `cms_message_group` VALUES ('12','after_sale','0','�ۺ����','1','6','0');
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
INSERT INTO `cms_msg_template` VALUES ('1','�Ź�ȯ�ʼ�֪ͨģ��','TPL_MAIL_COUPON','<{$coupon_data.user_name}>���! �㹺���<{$coupon_data.deal_name}>�ѹ���ɹ����Ź�ȯ���к�<{$coupon_data.sn}>����<{$coupon_data.password}>,��Ч��Ϊ<{$coupon_data.begin_time_format}>��<{$coupon_data.end_time_format}>','1','1');
INSERT INTO `cms_msg_template` VALUES ('2','�Ź�ȯ����֪ͨģ��','TPL_SMS_COUPON','<{$coupon.user_name}>���! �㹺���<{$coupon.deal_name}>�ѹ���ɹ����Ź�ȯ���к�<{$coupon.sn}>����<{$coupon.password}>,��Ч��Ϊ<{$coupon.begin_time_format}>��<{$coupon.end_time_format}>','0','0');
INSERT INTO `cms_msg_template` VALUES ('3','��Ա��֤�ʼ�','TPL_MAIL_USER_VERIFY','<{$user.user_name}>��ã���������������֤��Ļ�Ա���
</p>
<a href=\'<{$user.verify_url}>\'><{$user.verify_url}></a>','1','1');
INSERT INTO `cms_msg_template` VALUES ('4','��Աȡ�������ʼ�','TPL_MAIL_USER_PASSWORD','<{$user.user_name}>��ã��������������޸���������
</p>
<a href=\'<{$user.password_url}>\'><{$user.password_url}></a>','1','0');
INSERT INTO `cms_msg_template` VALUES ('5','�տ����֪ͨģ��','TPL_SMS_PAYMENT','{$payment_notice.user_name}���,�����¶���{$payment_notice.order_sn}���տ{$payment_notice.notice_sn}���{$payment_notice.money_format}��{$payment_notice.pay_time_format}֧���ɹ�','0','0');
INSERT INTO `cms_msg_template` VALUES ('6','�տ��ʼ�֪ͨģ��','TPL_MAIL_PAYMENT','{$payment_notice.user_name}���,�����¶���{$payment_notice.order_sn}���տ{$payment_notice.notice_sn}���{$payment_notice.money_format}��{$payment_notice.pay_time_format}֧���ɹ�','1','0');
INSERT INTO `cms_msg_template` VALUES ('7','��������֪ͨģ��','TPL_SMS_DELIVERY','{$delivery_notice.user_name}���,�����¶���{$delivery_notice.order_sn}����Ʒ{$delivery_notice.deal_names}��{$delivery_notice.delivery_time_format}�����ɹ�,��������{$delivery_notice.notice_sn}','0','0');
INSERT INTO `cms_msg_template` VALUES ('8','�����ʼ�֪ͨģ��','TPL_MAIL_DELIVERY','<{$delivery_notice.user_name}>���,�����¶���<{$delivery_notice.order_sn}>����Ʒ<{$delivery_notice.deal_names}>��<{$delivery_notice.delivery_time_format}>�����ɹ�,��������<{$delivery_notice.notice_sn}>','1','0');
INSERT INTO `cms_msg_template` VALUES ('9','���Ͷ�����֤��ģ��','TPL_SMS_VERIFY_CODE','����ֻ���Ϊ{$verify.mobile},��֤��Ϊ{$verify.code}','0','0');
INSERT INTO `cms_msg_template` VALUES ('10','�Ź�����֪ͨģ��','TPL_DEAL_NOTICE_SMS','{$notice.site_name}�������Ź���!{$notice.deal_name},��ӭ������{$notice.site_url}','0','0');
INSERT INTO `cms_msg_template` VALUES ('11','�ʼ��˶���֤ģ��','TPL_MAIL_UNSUBSCRIBE','���ã���ȷ��Ҫ�˶�<{$mail.mail_address}>��Ҫ�˶�����<a href=\"<{$mail.url}>\">����˶�</a>','1','1');
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
INSERT INTO `cms_nav` VALUES ('1','�����Ź�','1','1','0','','index','','0');
INSERT INTO `cms_nav` VALUES ('2','�Ź��б�','1','2','0','','deals','list','0');
INSERT INTO `cms_nav` VALUES ('3','�����Ź�','1','3','0','','deals','history','0');
INSERT INTO `cms_nav` VALUES ('4','�Ź�Ԥ��','1','4','0','','deals','forecast','0');
INSERT INTO `cms_nav` VALUES ('5','�Ź���̬','1','5','0','','infos','','22');
INSERT INTO `cms_nav` VALUES ('6','������','1','6','0','','message','','0');
INSERT INTO `cms_nav` VALUES ('7','���ò˵�','1','7','1','http://www.baidu.com','define_url','','0');
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
INSERT INTO `cms_payment` VALUES ('1','Alipay','1','1','13.0000','֧����','ȫ�����ȵĶ���������֧��ƽ̨','23523.0000','a:4:{s:7:\"partner\";s:3:\"aaa\";s:7:\"account\";s:3:\"bbb\";s:3:\"key\";s:3:\"111\";s:7:\"service\";s:1:\"0\";}','9f1a90f2466abe7d33f7de4b858f51fa.jpg','1','1');
INSERT INTO `cms_payment` VALUES ('3','Tenpay','1','1','0.0000','�Ƹ�ͨ ','��Ѷ��˾������й����ȵ�����֧��ƽ̨','0.0000','a:3:{s:9:\"tenpay_id\";s:6:\"adfabb\";s:3:\"key\";s:3:\"123\";s:4:\"sign\";s:3:\"abc\";}','cf1a02cc02749cfc040e38b7a8d2f441.jpg','3','1');
INSERT INTO `cms_payment` VALUES ('2','Chinabank','1','1','0.0000','��������','ȫ��֧��ȫ��19�����е����ÿ�����ǿ�ʵ������֧��','0.0000','a:2:{s:7:\"account\";s:4:\"afbd\";s:3:\"key\";s:4:\"1123\";}','34b829b2cacecc5473ee7355292f9239.jpg','2','1');
INSERT INTO `cms_payment` VALUES ('4','Account','1','1','0.0000','���֧��','���֧��','1000.0000','None','','4','1');
INSERT INTO `cms_payment` VALUES ('5','Voucher','1','1','0.0000','����ȯ֧��','','0.0000','none','','5','1');
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
INSERT INTO `cms_role` VALUES ('1','������Ա','1','0','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,158,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,153,42,43,44,45,46,47,48,49,50,51,52,53,159,54,55,56,57,58,59,60,160,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,149,150,163,165,84,85,164,86,87,88,89,90,91,92,93,94,95,96,161,167,168,97,98,99,100,101,102,103,104,105,106,107,108,109,162,166,110,111,112,113,114,115,116,151,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,148,143,139,140,141,142,154,155,144,145,146,147,152,156,157');
INSERT INTO `cms_role` VALUES ('9','���Թ���Ա','1','0','1,5,9,10,11,12,13,14,15,16,17,18,19,20,158,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,153,42,43,44,45,46,47,48,49,50,51,52,53,159,54,55,56,57,58,59,60,160,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,149,150,163,165,84,85,164,86,87,88,89,90,91,92,93,94,95,96,161,97,98,99,100,101,102,103,104,105,106,107,108,109,162,166,110,111,112,113,114,115,116,151,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,148,143,139,140,141,142,154,155,144,145,146,147,152,156');
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
INSERT INTO `cms_role_module` VALUES ('1','deals','�Ź��б�','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('2','deals_category','�Ź������б�','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('3','supplier','��Ӧ���б�','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('4','supplier_account','��Ӧ���ʺ�','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('5','supplier_location','��Ӧ�̵���','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('6','city','�Ź������б�','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('7','weight','������λ','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('8','deals_recycle','�Ź��������վ','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('9','info_cate','��Ϣ�����б�','1','0','front');
INSERT INTO `cms_role_module` VALUES ('11','nav','������','1','0','front');
INSERT INTO `cms_role_module` VALUES ('12','adv','�������б�','1','0','front');
INSERT INTO `cms_role_module` VALUES ('13','links','��������б�','1','0','front');
INSERT INTO `cms_role_module` VALUES ('14','templates','ģ������б�','1','0','front');
INSERT INTO `cms_role_module` VALUES ('15','message_group','���Է����б�','1','0','front');
INSERT INTO `cms_role_module` VALUES ('16','message','���Թ����б�','1','0','front');
INSERT INTO `cms_role_module` VALUES ('17','front_recycle','ǰ̨�������վ','1','0','front');
INSERT INTO `cms_role_module` VALUES ('18','user','��Ա�б�','1','0','user');
INSERT INTO `cms_role_module` VALUES ('19','user_group','��Ա�����б�','1','0','user');
INSERT INTO `cms_role_module` VALUES ('20','user_field','��Ա��չ�б�','1','0','user');
INSERT INTO `cms_role_module` VALUES ('21','referrals','���뷵���б�','1','0','user');
INSERT INTO `cms_role_module` VALUES ('22','member_recycle','��Ա����վ','1','0','user');
INSERT INTO `cms_role_module` VALUES ('23','deal_orders','�Ź������б�','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('24','recharge_orders','��ֵ�����б�','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('25','receiving','�տ�б�','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('26','payment','֧���ӿ��б�','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('27','delivery_area','���͵����б�','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('28','delivery_way','���ͷ�ʽ�б�','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('29','orders_recycle','�����������վ','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('30','msg_template','��Ϣģ���б�','1','0','mail_mess');
INSERT INTO `cms_role_module` VALUES ('31','mail_list','�ʼ������б�','1','0','mail_mess');
INSERT INTO `cms_role_module` VALUES ('32','mail_server','�ʼ��������б�','1','0','mail_mess');
INSERT INTO `cms_role_module` VALUES ('33','sms_list','���Žӿ��б�','1','0','mail_mess');
INSERT INTO `cms_role_module` VALUES ('34','sms_subscription','���Ŷ����б�','1','0','mail_mess');
INSERT INTO `cms_role_module` VALUES ('35','msg_queue','��Ϣ�����б�','1','0','mail_mess');
INSERT INTO `cms_role_module` VALUES ('36','msg_recycle','��Ϣ����վ','1','0','mail_mess');
INSERT INTO `cms_role_module` VALUES ('37','sys_config','ϵͳ����','1','0','sys_config');
INSERT INTO `cms_role_module` VALUES ('38','role','����Ա�����б�','1','0','sys_config');
INSERT INTO `cms_role_module` VALUES ('39','admin','����Ա�б�','1','0','sys_config');
INSERT INTO `cms_role_module` VALUES ('40','backup','���ݱ����б�','1','0','sys_config');
INSERT INTO `cms_role_module` VALUES ('41','log','ϵͳ��־','1','0','sys_config');
INSERT INTO `cms_role_module` VALUES ('42','sys_recycle','ϵͳ���û���վ','1','0','sys_config');
INSERT INTO `cms_role_module` VALUES ('43','login','��̨��½','1','0','login');
INSERT INTO `cms_role_module` VALUES ('10','infos','��Ϣ�б�','1','0','front');
INSERT INTO `cms_role_module` VALUES ('44','do_incharge','����Ա�տ�','1','0','do_incharge');
INSERT INTO `cms_role_module` VALUES ('45','deal_coupon','�Ź�ȯ','1','0','deals');
INSERT INTO `cms_role_module` VALUES ('46','user_log','��Ա��־','1','0','user');
INSERT INTO `cms_role_module` VALUES ('47','deal_orders_log','�Ź�������־','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('48','paymentNotice','�������','1','0','deal_orders');
INSERT INTO `cms_role_module` VALUES ('49','clear_cache','�������','1','0','sys_config');
DROP TABLE IF EXISTS `cms_role_node`;
CREATE TABLE `cms_role_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) NOT NULL,
  `edit` varchar(100) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=169 DEFAULT CHARSET=gbk;
INSERT INTO `cms_role_node` VALUES ('2','add_deals','add','�����Ź�','1');
INSERT INTO `cms_role_node` VALUES ('3','add_deals','mod','�༭�Ź�','1');
INSERT INTO `cms_role_node` VALUES ('4','deals','del','ɾ���Ź�','1');
INSERT INTO `cms_role_node` VALUES ('1','deals','','�Ź��б�','1');
INSERT INTO `cms_role_node` VALUES ('5','deals_category','','�����б�','2');
INSERT INTO `cms_role_node` VALUES ('6','add_dealsCate','add','��������','2');
INSERT INTO `cms_role_node` VALUES ('7','add_dealsCate','mod','�༭����','2');
INSERT INTO `cms_role_node` VALUES ('8','deals_category','del','ɾ������','2');
INSERT INTO `cms_role_node` VALUES ('9','supplier','','��Ӧ���б�','3');
INSERT INTO `cms_role_node` VALUES ('10','add_supplier','add','������Ӧ��','3');
INSERT INTO `cms_role_node` VALUES ('11','add_supplier','mod','�༭��Ӧ��','3');
INSERT INTO `cms_role_node` VALUES ('12','supplier','del','ɾ����Ӧ��','3');
INSERT INTO `cms_role_node` VALUES ('13','supplier_account','','��Ӧ���ʺ�','4');
INSERT INTO `cms_role_node` VALUES ('14','add_supplierAccount','add','�����ʺ�','4');
INSERT INTO `cms_role_node` VALUES ('15','add_supplierAccount','mod','�༭�ʺ�','4');
INSERT INTO `cms_role_node` VALUES ('16','supplier_account','del','ɾ���ʺ�','4');
INSERT INTO `cms_role_node` VALUES ('17','supplier_location','','��Ӧ�̵���','5');
INSERT INTO `cms_role_node` VALUES ('18','add_supplierLocation','add','��������','5');
INSERT INTO `cms_role_node` VALUES ('19','add_supplierLocation','mod','�༭����','5');
INSERT INTO `cms_role_node` VALUES ('20','supplier_location','del','ɾ������','5');
INSERT INTO `cms_role_node` VALUES ('21','city','','�����б�','6');
INSERT INTO `cms_role_node` VALUES ('22','add_city','add','��������','6');
INSERT INTO `cms_role_node` VALUES ('23','add_city','mod','�༭����','6');
INSERT INTO `cms_role_node` VALUES ('24','city','del','ɾ������','6');
INSERT INTO `cms_role_node` VALUES ('25','set_default','','��ΪĬ��','6');
INSERT INTO `cms_role_node` VALUES ('26','weight','','������λ�б�','7');
INSERT INTO `cms_role_node` VALUES ('27','add_weight','add','������λ','7');
INSERT INTO `cms_role_node` VALUES ('28','add_weight','mod','�༭��λ','7');
INSERT INTO `cms_role_node` VALUES ('29','weight','del','ɾ����λ','7');
INSERT INTO `cms_role_node` VALUES ('30','deals_recycle','','�Ź��������վ','8');
INSERT INTO `cms_role_node` VALUES ('31','deals_recycle','restore','��ԭ','8');
INSERT INTO `cms_role_node` VALUES ('32','deals_recycle','del','ɾ��','8');
INSERT INTO `cms_role_node` VALUES ('33','info_cate','','��Ϣ�����б�','9');
INSERT INTO `cms_role_node` VALUES ('34','add_infoCate','add','��������','9');
INSERT INTO `cms_role_node` VALUES ('35','add_infoCate','mod','�༭����','9');
INSERT INTO `cms_role_node` VALUES ('36','info_cate','del','ɾ������','9');
INSERT INTO `cms_role_node` VALUES ('37','infos','','��Ϣ�б�','10');
INSERT INTO `cms_role_node` VALUES ('38','add_infos','add','������Ϣ','10');
INSERT INTO `cms_role_node` VALUES ('39','add_infos','mod','�༭��Ϣ','10');
INSERT INTO `cms_role_node` VALUES ('40','infos','del','ɾ����Ϣ','10');
INSERT INTO `cms_role_node` VALUES ('41','mod_nav','mod','�༭����','11');
INSERT INTO `cms_role_node` VALUES ('42','adv','','����б�','12');
INSERT INTO `cms_role_node` VALUES ('43','add_adv','add','�������','12');
INSERT INTO `cms_role_node` VALUES ('44','add_adv','mod','�༭���','12');
INSERT INTO `cms_role_node` VALUES ('45','adv','del','ɾ�����','12');
INSERT INTO `cms_role_node` VALUES ('46','links','','���������б�','13');
INSERT INTO `cms_role_node` VALUES ('47','add_links','add','������������','13');
INSERT INTO `cms_role_node` VALUES ('48','add_links','mod','�༭��������','13');
INSERT INTO `cms_role_node` VALUES ('49','links','del','ɾ����������','13');
INSERT INTO `cms_role_node` VALUES ('50','templates','','ģ���б�','14');
INSERT INTO `cms_role_node` VALUES ('51','add_templates','add','����ģ��','14');
INSERT INTO `cms_role_node` VALUES ('52','add_templates','mod','�༭ģ��','14');
INSERT INTO `cms_role_node` VALUES ('53','templates','del','ɾ��ģ��','14');
INSERT INTO `cms_role_node` VALUES ('54','message_group','','���Է����б�','15');
INSERT INTO `cms_role_node` VALUES ('55','add_messageGroup','add','�������Է���','15');
INSERT INTO `cms_role_node` VALUES ('56','add_messageGroup','mod','�༭���Է���','16');
INSERT INTO `cms_role_node` VALUES ('57','message_group','del','ɾ�����Է���','16');
INSERT INTO `cms_role_node` VALUES ('58','message','','�����б�','16');
INSERT INTO `cms_role_node` VALUES ('59','reply_message','','�鿴����','16');
INSERT INTO `cms_role_node` VALUES ('60','message','del','ɾ������','16');
INSERT INTO `cms_role_node` VALUES ('61','front_recycle','','ǰ̨�������վ','17');
INSERT INTO `cms_role_node` VALUES ('62','front_recycle','restore','��ԭ','17');
INSERT INTO `cms_role_node` VALUES ('63','front_recycle','del','ɾ��','17');
INSERT INTO `cms_role_node` VALUES ('64','user','','��Ա�����б�','18');
INSERT INTO `cms_role_node` VALUES ('65','add_user','add','������Ա','18');
INSERT INTO `cms_role_node` VALUES ('66','add_user','mod','�༭��Ա','18');
INSERT INTO `cms_role_node` VALUES ('67','user','del','ɾ����Ա','18');
INSERT INTO `cms_role_node` VALUES ('68','user_group','','��Ա�������','19');
INSERT INTO `cms_role_node` VALUES ('69','add_userGroup','add','������Ա����','19');
INSERT INTO `cms_role_node` VALUES ('70','add_userGroup','mod','�༭��Ա����','19');
INSERT INTO `cms_role_node` VALUES ('71','user_group','del','ɾ����Ա����','19');
INSERT INTO `cms_role_node` VALUES ('72','user_field','','��Ա��չ�б�','20');
INSERT INTO `cms_role_node` VALUES ('73','add_userField','add','������Ա��չ','20');
INSERT INTO `cms_role_node` VALUES ('74','add_userField','mod','�༭��Ա��չ','20');
INSERT INTO `cms_role_node` VALUES ('75','user_field','del','ɾ����Ա��չ','20');
INSERT INTO `cms_role_node` VALUES ('76','referrals','','���뷵���б�','21');
INSERT INTO `cms_role_node` VALUES ('77','referrals','del','ɾ������','21');
INSERT INTO `cms_role_node` VALUES ('78','member_recycle','','��Ա�������վ','22');
INSERT INTO `cms_role_node` VALUES ('79','member_recycle','restore','��ԭ','22');
INSERT INTO `cms_role_node` VALUES ('80','member_recycle','del','ɾ��','22');
INSERT INTO `cms_role_node` VALUES ('81','deal_orders','','�Ź������б�','23');
INSERT INTO `cms_role_node` VALUES ('82','view_order','','������','23');
INSERT INTO `cms_role_node` VALUES ('83','deal_orders','del','ɾ������','23');
INSERT INTO `cms_role_node` VALUES ('84','recharge_orders','','��ֵ�����б�','24');
INSERT INTO `cms_role_node` VALUES ('85','recharge_orders','del','ɾ������','24');
INSERT INTO `cms_role_node` VALUES ('86','receiving','','�տ�б�','25');
INSERT INTO `cms_role_node` VALUES ('87','payment','','֧���ӿ��б�','26');
INSERT INTO `cms_role_node` VALUES ('88','edit_payment','mod','�༭�ӿ�','26');
INSERT INTO `cms_role_node` VALUES ('89','delivery_area','','���͵����б�','27');
INSERT INTO `cms_role_node` VALUES ('90','add_deliveryArea','add','�������͵���','27');
INSERT INTO `cms_role_node` VALUES ('91','add_deliveryArea','mod','�༭���͵���','27');
INSERT INTO `cms_role_node` VALUES ('92','delivery_area','del','ɾ�����͵���','27');
INSERT INTO `cms_role_node` VALUES ('93','delivery_way','','���ͷ�ʽ�б�','28');
INSERT INTO `cms_role_node` VALUES ('94','add_deliveryWay','add','�������ͷ�ʽ','28');
INSERT INTO `cms_role_node` VALUES ('95','add_deliveryWay','mod','�༭���ͷ�ʽ','28');
INSERT INTO `cms_role_node` VALUES ('96','delivery_way','del','ɾ�����ͷ�ʽ','28');
INSERT INTO `cms_role_node` VALUES ('97','orders_recycle','','�����������վ','29');
INSERT INTO `cms_role_node` VALUES ('98','orders_recycle','restore','��ԭ','29');
INSERT INTO `cms_role_node` VALUES ('99','orders_recycle','del','ɾ��','29');
INSERT INTO `cms_role_node` VALUES ('100','msg_template','','��Ϣģ���б�','30');
INSERT INTO `cms_role_node` VALUES ('101','edit_msgTemplate','','�༭ģ��','30');
INSERT INTO `cms_role_node` VALUES ('102','mail_list','','�ʼ������б�','31');
INSERT INTO `cms_role_node` VALUES ('103','add_mailList','add','�����ʼ�����','31');
INSERT INTO `cms_role_node` VALUES ('104','add_mailList','mod','�༭�ʼ�����','31');
INSERT INTO `cms_role_node` VALUES ('105','mail_list','del','ɾ���ʼ�����','31');
INSERT INTO `cms_role_node` VALUES ('106','mail_server','','�ʼ��������б�','32');
INSERT INTO `cms_role_node` VALUES ('107','add_mailServer','add','�����ʼ�������','32');
INSERT INTO `cms_role_node` VALUES ('108','add_mailServer','mod','�༭�ʼ�������','32');
INSERT INTO `cms_role_node` VALUES ('109','mail_server','del','ɾ���ʼ�������','32');
INSERT INTO `cms_role_node` VALUES ('110','sms_list','','���Žӿڹ���','33');
INSERT INTO `cms_role_node` VALUES ('111','sms_subscription','','���Ŷ����б�','34');
INSERT INTO `cms_role_node` VALUES ('112','add_smsSubscription','add','�������Ŷ���','34');
INSERT INTO `cms_role_node` VALUES ('113','add_smsSubscription','mod','�༭���Ŷ���','34');
INSERT INTO `cms_role_node` VALUES ('114','sms_subscription','del','ɾ�����Ŷ���','34');
INSERT INTO `cms_role_node` VALUES ('115','msg_queue','','��Ϣ�����б�','35');
INSERT INTO `cms_role_node` VALUES ('116','msg_queue','del','ɾ����Ϣ����','35');
INSERT INTO `cms_role_node` VALUES ('117','msg_recycle','','��Ϣ����վ','36');
INSERT INTO `cms_role_node` VALUES ('118','msg_recycle','restore','��ԭ','36');
INSERT INTO `cms_role_node` VALUES ('119','msg_recycle','del','ɾ��','36');
INSERT INTO `cms_role_node` VALUES ('120','sys_config','','ϵͳ����','37');
INSERT INTO `cms_role_node` VALUES ('121','sys_config','mod','�༭','37');
INSERT INTO `cms_role_node` VALUES ('122','role','','����Ա�����б�','38');
INSERT INTO `cms_role_node` VALUES ('123','add_role','add','��������Ա����','38');
INSERT INTO `cms_role_node` VALUES ('124','add_role','mod','�༭����Ա����','38');
INSERT INTO `cms_role_node` VALUES ('125','role','del','ɾ������Ա����','38');
INSERT INTO `cms_role_node` VALUES ('126','admin','','����Ա�б�','39');
INSERT INTO `cms_role_node` VALUES ('127','add_admin','add','��������Ա','39');
INSERT INTO `cms_role_node` VALUES ('128','add_admin','mod','�༭����Ա','39');
INSERT INTO `cms_role_node` VALUES ('129','admin','del','ɾ������Ա','39');
INSERT INTO `cms_role_node` VALUES ('130','backup','','���ݱ����б�','40');
INSERT INTO `cms_role_node` VALUES ('131','do_backup','','����','40');
INSERT INTO `cms_role_node` VALUES ('132','backup','restore','�ָ�','40');
INSERT INTO `cms_role_node` VALUES ('133','backup','del','ɾ��','40');
INSERT INTO `cms_role_node` VALUES ('134','log','','��־�б�','41');
INSERT INTO `cms_role_node` VALUES ('135','log','del','ɾ����־','41');
INSERT INTO `cms_role_node` VALUES ('136','sys_recycle','','ϵͳ���û���վ','42');
INSERT INTO `cms_role_node` VALUES ('137','sys_recycle','restore','��ԭ','42');
INSERT INTO `cms_role_node` VALUES ('138','sys_recycle','del','ɾ��','42');
INSERT INTO `cms_role_node` VALUES ('139','deal_coupon','','�Ź�ȯ�б�','45');
INSERT INTO `cms_role_node` VALUES ('140','add_dealCoupon','add','�����Ź�ȯ','45');
INSERT INTO `cms_role_node` VALUES ('141','add_dealCoupon','mod','�༭�Ź�ȯ','45');
INSERT INTO `cms_role_node` VALUES ('142','deal_coupon','del','ɾ���Ź�ȯ','45');
INSERT INTO `cms_role_node` VALUES ('143','order_incharge','do_incharge','����Ա�տ�','44');
INSERT INTO `cms_role_node` VALUES ('145','user_log','del','ɾ����־','46');
INSERT INTO `cms_role_node` VALUES ('144','user_log','','�����־','46');
INSERT INTO `cms_role_node` VALUES ('146','deal_orders_log','','������־�б�','47');
INSERT INTO `cms_role_node` VALUES ('147','deal_orders_log','del','ɾ����־','47');
INSERT INTO `cms_role_node` VALUES ('148','login','','�����½','43');
INSERT INTO `cms_role_node` VALUES ('149','view_order','open_order','���Ŷ���','23');
INSERT INTO `cms_role_node` VALUES ('150','view_order','finish_order','�ᵥ','23');
INSERT INTO `cms_role_node` VALUES ('151','send_deal_msg',' ','����','35');
INSERT INTO `cms_role_node` VALUES ('152','paymentNotice',' ','����б�','48');
INSERT INTO `cms_role_node` VALUES ('153','nav',' ','�����б�','11');
INSERT INTO `cms_role_node` VALUES ('154','send_coupon_sms',' ','���Ͷ���','45');
INSERT INTO `cms_role_node` VALUES ('155','send_coupon_mail',' ','�����ʼ�','45');
INSERT INTO `cms_role_node` VALUES ('156','clear_cache','    ','��������б�','49');
INSERT INTO `cms_role_node` VALUES ('157','do_clearCache','','�������','49');
INSERT INTO `cms_role_node` VALUES ('158','set_location_main',' ','����Ĭ�ϵ���','5');
INSERT INTO `cms_role_node` VALUES ('159','set_temp_default',' ','����ģ����','14');
INSERT INTO `cms_role_node` VALUES ('160','reply_message','reply','�ظ�����','16');
INSERT INTO `cms_role_node` VALUES ('161','delivery_areaTree',' ','ѡ�����͵���','28');
INSERT INTO `cms_role_node` VALUES ('162','send_test',' ','���Ͳ����ʼ�','32');
INSERT INTO `cms_role_node` VALUES ('163','deal_orders','search','ɸѡ����','23');
INSERT INTO `cms_role_node` VALUES ('164','recharge_orders','pay_incharge','����Ա֧��','24');
INSERT INTO `cms_role_node` VALUES ('165','order_incharge',' ','����Ա�տ�','23');
INSERT INTO `cms_role_node` VALUES ('166','set_mailServer_default',' ','����Ĭ���ʼ�������','32');
INSERT INTO `cms_role_node` VALUES ('167','delivery',' ','��������','28');
INSERT INTO `cms_role_node` VALUES ('168','delivery','do_delivery','����ȷ�ϲ���','28');
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
INSERT INTO `cms_sms` VALUES ('1','�������PHP�ӿ�','adfasdfasdfasdf','SmsList','a','admin','e00cf25ad42683b3df678c61f42c6bda');
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
INSERT INTO `cms_supplier` VALUES ('1','�ν���','2d2f370d9168a9060ab89ff54493ae5b.jpg','���Թ�Ӧ��','1','1');
INSERT INTO `cms_supplier` VALUES ('2','�Ҿӹ�Ӧ��','../images/no_image.gif','�Ҿӹ�Ӧ��','2','2');
INSERT INTO `cms_supplier` VALUES ('3','κ����Ƥ','../images/no_image.gif','<span style=\"widows: 2; text-transform: none; background-color: rgb(255,255,255); text-indent: 0px; display: inline !important; font: 14px/21px Tahoma, Helvetica, arial, sans-serif; white-space: normal; orphans: 2; float: none; letter-spacing: normal; color: rgb(0,0,0); word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px\">κ�ҵ���Ƥ����Ϊ��Ƥ����Ƥ����Ƥ��Ϊ��ͨ��Ƥ�Լ��齴��Ƥ����Ƥ��Ϊ��ͨ��Ƥ�Լ�������Ƥ���֡�κ��������Ƥ�̳���������Ƥ�Ĵ�ͳζ������ͬ���ǣ��������ʵĻ���ȡ����С̯�Է��ľ��ȡ���һ����Ƥ��Ҫ��������һ���������۵�����ɣ�������������ļ�͡�</span>','1','3');
INSERT INTO `cms_supplier` VALUES ('4','��ƷҼ��','../images/no_image.gif','��','1','4');
INSERT INTO `cms_supplier` VALUES ('5','ɰ���ҳ�','../images/no_image.gif','','1','5');
INSERT INTO `cms_supplier` VALUES ('6','��˹���','../images/no_image.gif','��˹���������֪��·��48��ӯ�����ã���Ӫ������ˣ�������ζ�õ�����������װ�޷�񣬹����ɫ���ڿ��Ĵ�������͵ĵƹ����òͣ����˶���������飬Ʒζ������ˣ�������Ʋ�ʽ����������˷���ʳ�ͣ���ζʮ�㣬����Ҳ�������������òͣ����ܻ����ʵ�Ĳ�Ʒ�����ĵķ��񣬺Ͷ��ط������ţ�','1','6');
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
INSERT INTO `cms_supplier_location` VALUES ('14','������','asdf','asdfasdf','sadfasdfasf','sadfasdf','112.5427407','14','sadf','asdfasdf','1','0','ɽ��ʡ̫ԭ�н����');
INSERT INTO `cms_supplier_location` VALUES ('16','���Ŷ�','','','123123','','112.544121','5','','','0','1','ɽ��ʡ̫ԭ�н����');
INSERT INTO `cms_supplier_location` VALUES ('21','����','����ʡ��ɽ��������ʤ��·���ָ�����ũ�����50��','����ʡ��ɽ��������ʤ��·���ָ�����ũ�����50��','00000000','test','(41.108647, 122.994329)','1','','','1','0','����ʡ��ɽ��');
INSERT INTO `cms_supplier_location` VALUES ('15','asdfasdfasd','','','','','','7','','','0','0','');
INSERT INTO `cms_supplier_location` VALUES ('17','ɰ���ҳ�','','�������������㰲�������Ͻ�Զ����Է5��¥����','','','(39.8906, 116.351)','5','','','1','0','�������������㰲�������Ͻ�Զ����Է5��¥����');
INSERT INTO `cms_supplier_location` VALUES ('18','dddddd','','','','','','13','','','1','0','');
INSERT INTO `cms_supplier_location` VALUES ('19','gggggg','','aaadddd','','','','13','','','0','0','');
INSERT INTO `cms_supplier_location` VALUES ('20','����','�����','̫ԭ�н��������','13004958192','������','108.940175','14','3�㵽9��','������û�м�飬лл��','0','0','��������');
INSERT INTO `cms_supplier_location` VALUES ('22','�ν��ϣ���΢�㳡�꣩(����)','','����������·33���´�΢�㳡5¥����315-318��������������','00000000','','(39.907753, 116.30388600000003)','1','','','0','0','����������·33���´�΢�㳡5¥����315-318��������������');
INSERT INTO `cms_supplier_location` VALUES ('23','κ����Ƥ�����ɵ꣩','�ྡྷ��վԼ455��','�����������н�19-10�ţ���ɼҶ��棩','010-67731290','','(39.8845602, 116.45619950000002)','3','','','1','0','�����������н�19-10��');
INSERT INTO `cms_supplier_location` VALUES ('24','��˹���','','������֪��·ӯ������3¥','010-58732215','','(39.9765311, 116.33592529999998)','6','','','1','0','������֪��·ӯ������3¥');
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
INSERT INTO `cms_templates` VALUES ('1','Ĭ�Ϸ��','default','1','','0');
INSERT INTO `cms_templates` VALUES ('2','fdgfdgfd1','aa1','0','1144978a4b712c77322ed20c8e3daee3.jpg','1');
INSERT INTO `cms_templates` VALUES ('4','asdfasdf','asdfasdf','0','9e8ee3548fd144ba9f26819555e71e16.jpg','1');
INSERT INTO `cms_templates` VALUES ('5','�ҵ�ģ��','yyu','0','80088a27d4a4738dbb0dbf7ce6abdfba.jpg','1');
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
INSERT INTO `cms_user_consignee` VALUES ('16','12','1','3407','3408','С�����¿�����','13834544816','030013','����');
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
INSERT INTO `cms_user_extend` VALUES ('54','8|9|10|11','12','afasdfasdf|�ǲ���|yyy|fff');
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
INSERT INTO `cms_user_field` VALUES ('8','asdfa','�ҵ��ֶ�','1','afasdfasdf,aaa','1','1','0');
INSERT INTO `cms_user_field` VALUES ('9','test','��ʱ�ֶ�','0','','0','2','0');
INSERT INTO `cms_user_field` VALUES ('10','list','�²���','0','','1','3','0');
INSERT INTO `cms_user_field` VALUES ('11','temp','��ʱ�ֶ�','0','','0','5','0');
DROP TABLE IF EXISTS `cms_user_group`;
CREATE TABLE `cms_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `discount` double(20,4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;
INSERT INTO `cms_user_group` VALUES ('1','��ͨ��Ա','0','1.0000','0');
INSERT INTO `cms_user_group` VALUES ('2','VIP��Ա','100','0.8000','0');
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
INSERT INTO `cms_weight` VALUES ('4','ǧ��','1.0000');
INSERT INTO `cms_weight` VALUES ('6','��','0.5000');
