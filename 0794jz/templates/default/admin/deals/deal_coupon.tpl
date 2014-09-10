<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript"> 
$(document).ready(function()
{
	$("#mail").click(function () {
				$("#list").hide();
				$("#hide").show();	
				return true;
	});
	
	$("#sms").click(function () {
				$("#list").hide();
				$("#hide").show();	
				return true;
	});
});
</script>
<body>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="main.php?act=deal_coupon&edit=delAll&id=<{$id}>">
<div id="list">
<{if !$deal_coupons}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无团购券列表</strong></div></td>
    </tr>
</table>
<{else}>
 
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="5%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="全" style="margin:0"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="反"  style="margin:0"></div></td>
          <td><div align="center"><input type="button" id="noall" value="否"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>编号</strong></div></td>
    <td width="14%" bgcolor="#EAEAEA"><div align="center"><strong>团购券序列号</strong></div></td>
    <td width="12%" bgcolor="#EAEAEA"><div align="center"><strong>所属会员</strong></div></td>
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>发放</strong></div></td>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <{foreach $deal_coupons as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox"  value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.sn}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{if $var.user_id}><{$var.user_name}><{else}>未分配<{/if}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.is_valid|replace:1:'<font color=green>发</font>'|replace:0:'<font color=red>未</font>'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=add_dealCoupon&edit=mod&id=<{$var.id}>&cid=<{$id}>">编辑</a>&nbsp|&nbsp;<a href="?act=deal_coupon&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('确定要删除<{$var.name|replace:'├':''|replace:'&nbsp;':''}>吗？')">删除</a>&nbsp|&nbsp;<a href="?act=send_coupon_sms&id=<{$var.id}>&cid=<{$id}>" id="sms">短信</a>&nbsp|&nbsp;<a href="?act=send_coupon_mail&id=<{$var.id}>&cid=<{$id}>" id="mail">邮件</a>
     </div></td>
  </tr>
  <{/foreach}>
  </table>
<{/if}>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="5"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#EAEAEA">
  <tr>
    <td bgcolor="#F5F5F5" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="19%"><table width="164" border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><input type="button" name="add" class="admin_button" value="新增" onClick="window.location.href='main.php?act=add_dealCoupon&edit=add&cid=<{$id}>'"/></td>
             <{if $pageinfo.row_total}> <td><input type="submit" name="dels" class="admin_button" value="删除" onClick="return confirm('你确定要删除选中的项目吗?')" /></td><{/if}>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">共<{$pageinfo.row_total}>条记录&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          第一页
          <{else}>
          <a href="?act=deal_coupon&page=1&id=<{$id}>">第一页</a>
          <{/if}>
&nbsp;&nbsp;｜&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=deal_coupon&page=<{$pageinfo.prev_page}>&id=<{$id}>">上一页</a>
          <{else}>
          上一页
          <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=deal_coupon&page=<{$pageinfo.next_page}>&id=<{$id}>">下一页</a>
            <{else}>
            下一页
           <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            最后一页
            <{else}>
            <a href="?act=deal_coupon&page=<{$pageinfo.page_num}>&id=<{$id}>">最后一页</a>
            <{/if}>
            &nbsp;&nbsp;｜&nbsp;&nbsp;当前第<{$pageinfo.current_page}>页&nbsp;&nbsp;</div>
            <{/if}>
            </td>
        </tr>
      </table>
      <div align="center"></div></td>
    </tr>
</table>
</form>
</div>

<div id="hide" style="display: none;" class="waiting">
 <table width="200" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td> 正在发送.......</td>
    <td> <img src="images/loading.gif"></td>
  </tr>
</table>
</div>

</body>
</html>
