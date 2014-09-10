$(document).ready(function(){
	$(document).pngFix();
	})
	/*城市下拉菜单*/
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



/*验证*/
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

//验证消费券
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
			if(obj.status==2)//未登录
			{
				$.weeboxs.open(APP_PATH+"coupon.php?act=ajax_supplier_login", {contentType:'ajax',showButton:false,title:"商家登录",width:500,height:150});	
			}
			if(obj.status == 0)
			{
				//确认失败
				alert(obj.msg);
			}
			if(obj.status == 1)
			{
				//确认成功
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

/* 加入购物车 */
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
				$.weeboxs.open(obj.html, {contentType:'text',showButton:false,title:"选取并加入购物车",width:550});
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

//删除购物车
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

//修改购物车
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


//定义邮件订阅的js
function submit_mail(o)
{	
	var email = $("#subscription").find("input[name='subscription']").val();
	if(email == '')
	{
		alert("邮箱地址不能为空");
		return;
	}
	if(!$.checkEmail(email))
	{
		alert("邮箱地址有误");
		return;
	}
	var ajaxurl = APP_PATH+"subscribe.php?act=addmail&email="+email+"&ajax=1";
	$.ajax({ 
		url: ajaxurl,
		dataType: "json",
		success: function(obj){
			if(obj.status == 1)
			{
				alert("订阅邮件成功!");
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

//提交购物车到结算页
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
					$.weeboxs.open(obj.html, {contentType:'text',showButton:false,title:'请登陆',width:550});
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


//装载配送地区
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
			alert("刷新过快!");
		}
	});	
}

//载入配送方式
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
			count_buy_total();  //加载完配送方式重新计算总价
		},
		error:function(ajaxobj)
		{
			if(ajaxobj.responseText!='')
			alert("刷新过快!");
		}
	});	
}

//计算购物总价
function count_buy_total()
{
	$("#order_done").attr("disabled",true);
	var query = new Object();
	//获取配送方式
	var delivery_id = $("input[name='delivery']:checked").val();

	if(!delivery_id)
	{
		delivery_id = 0;
	}
	query.delivery_id = delivery_id;

	//配送地区
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
	//余额支付
	var account_money = $("input[name='account_money']").val();
	if(!account_money||$.trim(account_money)=='')
	{
		account_money = 0;
	}
	query.account_money = account_money;
	//全额支付
	if($("#check-all-money").attr("checked"))
	{
		query.all_account_money = 1;
	}
	else
	{
		query.all_account_money = 0;
	}
	//代金券
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
	
	//支付方式
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


//购物提交
function submit_buy()
{
	$("#order_done").attr("disabled",true);
	var query = new Object();
	//获取配送方式
	var delivery_id = $("input[name='delivery']:checked").val();

	if(!delivery_id)
	{
		delivery_id = 0;
	}
	query.delivery_id = delivery_id;

	//配送地区
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
	
	//余额支付
	var account_money = $("input[name='account_money']").val();
	if(!account_money||$.trim(account_money)=='')
	{
		account_money = 0;
	}
	query.account_money = account_money;
	
	//全额支付
	if($("#check-all-money").attr("checked"))
	{
		query.all_account_money = 1;
	}
	else
	{
		query.all_account_money = 0;
	}
	
	//代金券
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
	
	//支付方式
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
				//配送验证
				if(!data.region_info||data.region_info.level != 3)
				{
					alert("请选择您所配送的完整地区信息");
					$("#order_done").attr("disabled",false);
					return;
				}
				if($.trim($("input[name='consignee']").val())=='')
				{
					alert("请填写收货人");
					$("#order_done").attr("disabled",false);
					return;
				}
				if($.trim($("input[name='address']").val())=='')
				{
					alert("请填写地址");
					$("#order_done").attr("disabled",false);
					return;
				}
				if($.trim($("input[name='zip']").val())=='')
				{
					alert("请填写邮编");
					$("#order_done").attr("disabled",false);
					return;
				}
				if($.trim($("input[name='mobile']").val())=='')
				{
					alert("请填写手机号码");
					$("#order_done").attr("disabled",false);
					return;
				}
				if(!$.checkMobilePhone($("input[name='mobile']").val()))
				{
					alert("请填写正确的手机号码");
					$("#order_done").attr("disabled",false);
					return;
				}
				if(!data.delivery_info)
				{
					alert("请选择配送方式");
					$("#order_done").attr("disabled",false);
					return;
				}			
			}
			
			if(data.pay_price!=0&&!data.payment_info)
			{
				alert("请选择支付方式");
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
