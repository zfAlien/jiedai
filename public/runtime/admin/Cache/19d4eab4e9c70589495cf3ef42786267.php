<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="__TMPL__Common/style/style.css" />
<script type="text/javascript">
 	var VAR_MODULE = "<?php echo conf("VAR_MODULE");?>";
	var VAR_ACTION = "<?php echo conf("VAR_ACTION");?>";
	var MODULE_NAME	=	'<?php echo MODULE_NAME; ?>';
	var ACTION_NAME	=	'<?php echo ACTION_NAME; ?>';
	var ROOT = '__APP__';
	var ROOT_PATH = '<?php echo APP_ROOT; ?>';
	var CURRENT_URL = '<?php echo trim($_SERVER['REQUEST_URI']);?>';
	var INPUT_KEY_PLEASE = "<?php echo L("INPUT_KEY_PLEASE");?>";
	var TMPL = '__TMPL__';
	var APP_ROOT = '<?php echo APP_ROOT; ?>';
</script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.timer.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/script.js"></script>
<script type="text/javascript" src="__ROOT__/public/runtime/admin/lang.js"></script>
<script type='text/javascript'  src='__ROOT__/admin/public/kindeditor/kindeditor.js'></script>
</head>
<body>
<div id="info"></div>

<script type="text/javascript">
	$(document).ready(function(){
		$("select[name='name']").bind("change",function(){
			load_tpl($("select[name='name']").val());
		});
		load_tpl($("select[name='name']").val());
	});
	function load_tpl(tpl_name)
	{
		if(tpl_name != '')
		{
			$.ajax({ 
					url: ROOT+"?"+VAR_MODULE+"="+MODULE_NAME+"&"+VAR_ACTION+"=load_tpl&name="+tpl_name, 
					data: "ajax=1",
					dataType: "json",
					success: function(obj){						
						if(obj.status==1)
						{
							var tpl = obj.data;
							if(tpl.type == 1)
							{
								$("#html_row").show();
								$("select[name='is_html']").val(tpl.is_html);	
							}
							else
							{
								hide_html_row();
							}
							$("textarea[name='content']").val(tpl.content);
							$("input[name='id']").val(tpl.id);
							if(tpl.tip)
							{
								$("#content_tip").find("td").html(tpl.tip);
								$("#content_tip").show();
							}
							
						}
						else
						{
							$("textarea[name='content']").val('');
							$("input[name='id']").val(0);
							hide_html_row();
						}
					}
			});
		}
		else
		{
			$("textarea[name='content']").val('');
			$("input[name='id']").val(0);
			$("#content_tip").hide();
			hide_html_row();
		}
	}
	function hide_html_row()
	{
		$("#html_row").hide();
		$("select[name='is_html']").val(0);		
		$("#content_tip").hide();
	}
</script>
<div class="main">
<div class="main_title"><?php echo ($main_title); ?></div>
<div class="blank5"></div>
<form name="edit" action="__APP__" method="post" enctype="multipart/form-data">
<table class="form" cellpadding=0 cellspacing=0>
	<tr>
		<td colspan=2 class="topTd"></td>
	</tr>
	<tr>
		<td class="item_title"><?php echo L("MSG_TPL_NAME");?>:</td>
		<td class="item_input">
			<select name="name">
				<option value=""><?php echo L("SELECT_MSG_TPL");?></option>
				<?php if(is_array($tpl_list)): foreach($tpl_list as $key=>$tpl_item): ?><option value="<?php echo ($tpl_item["name"]); ?>"><?php echo l("LANG_".$tpl_item['name']);?></option><?php endforeach; endif; ?>
			</select>
		</td>
	</tr>
	<tr id="html_row">
		<td class="item_title"><?php echo L("IS_HTML");?>:</td>
		<td class="item_input">
			<select name="is_html">
				<option value="0"><?php echo L("IS_HTML_0");?></option>
				<option value="1"><?php echo L("IS_HTML_1");?></option>
			</select>
		</td>
	</tr>
	
	<tr>
		<td class="item_title"><?php echo L("CONTENT");?>:</td>
		<td class="item_input">
			<textarea class="textarea" name="content" style="width:600px; height:250px;" ></textarea>
		</td>
	</tr>
	<tr id="content_tip">
		<td colspan="2">
			
		</td>
	</tr>
	<tr>
		<td class="item_title"></td>
		<td class="item_input">
			<!--隐藏元素-->
			<input type="hidden" value="0" name="id" />
			<input type="hidden" name="<?php echo conf("VAR_MODULE");?>" value="MsgTemplate" />
			<input type="hidden" name="<?php echo conf("VAR_ACTION");?>" value="update" />
			<!--隐藏元素-->
			<input type="submit" class="button" value="<?php echo L("EDIT");?>" />
			<input type="reset" class="button" value="<?php echo L("RESET");?>" />
		</td>
	</tr>
	<tr>
		<td colspan=2 class="bottomTd"></td>
	</tr>
</table>
</form>
</div>
</body>
</html>