<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>·城市管理列表</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="main.php?act=city&edit=delAll">
<div id="list">
<{if !$cities}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无城市列表</strong></div></td>
    </tr>
</table>
<{else}>
 
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="13%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="全选"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="反选"></div></td>
          <td><div align="center"><input type="button" id="noall" value="全否"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>编号</strong></div></td>
    <td width="17%" bgcolor="#EAEAEA"><div align="center"><strong>团购城市</strong></div></td>
    <td width="18%" bgcolor="#EAEAEA"><div align="center"><strong>当前默认城市</strong></div></td>
    <td width="18%" bgcolor="#EAEAEA"><div align="center"><strong>是否开始运营</strong></div></td>
    <td width="14%" bgcolor="#EAEAEA"><div align="center"><strong>当前状态</strong></div></td>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <{foreach $cities as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" <{if $pageinfo.row_total==1 || $var.is_default}>disabled<{/if}> value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.is_default|replace:1:'是'|replace:0:'否'}><{if !$var.is_default}><a href="main.php?act=set_default&id=<{$var.id}>" style="color:red">[设置为默认]</a><{/if}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.is_open|replace:1:'是'|replace:0:'否'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.status|replace:1:'有效'|replace:0:'无效'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=add_city&edit=mod&id=<{$var.id}>">编辑</a>
     <{if $pageinfo.row_total>1 && !$var.is_default}>
     | <a href="?act=city&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('确定要删除<{$var.name|replace:'├':''|replace:'&nbsp;':''}>吗？')">删除</a>
     <{/if}>
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
              <td><input type="button" name="add" class="admin_button" value="新增" onClick="window.location.href='main.php?act=add_city&edit=add'"/></td>
             <{if $pageinfo.row_total}> <td><input type="submit" name="dels" class="admin_button" value="删除" onClick="return confirm('你确定要删除选中的城市吗?')" /></td><{/if}>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">共<{$pageinfo.row_total}>条记录&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          第一页
          <{else}>
          <a href="?act=city&page=1">第一页</a>
          <{/if}>
&nbsp;&nbsp;｜&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=city&page=<{$pageinfo.prev_page}>">上一页</a>
          <{else}>
          上一页
          <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=city&page=<{$pageinfo.next_page}>">下一页</a>
            <{else}>
            下一页
           <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            最后一页
            <{else}>
            <a href="?act=city&page=<{$pageinfo.page_num}>">最后一页</a>
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
</body>
</html>
