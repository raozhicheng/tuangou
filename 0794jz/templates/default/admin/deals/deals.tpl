<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<link href="css/dialog.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function openViewDialog(o){
	this.blur();
	$.weeboxs.open('?act=deal_detail&id='+$(o).attr("id"), {contentType:'ajax',showButton:false,overlay:25,title:'�Ź���ϸ�嵥',width:650,height:360,onok:function(ob){
			$.weeboxs.close();
	}});
}

$(function()
{
$(window).resize(function() {//ҳ�洰�ڴ�С�ı��¼�
                if (!$(".dialog").is(":visible")) {
                    return;
                }
                showDialog(); //������ʾ�Ի����Top��Left
            });

            $(".title img").click(function() { //ע��ر�ͼƬ����¼�
                $(".dialog").hide();
                $(".mask").hide();
            })
			$("#frame").load(function(){ 
				$("#load").css("display","none");
				$("#frame").css("display","block");
			}); 
	
})

			function showDialog() {
                var objW = $(window); //��ǰ����
                var objC = $(".dialog"); //�Ի���
                var brsW = objW.width();
                var brsH = objW.height();
                var sclL = objW.scrollLeft();
                var sclT = objW.scrollTop();
                var curW = objC.width();
                var curH = objC.height();
                //����Ի������ʱ����߾�
                var left = sclL + (brsW - curW) / 2;
                //����Ի������ʱ���ϱ߾�
                var top = sclT + (brsH - curH) / 2;
                //���öԻ�����ҳ���е�λ��
                objC.css({ "left": left, "top": top });
            }

            
			
function openDialog(o){
		this.blur();
		$(".mask").show(); //��ʾ����ɫ
        showDialog(); //������ʾ�Ի����Top��Left
        $(".dialog").show(); //��ʾ��ʾ�Ի���
		$(".title span").html($(this).attr("id"));
		$("#load").css("display","block");
		$("#frame").css("display","none");
		$("#frame").attr("src","main.php?act=deal_coupon&id="+$(o).attr("id"));
}
</script>
<body>
<div id="location"><strong>���Ź��б����ҳ��</strong></div>

 <div class="mask"></div>
     <div class="dialog">
          <div class="title">
               <img src="images/close.gif" alt="������Թر�" /><span>�Ź�ȯ</span>
          </div>
          <div class="content">
          	  <div id="load"><p><img src="images/loading_circle.gif"></p></div>
              <iframe frameborder="0" height="300px" width="620px" scrolling="no" id="frame"></iframe>
          </div>
     </div>
     
<div id="warning" <{if $mess=="error"}>style="display:block;"<{else}>style="display:none;"<{/if}> >
	<div class="error_img">
		<img src="images/error.gif"></img>
    </div>
    <div class="message"><font color="#ff0000"><{$tmess}></font></div>
</div>
<form method="post" action="main.php?act=deals&edit=delAll">
<div id="list">
<{if !$deals}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">���޷����б�</strong></div></td>
    </tr>
</table>
<{else}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="5%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="ȫѡ"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="��ѡ"></div></td>
          <td><div align="center"><input type="button" id="noall" value="ȫ��"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="17%" bgcolor="#EAEAEA"><div align="center"><strong>�Ź�����</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>�Ź�����</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>���ڳ���</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>��������</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>��������</strong></div></td>
    <td width="8%" bgcolor="#EAEAEA"><div align="center"><strong>��ȯ����</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>ʱ��״̬</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>�������</strong></div></td>
    <td width="6%" bgcolor="#EAEAEA"><div align="center"><strong>״̬</strong></div></td>
    <td width="5%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
    <td width="12%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
  </tr>
  <{foreach $deals as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.cate_name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.city_name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.buy_count}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.min_bought}></div></td>
    <td bgcolor="f5f5f5"><div align="center">
    <{if $var.is_coupon}>
    <{$var.deal_type|replace:1:'������ȯ'|replace:0:'������ȯ'}>&nbsp;<a class="green_l" onClick="openDialog(this)" id="<{$var.id}>" style="cursor:pointer">[�鿴]</a>
    <{else}>
    ����ȯ
    <{/if}>
    </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.time_status|replace:1:'������'|replace:0:'δ��ʼ'|replace:2:'�ѹ���'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.buy_status|replace:1:'�ѳ���'|replace:0:'δ����'|replace:2:'���Ų�����'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.status|replace:1:'��Ч'|replace:0:'��Ч'}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.sort}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><a id="<{$var.id}>" onClick="openViewDialog(this)" style="cursor:pointer">��ϸ</a> | <a href="?act=add_deals&edit=mod&id=<{$var.id}>">�༭</a> | <a href="?act=deals&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('ȷ��Ҫɾ��<{$var.name}>��')">ɾ��</a></div></td>
  </tr>
  <{/foreach}>
  </table>
<{/if}>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="5"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#EAEAEA">
  <tr>
    <td bgcolor="#F5F5F5" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="19%"><table width="164" border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><input type="button" name="add" class="admin_button" value="����" onClick="window.location.href='main.php?act=add_deals&edit=add'"/></td>
              <{if $pageinfo.row_total}><td><input type="submit" name="dels" class="admin_button" value="ɾ��" onClick="return confirm('��ȷ��Ҫɾ��ѡ�е��Ź���Ŀ��?')" /></td><{/if}>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">��<{$pageinfo.row_total}>����¼&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          ��һҳ
          <{else}>
          <a href="?act=deals&page=1">��һҳ</a>
          <{/if}>
&nbsp;&nbsp;��&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=deals&page=<{$pageinfo.prev_page}>">��һҳ</a>
          <{else}>��һҳ<{/if}>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=deals&page=<{$pageinfo.next_page}>">��һҳ</a>
            <{else}>��һҳ<{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            ���һҳ
            <{else}>
            <a href="?act=deals&page=<{$pageinfo.page_num}>">���һҳ</a>
            <{/if}>
            &nbsp;&nbsp;��&nbsp;&nbsp;��ǰ��<{$pageinfo.current_page}>ҳ&nbsp;&nbsp;</div>
            <{/if}>
            </td>
        </tr>
      </table>
      <div align="center"></div></td>
    </tr>
</table>
</form>
</div>
</body>
</html>
