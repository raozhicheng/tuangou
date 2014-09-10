<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong><span style="color:red">·乐尚管理后台</span>-<{$ur_here}></strong></div>
<div id="list" <{if $status_class=="mess_status_right"}>style="background-color:#feffe8;border:solid 1px #ccd23b;height:190px;"<{else}>style="background-color:#fff5db;border:solid 1px #ffd05f;height:190px;"<{/if}>>
	<div <{if $status_class=="mess_status_right"}>id="mess_title_right"<{else}>id="mess_title_error"<{/if}>>&nbsp;·<{$msg_detail}></div>
    <div id="<{$status_class}>"></div>
    <div id="right">
    	<div id="redirection">
    		<{if $auto_redirect}>
        	·如果您不做出选择，将在
        	<span id="spanSeconds"><{$seconds}></span>
         	秒后跳转到第一个链接地址。
         	<{/if}>
    	</div>
    	<div id="point_line"></div>
        <div id="links">
        	<ul>
            	<{foreach $links as $value}>
				<li><img src="images/return.gif">&nbsp;&nbsp;<a href="<{$value.href}>" <{if $value.target}> target="<{$value.target}>"<{/if}>><{$value.text}></a></li>
				<{/foreach}>
            </ul>
        </div>
    </div>
</div>
<{if $auto_redirect}>
<script language="JavaScript">
<!--
var seconds = <{$seconds}>;
var defaultUrl = "<{$default_url}>";

<{literal}>
onload = function()
{
  if (defaultUrl == 'javascript:history.go(-1)' && window.history.length == 0)
  {
    document.getElementById('redirectionMsg').innerHTML = '';
    return;
  }

  window.setInterval(redirection, 1000);
}
function redirection()
{
  if (seconds <= 0)
  {
    window.clearInterval();
    return;
  }

  seconds --;
  document.getElementById('spanSeconds').innerHTML = seconds;

  if (seconds == 0)
  {
    window.clearInterval();
    location.href = defaultUrl;
  }
}
//-->
</script>
<{/literal}>
<{/if}>
</body>
</html>