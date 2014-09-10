<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=7">
<title>乐尚团购后台管理系统</title>
<link href="css/global.css" rel="stylesheet" type="text/css" />
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<script src="js/common.js"></script>
<!--[if lt IE 7]>
<script defer type="text/javascript" src="js/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/jquery.pngfix.js"></script>
<script type="text/javascript">
   function checkParent(){
        if(window.parent.length>0){ 
        window.parent.location="login.php"; 
    }
   }
</script>


</head>

<body style="background-color:#101010" onload="checkParent();">
<div id="admin_bg">
	<div id="outer">
    	<div id="content">
        	<div id="left_shadow"></div>
            <div id="log_area">
            	<div id="log_box">
                	<div id="log_bg">
                    	<form action="login.php" method="post">
                    	<div id="login">
                        	<ul>
                            	<li>管理员：<input name="username" type="text" size="25"  class="box"></li>
                                <li>密　码：<input name="password" type="password" size="25" class="box"></li>
                                <li class="valicode">验证码：<input name="verification" type="text" size="13" /></li>
                                <li class="imgcode"><img src="../imgcode.php" alt="看不清楚，换一张" style="cursor: pointer;" onClick="javascript: newgdcode(this,this.src);" /></li>
                                
                                <li class="button"><input type="submit" class="button" value="登录系统" /></li>
                                
                                <input type="hidden" name="action" value="login">
                            </ul>
                            <div class="<{$className}>">
                            	<span><{$message}></span>
                        	</div>
                        </div>
                         </form>
                    </div>
                </div>
                <div id="bottom_shadow"></div>
            </div>
            <div id="right_shadow"></div>
        </div>
        <div id="shadow">
        </div>
    </div>
</div>
</body>
</html>
