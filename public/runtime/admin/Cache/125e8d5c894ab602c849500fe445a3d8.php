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

<script type="text/javascript" src="__TMPL__Common/js/jquery.bgiframe.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.weebox.js"></script>
<link rel="stylesheet" type="text/css" href="__TMPL__Common/style/weebox.css" />

<script type="text/javascript">
	function show_detail(id)
	{
		$.weeboxs.open(ROOT+'?m=Deal&a=show_detail&id='+id, {contentType:'ajax',showButton:false,title:LANG['COUNT_TOTAL_DEAL'],width:600,height:330});
	}
	function preview(id)
	{
		window.open("__ROOT__/index.php?ctl=deal&id="+id+"&preview=1");
	}
</script>
<?php function a_get_deal_type($type,$id)
	{
		$deal = M("Deal")->getById($id);
		if($deal['is_coupon'])
		return l("COUNT_TYPE_".$deal['deal_type']);
		else
		return l("NO_DEAL_COUPON_GEN");
		
	}
	
	function a_get_buy_status($buy_status,$deal_id)
	{
		if($buy_status==2){
			return "<span style='color:red'>".l("DEAL_STATUS_".$buy_status)."</span>";
		}
		else{
			return l("DEAL_STATUS_".$buy_status);
		}
	}
	function get_buy_type_title($buy_type)
	{
		return l("DEAL_BUY_TYPE_".$buy_type);
	} ?>
<div class="main">
<div class="main_title"><?php echo ($main_title); ?></div>
<div class="blank5"></div>
<div class="button_row">
	<input type="button" class="button" value="<?php echo L("ADD");?>" onclick="add();" />
	<input type="button" class="button" value="<?php echo L("DEL");?>" onclick="del();" />
</div>
<div class="blank5"></div>
<div class="search_row">
	<form name="search" action="__APP__" method="get">	
		<?php echo L("DEAL_NAME");?>：<input type="text" class="textbox" name="name" value="<?php echo trim($_REQUEST['name']);?>" />
		
		<?php echo L("CATE_TREE");?>：
		<select name="cate_id">
			<option value="0" <?php if(intval($_REQUEST['cate_id']) == 0): ?>selected="selected"<?php endif; ?>><?php echo L("NO_SELECT_CATE");?></option>
			<?php if(is_array($cate_tree)): foreach($cate_tree as $key=>$cate_item): ?><option value="<?php echo ($cate_item["id"]); ?>" <?php if(intval($_REQUEST['cate_id']) == $cate_item['id']): ?>selected="selected"<?php endif; ?>><?php echo ($cate_item["title_show"]); ?></option><?php endforeach; endif; ?>
		</select>
		贷款人：
		<input type="text" class="textbox" name="user_name" value="<?php echo trim($_REQUEST['user_name']);?>" size="10" />
		贷款状态
		<select name="deal_status">
			<option value="all" <?php if($_REQUEST['deal_status'] == 'all' || trim($_REQUEST['deal_status']) == ''): ?>selected="selected"<?php endif; ?>>所有状态</option>
			<option value="0" <?php if($_REQUEST['deal_status'] != 'all' && trim($_REQUEST['deal_status']) != '' && intval($_REQUEST['deal_status']) == 0): ?>selected="selected"<?php endif; ?>><?php echo L("DEAL_STATUS_0");?></option>
			<option value="1" <?php if(intval($_REQUEST['deal_status']) == 1): ?>selected="selected"<?php endif; ?>><?php echo L("DEAL_STATUS_1");?></option>
			<option value="2" <?php if(intval($_REQUEST['deal_status']) == 2): ?>selected="selected"<?php endif; ?>><?php echo L("DEAL_STATUS_2");?></option>
			<option value="3" <?php if(intval($_REQUEST['deal_status']) == 3): ?>selected="selected"<?php endif; ?>><?php echo L("DEAL_STATUS_3");?></option>
			<option value="4" <?php if(intval($_REQUEST['deal_status']) == 4): ?>selected="selected"<?php endif; ?>><?php echo L("DEAL_STATUS_4");?></option>
			<option value="5" <?php if(intval($_REQUEST['deal_status']) == 5): ?>selected="selected"<?php endif; ?>><?php echo L("DEAL_STATUS_5");?></option>
		</select>
		<input type="hidden" value="Deal" name="m" />
		<input type="hidden" value="index" name="a" />
		<input type="submit" class="button" value="<?php echo L("SEARCH");?>" />
	</form>
</div>
<div class="blank5"></div>
<!-- Think 系统列表组件开始 -->
<table id="dataTable" class="dataTable" cellpadding=0 cellspacing=0 ><tr><td colspan="11" class="topTd" >&nbsp; </td></tr><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('dataTable')"></th><th width="50px   "><a href="javascript:sortBy('id','<?php echo ($sort); ?>','Deal','index')" title="按照<?php echo L("ID");?><?php echo ($sortType); ?> "><?php echo L("ID");?><?php if(($order)  ==  "id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('name','<?php echo ($sort); ?>','Deal','index')" title="按照<?php echo L("DEAL_NAME");?><?php echo ($sortType); ?> "><?php echo L("DEAL_NAME");?><?php if(($order)  ==  "name"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('cate_id','<?php echo ($sort); ?>','Deal','index')" title="按照<?php echo L("DEAL_CATE");?>   <?php echo ($sortType); ?> "><?php echo L("DEAL_CATE");?>   <?php if(($order)  ==  "cate_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('type_id','<?php echo ($sort); ?>','Deal','index')" title="按照<?php echo L("TYPE_TREE");?>   <?php echo ($sortType); ?> "><?php echo L("TYPE_TREE");?>   <?php if(($order)  ==  "type_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('user_id','<?php echo ($sort); ?>','Deal','index')" title="按照借款人   <?php echo ($sortType); ?> ">借款人   <?php if(($order)  ==  "user_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('deal_status','<?php echo ($sort); ?>','Deal','index')" title="按照<?php echo L("DEAL_STATUS");?>   <?php echo ($sortType); ?> "><?php echo L("DEAL_STATUS");?>   <?php if(($order)  ==  "deal_status"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('is_effect','<?php echo ($sort); ?>','Deal','index')" title="按照<?php echo L("IS_EFFECT");?>   <?php echo ($sortType); ?> "><?php echo L("IS_EFFECT");?>   <?php if(($order)  ==  "is_effect"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('is_recommend','<?php echo ($sort); ?>','Deal','index')" title="按照<?php echo L("IS_RECOMMEND");?>   <?php echo ($sortType); ?> "><?php echo L("IS_RECOMMEND");?>   <?php if(($order)  ==  "is_recommend"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('sort','<?php echo ($sort); ?>','Deal','index')" title="按照<?php echo L("SORT");?><?php echo ($sortType); ?> "><?php echo L("SORT");?><?php if(($order)  ==  "sort"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th style="width:160px">操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$deal): ++$i;$mod = ($i % 2 )?><tr class="row" ><td><input type="checkbox" name="key" class="key" value="<?php echo ($deal["id"]); ?>"></td><td>&nbsp;<?php echo ($deal["id"]); ?></td><td>&nbsp;<a href="javascript:edit   ('<?php echo (addslashes($deal["id"])); ?>')"><?php echo (msubstr($deal["name"])); ?></a></td><td>&nbsp;<?php echo (get_deal_cate_name($deal["cate_id"])); ?></td><td>&nbsp;<?php echo (get_loan_type_name($deal["type_id"])); ?></td><td>&nbsp;<?php echo (get_user_name($deal["user_id"])); ?></td><td>&nbsp;<?php echo (a_get_buy_status($deal["deal_status"],$deal['id'])); ?></td><td>&nbsp;<?php echo (get_is_effect($deal["is_effect"],$deal['id'])); ?></td><td>&nbsp;<?php echo (get_toogle_status($deal["is_recommend"],$deal['id'],is_recommend)); ?></td><td>&nbsp;<?php echo (get_sort($deal["sort"],$deal['id'])); ?></td><td><a href="javascript:edit('<?php echo ($deal["id"]); ?>')"><?php echo L("EDIT");?></a>&nbsp;<a href="javascript: del('<?php echo ($deal["id"]); ?>')"><?php echo L("DEL");?></a>&nbsp;<a href="javascript:show_detail('<?php echo ($deal["id"]); ?>')">投标列表</a>&nbsp;<a href="javascript: preview('<?php echo ($deal["id"]); ?>')"><?php echo L("PREVIEW");?></a>&nbsp;</td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td colspan="11" class="bottomTd"> &nbsp;</td></tr></table>
<!-- Think 系统列表组件结束 -->
 

<div class="blank5"></div>
<div class="page"><?php echo ($page); ?></div>
</div>
</body>
</html>