<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if ($this->_var['page_title']): ?><?php echo $this->_var['page_title']; ?> - <?php endif; ?><?php if ($this->_var['show_site_titile'] == 1): ?><?php 
$k = array (
  'name' => 'app_conf',
  'value' => 'SHOP_SEO_TITLE',
);
echo $k['name']($k['value']);
?> - <?php endif; ?><?php echo $this->_var['site_info']['SHOP_TITLE']; ?></title>
<link rel="icon" href="favicon.ico" type="/image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="/image/x-icon" />
<meta name="keywords" content="<?php if ($this->_var['page_keyword']): ?><?php echo $this->_var['page_keyword']; ?><?php endif; ?><?php echo $this->_var['site_info']['SHOP_KEYWORD']; ?>" />
<meta name="description" content="<?php if ($this->_var['page_description']): ?><?php echo $this->_var['page_description']; ?><?php endif; ?><?php echo $this->_var['site_info']['SHOP_DESCRIPTION']; ?>" />
<?php
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/style.css";
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/weebox.css";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/jquery.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/jquery.bgiframe.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/jquery.weebox.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/jquery.pngfix.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/lazyload.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/script.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/op.js";
$this->_var['cpagejs'][] = $this->_var['TMPL_REAL']."/js/script.js";
$this->_var['cpagejs'][] = $this->_var['TMPL_REAL']."/js/op.js";
if(app_conf("APP_MSG_SENDER_OPEN")==1)
{
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/msg_sender.js";
$this->_var['cpagejs'][] = $this->_var['TMPL_REAL']."/js/msg_sender.js";
}
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/main.css";
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/user_login_reg.css";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['pagecss'],
);
echo $k['name']($k['v']);
?>" />

<script type="text/javascript">
var APP_ROOT = '<?php echo $this->_var['APP_ROOT']; ?>';;
var LOADER_IMG = '<?php echo $this->_var['TMPL']; ?>/images/lazy_loading.gif';
var ERROR_IMG = '<?php echo $this->_var['TMPL']; ?>/images/image_err.gif';
<?php if (app_conf ( "APP_MSG_SENDER_OPEN" ) == 1): ?>
var send_span = <?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SEND_SPAN',
);
echo $k['name']($k['v']);
?>000;
<?php endif; ?>
</script>
<script type="text/javascript" src="<?php echo $this->_var['APP_ROOT']; ?>/public/runtime/app/lang.js"></script>
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['pagejs'],
  'c' => $this->_var['cpagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>

</head>
<body class="register_body">
	<div class="header" id="header">
		<div class="wrap constr">
			<div class="wrap clearfix">
				<div class="logo f_l">
				<a class="link" href="<?php echo $this->_var['APP_ROOT']; ?>/">
					<?php
						$this->_var['logo_image'] = app_conf("SHOP_LOGO");
					?>
					<?php 
$k = array (
  'name' => 'load_page_png',
  'v' => $this->_var['logo_image'],
);
echo $k['name']($k['v']);
?>
				</a>
				</div>
				<div class="f_r">
					<span id="user_head_tip" class="pr">
					<?php 
$k = array (
  'name' => 'load_user_tip',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>
					<span class="li"><a href="<?php
echo parse_url_tag("u:index|helpcenter|"."".""); 
?>">帮助</a></span>
					<span class="li"><a href="./">首页</a></span>
					</span>
				</div>		
			</div><!--end wrap-->
			<div class="hd-tel">客服电话：<span><?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SHOP_TEL',
);
echo $k['name']($k['v']);
?></span></div>
		</div>
	</div>
	<div class="blank"></div>
	<div class="inc wb wrap register_box">
		<div class="hd_tip"><?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SHOP_TITLE',
);
echo $k['name']($k['v']);
?>为有自己需求和理财需求的个人搭建了一个公平、透明、稳定、高效的网络互动平台。</div>
		<div class="bdd">
			<div class="user_inc_top">注册<?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SHOP_TITLE',
);
echo $k['name']($k['v']);
?></div>
			<div class="inc_main clearfix">
				<div class="user-lr-box-left f_l" style="width:590px">
					<div class="user_inc_tip mb15 pb15">用户可以在网站上获得信用评级、发布借款请求满足个人的资金需要;也可以把自己的闲余资金通过网站出借
给信用良好有资金需求的个人，在获得良好的资金回报率的同时帮助了他人。</div>
									<!--注册表单-->
									<form action="<?php
echo parse_url_tag("u:shop|user#doregister|"."".""); 
?>" method="post" id="signup-user-form">
									<div class="field email pr">
										<label for="signup-email-address"><span class="f_red">*</span> <?php echo $this->_var['LANG']['USER_TITLE_EMAIL']; ?></label>
										<input type="text" value="" class="f-input ipttxt" id="signup-email-address" name="email" size="30">
										<span class="f-input-tip"></span> 
										<span class="hint"><?php echo $this->_var['LANG']['USER_TITLE_EMAIL_TIP']; ?></span> 
									</div>
									<div class="blank1"></div>
									<div class="field username pr">
										<label for="signup-username"><span class="f_red">*</span> <?php echo $this->_var['LANG']['USER_TITLE_USER_NAME']; ?></label>
										<input type="text" value="<?php echo $this->_var['reg_name']; ?>" class="f-input ipttxt" id="signup-username" name="user_name" size="30">
										<span class="f-input-tip"></span> 
										<span class="hint"><?php echo $this->_var['LANG']['USER_TITLE_USER_NAME_TIP']; ?></span> 
									</div>
									<div class="blank1"></div>
									<div class="field password pr">
										<label for="signup-password"><span class="f_red">*</span> <?php echo $this->_var['LANG']['USER_TITLE_USER_PWD']; ?></label>
										<input type="password" class="f-input ipttxt" id="signup-password" name="user_pwd" size="30">
										<span class="f-input-tip"></span> 
										<span class="hint"><?php echo $this->_var['LANG']['USER_TITLE_USER_PWD_TIP']; ?></span> 
									</div>
									<div class="blank1"></div>
									<div class="field password pr">
										<label for="signup-password-confirm"><span class="f_red">*</span> <?php echo $this->_var['LANG']['USER_TITLE_USER_CONFIRM_PWD']; ?></label>
										<input type="password" class="f-input ipttxt" id="signup-password-confirm" name="user_pwd_confirm" size="30">
										<span class="f-input-tip"></span>
										<span class="hint">请再次填写密码</span>
									</div>
									<div class="blank1"></div>
									<div class="field mobile pr">
										<label for="signup-mobile"><?php if (app_conf ( "MOBILE_MUST" ) == 1): ?><span class="f_red">*</span><?php endif; ?> <?php echo $this->_var['LANG']['USER_TITLE_MOBILE']; ?></label>
										<input type="text" value="" class="f-input ipttxt" id="settings-mobile" name="mobile" size="30">
										<span class="f-input-tip"></span> 
										<span class="hint"> <?php echo $this->_var['LANG']['USER_TITLE_MOBILE_TIP']; ?></span>
									</div>			
									<div class="blank1"></div>
									
									
									<?php $_from = $this->_var['field_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field_item');if (count($_from)):
    foreach ($_from AS $this->_var['field_item']):
?>
									<div class="field pr">
										<label id="<?php echo $this->_var['field_item']['field_name']; ?>_label"><?php echo $this->_var['field_item']['field_show_name']; ?></label>
										<?php if ($this->_var['field_item']['input_type'] == 0): ?>
										<input type="text" value="" class="f-input ipttxt" id="settings-<?php echo $this->_var['field_item']['field_name']; ?>" name="<?php echo $this->_var['field_item']['field_name']; ?>" size="30">
										<?php endif; ?>
										
										<?php if ($this->_var['field_item']['input_type'] == 1): ?>
										<select id="settings-<?php echo $this->_var['field_item']['field_name']; ?>" name="<?php echo $this->_var['field_item']['field_name']; ?>">
											<?php $_from = $this->_var['field_item']['value_scope']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value_item');if (count($_from)):
    foreach ($_from AS $this->_var['value_item']):
?>
											<option value="<?php echo $this->_var['value_item']; ?>"><?php echo $this->_var['value_item']; ?></option>
											<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
										</select>
										<?php endif; ?>
										<span class="f-input-tip">&nbsp;</span>
										<span class="hint">&nbsp;</span>
									</div>
									<div class="blank1"></div>
									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									<?php if (app_conf ( "VERIFY_IMAGE" ) == 1): ?>
									<div class="field pr">
										<div class="verify_row">
										<label>&nbsp;</label>								
										<input type="text" value="" class="f-input" name="verify" />	
										<img src="<?php echo $this->_var['APP_ROOT']; ?>/verify.php?rand=<?php 
$k = array (
  'name' => 'rand',
);
echo $k['name']();
?>" onclick="this.src='<?php echo $this->_var['APP_ROOT']; ?>/verify.php?rand='+ Math.random();" title="看不清楚？换一张" />			
										</div>
									</div>
									<?php endif; ?>
									
									<div class="blank"></div>
									
									<div class="act">
										<input type="submit" class="reg-submit-btn" id="signup-submit" name="commit" value="<?php echo $this->_var['LANG']['REGISTER']; ?>">				
									</div>
								</form>
					</div>
					<div class="user-lr-box-right f_r">
						<div class="has_account f_dgray tc dot pb15 f12">已有帐号？<a href="<?php
echo parse_url_tag("u:index|user#login|"."".""); 
?>">直接登录</a></div>
						<div class="app_login_box">
						<div class="blank10"></div>
						<?php 
$k = array (
  'name' => 'get_app_login',
  'v' => '1',
  'r' => '1',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>
						</div>
					</div>
				</div>		
				<div class="inc_foot"></div>
			</div>
		</div>



<script type="text/javascript">

$(document).ready(function(){

	$("#signup-submit").click(function(){
		if($.trim($("#signup-email-address").val()).length == 0)
		{
			$("#signup-email-address").focus();
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_EMAIL'],
);
echo $k['name']($k['format'],$k['value']);
?>");
			
			return false;
		}
		
		if(!$.checkEmail($("#signup-email-address").val()))
		{
			$("#signup-email-address").focus();			
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['FORMAT_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_EMAIL'],
);
echo $k['name']($k['format'],$k['value']);
?>");
			return false;
		}
		
		if(!$.minLength($("#signup-username").val(),3,true))
		{
			$("#signup-username").focus();
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['FORMAT_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_USER_NAME'],
);
echo $k['name']($k['format'],$k['value']);
?>");		
			return false;
		}
		
		if(!$.maxLength($("#signup-username").val(),16,true))
		{
			$("#signup-username").focus();
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['FORMAT_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_USER_NAME'],
);
echo $k['name']($k['format'],$k['value']);
?>");			
			return false;
		}
		
		if(!$.minLength($("#signup-password").val(),4,false))
		{
			$("#signup-password").focus();
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['FORMAT_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_USER_PWD'],
);
echo $k['name']($k['format'],$k['value']);
?>");	
			return false;
		}
		
		if($("#signup-password-confirm").val() != $("#signup-password").val())
		{
			$("#signup-password-confirm").focus();
			$.showErr("<?php echo $this->_var['LANG']['USER_PWD_CONFIRM_ERROR']; ?>");			
			return false;
		}

		if(!$.checkMobilePhone($("#settings-mobile").val()))
		{
			$("#settings-mobile").focus();			
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['FORMAT_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_MOBILE'],
);
echo $k['name']($k['format'],$k['value']);
?>");	
			return false;
		}	

		<?php if (app_conf ( "MOBILE_MUST" ) == 1): ?>
			if($.trim($("#settings-mobile").val()).length == 0)
			{
				$("#settings-mobile").focus();
				$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_MOBILE'],
);
echo $k['name']($k['format'],$k['value']);
?>");
				
				return false;
			}
		<?php endif; ?>
		

		<?php $_from = $this->_var['field_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field_item');if (count($_from)):
    foreach ($_from AS $this->_var['field_item']):
?>
			<?php if ($this->_var['field_item']['is_must'] == 1): ?>
			if($("#settings-<?php echo $this->_var['field_item']['field_name']; ?>").val()=='')
			{
				$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['field_item']['field_show_name'],
);
echo $k['name']($k['format'],$k['value']);
?>");	
				$("#settings-<?php echo $this->_var['field_item']['field_name']; ?>").focus();
				return false;
			}
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

		
	});
	
	
	//开始绑定 
	$("#signup-email-address").bind("blur",function(){
		if($.trim($("#signup-email-address").val()).length == 0)
		{
			formError($("#signup-email-address"),"<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_EMAIL'],
);
echo $k['name']($k['format'],$k['value']);
?>");			
			return false;
		}
		
		if(!$.checkEmail($("#signup-email-address").val()))
		{
			formError($("#signup-email-address"),"<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['FORMAT_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_EMAIL'],
);
echo $k['name']($k['format'],$k['value']);
?>");
			return false;
		}	
		
		var ajaxurl = APP_ROOT+"/index.php?ctl=ajax&act=check_field";
		var query = new Object();
		query.field_name = "email";
		query.field_data = $.trim($(this).val());
		$.ajax({ 
			url: ajaxurl,
			data:query,
			type: "POST",
			dataType: "json",
			success: function(data){
				if(data.status==1)
				{
					formSuccess($("#signup-email-address"),"<?php echo $this->_var['LANG']['CAN_USED']; ?>");
					return false;
				}
				else
				{
					formError($("#signup-email-address"),data.info);
					return false;
				}
			}
		});	
	}); //邮箱验证
	
	
	
	$("#signup-username").bind("blur",function(){
		if(!$.minLength($("#signup-username").val(),3,true))
		{
			formError($("#signup-username"),"<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['FORMAT_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_USER_NAME'],
);
echo $k['name']($k['format'],$k['value']);
?>");		
			return false;
		}
		
		if(!$.maxLength($("#signup-username").val(),16,true))
		{
			formError($("#signup-username"),"<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['FORMAT_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_USER_NAME'],
);
echo $k['name']($k['format'],$k['value']);
?>");			
			return false;
		}	
		
		var ajaxurl = APP_ROOT+"/index.php?ctl=ajax&act=check_field";
		var query = new Object();
		query.field_name = "user_name";
		query.field_data = $.trim($(this).val());
		$.ajax({ 
			url: ajaxurl,
			data:query,
			type: "POST",
			dataType: "json",
			success: function(data){
				if(data.status==1)
				{
					formSuccess($("#signup-username"),"<?php echo $this->_var['LANG']['CAN_USED']; ?>");
					return false;
				}
				else
				{
					formError($("#signup-username"),data.info);
					return false;
				}
			}
		});	
	}); //用户名验证
	
	
	$("#signup-password").bind("blur",function(){
		if(!$.minLength($("#signup-password").val(),4,false))
		{
			formError($("#signup-password"),"<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['FORMAT_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_USER_PWD'],
);
echo $k['name']($k['format'],$k['value']);
?>");	
			return false;
		}
		formSuccess($("#signup-password"),"<?php echo $this->_var['LANG']['CAN_USED']; ?>");
	}); //密码验证
	
	$("#signup-password-confirm").bind("blur",function(){
		if($("#signup-password-confirm").val() != $("#signup-password").val())
		{
			formError($("#signup-password-confirm"),"<?php echo $this->_var['LANG']['USER_PWD_CONFIRM_ERROR']; ?>");			
			return false;
		}
		formSuccess($("#signup-password-confirm"),"<?php echo $this->_var['LANG']['VERIFY_SUCCESS']; ?>");
	}); //确认密码验证
	
	$("#settings-mobile").bind("blur",function(){
		if(!$.checkMobilePhone($("#settings-mobile").val()))
		{
			formError($("#settings-mobile"),"<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['FORMAT_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_MOBILE'],
);
echo $k['name']($k['format'],$k['value']);
?>");	
			return false;
		}	

		<?php if (app_conf ( "MOBILE_MUST" ) == 1): ?>
			if($.trim($("#settings-mobile").val()).length == 0)
			{				
				formError($("#settings-mobile"),"<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_MOBILE'],
);
echo $k['name']($k['format'],$k['value']);
?>");
				return false;
			}
		<?php endif; ?>
		
		var ajaxurl = APP_ROOT+"/index.php?ctl=ajax&act=check_field";
		var query = new Object();
		query.field_name = "mobile";
		query.field_data = $.trim($(this).val());
		$.ajax({ 
			url: ajaxurl,
			data:query,
			type: "POST",
			dataType: "json",
			success: function(data){
				if(data.status==1)
				{
					if(query.field_data!='')
					formSuccess($("#settings-mobile"),"<?php echo $this->_var['LANG']['CAN_USED']; ?>");
					else
					formSuccess($("#settings-mobile"),"");
					return false;
				}
				else
				{					
					formError($("#settings-mobile"),data.info);
					return false;
				}
			}
		});	
	}); //手机验证
	
	
	
	<?php $_from = $this->_var['field_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field_item');if (count($_from)):
    foreach ($_from AS $this->_var['field_item']):
?>
			<?php if ($this->_var['field_item']['is_must'] == 1): ?>			
			$("#settings-<?php echo $this->_var['field_item']['field_name']; ?>").bind("blur",function(){
				if($("#settings-<?php echo $this->_var['field_item']['field_name']; ?>").val()=='')
				{
					formError($("#settings-<?php echo $this->_var['field_item']['field_name']; ?>"),"<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['field_item']['field_show_name'],
);
echo $k['name']($k['format'],$k['value']);
?>");	
					return false;
				}
				formSuccess($("#settings-<?php echo $this->_var['field_item']['field_name']; ?>"),"");
			}); //扩展字段		
			<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
});
</script>
</div>
<div class="blank"></div>
	<div class="wrap clearfix">
	 	<div class="copyright clearfix tc" style="padding:8px ;background:#f7f7f7; color:#757575">
			<?php 
$k = array (
  'name' => 'app_conf',
  'value' => 'SHOP_FOOTER',
);
echo $k['name']($k['value']);
?> 
        </div>
	</div>
</body>
</html>