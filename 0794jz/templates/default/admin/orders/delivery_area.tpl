<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>·配送地区列表</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post" action="main.php?act=delivery_area&edit=delAll">
<div id="list">
<{if !$delivery_areas}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无配送地区列表</strong></div></td>
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
    <td width="27%" bgcolor="#EAEAEA"><div align="center"><strong>名称</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>排序</strong></div></td>
    <td width="25%" colspan="2" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <{foreach $delivery_areas as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.name}></div></td>
     <td bgcolor="f5f5f5"><div align="center"><{$var.sort}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=add_deliveryArea&edit=mod&id=<{$var.id}>">编辑</a> | <a href="?act=delivery_area&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('确定要删除<{$var.name}>吗？')">删除</a></div>
    <td bgcolor="f5f5f5">
   <table width="100%" cellpadding="0" cellspacing="0">
   <tr>
    <td><div align="center">
    
      <{if $var.level==1}> 
            <a href="?act=delivery_area&id=<{$var.id}>&level=<{$var.level}>"><img src="images/sub_down.gif" alt="下级" style="cursor:pointer"/></a>
      <{elseif $var.level==3}>
     		<a href="javascript:self.location=document.referrer;"><img src="images/sub_up.gif" alt="上级"/></a>
      <{else}>
      		<a href="?act=delivery_area&id=<{$var.id}>&level=<{$var.level+1}>"><img src="images/sub_down.gif" alt="下级" style="cursor:pointer"/></a>
            <a href="?act=delivery_area"><img src="images/sub_up.gif" alt="上级"/></a>&nbsp;
      <{/if}>
     &nbsp;<{if $var.level!=3}><a href="?act=add_deliveryArea&edit=add&id=<{$var.id}>&level=<{$var.level}>"><img src="images/add.gif" alt="添加子类地区" style="cursor:pointer"/></a><{/if}>
    </div></td>
    </tr>
    </table></td>
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
              <{if !$smarty.get.level}><td><input type="button" name="add" class="admin_button" value="新增" onClick="window.location.href='main.php?act=add_deliveryArea&edit=add'"/></td><{/if}>
              <{if $pageinfo.row_total}><td><input type="submit" name="dels" class="admin_button" value="删除" onClick="return confirm('你确定要删除选中的项目吗?')" /></td><{/if}>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">共<{$pageinfo.row_total}>条记录&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          第一页
          <{else}>
          <a href="?act=delivery_area&page=1&level=<{$smarty.get.level}>&id=<{$id}>">第一页</a>
          <{/if}>
&nbsp;&nbsp;｜&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=delivery_area&page=<{$pageinfo.prev_page}>&level=<{$smarty.get.level}>&id=<{$id}>">上一页</a>
          <{else}>
          上一页
          <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=delivery_area&page=<{$pageinfo.next_page}>&level=<{$smarty.get.level}>&id=<{$id}>">下一页</a>
            <{else}>
            下一页
           <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            最后一页
            <{else}>
            <a href="?act=delivery_area&page=<{$pageinfo.page_num}>&level=<{$smarty.get.level}>&id=<{$id}>">最后一页</a>
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
