<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:23:22
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/deals/deals.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124797610053fd876ab6ec91-98212680%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fcaf2192c79586575980c1d82256f864fcbabf6' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/deals/deals.tpl',
      1 => 1379050150,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124797610053fd876ab6ec91-98212680',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mess' => 0,
    'tmess' => 0,
    'deals' => 0,
    'var' => 0,
    'pageinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd876ac31844_07103058',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd876ac31844_07103058')) {function content_53fd876ac31844_07103058($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.replace.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['APP_STYLE']->value)."/admin/common/main_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link href="css/dialog.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function openViewDialog(o){
	this.blur();
	$.weeboxs.open('?act=deal_detail&id='+$(o).attr("id"), {contentType:'ajax',showButton:false,overlay:25,title:'�Ź���ϸ�嵥',width:650,height:360,onok:function(ob){
			$.weeboxs.close();
	}});
}

$(function()
{
$(window).resize(function() {//ҳ�洰�ڴ�С�ı��¼�
                if (!$(".dialog").is(":visible")) {
                    return;
                }
                showDialog(); //������ʾ�Ի����Top��Left
            });

            $(".title img").click(function() { //ע��ر�ͼƬ����¼�
                $(".dialog").hide();
                $(".mask").hide();
            })
			$("#frame").load(function(){ 
				$("#load").css("display","none");
				$("#frame").css("display","block");
			}); 
	
})

			function showDialog() {
                var objW = $(window); //��ǰ����
                var objC = $(".dialog"); //�Ի���
                var brsW = objW.width();
                var brsH = objW.height();
                var sclL = objW.scrollLeft();
                var sclT = objW.scrollTop();
                var curW = objC.width();
                var curH = objC.height();
                //����Ի������ʱ����߾�
                var left = sclL + (brsW - curW) / 2;
                //����Ի������ʱ���ϱ߾�
                var top = sclT + (brsH - curH) / 2;
                //���öԻ�����ҳ���е�λ��
                objC.css({ "left": left, "top": top });
            }

            
			
function openDialog(o){
		this.blur();
		$(".mask").show(); //��ʾ����ɫ
        showDialog(); //������ʾ�Ի����Top��Left
        $(".dialog").show(); //��ʾ��ʾ�Ի���
		$(".title span").html($(this).attr("id"));
		$("#load").css("display","block");
		$("#frame").css("display","none");
		$("#frame").attr("src","main.php?act=deal_coupon&id="+$(o).attr("id"));
}
</script>
<body>
<div id="location"><strong>���Ź��б����ҳ��</strong></div>

 <div class="mask"></div>
     <div class="dialog">
          <div class="title">
               <img src="images/close.gif" alt="������Թر�" /><span>�Ź�ȯ</span>
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
<form method="post" action="main.php?act=deals&edit=delAll">
<div id="list">
<?php if (!$_smarty_tpl->tpl_vars['deals']->value){?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">���޷����б�</strong></div></td>
    </tr>
</table>
<?php }else{ ?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="5%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="ȫѡ"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="��ѡ"></div></td>
          <td><div align="center"><input type="button" id="noall" value="ȫ��"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="17%" bgcolor="#EAEAEA"><div align="center"><strong>�Ź�����</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>�Ź�����</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>���ڳ���</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>��������</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>��������</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>��ȯ����</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>ʱ��״̬</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>�������</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>״̬</strong></div></td>
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
    <td width="12%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
  </tr>
  <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['deals']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['city_name'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['buy_count'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['min_bought'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center">
    <?php if ($_smarty_tpl->tpl_vars['var']->value['is_coupon']){?>
    <?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['deal_type'],1,'������ȯ'),0,'������ȯ');?>
&nbsp;<a class="green_l" onClick="openDialog(this)" id="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" style="cursor:pointer">[�鿴]</a>
    <?php }else{ ?>
    ����ȯ
    <?php }?>
    </div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['time_status'],1,'������'),0,'δ��ʼ'),2,'�ѹ���');?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['buy_status'],1,'�ѳ���'),0,'δ����'),2,'���Ų�����');?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['status'],1,'��Ч'),0,'��Ч');?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['sort'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><a id="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" onClick="openViewDialog(this)" style="cursor:pointer">��ϸ</a> | <a href="?act=add_deals&edit=mod&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">�༭</a> | <a href="?act=deals&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['current_page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
&edit=del" onClick="return confirm('ȷ��Ҫɾ��<?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
��')">ɾ��</a></div></td>
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
              <td><input type="button" name="add" class="admin_button" value="����" onClick="window.location.href='main.php?act=add_deals&edit=add'"/></td>
              <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']){?><td><input type="submit" name="dels" class="admin_button" value="ɾ��" onClick="return confirm('��ȷ��Ҫɾ��ѡ�е��Ź���Ŀ��?')" /></td><?php }?>
            </tr>
          </table></td>
          <td width="81%">
          <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']){?>
          <div align="right">��<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['row_total'];?>
����¼&nbsp;&nbsp;|&nbsp;&nbsp;
          <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==1){?>
          ��һҳ
          <?php }else{ ?>
          <a href="?act=deals&page=1">��һҳ</a>
          <?php }?>
&nbsp;&nbsp;��&nbsp;&nbsp;
		  <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['prev_page']){?>
		  <a href="?act=deals&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['prev_page'];?>
">��һҳ</a>
          <?php }else{ ?>��һҳ<?php }?>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['next_page']){?>
            <a href="?act=deals&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['next_page'];?>
">��һҳ</a>
            <?php }else{ ?>��һҳ<?php }?>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==$_smarty_tpl->tpl_vars['pageinfo']->value['page_num']){?>
            ���һҳ
            <?php }else{ ?>
            <a href="?act=deals&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['page_num'];?>
">���һҳ</a>
            <?php }?>
            &nbsp;&nbsp;��&nbsp;&nbsp;��ǰ��<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['current_page'];?>
ҳ&nbsp;&nbsp;</div>
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