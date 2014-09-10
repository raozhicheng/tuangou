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
<link href="<{$stylePath}>/css/global.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/header.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/footer.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/common.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/message.css" rel="stylesheet" type="text/css" />
<link href="<{$stylePath}>/css/font.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<script defer type="text/javascript" src="<{$stylePath}>/js/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="<{$stylePath}>/js/jquery.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/script.js"></script>
<script type="text/javascript" src="<{$stylePath}>/js/jquery.pngfix.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#add_message").bind("submit",function(){
			var msg = $.trim(($("#add_message").find("textarea[name='content']").val()));
			var title = $.trim(($("#add_message").find("input[name='title']").val()));
			if(msg == '' || title=='')
			{
				alert("������������ݲ���Ϊ��");
				return false;
			}
			
		});
	});
</script>
</head>

<body>
<{include file="$style/header.tpl"}>
<div class="body_area">
    <div id="content_box">
    	<div class="c_left">
          <div class="message">
          	<div class="tit">
            	<ul>
                	<{nocache}>
                	<{messageGroup name="row" num="6" preset=$mg_info.preset}>
                		<li <{if $row.current==1}>class="cur"<{/if}>><a href="<{$row.link}>"><{$row.show_name}></a></li>
                    <{/messageGroup}>
                    <{/nocache}>
                </ul>
            </div>
            <div class="content">
            	<{nocache}>
                	<{message name="list" title_len="30"}>
                        <div class="mess_box">
                        	<ul>
                            	<li class="title"><b class="grey_n">���⣺</b><{$list.title}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="grey_n">ʱ�䣺</b><{$list.update_time|date_format:"%Y-%m-%d %H:%M:%S"}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="grey_n">�û���</b><{$list.username}></li>
                                <li class="con"><b class="grey_n">�������ݣ�</b><{$list.content}></li>
                                <li class="reply"><b class="grey_n">�ظ����ݣ�</b><{if $list.admin_reply}><{$list.admin_reply|strip_tags}><{else}>���޻ظ�<{/if}></li>
                                
                            </ul>
                        </div>
                        <{assign var=p value=$pages|type:"other":$message_num}>
                    <{/message}>
                    <{if $p}>
                      <div class="pages">
                                <ul>
                                    <li>����<{$p.row_total}>����¼</li>
                                    <li>
                                        <{if $p.current_page==1}>
                                          ��һҳ
                                          <{else}>
                                          <a href="<{$p.current_page_url}>">��һҳ</a>
                                          <{/if}>
                                    </li>
                                    <li>
                                         <{if $p.prev_page}>
                                         <a href="<{$p.prev_page_url}>">��һҳ</a>
                                         <{else}>��һҳ<{/if}>
                                    </li>
                                    <li>
                                        <{if $p.next_page}>
                                        <a href="<{$p.next_page_url}>">��һҳ</a>
                                        <{else}>��һҳ<{/if}>
                                    </li>
                                    <li>
                                        <{if $p.current_page==$p.page_num}>
                                        ���һҳ
                                        <{else}>
                                        <a href="<{$p.page_end_url}>">���һҳ</a>
                                        <{/if}>
                                    </li>
                                    <li>��ǰ��<{$p.current_page}>ҳ</li>
                                </ul>
                            </div>
                      <{/if}>
                <{/nocache}>
            </div>
            <div class="message_form red_l">
            	<{nocache}>
            	<{if $user}>
                <form method="post" id="add_message" action="<{$Web_link|name:"message"}>&act=add" name="message" >
                	<ul>
                    	<li>���⣺<input type="text" value="" name="title" style="width:200px;"></li>
                    	<li>���ݣ�<textarea name="content" rows="8" cols="80"></textarea></li>
                        <input type="hidden" value="<{$mg_info.id}>" name="group_id">
                        <input type="hidden" value="<{$mg_info.is_member}>" name="is_member">
                        <li style="margin-left:40px;"><input type="submit" class="formbutton" name="commit" value="�ύ"></li>
                    </ul>
                 </form>
                <{else}>
                	����δ&nbsp;&nbsp;<a href="<{$Web_link|name:"login"}>">��½</a>&nbsp;&nbsp;��&nbsp;&nbsp;<a href="<{$Web_link|name:"register"}>">ע��</a>�����ܷ������ԣ�
                <{/if}>
                <{/nocache}>
            </div>
         </div>
          
        </div>
        <div class="c_right">
        	<{include file="$style/inc/right_info.tpl"}>
        </div>
        <div class="clear"></div>
    </div>
</div>
<{include file="$style/footer.tpl"}>

</body>

</html>
