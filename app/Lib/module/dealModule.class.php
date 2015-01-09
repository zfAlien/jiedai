<?php
// +----------------------------------------------------------------------
// | Fanwe 方维p2p借贷系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 云淡风轻(88522820@qq.com)
// +----------------------------------------------------------------------
require APP_ROOT_PATH.'app/Lib/deal.php';
class dealModule extends SiteBaseModule
{
	public function index(){
		$id = intval($_REQUEST['id']);
		
		$deal = get_deal($id);
		send_deal_contract_email($id,$deal,$deal['user_id']);
		
		if(!$deal)
			app_redirect(url("index")); 
		
		//借款列表
		$load_list = $GLOBALS['db']->getAll("SELECT deal_id,user_id,user_name,money,create_time FROM ".DB_PREFIX."deal_load WHERE deal_id = ".$id);
		
		
		$u_info = get_user("*",$deal['user_id']);
		
		//可用额度
		$can_use_quota=get_can_use_quota($deal['user_id']);
		$GLOBALS['tmpl']->assign('can_use_quota',$can_use_quota);
		
		$credit_file = get_user_credit_file($deal['user_id']);
		$deal['is_faved'] = 0;
		if($GLOBALS['user_info']){
			$deal['is_faved'] = $GLOBALS['db']->getOne("SELECT count(*) FROM ".DB_PREFIX."deal_collect WHERE deal_id = ".$id." AND user_id=".intval($GLOBALS['user_info']['id']));
			
			if($deal['deal_status'] >=4){
				//还款列表
				$loan_repay_list = get_deal_load_list($deal);
				$GLOBALS['tmpl']->assign("loan_repay_list",$loan_repay_list);
				
				foreach($load_list as $k=>$v){
					$load_list[$k]['remain_money'] = $v['money'] - $GLOBALS['db']->getOne("SELECT sum(self_money) FROM ".DB_PREFIX."deal_load_repay WHERE user_id=".$v['user_id']." AND deal_id=".$id);
					if($load_list[$k]['remain_money'] <=0){
						$load_list[$k]['remain_money'] = 0;
						$load_list[$k]['status'] = 1;
					}
				}
			}	
			$user_statics = sys_user_status($deal['user_id'],true);
			$GLOBALS['tmpl']->assign("user_statics",$user_statics);
		}
		
		$GLOBALS['tmpl']->assign("load_list",$load_list);	
		$GLOBALS['tmpl']->assign("credit_file",$credit_file);
		$GLOBALS['tmpl']->assign("u_info",$u_info);
		
		//工作认证是否过期
    	$time = get_gmtime();
    	$expire_time = 6*30*24*3600;
    	if($u_info['workpassed']==1){
    		if(($time - $u_info['workpassed_time']) > $expire_time){
    			$expire['workpassed_expire'] = 1;
    		}
    	}
    	if($u_info['incomepassed']==1){
    		if(($time - $u_info['incomepassed_time']) > $expire_time){
    			$expire['incomepassed_expire'] = 1;
    		}
    	}
    	if($u_info['creditpassed']==1){
    		if(($time - $u_info['creditpassed_time']) > $expire_time){
    			$expire['creditpassed_expire'] = 1;
    		}
    	}
    	if($u_info['residencepassed']==1){
    		if(($time - $u_info['residencepassed_time']) > $expire_time){
    			$expire['residencepassed_expire'] = 1;
    		}
    	}
		
		$GLOBALS['tmpl']->assign('expire',$expire);
		if($deal['type_match_row'])
			$seo_title = $deal['seo_title']!=''?$deal['seo_title']:$deal['type_match_row'] . " - " . $deal['name'];
		else
			$seo_title = $deal['seo_title']!=''?$deal['seo_title']: $deal['name'];
			
		$GLOBALS['tmpl']->assign("page_title",$seo_title);
		$seo_keyword = $deal['seo_keyword']!=''?$deal['seo_keyword']:$deal['type_match_row'].",".$deal['name'];
		$GLOBALS['tmpl']->assign("page_keyword",$seo_keyword.",");
		$seo_description = $deal['seo_description']!=''?$deal['seo_description']:$deal['name'];
		
		//留言
		require APP_ROOT_PATH.'app/Lib/message.php';
		require APP_ROOT_PATH.'app/Lib/page.php';
		$rel_table = 'deal';
		$message_type = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."message_type where type_name='".$rel_table."'");
		$condition = "rel_table = '".$rel_table."' and rel_id = ".$id;
	
		if(app_conf("USER_MESSAGE_AUTO_EFFECT")==0)
		{
			$condition.= " and user_id = ".intval($GLOBALS['user_info']['id']);
		}
		else 
		{
			if($message_type['is_effect']==0)
			{
				$condition.= " and user_id = ".intval($GLOBALS['user_info']['id']);
			}
		}
		
		//message_form 变量输出
		$GLOBALS['tmpl']->assign('rel_id',$id);
		$GLOBALS['tmpl']->assign('rel_table',"deal");
		
		//分页
		$page = intval($_REQUEST['p']);
		if($page==0)
		$page = 1;
		$limit = (($page-1)*app_conf("PAGE_SIZE")).",".app_conf("PAGE_SIZE");
		$msg_condition = $condition." AND is_effect = 1 ";
		$message = get_message_list($limit,$msg_condition);
		
		$page = new Page($message['count'],app_conf("PAGE_SIZE"));   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);
		
		foreach($message['list'] as $k=>$v){
			$msg_sub = get_message_list("","pid=".$v['id'],false);
			$message['list'][$k]["sub"] = $msg_sub["list"];
		}
		
		$GLOBALS['tmpl']->assign("message_list",$message['list']);
		if(!$GLOBALS['user_info'])
		{
			$GLOBALS['tmpl']->assign("message_login_tip",sprintf($GLOBALS['lang']['MESSAGE_LOGIN_TIP'],url("shop","user#login"),url("shop","user#register")));
		}
		
		$GLOBALS['tmpl']->assign("deal",$deal);
		$GLOBALS['tmpl']->display("page/deal.html");
	}
	
	function preview(){
		$deal['id'] = 'XXX';
		$deal['name'] = trim($_REQUEST['borrowtitle']);
		$deal_loan_type_list = load_auto_cache("deal_loan_type_list");
		foreach($deal_loan_type_list as $k=>$v){
			if($v['id'] == intval($_REQUEST['borrowtype'])){
				$deal['type_match_row'] = $v['name'];
			}
		}
		
		if(intval($_REQUEST['borrowtype']) > 0){
			$deal['type_info'] = $GLOBALS['db']->getRowCached("select * from ".DB_PREFIX."deal_loan_type where id = ".intval($_REQUEST['borrowtype'])." and is_effect = 1 and is_delete = 0");
		}
		
		$deal['borrow_amount_format'] = format_price(trim($_REQUEST['borrowamount']));
		$deal['rate_foramt'] = number_format(trim($_REQUEST['apr']),2);
		$deal['min_loan_money'] = 50;
		$deal['need_money'] = $deal['borrow_amount_format'];
		$deal['repay_time'] = trim($_REQUEST['repaytime']);
		//本息还款金额
			$deal['month_repay_money'] = format_price(pl_it_formula($deal['borrow_amount'],trim($_REQUEST['apr'])/12/100,$deal['repay_time']));
		
		$deal['progress_point'] = 0;
		$deal['buy_count'] = 0;
		$deal['voffice'] = intval($_REQUEST['voffice']);
		$deal['vjobtype'] = intval($_REQUEST['vjobtype']);
		
		$deal['description']= $_REQUEST['borrowdesc'];
		
		$deal['is_delete'] = 2;
		
		$u_info = get_user("*",$GLOBALS['user_info']['id']);
		$GLOBALS['tmpl']->assign("u_info",$u_info);
		$seo_title = $deal['seo_title']!=''?$deal['seo_title']:$deal['type_match_row'] . " - " . $deal['name'];
		$GLOBALS['tmpl']->assign("page_title",$seo_title);
		$seo_keyword = $deal['seo_keyword']!=''?$deal['seo_keyword']:$deal['type_match_row'].",".$deal['name'];
		$GLOBALS['tmpl']->assign("page_keyword",$seo_keyword.",");
		$seo_description = $deal['seo_description']!=''?$deal['seo_description']:$deal['name'];
		
		$GLOBALS['tmpl']->assign("seo_description",$seo_description.",");
		
		$GLOBALS['tmpl']->assign("deal",$deal);
		$GLOBALS['tmpl']->display("page/deal.html");
	}
	
	function bid(){
		if(!$GLOBALS['user_info']){
			set_gopreview();
			app_redirect(url("index","user#login")); 
		}
		
		//如果未绑定手机
		if(intval($GLOBALS['user_info']['mobilepassed'])==0 || intval($GLOBALS['user_info']['idcardpassed'])==0){
			$GLOBALS['tmpl']->assign("page_title","成为借出者");
			$GLOBALS['tmpl']->display("page/deal_mobilepaseed.html");
			exit();
		}
		
		$id = intval($_REQUEST['id']);
		$deal = get_deal($id);
		if(!$deal)
			app_redirect(url("index")); 
		
		if($deal['user_id'] == $GLOBALS['user_info']['id']){
			showErr($GLOBALS['lang']['CANT_BID_BY_YOURSELF']);
		}
		
		$seo_title = $deal['seo_title']!=''?$deal['seo_title']:$deal['type_match_row'] . " - " . $deal['name'];
		$GLOBALS['tmpl']->assign("page_title",$seo_title);
		$seo_keyword = $deal['seo_keyword']!=''?$deal['seo_keyword']:$deal['type_match_row'].",".$deal['name'];
		$GLOBALS['tmpl']->assign("page_keyword",$seo_keyword.",");
		$seo_description = $deal['seo_description']!=''?$deal['seo_description']:$deal['name'];

		$GLOBALS['tmpl']->assign("deal",$deal);
		$GLOBALS['tmpl']->display("page/deal_bid.html");
	}
	function dobidstepone(){
		if(!$GLOBALS['user_info'])
			showErr($GLOBALS['lang']['PLEASE_LOGIN_FIRST'],1);
			
		if($GLOBALS['user_info']['idcardpassed'] == 0){
			if(trim($_REQUEST['idno'])==""){
				showErr($GLOBALS['lang']['PLEASE_INPUT'].$GLOBALS['lang']['IDNO'],1);
			}
			if(trim($_REQUEST['idno'])!=trim($_REQUEST['idno_re'])){
				showErr($GLOBALS['lang']['TWO_ENTER_IDNO_ERROR'],1);
			}
			$data['idno'] = trim($_REQUEST['idno']);
			$data['idcardpassed'] = 1;
		}
		
		if($GLOBALS['user_info']['mobilepassed'] == 0){
			if(trim($_REQUEST['phone'])==""){
				showErr($GLOBALS['lang']['MOBILE_EMPTY_TIP'],1);
			}
			if(!check_mobile(trim($_REQUEST['phone']))){
				showErr($GLOBALS['lang']['FILL_CORRECT_MOBILE_PHONE'],1);
			}
			if(trim($_REQUEST['validateCode'])==""){
				showErr($GLOBALS['lang']['PLEASE_INPUT'].$GLOBALS['lang']['VERIFY_CODE'],1);
			}
			if(trim($_REQUEST['validateCode'])!=$GLOBALS['user_info']['bind_verify']){
				showErr($GLOBALS['lang']['BIND_MOBILE_VERIFY_ERROR'],1);
			}
			$data['mobile'] = trim($_REQUEST['phone']);
			$data['mobilepassed'] = 1;
		}
		if($data)
			$GLOBALS['db']->autoExecute(DB_PREFIX."user",$data,"UPDATE","id=".$GLOBALS['user_info']['id']);
		
		showSuccess($GLOBALS['lang']['SUCCESS_TITLE'],1);
	}
	
	function dobid(){
		$ajax = intval($_REQUEST["ajax"]);
		$id = intval($_REQUEST["id"]);
		if(!$GLOBALS['user_info'])
			showErr($GLOBALS['lang']['PLEASE_LOGIN_FIRST'],$ajax);
			
		$deal = get_deal($id);
		
		if(trim($_REQUEST["bid_money"])=="" || !is_numeric($_REQUEST["bid_money"]) || floatval($_REQUEST["bid_money"])<=0 || floatval($_REQUEST["bid_money"]) < $deal['min_loan_money']){
			showErr($GLOBALS['lang']['BID_MONEY_NOT_TRUE'],$ajax);
		}
		if(floatval($deal['max_loan_money']) >0){
			if(floatval($_REQUEST["bid_money"]) > floatval($deal['max_loan_money'])){
				showErr($GLOBALS['lang']['BID_MONEY_NOT_TRUE'],$ajax);
			}
	   }
		
		if((int)trim(app_conf('DEAL_BID_MULTIPLE')) > 0){
			 if(intval($_REQUEST["bid_money"])%(int)trim(app_conf('DEAL_BID_MULTIPLE'))!=0){
			 	showErr($GLOBALS['lang']['BID_MONEY_NOT_TRUE'],$ajax);
			 	exit();
			 }
		}
		
		
		if(!$deal){
			showErr($GLOBALS['lang']['PLEASE_SPEC_DEAL'],$ajax);
		}
		
		if(floatval($deal['progress_point']) >= 100){
			showErr($GLOBALS['lang']['DEAL_BID_FULL'],$ajax);
		}
		
		if(floatval($deal['deal_status']) != 1 ){
			showErr($GLOBALS['lang']['DEAL_FAILD_OPEN'],$ajax);
		}
		
		if(floatval($_REQUEST["bid_money"]) > $GLOBALS['user_info']['money']){
			showErr($GLOBALS['lang']['MONEY_NOT_ENOUGHT'],$ajax);
		}
		
		//判断所投的钱是否超过了剩余投标额度
		if(floatval($_REQUEST["bid_money"]) > ($deal['borrow_amount'] - $deal['load_money'])){
			showErr(sprintf($GLOBALS['lang']['DEAL_LOAN_NOT_ENOUGHT'],format_price($deal['borrow_amount'] - $deal['load_money'])),$ajax);
		}
		
		$data['user_id'] = $GLOBALS['user_info']['id'];
		$data['user_name'] = $GLOBALS['user_info']['user_name'];
		$data['deal_id'] = $id;
		$data['money'] = trim($_REQUEST["bid_money"]);
		$data['create_time'] = get_gmtime();
		
		$GLOBALS['db']->autoExecute(DB_PREFIX."deal_load",$data,"INSERT");
		$load_id = $GLOBALS['db']->insert_id();
		if($load_id > 0){
			//更改资金记录
			$msg = sprintf('编号%s的投标,付款单号%s',$id,$load_id);
			require_once APP_ROOT_PATH."system/libs/user.php";	
			modify_account(array('money'=>-trim($_REQUEST["bid_money"]),'score'=>0),$GLOBALS['user_info']['id'],$msg);
			$deal = get_deal($id);
			sys_user_status($GLOBALS['user_info']['id']);
			//超过一半的时候
			
			if($deal['deal_status']==1 && $deal['progress_point'] >= 50 && $deal['progress_point']<=60 && $deal['is_send_half_msg'] == 0)
			{
				$msg_conf = get_user_msg_conf($deal['user_id']);
				//邮件
				if(app_conf("MAIL_ON")){
					if(!$msg_conf || intval($msg_conf['mail_half'])==1){
						$load_tmpl = $GLOBALS['db']->getRowCached("select * from ".DB_PREFIX."msg_template where name = 'TPL_DEAL_HALF_EMAIL'");
						$user_info = $GLOBALS['db']->getRow("select email,user_name from ".DB_PREFIX."user where id = ".$deal['user_id']);
						$tmpl_content = $load_tmpl['content'];
						$notice['user_name'] = $user_info['user_name'];
						$notice['deal_name'] = $deal['name'];
						$notice['deal_url'] = get_domain().$deal['url'];
						$notice['site_name'] = app_conf("SHOP_TITLE");
						$notice['site_url'] = get_domain().APP_ROOT;
						$notice['help_url'] = get_domain().url("index","helpcenter");
						$notice['msg_cof_setting_url'] = get_domain().url("index","uc_msg#setting");
						
						
						$GLOBALS['tmpl']->assign("notice",$notice);
						
						$msg = $GLOBALS['tmpl']->fetch("str:".$tmpl_content);
						$msg_data['dest'] = $user_info['email'];
						$msg_data['send_type'] = 1;
						$msg_data['title'] = "您的借款列表“".$deal['name']."”招标过半！";
						$msg_data['content'] = addslashes($msg);
						$msg_data['send_time'] = 0;
						$msg_data['is_send'] = 0;
						$msg_data['create_time'] = get_gmtime();
						$msg_data['user_id'] =  $deal['user_id'];
						$msg_data['is_html'] = $load_tmpl['is_html'];
						$GLOBALS['db']->autoExecute(DB_PREFIX."deal_msg_list",$msg_data); //插入
					}
				}
				
				//站内信
				if(intval($msg_conf['sms_half'])==1){
					$content = "<p>您在".app_conf("SHOP_TITLE")."的借款“<a href=\"".$deal['url']."\">".$deal['name']."</a>”完成度超过50%"; 
					send_user_msg("",$content,0,$deal['user_id'],get_gmtime(),0,true,15);
				}
				
				//更新
				$GLOBALS['db']->autoExecute(DB_PREFIX."deal",array("is_send_half_msg"=>1),"UPDATE","id=".$id);
			}
			
			showSuccess($GLOBALS['lang']['DEAL_BID_SUCCESS'],$ajax,url("index","deal",array("id"=>$id)));
		}
		else{
			showErr($GLOBALS['lang']['ERROR_TITLE'],$ajax);
		}
	}
}
?>
