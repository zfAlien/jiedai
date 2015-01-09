<?php exit;?>a:3:{s:8:"template";a:1:{i:0;s:46:"D:/wamp/www/p2p/app/Tpl/red/user_register.html";}s:7:"expires";i:1403264452;s:8:"maketime";i:1403260852;}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员注册 - p2p信贷</title>
<link rel="icon" href="favicon.ico" type="/image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="/image/x-icon" />
<meta name="keywords" content="p2p信贷、贷款,借贷，网贷" />
<meta name="description" content="p2p信贷、贷款,借贷，网贷" />
<link rel="stylesheet" type="text/css" href="http://127.0.0.1/p2p/public/runtime/statics/7685eb9060c44d570bc61120476e67b9.css" />
<script type="text/javascript">
var APP_ROOT = '/p2p';;
var LOADER_IMG = 'http://127.0.0.1/p2p/app/Tpl/red/images/lazy_loading.gif';
var ERROR_IMG = 'http://127.0.0.1/p2p/app/Tpl/red/images/image_err.gif';
var send_span = 2000;
</script>
<script type="text/javascript" src="/p2p/public/runtime/app/lang.js"></script>
<script type="text/javascript" src="http://127.0.0.1/p2p/public/runtime/statics/950a19bc9060de48136de37d7c1e0f3e.js"></script>
</head>
<body class="register_body">
	<div class="header" id="header">
		<div class="wrap constr">
			<div class="wrap clearfix">
				<div class="logo f_l">
				<a class="link" href="/p2p/">
										<span style='display:inline-block; width:190px; height:72px; background:url(http://127.0.0.1/p2p/public/attachment/201011/4cdd501dc023b.png) no-repeat; _filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=http://127.0.0.1/p2p/public/attachment/201011/4cdd501dc023b.png, sizingMethod=scale);_background-image:none;'></span>				</a>
				</div>
				<div class="f_r">
					<span id="user_head_tip" class="pr">
					554fcae493e564ee0dc75bdf2ebf94caload_user_tip|YToxOntzOjQ6Im5hbWUiO3M6MTM6ImxvYWRfdXNlcl90aXAiO30=554fcae493e564ee0dc75bdf2ebf94ca					<span class="li"><a href="/p2p/index.php?ctl=helpcenter">帮助</a></span>
					<span class="li"><a href="http://127.0.0.1/p2p/">首页</a></span>
					</span>
				</div>		
			</div><!--end wrap-->
			<div class="hd-tel">客服电话：<span>400-716-1518</span></div>
		</div>
	</div>
	<div class="blank"></div>
	<div class="inc wb wrap register_box">
		<div class="hd_tip">p2p信贷为有自己需求和理财需求的个人搭建了一个公平、透明、稳定、高效的网络互动平台。</div>
		<div class="bdd">
			<div class="user_inc_top">注册p2p信贷</div>
			<div class="inc_main clearfix">
				<div class="user-lr-box-left f_l" style="width:590px">
					<div class="user_inc_tip mb15 pb15">用户可以在网站上获得信用评级、发布借款请求满足个人的资金需要;也可以把自己的闲余资金通过网站出借
给信用良好有资金需求的个人，在获得良好的资金回报率的同时帮助了他人。</div>
									<!--注册表单-->
									<form action="/p2p/index.php?ctl=user&act=doregister" method="post" id="signup-user-form">
									<div class="field email pr">
										<label for="signup-email-address"><span class="f_red">*</span> Email</label>
										<input type="text" value="" class="f-input ipttxt" id="signup-email-address" name="email" size="30">
										<span class="f-input-tip"></span> 
										<span class="hint">登录及找回密码用，不会公开</span> 
									</div>
									<div class="blank1"></div>
									<div class="field username pr">
										<label for="signup-username"><span class="f_red">*</span> 帐号</label>
										<input type="text" value="" class="f-input ipttxt" id="signup-username" name="user_name" size="30">
										<span class="f-input-tip"></span> 
										<span class="hint">3-15个字符，一个汉字为两个字符</span> 
									</div>
									<div class="blank1"></div>
									<div class="field password pr">
										<label for="signup-password"><span class="f_red">*</span> 密码</label>
										<input type="password" class="f-input ipttxt" id="signup-password" name="user_pwd" size="30">
										<span class="f-input-tip"></span> 
										<span class="hint">最少 4 个字符 </span> 
									</div>
									<div class="blank1"></div>
									<div class="field password pr">
										<label for="signup-password-confirm"><span class="f_red">*</span> 确认密码</label>
										<input type="password" class="f-input ipttxt" id="signup-password-confirm" name="user_pwd_confirm" size="30">
										<span class="f-input-tip"></span>
										<span class="hint">请再次填写密码</span>
									</div>
									<div class="blank1"></div>
									<div class="field mobile pr">
										<label for="signup-mobile"> 手机号码</label>
										<input type="text" value="" class="f-input ipttxt" id="settings-mobile" name="mobile" size="30">
										<span class="f-input-tip"></span> 
										<span class="hint"> 投标信息将通过短信发到手机上</span>
									</div>			
									<div class="blank1"></div>
									
									
																		<div class="field pr">
										<label id="weibo_label">腾讯微博</label>
																				<input type="text" value="" class="f-input ipttxt" id="settings-weibo" name="weibo" size="30">
																				
																				<span class="f-input-tip">&nbsp;</span>
										<span class="hint">&nbsp;</span>
									</div>
									<div class="blank1"></div>
																											
									<div class="blank"></div>
									
									<div class="act">
										<input type="submit" class="reg-submit-btn" id="signup-submit" name="commit" value="注册">				
									</div>
								</form>
					</div>
					<div class="user-lr-box-right f_r">
						<div class="has_account f_dgray tc dot pb15 f12">已有帐号？<a href="/p2p/index.php?ctl=user&act=login">直接登录</a></div>
						<div class="app_login_box">
						<div class="blank10"></div>
						554fcae493e564ee0dc75bdf2ebf94caget_app_login|YTozOntzOjQ6Im5hbWUiO3M6MTM6ImdldF9hcHBfbG9naW4iO3M6MToidiI7czoxOiIxIjtzOjE6InIiO3M6MToiMSI7fQ==554fcae493e564ee0dc75bdf2ebf94ca						</div>
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
			$.showErr("Email不能为空");
			
			return false;
		}
		
		if(!$.checkEmail($("#signup-email-address").val()))
		{
			$("#signup-email-address").focus();			
			$.showErr("Email格式错误，请重新输入");
			return false;
		}
		
		if(!$.minLength($("#signup-username").val(),3,true))
		{
			$("#signup-username").focus();
			$.showErr("帐号格式错误，请重新输入");		
			return false;
		}
		
		if(!$.maxLength($("#signup-username").val(),16,true))
		{
			$("#signup-username").focus();
			$.showErr("帐号格式错误，请重新输入");			
			return false;
		}
		
		if(!$.minLength($("#signup-password").val(),4,false))
		{
			$("#signup-password").focus();
			$.showErr("密码格式错误，请重新输入");	
			return false;
		}
		
		if($("#signup-password-confirm").val() != $("#signup-password").val())
		{
			$("#signup-password-confirm").focus();
			$.showErr("密码确认失败");			
			return false;
		}
		if(!$.checkMobilePhone($("#settings-mobile").val()))
		{
			$("#settings-mobile").focus();			
			$.showErr("手机号码格式错误，请重新输入");	
			return false;
		}	
				
							
		
	});
	
	
	//开始绑定 
	$("#signup-email-address").bind("blur",function(){
		if($.trim($("#signup-email-address").val()).length == 0)
		{
			formError($("#signup-email-address"),"Email不能为空");			
			return false;
		}
		
		if(!$.checkEmail($("#signup-email-address").val()))
		{
			formError($("#signup-email-address"),"Email格式错误，请重新输入");
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
					formSuccess($("#signup-email-address"),"可以使用");
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
			formError($("#signup-username"),"帐号格式错误，请重新输入");		
			return false;
		}
		
		if(!$.maxLength($("#signup-username").val(),16,true))
		{
			formError($("#signup-username"),"帐号格式错误，请重新输入");			
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
					formSuccess($("#signup-username"),"可以使用");
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
			formError($("#signup-password"),"密码格式错误，请重新输入");	
			return false;
		}
		formSuccess($("#signup-password"),"可以使用");
	}); //密码验证
	
	$("#signup-password-confirm").bind("blur",function(){
		if($("#signup-password-confirm").val() != $("#signup-password").val())
		{
			formError($("#signup-password-confirm"),"密码确认失败");			
			return false;
		}
		formSuccess($("#signup-password-confirm"),"验证正确");
	}); //确认密码验证
	
	$("#settings-mobile").bind("blur",function(){
		if(!$.checkMobilePhone($("#settings-mobile").val()))
		{
			formError($("#settings-mobile"),"手机号码格式错误，请重新输入");	
			return false;
		}	
				
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
					formSuccess($("#settings-mobile"),"可以使用");
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
	
	
	
					});
</script>
</div>
<div class="blank"></div>
	<div class="wrap clearfix">
	 	<div class="copyright clearfix tc" style="padding:8px ;background:#f7f7f7; color:#757575">
			<center>&nbsp;</center> 
        </div>
	</div>
</body>
</html>