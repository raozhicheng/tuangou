<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<link href="css/dialog.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
			$(function() {
			$("#loading").css("display","none");
            $(".test").click(function() { //注册删除按钮点击事件
                $(".mask").show(); //显示背景色
                showDialog(); //设置提示对话框的Top与Left
                $(".dialog").show(); //显示提示对话框
				$("#load").css("display","block");
			    $("#frame").css("display","none");
				$("#frame").attr("src","main.php?act=send_test&id="+$(this).attr("id"));
				$("#frame").reload();
            })
			$("#frame").load(function(){ 
       			$("#load").css("display","none");
			    $("#frame").css("display","block");
   			}); 
            /*
            *根据当前页面与滚动条位置，设置提示对话框的Top与Left
            */
            function showDialog() {
                var objW = $(window); //当前窗口
                var objC = $(".dialog"); //对话框
                var brsW = objW.width();
                var brsH = objW.height();
                var sclL = objW.scrollLeft();
                var sclT = objW.scrollTop();
                var curW = objC.width();
                var curH = objC.height();
                //计算对话框居中时的左边距
                var left = sclL + (brsW - curW) / 2;
                //计算对话框居中时的上边距
                var top = sclT + (brsH - curH) / 2;
                //设置对话框在页面中的位置
                objC.css({ "left": left, "top": top });
            }

            $(window).resize(function() {//页面窗口大小改变事件
                if (!$(".dialog").is(":visible")) {
                    return;
                }
                showDialog(); //设置提示对话框的Top与Left
            });

            $(".title img").click(function() { //注册关闭图片点击事件
                $(".dialog").hide();
                $(".mask").hide();
            })
        })
    </script>
<body>
<div id="location"><strong>·邮件服务器列表</strong></div>
<div class="mask"></div>
     <div class="dialog">
          <div class="title">
               <img src="images/close.gif" alt="点击可以关闭" /><span>测试发送邮件</span>
          </div>
          <div class="content">
          	  <div id="load"><p><img src="images/loading_circle.gif"></p></div>
              <iframe frameborder="0" height="300px" width="620px" scrolling="no" id="frame"></iframe>
          </div>
     </div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post" action="main.php?act=mail_server&edit=delAll">
<div id="list">
<{if !$mail_server}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无邮件服务器列表</strong></div></td>
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
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>服务器地址</strong></div></td>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>帐号</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>默认</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>已用次数</strong></div></td>
     <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>可用次数</strong></div></td>
     <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>是否自动清零</strong></div></td>
     <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>状态</strong></div></td>
    <td width="25%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <{foreach $mail_server as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.smtp_server}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.smtp_name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.is_default|replace:1:'是'|replace:0:'否'}><{if !$var.is_default}><a href="main.php?act=set_mailServer_default&id=<{$var.id}>" style="color:red">[设置]</a><{/if}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.total_use}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.use_limit}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.is_reset|replace:1:'是'|replace:0:'否'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.status|replace:1:'有效'|replace:0:'无效'}></div></td>
   
    <td bgcolor="f5f5f5"><div align="center"><a href="?act=add_mailServer&edit=mod&id=<{$var.id}>">编辑</a><{if !$var.is_default}> | <a href="?act=mail_server&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('确定要删除<{$var.name}>吗？')">删除</a><{/if}> | <a href="#" id="<{$var.id}>" class="test">测试</a></td>
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
              <td><input type="button" name="add" class="admin_button" value="新增" onClick="window.location.href='main.php?act=add_mailServer&edit=add'"/></td>
              <{if $pageinfo.row_total}><td><input type="submit" name="dels" class="admin_button" value="删除" onClick="return confirm('你确定要删除选中的邮件服务器吗?')" /></td><{/if}>
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
</body>
</html>
