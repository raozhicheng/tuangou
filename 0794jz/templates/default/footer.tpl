<div id="links">
	<div class="body_area">
            <fieldset>
            <legend>”—«È¡¥Ω”</legend>
                <div class="content">
                    <ul>
                        <{link name="row"}>
                            <li><a href="<{$row.address}>" target="_blank"><img src="<{$row.img}>" width="88" height="31"/></a></li>
                        <{/link}>
                    </ul>
                </div>
                <div class="clear"></div>
            </fieldset>
	</div>
</div>
        
<div id="bottom">
	<div class="body_area">
        <div class="infos">
        	<span class="left" style="padding:15px 10px;">
            	<img src="<{$Web_info|set:"FOOTER_LOGO"}>">
            </span>
            <{infoCate name="infocate" num="4" type="help"}>
            	<span class="split_line"></span>
                <dl>
                    <dt><{$infocate.name}></dt>
                    <dd class="f12 light_blue_l">
                    	<{info name="info" num="4" cate_id=$infocate.id}>
                        	<a href="<{$info.link}>">°§&nbsp;<{$info.title}></a><br />
                        <{/info}>
                    </dd>
                    
                </dl>
            <{/infoCate}>
        </div>
       	<div class="infos_bottom_line"></div>
        <div class="copyright white_l">
        	<{$Web_info|set:"SITE_FOOTER"}>
        </div>
    </div>
</div>
