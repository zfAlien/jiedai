	<div>
	<!--登录表单-->
	
								<form method="post" action="<?php
echo parse_url_tag("u:index|user#dologin|"."".""); 
?>" name="page_login_form" id="page_login_form">
								<div class="field email pr">
									<span class="holder_tip ps"><?php echo $this->_var['LANG']['USER_TITLE_EMAIL']; ?>/<?php echo $this->_var['LANG']['USER_TITLE_USER_NAME']; ?></span>
									<input type="text" value="" class="f-input ipttxt" id="login-email-address" name="email" size="30" tabindex="1">
								</div>
								<div class="field password pr">
									<span class="holder_tip ps"><?php echo $this->_var['LANG']['USER_TITLE_USER_PWD']; ?></span>
									<input type="password" value="" class="f-input ipttxt" id="login-password" name="user_pwd" size="30" tabindex="2">
								</div>	
								<?php if (app_conf ( "VERIFY_IMAGE" ) == 1): ?>
								<div class="field verify">
									<div class="verify_row">								
									<input type="text" value="" class="f-input ipttxt" name="verify" />	
									<img class="ml10" style="margin-top:0" src="<?php echo $this->_var['APP_ROOT']; ?>/verify.php?w=89&h=39rand=<?php 
$k = array (
  'name' => 'rand',
);
echo $k['name']();
?>" onclick="this.src='<?php echo $this->_var['APP_ROOT']; ?>/verify.php?w=89&h=39rand='+ Math.random();" title="看不清楚？换一张" />			
									</div>
								</div>
								<?php endif; ?>
								<div class="field autologin clearfix" style="font-size:12px;">
									<div  class="f_l"><input type="checkbox" id="autologin" name="auto_login" value="1" tabindex="3"><?php echo $this->_var['LANG']['AUTO_LOGIN']; ?></div>									
									<div class="lostpassword f_r">
									<a href="<?php
echo parse_url_tag("u:index|user#getpassword|"."".""); 
?>"><?php echo $this->_var['LANG']['FORGET_PASSWORD']; ?></a>
									</div>
								</div>
								<div class="act clearfix" style="margin:0px;padding:0">
									<input type="hidden" name="ajax" value="1">
									<input type="submit" class="login-submit-btn" id="user-login-submit" name="commit" value="<?php echo $this->_var['LANG']['LOGIN']; ?>">
									<span class="to_regsiter f_r"><a href="<?php
echo parse_url_tag("u:index|user#register|"."".""); 
?>">注册</a></span>
								</div>
							</form>
		<!--登录表单-->	
		<script type="text/javascript">
			var is_lock_user_login = false;		
			$(document).ready(function(){
					$(".user_login_bar .holder_tip").click(function(){
						$(this).hide();
						$(this).parent().find(".f-input").focus();
					});
					
					$(".user_login_bar .f-input").focus(function(){
						$(this).parent().find(".holder_tip").hide();
					});
					$(".user_login_bar .f-input").blur(function(){
						if($(this).val()==""){
							$(this).parent().find(".holder_tip").show();
						}
					});
					
					$(".user_login_bar .f-input").each(function(){
						if($(this).val()==""){
							$(this).parent().find(".holder_tip").show();
						}
						else{
							$(this).parent().find(".holder_tip").hide();
						}
					});
				
					$("#user-login-submit").click(function(){
					if(is_lock_user_login){
						return false;
					}
					is_lock_user_login = true;
					if($.trim($("#login-email-address").val()).length == 0)
					{
						$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['FORMAT_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_EMAIL'],
);
echo $k['name']($k['format'],$k['value']);
?><?php echo $this->_var['LANG']['OR']; ?><?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['FORMAT_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_USER_NAME'],
);
echo $k['name']($k['format'],$k['value']);
?>",function(){
							is_lock_user_login = false;
							$("#login-email-address").focus();
						});					
						return false;
					}
			
					if(!$.minLength($("#login-password").val(),4,false))
					{
						$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['FORMAT_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_USER_PWD'],
);
echo $k['name']($k['format'],$k['value']);
?>",function(){
							is_lock_user_login = false;
							$("#login-password").focus();
						});					
						return false;
					}
					
					var ajaxurl = $("form[name='page_login_form']").attr("action");
					var query = $("form[name='page_login_form']").serialize() ;
	
					$.ajax({ 
						url: ajaxurl,
						dataType: "json",
						data:query,
						type: "POST",
						success: function(ajaxobj){
							if(ajaxobj.status==1)
							{
								var integrate = $("<span id='integrate'>"+ajaxobj.data+"</span>");
								$("body").append(integrate);
								update_page_user_tip();
								$("#integrate").remove();				
										
								$.showSuccess(ajaxobj.info,function(){
									is_lock_user_login = false;
									if(ajaxobj.jump!='')
									location.href = ajaxobj.jump;
									else
									location.reload();
								});							
							}
							else
							{
								$.showErr(ajaxobj.info,function(){
									is_lock_user_login = false;
								});							
							}
						},
						error:function(ajaxobj)
						{
							is_lock_user_login = false;
	//						if(ajaxobj.responseText!='')
	//						alert(ajaxobj.responseText);
						}
					});	
					
					return false;
					
				});	
			});
	
			function update_page_user_tip()
			{
				var ajaxurl = APP_ROOT+"/index.php?ctl=ajax&act=update_user_tip";
				$.ajax({ 
				url: ajaxurl,
				type: "POST",
				success: function(ajaxobj){
					$("#user_head_tip").html(ajaxobj);
				},
				error:function(ajaxobj)
				{
	//				if(ajaxobj.responseText!='')
	//				alert(ajaxobj.responseText);
				}
			});	
			}
		
		</script>
		</div>