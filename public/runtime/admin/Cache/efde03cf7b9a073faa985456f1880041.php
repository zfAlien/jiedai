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

<?php function get_pay_incharge_link($id)
{
	if(M("DealOrder")->where("id=".$id)->getField("pay_status")!=2)
	{
		return "<a href='javascript:void(0);' onclick='pay_incharge(".$id.");'>".l("ORDER_PAID_INCHARGE")."</a>";
	}
}
function get_baofoo_query_link($id,$pid)
{
	if($GLOBALS['db']->getOneCached("SELECT `class_name` FROM ".DB_PREFIX."payment WHERE id=".$pid)=="Baofoo"){
		$payment_notice_id = $GLOBALS['db']->getOne("SELECT id FROM ".DB_PREFIX."payment_notice WHERE order_id=".$id);
		return '<a href="javascript:checkBaofooOrder('.$payment_notice_id.');">查询</a>';
	}
} ?>
<script type="text/javascript">
	function pay_incharge(id)
	{
		if(confirm("<?php echo L("CONFIRM_PAY_INCHARGE");?>"))
		location.href = ROOT+"?"+VAR_MODULE+"=DealOrder&"+VAR_ACTION+"=pay_incharge&id="+id;
	}
	function checkBaofooOrder(id){
		$.ajax({
			url:ROOT_PATH + "/baofoo_query.php?id="+id,
			dataType:"json",
			cache : true,
			success:function(result){
				if(result.status ==  1){
					if (result.SuccTime!="") {
						var msg = "订单号：" + result.TransID + "\n";
						msg += "金额：" + result.factMoney + "\n";
						msg += "交易时间：" + result.SuccTime + "\n";
						msg += "交易状态：" + result.CheckResult;
						alert(msg);
					}
					else{
						alert("查询失败或未支付的订单");
					}
				}
				else{
					alert("查询失败");
				}
			}
		});
	}
</script>
<div class="main">
<div class="main_title"><?php echo L("INCHARGE_ORDER");?></div>
<div class="blank5"></div>
<div class="button_row">
	<input type="button" class="button" value="<?php echo L("DEL");?>" onclick="del();" />
</div>
<div class="blank5"></div>
<div class="search_row">
	<form name="search" action="__APP__" method="get">	
		<?php echo L("ORDER_SN");?>：<input type="text" class="textbox" name="order_sn" value="<?php echo trim($_REQUEST['order_sn']);?>" />
		<?php echo L("USER_NAME");?>：<input type="text" class="textbox" name="user_name" value="<?php echo trim($_REQUEST['user_name']);?>" />
		<input type="hidden" value="DealOrder" name="m" />
		<input type="hidden" value="incharge_index" name="a" />
		<input type="submit" class="button" value="<?php echo L("SEARCH");?>" />
	</form>
</div>
<div class="blank5"></div>
<!-- Think 系统列表组件开始 -->
<table id="dataTable" class="dataTable" cellpadding=0 cellspacing=0 ><tr><td colspan="10" class="topTd" >&nbsp; </td></tr><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('dataTable')"></th><th width="50px"><a href="javascript:sortBy('id','<?php echo ($sort); ?>','DealOrder','incharge_index')" title="按照<?php echo L("ID");?><?php echo ($sortType); ?> "><?php echo L("ID");?><?php if(($order)  ==  "id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('order_sn','<?php echo ($sort); ?>','DealOrder','incharge_index')" title="按照<?php echo L("ORDER_SN");?><?php echo ($sortType); ?> "><?php echo L("ORDER_SN");?><?php if(($order)  ==  "order_sn"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('user_id','<?php echo ($sort); ?>','DealOrder','incharge_index')" title="按照<?php echo L("USER_NAME");?><?php echo ($sortType); ?> "><?php echo L("USER_NAME");?><?php if(($order)  ==  "user_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('deal_total_price','<?php echo ($sort); ?>','DealOrder','incharge_index')" title="按照<?php echo L("INCHARGE_AMOUNT");?><?php echo ($sortType); ?> "><?php echo L("INCHARGE_AMOUNT");?><?php if(($order)  ==  "deal_total_price"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('total_price','<?php echo ($sort); ?>','DealOrder','incharge_index')" title="按照<?php echo L("PAY_AMOUNT");?><?php echo ($sortType); ?> "><?php echo L("PAY_AMOUNT");?><?php if(($order)  ==  "total_price"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('payment_id','<?php echo ($sort); ?>','DealOrder','incharge_index')" title="按照<?php echo L("PAYMENT_TYPE");?><?php echo ($sortType); ?> "><?php echo L("PAYMENT_TYPE");?><?php if(($order)  ==  "payment_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('pay_status','<?php echo ($sort); ?>','DealOrder','incharge_index')" title="按照<?php echo L("PAYMENT_STATUS");?><?php echo ($sortType); ?> "><?php echo L("PAYMENT_STATUS");?><?php if(($order)  ==  "pay_status"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('memo','<?php echo ($sort); ?>','DealOrder','incharge_index')" title="按照支付备注<?php echo ($sortType); ?> ">支付备注<?php if(($order)  ==  "memo"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th style="width:">操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$incharge): ++$i;$mod = ($i % 2 )?><tr class="row" ><td><input type="checkbox" name="key" class="key" value="<?php echo ($incharge["id"]); ?>"></td><td>&nbsp;<?php echo ($incharge["id"]); ?></td><td>&nbsp;<?php echo ($incharge["order_sn"]); ?></td><td>&nbsp;<?php echo (get_user_name($incharge["user_id"])); ?></td><td>&nbsp;<?php echo (format_price($incharge["deal_total_price"])); ?></td><td>&nbsp;<?php echo (format_price($incharge["total_price"])); ?></td><td>&nbsp;<?php echo (get_payment_name($incharge["payment_id"])); ?></td><td>&nbsp;<?php echo (get_pay_status($incharge["pay_status"])); ?></td><td>&nbsp;<?php echo ($incharge["memo"]); ?></td><td> <?php echo (get_pay_incharge_link($incharge["id"])); ?>&nbsp; <?php echo (get_baofoo_query_link($incharge["id"],$incharge['payment_id'])); ?>&nbsp;<a href="javascript: del('<?php echo ($incharge["id"]); ?>')"><?php echo L("DEL");?></a>&nbsp;</td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td colspan="10" class="bottomTd"> &nbsp;</td></tr></table>
<!-- Think 系统列表组件结束 -->
 

<div class="blank5"></div>
<div class="page"><?php echo ($page); ?></div>
</div>
</body>
</html>