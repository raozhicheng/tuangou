		<div class="right_box">
        	<div class="city_notice">
        		<{nocache}><{$current_city.notice}><{/nocache}>
            </div>
        </div>
        <div class="line"></div>
        <div class="right_box">
            	<div class="title">
                	<span class="right_icon_info left"></span>
                    <span class="f12b red_n left">������Ϣ</span>
                    <span class="f12 red_l right"><a href="<{$Web_link|name:"infos":21}>">����...</a></span>
                </div>
                <div class="content">
                	<ul><{nocache}>
                        <{info name="info" num="6" cate_id="21" title_len="20"}>
                        	<li class="f12 red_l"><a href="<{$info.link}>">&middot;&nbsp;<{$info.title}>&nbsp;&nbsp;&nbsp;&nbsp;</a><{$info.update_time|date_format:"%Y-%m-%d"}></li>
                        <{/info}>
                    </ul><{/nocache}>
                </div>
            	<div class="clear"></div>
            </div>
            
            <div class="line"></div>
            
           
            
            <{if $side_deal_tag}>
            <div class="right_box">
            	<div class="title">
                	<span class="right_icon_pay left"></span>
                    <span class="f12b red_n left">���������Ź�</span>
                </div>
                <div class="content" id="side_deal">
                   <{deal name="deal_info" num=$side_deal_num}>
                       <dl class="black_l"><dt><a href="<{$deal_info.link}>"><img src="<{$deal_info.img}>"/></a></dt><dd><a href="<{$deal_info.link}>"><{$deal_info.name|truncate:18:"..."}></a></dd></dl>
                   <{/deal}>
                </div>
            	<div class="clear"></div>
            </div>
            <div class="line"></div>
            <{/if}>
            
             <div class="right_box">
            	<div class="title">
                	<span class="right_icon_qa left"></span>
                    <span class="f12b red_n left">�������</span>
                </div>
                <{nocache}>
                <div class="content">
                	<ul class="f12">
                        <{message name="list" title_len="18" group_id="5" num="5"}>
                        	<li class="grey_n">&middot;&nbsp;<{$list.title}>&nbsp;&nbsp;&nbsp;&nbsp;<{$list.update_time|date_format:"%Y-%m-%d"}></li>
                            <{assign var=message_num value=$message_num}>
                        <{/message}>
                        <li class="red_l"><a href="<{$Web_link|name:"question":5}>">���д���(<{$message_num}>)</a></li>
                        <{assign var=qq value=$Web_info|set:"ONLINE_QQ"}>
                        <li style="border-top:1px dotted #ccc;line-height:36px;">���߿ͷ���<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<{$qq.0}>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<{$qq.0}>:51" alt="���߿ͷ�" title="���߿ͷ�"/></a><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<{$qq.1}>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<{$qq.1}>:51" alt="���߿ͷ�" title="���߿ͷ�"/></a></li>
                        <li style="border-top:1px dotted #ccc;line-height:36px;">����ʱ�䣺<span class="red_n"><{$Web_info|set:"ONLINE_TIME"}></span></li>
                    </ul>
                </div>
                <{/nocache}>
            	<div class="clear"></div>
            </div>
            
            <div class="line"></div>
            
            
			<div class="right_box">
            	<div class="title">
                	<span class="right_icon_user left"></span>
                    <span class="f12b red_n left">�������</span>
                </div>
                <div class="content f14 grey_n red_l">
                	�����ϣ����֯�Ź�����<a href="<{$Web_link|name:"business"}>">�������</a>�ṩ�����Ϣ�� 
                </div>
                <div class="clear"></div>
            </div>