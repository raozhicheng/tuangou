<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<link href="css/dialog.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
        $(function() {
			
            $("#pop img").click(function() { //注册删除按钮点击事件
                $(".mask").show(); //显示背景色
                showDialog(); //设置提示对话框的Top与Left
                $(".dialog").show(); //显示提示对话框
				$(".title span").html($(this).attr("alt")+"["+$(this).attr("name")+"]");
				
				$("#load").css("display","block");
			    $("#frame").css("display","none");
				$("#frame").attr("src","main.php?act=supplier_account&id="+$(this).attr("id"));
				
				/*$("#loadimg").ajaxStart(function(){
                      $("#loading").css("display","block");
                });
				
				$.ajax({
					type:"GET",
					url:"main.php",
					datatype:"html",
					data:"act=supplier_account&id="+$(this).attr("id"),
					beforeSend:function(){
						 $("#frame").css("display","none");
					     $("#load").css("display","block");
						
					},
					success: function(msg){ 
						$("#load").css("display","none");
						$("#frame").css("display","block");
						$("#frame").html(msg);
					}
				});*/
				
            })
			$("#frame").load(function(){ 
       			$("#load").css("display","none");
			    $("#frame").css("display","block");
   			}); 

			$("#pop1 img").click(function() { //注册删除按钮点击事件
                $(".mask").show(); //显示背景色
                showDialog(); //设置提示对话框的Top与Left
                $(".dialog").show(); //显示提示对话框
				$(".title span").html($(this).attr("alt")+"["+$(this).attr("name")+"]");
				$("#load").css("display","block");
			    $("#frame").css("display","none");
				
				$("#frame").attr("src","main.php?act=supplier_location&id="+$(this).attr("id"));
            })
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
<div id="location"><strong>·供应商列表</strong></div>
<div class="mask"></div>
     <div class="dialog">
          <div class="title">
               <img src="images/close.gif" alt="点击可以关闭" /><span>供应商操作窗口</span>
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
<form method="post"  enctype="multipart/form-data" action="main.php?act=supplier&edit=del">
<div id="list">
<{if !$supplier}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无分类列表</strong></div></td>
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
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>编号</strong></div></td>
    <td width="13%" bgcolor="#EAEAEA"><div align="center"><strong>供应商名称</strong></div></td>
    <td width="18%" bgcolor="#EAEAEA"><div align="center"><strong>分类</strong></div></td>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>排序</strong></div></td>
    <td width="29%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <{foreach $supplier as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.cate_name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.sort}></div></td>
    <td bgcolor="f5f5f5"><div align="center">
      <table width="170px" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="50%"><a href="?act=add_supplier&edit=mod&id=<{$var.id}>">编辑</a> | <a href="?act=supplier&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('确定要彻底删除<{$var.name}>吗？')">彻底删除</a></td>
          <td width="10%"><div id="pop"><img src="images/key.gif" alt="供应商帐号管理" id="<{$var.id}>" style="cursor:pointer" name="<{$var.name}>"/></div></td>
          <td width="10%"><div id="pop1"><img src="images/list.gif" alt="供应商分店管理" id="<{$var.id}>" style="cursor:pointer" name="<{$var.name}>"/></div></td>
        </tr>
      </table>
     
     </td>
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
              <td><input type="button" name="add" class="admin_button" value="新增" onClick="window.location.href='main.php?act=add_supplier&edit=add'"/></td>
            <{if $pageinfo.row_total}>  <td><input type="submit" name="dels" class="admin_button" value="删除" onClick="return confirm('你确定要删除选中的供应商吗?')" /></td><{/if}>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">共<{$pageinfo.row_total}>条记录&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          第一页
          <{else}>
          <a href="?act=supplier&page=1">第一页</a>
          <{/if}>
&nbsp;&nbsp;｜&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=supplier&page=<{$pageinfo.prev_page}>">上一页</a>
          <{else}>上一页<{/if}>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=supplier&page=<{$pageinfo.next_page}>">下一页</a>
            <{else}>下一页<{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            最后一页
            <{else}>
            <a href="?act=supplier&page=<{$pageinfo.page_num}>">最后一页</a>
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
