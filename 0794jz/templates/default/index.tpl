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
<link href="<{$stylePath}>/css/home.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/common.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/font.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<script defer type="text/javascript" src="<{$stylePath}>/js/pngfix.js"></script>
<![endif]-->
<{include file="$style/inc/cart/cart_const.tpl"}>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/script.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.pngfix.js"></script>


<script type="text/javascript"> 
$(document).ready(function()
{
  $("#links .content ul li:nth-child(10n)").css("margin-right","0");
  
});

</script>
</head>

<body>
<{include file="$style/header.tpl"}>
<div class="body_area">
    <div id="content_box">
    	<div class="c_left">
        
        	<div class="deal_info">
            	<{nocache}>
                <{deal name="deal_info" cate_id=$cate_id}>
            	<dl>
                    <dt><h1 class="grey_n"><{$deal_info.name}></h1></dt>
                    <dd>
                        <div class="deal_left left">
                            <div class="mark_box">
                            	<div class="mark_bg">
                                	<div class="price left"><strong>&yen;<{$deal_info.current_price}></strong></div>
                                    <div class="deal_button_box white_l f25b">
                                        <{if $deal_info.time_status==0}>
                                        	<a href="javascript:void(0);"><strong>δ��ʼ</strong></a>								
                                        <{/if}>
                                        <{if $deal_info.time_status==1}>
                                            <{if $deal_info.buy_status==2}>
                                            	<a href="javascript:void(0);"><strong>������</strong></a>	
                                            <{else}>
                                            	<a href="javascript:void(0);" onClick="add_cart(<{$deal_info.id}>)"><strong>����</strong></a>
                                            <{/if}>
                                        <{/if}>
                                        <{if $deal_info.time_status==2}>
                                            <{if $deal_info.buy_status==2}>
                                            	<a href="javascript:void(0);"><strong>������</strong></a>	
                                            <{else}>
                                            	<a href="javascript:void(0);"><strong>�ѽ���</strong></a>
                                            <{/if}>
                                        <{/if}>
                                    	
                            		</div>
                                </div>
                            </div>
                            <div class="price_box">
                           	  <table width="100%" height="100%" border="0" cellspacing="2" cellpadding="2">
                                  <tr>
                                    <!-- <td height="5" align="center" bgcolor="#f1efeb">Ӧ������</td>-->
                                     <td align="center" bgcolor="#f1efeb">�г���</td>
                                    <!-- <td align="center"  bgcolor="#f1efeb">�ٷ�ָ����</td>-->
                                    <td align="center"  bgcolor="#f1efeb">��ʡ</td>
                                 </tr>
                                  <tr>
                                    <!--<td height="32"  align="center"  bgcolor="#f7f3ec">&yen;<{$deal_info.current_price}></td>-->
                                    <td align="center"  bgcolor="#f7f3ec">&yen;<{$deal_info.origin_price}></td>
                                    <!--<td align="center"  bgcolor="#f7f3ec"><{$deal_info.discount}>��</td>-->
                                    <td align="center"  bgcolor="#f7f3ec">&yen;<{$deal_info.save_price}></td>
                                  </tr>
                                  </table>

                            </div>
                            
                            <{if ($deal_info.begin_time!=0 and $deal_info.time_status==0) or ($deal_info.end_time!=0 and $deal_info.time_status==1)}>
                            <div class="counter_box">
                            	<div class="time_logo"></div>
                                <div class="time_text">ʣ��ʱ��:<br />
                                	<ul id="counter"><{$deal_info.end_time}></ul>
                                   
										<script type="text/javascript">
											<{if $deal_info.time_status==1}>
											var endTime = <{$deal_info.end_time}>000;
											var nowTime = <{$smarty.now}>000;
											var sysSecond = (endTime - nowTime) / 1000;
											<{/if}>
											<{if $deal_info.time_status==0}>
											var beginTime = <{$deal_info.begin_time}>000;
											var nowTime = <{$smarty.now}>000;
											var sysSecond = (beginTime - nowTime) / 1000;
											<{/if}>
											var interValObj;
											setRemainTime();
											function setRemainTime()
											{	
												if (sysSecond > 0)
												{
													var second = Math.floor(sysSecond % 60);               
													var minite = Math.floor((sysSecond / 60) % 60);       
													var hour = Math.floor((sysSecond / 3600) % 24);      
													var day = Math.floor((sysSecond / 3600) / 24);        
													var timeHtml = "<span>"+hour+"</span>"+"Сʱ"+"<span>"+minite+"</span>"+"����"+"";
													if(day > 0)
														timeHtml ="<span>"+day+"</span>"+"��"+"" + timeHtml;
													
													timeHtml+="<span>"+second+"</span>"+"��"+"";
													
													try
													{
														$("#counter").html(timeHtml);
														sysSecond--;
													}
													catch(e){}}
												else
												{window.clearTimeout(interValObj);}
												interValObj = window.setTimeout("setRemainTime()", 1000); 	
											}
											</script>
                                </div>
                            </div>
                            <{/if}>
                            
                            <div class="mess_box">
                            	<{if $deal_info.time_status==0}>
                            	<span class="not_start">�Ź�δ��ʼ&nbsp;&nbsp;&nbsp;��ʼʱ��Ϊ<br /><{$deal_info.begin_time|date_format:"%Y-%m-%d %H:%M:%S"}></span>
                                <{/if}>
                                
                                <{if $deal_info.time_status==1}> 
                                	<{if $deal_info.buy_status==0}> 
                                    	<div class="deal_buy_tip_top"><span style="color:red"><{$deal_info.buy_count}></span>���ѹ���</div>
                                        <div class="deal_buy_tip_notice f12">�������ޣ��ȹ��ȵ�</div>
                                        <div class="progress_box">
                                        	<{if $deal_info.min_bought}>
                                        		<{assign var=bar_width value=$deal_info.buy_count/$deal_info.min_bought*198}>
                                            <{else}>
                                            	<{assign var=bar_width value=0}>
                                            <{/if}>
                                        	<div class="bar" style="width:<{$bar_width}>px"></div>
                                            <div class="range clear">
                                            	<div class="left">0</div>
                                                <div class="right"><{$deal_info.min_bought}></div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                	<{/if}>
                                    
                                    <{if $deal_info.buy_status==1}>
                                    	<div class="deal_buy_tip_top"><span style="color:red"><{$deal_info.buy_count nocache}></span>���ѹ���</div>
                                        <{assign var=less_num value=$deal_info.max_bought-$deal_info.buy_count}>
                                        <div class="deal_buy_tip_notice f12">
                                        	<{if $deal_info.max_bought!=0 && $deal_info.max_bought-$deal_info.buy_count<=10}>
                                        	��ʣ<span style="color:red;"><{$less_num}></span>��<br />
                                            <{/if}>
                                        	�������ޣ��ȹ��ȵ�
                                        </div>
                                        <div class="deal_buy_on">�Ź��ѳɹ���<br />�ɼ�������</div>
                                        <div class="deal_buy_time_tip"><{$deal_info.success_time|date_format:"%Y-%m-%d %H:%M:%S"}><br>�ﵽ����Ź���<{$deal_info.min_bought}></div>
                                    <{/if}>
                                    
                                    <{if $deal_info.buy_status==2}> 
                                    	<div class="deal_buy_tip_top"><span style="color:red"><{$deal_info.buy_count}></span>���ѹ���</div>
                                        <div class="deal_buy_tip_notice f14b"><span style="color:red;">������˼���Ѿ�������!</span></div>
                                    <{/if}>
                                <{/if}>
                                <{if $deal_info.time_status==2}>
                                	<{if $deal_info.buy_status==0}>
                                    	<div class="deal_buy_tip_notice f14b"><span style="color:red;">�Ź�δ�ɹ�!</span></div>
                                    <{/if}>
                                    <{if $deal_info.buy_status==1}>
                                    	<div class="deal_buy_tip_notice f14b"><span style="color:red;">�Ź��ɹ�!</span></div>
                                    <{/if}>
                                    <{if $deal_info.buy_status==2}>
                                    	<div class="deal_buy_tip_notice f14b"><span style="color:red;">������˼���Ѿ�������!</span></div>
                                    <{/if}>
                                <{/if}>
                                
                            </div>
                            
                        </div>
                        <div class="deal_right right">
                            <div class="img"><a href="<{$deal_info.link}>"><img src="<{$deal_info.img}>"/></a></div>
                            <span class="brief"><{$deal_info.brief}></span>
                        </div>
                    </dd>
                    <div class="clear"></div>
                </dl>
                <!-- modifier.type.php��� -->
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
                <{/nocache}>
            </div>
            
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
