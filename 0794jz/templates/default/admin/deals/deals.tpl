<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<link href="css/dialog.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function openViewDialog(o){
	this.blur();
	$.weeboxs.open('?act=deal_detail&id='+$(o).attr("id"), {contentType:'ajax',showButton:false,overlay:25,title:'团购详细清单',width:650,height:360,onok:function(ob){
			$.weeboxs.close();
	}});
}

$(function()
{
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
			$("#frame").load(function(){ 
				$("#load").css("display","none");
				$("#frame").css("display","block");
			}); 
	
})

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

            
			
function openDialog(o){
		this.blur();
		$(".mask").show(); //显示背景色
        showDialog(); //设置提示对话框的Top与Left
        $(".dialog").show(); //显示提示对话框
		$(".title span").html($(this).attr("id"));
		$("#load").css("display","block");
		$("#frame").css("display","none");
		$("#frame").attr("src","main.php?act=deal_coupon&id="+$(o).attr("id"));
}
</script>
<body>
<div id="location"><strong>·团购列表管理页面</strong></div>

 <div class="mask"></div>
     <div class="dialog">
          <div class="title">
               <img src="images/close.gif" alt="点击可以关闭" /><span>团购券</span>
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
<form method="post" action="main.php?act=deals&edit=delAll">
<div id="list">
<{if !$deals}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无分类列表</strong></div></td>
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
    <td width="17%" bgcolor="#EAEAEA"><div align="center"><strong>团购名称</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>团购分类</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>所在城市</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>购买数量</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>成团数量</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>发券类型</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>时间状态</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>成团情况</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>状态</strong></div></td>
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>排序</strong></div></td>
    <td width="12%" bgcolor="#EAEAEA"><div align="center"><strong>操作</strong></div></td>
  </tr>
  <{foreach $deals as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.cate_name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.city_name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.buy_count}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.min_bought}></div></td>
    <td bgcolor="f5f5f5"><div align="center">
    <{if $var.is_coupon}>
    <{$var.deal_type|replace:1:'按单发券'|replace:0:'按件发券'}>&nbsp;<a class="green_l" onClick="openDialog(this)" id="<{$var.id}>" style="cursor:pointer">[查看]</a>
    <{else}>
    不发券
    <{/if}>
    </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.time_status|replace:1:'进行中'|replace:0:'未开始'|replace:2:'已过期'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.buy_status|replace:1:'已成团'|replace:0:'未成团'|replace:2:'成团并卖光'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.status|replace:1:'有效'|replace:0:'无效'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.sort}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a id="<{$var.id}>" onClick="openViewDialog(this)" style="cursor:pointer">详细</a> | <a href="?act=add_deals&edit=mod&id=<{$var.id}>">编辑</a> | <a href="?act=deals&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('确定要删除<{$var.name}>吗？')">删除</a></div></td>
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
              <td><input type="button" name="add" class="admin_button" value="新增" onClick="window.location.href='main.php?act=add_deals&edit=add'"/></td>
              <{if $pageinfo.row_total}><td><input type="submit" name="dels" class="admin_button" value="删除" onClick="return confirm('你确定要删除选中的团购项目吗?')" /></td><{/if}>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">共<{$pageinfo.row_total}>条记录&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          第一页
          <{else}>
          <a href="?act=deals&page=1">第一页</a>
          <{/if}>
&nbsp;&nbsp;｜&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=deals&page=<{$pageinfo.prev_page}>">上一页</a>
          <{else}>上一页<{/if}>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=deals&page=<{$pageinfo.next_page}>">下一页</a>
            <{else}>下一页<{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            最后一页
            <{else}>
            <a href="?act=deals&page=<{$pageinfo.page_num}>">最后一页</a>
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
