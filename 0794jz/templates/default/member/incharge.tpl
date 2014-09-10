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
<script type="text/javascript">
	$(document).ready(function(){
		$("#incharge_done").click(function(){
			if(!($("input[name='money']").val()!=''&&!isNaN($("input[name='money']").val())&&$("input[name='money']").val()>0))			
			{
				alert("��������ȷ���");
				return false;
			}
			else if(!$("input[name='payment']:checked").val())
			{
				alert("��ѡ��֧����ʽ");
				return false;
			}
		});
	});
</script>
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
                    	<b><a href="<{$Web_link|name:"incharge"}>">��Ա��ֵ</a></b>&nbsp;&nbsp;|&nbsp;&nbsp;<b><a href="<{$Web_link|name:"extracts_cash"}>" target="_blank">��Ա����</a></b>
                    </div>
                    <div class="m_s">
                    	�ʻ���&yen;&nbsp;<{$total_money}>&nbsp;&nbsp;&nbsp;��ǰ���֣�<{$total_score}>
                  	</div>
                	<div class="data_list">
                        <table cellspacing="1" cellpadding="5" border="0" width="100%" bgcolor="#CCCCCC">
                              <tr>
                                  <th width=21% bgcolor="#EEEEEE">����</th>
                                  <th width=10% bgcolor="#EEEEEE">��ֵ���</th>
                                  <th width=10% bgcolor="#EEEEEE">֧��������</th>	
                                  <th width=11% bgcolor="#EEEEEE">֧����ʽ</th>									
                                  <th width=11% bgcolor="#EEEEEE">֧��״̬</th>
                                  <th width=13% bgcolor="#EEEEEE">����ʱ��</th>
                                  <th width=13% bgcolor="#EEEEEE">֧��ʱ��</th>
                                  <th width=23% bgcolor="#EEEEEE">����</th>
                              </tr>
                              <{nocache}>
                              <{dealOrder name="list" type="recharge"}>
                              <tr class="red_l">
                                  <td bgcolor="#FFFFFF" align="center">������<{$list.order_sn}><br />�����<{$list.payment_notice.notice_sn}></td>
                                  <td bgcolor="#FFFFFF" align="center">&yen;<{$list.incharge}></td>
                                  <td bgcolor="#FFFFFF" align="center">&yen;<{$list.payment_fee}></td>									
                                  <td bgcolor="#FFFFFF" align="center"><{$list.payment_name}></td>
                                  <td bgcolor="#FFFFFF" align="center"><{$list.pay_status_cn}></td>									
                                  <td bgcolor="#FFFFFF" align="center"><{$list.create_time}></td>
                                  <td bgcolor="#FFFFFF" align="center"><{$list.payment_notice.pay_time}></td>									
                                  <td bgcolor="#FFFFFF" align="center"><{if $list.pay_status==2}>��ֵ���<{else}><a href="<{$Web_link|name:"pay":$list.payment_notice.id}>">֧��</a><{/if}></td>
                              </tr>
                              <{assign var=p value=$pages|type:"other":$order_num}>
                              <{/dealOrder}>
                              <{/nocache}>
                        </table>
                    </div>
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
                      <form name="incharge_form" id="incharge_form" action="<{$Web_link|name:"incharge_done"}>" method="post">
                      <div class="payment_list">
                      	<ul>
                            <{foreach $payment_list as $var}>
                                <li><img src="admin/uploadfiles/<{$var.logo}>" width=88 height=31/><input type='radio' name='payment' value='<{$var.id}>' /><{$var.name}>&nbsp;&nbsp;<span style="font-size:12px;color:#666;"><{$var.description}></span></li>
                            <{/foreach}>
                            <li><span class="right">��<input type="text" class="input" id="money" name="money"> 
							<input type="submit" id="incharge_done" value="��ֵ" class="formbutton"></span></li>
                        </ul>
                      </div>
                      </form>
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
