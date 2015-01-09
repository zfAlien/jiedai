<?php
// +----------------------------------------------------------------------
// | Fanwe 方维p2p借贷系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 云淡风轻(88522820@qq.com)
// +----------------------------------------------------------------------

require APP_ROOT_PATH.'app/Lib/uc.php';
class uc_investModule extends SiteBaseModule
{
	public function index(){
		$this->getlist("index");
	}
	public function invite(){
		$this->getlist("invite");
	}
	public function ing(){
		$this->getlist("ing");
	}
	public function over(){
		$this->getlist("over");
	}
	public function bad(){
		$this->getlist("bad");
	}
	
    private function getlist($mode = "index") {
    	$user_id = $GLOBALS['user_info']['id'];
    	
    	$condtion = "   AND d.deal_status in(1,2,4,5)  ";
    	switch($mode){
    		case "index" :
    			$condtion = "   AND d.deal_status in(1,2,4,5)  ";
    			break;
    		case "invite" :
    			$condtion = "   AND d.deal_status in(1,2)  ";
    			break;
    		case "ing" :
    			$condtion = "   AND d.deal_status =4  ";
    			break;
    		case "over" :
    			$condtion = "   AND d.deal_status =5  ";
    			break;
    		case "bad" :
    			$condtion = "   AND d.deal_status = 4 AND (".get_gmtime()." - last_repay_time)/24/3600 >=".trim(app_conf("YZ_IMPSE_DAY"))." and last_repay_time > 0 ";
    			break;
    	}
    	
    	$page = intval($_REQUEST['p']);
		if($page==0)
		$page = 1;
		$limit = (($page-1)*app_conf("PAGE_SIZE")).",".app_conf("PAGE_SIZE");
    	
    	$sql = "select d.*,u.user_name,dl.money as u_load_money,u.level_id,u.province_id,u.city_id from ".DB_PREFIX."deal d left join ".DB_PREFIX."deal_load as dl on d.id = dl.deal_id LEFT JOIN ".DB_PREFIX."user u ON u.id=d.user_id where dl.user_id = ".$user_id." $condtion group by dl.id order by dl.create_time desc limit ".$limit;
		$sql_count = "select count(DISTINCT dl.id) from ".DB_PREFIX."deal d left join ".DB_PREFIX."deal_load as dl on d.id = dl.deal_id where dl.user_id = ".$user_id." $condtion ";
		$list = $GLOBALS['db']->getAll($sql);
		foreach($list as $k=>$v){
			$list[$k]['borrow_amount_format'] = format_price($v['borrow_amount']);
			
			$list[$k]['rate_foramt'] = number_format($v['rate'],2);
			//本息还款金额
			$list[$k]['month_repay_money'] = pl_it_formula($v['borrow_amount'],$v['rate']/12/100,$v['repay_time']);
			$list[$k]['month_repay_money_format'] =  format_price($list[$k]['month_repay_money']);
			
			if($v['deal_status'] == 1){
				//还需多少钱
				$list[$k]['need_money'] = format_price($v['borrow_amount'] - $v['load_money']);
				
				//百分比
				$list[$k]['progress_point'] = $v['load_money']/$v['borrow_amount']*100;
				
			}
			elseif($v['deal_status'] == 2 || $v['deal_status'] == 5)
			{
				$list[$k]['progress_point'] = 100;
			}
			elseif($v['deal_status'] == 4){
				//百分比
				$list[$k]['remain_repay_money'] = $list[$k]['month_repay_money'] * $v['repay_time'];
				//还有多少需要还
				$list[$k]['need_remain_repay_money'] = $list[$k]['remain_repay_money'] - $v['repay_money'];
				//还款进度条
				$list[$k]['progress_point'] =  round($v['repay_money']/$list[$k]['remain_repay_money']*100,2);
			}
			
			$user_location = $GLOBALS['db']->getOneCached("select name from ".DB_PREFIX."region_conf where id = ".$v['city_id']);
			if($user_location=='')
				$user_location = $GLOBALS['db']->getOneCached("select name from ".DB_PREFIX."region_conf where id = ".$v['province_id']);
		
			$list[$k]['user_location'] = $user_location;
			$list[$k]['point_level'] = $GLOBALS['db']->getOne("select name from ".DB_PREFIX."user_level where id = ".intval($v['level_id']));
		}
		$count = $GLOBALS['db']->getOne($sql_count);
		
		$GLOBALS['tmpl']->assign("list",$list);
		$page = new Page($count,app_conf("PAGE_SIZE"));   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);
    	
    	$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['UC_INVEST']);
    	
    	$GLOBALS['tmpl']->assign("inc_file","inc/uc/uc_invest.html");
		$GLOBALS['tmpl']->display("page/uc.html");
    }
    
    public function refdetail(){
    	$user_id = $GLOBALS['user_info']['id'];
		$id = intval($_REQUEST['id']);
		require APP_ROOT_PATH."app/Lib/deal.php";
		$deal = get_deal($id);
		if(!$deal || $deal['deal_status']<4){
			showErr("操作失败！");
		}
		$GLOBALS['tmpl']->assign('deal',$deal);
		
		$deal_load_list = get_deal_load_list($deal);
		
		//获取本期的投标记录
		$temp_user_load_ids = $GLOBALS['db']->getAll("SELECT deal_id,user_id,money FROM ".DB_PREFIX."deal_load WHERE deal_id=".$id);
		$user_load_ids = array();
		$i = 0;
		foreach($temp_user_load_ids as $k=>$v){
			if($v['user_id'] == $user_id){
				$v['repay_start_time'] = $deal['repay_start_time'];
				$v['repay_time'] = $deal['repay_time'];
				$v['rate'] = $deal['rate'];
				$v['u_key'] = $k;
				$v['load'] = get_deal_user_load_list($v,$deal['loantype'],$deal['repay_time_type']);
				foreach($v['load'] as $kk=>$vv){
					$v['impose_money'] += $vv['impose_money'];
					$v['manage_fee'] += $vv['month_manage_money'];
					$v['repay_money'] += $vv['month_has_repay_money'];
				}
				$user_load_ids[$i] = $v;
				$i ++;
			}
		}
		
		$GLOBALS['tmpl']->assign('user_load_ids',$user_load_ids);
		
		$inrepay_info = $GLOBALS['db']->getRow("SELECT * FROM ".DB_PREFIX."deal_inrepay_repay WHERE deal_id=$id");
		$GLOBALS['tmpl']->assign("inrepay_info",$inrepay_info);
		
		$GLOBALS['tmpl']->assign("page_title","我的回款");
		$GLOBALS['tmpl']->assign("inc_file","inc/uc/uc_invest_refdetail.html");
		$GLOBALS['tmpl']->display("page/uc.html");	
    }
}
?>