$(document).ready(function(){
	$(document).pngFix();
	})
	$(function(){
	//后台按钮
	$(".admin_button").hover(function()	{$(this).addClass("admin_button_hover")},function(){$(this).removeClass("admin_button_hover")});
	//后台复选框
	$("#all").click(function(){$("[name='del[]']").attr("checked",'true');}) //全选
	$("#noall").click(function(){ $("[name='del[]']").removeAttr("checked");}) //取消全选 
	$("#reverse").click(function(){ 
		$("[name='del[]']").each(function(){ 
		if($(this).attr("checked")) 
		{ 
			$(this).removeAttr("checked"); 
		} else { 
			$(this).attr("checked",'true'); 
		} 
		})
	}) //反选
	$("#all_or_no").click(function(){ 
		if($("[name='del[]']").attr("checked")) 
		{ 
			$("[name='del[]']").removeAttr("checked"); 
		} else { 
			$("[name='del[]']").attr("checked",'true'); 
		} 
	});
	
	//权限选择
	$("#role_all").click(function(){$("[name='node[]']").attr("checked",'true');}) //全选
	$("#role_noall").click(function(){ $("[name='node[]']").removeAttr("checked");}) //取消全选 
	
});
	
//左侧子选单
$(function()
{
$("#sub ul li:first").addClass("hover");
$("#sub ul li a").click(function(){
	$("#sub ul li").removeClass("hover");
	$(this).parent().addClass("hover");
	$(this).blur();
	});
});

//错误提醒
$(function() {
	$("#warning .error_img img").click(function(){
		$("#warning").hide();
	});
});


           
