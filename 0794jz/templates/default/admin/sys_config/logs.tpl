<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>·日志管理</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="main.php?act=log&edit=del">
<div id="list">
<{if !$logs}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无日志列表</strong></div></td>
    </tr>
</table>
<{else}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="5%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="全选"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="反选"></div></td>
          <td><div align="center"><input type="button" id="noall" value="全否"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>编号</strong></div></td>
    <td width="20%" bgcolor="#EAEAEA"><div align="center"><strong>日志信息</strong></div></td>
    <td width="13%" bgcolor="#EAEAEA"><div align="center"><strong>操作时间</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>操作IP</strong></div></td>
    <td width="7%" bgcolor="#EAEAEA"><div align="center"><strong>管理员</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>模块</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <{foreach $logs as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.log_info|replace:"成功":"<font color='#009933'>成功</font>"|replace:"失败":"<font color='#CC0000'>失败</font>"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.log_time|date_format:"%Y-%m-%d %H:%M:%S"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.log_ip}></div></td>
     <td bgcolor="f5f5f5"><div align="center"><{$var.admin_name}></div></td>
      <td bgcolor="f5f5f5"><div align="center"><{$var.module}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=log&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('确定要删除吗？')">彻底删除</a></div></td>
  </tr>
  <{/foreach}>
  </table>
<{/if}>
<{if $pageinfo.row_total}>
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
              <td><input type="submit" name="dels" class="admin_button" value="彻底删除" onClick="return confirm('你确定要删除选中的分类吗?')" /></td>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">共<{$pageinfo.row_total}>条记录&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          第一页
          <{else}>
          <a href="?act=log&page=1">第一页</a>
          <{/if}>
&nbsp;&nbsp;｜&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=log&page=<{$pageinfo.prev_page}>">上一页</a>
          <{else}>上一页<{/if}>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=log&page=<{$pageinfo.next_page}>">下一页</a>
            <{else}>下一页<{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            最后一页
            <{else}>
            <a href="?act=log&page=<{$pageinfo.page_num}>">最后一页</a>
            <{/if}>
            &nbsp;&nbsp;｜&nbsp;&nbsp;当前第<{$pageinfo.current_page}>页&nbsp;&nbsp;</div>
            <{/if}>
            </td>
        </tr>
      </table>
      <div align="center"></div></td>
    </tr>
</table>
<{/if}>
</form>
</div>
</body>
</html>
