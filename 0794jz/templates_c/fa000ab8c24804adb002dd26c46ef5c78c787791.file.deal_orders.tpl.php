<?php /* Smarty version Smarty-3.1.11, created on 2014-08-27 15:23:13
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/orders/deal_orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165260849553fd8761dcad34-94826845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa000ab8c24804adb002dd26c46ef5c78c787791' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/orders/deal_orders.tpl',
      1 => 1386089150,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165260849553fd8761dcad34-94826845',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'status' => 0,
    'title' => 0,
    'mess' => 0,
    'tmess' => 0,
    'deal_orders' => 0,
    'var' => 0,
    'pageinfo' => 0,
    'deal_orders_log' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_53fd8761f1d3e3_01554783',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fd8761f1d3e3_01554783')) {function content_53fd8761f1d3e3_01554783($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.replace.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['APP_STYLE']->value)."/admin/common/main_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
  $(function () { 
	 $("#dels").click(function () {
                 $("form:eq(0)").attr("action", "main.php?act=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&edit=delAll").submit();
      });
     $("#search").click(function () {
                $("form:eq(0)").attr("action", "main.php?act=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&edit=search").submit();
      });
   });
   
</script>
<body>
<form method="post"  enctype="multipart/form-data" action="">
<div id="location"><div style="float:left"><strong>��<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</strong></div>
	<?php if ($_smarty_tpl->tpl_vars['status']->value!="deal_orders_log"){?>
        <div id="search_bar">
        �����ţ�<input type="text" name="search_text"  class="input_box">
        <?php if ($_smarty_tpl->tpl_vars['status']->value=="deal_orders"){?>
            <select name="pay_status">
                    <option value="-1" selected="selected">����֧��</option>
                    <option value="0" >δ֧��</option>
                    <option value="1" >����֧��</option>
                    <option value="2" >ȫ��֧��</option>			
            </select>
            <select name="delivery_status">
                    <option value="-1" selected="selected">��������</option>
                    <option value="0" >δ����</option>
                    <option value="1" >���ݷ���</option>
                    <option value="2" >ȫ������</option>
                    <option value="5" >���跢��</option>			
            </select>
            <select name="extra_status">
                    <option value="-1" selected="selected">���ж���</option>
                    <option value="0" >����</option>
                    <option value="1" >�����˿�</option>
                    <option value="2" >����ʧ���˿�</option>
            </select>
            <select name="order_status">
                    <option value="-1" selected="selected">�ᵥ״̬</option>
                    <option value="0" >δ�ᵥ</option>
                    <option value="1" >�����ᵥ</option>
            </select>
          <?php }?>
            <input name="search" type="submit" id="search" value="����"></div>
       <?php }?>
</div>
	<div id="warning" <?php if ($_smarty_tpl->tpl_vars['mess']->value=="error"){?>style="display:block;"<?php }else{ ?>style="display:none;"<?php }?> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['tmess']->value;?>
</font></div>
</div>

<div id="list">
<div id="deal_menu">
    	<ul>
				<li <?php if ($_smarty_tpl->tpl_vars['status']->value=="deal_orders"){?>class="deal_current"<?php }else{ ?>class="deal_menu"<?php }?>><a href="?act=deal_orders">�Ź�����</a></li>
                <li <?php if ($_smarty_tpl->tpl_vars['status']->value=="recharge_orders"){?>class="deal_current"<?php }else{ ?>class="deal_menu"<?php }?>><a href="?act=recharge_orders">��ֵ����</a></li>
                <li <?php if ($_smarty_tpl->tpl_vars['status']->value=="deal_orders_log"){?>class="deal_current"<?php }else{ ?>class="deal_menu"<?php }?>><a href="?act=deal_orders_log">������־</a></li>
        </ul>
    </div>
 <div class="clear"></div>
<?php if ($_smarty_tpl->tpl_vars['status']->value!="deal_orders_log"){?>
<div id="content" class="show"> 
<?php if (!$_smarty_tpl->tpl_vars['deal_orders']->value){?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">�����б�</strong></div></td>
    </tr>
</table>
<?php }else{ ?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="8%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="ȫѡ"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="��ѡ"></div></td>
          <td><div align="center"><input type="button" id="noall" value="ȫ��"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="13%" bgcolor="#EAEAEA"><div align="center"><strong>������</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>��Ա����</strong></div></td>
    <?php if ($_smarty_tpl->tpl_vars['status']->value=="deal_orders"){?>
     <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>Ӧ���ܶ�</strong></div></td>
    <td width="7%" bgcolor="#EAEAEA"><div align="center"><strong>�Ѹ����</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>�µ�ʱ��</strong></div></td>
     <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>֧��״̬</strong></div></td>
     <td width="7%" bgcolor="#EAEAEA"><div align="center"><strong>����״̬</strong></div></td>
     <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>��������״̬</strong></div></td>
      <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>�ۺ����</strong></div></td>
      <?php }else{ ?>
       <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>���ս��</strong></div></td>
   	   <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>Ӧ���ܶ�</strong></div></td>
       <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>֧����ʽ</strong></div></td>
       <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>֧��״̬</strong></div></td>
      <?php }?>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
  </tr>
  <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['deal_orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" <?php if ($_smarty_tpl->tpl_vars['var']->value['order_status']!=1&&$_smarty_tpl->tpl_vars['status']->value=="deal_orders"){?>disabled<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['order_sn'];?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['user_name'];?>
</div></td>
     <?php if ($_smarty_tpl->tpl_vars['status']->value=="deal_orders"){?>
    <td bgcolor="f5f5f5"><div align="center">&yen;<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['var']->value['total_price']);?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center">&yen;<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['var']->value['pay_amount']);?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['var']->value['create_time'],"%Y-%m-%d %H:%M:%S");?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['pay_status'],1,'����֧��'),0,'δ֧��'),2,'ȫ��֧��');?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['delivery_status'],0,'δ����'),1,'���ַ���'),2,'ȫ������'),5,'���跢��');?>
</div></td>
    <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['extra_status'],0,'����'),1,'�����˿�'),2,'����ʧ���˿�');?>
</div></td>
     <td bgcolor="f5f5f5"><div align="center">
     	<?php if ($_smarty_tpl->tpl_vars['var']->value['order_status']){?>
        	<?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['after_sale'],0,'�����ᵥ'),1,'���˿�'),2,'���˻�'),3,'���˿�,���˻�');?>

        <?php }else{ ?>
     		δ�ᵥ
        <?php }?>
     </div>
     </td>
      <td bgcolor="f5f5f5"><div align="center"><?php if ($_smarty_tpl->tpl_vars['var']->value['order_status']==0){?><a href="?act=view_order&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">������</a><?php }elseif($_smarty_tpl->tpl_vars['var']->value['order_status']==1){?><a href="?act=view_order&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">�鿴</a> | <a href="?act=deal_orders&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['current_page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
&edit=del" onClick="return confirm('ȷ��Ҫɾ��<?php echo $_smarty_tpl->tpl_vars['var']->value['order_sn'];?>
��')">ɾ��</a><?php }?></div></td>
      <?php }else{ ?>
      <td bgcolor="f5f5f5"><div align="center">&yen;<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['var']->value['deal_total_price']);?>
</div></td>
       <td bgcolor="f5f5f5"><div align="center">&yen;<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['var']->value['total_price']);?>
</div></td>
        <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['payment_id'],1,'���֧��'),2,'֧����֧��'),3,'�Ƹ�ͨ'),4,'����ȯ֧��'),5,'��������');?>
</div></td>
         <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['var']->value['pay_status'],1,'����֧��'),0,'δ֧��'),2,'ȫ��֧��');?>
</div></td>
         <td bgcolor="f5f5f5"><div align="center"><?php if ($_smarty_tpl->tpl_vars['var']->value['pay_status']!=2){?><a href="?act=recharge_orders&edit=pay_incharge&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
">����Ա�տ�</a>&nbsp;&nbsp;|&nbsp;&nbsp;<?php }?><a href="?act=recharge_orders&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['current_page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
&edit=del" onClick="return confirm('ȷ��Ҫɾ������<?php echo $_smarty_tpl->tpl_vars['var']->value['order_sn'];?>
��')">ɾ��</a></div></td>
      <?php }?>
   
  </tr>
  <?php } ?>
  </table>
<?php }?>
</div>
<?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']){?>
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
              <td><input type="submit" name="dels" id="dels" class="admin_button" value="ɾ��" onClick="return confirm('��ȷ��Ҫɾ��ѡ�еķ�����?')" /></td>
            </tr>
          </table></td>
          <td width="81%">
          <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']){?>
          <div align="right">��<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['row_total'];?>
����¼&nbsp;&nbsp;|&nbsp;&nbsp;
          <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==1){?>
          ��һҳ
          <?php }else{ ?>
          <a href="?act=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&page=1">��һҳ</a>
          <?php }?>
&nbsp;&nbsp;��&nbsp;&nbsp;
		  <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['prev_page']){?>
		  <a href="?act=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['prev_page'];?>
">��һҳ</a>
          <?php }else{ ?>��һҳ<?php }?>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['next_page']){?>
            <a href="?act=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['next_page'];?>
">��һҳ</a>
            <?php }else{ ?>��һҳ<?php }?>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==$_smarty_tpl->tpl_vars['pageinfo']->value['page_num']){?>
            ���һҳ
            <?php }else{ ?>
            <a href="?act=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['page_num'];?>
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
	<?php }?>

<?php }else{ ?>
    <div id="list">
    <?php if (!$_smarty_tpl->tpl_vars['deal_orders_log']->value){?>
    <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
      <tr>
        <td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">������־�б�</strong></div></td>
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
        <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>��־��Ϣ</strong></div></td>
        <td width="13%" bgcolor="#EAEAEA"><div align="center"><strong>����ʱ��</strong></div></td>
        <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>����IP</strong></div></td>
        <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
      </tr>
      <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['deal_orders_log']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
        <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['log_info'];?>
</div></td>
        <td bgcolor="f5f5f5"><div align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['var']->value['log_time'],"%Y-%m-%d %H:%M:%S");?>
</div></td>
        <td bgcolor="f5f5f5"><div align="center"><?php echo $_smarty_tpl->tpl_vars['var']->value['log_ip'];?>
</div></td>
        <td bgcolor="f5f5f5"><div align="center"><a href="?act=deal_orders_log&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['current_page'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
&edit=del" onClick="return confirm('ȷ��Ҫɾ����')">����ɾ��</a></div></td>
      </tr>
      <?php } ?>
      </table>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']){?>
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
                  <td><input type="submit" name="dels" class="admin_button" value="����ɾ��" onClick="return confirm('��ȷ��Ҫɾ��ѡ�еķ�����?')" /></td>
                </tr>
              </table></td>
              <td width="81%">
              <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['row_total']){?>
              <div align="right">��<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['row_total'];?>
����¼&nbsp;&nbsp;|&nbsp;&nbsp;
              <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==1){?>
              ��һҳ
              <?php }else{ ?>
              <a href="?act=deal_orders_log&page=1">��һҳ</a>
              <?php }?>
    &nbsp;&nbsp;��&nbsp;&nbsp;
              <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['prev_page']){?>
              <a href="?act=deal_orders_log&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['prev_page'];?>
">��һҳ</a>
              <?php }else{ ?>��һҳ<?php }?>
            &nbsp;&nbsp;|&nbsp;&nbsp;
                <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['next_page']){?>
                <a href="?act=deal_orders_log&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['next_page'];?>
">��һҳ</a>
                <?php }else{ ?>��һҳ<?php }?>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['current_page']==$_smarty_tpl->tpl_vars['pageinfo']->value['page_num']){?>
                ���һҳ
                <?php }else{ ?>
                <a href="?act=deal_orders_log&page=<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['page_num'];?>
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
        <?php }?>
        </div>
<?php }?> 
</div>
</form>
</body>
</html>
<?php }} ?>