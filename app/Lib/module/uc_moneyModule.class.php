<?php
// +----------------------------------------------------------------------
// | Fanwe 方维p2p借贷系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 云淡风轻(88522820@qq.com)
// +----------------------------------------------------------------------

require APP_ROOT_PATH.'app/Lib/uc.php';

class uc_moneyModule extends SiteBaseModule
{
	private $creditsettings;
	private $allow_exchange = false;
	private  $credits_CFG = array(
		'1' => array('title'=>'经验', 'unit'=>'' ,'field'=>'point'),
		'2' => array('title'=>'积分', 'unit'=>'' ,'field'=>'score'),
		'3' => array('title'=>'资金', 'unit'=>'' ,'field'=>'money'),
		'4' => array('title'=>'额度', 'unit'=>'' ,'field'=>'quota'),
		'5' => array('title'=>'冻结', 'unit'=>'' ,'field'=>'lock_money'),
	);
	public function __construct()
	{
		if(file_exists(APP_ROOT_PATH."public/uc_config.php"))
		{
			require_once APP_ROOT_PATH."public/uc_config.php";
		}
		if(app_conf("INTEGRATE_CODE")=='Ucenter'&&UC_CONNECT=='mysql')
		{
			if(file_exists(APP_ROOT_PATH."public/uc_data/creditsettings.php"))
			{
				require_once APP_ROOT_PATH."public/uc_data/creditsettings.php";
				$this->creditsettings = $_CACHE['creditsettings'];
				if(count($this->creditsettings)>0)
				{
					foreach($this->creditsettings as $k=>$v)
					{
						$this->creditsettings[$k]['srctitle'] = $this->credits_CFG[$v['creditsrc']]['title'];
					}
					$this->allow_exchange = true;
					$GLOBALS['tmpl']->assign("allow_exchange",$this->allow_exchange);
				}
			}
		}
		parent::__construct();
	}
	
	
	public function exchange()
	{		
		$user_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id = ".intval($GLOBALS['user_info']['id']));		
		$GLOBALS['tmpl']->assign("user_info",$user_info);
		$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['UC_EXCHANGE']);
		$GLOBALS['tmpl']->assign("inc_file","inc/uc/uc_money_exchange.html");
		
		$GLOBALS['tmpl']->assign("exchange_data",$this->creditsettings);
		$GLOBALS['tmpl']->assign("exchange_json_data",json_encode($this->creditsettings));
		
		$GLOBALS['tmpl']->display("page/uc.html");
	}
	
	public function doexchange()
	{		
		if($this->allow_exchange)
		{
			$user_pwd = md5(addslashes(trim($_REQUEST['password'])));
			$user_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id = ".intval($GLOBALS['user_info']['id']));		
			
			if($user_info['user_pwd']=="")
			{
				//判断是否为初次整合
				//载入会员整合
				$integrate_code = trim(app_conf("INTEGRATE_CODE"));
				if($integrate_code!='')
				{
					$integrate_file = APP_ROOT_PATH."system/integrate/".$integrate_code."_integrate.php";
					if(file_exists($integrate_file))
					{
						require_once $integrate_file;
						$integrate_class = $integrate_code."_integrate";
						$integrate_obj = new $integrate_class;
					}	
				}
				if($integrate_obj)
				{			
					$result = $integrate_obj->login($user_info['user_name'],$user_pwd);						
					if($result['status'])
					{
						$GLOBALS['db']->query("update ".DB_PREFIX."user set user_pwd = '".$user_pwd."' where id = ".$user_info['id']);
						$user_info['user_pwd'] = $user_pwd;
					}								
				}
			}
			if($user_info['user_pwd']==$user_pwd)
			{
				$cfg = $this->creditsettings[addslashes(trim($_REQUEST['key']))];
				if($cfg)
				{	
					$amount = floor($_REQUEST['amountdesc']);
					$use_amount = floor($amount*$cfg['ratio']); //消耗的本系统积分
				    $field = $this->credits_CFG[$cfg['creditsrc']]['field'];
					
				    if($user_info[$field]<$use_amount)
				    {
				    	$data = array("status"=>false,"message"=>$cfg['srctitle']."不足，不能兑换");
						ajax_return($data);
				    }				    
					
					include_once(APP_ROOT_PATH . 'uc_client/client.php');	
				    $res = call_user_func_array("uc_credit_exchange_request", array(
				    	$user_info['integrate_id'],  //uid(整合的UID)
				    	$cfg['creditsrc'],  //原积分ID
				    	$cfg['creditdesc'],  //目标积分ID
				    	$cfg['appiddesc'],  //toappid目标应用ID
				    	$amount,  //amount额度(计算过的目标应用的额度)
				    ));
				    if($res)
				    {
				    	//兑换成功
				    	$use_amount = 0 - $use_amount;				    	
				    	$credit_data = array($field=>$use_amount);
				    	require_once APP_ROOT_PATH."system/libs/user.php";
				    	modify_account($credit_data,$user_info['id'],"ucenter兑换支出");
				    	$data = array("status"=>true,"message"=>"兑换成功");
						ajax_return($data);
				    }
				    else
				    {
				    	$data = array("status"=>false,"message"=>"兑换失败");
						ajax_return($data);
				    }
				}
				else
				{
					$data = array("status"=>false,"message"=>"非法的兑换请求");
					ajax_return($data);
				}
			}
			else
			{
				$data = array("status"=>false,"message"=>"登录密码不正确");
				ajax_return($data);
			}
		}
		else
		{
			$data = array("status"=>false,"message"=>"未开启兑换功能");
			ajax_return($data);
		}
	}
	
	public function index()
	{
		$user_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id = ".intval($GLOBALS['user_info']['id']));		
		$level_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user_group where id = ".intval($user_info['group_id']));
		$point_level = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user_level where id = ".intval($user_info['level_id']));
		$user_info['user_level'] = $level_info['name'];
		$user_info['point_level'] = $point_level['name'];
		$user_info['discount'] = $level_info['discount']*10;		
		$GLOBALS['tmpl']->assign("user_data",$user_info);
		$t = addslashes(htmlspecialchars(trim($_REQUEST['t'])));
		$GLOBALS['tmpl']->assign("t",$t);
		$page = intval($_REQUEST['p']);
		if($page==0)
		$page = 1;
		$limit = (($page-1)*app_conf("PAGE_SIZE")).",".app_conf("PAGE_SIZE");
		$result = get_user_log($limit,$GLOBALS['user_info']['id'],$t);
		
		$GLOBALS['tmpl']->assign("list",$result['list']);
		$page = new Page($result['count'],app_conf("PAGE_SIZE"));   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);
		
		$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['UC_MONEY']);
		$GLOBALS['tmpl']->assign("inc_file","inc/uc/uc_money_index.html");
		$GLOBALS['tmpl']->display("page/uc.html");
	}
	
	
	public function incharge()
	{
		 
		$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['UC_MONEY_INCHARGE']);
	
		//输出支付方式
		$payment_list = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."payment where is_effect = 1 and class_name <> 'Account' and class_name <> 'Voucher' and class_name <> 'tenpayc2c' and online_pay = 1 order by sort desc");			
		foreach($payment_list as $k=>$v)
		{
			if($v['class_name']=='Alipay')
			{
				$cfg = unserialize($v['config']);
				if($cfg['alipay_service']!=2)
				{
					unset($payment_list[$k]);
					continue;
				}
			}
			$directory = APP_ROOT_PATH."system/payment/";
			$file = $directory. $v['class_name']."_payment.php";
			if(file_exists($file))
			{
				require_once($file);
				$payment_class = $v['class_name']."_payment";
				$payment_object = new $payment_class();
				$payment_list[$k]['display_code'] = $payment_object->get_display_code();						
			}
			else
			{
				unset($payment_list[$k]);
			}
		}
		$GLOBALS['tmpl']->assign("payment_list",$payment_list);
		
		//判断是否有线下支付
		$below_payment = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."payment where is_effect = 1 and class_name = 'Otherpay'");
		if($below_payment){
			$directory = APP_ROOT_PATH."system/payment/";
			$file = $directory. $below_payment['class_name']."_payment.php";	
			if(file_exists($file))
			{
				require_once($file);
				$payment_class = $below_payment['class_name']."_payment";
				
				$payment_object = new $payment_class();
				$below_payment['display_code'] = $payment_object->get_display_code();						
			}
			
			$GLOBALS['tmpl']->assign("below_payment",$below_payment);
		}
		
		$GLOBALS['tmpl']->assign("inc_file","inc/uc/uc_money_incharge.html");
		$GLOBALS['tmpl']->display("page/uc.html");
	}
	
	public function incharge_log()
	{
		 
		$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['UC_MONEY_INCHARGE_LOG']);
				
		//输出充值订单
		$page = intval($_REQUEST['p']);
		if($page==0)
		$page = 1;
		$limit = (($page-1)*app_conf("PAGE_SIZE")).",".app_conf("PAGE_SIZE");
	
		$result = get_user_incharge($limit,$GLOBALS['user_info']['id']);
		
		$GLOBALS['tmpl']->assign("list",$result['list']);
		$page = new Page($result['count'],app_conf("PAGE_SIZE"));   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);
		
		
		$GLOBALS['tmpl']->assign("inc_file","inc/uc/uc_money_incharge_log.html");
		$GLOBALS['tmpl']->display("page/uc.html");
	}
	
	public function incharge_done()
	{
		$payment_id = intval($_REQUEST['payment']);
		$money = floatval($_REQUEST['money']);
		if($money<=0)
		{
			showErr($GLOBALS['lang']['PLEASE_INPUT_CORRECT_INCHARGE']);
		}
		
		$payment_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."payment where id = ".$payment_id);
		if(!$payment_info)
		{
			showErr($GLOBALS['lang']['PLEASE_SELECT_PAYMENT']);
		}
		//开始生成订单
		$now = get_gmtime();
		$order['type'] = 1; //充值单
		$order['user_id'] = $GLOBALS['user_info']['id'];
		$order['create_time'] = $now;
		if($payment_info['fee_type'] == 0)
			$order['total_price'] = $money + $payment_info['fee_amount'];
		else
			$order['total_price'] = $money + $payment_info['fee_amount']*$money;
			
		$order['deal_total_price'] = $money;
		$order['pay_amount'] = 0;  
		$order['pay_status'] = 0;  
		$order['delivery_status'] = 5;  
		$order['order_status'] = 0; 
		$order['payment_id'] = $payment_id;
		if($payment_info['fee_type'] == 0)
			$order['payment_fee'] = $payment_info['fee_amount'];
		else
			$order['payment_fee'] = $payment_info['fee_amount']*$money;
			
		$order['bank_id'] = addslashes(htmlspecialchars(trim($_REQUEST['bank_id'])));
		$order['memo'] = addslashes(htmlspecialchars(trim($_REQUEST['memo'])));
		if($payment_info['class_name']=='Otherpay' && $order['memo']!=""){
			
			$payment_info['config'] = unserialize($payment_info['config']);
			$order['memo'] = "银行流水单号:".$order['memo'];
			$order['memo'] .= "<br>开户行：".$payment_info['config']['pay_bank'][$order['bank_id']];
			$order['memo'] .= "<br>充值银行：".$payment_info['config']['pay_name'][$order['bank_id']];
			$order['memo'] .= "<br>帐号：".$payment_info['config']['pay_account'][$order['bank_id']];
			$order['memo'] .= "<br>用户：".$payment_info['config']['pay_account_name'][$order['bank_id']];
		}
		do
		{
			$order['order_sn'] = to_date(get_gmtime(),"Ymdhis").rand(100,999);
			$GLOBALS['db']->autoExecute(DB_PREFIX."deal_order",$order,'INSERT','','SILENT'); 
			$order_id = intval($GLOBALS['db']->insert_id());
		}while($order_id==0);
		
		require_once APP_ROOT_PATH."system/libs/cart.php";
		$payment_notice_id = make_payment_notice($order['total_price'],$order_id,$payment_info['id'],$order['memo']);
		//创建支付接口的付款单
	
		$rs = order_paid($order_id);  
		if($rs)
		{
			app_redirect(url("index","payment#incharge_done",array("id"=>$order_id))); //充值支付成功
		}
		else
		{
			app_redirect(url("index","payment#pay",array("id"=>$payment_notice_id))); 
		}
	}
	
	public function carry()
	{
		make_delivery_region_js();
		$bank_list = $GLOBALS['db']->getAll("SELECT * FROM ".DB_PREFIX."bank ORDER BY is_rec DESC,sort DESC,id ASC");
		$GLOBALS['tmpl']->assign("bank_list",$bank_list);
		
		$carry_total_money = $GLOBALS['db']->getOne("SELECT sum(money) FROM ".DB_PREFIX."user_carry WHERE user_id=".intval($GLOBALS['user_info']['id'])." AND status=1");
	
		$GLOBALS['tmpl']->assign("carry_total_money",$carry_total_money);
		
		//地区列表
		
		$region_lv1 = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."delivery_region where region_level = 1");  //二级地址
		$GLOBALS['tmpl']->assign("region_lv1",$region_lv1);
		
		
		$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['UC_CARRY']);
		$GLOBALS['tmpl']->assign("inc_file","inc/uc/uc_money_carry.html");
		$GLOBALS['tmpl']->display("page/uc.html");
	}
	public function savecarry(){
		if($GLOBALS['user_info']['id'] > 0){
			$data['user_id'] = intval($GLOBALS['user_info']['id']);
			$data['money'] = floatval($_REQUEST['amount']);
			
			if($data['money'] <=0)
			{
				showErr($GLOBALS['lang']['CARRY_MONEY_NOT_TRUE']);
			}
			$fee = 0;
			if($data['money']>0&&$data['money'] < 20000){
				$fee = 1;
			}
			if($data['money']>=20000&&$data['money'] < 50000){
				$fee = 3;
			}
			if($data['money'] >= 50000){
				$fee = 5;
			}
			
			if(($data['money'] + $fee) > floatval($GLOBALS['user_info']['money'])){
				showErr($GLOBALS['lang']['CARRY_MONEY_NOT_ENOUGHT']);
			}
			$data['fee'] = $fee;
			
			$data['bank_id'] = intval($_REQUEST['bank_id']);
			if($data['bank_id'] == 0)
			{
				$data['bank_id'] = intval($_REQUEST['otherbank']);
			}
			
			if($data['bank_id'] == 0)
			{
				showErr($GLOBALS['lang']['PLASE_ENTER_CARRY_BANK']);
			}
			
			$data['real_name'] = trim($_REQUEST['real_name']);
			if($data['real_name'] == ""){
				showErr("请输入开户名");
			}
			
			$data['region_lv1'] = intval($_REQUEST['region_lv1']);
			$data['region_lv2'] = intval($_REQUEST['region_lv2']);
			$data['region_lv3'] = intval($_REQUEST['region_lv3']);
			$data['region_lv4'] = intval($_REQUEST['region_lv4']);
			if($data['region_lv4'] == 0){
				showErr("请选择开户行所在地");
			}
			
			$data['bankzone'] = trim($_REQUEST['bankzone']);
			if($data['bankzone'] == ""){
				showErr("请输入开户行网点");
			}
			
			$data['bankcard'] = trim($_REQUEST['bankcard']);
			if($data['bankcard'] == ""){
				showErr($GLOBALS['lang']['PLASE_ENTER_CARRY_BANK_CODE']);
			}
			
			$data['create_time'] = get_gmtime();
			$GLOBALS['db']->autoExecute(DB_PREFIX."user_carry",$data,"INSERT");
			
			//更新会员账户信息
			require APP_ROOT_PATH.'system/libs/user.php';
			modify_account(array('money'=>0,'lock_money'=>$data['money']+$fee),$data['user_id'],"提现申请");
			
			$content = "您于".to_date($data['create_time'],"Y年m月d日 H:i:s")."提交的".format_price($data['money'])."提现申请我们正在处理，如您填写的账户信息正确无误，您的资金将会于3个工作日内到达您的银行账户.";
			
			send_user_msg("",$content,0,$data['user_id'],get_gmtime(),0,true,5);
			
			showSuccess($GLOBALS['lang']['CARRY_SUBMIT_SUCCESS']);
		}else{
			app_redirect(url("index","user#login"));
		}
	}
}
?>