<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript">
$(function()
{
//TABѡ��
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
	//ͼƬԤ�����Ŵ�
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
<div id="location"><strong>��ϵͳ����</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>

 <form name="sys_config" method="post"  enctype="multipart/form-data" action="main.php?act=sys_config">
 
<div id="list">
	<div id="deal_menu">
    	<ul>
        	<li class="deal_current"><a href="#" title="content_1">��������</a></li>
            <li class="deal_menu"><a href="#" title="content_2">ͼƬ����</a></li>
            <li class="deal_menu"><a href="#" title="content_3">��Ա����</a></li>
            <li class="deal_menu"><a href="#" title="content_4">վ������</a></li>
            <li class="deal_menu"><a href="#" title="content_5">�ʼ�����</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    
    <div id="content">
    
    	<div class="show" id="content_1">
        	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
            <{foreach $getSysConfig.base_config as $key=>$var}>
            	  <tr>
    				<td width="15%" bgcolor="#EAEAEA" class="table_left_title"><{$var.show_name}>��</td>
    				<td width="85%" bgcolor="f5f5f5">
                    <{if $var.input_type=="0"}>
                    	<input type="text" name="<{$var.name}>" id="<{$var.name}>" class="input_box" value="<{$var.value}>" style="width:200px;">
                    <{elseif $var.input_type=="1"}>
                    	<{assign var=scope value=","|explode:$var.value_scope}>
                    	<select name="<{$var.name}>">
                        	 <{foreach $scope as $s_var}>
       						 	<option value="<{$s_var}>" <{if $var.value==$s_var}> selected="selected" <{/if}>>
                                <{if $var.name=="URL_MODEL"}>
                                	<{$s_var|replace:0:"ԭʼģʽ"|replace:1:"��дģʽ"}>
                                <{elseif $var.name=="TIME_ZONE"}>
                                	<{$s_var|replace:0:"UTC��׼ʱ��"|replace:8:"����ʱ��,���"}>
                                <{else}>
                                	<{$s_var|replace:0:"�ر�"|replace:1:"����"}>
                                <{/if}>
                                </option>
     						 <{/foreach}>
                        </select>
                     <{elseif $var.input_type=="3"}>
                     	<{if $var.name=="SITE_CLOSE_HTML"}>
                        	<{$SITE_CLOSE_HTML}>
                        <{/if}>
                    <{/if}>
                    </td>
  				  </tr>
            <{/foreach}>
  
</table>
      </div>
        
        <div class="hide" id="content_2">
        	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
 			<{foreach $getSysConfig.img_config as $key=>$var}>
            	 <tr>
    				<td width="15%" bgcolor="#EAEAEA" class="table_left_title"><{$var.show_name}>��</td>
    				<td width="85%" bgcolor="f5f5f5">
                    		<{if $var.input_type=="0"}>
                        		<input type="text" name="<{$var.name}>" id="<{$var.name}>" class="input_box" value="<{$var.value}>" style="width:200px;" <{if $var.name=="BG_COLOR"}> readonly='true' <{/if}> >
                            <{elseif $var.input_type=="1"}>
                    		<{assign var=scope value=","|explode:$var.value_scope}>
                    			<select name="<{$var.name}>">
                        	 <{foreach $scope as $s_var}>
       						 	<option value="<{$s_var}>" <{if $var.value==$s_var}> selected="selected" <{/if}>>
                                <{if $var.name=="MARK_POSITION"}>
                                	<{$s_var|replace:1:"����"|replace:2:"����"|replace:3:"����"|replace:4:"����"|replace:5:"�м�"}>
                                <{else}>
                                	<{$s_var|replace:0:"�ر�"|replace:1:"����"}>
                                <{/if}>
                                </option>
     						 <{/foreach}>
                        		</select>
                        	 <{elseif $var.input_type=="2"}>
                             <input type="file" name="<{$var.name}>" id="<{$var.name}>">
                             <{if $var.value}><input type="hidden" name="<{$var.name}>" value="<{$var.value}>"><img src="<{$bmpPath}>" alt="ͼƬԤ��" width=30 height="30" id="previewPic"><{else}><input type="hidden" name="<{$var.name}>" value="../images/no_image.gif"><img src="images/no_image.gif" alt="ͼƬԤ��" width=30 height="30" id="previewPic"/><{/if}>
                        	 <{/if}>
                    </td>
  				  </tr>
            <{/foreach}>
            </table>
        </div>
        
       <div class="hide" id="content_3" >
        	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
 			<{foreach $getSysConfig.member_config as $key=>$var}>
            	 <tr>
    				<td width="15%" bgcolor="#EAEAEA" class="table_left_title"><{$var.show_name}>��</td>
    				<td width="85%" bgcolor="f5f5f5">
                    		<{if $var.input_type=="0"}>
                        		<input type="text" name="<{$var.name}>" id="<{$var.name}>" class="input_box" value="<{$var.value}>" style="width:200px;">
                            <{elseif $var.input_type=="1"}>
                    		<{assign var=scope value=","|explode:$var.value_scope}>
                    			<select name="<{$var.name}>">
                        	 <{foreach $scope as $s_var}>
       						 	<option value="<{$s_var}>" <{if $var.value==$s_var}> selected="selected" <{/if}>>
                                <{if $var.name=="USER_VERIFY"}>
                                	<{$s_var|replace:0:"��֤��Ч"|replace:1:"�Զ���Ч"}>
                                <{else if $var.name=="REFERRALS_TYPE"}>
                                	<{$s_var|replace:0:"�ֽ�"|replace:1:"����"}>
                                 <{else if $var.name=="MOBILE_MUST"}>
                                	<{$s_var|replace:0:"ѡ��"|replace:1:"����"}>
                                <{else}>
                                	<{$s_var|replace:0:"��"|replace:1:"��"}>
                                <{/if}>
                                </option>
     						 <{/foreach}>
                        		</select>
                        	
                        	 <{/if}>
                    </td>
  				  </tr>
            <{/foreach}>
             </table>
       </div>
        
       <div class="hide" id="content_4">
        	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
             <{foreach $getSysConfig.site_config as $key=>$var}>
            	  <tr>
    				<td width="15%" bgcolor="#EAEAEA" class="table_left_title"><{$var.show_name}>��</td>
    				<td width="85%" bgcolor="f5f5f5">
                    <{if $var.input_type=="0"}>
                    	<input type="text" name="<{$var.name}>" id="<{$var.name}>" class="input_box" value="<{$var.value}>" style="width:200px;">
                    <{elseif $var.input_type=="1"}>
                    	<{assign var=scope value=","|explode:$var.value_scope}>
                    	<select name="<{$var.name}>">
                        	 <{foreach $scope as $s_var}>
       						 	<option value="<{$s_var}>" <{if $var.value==$s_var}> selected="selected" <{/if}>>
                                <{if $var.name=="SHOW_DEAL_CATE"}>
                                	<{$s_var|replace:0:"����ʾ"|replace:1:"��ʾ"}>
                                <{elseif $var.name=="CURRENCY_UNIT"}>
                                	<{$s_var|replace:0:"&yen;"|replace:1:"$"}>
                                <{elseif $var.name=="REFERRAL_IP_LIMIT"}>
                                	<{$s_var|replace:0:"�ر�"|replace:1:"����"}>
                                <{else}>
                                	<{$s_var}>
                                <{/if}>
                                </option>
     						 <{/foreach}>
                        </select>
                     <{elseif $var.input_type=="2"}>
                     <input type="file" name="<{$var.name}>" id="<{$var.name}>">
                     <{if $var.value}><input type="hidden" name="<{$var.name}>" value="<{$var.value}>"><img src="<{if $var.name=="SITE_LOGO"}><{$logoPath}><{elseif $var.name=="FOOTER_LOGO"}><{$footerlogoPath}><{/if}>" alt="ͼƬԤ��" width=30 height="30" id="<{if $var.name=="SITE_LOGO"}>previewPic1<{elseif $var.name=="FOOTER_LOGO"}>previewPic2<{/if}>"><{else}><input type="hidden" name="<{$var.name}>" value="../images/no_image.gif"><img src="images/no_image.gif" alt="ͼƬԤ��" width=30 height="30" id="<{if $var.name=="SITE_LOGO"}>previewPic1<{elseif $var.name=="FOOTER_LOGO"}>previewPic2<{/if}>"/><{/if}>
                     <{elseif $var.input_type=="3"}>
                     	<{if $var.name=="SITE_FOOTER"}>
                        	<{$SITE_FOOTER}>
                        <{elseif $var.name=="REFERRAL_HELP"}>
                        	<{$REFERRAL_HELP}>
                        <{elseif $var.name=="REFERRAL_SIDE_HELP"}>
                        	<{$REFERRAL_SIDE_HELP}>
                         <{elseif $var.name=="COUPON_PRT_TPL"}>
                        	<{$COUPON_PRT_TPL}>
                        <{/if}>
                    <{/if}>
                    </td>
  				  </tr>
            <{/foreach}>
            </table>
        </div>
        
        <div class="hide" id="content_5">
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
        	<{foreach $getSysConfig.mail_config as $key=>$var}>
            	  <tr>
    				<td width="15%" bgcolor="#EAEAEA" class="table_left_title"><{$var.show_name}>��</td>
    				<td width="85%" bgcolor="f5f5f5">
                    <{if $var.input_type=="0"}>
                    	<input type="text" name="<{$var.name}>" id="<{$var.name}>" class="input_box" value="<{$var.value}>" style="width:200px;">
                    <{elseif $var.input_type=="1"}>
                    	<{assign var=scope value=","|explode:$var.value_scope}>
                    	<select name="<{$var.name}>">
                        	 <{foreach $scope as $s_var}>
       						 	<option value="<{$s_var}>" <{if $var.value==$s_var}> selected="selected" <{/if}>>
                                	<{$s_var|replace:0:"��"|replace:1:"��"}>
                                </option>
     						 <{/foreach}>
                        </select>
                    
                    <{/if}>
                    </td>
  				  </tr>
            <{/foreach}>
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
        				<td><input type="submit" name="add" id="add" class="admin_button" value="�༭" /></td>
        				<td><input type="reset" name="reset" class="admin_button" value="����" id="reset" /></td>
      				</tr>
    			</table>
                </td>
 			 </tr>
    	 </table>
     </div>
</div>
<input type="hidden" name="act" value="<{$act}>">
</form>
</body>
</html>
