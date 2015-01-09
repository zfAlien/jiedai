<?php
// +----------------------------------------------------------------------
// | Fanwe 方维p2p借贷系统
// +----------------------------------------------------------------------
// | Copyright (c) 2010 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------

$payment_lang = array(
	'name'	=>	'宝付支付',
	'baofoo_account'	=>	'商户号',
	'baofoo_key'		=>	'密钥',
	'GO_TO_PAY'	=>	'前往宝付在线支付',
	'VALID_ERROR'	=>	'支付验证失败',
	'PAY_FAILED'	=>	'支付失败',

	'baofoo_gateway'	=>	'支持的银行',
	'baofoo_gateway_1000'	=>	'网银支付（总）',
	//借记卡
	'baofoo_gateway_3001'	=>	'招商银行',
	'baofoo_gateway_3002'	=>	'工商银行',
	'baofoo_gateway_3003'	=>	'建设银行',
	'baofoo_gateway_3004'	=>	'浦发银行',
	'baofoo_gateway_3005'	=>	'农业银行',
	'baofoo_gateway_3006'	=>	'民生银行',
	'baofoo_gateway_3008'   =>	'深圳发展银行',
	'baofoo_gateway_3009'	=>	'兴业银行',
	'baofoo_gateway_3020'	=>	'交通银行',
	'baofoo_gateway_3022'	=>	'光大银行',
	'baofoo_gateway_3026'	=>	'中国银行',
	'baofoo_gateway_3032'	=>	'北京银行',
	'baofoo_gateway_3033'	=>	'BEA 东亚银行',
	'baofoo_gateway_3034'	=>	'渤海银行',
	'baofoo_gateway_3035'	=>	'平安银行',
	'baofoo_gateway_3036'	=>	'广发银行',
	'baofoo_gateway_3037'	=>	'上海农商银行',
	'baofoo_gateway_3038'	=>	'中国邮政储蓄银行',
	'baofoo_gateway_3039'	=>	'中信银行',
	'baofoo_gateway_3046'	=>	'宁波银行',
	'baofoo_gateway_3047'	=>	'日照银行',
	'baofoo_gateway_3048'	=>	'河北银行',
	'baofoo_gateway_3049'	=>	'湖南省农村信用社联合社',
	'baofoo_gateway_3050'	=>	'华夏银行',
	'baofoo_gateway_3051'	=>	'威海市商业银行',
	'baofoo_gateway_3054'	=>	'重庆农村商业银行',
	'baofoo_gateway_3055'	=>	'大连银行',
	'baofoo_gateway_3056'	=>	'东莞银行',
	'baofoo_gateway_3057'	=>	'富滇银行',
	'baofoo_gateway_3059'	=>	'上海银行',
	'baofoo_gateway_3080'	=>	'银联在线',
	
	//信用卡
	'baofoo_gateway_4001'	=>	'招商银行[信用卡]',
	'baofoo_gateway_4002'	=>	'中国工商银行[信用卡]',
	'baofoo_gateway_4003'	=>	'中国建设银行[信用卡]',
	'baofoo_gateway_4004'	=>	'上海浦东发展银行[信用卡]',
	'baofoo_gateway_4005'	=>	'中国农业银行[信用卡]',
	'baofoo_gateway_4006'	=>	'中国民生银行[信用卡]',
	'baofoo_gateway_4008'	=>	'深圳发展银行[信用卡]',
	'baofoo_gateway_4009'	=>	'兴业银行[信用卡]',
	'baofoo_gateway_4020'	=>	'中国交通银行[信用卡]',
	'baofoo_gateway_4022'	=>	'中国光大银行[信用卡]',
	'baofoo_gateway_4026'	=>	'中国银行[信用卡]',
	'baofoo_gateway_4032'	=>	'北京银行[信用卡]',
	'baofoo_gateway_4033'	=>	'BEA东亚银行	[信用卡]',
	'baofoo_gateway_4034'	=>	'渤海银行[信用卡]',
	'baofoo_gateway_4035'	=>	'平安银行[信用卡]',
	'baofoo_gateway_4036'	=>	'广发银行[信用卡]',
	'baofoo_gateway_4037'	=>	'上海农商银行	[信用卡]',
	'baofoo_gateway_4038'	=>	'中国邮政储蓄银行[信用卡]',
	'baofoo_gateway_4039'	=>	'中信银行[信用卡]',
	'baofoo_gateway_4046'	=>	'宁波银行[信用卡]',
	'baofoo_gateway_4047'	=>	'日照银行[信用卡]',
	'baofoo_gateway_4048'	=>	'河北银行[信用卡]',
	'baofoo_gateway_4049'	=>	'湖南省农村信用社联合社[信用卡]',
	'baofoo_gateway_4050'	=>	'华夏银行[信用卡]',
	'baofoo_gateway_4051'	=>	'威海市商业银行[信用卡]',
	'baofoo_gateway_4054'	=>	'重庆农村商业银行[信用卡]',
	'baofoo_gateway_4055'	=>	'大连银行[信用卡]',
	'baofoo_gateway_4056'	=>	'东莞银行[信用卡]',
	'baofoo_gateway_4057'	=>	'富滇银行[信用卡]',
	'baofoo_gateway_4059'	=>	'上海银行[信用卡]',
	'baofoo_gateway_4080'	=>	'银联在线[信用卡]',
	
);
$config = array(
	'baofoo_account'	=>	array(
		'INPUT_TYPE'	=>	'0'
	), //支付宝帐号: 
	'baofoo_key'	=>	array(
		'INPUT_TYPE'	=>	'0'
	), //校验码
	'baofoo_gateway'	=>	array(
		'INPUT_TYPE'	=>	'3',
		'VALUES'	=>	array(
				'1000',//'网银支付（总）',
				
				//借记卡
				'3001',//'招商银行',
				'3002',//'工商银行',
				'3003',//'建设银行',
				'3004',//'浦发银行',
				'3005',//'农业银行',
				'3006',//'民生银行',
				'3008',//深圳发展银行	
				'3009',//'兴业银行',
				'3020',//'交通银行',
				'3022',//'光大银行',
				'3026',//'中国银行',
				'3032',//北京银行
				'3033',//东亚银行
				'3034',//渤海银行
				'3035',//'平安银行',
				'3036',//广发银行
				'3037',//上海农商银行
				'3038',//'中国邮政储蓄银行',
				'3039',//'中信银行',
				'3046',//'宁波银行',
				'3047',//'日照银行',
				'3048',//'河北银行',
				'3049',//'湖南省农村信用社联合社',
				'3050',//'华夏银行',
				'3051',//'威海市首页银行',
				'3054',//'重庆农村商业银行',
				'3055',//'大连银行',
				'3056',//'东莞银行',
				'3057',//'富滇银行',
				'3059',//'上海银行',
				'3080',//'银联在线',
				
				//信用卡
				'4001',//招商银行
				'4002',//中国工商银行
				'4003',//中国建设银行
				'4004',//上海浦东发展银行
				'4005',//中国农业银行
				'4006',//中国民生银行
				'4008',//深圳发展银行
				'4009',//兴业银行	
				'4020',//中国交通银行
				'4022',//中国光大银行	
				'4026',//中国银行
				'4032',//北京银行	
				'4033',//BEA东亚银行	
				'4034',//渤海银行	
				'4035',//平安银行	
				'4036',//广发银行|CGB
				'4037',//上海农商银行	
				'4038',//中国邮政储蓄银行
				'4039',//中信银行
				'4046',//宁波银行	
				'4047',//日照银行	
				'4048',//河北银行	
				'4049',//湖南省农村信用社联合社
				'4050',//华夏银行
				'4051',//威海市商业银行
				'4054',//重庆农村商业银行	
				'4055',//大连银行	
				'4056',//东莞银行	
				'4057',//富滇银行	
				'4059',//上海银行	
				'4080',//银联在线	
			)
	), //可选的银行网关
);
/* 模块的基本信息 */
if (isset($read_modules) && $read_modules == true)
{
    $module['class_name']    = 'Baofoo';

    /* 名称 */
    $module['name']    = $payment_lang['name'];


    /* 支付方式：1：在线支付；0：线下支付 */
    $module['online_pay'] = '1';

    /* 配送 */
    $module['config'] = $config;
    
    $module['lang'] = $payment_lang;
    $module['reg_url'] = 'http://www.baofoo.com';
    return $module;
}

// 支付宝直连支付模型
require_once(APP_ROOT_PATH.'system/libs/payment.php');
class Baofoo_payment implements payment {
	private $payment_lang = array(
		'name'	=>	'宝付支付',
		'baofoo_account'	=>	'商户号',
		'baofoo_key'		=>	'密钥',
		'GO_TO_PAY'	=>	'前往宝付在线支付',
		'VALID_ERROR'	=>	'支付验证失败',
		'PAY_FAILED'	=>	'支付失败',
	
		'baofoo_gateway'	=>	'支持的银行',
		'baofoo_gateway_1000'	=>	'网银支付（总）',
		//借记卡
		'baofoo_gateway_3001'	=>	'招商银行',
		'baofoo_gateway_3002'	=>	'工商银行',
		'baofoo_gateway_3003'	=>	'建设银行',
		'baofoo_gateway_3004'	=>	'浦发银行',
		'baofoo_gateway_3005'	=>	'农业银行',
		'baofoo_gateway_3006'	=>	'民生银行',
		'baofoo_gateway_3008'   =>	'深圳发展银行',
		'baofoo_gateway_3009'	=>	'兴业银行',
		'baofoo_gateway_3020'	=>	'交通银行',
		'baofoo_gateway_3022'	=>	'光大银行',
		'baofoo_gateway_3026'	=>	'中国银行',
		'baofoo_gateway_3032'	=>	'北京银行',
		'baofoo_gateway_3033'	=>	'BEA 东亚银行',
		'baofoo_gateway_3034'	=>	'渤海银行',
		'baofoo_gateway_3035'	=>	'平安银行',
		'baofoo_gateway_3036'	=>	'广发银行',
		'baofoo_gateway_3037'	=>	'上海农商银行',
		'baofoo_gateway_3038'	=>	'中国邮政储蓄银行',
		'baofoo_gateway_3039'	=>	'中信银行',
		'baofoo_gateway_3046'	=>	'宁波银行',
		'baofoo_gateway_3047'	=>	'日照银行',
		'baofoo_gateway_3048'	=>	'河北银行',
		'baofoo_gateway_3049'	=>	'湖南省农村信用社联合社',
		'baofoo_gateway_3050'	=>	'华夏银行',
		'baofoo_gateway_3051'	=>	'威海市商业银行',
		'baofoo_gateway_3054'	=>	'重庆农村商业银行',
		'baofoo_gateway_3055'	=>	'大连银行',
		'baofoo_gateway_3056'	=>	'东莞银行',
		'baofoo_gateway_3057'	=>	'富滇银行',
		'baofoo_gateway_3059'	=>	'上海银行',
		'baofoo_gateway_3080'	=>	'银联在线',
		
		//信用卡
		'baofoo_gateway_4001'	=>	'招商银行',
		'baofoo_gateway_4002'	=>	'中国工商银行',
		'baofoo_gateway_4003'	=>	'中国建设银行',
		'baofoo_gateway_4004'	=>	'上海浦东发展银行',
		'baofoo_gateway_4005'	=>	'中国农业银行',
		'baofoo_gateway_4006'	=>	'中国民生银行',
		'baofoo_gateway_4008'	=>	'深圳发展银行',
		'baofoo_gateway_4009'	=>	'兴业银行',
		'baofoo_gateway_4020'	=>	'中国交通银行',
		'baofoo_gateway_4022'	=>	'中国光大银行',
		'baofoo_gateway_4026'	=>	'中国银行',
		'baofoo_gateway_4032'	=>	'北京银行',
		'baofoo_gateway_4033'	=>	'BEA东亚银行	',
		'baofoo_gateway_4034'	=>	'渤海银行',
		'baofoo_gateway_4035'	=>	'平安银行',
		'baofoo_gateway_4036'	=>	'广发银行',
		'baofoo_gateway_4037'	=>	'上海农商银行	',
		'baofoo_gateway_4038'	=>	'中国邮政储蓄银行',
		'baofoo_gateway_4039'	=>	'中信银行',
		'baofoo_gateway_4046'	=>	'宁波银行',
		'baofoo_gateway_4047'	=>	'日照银行',
		'baofoo_gateway_4048'	=>	'河北银行',
		'baofoo_gateway_4049'	=>	'湖南省农村信用社联合社',
		'baofoo_gateway_4050'	=>	'华夏银行',
		'baofoo_gateway_4051'	=>	'威海市商业银行',
		'baofoo_gateway_4054'	=>	'重庆农村商业银行',
		'baofoo_gateway_4055'	=>	'大连银行',
		'baofoo_gateway_4056'	=>	'东莞银行',
		'baofoo_gateway_4057'	=>	'富滇银行',
		'baofoo_gateway_4059'	=>	'上海银行',
		'baofoo_gateway_4080'	=>	'银联在线',
	
	
	);
	public function get_payment_code($payment_notice_id) {
        $payment_notice = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."payment_notice where id = ".$payment_notice_id);
		$order = $GLOBALS['db']->getRow("select order_sn,bank_id from ".DB_PREFIX."deal_order where id = ".$payment_notice['order_id']);
		
		$_TransID = $order['order_sn'];
		$_OrderMoney = round($payment_notice['money'],2);
		
		$payment_info = $GLOBALS['db']->getRow("select id,config,logo from ".DB_PREFIX."payment where id=".intval($payment_notice['payment_id']));
		$payment_info['config'] = unserialize($payment_info['config']);
       
        $_Merchant_url =  get_domain().APP_ROOT.'/baofoo_callback.php?act=notify';
        $_Return_url = get_domain().APP_ROOT.'/baofoo_callback.php?act=response';
        
        /* 交易日期 */
        $_TradeDate = to_date($payment_notice['create_time'], 'YmdHis');
		$_MerchantID = $payment_info['config']['baofoo_account'];
        
        $_PayID = $order['bank_id'];
        $_NoticeType = 0;
        $_Md5Key = $payment_info['config']['baofoo_key'];
       
		$_AdditionalInfo = $payment_notice_id;
		$_Md5_OrderMoney = $_OrderMoney*100;
      	$_Md5Sign=md5($_MerchantID.$_PayID.$_TradeDate.$_TransID.$_Md5_OrderMoney.$_Merchant_url.$_Return_url.$_NoticeType.$_Md5Key);
        /*交易参数*/
        $parameter = array(
            '_MerchantID' => $_MerchantID,
            '_TransID' => $_TransID,//流水号
			'_PayID' => $_PayID,//支付方式
			'_TradeDate' => $_TradeDate,//交易时间
			'_OrderMoney' => $_OrderMoney,//订单金额
			'_ProductName' => $_TransID,//产品名称
			'_Amount' => 1,//数量
			'_ProductLogo' => '',//产品logo
			'_Username' => '',//支付用户名
			'_Email' => '',
			'_Mobile' => '',
			'_AdditionalInfo' => $_AdditionalInfo,//订单附加消息
			'_Merchant_url' => $_Merchant_url,//商户通知地址 
			'_Return_url' => $_Return_url,//用户通知地址
			'_NoticeType' => $_NoticeType,//通知方式
			'_Md5Sign'=>$_Md5Sign
        );
        $def_url = '<form style="text-align:center;" action="'.get_domain().APP_ROOT."/baofoo_post.php".'" target="_blank" style="margin:0px;padding:0px" method="POST" >';

        foreach ($parameter AS $key => $val) {
            $def_url .= "<input type='hidden' name='$key' value='$val' />";
        }
        $def_url .= "<input type='submit' class='paybutton' value='前往宝付在线支付' />";
        $def_url .= "</form>";
        $def_url.="<br /><div style='text-align:center' class='red'>".$GLOBALS['lang']['PAY_TOTAL_PRICE'].":".format_price($_OrderMoney)."</div>";
        return $def_url;
    }

     public function response($request) {
		$return_res = array(
            'info' => '',
            'status' => false,
        );
		
        /* 取返回参数 */
        $_MerchantID=$_REQUEST['MerchantID'];//商户号
		$_TransID =$_REQUEST['TransID'];//流水号
		$_Result=$_REQUEST['Result'];//支付结果(1:成功,0:失败)
		$_resultDesc=$_REQUEST['resultDesc'];//支付结果描述
		$_factMoney=$_REQUEST['factMoney'];//实际成交金额
		$_additionalInfo=$_REQUEST['additionalInfo'];//订单附加消息
		$_SuccTime=$_REQUEST['SuccTime'];//交易成功时间
		$_Md5Sign=$_REQUEST['Md5Sign'];//md5签名
		

        /*获取支付信息*/
        $payment = $GLOBALS['db']->getRow("select id,config from ".DB_PREFIX."payment where class_name='Baofoo'");  
    	$payment['config'] = unserialize($payment['config']);
    	
		$_Md5Key= $payment['config']['baofoo_key'];
		$payment_notice_sn = $_additionalInfo;
		$gopayOutOrderId =  $_TransID;
		
        /*比对连接加密字符串*/
		$_WaitSign=md5($_MerchantID.$_TransID.$_Result.$_resultDesc.$_factMoney.$_additionalInfo.$_SuccTime.$_Md5Key);

        if ($_Md5Sign != $_WaitSign || $_REQUEST['Result'] != 1) {
        	showErr($GLOBALS['payment_lang']["VALID_ERROR"]);
        } else {
	        $payment_notice = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."payment_notice where id = '".$payment_notice_sn."'");
			$order_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal_order where id = ".$payment_notice['order_id']);
			require_once APP_ROOT_PATH."system/libs/cart.php";
			$rs = payment_paid($payment_notice['id']);						
			if($rs)
			{
				$rs = order_paid($payment_notice['order_id']);				
				if($rs)
				{
					//开始更新相应的outer_notice_sn					
					$GLOBALS['db']->query("update ".DB_PREFIX."payment_notice set outer_notice_sn = '".$gopayOutOrderId."' where id = ".$payment_notice['id']);
					if($order_info['type']==0)
						app_redirect(url("index","payment#done",array("id"=>$payment_notice['order_id']))); //支付成功
					else
						app_redirect(url("index","payment#incharge_done",array("id"=>$payment_notice['order_id']))); //支付成功
				}
				else 
				{
					if($order_info['pay_status'] == 2)
					{				
						if($order_info['type']==0)
							app_redirect(url("index","payment#done",array("id"=>$payment_notice['order_id']))); //支付成功
						else
							app_redirect(url("index","payment#incharge_done",array("id"=>$payment_notice['order_id']))); //支付成功
					}
					else
						app_redirect(url("index","payment#pay",array("id"=>$payment_notice['id'])));
				}
			}
			else
			{
				app_redirect(url("index","payment#pay",array("id"=>$payment_notice['id'])));
			}
        }
    }
    
     public function notify($request) {
		$return_res = array(
            'info' => '',
            'status' => false,
        );
		
        /* 取返回参数 */
        $_MerchantID=$_REQUEST['MerchantID'];//商户号
		$_TransID =$_REQUEST['TransID'];//流水号
		$_Result=$_REQUEST['Result'];//支付结果(1:成功,0:失败)
		$_resultDesc=$_REQUEST['resultDesc'];//支付结果描述
		$_factMoney=$_REQUEST['factMoney'];//实际成交金额
		$_additionalInfo=$_REQUEST['additionalInfo'];//订单附加消息
		$_SuccTime=$_REQUEST['SuccTime'];//交易成功时间
		$_Md5Sign=$_REQUEST['Md5Sign'];//md5签名
		

        /*获取支付信息*/
        $payment = $GLOBALS['db']->getRow("select id,config from ".DB_PREFIX."payment where class_name='Baofoo'");  
    	$payment['config'] = unserialize($payment['config']);
    	
		$_Md5Key= $payment['config']['baofoo_key'];
		$payment_notice_sn = $_additionalInfo;
		$gopayOutOrderId =  $_TransID;
		
        /*比对连接加密字符串*/
		$_WaitSign=md5($_MerchantID.$_TransID.$_Result.$_resultDesc.$_factMoney.$_additionalInfo.$_SuccTime.$_Md5Key);

        if ($_Md5Sign != $_WaitSign || $_REQUEST['Result'] != 1) {
        	showErr($GLOBALS['payment_lang']["VALID_ERROR"]);
        } else {
	        $payment_notice = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."payment_notice where id = '".$payment_notice_sn."'");
			$order_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."deal_order where id = ".$payment_notice['order_id']);
			require_once APP_ROOT_PATH."system/libs/cart.php";
			$rs = payment_paid($payment_notice['id']);						
			if($rs)
			{
				$rs = order_paid($payment_notice['order_id']);				
				if($rs)
				{
					//开始更新相应的outer_notice_sn					
					$GLOBALS['db']->query("update ".DB_PREFIX."payment_notice set outer_notice_sn = '".$gopayOutOrderId."' where id = ".$payment_notice['id']);
					if($order_info['type']==0)
						app_redirect(url("index","payment#done",array("id"=>$payment_notice['order_id']))); //支付成功
					else
						app_redirect(url("index","payment#incharge_done",array("id"=>$payment_notice['order_id']))); //支付成功
				}
				else 
				{
					if($order_info['pay_status'] == 2)
					{				
						if($order_info['type']==0)
							app_redirect(url("index","payment#done",array("id"=>$payment_notice['order_id']))); //支付成功
						else
							app_redirect(url("index","payment#incharge_done",array("id"=>$payment_notice['order_id']))); //支付成功
					}
					else
						app_redirect(url("index","payment#pay",array("id"=>$payment_notice['id'])));
				}
			}
			else
			{
				app_redirect(url("index","payment#pay",array("id"=>$payment_notice['id'])));
			}
        }
    }

    public function get_display_code() {
        $payment_item = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."payment where class_name='Baofoo'");
		if($payment_item)
		{
			$payment_cfg = unserialize($payment_item['config']);
			$html = "<style type='text/css'>.baofoo_types{float:left; display:block;width:150px; height:10px; text-align:left; padding:15px 0px;}";
	        $html .=".bk_type_1000{background:url(".get_domain().APP_ROOT."/system/payment/Baofoo/baofoo.jpg) no-repeat right center; font-size:0px; width:150px; height:10px;}"; 
	        $html .="</style>";
	        $html .="<script type='text/javascript'>function set_bank(bank_id)";
			$html .="{";
			$html .="$(\"input[name='bank_id']\").val(bank_id);";
			$html .="}</script>";
			$is_show_jieji = false;
			$is_show_xyk = false;
	       foreach ($payment_cfg['baofoo_gateway'] AS $key=>$val)
	        {
	        	if((int)$key<4000 && (int)$key>=3000 && $is_show_jieji == false){
	        		$html.= "<div class='blank'></div><h3 class='clearfix tl'><b>宝付支付借记卡</b></h3><div class='blank1'></div><hr />";
	        		$is_show_jieji = true;
	        	}
	        	elseif((int)$key>=4000 && $is_show_xyk ==false){
	        		$html.= "<div class='blank'></div><h3 class='clearfix tl'><b>宝付支付信用卡</b></h3><div class='blank1'></div><hr />";
	        		$is_show_xyk = true;
	        	}
	            $html  .= "<label class='baofoo_types bk_type_".$key."'><input type='radio' name='payment' value='".$payment_item['id']."' rel='".$key."' onclick='set_bank(\"".$key."\")' />".$this->payment_lang['baofoo_gateway_'.$key]."</label>";
	        }
	        $html .= "<input type='hidden' name='bank_id' />";
			return $html;
		}
		else{
			return '';
		}
    }
    /**
     * 字符转义
     * @return string
     */
    function fStripslashes($string)
    {
            if(is_array($string))
            {
                    foreach($string as $key => $val)
                    {
                            unset($string[$key]);
                            $string[stripslashes($key)] = fStripslashes($val);
                    }
            }
            else
            {
                    $string = stripslashes($string);
            }

            return $string;
    }
    
    public function orderquery($payment_notice_id){
    	$payment_notice = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."payment_notice where id = ".$payment_notice_id);
		$order = $GLOBALS['db']->getRow("select order_sn,bank_id from ".DB_PREFIX."deal_order where id = ".$payment_notice['order_id']);
		
		$_TransID = $order['order_sn'];
		
		$payment_info = $GLOBALS['db']->getRow("select config from ".DB_PREFIX."payment where id=".intval($payment_notice['payment_id']));
		$payment_info['config'] = unserialize($payment_info['config']);
       
		$_MerchantID = $payment_info['config']['baofoo_account'];
        $_Md5Key = $payment_info['config']['baofoo_key'];
        
		//此处加入判断，如果前面出错了跳转到其他地方而不要进行提交
		$_Md5Sign = md5($_MerchantID.$_TransID.$_Md5Key);
		
		$info = @file_get_contents("http://paygate.baofoo.com/Check/OrderQuery.aspx?MerchantID=".$_MerchantID."&TransID=".$_TransID."&Md5Sign=".$_Md5Sign);
		
		if($info){
			$data = array();
			$data['status'] = 1;
			list($data['MerchantID'],$data['TransID'],$data['CheckResult'],$data["factMoney"],$data['SuccTime'],$data['Md5Sign']) = explode("|",$info);
			
			$CheckResult = $data['CheckResult'];
			
			if($CheckResult == "Y")
			{
				$data['CheckResult'] = "成功";
			}
			elseif($CheckResult == "F")
			{
				$data['CheckResult'] = "失败";
			}
			elseif($CheckResult == "P")
			{
				$data['CheckResult'] = "处理中";
				
			}
			elseif($CheckResult == "N"){
				$data['CheckResult'] = "没有订单";
			}
			
			$time_span = to_timespan($data['SuccTime'],"YmdHis");
			$data['SuccTime'] =  to_date($time_span,"Y-m-d H:i:s");
			
			$data['factMoney'] = format_price($data['factMoney']/100);
			
			echo json_encode($data);
		}
		else{
			$data['status'] = 0;
			echo json_encode($data);
		}
    }
}
?>
