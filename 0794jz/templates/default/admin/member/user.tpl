<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript">
  $(function () { 
	 $("#dels").click(function () {
                 $("form:eq(0)").attr("action", "main.php?act=user&edit=delAll").submit();
      });
     $("#search").click(function () {
                $("form:eq(0)").attr("action", "main.php?act=user&edit=search").submit();
      });
   });

</script>
<body>
<form method="post"  enctype="multipart/form-data" action="">
<div id="location"><div style="float:left"><strong>·会员管理</strong></div>
	<div id="search_bar"><input type="text" name="search_text"  class="input_box">&nbsp;<input name="search" type="submit" id="search" value="搜索"></div>
</div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>

<div id="list">
<{if !$users}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无会员列表</strong></div></td>
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
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>编号</strong></div></td>
    <td width="13%" bgcolor="#EAEAEA"><div align="center"><strong>会员名称</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>积分</strong></div></td>
     <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>状态</strong></div></td>
    <td width="7%" bgcolor="#EAEAEA"><div align="center"><strong>余额</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>会员分组</strong></div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>推荐人</strong></div></td>
     <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>最后登陆</strong></div></td>
     <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>最后登陆时间</strong></div></td>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <{foreach $users as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.user_name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.score}>积分</div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.status|replace:1:'有效'|replace:0:'无效'}></div></td>
    <td bgcolor="f5f5f5"><div align="center">&yen;<{$var.money|string_format:"%.2f"}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.group_name}></div></td>
    <td bgcolor="f5f5f5"><div align="center">
    <{if $var.pid==0}>
    	暂无
    <{else}>
    <{foreach $users as $tmp}>
         <{if $var.pid==$tmp.id}>
    		<{$tmp.user_name}>
    	 <{/if}>
    <{/foreach}>
    <{/if}>
    </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.login_ip}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{if $var.login_time}><{$var.login_time|date_format:"%Y-%m-%d %H:%M:%S"}><{else}>暂无<{/if}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=add_user&edit=mod&id=<{$var.id}>">编辑</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="?act=user&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('确定要删除<{$var.name}>吗？')">删除</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="?act=user_log&id=<{$var.id}>">日志</a></div></td>
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
              <td><input type="button" name="add" class="admin_button" value="新增" onClick="window.location.href='main.php?act=add_user&edit=add'"/></td>
              <{if $pageinfo.row_total}><td><input type="submit" name="dels" id="dels" class="admin_button" value="删除" onClick="return confirm('你确定要删除选中的分类吗?')" /></td><{/if}>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">共<{$pageinfo.row_total}>条记录&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          第一页
          <{else}>
          <a href="?act=user&page=1">第一页</a>
          <{/if}>
&nbsp;&nbsp;｜&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=user&page=<{$pageinfo.prev_page}>">上一页</a>
          <{else}>上一页<{/if}>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=user&page=<{$pageinfo.next_page}>">下一页</a>
            <{else}>下一页<{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            最后一页
            <{else}>
            <a href="?act=user&page=<{$pageinfo.page_num}>">最后一页</a>
            <{/if}>
            &nbsp;&nbsp;｜&nbsp;&nbsp;当前第<{$pageinfo.current_page}>页&nbsp;&nbsp;</div>
            <{/if}>
            </td>
        </tr>
      </table>
      <div align="center"></div></td>
    </tr>
</table>

</div>
</form>
</body>
</html>
