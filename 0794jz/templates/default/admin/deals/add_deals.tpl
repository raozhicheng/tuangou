<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<script type="text/javascript">
$(function()
{
//TABѡ��
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
//ͼƬԤ�����Ŵ�
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
//��ʾ�����ر��
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
//�ж���������ͼ֮ǰ�Ƿ���ͼ
if($("#act").val()=="add"){
	$("#hasThumb input").click(function(){
		var id=$(this).val();
		$(this).blur();
		if($("#uploadPic"+id).val()==""){
			alert("�Բ�����ѡ��ͼƬ��");
			$("#hasThumb"+id).attr("checked",false);
		}
		
	});
} else if($("#act").val()=="mod"){
	$("#hasThumb input").click(function(){
		var id=$(this).val();
		$(this).blur();
		if(($("#pic"+id).val()=="" && $("#uploadPic"+id).val()=="") || ($("#pic"+id).val()=="images/no_image.gif" && $("#uploadPic"+id).val()=="")){
			alert("�Բ�����ѡ��ͼƬ��");
			$("#hasThumb"+id).attr("checked",false);
		}
		
	});
}


})
</script>
<body>
<div id="location"><strong>��<{$submitButton}>�Ź���Ϣ</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>

 <form name="add_deal" method="post"  enctype="multipart/form-data" action="main.php?act=<{$status}>&id=<{$getDeal.id}>&edit=<{$act}>">
 <input type="hidden" name="id" value="<{$getDeal.id}>" >
 
<div id="list">
	<div id="deal_menu">
    	<ul>
        	<li class="deal_current"><a href="#" title="content_1">�Ź���Ϣ</a></li>
            <li class="deal_menu"><a href="#" title="content_2">�۸�����</a></li>
            <li class="deal_menu"><a href="#" title="content_3">�Ź�ͼƬ</a></li>
            <li class="deal_menu"><a href="#" title="content_4">��������</a></li>
            <li class="deal_menu"><a href="#" title="content_5">SEO����</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    
    <div id="content">
    
    	<div class="show" id="content_1">
        	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="15%" bgcolor="#EAEAEA" class="table_left_title">�Ź����ƣ�</td>
    <td width="85%" bgcolor="f5f5f5"><input type="text" name="name" id="name" class="input_box" value="<{$getDeal.name}>">&nbsp;<span class="attention_text">*</span></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">������ƣ�</td>
    <td bgcolor="f5f5f5"> <input type="text" name="sub_name" id="sub_name" class="input_box" value="<{$getDeal.sub_name}>">&nbsp;<span class="attention_text">*[�����Ź�ȯ���ʼ������ŵ���ʾ���������ó���20����]</span></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�Ź���ʶ��</td>
    <td bgcolor="f5f5f5"><input type="text" name="code" id="code" class="input_box" value="<{$getDeal.code}>">&nbsp;<span class="attention_text">*[���ڱ�ʶȯ���кŵ�ǰ׺]</span></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�Ź���飺</td>
    <td bgcolor="f5f5f5"><textarea class="textarea" name="brief" cols="50"><{$getDeal.brief}></textarea></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�Ź����ࣺ</td>
    <td bgcolor="f5f5f5">  <select name="cate_id" id="cate_id" style="width:130px;">
      <option value="0">δѡ�����</option>

      <{if $act=="add"}>
      
      <{foreach $category as $var}>
        <option value="<{$var.id}>"><{$var.name}></option>
      <{/foreach}>
      
      <{else if $act=="mod"}>
       <{foreach $category as $var}>
       <option value="<{$var.id}>" <{if $getDeal.cate_id==$var.id}> selected="selected" <{/if}>><{$var.name}></option>
       <{/foreach}>
       
      <{/if}>
      </select>&nbsp;<span class="attention_text">*</span>
            </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�Ź����У�</td>
    <td bgcolor="f5f5f5"><select name="city_id">
			<option value="0">δѡȡ����</option>
              <{if $act=="add"}>
      
      <{foreach $cities as $var}>
        <option value="<{$var.id}>"><{$var.name}></option>
      <{/foreach}>
      
      <{else if $act=="mod"}>
       <{foreach $cities as $var}>
       <option value="<{$var.id}>" <{if $getDeal.city_id==$var.id}> selected="selected" <{/if}>><{$var.name}></option>
       <{/foreach}>
       
      <{/if}>
            </select>&nbsp;<span class="attention_text">*</span>
            </td>
  </tr>
    <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�Ź���Ӧ�̣�</td>
    <td bgcolor="f5f5f5"><select name="supplier_id">
			<option value="0">δѡ��Ӧ��</option>
               <{if $act=="add"}>
      
      <{foreach $supplier as $var}>
        <option value="<{$var.id}>"><{$var.name}></option>
      <{/foreach}>
      
      <{else if $act=="mod"}>
       <{foreach $supplier as $var}>
        <option value="<{$var.id}>" <{if $getDeal.supplier_id==$var.id}> selected="selected" <{/if}>><{$var.name}></option>
       <{/foreach}>
       
      <{/if}>
            </select>&nbsp;<span class="attention_text">*</span>
            </td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">����</td>
    <td bgcolor="f5f5f5"><input type="text" name="sort" id="sort" class="input_box" value="<{$getDeal.sort}>">&nbsp;<span class="attention_text">*</span></td>
  </tr>
  <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">״̬��</td>
    <td bgcolor="f5f5f5"><lable>��Ч<input type="radio" name="status" value="1" <{$statused}> /></lable><lable>��Ч<input type="radio" name="status" value="0" <{$noStatused}> /></lable></td>
  </tr>
   <tr>
    <td bgcolor="#EAEAEA" class="table_left_title">�Ź�������</td>
    <td bgcolor="f5f5f5"><{$description}></td>
  </tr>
</table>
      </div>
        
        <div class="hide" id="content_2">
        	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
 			 <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">�Ź���ʼʱ�䣺</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="begin_time" id="begin_time"  readonly="true" class="input_box" value="<{if $getDeal.begin_time}><{$getDeal.begin_time|date_format:"%Y-%m-%d %H:%M:%S"}><{else}><{/if}>" onClick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')">&nbsp;<span class="attention_text">[�����ñ�ʾ�Ź���ʼ������]</span>
  			</tr>
            <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">�Ź�����ʱ�䣺</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="end_time" id="end_time" class="input_box"  readonly="true" value="<{if $getDeal.end_time}><{$getDeal.end_time|date_format:"%Y-%m-%d %H:%M:%S"}><{else}><{/if}>" onClick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')">&nbsp;<span class="attention_text">[�����ñ�ʾ�Ź�����������]</span>
  			</tr>
             <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">���������</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="buy_count" id="buy_count" class="input_box" value="<{$getDeal.buy_count}>" >&nbsp;<span class="attention_text">[�����������ֱ���޸���������]</span>
  			</tr>
             <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">����������</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="min_bought" id="min_bought" class="input_box" value="<{$getDeal.min_bought}>" >&nbsp;<span class="attention_text">[�ﵽ���������Ź��ɹ����Ź�ȯ�ڳɹ�����]</span>
  			</tr>
             <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">�Ź�������</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="max_bought" id="max_bought" class="input_box" value="<{$getDeal.max_bought}>" >&nbsp;<span class="attention_text">[����� ��λ����]</span>
  			</tr>
            <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">��Ա��͹�������</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="user_min_bought" id="user_min_bought" class="input_box" value="<{$getDeal.user_min_bought}>" >&nbsp;<span class="attention_text">[��λ����]</span>
  			</tr>
             <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">��Ա���������</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="user_max_bought" id="user_max_bought" class="input_box" value="<{$getDeal.user_max_bought}>" >&nbsp;<span class="attention_text">[��λ����]</span>
  			</tr>
            <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">ԭ�ۣ�</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="origin_price" id="origin_price" class="input_box" value="<{$getDeal.origin_price}>" >
  			</tr>
            <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">�Ź��ۣ�</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="current_price" id="current_price" class="input_box" value="<{$getDeal.current_price}>" >
  			</tr>
            <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">�Ź��ۿۣ�</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="discount" id="discount" class="input_box" value="<{$getDeal.discount}>" >&nbsp;<span class="attention_text">[Ϊ��ʱ���Զ������ۿ�]</span>
  			</tr>
            <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">�����ֽ�</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="return_money" id="return_money" class="input_box" value="<{$getDeal.return_money}>" >&nbsp;<span class="attention_text">[�û����򸶿�ɹ���ֱ�ӷ����������Ա���ֽ�]</span>
  			</tr>
             <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">���򷵻��֣�</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="return_score" id="return_score" class="input_box" value="<{$getDeal.return_score}>" >&nbsp;<span class="attention_text">[�û����򸶿�ɹ���ֱ�ӷ����������Ա�Ļ���]</span>
  			</tr>
            </table>
        </div>
        
       <div class="hide" id="content_3" >
        	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
            	<{if $act=="mod"}>
            	<tr>
                <td bgcolor="#f5f5f5" align="center">����ͼ��</td>
                	<td bgcolor="#f5f5f5" colspan="2">&nbsp;&nbsp;<span id="source_img">
                    			<{if $thumb}><img src="<{$GALLERY_PATH|cat:$thumb}>" alt="ͼƬԤ��" width=30 height="30">
                        		<{else}><img src="images/no_image.gif" width=30 height="30"  style="border:solid 2px #999">
                                <{/if}>
                                </span>
                    </td>
                </tr>
                <{/if}>
                <{for $img_num=0 to 4}>
                <tr>
             	<td width="10%" height="20" bgcolor="#f5f5f5" style="text-align:center">
                <span id="source_img">
                <{if $act=="mod"}>
                    <{foreach $bmpPath as $val}>
                    	<{if $val.sort==$img_num}>
                            <img src="<{$val.img}>" alt="ͼƬԤ��" width=30 height="30" id="previewPic" style="border:solid 2px #999">
                    	<{/if}>
                    <{/foreach}>
                <{else}>
                	<img src="images/no_image.gif" width=30 height="30" style="border:solid 2px #999">
                <{/if}>
                </span></td>
                <td width="20%" bgcolor="#f5f5f5" style="text-align:center"><input type="file" name="uploadPic<{$img_num}>" id="uploadPic<{$img_num}>"  class="upload_input"></td>
                <td  width="80%" bgcolor="#f5f5f5">
                <{if $act=="add"}>
                    <span id="hasThumb">
                    <input type="radio" name="hasThumb" id="hasThumb<{$img_num}>" value="<{$img_num}>" > ��������ͼ
                    </span> 
                <{else if $act=="mod"}>
                	<span id="hasThumb">
                    <input type="radio" name="hasThumb" id="hasThumb<{$img_num}>" value="<{$img_num}>" > ��������ͼ
                    <input type="hidden" name="pic<{$img_num}>" value="<{$bmpPath.$img_num.img}>" id="pic<{$img_num}>" >
                    </span> 
                <{/if}>
</td>
             </tr>
             <{/for}>
             </table>
       </div>
        
       <div class="hide" id="content_4">
        	<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
             <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">�Ƿ������Ź�ȯ��</td>
   				  <td width="85%" bgcolor="f5f5f5">
                  <select name="is_coupon" id="is_coupon">
                  <{if $act=="add"}>
      
                    <option value="0">��</option>
					<option value="1">��</option>
                  
                  <{else if $act=="mod"}>
                    <option value="0" <{if $getDeal.is_coupon==0}> selected="selected" <{/if}>>��</option>
					<option value="1" <{if $getDeal.is_coupon==1}> selected="selected" <{/if}>>��</option>
       			  <{/if}>	
                  </select>
  			</tr>
            
            <tr class="coupon">
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">��ȯ���ͣ�</td>
   				  <td width="85%" bgcolor="f5f5f5">
                  <select name="deal_type" id="deal_type">
                  <{if $act=="add"}>
      
                    <option value="0">������ȯ</option>
					<option value="1">������ȯ</option>
                  
                  <{else if $act=="mod"}>
                    <option value="0" <{if $getDeal.deal_type==0}> selected="selected" <{/if}>>������ȯ</option>
					<option value="1" <{if $getDeal.deal_type==1}> selected="selected" <{/if}>>������ȯ</option>
       			  <{/if}>
                  </select>
  			</tr>
             <tr class="coupon">
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">�Ź�ȯ��Чʱ�䣺</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="coupon_begin_time" id="coupon_begin_time"  readonly="true" class="input_box" value="<{if $getDeal.coupon_begin_time}><{$getDeal.coupon_begin_time|date_format:"%Y-%m-%d %H:%M:%S"}><{/if}>" onClick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')">&nbsp;<span class="attention_text">[�����ÿ�ʼʱ���ʾ�Ź�ȯʵʱ��Ч]</span>
  			</tr>
             <tr class="coupon">
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">�Ź�ȯ����ʱ�䣺</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="coupon_end_time" id="coupon_end_time"  readonly="true" class="input_box" value="<{if $getDeal.coupon_end_time}><{$getDeal.coupon_end_time|date_format:"%Y-%m-%d %H:%M:%S"}><{/if}>" onClick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')">&nbsp;<span class="attention_text">[�����ý���ʱ���ʾ�Ź�ȯ��������]</span>
  			</tr>
            
             <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">�Ƿ����ͣ�</td>
   				  <td width="85%" bgcolor="f5f5f5">
                  <select name="is_delivery" id="is_delivery">
				
                
                 <{if $act=="add"}>
      
                    <option value="0">��</option>
					<option value="1">��</option>
                  
                  <{else if $act=="mod"}>
                    <option value="0" <{if $getDeal.is_delivery==0}> selected="selected" <{/if}>>��</option>
					<option value="1" <{if $getDeal.is_delivery==1}> selected="selected" <{/if}>>��</option>
       			  <{/if}>	
			</select>&nbsp;<span class="attention_text">[��Ҫ���ͱ�ʾ����ʱ��Ҫ��д���͵�ַ����Ҫ�����˷�]</span>
  			</tr>
            <tr class="weight">
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">����������</td>
   				  <td width="85%" bgcolor="f5f5f5"><input type="text" name="weight" id="weight" class="input_box" value="<{$getDeal.weight}>" >&nbsp;
            <select name="weight_id" id="weight_id" style="width:130px;">
      <option value="0">δѡ�����</option>

      <{if $act=="add"}>
      
      <{foreach $weight as $var}>
        <option value="<{$var.id}>"><{$var.name}></option>
      <{/foreach}>
      
      <{else if $act=="mod"}>
       <{foreach $weight as $var}>
       <option value="<{$var.id}>" <{if $getDeal.weight_id==$var.id}> selected="selected" <{/if}>><{$var.name}></option>
       <{/foreach}>
       
      <{/if}>
      </select>
  			</tr>
            <tr>
  				  <td width="15%" bgcolor="#EAEAEA" class="table_left_title">����������</td>
   				  <td width="85%" bgcolor="f5f5f5">
                  <select name="is_referral">
                <{if $act=="add"}>
      
                    <option value="0">������</option>
					<option value="1">����</option>
                  
                  <{else if $act=="mod"}>
                    <option value="0" <{if $getDeal.is_referral==0}> selected="selected" <{/if}>>������</option>
					<option value="1" <{if $getDeal.is_referral==1}> selected="selected" <{/if}>>����</option>
       			  <{/if}>	
			</select>&nbsp;<span class="attention_text">[������Ź���������������Ҳ����Ϊ���㷵�������ı�׼]</span>
  			</tr>
            </table>
        </div>
        
        <div class="hide" id="content_5">
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
        	<tr>
				<td width="15%" bgcolor="#EAEAEA" class="table_left_title">�Ź�ҳSEO�Զ������:</td>
				<td width="85%" bgcolor="f5f5f5"><textarea class="textarea" name="seo_title" cols="30"><{$getDeal.seo_title}></textarea></td>
			</tr>
            <tr>
				<td width="15%" bgcolor="#EAEAEA" class="table_left_title">�Ź�ҳSEO�Զ���ؼ���:</td>
				<td width="85%" bgcolor="f5f5f5"><textarea class="textarea" name="seo_keyword" cols="30"><{$getDeal.seo_keyword}></textarea></td>
			</tr>
            <tr>
				<td width="15%" bgcolor="#EAEAEA" class="table_left_title">�Ź�ҳSEO�Զ�������:</td>
				<td width="85%" bgcolor="f5f5f5"><textarea class="textarea" name="seo_description" cols="30"><{$getDeal.seo_description}></textarea></td>
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
        				<td><input type="submit" name="add" id="add" class="admin_button" value="<{$submitButton}>" /></td>
        				<td><input type="reset" name="reset" class="admin_button" value="����" id="reset" /></td>
      				</tr>
    			</table>
                </td>
 			 </tr>
    	 </table>
     </div>
</div>
<input name="is_delete" type="hidden" value="0" />
<input type="hidden" name="act" value="<{$act}>" id="act">
</form>
</body>
</html>
