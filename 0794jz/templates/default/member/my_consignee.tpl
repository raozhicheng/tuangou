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
<script type="text/javascript" src="<{$stylePath}>/js/region.js"></script>
<script type="text/javascript">
$(document).ready(function(){	
	  var pindex;
	  $("select[name='region_lv1']").bind("change",function(){
		  pindex = $(this).get(0).selectedIndex;
		  var id=$(this).val();
			$("select[name='region_lv2']").empty();
			$("<option>请选择城市</option>").appendTo($("select[name='region_lv2']"));
			if (pindex!=0){
				<{foreach $consignee_info.region_lv2_all as $lv2}>
					if(id==<{$lv2.pid}>){
						$("<option value=<{$lv2.id}>>"+"<{$lv2.name}>"+"</option>").appendTo($("select[name='region_lv2']"));
					}
				<{/foreach}>
			}
			$("select[name='region_lv3']").empty();
			$("<option>请选择区县</option>").appendTo($("select[name='region_lv3']"));
	  });
	  
	  
	  $("select[name='region_lv2']").bind("change",function(){
		  pindex = $(this).get(0).selectedIndex;
		  var id=$(this).val();
		  $("select[name='region_lv3']").empty();
		  $("<option>请选择区县</option>").appendTo($("select[name='region_lv3']"));
		  if (pindex!=0){
				<{foreach $consignee_info.region_lv3_all as $lv3}>
					if(id==<{$lv3.pid}>){
						$("<option value=<{$lv3.id}>>"+"<{$lv3.name}>"+"</option>").appendTo($("select[name='region_lv3']"));
					}
				<{/foreach}>
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
                	<div class="data_list red_l">
                    <form name="mod_consignee" method="post"  enctype="multipart/form-data" action="<{$Web_link|name:"mod_consignee"}>">
                        <table cellspacing="1" cellpadding="6" border="0" width="100%" bgcolor="#CCCCCC">
								<tbody>
                                <tr>
									<td width=25% bgcolor="#ebebeb" align="right">收货人：</td>
									<td bgcolor="#ffffff"><input type="text" value="<{$consignee_info.consignee}>" name="consignee" size="30"></td>
								</tr>
                                
                                <tr>
									<td width=25% bgcolor="#ebebeb" align="right">所在地区：</td>
									<td bgcolor="#ffffff"><select name="region_lv1">
										    <option value="0">请选择省份</option>
											<{foreach $consignee_info.region_lv1 as $lv1}>
											<option <{if $lv1.selected == 1}>selected="selected"<{/if}> value="<{$lv1.id}>"><{$lv1.name}></option>
											<{/foreach}>
										  </select>
                                          
                                          <select name="region_lv2">
										    <option value="0">请选择城市</option>
											<{foreach $consignee_info.region_lv2 as $lv2}>
											<option <{if $lv2.selected == 1}>selected="selected"<{/if}> value="<{$lv2.id}>"><{$lv2.name}></option>
											<{/foreach}>
										  </select>
                                          
                                          <select name="region_lv3">
										    <option value="0">请选择区县</option>
											<{foreach $consignee_info.region_lv3 as $lv3}>
											<option <{if $lv3.selected == 1}>selected="selected"<{/if}> value="<{$lv3.id}>"><{$lv3.name}></option>
											<{/foreach}>
										  </select>
                                          </td>
								</tr>
                                <tr>
									<td width=25% bgcolor="#ebebeb" align="right">地址：</td>
									<td bgcolor="#ffffff"><input type="text" value="<{$consignee_info.address}>" name="address" size="30"></td>
								</tr>
                                <tr>
									<td width=25% bgcolor="#ebebeb" align="right">邮编：</td>
									<td bgcolor="#ffffff"><input type="text" value="<{$consignee_info.zip}>" name="zip" size="30"></td>
								</tr>
                                <tr>
									<td width=25% bgcolor="#ebebeb" align="right">手机：</td>
									<td bgcolor="#ffffff"><input type="text" value="<{$consignee_info.mobile}>" name="mobile" size="30"></td>
								</tr>
                                <tr>
									<td width=25% bgcolor="#ebebeb" align="right"></td>
									<td bgcolor="#ffffff"><input type="hidden" value="<{$consignee_info.id}>" name="id" />							
										<input type="submit"  id="settings-submit" name="commit" value="编辑"></td>
								</tr>
                         </tbody>
                         </table>
                       </form>  
                    </div>
                    
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
