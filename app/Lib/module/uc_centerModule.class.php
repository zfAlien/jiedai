<?php
// +----------------------------------------------------------------------
// | Fanwe 方维p2p借贷系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 云淡风轻(88522820@qq.com)
// +----------------------------------------------------------------------

require APP_ROOT_PATH.'app/Lib/uc.php';

class uc_centerModule extends SiteBaseModule
{
	private $space_user;
	public function init_main()
	{
//		$user_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id = ".intval($GLOBALS['user_info']['id']));		
//		require_once APP_ROOT_PATH."system/extend/ip.php";		
//		$iplocation = new iplocate();
//		$address=$iplocation->getaddress($user_info['login_ip']);
//		$user_info['from'] = $address['area1'].$address['area2'];
		$GLOBALS['tmpl']->assign('user_auth',get_user_auth());
	}
	
	public function init_user(){
		$this->user_data = $GLOBALS['user_info'];
		
		$province_str = $GLOBALS['db']->getOne("select name from ".DB_PREFIX."region_conf where id = ".$this->user_data['province_id']);
		$city_str = $GLOBALS['db']->getOne("select name from ".DB_PREFIX."region_conf where id = ".$this->user_data['city_id']);
		if($province_str.$city_str=='')
			$user_location = $GLOBALS['lang']['LOCATION_NULL'];
		else 
			$user_location = $province_str." ".$city_str;
		
		$this->user_data['fav_count'] = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."topic where user_id = ".$this->user_data['id']." and fav_id <> 0");
		$this->user_data['user_location'] = $user_location;
		$this->user_data['group_name'] = $GLOBALS['db']->getOne("select name from ".DB_PREFIX."user_group where id = ".$this->user_data['group_id']." ");
		
		$GLOBALS['tmpl']->assign('user_statics',sys_user_status($GLOBALS['user_info']['id'],true));
	}
	
	public function index()
	{	
		$this->init_user();
		$user_info = $this->user_data;
			 
		$ajax =intval($_REQUEST['ajax']);
		if($ajax==0)
		{
			$this->init_main();			
		}
		$user_id = intval($GLOBALS['user_info']['id']);	
		//输出发言列表
		$page = intval($_REQUEST['p']);
		if($page==0)
		$page = 1;
		$limit = (($page-1)*app_conf("PAGE_SIZE")).",".app_conf("PAGE_SIZE");
					
		$result = get_topic_list($limit," (user_id = ".$user_info['id']." OR (fav_id = ".$user_info['id']." AND type='focus') OR (l_user_id =".$user_info['id']." AND type='message' )) ");
			
		$GLOBALS['tmpl']->assign("topic_list",$result['list']);
		$page = new Page($result['total'],app_conf("PAGE_SIZE"));   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);
		$GLOBALS['tmpl']->assign("user_data",$user_info);
		if($ajax==0)
		{
			$list_html = $GLOBALS['tmpl']->fetch("inc/topic_col_list.html");
			
			$GLOBALS['tmpl']->assign("list_html",$list_html);
			$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['UC_CENTER_INDEX']);
			$GLOBALS['tmpl']->assign("post_title",$GLOBALS['lang']['UC_CENTER_INDEX']);			
			$GLOBALS['tmpl']->assign("inc_file","inc/uc/uc_center_index.html");
			$GLOBALS['tmpl']->display("page/uc.html");	
		}
		else
		{
			header("Content-Type:text/html; charset=utf-8");
			echo $GLOBALS['tmpl']->fetch("inc/topic_col_list.html");
		}
			
		
	}
	
	public function focustopic()
	{	
		$this->init_user();
		$user_info = $this->user_data;
		$ajax =intval($_REQUEST['ajax']);
		if($ajax==0)
		{ 
			$this->init_main();	
		}
		$user_id = intval($GLOBALS['user_info']['id']);
		//输出发言列表
		$page = intval($_REQUEST['p']);
		if($page==0)
		$page = 1;
		$limit = (($page-1)*app_conf("PAGE_SIZE")).",".app_conf("PAGE_SIZE");
					
		//开始输出相关的用户日志
		$uids = $GLOBALS['db']->getOne("select group_concat(focused_user_id) from ".DB_PREFIX."user_focus where focus_user_id = ".$user_info['id']." ");

		if($uids)
		{
			$uids = trim($uids,",");	
			$result = get_topic_list($limit," user_id in (".$uids.") ");
		}
		
		$GLOBALS['tmpl']->assign("topic_list",$result['list']);
		$page = new Page($result['total'],app_conf("PAGE_SIZE"));   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);
		$GLOBALS['tmpl']->assign('user_data',$user_info);
		if($ajax==0)
		{	
			$list_html = $GLOBALS['tmpl']->fetch("inc/topic_col_list.html");
			$GLOBALS['tmpl']->assign("list_html",$list_html);
			$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['UC_CENTER_MYFAV']);
			$GLOBALS['tmpl']->assign("post_title",$GLOBALS['lang']['UC_CENTER_MYFAV']);			
			$GLOBALS['tmpl']->assign("inc_file","inc/uc/uc_center_index.html");
			$GLOBALS['tmpl']->display("page/uc.html");	
		}
		else
		{
			header("Content-Type:text/html; charset=utf-8");
			echo $GLOBALS['tmpl']->fetch("inc/topic_col_list.html");
		}
	}
	
	
	public function lend()
	{
		$this->init_user();
		$user_info = $this->user_data;
		$ajax =intval($_REQUEST['ajax']);
		if($ajax==0)
		{ 
			$this->init_main();
		}
		$user_id = intval($user_info['id']);	
		//输出发言列表
		$page = intval($_REQUEST['p']);
		if($page==0)
		$page = 1;
		$limit = (($page-1)*app_conf("PAGE_SIZE")).",".app_conf("PAGE_SIZE");
		
		$result['total'] = $GLOBALS['db']->getOne("SELECT count(*) FROM ".DB_PREFIX."deal_load WHERE user_id=".$user_id);
		$result['list'] = $GLOBALS['db']->getAll("SELECT dl.*,d.rate,d.repay_time,d.repay_time_type,d.deal_status,d.name FROM ".DB_PREFIX."deal_load dl LEFT JOIN ".DB_PREFIX."deal d ON dl.deal_id = d.id WHERE dl.user_id=".$user_id);
		
		$page = new Page($result['total'],app_conf("PAGE_SIZE"));   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);
		
		$GLOBALS['tmpl']->assign("lend_list",$result['list']);
		$GLOBALS['tmpl']->assign("user_data",$user_info);
		
		if($ajax==0)
		{	
			$list_html = $GLOBALS['tmpl']->fetch("inc/uc/uc_center_lend.html");
			$GLOBALS['tmpl']->assign("list_html",$list_html);
			$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['UC_CENTER_LEND']);
			$GLOBALS['tmpl']->assign("post_title",$GLOBALS['lang']['UC_CENTER_LEND']);			
			$GLOBALS['tmpl']->assign("inc_file","inc/uc/uc_center_index.html");
			$GLOBALS['tmpl']->display("page/uc.html");	
		}
		else
		{
			header("Content-Type:text/html; charset=utf-8");
			echo $GLOBALS['tmpl']->fetch("inc/uc_center_lend.html");
		}
	}
	
	
	public function deal()
	{	
		$this->init_user();
		$user_info = $this->user_data;	
		$ajax =intval($_REQUEST['ajax']);
		if($ajax==0)
		{ 
			$this->init_main();	
		}
		$user_id = intval($user_info['id']);
		
		//输出借款记录
		$page = intval($_REQUEST['p']);
		if($page==0)
		$page = 1;
		$limit = (($page-1)*app_conf("PAGE_SIZE")).",".app_conf("PAGE_SIZE");
			
		require_once (APP_ROOT_PATH."app/Lib/deal.php");
		
		$result = get_deal_list($limit,0,"user_id=".$user_id,"id DESC");

		$GLOBALS['tmpl']->assign("deal_list",$result['list']);
		
		$page = new Page($result['count'],app_conf("PAGE_SIZE"));   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);
		
		$GLOBALS['tmpl']->assign('user_data',$user_info);
		if($ajax==0)
		{	
			$list_html = $GLOBALS['tmpl']->fetch("inc/uc/uc_center_deals.html");
			$GLOBALS['tmpl']->assign("list_html",$list_html);
			$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['UC_CENTER_MYDEAL']);
			$GLOBALS['tmpl']->assign("post_title",$GLOBALS['lang']['UC_CENTER_MYDEAL']);			
			$GLOBALS['tmpl']->assign("inc_file","inc/uc/uc_center_index.html");
			$GLOBALS['tmpl']->display("page/uc.html");	
		}
		else
		{
			header("Content-Type:text/html; charset=utf-8");
			echo $GLOBALS['tmpl']->fetch("inc/uc/uc_center_deals.html");
		}
	}
	
	
	
	public function mayfocus()
	{
		$user_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id = ".intval($GLOBALS['user_info']['id']));		
		$GLOBALS['tmpl']->assign("user_data",$user_info);
		$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['YOU_MAY_FOCUS']);		
		$GLOBALS['tmpl']->assign("inc_file","inc/uc/uc_center_mayfocus.html");
		$GLOBALS['tmpl']->display("page/uc.html");
	}
	public function fans()
	{
		$user_info = $this->user_data;
				
		$page_size = 24;
		
		$page = intval($_REQUEST['p']);
		if($page==0)
		$page = 1;
		$limit = (($page-1)*$page_size).",".$page_size;
	
		$user_id = intval($GLOBALS['user_info']['id']);
		
		//输出粉丝
		$fans_list = $GLOBALS['db']->getAll("select focus_user_id as id,focus_user_name as user_name from ".DB_PREFIX."user_focus where focused_user_id = ".$user_id." order by id desc limit ".$limit);
		$total = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."user_focus where focused_user_id = ".$user_id);
		
		foreach($fans_list as $k=>$v)
		{			
			$focus_uid = intval($v['id']);
			$focus_data = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user_focus where focus_user_id = ".$user_id." and focused_user_id = ".$focus_uid);
			if($focus_data)
			$fans_list[$k]['focused'] = 1;
		}
		$GLOBALS['tmpl']->assign("fans_list",$fans_list);	

		$page = new Page($total,$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);
		
		
		$GLOBALS['tmpl']->assign("user_data",$user_info);
		$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['MY_FANS']);		
		$GLOBALS['tmpl']->assign("inc_file","inc/uc/uc_center_fans.html");
		$GLOBALS['tmpl']->display("page/uc.html");
	}
	
	
	public function focus()
	{
		$this->init_user();
		$user_info = $this->user_data;
				
		$page_size = 24;
		
		$page = intval($_REQUEST['p']);
		if($page==0)
		$page = 1;
		$limit = (($page-1)*$page_size).",".$page_size;
	
		$user_id = intval($GLOBALS['user_info']['id']);
		
		//输出粉丝
		$focus_list = $GLOBALS['db']->getAll("select focused_user_id as id,focused_user_name as user_name from ".DB_PREFIX."user_focus where focus_user_id = ".$user_id." order by id desc limit ".$limit);
		$total = $GLOBALS['db']->getOne("select count(*) from ".DB_PREFIX."user_focus where focus_user_id = ".$user_id);
		
		foreach($focus_list as $k=>$v)
		{			
			$focus_uid = intval($v['id']);
			$focus_data = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user_focus where focus_user_id = ".$user_id." and focused_user_id = ".$focus_uid);
			if($focus_data)
			$focus_list[$k]['focused'] = 1;
		}
		$GLOBALS['tmpl']->assign("focus_list",$focus_list);	

		$page = new Page($total,$page_size);   //初始化分页对象 		
		$p  =  $page->show();
		$GLOBALS['tmpl']->assign('pages',$p);
		
		
		$list_html = $GLOBALS['tmpl']->fetch("inc/uc/uc_center_focus.html");
		$GLOBALS['tmpl']->assign("list_html",$list_html);
		$GLOBALS['tmpl']->assign("user_data",$user_info);
		$GLOBALS['tmpl']->assign("user_id",$user_id);
		$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['MY_FOCUS']);	
		
			
		$GLOBALS['tmpl']->assign("inc_file","inc/uc/uc_center_index.html");
		$GLOBALS['tmpl']->display("page/uc.html");
	}
	
	
	public function setweibo()
	{
		$user_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id = ".intval($GLOBALS['user_info']['id']));
				
		$apis = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."api_login where is_weibo = 1");
		
		foreach($apis as $k=>$v)
		{
			if($user_info[strtolower($v['class_name'])."_id"])
			{
				$apis[$k]['is_bind'] = 1;
				if($user_info["is_syn_".strtolower($v['class_name'])]==1)
				{
					$apis[$k]['is_syn'] = 1;
				}
				else
				{
					$apis[$k]['is_syn'] = 0;
				}
			}
			else
			{
				$apis[$k]['is_bind'] = 0;
			}
			
//			if(file_exists(APP_ROOT_PATH."system/api_login/".$v['class_name']."_api.php"))
//			{
//				require_once APP_ROOT_PATH."system/api_login/".$v['class_name']."_api.php";
//				$api_class = $v['class_name']."_api";
//				$api_obj = new $api_class($v);
//				$url = $api_obj->get_bind_api_url();
//				$apis[$k]['url'] = $url;
//			}
		}		
		$GLOBALS['tmpl']->assign("apis",$apis);
		$GLOBALS['tmpl']->assign("user_data",$user_info);
		$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['SETWEIBO']);		
		$GLOBALS['tmpl']->assign("inc_file","inc/uc/uc_center_setweibo.html");
		$GLOBALS['tmpl']->display("page/uc.html");
	}
}
?>