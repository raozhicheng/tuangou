<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><{$Web_info|set:"SITE_TITLE"}></title>
<meta name="description" content="<{$Web_info|set:"SITE_DESCRIPTION"}>">
<meta name="keywords" content="<{$Web_info|set:"SITE_KEYWORD"}>">
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link rel="shortcut icon" href="<{$stylePath}>/favicon.ico" />
<meta name="author" content="<{$appName}>" />
<meta name="copyright" content="leesuntech.com" />
<style type="text/css">
.top_grey_line{
	height:40px;
	line-height:40px;
	margin-bottom:10px;
	background:#666;
}
.body_area{
	width:600px;
	margin:0 auto;
}
.white_n{
	color:#fff;
	font-size:14px;
}
</style>
<!--[if lt IE 7]>
<script defer type="text/javascript" src="<{$stylePath}>/js/pngfix.js
"></script>
<![endif]-->
<script src="http://ditu.google.cn/maps?file=api&v=2&key=<{$GOOGLE_API_KEY}>&sensor=true"
        type="text/javascript">
</script>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.pngfix.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/map.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.jqprint-0.3.js"></script>  

<script type="text/javascript">
	$(document).ready(function(){
		initialize('<{$location.api_address}>');
	});
	function load_page()
	{
		var id = $("select[name='location_id']").val();
		location.href = '<{$url}>&location_id='+id;
	}
	$(function(){
		$("#print").click(function(){
			$(this).jqprint(); 
		});
	});
</script>

</head>

<body style="margin:0;">
<div class="top_grey_line">
	<div class="body_area white_n">
    	请选择您要消费的店面或分店
        <select name="location_id" onchange="load_page();">
		<{foreach $supplier_location as $var}>
		<option value="<{$var.id}>" <{if $location.id == $var.id }>selected="selected"<{/if}>>
		<{$var.name}>
		</option>
		<{/foreach}>
		</select>
        <span id="print" style="cursor:pointer">打印</span>
    </div>
</div>
<{$content}>
</body>

</html>
