<div class="reg_box">
 <form name="login" id="login" method="post"  enctype="multipart/form-data" action="<{$Web_link|name:"do_login"}>">
 <ul>
    <li><span class="t"><label for="user_name">�û���/����:</label></span><span class="i"><input type="text" name="user_name" id="user_name" class="input_box" value="" /></span></li>
    <li><span class="t"><label for="user_pwd">����:</label></span><span class="i"><input type="password" name="user_pwd" id="user_pwd" class="input_box" value="" /></span>&nbsp;&nbsp;&nbsp;<a href="<{$Web_link|name:"getPassword"}>">�������룿</a></li>
    <li><span class="t"><label for="auto_login">ֱ�ӵ�½:</label></span><span class="i"><input type="checkbox" checked="checked" id="auto_login" name="auto_login" value="1" tabindex="3"></span></li>
    <li><span class="t"></span><span class="i"><input type="submit" name="commit" id="submit" class="submit_button" value="��½" /></span></li>
 </ul>
 <input type="hidden" name="ajax" value="<{$ajax}>">
 </form>
</div>