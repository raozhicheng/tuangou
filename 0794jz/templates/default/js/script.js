$(document).ready(function(){
	$(document).pngFix();
	})
	/*���������˵�*/
	$(function(){
		var $link=$("#city a");
		var $hide=$("#city .city_box");
		$link.click(function(){
			$hide.slideToggle(100);
		});
	
	$(".supperliers_card").hide();
	var id=$("#locations_select").find('option:selected').val();
	$("#supperliers_card"+id).show();
	
	$("#locations_select").change(function()
	{
		$(".supperliers_card").hide();
		var id=$("#locations_select").find('option:selected').val();
		$("#supperliers_card"+id).show();

	});



/*��֤*/
$.minLength = function(value, length , isByte) {
	var strLength = $.trim(value).length;
	if(isByte)
		strLength = $.getStringLength(value);
		
	return strLength >= length;
};

$.maxLength = function(value, length , isByte) {
	var strLength = $.trim(value).length;
	if(isByte)
		strLength = $.getStringLength(value);
		
	return strLength <= length;
};
$.getStringLength=function(str)
{
	str = $.trim(str);
	
	if(str=="")
		return 0; 
		
	var length=0; 
	for(var i=0;i <str.length;i++) 
	{ 
		if(str.charCodeAt(i)>255)
			length+=2; 
		else
			length++; 
	}
	
	return length;
}

$.checkMobilePhone = function(value){
	if($.trim(value)!='')
		return /^(13\d{9}|14\d{9}|18\d{9}|15\d{9})|(0\d{9}|9\d{8})$/i.test($.trim(value));
	else
		return true;
}
$.checkEmail = function(val){
	var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/; 
	return reg.test(val);
};

$("#order_done").click(function(){
		submit_buy();
});

$('#subscribe').click(function(){	
		submit_mail($(this));
});


});

//��֤����ȯ
function check_coupon()
{
	var coupon_sn = $.trim($("#coupon_sn").val());
	var ajaxurl = APP_PATH+"coupon.php?act=check_coupon&coupon_sn="+coupon_sn;
	$.ajax({ 
		url: ajaxurl,
		dataType: "json",
		success: function(msg){
			alert(msg.info);
		},
		error:function(ajaxobj)
		{
			if(ajaxobj.responseText!='')
			alert(ajaxobj.responseText);
		}
	});	
}

function use_coupon()
{
	var coupon_sn = $.trim($("#coupon_sn").val());
	var coupon_pwd = $.trim($("#coupon_pwd").val());
	var ajaxurl = APP_PATH+"coupon.php?act=use_coupon&coupon_sn="+coupon_sn+"&coupon_pwd="+coupon_pwd;
	$.ajax({ 
		url: ajaxurl,
		dataType: "json",
		success: function(obj){
			if(obj.status==2)//δ��¼
			{
				$.weeboxs.open(APP_PATH+"coupon.php?act=ajax_supplier_login", {contentType:'ajax',showButton:false,title:"�̼ҵ�¼",width:500,height:150});	
			}
			if(obj.status == 0)
			{
				//ȷ��ʧ��
				alert(obj.msg);
			}
			if(obj.status == 1)
			{
				//ȷ�ϳɹ�
				alert(obj.msg);
			}
		},
		error:function(ajaxobj)
		{
			if(ajaxobj.responseText!='')
			alert(ajaxobj.responseText);
		}
	});
}

/* ���빺�ﳵ */
function add_cart(id,attr)
{
	var ajaxurl = ADD_CART_URL+"&id="+id;
	if(attr != '')
		ajaxurl += attr;
	$.ajax({ 
		url: ajaxurl,
		dataType: "json",
		success: function(obj){
			if(obj.open_win == 1)
			{
				$.weeboxs.open(obj.html, {contentType:'text',showButton:false,title:"ѡȡ�����빺�ﳵ",width:550});
			}
			else if(obj.open_win == 2)
			{
				alert(obj.info);
			}
			else
			{
				location.href = CART_URL;
			}
		},
		error:function(ajaxobj)
		{
			if(ajaxobj.responseText!='')
			alert(ajaxobj.responseText);
		}
	});
	
}

//ɾ�����ﳵ
function del_cart(id)
{
	var ajaxurl = DEL_CART_URL+"&id="+id;
	$.ajax({ 
		url: ajaxurl,
		dataType: "json",
		success: function(obj){
			if(obj.status == 1)
			{
				$("#cart_list").html(obj.html);
			}
			else
			{
				location.href = CART_URL;
			}
		},
		error:function(ajaxobj)
		{
			if(ajaxobj.responseText!='')
			alert(ajaxobj.responseText);
		}
	});
}

//�޸Ĺ��ﳵ
function modify_cart(id,htmlobj)
{
	var number = $(htmlobj).val();
	var ajaxurl = MOD_CART_URL+"&id="+id+"&number="+number;
	$.ajax({ 
		url: ajaxurl,
		dataType: "json",
		success: function(obj){
			if(obj.status == 1)
			{
				$("#cart_list").html(obj.html);
			}
			else
			{
				var msg = obj.info;
				alert(msg);
			}
		},
		error:function(ajaxobj)
		{
			if(ajaxobj.responseText!='')
			alert(ajaxobj.responseText);
		}
	});	
}


//�����ʼ����ĵ�js
function submit_mail(o)
{	
	var email = $("#subscription").find("input[name='subscription']").val();
	if(email == '')
	{
		alert("�����ַ����Ϊ��");
		return;
	}
	if(!$.checkEmail(email))
	{
		alert("�����ַ����");
		return;
	}
	var ajaxurl = APP_PATH+"subscribe.php?act=addmail&email="+email+"&ajax=1";
	$.ajax({ 
		url: ajaxurl,
		dataType: "json",
		success: function(obj){
			if(obj.status == 1)
			{
				alert("�����ʼ��ɹ�!");
				$("#subscription").find("input[name='subscription']").val("");
				return;
			}
			else
			{
				alert(obj.info);
				return;
			}
		},
		error:function(ajaxobj)
		{
			if(ajaxobj.responseText!='')
			alert(ajaxobj.responseText);
		}
	});	
}

//�ύ���ﳵ������ҳ
function submit_cart()
{
	var ajaxurl = CART_CHECK_URL+"&ajax=1";
	$.ajax({ 
		url: ajaxurl,
		dataType: "json",
		success: function(obj){
			if(obj.status == 1)
			{
				location.href = CART_CHECK_URL;
			}
			else
			{
				if(obj.open_win == 1)
				{
					$.weeboxs.open(obj.html, {contentType:'text',showButton:false,title:'���½',width:550});
				}
				else
				{
					var msg = obj.info;
					alert(msg);
				}
			}
		},
		error:function(ajaxobj)
		{
			if(ajaxobj.responseText!='')
			alert(ajaxobj.responseText);
		}
	});		
}


//װ�����͵���
function load_consignee(consignee_id)
{
	var ajaxurl = APP_PATH+"ajax.php?act=load_consignee&id="+consignee_id; 
	$.ajax({ 
		url: ajaxurl,
		success: function(html){
			$("#cart_consignee").html(html);
			load_delivery();
		},
		error:function(ajaxobj)
		{
			if(ajaxobj.responseText!='')
			alert("ˢ�¹���!");
		}
	});	
}

//�������ͷ�ʽ
function load_delivery()
{
	var select_last_node = $("#cart_consignee").find("select[value!='0']");
	
	if(select_last_node.length>0)
	{		
		var region_id = $(select_last_node[select_last_node.length - 1]).val();
	}
	else
	{
		var region_id = 0;
	}
	var ajaxurl = APP_PATH+"ajax.php?act=load_delivery&id="+region_id;
	$.ajax({ 
		url: ajaxurl,
		success: function(html){
			$("#cart_delivery").html(html);
			count_buy_total();  //���������ͷ�ʽ���¼����ܼ�
		},
		error:function(ajaxobj)
		{
			if(ajaxobj.responseText!='')
			alert("ˢ�¹���!");
		}
	});	
}

//���㹺���ܼ�
function count_buy_total()
{
	$("#order_done").attr("disabled",true);
	var query = new Object();
	//��ȡ���ͷ�ʽ
	var delivery_id = $("input[name='delivery']:checked").val();

	if(!delivery_id)
	{
		delivery_id = 0;
	}
	query.delivery_id = delivery_id;

	//���͵���
	var select_last_node = $("#cart_consignee").find("select[value!='0']");
	if(select_last_node.length>0)
	{		
		var region_id = $(select_last_node[select_last_node.length - 1]).val();
	}
	else
	{
		var region_id = 0;
	}
	query.region_id = region_id;
	//���֧��
	var account_money = $("input[name='account_money']").val();
	if(!account_money||$.trim(account_money)=='')
	{
		account_money = 0;
	}
	query.account_money = account_money;
	//ȫ��֧��
	if($("#check-all-money").attr("checked"))
	{
		query.all_account_money = 1;
	}
	else
	{
		query.all_account_money = 0;
	}
	//����ȯ
	var ecvsn = $("input[name='ecvsn']").val();
	if(!ecvsn)
	{
		ecvsn = '';
	}
	var ecvpassword = $("input[name='ecvpassword']").val();
	if(!ecvpassword)
	{
		ecvpassword = '';
	}
	query.ecvsn = ecvsn;
	query.ecvpassword = ecvpassword;
	
	//֧����ʽ
	var payment = $("input[name='payment']:checked").val();
	if(!payment)
	{
		payment = 0;
	}
	query.payment = payment;
	if(order_id>0){
		var ajaxurl = APP_PATH+"ajax.php?act=count_order_total&id="+order_id;
	}else{
		var ajaxurl = APP_PATH+"ajax.php?act=count_buy_total";
	}
	$.ajax({ 
		url: ajaxurl,
		data:query,
		type: "POST",
		dataType: "json",
		success: function(data){
			$("#cart_total").html(data.html);
			$("input[name='account_money']").val(data.account_money);
			if(data.pay_price == 0)
			{
				$("input[name='payment']").attr("disabled",true);
				$("input[name='payment']").attr("checked",false);
			} else {
				
				$("input[name='payment']").attr("disabled",false);
			}
			$("#order_done").attr("disabled",false);
		},
		error:function(ajaxobj)
		{
			if(ajaxobj.responseText!='')
			alert(ajaxobj.responseText);
		}
	});	
}


//�����ύ
function submit_buy()
{
	$("#order_done").attr("disabled",true);
	var query = new Object();
	//��ȡ���ͷ�ʽ
	var delivery_id = $("input[name='delivery']:checked").val();

	if(!delivery_id)
	{
		delivery_id = 0;
	}
	query.delivery_id = delivery_id;

	//���͵���
	var select_last_node = $("#cart_consignee").find("select[value!='0']");
	if(select_last_node.length>0)
	{		
		var region_id = $(select_last_node[select_last_node.length - 1]).val();
	}
	else
	{
		var region_id = 0;
	}
	query.region_id = region_id;
	
	//���֧��
	var account_money = $("input[name='account_money']").val();
	if(!account_money||$.trim(account_money)=='')
	{
		account_money = 0;
	}
	query.account_money = account_money;
	
	//ȫ��֧��
	if($("#check-all-money").attr("checked"))
	{
		query.all_account_money = 1;
	}
	else
	{
		query.all_account_money = 0;
	}
	
	//����ȯ
	var ecvsn = $("input[name='ecvsn']").val();
	if(!ecvsn)
	{
		ecvsn = '';
	}
	var ecvpassword = $("input[name='ecvpassword']").val();
	if(!ecvpassword)
	{
		ecvpassword = '';
	}
	query.ecvsn = ecvsn;
	query.ecvpassword = ecvpassword;
	
	//֧����ʽ
	var payment = $("input[name='payment']:checked").val();
	if(!payment)
	{
		payment = 0;
		
	}
	query.payment = payment;
	if(order_id>0)
	var ajaxurl = APP_PATH+"ajax.php?act=count_order_total&id="+order_id;
	else
	var ajaxurl = APP_PATH+"ajax.php?act=count_buy_total";
	$.ajax({ 
		url: ajaxurl,
		data:query,
		type: "POST",
		dataType: "json",
		success: function(data){
			
			if(data.is_delivery == 1)
			{
				//������֤
				if(!data.region_info||data.region_info.level != 3)
				{
					alert("��ѡ���������͵�����������Ϣ");
					$("#order_done").attr("disabled",false);
					return;
				}
				if($.trim($("input[name='consignee']").val())=='')
				{
					alert("����д�ջ���");
					$("#order_done").attr("disabled",false);
					return;
				}
				if($.trim($("input[name='address']").val())=='')
				{
					alert("����д��ַ");
					$("#order_done").attr("disabled",false);
					return;
				}
				if($.trim($("input[name='zip']").val())=='')
				{
					alert("����д�ʱ�");
					$("#order_done").attr("disabled",false);
					return;
				}
				if($.trim($("input[name='mobile']").val())=='')
				{
					alert("����д�ֻ�����");
					$("#order_done").attr("disabled",false);
					return;
				}
				if(!$.checkMobilePhone($("input[name='mobile']").val()))
				{
					alert("����д��ȷ���ֻ�����");
					$("#order_done").attr("disabled",false);
					return;
				}
				if(!data.delivery_info)
				{
					alert("��ѡ�����ͷ�ʽ");
					$("#order_done").attr("disabled",false);
					return;
				}			
			}
			
			if(data.pay_price!=0&&!data.payment_info)
			{
				alert("��ѡ��֧����ʽ");
				$("#order_done").attr("disabled",false);
				return;
			}
			$("#cart_form").submit();
		},
		error:function(ajaxobj)
		{			
			alert("error: "+ajaxobj.responseText);
			return false;
		}
	});	
}
