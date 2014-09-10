<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript"> 
$(document).ready(function()
{
	$(".send").click(function () {
				$("#list").hide();
				$("#hide").show();	
				return true;
	});
});
</script>
<link href="css/dialog.css" rel="stylesheet" type="text/css" />
<body>
<div id="location"><strong>·业务队列列表</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post" action="main.php?act=msg_queue&edit=del">
<div id="list">
<{if !$deal_msg_list}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无业务队列列表</strong></div></td>
    </tr>
</table>
<{else}>
 
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="8%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="全选"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="反选"></div></td>
          <td><div align="center"><input type="button" id="noall" value="全否"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>编号</strong></div></td>
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>类型</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>接收人</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>会员名称</strong></div></td>
     <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>创建时间</strong></div></td>
     <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>发送时间</strong></div></td>
     <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>发送状态</strong></div></td>
     <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>是否成功</strong></div></td>
     <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>信息</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <{foreach $deal_msg_list as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.send_type|replace:1:"邮件"|replace:0:"短信"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.dest}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.user_name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.create_time|date_format:"%Y-%m-%d %H:%M:%S"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.send_time|date_format:"%Y-%m-%d %H:%M:%S"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.is_send|replace:1:"是"|replace:0:"否"}></div></td>
   <td bgcolor="f5f5f5"><div align="center"><{$var.is_success|replace:1:"成功"|replace:0:"失败"}></div></td>
   <td bgcolor="f5f5f5"><div align="center"><span title="<{$var.result}>" style="cursor:default"><{$var.result|truncate:29:"...":true}></span></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=msg_queue&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('确定要删除<{$var.name}>吗？')">删除</a> | <a href="?act=send_deal_msg&id=<{$var.id}>&st=<{$var.send_type}>" class="send">发送</a> | <span title="标题：<{$var.title}>&#10;内容：<{$var.content|strip_tags}>" style="cursor:default">查看</span></td>
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
              <{if $pageinfo.row_total}><td><input type="submit" name="dels" class="admin_button" value="删除" onClick="return confirm('你确定要删除选中的列表吗?')" /></td><{/if}>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">共<{$pageinfo.row_total}>条记录&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          第一页
          <{else}>
          <a href="?act=mail_server&page=1">第一页</a>
          <{/if}>
&nbsp;&nbsp;｜&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=mail_server&page=<{$pageinfo.prev_page}>">上一页</a>
          <{else}>
          上一页
          <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=mail_server&page=<{$pageinfo.next_page}>">下一页</a>
            <{else}>
            下一页
           <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            最后一页
            <{else}>
            <a href="?act=mail_server&page=<{$pageinfo.page_num}>">最后一页</a>
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
    <td>正在发送.......</td>
    <td> <img src="images/loading.gif"></td>
  </tr>
</table>
</div>
</body>
</html>
