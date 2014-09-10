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
               		<div class="referral">
                    	<b>总返利金额：</b>&yen;<{$total_referral_money}>&nbsp;&nbsp;|&nbsp;&nbsp;<b>总返利积分：</b><{$total_referral_score}>
                    </div>
                	<div class="data_list">
                        <table cellspacing="1" cellpadding="5" border="0" width="100%" bgcolor="#CCCCCC">
                              <tr>
                                  <th width=12% bgcolor="#EEEEEE">用户名</th>
                                  <th width=13% bgcolor="#EEEEEE">注册时间</th>
                                  <th width=9% bgcolor="#EEEEEE">已返利</th>									
                                  <th width=9% bgcolor="#EEEEEE">已发放</th>
                                  <th width=10% bgcolor="#EEEEEE">返利订单</th>
                                  <th width=12% bgcolor="#EEEEEE">返利时间</th>
                                  <th width=12% bgcolor="#EEEEEE">发放时间</th>
                                  <th width=10% bgcolor="#EEEEEE">返利</th>
                              </tr>
                              <{nocache}>
                              <{referral name="list"}>
                              <tr class="red_l">
                                  <td bgcolor="#FFFFFF" align="center"><{$list.i_user_name}></td>
                                  <td bgcolor="#FFFFFF" align="center"><{$list.i_reg_time}></td>
                                  <td bgcolor="#FFFFFF" align="center"><{$list.i_referral_status}></td>									
                                  <td bgcolor="#FFFFFF" align="center"><{$list.i_pay_status}></td>
                                  <td bgcolor="#FFFFFF" align="center"><{$list.i_order_sn}></td>
                                  <td bgcolor="#FFFFFF" align="center"><{$list.i_referral_time}></td>
                                  <td bgcolor="#FFFFFF" align="center"><{$list.i_pay_time}></td>
                                  <td bgcolor="#FFFFFF" align="center">
                                  <{if $list.i_money > 0}>
                                      &yen;<{$list.i_money}>
                                  <{/if}><br />
                                   <{if $list.i_score > 0}>
                                      <{$list.i_score}>积分
                                  <{/if}>
                                  </td>
                              </tr>
                              <{assign var=p value=$pages|type:"other":$referral_num}>
                              <{/referral}>
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
