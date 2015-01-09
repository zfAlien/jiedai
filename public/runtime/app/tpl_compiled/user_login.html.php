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

<body class="login_body">
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
	<div class="user_login_bar clearfix">
		<div class="wrap ">
			<div class="blank"></div>
			<div class="blank5"></div>
			<div class="inc f_r">
				<div class="user_inc_top"><?php echo $this->_var['page_title']; ?><!-- <span>&nbsp;<?php echo $this->_var['LANG']['OR']; ?> <?php if ($this->_var['api_callback']): ?><a href="<?php
echo parse_url_tag("u:shop|user#api_create|"."".""); 
?>"><?php else: ?><a href="<?php
echo parse_url_tag("u:shop|user#register|"."".""); 
?>"><?php endif; ?><?php echo $this->_var['CREATE_TIP']; ?></a></span>	--></div>
				<div class="clearfix">
					<div class="user-lr-box-left f_r">
						<?php 
$k = array (
  'name' => 'load_login_form',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>
						<div class="blank10"></div>
						<div class="app_login_box">
						<?php 
$k = array (
  'name' => 'get_app_login',
  'v' => '0',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>
						</div>
					</div>
				</div>
				<div class="inc_foot"></div>
			</div>
		</div>
	</div>
	<div class="blank20"></div>
	<div class="wrap clearfix">
		<center><img src="<?php echo $this->_var['TMPL']; ?>/images/retf_tip.jpg" /></center>
		<div class="blank20"></div>
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