<?php /* Smarty version Smarty-3.1.11, created on 2014-09-10 09:22:29
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/deals/supplier.tpl" */ ?>
<?php /*%%SmartyHeaderCode:916373243540fa7d5bf7522-74106577%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2acc4addb61bc421908e41dd7d0281efceea8a7' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/deals/supplier.tpl',
      1 => 1346087216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '916373243540fa7d5bf7522-74106577',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mess' => 0,
    'tmess' => 0,
    'supplier' => 0,
    'var' => 0,
    'pageinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_540fa7d5cbe2a4_43438043',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540fa7d5cbe2a4_43438043')) {function content_540fa7d5cbe2a4_43438043($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['APP_STYLE']->value)."/admin/common/main_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
     
	<div id="warning" <?php if ($_smarty_tpl->tpl_vars['mess']->value=="error"){?>style="display:block;"<?php }else{ ?>style="display:none;"<?php }?> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['tmess']->value;?>
</font></div>
</div>
<form method="post"  enctype="multipart/form-data" action="main.php?act=supplier&edit=del">
<div id="list">
<?php if (!$_smarty_tpl->tpl_vars['supplier']->value){?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无分类列表</strong></div></td>
    </tr>
</table>
<?php }else{ ?>
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
  <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['supplier']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['cate_name'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['sort'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center">
      <table width="170px" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="50%"><a href="?act=add_supplier&edit=mod&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">编辑</a> | <a href="?act=supplier&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['current_page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
&edit=del" onClick="return confirm('确定要彻底删除<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
吗？')">彻底删除</a></td>
          <td width="10%"><div id="pop"><img src="images/key.gif" alt="供应商帐号管理" id="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" style="cursor:pointer" name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
"/></div></td>
          <td width="10%"><div id="pop1"><img src="images/list.gif" alt="供应商分店管理" id="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" style="cursor:pointer" name="<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
"/></div></td>
        </tr>
      </table>
     
     </td>
  </tr>
  <?php } ?>
  </table>
<?php }?>
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
            <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']){?>  <td><input type="submit" name="dels" class="admin_button" value="删除" onClick="return confirm('你确定要删除选中的供应商吗?')" /></td><?php }?>
            </tr>
          </table></td>
          <td width="81%">
          <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']){?>
          <div align="right">共<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['row_total'];?>
条记录&nbsp;&nbsp;|&nbsp;&nbsp;
          <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==1){?>
          第一页
          <?php }else{ ?>
          <a href="?act=supplier&page=1">第一页</a>
          <?php }?>
&nbsp;&nbsp;｜&nbsp;&nbsp;
		  <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['prev_page']){?>
		  <a href="?act=supplier&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['prev_page'];?>
">上一页</a>
          <?php }else{ ?>上一页<?php }?>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['next_page']){?>
            <a href="?act=supplier&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['next_page'];?>
">下一页</a>
            <?php }else{ ?>下一页<?php }?>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==$_smarty_tpl->tpl_vars['pageinfo']->value['page_num']){?>
            最后一页
            <?php }else{ ?>
            <a href="?act=supplier&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['page_num'];?>
">最后一页</a>
            <?php }?>
            &nbsp;&nbsp;｜&nbsp;&nbsp;当前第<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['current_page'];?>
页&nbsp;&nbsp;</div>
            <?php }?>
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
<?php }} ?>