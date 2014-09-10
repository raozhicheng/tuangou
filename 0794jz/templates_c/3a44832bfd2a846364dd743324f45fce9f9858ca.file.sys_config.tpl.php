<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:23:46
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/sys_config/sys_config.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158087361053fd8782ccb023-28234067%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a44832bfd2a846364dd743324f45fce9f9858ca' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/sys_config/sys_config.tpl',
      1 => 1363092064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158087361053fd8782ccb023-28234067',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mess' => 0,
    'tmess' => 0,
    'getSysConfig' => 0,
    'var' => 0,
    'scope' => 0,
    's_var' => 0,
    'SITE_CLOSE_HTML' => 0,
    'bmpPath' => 0,
    'logoPath' => 0,
    'footerlogoPath' => 0,
    'SITE_FOOTER' => 0,
    'REFERRAL_HELP' => 0,
    'REFERRAL_SIDE_HELP' => 0,
    'COUPON_PRT_TPL' => 0,
    'act' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd8782e6d724_75311314',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd8782e6d724_75311314')) {function content_53fd8782e6d724_75311314($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.replace.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['APP_STYLE']->value)."/admin/common/main_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
$(function()
{
//TAB选项
$("#deal_menu>ul>li>a").click(function(){
	$("#deal_menu ul li").removeClass("deal_current");
	$("#deal_menu ul li").addClass("deal_menu");
	$(this).parent().addClass("deal_current");
	$(this).blur();
	$("#content div").removeClass("show");
	$("#content div").addClass("hide");
	var content_show = $(this).attr("title");
	$("#"+content_show).removeClass("hide");
	$("#"+content_show).addClass("show");
})

$('#BG_COLOR').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		$(el).val("#"+hex);
		$(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		$(this).ColorPickerSetColor(this.value);
	}
})

$(function()
{
	//图片预览及放大
 xOffset = 10;
 yOffset = 30;
	$("#previewPic,#previewPic1,#previewPic2").hover(function(e){
                $("<img id='imgshow' src='" + this.src + "' width='150' height='150'/>").appendTo("body");
                $("#imgshow")
                    .css("top", (e.pageY - xOffset) + "px")
                 .css("left", (e.pageX + yOffset) + "px")
           .fadeIn("fast");
            }, function() {
                $("#imgshow").remove();
    });
	$("#previewPic,#previewPic1,#previewPic2").mousemove(function(e) {
                $("#imgshow")
                   .css("top", (e.pageY - xOffset) + "px")
             .css("left", (e.pageX + yOffset) + "px")
            });
});

})
</script>
<body>
<div id="location"><strong>·系统设置</strong></div>
	<div id="warning" <?php if ($_smarty_tpl->tpl_vars['mess']->value=="error"){?>style="display:block;"<?php }else{ ?>style="display:none;"<?php }?> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['tmess']->value;?>
</font></div>
</div>

 <form name="sys_config" method="post"  enctype="multipart/form-data" action="main.php?act=sys_config">
 
<div id="list">
	<div id="deal_menu">
    	<ul>
        	<li class="deal_current"><a href="#" title="content_1">基础配置</a></li>
            <li class="deal_menu"><a href="#" title="content_2">图片配置</a></li>
            <li class="deal_menu"><a href="#" title="content_3">会员配置</a></li>
            <li class="deal_menu"><a href="#" title="content_4">站点配置</a></li>
            <li class="deal_menu"><a href="#" title="content_5">邮件配置</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    
    <div id="content">
    
    	<div class="show" id="content_1">
        	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
            <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['getSysConfig']->value['base_config']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['var']->key;
?>
            	  <tr>
    				<td width="15%" bgcolor="#EAEAEA" class="table_left_title"><?php echo $_smarty_tpl->tpl_vars['var']->value['show_name'];?>
：</td>
    				<td width="85%" bgcolor="f5f5f5">
                    <?php if ($_smarty_tpl->tpl_vars['var']->value['input_type']=="0"){?>
                    	<input type="text" name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['value'];?>
" style="width:200px;">
                    <?php }elseif($_smarty_tpl->tpl_vars['var']->value['input_type']=="1"){?>
                    	<?php $_smarty_tpl->tpl_vars['scope'] = new Smarty_variable(explode(",",$_smarty_tpl->tpl_vars['var']->value['value_scope']), null, 0);?>
                    	<select name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
">
                        	 <?php  $_smarty_tpl->tpl_vars['s_var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s_var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scope']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s_var']->key => $_smarty_tpl->tpl_vars['s_var']->value){
$_smarty_tpl->tpl_vars['s_var']->_loop = true;
?>
       						 	<option value="<?php echo $_smarty_tpl->tpl_vars['s_var']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['var']->value['value']==$_smarty_tpl->tpl_vars['s_var']->value){?> selected="selected" <?php }?>>
                                <?php if ($_smarty_tpl->tpl_vars['var']->value['name']=="URL_MODEL"){?>
                                	<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['s_var']->value,0,"原始模式"),1,"重写模式");?>

                                <?php }elseif($_smarty_tpl->tpl_vars['var']->value['name']=="TIME_ZONE"){?>
                                	<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['s_var']->value,0,"UTC标准时区"),8,"北京时间,香港");?>

                                <?php }else{ ?>
                                	<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['s_var']->value,0,"关闭"),1,"开启");?>

                                <?php }?>
                                </option>
     						 <?php } ?>
                        </select>
                     <?php }elseif($_smarty_tpl->tpl_vars['var']->value['input_type']=="3"){?>
                     	<?php if ($_smarty_tpl->tpl_vars['var']->value['name']=="SITE_CLOSE_HTML"){?>
                        	<?php echo $_smarty_tpl->tpl_vars['SITE_CLOSE_HTML']->value;?>

                        <?php }?>
                    <?php }?>
                    </td>
  				  </tr>
            <?php } ?>
  
</table>
      </div>
        
        <div class="hide" id="content_2">
        	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
 			<?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['getSysConfig']->value['img_config']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['var']->key;
?>
            	 <tr>
    				<td width="15%" bgcolor="#EAEAEA" class="table_left_title"><?php echo $_smarty_tpl->tpl_vars['var']->value['show_name'];?>
：</td>
    				<td width="85%" bgcolor="f5f5f5">
                    		<?php if ($_smarty_tpl->tpl_vars['var']->value['input_type']=="0"){?>
                        		<input type="text" name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['value'];?>
" style="width:200px;" <?php if ($_smarty_tpl->tpl_vars['var']->value['name']=="BG_COLOR"){?> readonly='true' <?php }?> >
                            <?php }elseif($_smarty_tpl->tpl_vars['var']->value['input_type']=="1"){?>
                    		<?php $_smarty_tpl->tpl_vars['scope'] = new Smarty_variable(explode(",",$_smarty_tpl->tpl_vars['var']->value['value_scope']), null, 0);?>
                    			<select name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
">
                        	 <?php  $_smarty_tpl->tpl_vars['s_var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s_var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scope']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s_var']->key => $_smarty_tpl->tpl_vars['s_var']->value){
$_smarty_tpl->tpl_vars['s_var']->_loop = true;
?>
       						 	<option value="<?php echo $_smarty_tpl->tpl_vars['s_var']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['var']->value['value']==$_smarty_tpl->tpl_vars['s_var']->value){?> selected="selected" <?php }?>>
                                <?php if ($_smarty_tpl->tpl_vars['var']->value['name']=="MARK_POSITION"){?>
                                	<?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['s_var']->value,1,"左上"),2,"右上"),3,"左下"),4,"右下"),5,"中间");?>

                                <?php }else{ ?>
                                	<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['s_var']->value,0,"关闭"),1,"开启");?>

                                <?php }?>
                                </option>
     						 <?php } ?>
                        		</select>
                        	 <?php }elseif($_smarty_tpl->tpl_vars['var']->value['input_type']=="2"){?>
                             <input type="file" name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
">
                             <?php if ($_smarty_tpl->tpl_vars['var']->value['value']){?><input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['value'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['bmpPath']->value;?>
" alt="图片预览" width=30 height="30" id="previewPic"><?php }else{ ?><input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
" value="../images/no_image.gif"><img src="images/no_image.gif" alt="图片预览" width=30 height="30" id="previewPic"/><?php }?>
                        	 <?php }?>
                    </td>
  				  </tr>
            <?php } ?>
            </table>
        </div>
        
       <div class="hide" id="content_3" >
        	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
 			<?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['getSysConfig']->value['member_config']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['var']->key;
?>
            	 <tr>
    				<td width="15%" bgcolor="#EAEAEA" class="table_left_title"><?php echo $_smarty_tpl->tpl_vars['var']->value['show_name'];?>
：</td>
    				<td width="85%" bgcolor="f5f5f5">
                    		<?php if ($_smarty_tpl->tpl_vars['var']->value['input_type']=="0"){?>
                        		<input type="text" name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['value'];?>
" style="width:200px;">
                            <?php }elseif($_smarty_tpl->tpl_vars['var']->value['input_type']=="1"){?>
                    		<?php $_smarty_tpl->tpl_vars['scope'] = new Smarty_variable(explode(",",$_smarty_tpl->tpl_vars['var']->value['value_scope']), null, 0);?>
                    			<select name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
">
                        	 <?php  $_smarty_tpl->tpl_vars['s_var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s_var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scope']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s_var']->key => $_smarty_tpl->tpl_vars['s_var']->value){
$_smarty_tpl->tpl_vars['s_var']->_loop = true;
?>
       						 	<option value="<?php echo $_smarty_tpl->tpl_vars['s_var']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['var']->value['value']==$_smarty_tpl->tpl_vars['s_var']->value){?> selected="selected" <?php }?>>
                                <?php if ($_smarty_tpl->tpl_vars['var']->value['name']=="USER_VERIFY"){?>
                                	<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['s_var']->value,0,"验证生效"),1,"自动生效");?>

                                <?php }elseif($_smarty_tpl->tpl_vars['var']->value['name']=="REFERRALS_TYPE"){?>
                                	<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['s_var']->value,0,"现金"),1,"积分");?>

                                 <?php }elseif($_smarty_tpl->tpl_vars['var']->value['name']=="MOBILE_MUST"){?>
                                	<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['s_var']->value,0,"选填"),1,"必填");?>

                                <?php }else{ ?>
                                	<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['s_var']->value,0,"否"),1,"是");?>

                                <?php }?>
                                </option>
     						 <?php } ?>
                        		</select>
                        	
                        	 <?php }?>
                    </td>
  				  </tr>
            <?php } ?>
             </table>
       </div>
        
       <div class="hide" id="content_4">
        	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
             <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['getSysConfig']->value['site_config']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['var']->key;
?>
            	  <tr>
    				<td width="15%" bgcolor="#EAEAEA" class="table_left_title"><?php echo $_smarty_tpl->tpl_vars['var']->value['show_name'];?>
：</td>
    				<td width="85%" bgcolor="f5f5f5">
                    <?php if ($_smarty_tpl->tpl_vars['var']->value['input_type']=="0"){?>
                    	<input type="text" name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['value'];?>
" style="width:200px;">
                    <?php }elseif($_smarty_tpl->tpl_vars['var']->value['input_type']=="1"){?>
                    	<?php $_smarty_tpl->tpl_vars['scope'] = new Smarty_variable(explode(",",$_smarty_tpl->tpl_vars['var']->value['value_scope']), null, 0);?>
                    	<select name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
">
                        	 <?php  $_smarty_tpl->tpl_vars['s_var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s_var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scope']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s_var']->key => $_smarty_tpl->tpl_vars['s_var']->value){
$_smarty_tpl->tpl_vars['s_var']->_loop = true;
?>
       						 	<option value="<?php echo $_smarty_tpl->tpl_vars['s_var']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['var']->value['value']==$_smarty_tpl->tpl_vars['s_var']->value){?> selected="selected" <?php }?>>
                                <?php if ($_smarty_tpl->tpl_vars['var']->value['name']=="SHOW_DEAL_CATE"){?>
                                	<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['s_var']->value,0,"不显示"),1,"显示");?>

                                <?php }elseif($_smarty_tpl->tpl_vars['var']->value['name']=="CURRENCY_UNIT"){?>
                                	<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['s_var']->value,0,"&yen;"),1,"$");?>

                                <?php }elseif($_smarty_tpl->tpl_vars['var']->value['name']=="REFERRAL_IP_LIMIT"){?>
                                	<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['s_var']->value,0,"关闭"),1,"开启");?>

                                <?php }else{ ?>
                                	<?php echo $_smarty_tpl->tpl_vars['s_var']->value;?>

                                <?php }?>
                                </option>
     						 <?php } ?>
                        </select>
                     <?php }elseif($_smarty_tpl->tpl_vars['var']->value['input_type']=="2"){?>
                     <input type="file" name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
">
                     <?php if ($_smarty_tpl->tpl_vars['var']->value['value']){?><input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['value'];?>
"><img src="<?php if ($_smarty_tpl->tpl_vars['var']->value['name']=="SITE_LOGO"){?><?php echo $_smarty_tpl->tpl_vars['logoPath']->value;?>
<?php }elseif($_smarty_tpl->tpl_vars['var']->value['name']=="FOOTER_LOGO"){?><?php echo $_smarty_tpl->tpl_vars['footerlogoPath']->value;?>
<?php }?>" alt="图片预览" width=30 height="30" id="<?php if ($_smarty_tpl->tpl_vars['var']->value['name']=="SITE_LOGO"){?>previewPic1<?php }elseif($_smarty_tpl->tpl_vars['var']->value['name']=="FOOTER_LOGO"){?>previewPic2<?php }?>"><?php }else{ ?><input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
" value="../images/no_image.gif"><img src="images/no_image.gif" alt="图片预览" width=30 height="30" id="<?php if ($_smarty_tpl->tpl_vars['var']->value['name']=="SITE_LOGO"){?>previewPic1<?php }elseif($_smarty_tpl->tpl_vars['var']->value['name']=="FOOTER_LOGO"){?>previewPic2<?php }?>"/><?php }?>
                     <?php }elseif($_smarty_tpl->tpl_vars['var']->value['input_type']=="3"){?>
                     	<?php if ($_smarty_tpl->tpl_vars['var']->value['name']=="SITE_FOOTER"){?>
                        	<?php echo $_smarty_tpl->tpl_vars['SITE_FOOTER']->value;?>

                        <?php }elseif($_smarty_tpl->tpl_vars['var']->value['name']=="REFERRAL_HELP"){?>
                        	<?php echo $_smarty_tpl->tpl_vars['REFERRAL_HELP']->value;?>

                        <?php }elseif($_smarty_tpl->tpl_vars['var']->value['name']=="REFERRAL_SIDE_HELP"){?>
                        	<?php echo $_smarty_tpl->tpl_vars['REFERRAL_SIDE_HELP']->value;?>

                         <?php }elseif($_smarty_tpl->tpl_vars['var']->value['name']=="COUPON_PRT_TPL"){?>
                        	<?php echo $_smarty_tpl->tpl_vars['COUPON_PRT_TPL']->value;?>

                        <?php }?>
                    <?php }?>
                    </td>
  				  </tr>
            <?php } ?>
            </table>
        </div>
        
        <div class="hide" id="content_5">
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
        	<?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['getSysConfig']->value['mail_config']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['var']->key;
?>
            	  <tr>
    				<td width="15%" bgcolor="#EAEAEA" class="table_left_title"><?php echo $_smarty_tpl->tpl_vars['var']->value['show_name'];?>
：</td>
    				<td width="85%" bgcolor="f5f5f5">
                    <?php if ($_smarty_tpl->tpl_vars['var']->value['input_type']=="0"){?>
                    	<input type="text" name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['value'];?>
" style="width:200px;">
                    <?php }elseif($_smarty_tpl->tpl_vars['var']->value['input_type']=="1"){?>
                    	<?php $_smarty_tpl->tpl_vars['scope'] = new Smarty_variable(explode(",",$_smarty_tpl->tpl_vars['var']->value['value_scope']), null, 0);?>
                    	<select name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
">
                        	 <?php  $_smarty_tpl->tpl_vars['s_var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s_var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scope']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s_var']->key => $_smarty_tpl->tpl_vars['s_var']->value){
$_smarty_tpl->tpl_vars['s_var']->_loop = true;
?>
       						 	<option value="<?php echo $_smarty_tpl->tpl_vars['s_var']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['var']->value['value']==$_smarty_tpl->tpl_vars['s_var']->value){?> selected="selected" <?php }?>>
                                	<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['s_var']->value,0,"否"),1,"是");?>

                                </option>
     						 <?php } ?>
                        </select>
                    
                    <?php }?>
                    </td>
  				  </tr>
            <?php } ?>
           </table>
        </div>
        
        
    </div>
    <div style="border:solid 1px #CDCDCD;padding:5px;margin-top:5px;">
    	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  			<tr>
    			<td width="15%" bgcolor="#EAEAEA"></td>
    			<td width="85%" bgcolor="f5f5f5">
                <table width="164" border="0" cellspacing="3" cellpadding="0">
      				<tr>
        				<td><input type="submit" name="add" id="add" class="admin_button" value="编辑" /></td>
        				<td><input type="reset" name="reset" class="admin_button" value="重置" id="reset" /></td>
      				</tr>
    			</table>
                </td>
 			 </tr>
    	 </table>
     </div>
</div>
<input type="hidden" name="act" value="<?php echo $_smarty_tpl->tpl_vars['act']->value;?>
">
</form>
</body>
</html>
<?php }} ?>