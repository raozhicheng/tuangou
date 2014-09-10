<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript">
  $(function () { 
	 $("#restore").click(function () {
                 $("form:eq(0)").attr("action", "main.php?act=<{$status}>&current=<{$current_table}>&edit=restore").submit();
      });
     $("#dels").click(function () {
                $("form:eq(0)").attr("action", "main.php?act=<{$status}>&current=<{$current_table}>&edit=del").submit();
      });
   });

</script>

<body>
<div id="location"><strong>·回收站</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="">
 <div id="list">
 <div id="deal_menu">
    	<ul>
        	<{foreach $tables as $key=>$value}>
            
				<li <{if $current_table==$key}>class="deal_current"<{else}>class="deal_menu"<{/if}>><a href="?act=<{$status}>&current=<{$key}>" ><{$value.0}></a></li>
            
			<{/foreach}>
        </ul>
    </div>
 <div class="clear"></div>
<div id="content" class="show"> 
<{if !$recycle}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#cdcdcd">
  <tr>
	<td bgcolor="#F2F2F2"><div align="center"><strong  style="color:red">空回收站</strong></div></td>
    </tr>
</table>
<{else}>

	
    	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#cdcdcd">
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
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>编号</strong></div></td>
    <td width="45%" bgcolor="#EAEAEA"><div align="center"><strong>名称</strong></div></td>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <{foreach $recycle as $key=>$var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$name=$tables.$current_table.1}><{$var.$name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=<{$status}>&current=<{$current_table}>&id=<{$var.id}>&edit=restore">还原</a> | <a href="?act=<{$status}>&page=<{$pageinfo.current_page}>&id=<{$var.id}>&current=<{$current_table}>&edit=del" onClick="return confirm('确定要删除<{$var.name}>吗？')">删除</a></div></td>
  </tr>
  <{/foreach}>
  </table>
<{/if}>
</div>
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
          <td width="19%"> <table width="164" border="0" cellspacing="3" cellpadding="0">
            <tr>
           <td><input type="button" name="restore" id="restore" class="admin_button" value="还原"/></td>
              <td><input type="submit" name="dels" id="dels" class="admin_button" value="删除" onClick="return confirm('你确定要删除吗?')" /></td>
            </tr>
          </table></td>
          <td width="81%">
          <div align="right">共<{$pageinfo.row_total}>条记录&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          第一页
          <{else}>
          <a href="?act=<{$status}>&page=1&current=<{$current_table}>">第一页</a>
          <{/if}>
&nbsp;&nbsp;｜&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=<{$status}>&page=<{$pageinfo.prev_page}>&current=<{$current_table}>">上一页</a>
          <{else}>
          上一页
          <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=<{$status}>&page=<{$pageinfo.next_page}>&current=<{$current_table}>">下一页</a>
            <{else}>
            下一页
           <{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            最后一页
            <{else}>
            <a href="?act=<{$status}>&page=<{$pageinfo.page_num}>&current=<{$current_table}>">最后一页</a>
            <{/if}>
            &nbsp;&nbsp;｜&nbsp;&nbsp;当前第<{$pageinfo.current_page}>页&nbsp;&nbsp;</div>
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
