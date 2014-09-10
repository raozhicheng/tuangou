<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><{$Web_info|set:"SITE_TITLE"}></title>
<meta name="description" content="<{$Web_info|set:"SITE_DESCRIPTION"}>">
<meta name="keywords" content="<{$Web_info|set:"SITE_KEYWORD"}>">
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link rel="shortcut icon" href="<{$stylePath}>/favicon.ico" />
<meta name="author" content="<{$appName}>" />
<meta name="copyright" content="leesuntech.com" />
<link href="<{$stylePath}>/css/global.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/header.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/footer.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/common.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/info.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/font.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<script defer type="text/javascript" src="<{$stylePath}>/js/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="<{$stylePath}>/js/jquery.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/script.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.pngfix.js"></script>
</head>

<body>
<{include file="$style/header.tpl"}>
<div class="body_area">
    <div id="content_box">
    	<div class="c_left">
       	  <{nocache}>
          <div class="infos">
          	<ul>
            <li class="tit"><{infoCate name="infocate" id=$cate_id}><{$infocate.name}><{/infoCate}></li>
            <{info name="info" title_len="70" cate_id=$cate_id}>
            	<li><a href="<{$info.link}>">·&nbsp;&nbsp;<{$info.title}>&nbsp;&nbsp;&nbsp;&nbsp;<{$info.update_time|date_format:"%Y-%m-%d"}></a></li>
                <{assign var=p value=$pages|type:"other":$info_num}>
            <{/info}>
            </ul>
          </div>
          
          <{if $p}>
          <div class="pages">
                	<ul>
                    	<li>共有<{$p.row_total}>条记录</li>
                        <li>
                        	<{if $p.current_page==1}>
                              第一页
                              <{else}>
                              <a href="<{$p.current_page_url}>">第一页</a>
                              <{/if}>
                        </li>
                        <li>
                        	 <{if $p.prev_page}>
                             <a href="<{$p.prev_page_url}>">上一页</a>
                             <{else}>上一页<{/if}>
                        </li>
                        <li>
                        	<{if $p.next_page}>
                            <a href="<{$p.next_page_url}>">下一页</a>
                            <{else}>下一页<{/if}>
                        </li>
                        <li>
                        	<{if $p.current_page==$p.page_num}>
                            最后一页
                            <{else}>
                            <a href="<{$p.page_end_url}>">最后一页</a>
                            <{/if}>
                        </li>
                        <li>当前第<{$p.current_page}>页</li>
                    </ul>
                </div>
          <{/if}>
          <{/nocache}>
          
        </div>
        <div class="c_right">
        	<{include file="$style/inc/right_info.tpl"}>
        </div>
        <div class="clear"></div>
    </div>
</div>
<{include file="$style/footer.tpl"}>

</body>

</html>
