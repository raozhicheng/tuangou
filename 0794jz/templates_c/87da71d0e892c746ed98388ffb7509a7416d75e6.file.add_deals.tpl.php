<?php /* Smarty version Smarty-3.1.11, created on 2014-09-10 09:22:49
         compiled from "/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/deals/add_deals.tpl" */ ?>
<?php /*%%SmartyHeaderCode:437516726540fa7e923e104-89123037%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87da71d0e892c746ed98388ffb7509a7416d75e6' => 
    array (
      0 => '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/templates/default/admin/deals/add_deals.tpl',
      1 => 1394368274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '437516726540fa7e923e104-89123037',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'submitButton' => 0,
    'mess' => 0,
    'tmess' => 0,
    'status' => 0,
    'getDeal' => 0,
    'act' => 0,
    'category' => 0,
    'var' => 0,
    'cities' => 0,
    'supplier' => 0,
    'statused' => 0,
    'noStatused' => 0,
    'description' => 0,
    'thumb' => 0,
    'GALLERY_PATH' => 0,
    'bmpPath' => 0,
    'val' => 0,
    'img_num' => 0,
    'weight' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_540fa7e93f74a2_34803236',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540fa7e93f74a2_34803236')) {function content_540fa7e93f74a2_34803236($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/applications/xampp/xamppfiles/htdocs/xampp/0794jz/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['APP_STYLE']->value)."/admin/common/main_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
$(function()
{
//TAB选项
$("#deal_menu>ul>li>a").click(function(){
	$("#deal_menu ul li").removeClass("deal_current");
	$("#deal_menu ul li").addClass("deal_menu");
	$(this).parent().addClass("deal_current");
	$(this).blur();
	$("#content div").removeClass("show");
	$("#content div").addClass("hide");
	var content_show = $(this).attr("title");
	$("#"+content_show).removeClass("hide");
	$("#"+content_show).addClass("show");
})
//图片预览及放大
 xOffset = 10;
 yOffset = 30;
	$("#source_img img").hover(function(e){
                $("<img id='imgshow' src='" + this.src + "' width='150' height='150'/>").appendTo("body");
                $("#imgshow")
                    .css("top", (e.pageY - xOffset) + "px")
                 .css("left", (e.pageX + yOffset) + "px")
           .fadeIn("fast");
            }, function() {
                $("#imgshow").remove();
    });
	$("#source_img img").mousemove(function(e) {
                $("#imgshow")
                   .css("top", (e.pageY - xOffset) + "px")
             .css("left", (e.pageX + yOffset) + "px")
            });
//显示或隐藏表格
$(".coupon").hide();
$(".weight").hide();
if($("#is_coupon").get(0).selectedIndex==1){
		$(".coupon").show();
	} else {
		$(".coupon").hide();
	}
$("#is_coupon").change(function(){
	 
	if($("#is_coupon").get(0).selectedIndex==1){
		$(".coupon").show();
	} else {
		$(".coupon").hide();
	}
});


if($("#is_delivery").get(0).selectedIndex==1){
		$(".weight").show();
	} else {
		$(".weight").hide();
	}
$("#is_delivery").change(function(){
	 
	if($("#is_delivery").get(0).selectedIndex==1){
		$(".weight").show();
	} else {
		$(".weight").hide();
	}
});
//判断生成缩略图之前是否有图
if($("#act").val()=="add"){
	$("#hasThumb input").click(function(){
		var id=$(this).val();
		$(this).blur();
		if($("#uploadPic"+id).val()==""){
			alert("对不起，请选择图片！");
			$("#hasThumb"+id).attr("checked",false);
		}
		
	});
} else if($("#act").val()=="mod"){
	$("#hasThumb input").click(function(){
		var id=$(this).val();
		$(this).blur();
		if(($("#pic"+id).val()=="" && $("#uploadPic"+id).val()=="") || ($("#pic"+id).val()=="images/no_image.gif" && $("#uploadPic"+id).val()=="")){
			alert("对不起，请选择图片！");
			$("#hasThumb"+id).attr("checked",false);
		}
		
	});
}


})
</script>
<body>
<div id="location"><strong>·<?php echo $_smarty_tpl->tpl_vars['submitButton']->value;?>
团购信息</strong></div>
	<div id="warning" <?php if ($_smarty_tpl->tpl_vars['mess']->value=="error"){?>style="display:block;"<?php }else{ ?>style="display:none;"<?php }?> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['tmess']->value;?>
</font></div>
</div>

 <form name="add_deal" method="post"  enctype="multipart/form-data" action="main.php?act=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['getDeal']->value['id'];?>
&edit=<?php echo $_smarty_tpl->tpl_vars['act']->value;?>
">
 <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['getDeal']->value['id'];?>
" >
 
<div id="list">
	<div id="deal_menu">
    	<ul>
        	<li class="deal_current"><a href="#" title="content_1">团购信息</a></li>
            <li class="deal_menu"><a href="#" title="content_2">价格数量</a></li>
            <li class="deal_menu"><a href="#" title="content_3">团购图片</a></li>
            <li class="deal_menu"><a href="#" title="content_4">类型属性</a></li>
            <li class="deal_menu"><a href="#" title="content_5">SEO设置</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    
    <div id="content">
    
    	<div class="show" id="content_1">
        	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="15%" bgcolor="#EAEAEA" class="table_left_title">团购名称：</td>
    <td width="85%" bgcolor="f5f5f5"><input type="text" name="name" id="name" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['getDeal']->value['name'];?>
">&nbsp;<span class="attention_text">*</span></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">简短名称：</td>
    <td bgcolor="f5f5f5"> <input type="text" name="sub_name" id="sub_name" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['getDeal']->value['sub_name'];?>
">&nbsp;<span class="attention_text">*[用于团购券，邮件，短信的显示，字数不得超过20个字]</span></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">团购标识：</td>
    <td bgcolor="f5f5f5"><input type="text" name="code" id="code" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['getDeal']->value['code'];?>
">&nbsp;<span class="attention_text">*[用于标识券序列号的前缀]</span></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">团购简介：</td>
    <td bgcolor="f5f5f5"><textarea class="textarea" name="brief" cols="50"><?php echo $_smarty_tpl->tpl_vars['getDeal']->value['brief'];?>
</textarea></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">团购分类：</td>
    <td bgcolor="f5f5f5">  <select name="cate_id" id="cate_id" style="width:130px;">
      <option value="0">未选择分类</option>

      <?php if ($_smarty_tpl->tpl_vars['act']->value=="add"){?>
      
      <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
</option>
      <?php } ?>
      
      <?php }elseif($_smarty_tpl->tpl_vars['act']->value=="mod"){?>
       <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
       <option value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['getDeal']->value['cate_id']==$_smarty_tpl->tpl_vars['var']->value['id']){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
</option>
       <?php } ?>
       
      <?php }?>
      </select>&nbsp;<span class="attention_text">*</span>
            </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">团购城市：</td>
    <td bgcolor="f5f5f5"><select name="city_id">
			<option value="0">未选取城市</option>
              <?php if ($_smarty_tpl->tpl_vars['act']->value=="add"){?>
      
      <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
</option>
      <?php } ?>
      
      <?php }elseif($_smarty_tpl->tpl_vars['act']->value=="mod"){?>
       <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
       <option value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['getDeal']->value['city_id']==$_smarty_tpl->tpl_vars['var']->value['id']){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
</option>
       <?php } ?>
       
      <?php }?>
            </select>&nbsp;<span class="attention_text">*</span>
            </td>
  </tr>
    <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">团购供应商：</td>
    <td bgcolor="f5f5f5"><select name="supplier_id">
			<option value="0">未选择供应商</option>
               <?php if ($_smarty_tpl->tpl_vars['act']->value=="add"){?>
      
      <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['supplier']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
</option>
      <?php } ?>
      
      <?php }elseif($_smarty_tpl->tpl_vars['act']->value=="mod"){?>
       <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['supplier']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['getDeal']->value['supplier_id']==$_smarty_tpl->tpl_vars['var']->value['id']){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
</option>
       <?php } ?>
       
      <?php }?>
            </select>&nbsp;<span class="attention_text">*</span>
            </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">排序：</td>
    <td bgcolor="f5f5f5"><input type="text" name="sort" id="sort" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['getDeal']->value['sort'];?>
">&nbsp;<span class="attention_text">*</span></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">状态：</td>
    <td bgcolor="f5f5f5"><lable>有效<input type="radio" name="status" value="1" <?php echo $_smarty_tpl->tpl_vars['statused']->value;?>
 /></lable><lable>无效<input type="radio" name="status" value="0" <?php echo $_smarty_tpl->tpl_vars['noStatused']->value;?>
 /></lable></td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">团购描述：</td>
    <td bgcolor="f5f5f5"><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</td>
  </tr>
</table>
      </div>
        
        <div class="hide" id="content_2">
        	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
 			 <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">团购开始时间：</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="begin_time" id="begin_time"  readonly="true" class="input_box" value="<?php if ($_smarty_tpl->tpl_vars['getDeal']->value['begin_time']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['getDeal']->value['begin_time'],"%Y-%m-%d %H:%M:%S");?>
<?php }else{ ?><?php }?>" onClick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')">&nbsp;<span class="attention_text">[不设置表示团购开始无限制]</span>
  			</tr>
            <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">团购结束时间：</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="end_time" id="end_time" class="input_box"  readonly="true" value="<?php if ($_smarty_tpl->tpl_vars['getDeal']->value['end_time']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['getDeal']->value['end_time'],"%Y-%m-%d %H:%M:%S");?>
<?php }else{ ?><?php }?>" onClick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')">&nbsp;<span class="attention_text">[不设置表示团购结束无限制]</span>
  			</tr>
             <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">购买件数：</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="buy_count" id="buy_count" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['getDeal']->value['buy_count'];?>
" >&nbsp;<span class="attention_text">[购买件数，可直接修改用于作弊]</span>
  			</tr>
             <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">成团数量：</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="min_bought" id="min_bought" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['getDeal']->value['min_bought'];?>
" >&nbsp;<span class="attention_text">[达到该数量后团购成功，团购券在成功后发送]</span>
  			</tr>
             <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">团购总数：</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="max_bought" id="max_bought" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['getDeal']->value['max_bought'];?>
" >&nbsp;<span class="attention_text">[库存数 单位：件]</span>
  			</tr>
            <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">会员最低购买量：</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="user_min_bought" id="user_min_bought" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['getDeal']->value['user_min_bought'];?>
" >&nbsp;<span class="attention_text">[单位：件]</span>
  			</tr>
             <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">会员最大购买量：</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="user_max_bought" id="user_max_bought" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['getDeal']->value['user_max_bought'];?>
" >&nbsp;<span class="attention_text">[单位：件]</span>
  			</tr>
            <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">原价：</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="origin_price" id="origin_price" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['getDeal']->value['origin_price'];?>
" >
  			</tr>
            <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">团购价：</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="current_price" id="current_price" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['getDeal']->value['current_price'];?>
" >
  			</tr>
            <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">团购折扣：</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="discount" id="discount" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['getDeal']->value['discount'];?>
" >&nbsp;<span class="attention_text">[为空时将自动计算折扣]</span>
  			</tr>
            <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">购买返现金：</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="return_money" id="return_money" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['getDeal']->value['return_money'];?>
" >&nbsp;<span class="attention_text">[用户购买付款成功后，直接返还给购买会员的现金]</span>
  			</tr>
             <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">购买返积分：</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="return_score" id="return_score" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['getDeal']->value['return_score'];?>
" >&nbsp;<span class="attention_text">[用户购买付款成功后，直接返还给购买会员的积分]</span>
  			</tr>
            </table>
        </div>
        
       <div class="hide" id="content_3" >
        	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
            	<?php if ($_smarty_tpl->tpl_vars['act']->value=="mod"){?>
            	<tr>
                <td bgcolor="#f5f5f5" align="center">缩略图：</td>
                	<td bgcolor="#f5f5f5" colspan="2">&nbsp;&nbsp;<span id="source_img">
                    			<?php if ($_smarty_tpl->tpl_vars['thumb']->value){?><img src="<?php echo ($_smarty_tpl->tpl_vars['GALLERY_PATH']->value).($_smarty_tpl->tpl_vars['thumb']->value);?>
" alt="图片预览" width=30 height="30">
                        		<?php }else{ ?><img src="images/no_image.gif" width=30 height="30"  style="border:solid 2px #999">
                                <?php }?>
                                </span>
                    </td>
                </tr>
                <?php }?>
                <?php $_smarty_tpl->tpl_vars['img_num'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['img_num']->step = 1;$_smarty_tpl->tpl_vars['img_num']->total = (int)ceil(($_smarty_tpl->tpl_vars['img_num']->step > 0 ? 4+1 - (0) : 0-(4)+1)/abs($_smarty_tpl->tpl_vars['img_num']->step));
if ($_smarty_tpl->tpl_vars['img_num']->total > 0){
for ($_smarty_tpl->tpl_vars['img_num']->value = 0, $_smarty_tpl->tpl_vars['img_num']->iteration = 1;$_smarty_tpl->tpl_vars['img_num']->iteration <= $_smarty_tpl->tpl_vars['img_num']->total;$_smarty_tpl->tpl_vars['img_num']->value += $_smarty_tpl->tpl_vars['img_num']->step, $_smarty_tpl->tpl_vars['img_num']->iteration++){
$_smarty_tpl->tpl_vars['img_num']->first = $_smarty_tpl->tpl_vars['img_num']->iteration == 1;$_smarty_tpl->tpl_vars['img_num']->last = $_smarty_tpl->tpl_vars['img_num']->iteration == $_smarty_tpl->tpl_vars['img_num']->total;?>
                <tr>
             	<td width="10%" height="20" bgcolor="#f5f5f5" style="text-align:center">
                <span id="source_img">
                <?php if ($_smarty_tpl->tpl_vars['act']->value=="mod"){?>
                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bmpPath']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    	<?php if ($_smarty_tpl->tpl_vars['val']->value['sort']==$_smarty_tpl->tpl_vars['img_num']->value){?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['val']->value['img'];?>
" alt="图片预览" width=30 height="30" id="previewPic" style="border:solid 2px #999">
                    	<?php }?>
                    <?php } ?>
                <?php }else{ ?>
                	<img src="images/no_image.gif" width=30 height="30" style="border:solid 2px #999">
                <?php }?>
                </span></td>
                <td width="20%" bgcolor="#f5f5f5" style="text-align:center"><input type="file" name="uploadPic<?php echo $_smarty_tpl->tpl_vars['img_num']->value;?>
" id="uploadPic<?php echo $_smarty_tpl->tpl_vars['img_num']->value;?>
"  class="upload_input"></td>
                <td  width="80%" bgcolor="#f5f5f5">
                <?php if ($_smarty_tpl->tpl_vars['act']->value=="add"){?>
                    <span id="hasThumb">
                    <input type="radio" name="hasThumb" id="hasThumb<?php echo $_smarty_tpl->tpl_vars['img_num']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['img_num']->value;?>
" > 生成缩略图
                    </span> 
                <?php }elseif($_smarty_tpl->tpl_vars['act']->value=="mod"){?>
                	<span id="hasThumb">
                    <input type="radio" name="hasThumb" id="hasThumb<?php echo $_smarty_tpl->tpl_vars['img_num']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['img_num']->value;?>
" > 生成缩略图
                    <input type="hidden" name="pic<?php echo $_smarty_tpl->tpl_vars['img_num']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['bmpPath']->value[$_smarty_tpl->tpl_vars['img_num']->value]['img'];?>
" id="pic<?php echo $_smarty_tpl->tpl_vars['img_num']->value;?>
" >
                    </span> 
                <?php }?>
</td>
             </tr>
             <?php }} ?>
             </table>
       </div>
        
       <div class="hide" id="content_4">
        	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
             <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">是否生成团购券：</td>
   				  <td width="85%" bgcolor="f5f5f5">
                  <select name="is_coupon" id="is_coupon">
                  <?php if ($_smarty_tpl->tpl_vars['act']->value=="add"){?>
      
                    <option value="0">否</option>
					<option value="1">是</option>
                  
                  <?php }elseif($_smarty_tpl->tpl_vars['act']->value=="mod"){?>
                    <option value="0" <?php if ($_smarty_tpl->tpl_vars['getDeal']->value['is_coupon']==0){?> selected="selected" <?php }?>>否</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['getDeal']->value['is_coupon']==1){?> selected="selected" <?php }?>>是</option>
       			  <?php }?>	
                  </select>
  			</tr>
            
            <tr class="coupon">
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">发券类型：</td>
   				  <td width="85%" bgcolor="f5f5f5">
                  <select name="deal_type" id="deal_type">
                  <?php if ($_smarty_tpl->tpl_vars['act']->value=="add"){?>
      
                    <option value="0">按件发券</option>
					<option value="1">按单发券</option>
                  
                  <?php }elseif($_smarty_tpl->tpl_vars['act']->value=="mod"){?>
                    <option value="0" <?php if ($_smarty_tpl->tpl_vars['getDeal']->value['deal_type']==0){?> selected="selected" <?php }?>>按件发券</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['getDeal']->value['deal_type']==1){?> selected="selected" <?php }?>>按单发券</option>
       			  <?php }?>
                  </select>
  			</tr>
             <tr class="coupon">
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">团购券生效时间：</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="coupon_begin_time" id="coupon_begin_time"  readonly="true" class="input_box" value="<?php if ($_smarty_tpl->tpl_vars['getDeal']->value['coupon_begin_time']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['getDeal']->value['coupon_begin_time'],"%Y-%m-%d %H:%M:%S");?>
<?php }?>" onClick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')">&nbsp;<span class="attention_text">[不设置开始时间表示团购券实时生效]</span>
  			</tr>
             <tr class="coupon">
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">团购券到期时间：</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="coupon_end_time" id="coupon_end_time"  readonly="true" class="input_box" value="<?php if ($_smarty_tpl->tpl_vars['getDeal']->value['coupon_end_time']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['getDeal']->value['coupon_end_time'],"%Y-%m-%d %H:%M:%S");?>
<?php }?>" onClick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')">&nbsp;<span class="attention_text">[不设置结束时间表示团购券永不过期]</span>
  			</tr>
            
             <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">是否配送：</td>
   				  <td width="85%" bgcolor="f5f5f5">
                  <select name="is_delivery" id="is_delivery">
				
                
                 <?php if ($_smarty_tpl->tpl_vars['act']->value=="add"){?>
      
                    <option value="0">否</option>
					<option value="1">是</option>
                  
                  <?php }elseif($_smarty_tpl->tpl_vars['act']->value=="mod"){?>
                    <option value="0" <?php if ($_smarty_tpl->tpl_vars['getDeal']->value['is_delivery']==0){?> selected="selected" <?php }?>>否</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['getDeal']->value['is_delivery']==1){?> selected="selected" <?php }?>>是</option>
       			  <?php }?>	
			</select>&nbsp;<span class="attention_text">[需要配送表示购买时需要填写配送地址，需要计算运费]</span>
  			</tr>
            <tr class="weight">
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">配送重量：</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="weight" id="weight" class="input_box" value="<?php echo $_smarty_tpl->tpl_vars['getDeal']->value['weight'];?>
" >&nbsp;
            <select name="weight_id" id="weight_id" style="width:130px;">
      <option value="0">未选择分类</option>

      <?php if ($_smarty_tpl->tpl_vars['act']->value=="add"){?>
      
      <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['weight']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
</option>
      <?php } ?>
      
      <?php }elseif($_smarty_tpl->tpl_vars['act']->value=="mod"){?>
       <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['weight']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
       <option value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['getDeal']->value['weight_id']==$_smarty_tpl->tpl_vars['var']->value['id']){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
</option>
       <?php } ?>
       
      <?php }?>
      </select>
  			</tr>
            <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">允许购买返利：</td>
   				  <td width="85%" bgcolor="f5f5f5">
                  <select name="is_referral">
                <?php if ($_smarty_tpl->tpl_vars['act']->value=="add"){?>
      
                    <option value="0">不允许</option>
					<option value="1">允许</option>
                  
                  <?php }elseif($_smarty_tpl->tpl_vars['act']->value=="mod"){?>
                    <option value="0" <?php if ($_smarty_tpl->tpl_vars['getDeal']->value['is_referral']==0){?> selected="selected" <?php }?>>不允许</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['getDeal']->value['is_referral']==1){?> selected="selected" <?php }?>>允许</option>
       			  <?php }?>	
			</select>&nbsp;<span class="attention_text">[购买该团购将不产生返利，也不作为计算返利次数的标准]</span>
  			</tr>
            </table>
        </div>
        
        <div class="hide" id="content_5">
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
        	<tr>
				<td width="15%" bgcolor="#EAEAEA" class="table_left_title">团购页SEO自定义标题:</td>
				<td width="85%" bgcolor="f5f5f5"><textarea class="textarea" name="seo_title" cols="30"><?php echo $_smarty_tpl->tpl_vars['getDeal']->value['seo_title'];?>
</textarea></td>
			</tr>
            <tr>
				<td width="15%" bgcolor="#EAEAEA" class="table_left_title">团购页SEO自定义关键词:</td>
				<td width="85%" bgcolor="f5f5f5"><textarea class="textarea" name="seo_keyword" cols="30"><?php echo $_smarty_tpl->tpl_vars['getDeal']->value['seo_keyword'];?>
</textarea></td>
			</tr>
            <tr>
				<td width="15%" bgcolor="#EAEAEA" class="table_left_title">团购页SEO自定义描述:</td>
				<td width="85%" bgcolor="f5f5f5"><textarea class="textarea" name="seo_description" cols="30"><?php echo $_smarty_tpl->tpl_vars['getDeal']->value['seo_description'];?>
</textarea></td>
			</tr>
           </table>
        </div>
        
        
    </div>
    <div style="border:solid 1px #CDCDCD;padding:5px;margin-top:5px;">
    	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  			<tr>
    			<td width="15%" bgcolor="#EAEAEA"></td>
    			<td width="85%" bgcolor="f5f5f5">
                <table width="164" border="0" cellspacing="3" cellpadding="0">
      				<tr>
        				<td><input type="submit" name="add" id="add" class="admin_button" value="<?php echo $_smarty_tpl->tpl_vars['submitButton']->value;?>
" /></td>
        				<td><input type="reset" name="reset" class="admin_button" value="重置" id="reset" /></td>
      				</tr>
    			</table>
                </td>
 			 </tr>
    	 </table>
     </div>
</div>
<input name="is_delete" type="hidden" value="0" />
<input type="hidden" name="act" value="<?php echo $_smarty_tpl->tpl_vars['act']->value;?>
" id="act">
</form>
</body>
</html>
<?php }} ?>