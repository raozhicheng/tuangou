<{include file="$APP_STYLE/admin/common/main_header.tpl"}>
<link href="css/dialog.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
        $(function() {
			
            $("#pop img").click(function() { //ע��ɾ����ť����¼�
                $(".mask").show(); //��ʾ����ɫ
                showDialog(); //������ʾ�Ի����Top��Left
                $(".dialog").show(); //��ʾ��ʾ�Ի���
				$(".title span").html($(this).attr("alt")+"["+$(this).attr("name")+"]");
				
				$("#load").css("display","block");
			    $("#frame").css("display","none");
				$("#frame").attr("src","main.php?act=supplier_account&id="+$(this).attr("id"));
				
				/*$("#loadimg").ajaxStart(function(){
                      $("#loading").css("display","block");
                });
				
				$.ajax({
					type:"GET",
					url:"main.php",
					datatype:"html",
					data:"act=supplier_account&id="+$(this).attr("id"),
					beforeSend:function(){
						 $("#frame").css("display","none");
					     $("#load").css("display","block");
						
					},
					success: function(msg){ 
						$("#load").css("display","none");
						$("#frame").css("display","block");
						$("#frame").html(msg);
					}
				});*/
				
            })
			$("#frame").load(function(){ 
       			$("#load").css("display","none");
			    $("#frame").css("display","block");
   			}); 

			$("#pop1 img").click(function() { //ע��ɾ����ť����¼�
                $(".mask").show(); //��ʾ����ɫ
                showDialog(); //������ʾ�Ի����Top��Left
                $(".dialog").show(); //��ʾ��ʾ�Ի���
				$(".title span").html($(this).attr("alt")+"["+$(this).attr("name")+"]");
				$("#load").css("display","block");
			    $("#frame").css("display","none");
				
				$("#frame").attr("src","main.php?act=supplier_location&id="+$(this).attr("id"));
            })
            /*
            *���ݵ�ǰҳ���������λ�ã�������ʾ�Ի����Top��Left
            */
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
        })
		

    </script>
<body>
<div id="location"><strong>����Ӧ���б�</strong></div>
<div class="mask"></div>
     <div class="dialog">
          <div class="title">
               <img src="images/close.gif" alt="������Թر�" /><span>��Ӧ�̲�������</span>
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
<form method="post"  enctype="multipart/form-data" action="main.php?act=supplier&edit=del">
<div id="list">
<{if !$supplier}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">���޷����б�</strong></div></td>
    </tr>
</table>
<{else}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
    <td width="8%" bgcolor="#EAEAEA"><div align="center">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div align="center"><input type="button" id="all" value="ȫѡ"></div></td>
          <td><div align="center"><input type="button" id="reverse" value="��ѡ"></div></td>
          <td><div align="center"><input type="button" id="noall" value="ȫ��"></div></td>
        </tr>
      </table>
    </div></td>
    <td width="10%" bgcolor="#EAEAEA"><div align="center"><strong>���</strong></div></td>
    <td width="13%" bgcolor="#EAEAEA"><div align="center"><strong>��Ӧ������</strong></div></td>
    <td width="18%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
    <td width="15%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
    <td width="29%" bgcolor="#EAEAEA"><div align="center"><strong>����</strong></div></td>
  </tr>
  <{foreach $supplier as $var}>
  <tr>
    <td bgcolor="f5f5f5"><div align="center">
        <input type="checkbox" name="del[]" id="checkbox" value="<{$var.id}>">
      </div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.id}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.cate_name}></div></td>
    <td bgcolor="f5f5f5"><div align="center"><{$var.sort}></div></td>
    <td bgcolor="f5f5f5"><div align="center">
      <table width="170px" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="50%"><a href="?act=add_supplier&edit=mod&id=<{$var.id}>">�༭</a> | <a href="?act=supplier&page=<{$pageinfo.current_page}>&id=<{$var.id}>&edit=del" onClick="return confirm('ȷ��Ҫ����ɾ��<{$var.name}>��')">����ɾ��</a></td>
          <td width="10%"><div id="pop"><img src="images/key.gif" alt="��Ӧ���ʺŹ���" id="<{$var.id}>" style="cursor:pointer" name="<{$var.name}>"/></div></td>
          <td width="10%"><div id="pop1"><img src="images/list.gif" alt="��Ӧ�̷ֵ����" id="<{$var.id}>" style="cursor:pointer" name="<{$var.name}>"/></div></td>
        </tr>
      </table>
     
     </td>
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
              <td><input type="button" name="add" class="admin_button" value="����" onClick="window.location.href='main.php?act=add_supplier&edit=add'"/></td>
            <{if $pageinfo.row_total}>  <td><input type="submit" name="dels" class="admin_button" value="ɾ��" onClick="return confirm('��ȷ��Ҫɾ��ѡ�еĹ�Ӧ����?')" /></td><{/if}>
            </tr>
          </table></td>
          <td width="81%">
          <{if $pageinfo.row_total}>
          <div align="right">��<{$pageinfo.row_total}>����¼&nbsp;&nbsp;|&nbsp;&nbsp;
          <{if $pageinfo.current_page==1}>
          ��һҳ
          <{else}>
          <a href="?act=supplier&page=1">��һҳ</a>
          <{/if}>
&nbsp;&nbsp;��&nbsp;&nbsp;
		  <{if $pageinfo.prev_page}>
		  <a href="?act=supplier&page=<{$pageinfo.prev_page}>">��һҳ</a>
          <{else}>��һҳ<{/if}>
        &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.next_page}>
            <a href="?act=supplier&page=<{$pageinfo.next_page}>">��һҳ</a>
            <{else}>��һҳ<{/if}>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <{if $pageinfo.current_page==$pageinfo.page_num}>
            ���һҳ
            <{else}>
            <a href="?act=supplier&page=<{$pageinfo.page_num}>">���һҳ</a>
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
