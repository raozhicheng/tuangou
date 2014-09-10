<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<body>
<div id="location"><strong>·管理员权限提示</strong></div>
	<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
        <div class="error_img">
            <img src="images/error.gif"></img>
        </div>
        <div class="message"><font color="#ff0000"><{$tmess}></font></div>
	</div>
</div>
</body>
</html>
