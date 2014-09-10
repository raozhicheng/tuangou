<div id="list">
<{if !$delivery_areas_1}>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="cdcdcd">
  <tr>
	<td bgcolor="#EAEAEA"><div align="center"><strong  style="color:red">暂无配送地区列表</strong></div></td>
    </tr>
</table>
<{else}>
  	<div id="tree_box">
    	<{foreach $delivery_areas_1 as $var_1}>
    		<div id="level_box">
        		<li class="level1"><input type="checkbox" name="area[]" id="checkbox" value="<{$var_1.id}>">&nbsp;<span><{$var_1.name}></span></li>
                <{foreach $delivery_areas_2 as $var_2}>
                	<{if $var_2.pid==$var_1.id}>
                    	<li class="level2"><input type="checkbox" name="area[]" id="checkbox" value="<{$var_2.id}>">&nbsp;<span><{$var_2.name}></span></li>
                        	<{foreach $delivery_areas_3 as $var_3}>
                         		<{if $var_3.pid==$var_2.id}>
                    				<li class="level3"><input type="checkbox" name="area[]" id="checkbox" value="<{$var_3.id}>">&nbsp;<span><{$var_3.name}></span></li>
                            	<{/if}>
                        	<{/foreach}>
                    <{/if}>
                <{/foreach}>
       		</div>
            
            <{if $var_1@iteration % 4==0}>
            	<div class="clear"></div>
            <{/if}>
            
        <{/foreach}>
    </div>

  
<{/if}>
</div>
