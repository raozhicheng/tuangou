<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><{$seo_title nocache}></title>
<meta name="description" content="<{$seo_description nocache}>">
<meta name="keywords" content="<{$seo_keyword nocache}>">
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
<{include file="$style/inc/cart/cart_const.tpl"}>

<script type="text/javascript" src="<{$stylePath}>/js/jquery.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/script.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.pngfix.js"></script>
<script type="text/javascript">
$(function(){
	  var _wrap=$('#side_deal');
	  var _interval=2000;
	  var _moving;
	  _wrap.hover(function(){
	  clearInterval(_moving);
	  },function(){
	  _moving=setInterval(function(){
	  var _field=_wrap.find('dl:first');
	  var _h=_field.height();
	  _field.animate({marginTop:-_h+'px'},800,function(){
	  _field.css('marginTop',0).appendTo(_wrap);
	  })
	  },_interval)
	  }).trigger('mouseleave');
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
                <{deal id=$smarty.get.id name="deal_info"}>
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
                                    <td height="5" align="center" bgcolor="#f1efeb">�ּ�</td>
                                    <td align="center" bgcolor="#f1efeb">ԭ��</td>
                                    <td align="center"  bgcolor="#f1efeb">�ۿ�</td>
                                    <td align="center"  bgcolor="#f1efeb">��ʡ</td>
                                </tr>
                                  <tr>
                                    <td height="32"  align="center"  bgcolor="#f7f3ec">&yen;<{$deal_info.current_price}></td>
                                    <td align="center"  bgcolor="#f7f3ec">&yen;<{$deal_info.origin_price}></td>
                                    <td align="center"  bgcolor="#f7f3ec"><{$deal_info.discount}>��</td>
                                    <td align="center"  bgcolor="#f7f3ec">&yen;<{$deal_info.save_price}></td>
                                  </tr>
                                  </table>

                            </div>
                            
                            <{if ($deal_info.begin_time!=0 and $deal_info.time_status==0) or ($deal_info.end_time!=0 and $deal_info.time_status==1)}>
                            <div class="counter_box">
                            	<div class="time_logo"></div>
                                <div class="time_text">ʣ��ʱ��:<br />
                                	<ul id="counter"><{$deal_info.end_time|date_format:"%Y-%m-%d %H:%M:%S"}></ul>
                                   
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
                                    	<div class="deal_buy_tip_top"><span style="color:red"><{$deal_info.buy_count}></span>���ѹ���</div>
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
                            <div class="img">
                                <{if $deal_info.img_list}>
                                <script language='javascript'> 
									linkarr = new Array();
									picarr = new Array();
									textarr = new Array();
									var swf_width=417;
									var swf_height=274;
									//������ɫ|����λ��|���ֱ�����ɫ|���ֱ���͸����|����������ɫ|����Ĭ����ɫ|������ǰ��ɫ|�Զ�����ʱ��|ͼƬ����Ч��|�Ƿ���ʾ��ť|�򿪷�ʽ
									var configtg='0xffffff|2|0xfffffF|1|0xffffff|0xC5DDBC|0x000033|2|3|1|_blank';
									var files = "";
									var links = "";
									var texts = "";
									//�������õ��ñ��
									<{foreach $deal_info.img_list as $var}>
                                        picarr[<{$var@iteration}>]  = "<{$var.img}>";
									<{/foreach}>
									 
									for(i=1;i<picarr.length;i++){
									if(files=="") files = picarr[i];
									else files += "|"+picarr[i];
									}
									for(i=1;i<linkarr.length;i++){
									if(links=="") links = linkarr[i];
									else links += "|"+linkarr[i];
									}
									for(i=1;i<textarr.length;i++){
									if(texts=="") texts = textarr[i];
									else texts += "|"+textarr[i];
									}
									document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ swf_width +'" height="'+ swf_height +'">');
									document.write('<param name="movie" value="<{$stylePath}>/images/bcastr3.swf"><param name="quality" value="high">');
									document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
									document.write('<param name="FlashVars" value="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'">');
									document.write('<embed src="<{$stylePath}>/images/bcastr3.swf" wmode="opaque" FlashVars="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'& menu="false" quality="high" width="'+ swf_width +'" height="'+ swf_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'); document.write('</object>'); 
								</script>
                                <{else}>
                                	<img src="<{$deal_info.img}>" width=415 height=274/>
                                <{/if}>
                            </div>
                            <span class="brief"><{$deal_info.brief}></span>
                        </div>
                    </dd>
                    <div class="clear"></div>
                </dl>
                <div class="deal_detail_box">
                	<div class="d_left">
                    	<div class="detail">
                        	<div class="t">��������</div>
                            <div class="c"><{$deal_info.description}></div>
                        </div>
                        <div class="supplier">
                        	<div class="t">�̻�����</div>
                            <div class="c"><{$deal_info.supplier_info.0.content}></div>
                        </div>
                    </div>
                    <div class="d_right">
                    	<div class="supplier_info">
                        	<div class="t"><{$deal_info.supplier_info.0.name}></div>
                            <div class="c">
                            	<div class="s_select">
                                    <select name="locations" id="locations_select">
                                          <{foreach $deal_info.supplier_address_info as $key=>$var}>
                                          <option title="supperliers_card<{$var.id}>" value="<{$var.id}>" <{if $key==0}>selected<{/if}> ><{$var.name}></option>
                                          <{/foreach}>
                                     </select>
                                 </div>
                                 
                                 <{foreach $deal_info.supplier_address_info as $key=>$var}>
                                 <ul id="supperliers_card<{$var.id}>" class="supperliers_card">
                                 	<li class="black_l"><a href='http://ditu.google.cn/maps?f=q&source=s_q&hl=zh-CN&geocode=&q=<{$var.api_address}>' target="_blank"><img src="http://ditu.google.cn/maps/api/staticmap?zoom=13&size=260x210&maptype=roadmap&mobile=true&markers=<{$var.point}>&sensor=false&language=zh_CN" /></a>
									</li>
                                    <li>��ַ��<{if $var.address}><{$var.address}><{else}>����<{/if}></li>
                                    <li>�绰��<{if $var.tel}><{$var.tel}><{else}>����<{/if}></li>
                                    <li>��ͨ��·��<{if $var.route}><{$var.route}><{else}>����<{/if}></li>
                                    <li>Ӫҵʱ�䣺<{if $var.open_time}><{$var.open_time}><{else}>����<{/if}></li>
                                    
                                 </ul>
                                 <{/foreach}>
                                 <ul>
                                 	<li><img src="<{$deal_info.supplier_info.0.preview}>" width="100" height="100"></li>
                                 </ul>
                                 
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <{/deal}>
               	
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
