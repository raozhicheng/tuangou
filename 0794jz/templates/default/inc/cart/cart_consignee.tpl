<script type="text/javascript">
$(document).ready(function(){	
	  var pindex;
	  $("select[name='region_lv1']").bind("change",function(){
		  pindex = $(this).get(0).selectedIndex;
		  var id=$(this).val();
			$("select[name='region_lv2']").empty();
			$("<option>请选择城市</option>").appendTo($("select[name='region_lv2']"));
			if (pindex!=0){
				<{foreach $consignee_info.region_lv2_all as $lv2}>
					if(id==<{$lv2.pid}>){
						$("<option value=<{$lv2.id}>>"+"<{$lv2.name}>"+"</option>").appendTo($("select[name='region_lv2']"));
					}
				<{/foreach}>
			}
			$("select[name='region_lv3']").empty();
			$("<option>请选择区县</option>").appendTo($("select[name='region_lv3']"));
	  });
	  
	  
	  $("select[name='region_lv2']").bind("change",function(){
		  pindex = $(this).get(0).selectedIndex;
		  var id=$(this).val();
		  $("select[name='region_lv3']").empty();
		  $("<option>请选择区县</option>").appendTo($("select[name='region_lv3']"));
		  if (pindex!=0){
				<{foreach $consignee_info.region_lv3_all as $lv3}>
					if(id==<{$lv3.pid}>){
						$("<option value=<{$lv3.id}>>"+"<{$lv3.name}>"+"</option>").appendTo($("select[name='region_lv3']"));
					}
				<{/foreach}>
			}
	  });
	  
  });
 
</script>

                        <table cellspacing="1" cellpadding="6" border="0" width="100%" bgcolor="#CCCCCC">
								<tbody>
                                <tr>
									<td width=25% bgcolor="#ebebeb" align="right">收货人：</td>
									<td bgcolor="#ffffff"><input type="text" value="<{$consignee_info.consignee}>" name="consignee" size="30"><span class="red_alert">*</span></td>
								</tr>
                                
                                <tr>
									<td width=25% bgcolor="#ebebeb" align="right">所在地区：</td>
									<td bgcolor="#ffffff"><select name="region_lv1">
										    <option value="0">请选择省份</option>
											<{foreach $consignee_info.region_lv1 as $lv1}>
											<option <{if $lv1.selected == 1}>selected="selected"<{/if}> value="<{$lv1.id}>"><{$lv1.name}></option>
											<{/foreach}>
										  </select>
                                          
                                          <select name="region_lv2">
										    <option value="0">请选择城市</option>
											<{foreach $consignee_info.region_lv2 as $lv2}>
											<option <{if $lv2.selected == 1}>selected="selected"<{/if}> value="<{$lv2.id}>"><{$lv2.name}></option>
											<{/foreach}>
										  </select>
                                          
                                          <select name="region_lv3">
										    <option value="0">请选择区县</option>
											<{foreach $consignee_info.region_lv3 as $lv3}>
											<option <{if $lv3.selected == 1}>selected="selected"<{/if}> value="<{$lv3.id}>"><{$lv3.name}></option>
											<{/foreach}>
										  </select><span class="red_alert">*</span>
                                          </td>
								</tr>
                                <tr>
									<td width=25% bgcolor="#ebebeb" align="right">地址：</td>
									<td bgcolor="#ffffff"><input type="text" value="<{$consignee_info.address}>" name="address" size="30"><span class="red_alert">*</span></td>
								</tr>
                                <tr>
									<td width=25% bgcolor="#ebebeb" align="right">邮编：</td>
									<td bgcolor="#ffffff"><input type="text" value="<{$consignee_info.zip}>" name="zip" size="30"><span class="red_alert">*</span></td>
								</tr>
                                <tr>
									<td width=25% bgcolor="#ebebeb" align="right">手机：</td>
									<td bgcolor="#ffffff"><input type="text" value="<{$consignee_info.mobile}>" name="mobile" size="30"><span class="red_alert">*</span></td>
								</tr>
                         </tbody>
                         </table>
                    
