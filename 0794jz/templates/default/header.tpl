<div id="top">
	<div id="top_area">
    	<div id="logo"><img src="<{$Web_info|set:"SITE_LOGO"}>" /></div>
        <!-- <div id="line"><img src="<{$stylePath}>/images/line.png" /></div> -->
        <div id="right">
        	<div id="buttons_area">
            <{nocache}>
            <{if $user}>
            	��ӭ��&nbsp;<{$user.user_name}>&nbsp;&nbsp;&nbsp;<span class="white_l"><a href="<{$Web_link|name:"member"}>">��Ա����</a></span>&nbsp;&nbsp;&nbsp;<span class="red_l"><a href="<{$Web_link|name:"logout"}>">[�˳�]</a></span>
            <{else}>
            	<div class="button white_l"><a href="<{$Web_link|name:"login"}>">��½</a></div>
                <div class="button white_l"><a href="<{$Web_link|name:"register"}>">ע��</a></div>
            <{/if}>
            <{/nocache}>
            </div>
            <div class="clear"></div>
<!--             <div id="text_area" class="f12 white_l"><a href="<{$Web_link|name:"subscribe_mail"}>">���������Ź�</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<{$Web_link|name:"coupon_verify"}>">��֤����ȯ</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<{$Web_link|name:"cart" nocache}>">���ﳵ</a></div>
            <div id="subscription">
            	<div class="box"><input name="subscription" type="text" /></div>
                <div class="sub_button"><input name="subscribe" id="subscribe" type="submit" value="��Ѷ���"/></div>
            </div>
            <div id="city" class="white_l"><a href="Javascript:void(0)"><{nocache}><{$current_city.name}><{/nocache}></a>
            	<div class="city_box white_l">
                	<{city name="list"}>
                       	<li><a href="index.php?city=<{$list.uname}>"><{$list.name}></a></li>
					<{/city}>
                </div>
            </div>
            <div id="tel_logo"></div>
            <div id="tel_num"><{$Web_info|set:"SITE_TEL"}></div> -->
            <div id="menu_bg">
                <{nocache}>
                <div id="nav">
                <{nav name="list"}>
                    <li><a href="<{$list.link}>" <{if $list.is_newWindow}>target="_blank"<{/if}> <{if $list.current}> class="nav_current" <{else}>class="nav_normal"<{/if}>><{$list.name}></a></li>
                <{/nav}>
                </div>
                <{/nocache}>
            </div>
        </div> 
    </div>
</div>


<div class="body_area">
<div id="cate_bg">
    	<span><h2 class="black_n">���ࣺ</h2></span>
    	<ul class="f12">
        	<{nocache}>
        	<{dealCate name="list" num="8"}>
                <li <{if $list.current}>class="selected"<{/if}>><a href="<{$list.link}>"><{$list.name}></a></li>
            <{/dealCate}>
            <{/nocache}>
        </ul>
    </div>
<!--     <div class="ad_box">
    	<{adv name="row" id="6"}>
        	<{$row.code}>
        <{/adv}>
        <div class="clear"></div>
    </div> -->
</div>