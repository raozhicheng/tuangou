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
<link href="<{$stylePath}>/css/user.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/font.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<script defer type="text/javascript" src="<{$stylePath}>/js/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="<{$stylePath}>/js/jquery.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/script.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/register.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.pngfix.js"></script>
</head>

<body>
<{include file="$style/header.tpl"}>
<div class="body_area">
	
    <div id="content_box">
    	<div class="c_left">
        	<div class="user_f">
            	<div class="tit"><{$title}></div>
                <div class="member_box">
               		<div class="money">
                    	<b><a href="<{$Web_link|name:"incharge"}>">会员充值</a></b>&nbsp;&nbsp;|&nbsp;&nbsp;<b><a href="<{$Web_link|name:"extracts_cash"}>" target="_blank">会员提现</a></b>
                    </div>
                    <div class="m_s">
                    	帐户金额：&yen;&nbsp;<{$total_money}>&nbsp;&nbsp;&nbsp;当前积分：<{$total_score}>
                  	</div>
                	<div class="data_list">
                        <table cellspacing="1" cellpadding="5" border="0" width="100%" bgcolor="#CCCCCC">
                              <tr>
                                  <th width=40% bgcolor="#EEEEEE">日志信息</th>
                                  <th width=15% bgcolor="#EEEEEE">金额</th>
                                  <th width=15% bgcolor="#EEEEEE">积分</th>									
                                  <th width=20% bgcolor="#EEEEEE">时间</th>
                              </tr>
                              <{nocache}>
                              <{userLog name="list"}>
                              <tr class="red_l">
                                  <td bgcolor="#FFFFFF" align="center"><{$list.log_info}></td>
                                  <td bgcolor="#FFFFFF" align="center">&yen;<{$list.money}></td>
                                  <td bgcolor="#FFFFFF" align="center"><{$list.score}></td>									
                                  <td bgcolor="#FFFFFF" align="center"><{$list.log_time}></td>
                              </tr>
                              <{assign var=p value=$pages|type:"other":$userlog_num}>
                              <{/userLog}>
                              <{/nocache}>
                        </table>
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
                </div>
            </div>
        	<div class="clear"></div>
        </div>
        <div class="c_right">
        	<div class="member_right_box">
            	<div class="top"></div>
                <div class="mid">
                	<ul>
                        <{include file="$style/inc/member_nav.tpl"}>
                    </ul>
                </div>
                <div class="bottom"></div>
            </div>
        </div>
            
        <div class="clear"></div>
    	</div>
     </div>
        
</div>
<{include file="$style/footer.tpl"}>

</body>

</html>
