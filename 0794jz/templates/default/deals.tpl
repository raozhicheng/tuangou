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
<link href="<{$stylePath}>/css/deal.css" rel="stylesheet" type="text/css" />
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
        <{deal name="deal_info"}>
        	<div class="deal_list_box">
            	<div class="calendar_box">
                	<div class="calendar">
                        <{if $deal_info.time_status==0}>
                            <{assign var=t value=$deal_info.begin_time}>
                        <{else}>
                            <{if $deal_info.end_time>0}>
                                <{assign var=t value=$deal_info.end_time}>
                            <{else}>
                                <{assign var=t value="��������"}>
                            <{/if}>
                        <{/if}>
                        <div class="date"><{if $t>0}><{$t|date_format:'%Y-%m-%d'}><{else}><{$t}><{/if}></div>
                        <div class="day"><{if $t>0}><{$t|date_format:'%d'}><{/if}></div>
                        <div class="week"><{if $t>0}><{$t|date_format:'%A'|replace:"Monday":"����һ"|replace:"Tuesday":"���ڶ�"|replace:"Wednesday":"������"|replace:"Thursday":"������"|replace:"Friday":"������"|replace:"Saturday":"������"|replace:"Sunday":"������"}><{/if}></div>
                    </div>
                    <div class="deal_success_num">
                		��<{$deal_info.buy_count}>�˹���
                	</div>
                </div>
                
                <div class="imgs">
                	<div class="preview">
                    	<{if $deal_info.img}>
                    	<a href="<{$deal_info.link}>"><img src="<{$deal_info.img}>"/></a>
                        <{else}>
                        <div class="no_pic"></div>
                        <{/if}>
                        <div <{if $deal_info.buy_status==2}>class="sold_out"<{elseif $deal_info.time_status==1}>class="in_sale"<{/if}>></div>
                    </div>
                    <div class="buttons">
                    	<div class="shade">
                        	<ul>
                            	<li class="txt"><a href="<{$deal_info.link}>">�鿴����</a></li>
                                <li class="split_line"></li>
                                <li class="txt"><a href="<{$Web_link|name:"deal_order"}>">�鿴����</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="intro">
                	<div class="tit red_l"><a href="<{$deal_info.link}>"><{$deal_info.name|truncate:22:"...":true}></a></div>
                    <div class="content"><{$deal_info.brief}></div>
                    <div class="price">ԭ�ۣ�&yen;<{$deal_info.origin_price}>&nbsp;&nbsp;&nbsp;&nbsp;�ּۣ�&yen;<{$deal_info.current_price}>&nbsp;&nbsp;&nbsp;&nbsp;�ۿۣ�<{$deal_info.discount}>��
                    </div>
                    <div class="save">��ʡ��&yen;<{$deal_info.save_price}></div>
                </div>
            </div>
            <{assign var=p value=$pages|type:"deal":$deal_num}>
          <{/deal}>
          
          <{if $p}>
          <div class="pages">
                	<ul>
                    	<li>����<{$p.row_total}>����¼</li>
                        <li>
                        	<{if $p.current_page==1}>
                              ��һҳ
                              <{else}>
                              <a href="<{$p.current_page_url}>">��һҳ</a>
                              <{/if}>
                        </li>
                        <li>
                        	 <{if $p.prev_page}>
                             <a href="<{$p.prev_page_url}>">��һҳ</a>
                             <{else}>��һҳ<{/if}>
                        </li>
                        <li>
                        	<{if $p.next_page}>
                            <a href="<{$p.next_page_url}>">��һҳ</a>
                            <{else}>��һҳ<{/if}>
                        </li>
                        <li>
                        	<{if $p.current_page==$p.page_num}>
                            ���һҳ
                            <{else}>
                            <a href="<{$p.page_end_url}>">���һҳ</a>
                            <{/if}>
                        </li>
                        <li>��ǰ��<{$p.current_page}>ҳ</li>
                    </ul>
                </div>
          <{/if}>
        </div>
        <{/nocache}>
        <div class="c_right">
        	<{include file="$style/inc/right_info.tpl"}>
        </div>
        <div class="clear"></div>
        
    </div>
</div>
<{include file="$style/footer.tpl"}>

</body>

</html>
