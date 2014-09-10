<{include file="$APP_STYLE/admin/common/main_header.tpl"}>

<body>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<div id="list">
 <form name="add_dealCoupon" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getDealCoupon.id}>&cid=<{$cid}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getDealCoupon.id}>">
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="8%" bgcolor="#EAEAEA" class="table_left_title">&nbsp;序列号：</td>
    <td width="14%" bgcolor="f5f5f5"> <{if $act=="add"}><input type="text" name="sn" id="sn"  class="input_box"><{else}><{$getDealCoupon.sn}><{/if}>&nbsp;<{if $act=="add"}><span class="attention_text">不填自动</span><{/if}></td>
    <td width="8%" bgcolor="#EAEAEA" class="table_left_title">&nbsp;密码：</td>
    <td width="10%" bgcolor="f5f5f5"><{if $act=="add"}><input type="text" name="password" id="password"  class="input_box"><{else}><{$getDealCoupon.password}><{/if}></td>
  </tr>
  <tr>
    <td width="6%" bgcolor="#EAEAEA" class="table_left_title">&nbsp;生效时间：</td>
    <td width="14%" bgcolor="f5f5f5"><input type="text" name="begin_time" id="begin_time"  class="input_box" value="<{$getDealCoupon.begin_time|date_format:"%Y-%m-%d %H:%M:%S"}>" onClick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')">
    <td width="6%" bgcolor="#EAEAEA" class="table_left_title">&nbsp;过期时间：</td>
    <td width="10%" bgcolor="f5f5f5"><input type="text" name="end_time" id="end_time"  class="input_box" value="<{$getDealCoupon.end_time|date_format:"%Y-%m-%d %H:%M:%S"}>" onClick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')">
 </td>
  </tr>
  <tr>
    <td width="6%" bgcolor="#EAEAEA" class="table_left_title">&nbsp;发放会员：</td>
    <td width="14%" bgcolor="f5f5f5">
    	<select name="user_id" id="user_id" style="width:130px;">
        
        <{if $act=="add"}>
      	  <option value="0"> 未分配会员</option>
          <{foreach $users as $var}>
            <option value="<{$var.id}>"><{$var.user_name}></option>
          <{/foreach}>
          
           <{else if $act=="mod"}>
           		<option value="0" <{if $getDealCoupon.user_id==$var.id}> selected="selected" <{/if}>> 未分配会员</option>
               <{foreach $users as $var}>
               <option value="<{$var.id}>" <{if $getDealCoupon.user_id==$var.id}> selected="selected" <{/if}>><{$var.user_name}></option>
               <{/foreach}>
       
        <{/if}>
        </select>
    <td width="6%" bgcolor="#EAEAEA" class="table_left_title">&nbsp;是否发放：</td>
    <td width="10%" bgcolor="f5f5f5"> 
    		<select name="is_valid" id="is_valid">
				
                
                 <{if $act=="add"}>
      
                    <option value="0">否</option>
					<option value="1">是</option>
                  
                  <{else if $act=="mod"}>
                    <option value="0" <{if $getDealCoupon.is_valid==0}> selected="selected" <{/if}>>否</option>
					<option value="1" <{if $getDealCoupon.is_valid==1}> selected="selected" <{/if}>>是</option>
       			  <{/if}>	
			</select>
 </td>
  </tr>
  
  <{if $act=="mod"}>
 <tr>
    <td width="6%" bgcolor="#EAEAEA" class="table_left_title">&nbsp;订单号：</td>
    <td width="14%" bgcolor="f5f5f5"><{$order_sn}><{if !$order_sn}>[非订单购买生成]<{/if}></td>
    <td width="6%" bgcolor="#EAEAEA" class="table_left_title">&nbsp;查看状态：</td>
    <td width="10%" bgcolor="f5f5f5"><{$getDealCoupon.is_new|replace:1:'已查看'|replace:0:'未查看'}></td>
  </tr>
  <tr>
    <td width="6%" bgcolor="#EAEAEA" class="table_left_title">&nbsp;商户帐号：</td>
    <td width="14%" bgcolor="f5f5f5"><{if $getDealCoupon.confirm_account}><{$account_name}><{else}>暂无<{/if}></td>
    <td width="6%" bgcolor="#EAEAEA" class="table_left_title">&nbsp;确认时间：</td>
    <td width="10%" bgcolor="f5f5f5"><{$getDealCoupon.confirm_time|replace:0:'暂无'}></td>
  </tr>
  <{/if}>
  <tr>
    <td bgcolor="#EAEAEA">&nbsp;</td>
    <td bgcolor="f5f5f5" colspan="4"><table width="164" border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td><input type="submit" name="add" id="add" class="admin_button" value="<{$submitButton}>" /></td>
        <td><input type="reset" name="reset" class="admin_button" value="重置" id="reset" /></td>
        <td><input type="button" class="admin_button" value="返回列表" onClick="window.location.href='main.php?act=deal_coupon&id=<{$cid}>'"/></td>
      </tr>
    </table></td>
  </tr>
</table>

<input type="hidden" name="act" value="<{$act}>">
<{if $act=="add"}>
<input type="hidden" name="order_id" value="0">
<input type="hidden" name="order_deal_id" value="0">
<input type="hidden" name="deal_id" value="<{$cid}>">
<input type="hidden" name="supplier_id" value="<{$supplier_id}>">
<input name="is_delete" type="hidden" value="0" />
<{/if}>
</form>
</div>



</body>
</html>
