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
<script type="text/javascript" src="<{$stylePath}>/js/jquery.pngfix.js"></script>

</head>

<body>
<{include file="$style/header.tpl"}>
<div class="body_area">
	
    <div id="content_box">
    	<div class="c_left">
        	<div class="user_f">
            	<div class="tit"><{$title}></div>
                <div class="reg_box">
                	<form name="mod_profile" method="post"  enctype="multipart/form-data" action="<{$Web_link|name:"mod_profile"}>">
                	<ul>
                    	<li><span class="t"><label for="user_name">用户名:</label></span><span class="i"><input type="text" name="user_name" id="user_name" class="input_box" value="<{$user_data.user_name}>" readonly="readonly" /></span></li>
                        <li><span class="t"><label for="email">Email:</label></span><span class="i"><input type="text" name="email" id="email" class="input_box" value="<{$user_data.email}>" /></span></li>
                        <li><span class="t"><label for="user_pwd">密码:</label></span><span class="i"><input type="password" name="user_pwd" id="user_pwd" class="input_box" value="" /></span></li>
                        <li><span class="t"><label for="user_confirm_pwd">确认密码:</label></span><span class="i"><input type="password" name="user_confirm_pwd" id="user_confirm_pwd" class="input_box" value="" /></span></li>
                        <li><span class="t"><label for="mobile">手机号码:</label></span><span class="i"><input type="text" name="mobile" id="mobile" class="input_box" value="<{$user_data.mobile}>" /></span></li>
                        <{assign var='ext_values' value='|'|explode:$getUserExt.value}>
                        <{foreach $user_field as $var}>
                        <{assign var='options' value=','|explode:$var.value_scope}>
                        <{assign var='times' value=$var@iteration-1}>
                        <li><span class="t"><label for="<{$var.field_name}>"><{$var.field_show_name}>:</label></span>
                        	<span class="i">
                            <{if $var.input_type==0}>
                              <input type="text" name="<{$var.field_name}>" id="<{$var.field_name}>" class="input_box" value="<{$ext_values.$times}>">
                              <{else if $var.input_type==1}>
                              <select name="<{$var.field_name}>" id="<{$var.field_name}>">
                              <{foreach $options as $var_option}>
                              <option value="<{$var_option}>" <{if $ext_values.$times==$var_option}>selected="selected" <{/if}> ><{$var_option}></option>
                              <{/foreach}>
                              </select>
                             <{/if}>
                             </span>
                             <span class="tip red_n f14b"><{if $var.is_must}>*<{/if}></span>
                         </li>
                         <{/foreach}>
                         <li><span class="t"></span><span class="i"><input type="submit" name="modify" id="submit" class="submit_button" value="修改" /></span></li>
                        
                    </ul>
                    <input  type="hidden"  name="ext_id" value="<{$ext_id}>" />
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
