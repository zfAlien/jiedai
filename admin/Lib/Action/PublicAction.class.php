<?php
// +----------------------------------------------------------------------
// | Fanwe 方维p2p借贷系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 云淡风轻(88522820@qq.com)
// +----------------------------------------------------------------------

//开放的公共类，不需RABC验证
class PublicAction extends BaseAction{
	public function login()
	{		
		//验证是否已登录
		//管理员的SESSION
		$adm_session = es_session::get(md5(conf("AUTH_KEY")));
		$adm_name = $adm_session['adm_name'];
		$adm_id = intval($adm_session['adm_id']);
		
		if($adm_id != 0)
		{
			//已登录
			$this->redirect(u("Index/index"));			
		}
		else
		{
			$this->display();
		}
	}
	public function verify()
	{	
        Image::buildImageVerify(4,1);
    }
    
    //登录函数
    public function do_login()
    {		
    	$adm_name = trim($_REQUEST['adm_name']);
    	$adm_password = trim($_REQUEST['adm_password']);
    	$ajax = intval($_REQUEST['ajax']);  //是否ajax提交

    	if($adm_name == '')
    	{
    		$this->error(L('ADM_NAME_EMPTY',$ajax));
    	}
    	if($adm_password == '')
    	{
    		$this->error(L('ADM_PASSWORD_EMPTY',$ajax));
    	}
    	if(es_session::get("verify") != md5($_REQUEST['adm_verify'])) {
			$this->error(L('ADM_VERIFY_ERROR'),$ajax);
		}
		
		$condition['adm_name'] = $adm_name;
		$condition['is_effect'] = 1;
		$condition['is_delete'] = 0;
		$adm_data = M("Admin")->where($condition)->find();
		if($adm_data) //有用户名的用户
		{
			if($adm_data['adm_password']!=md5($adm_password))
			{
				save_log($adm_name.L("ADM_PASSWORD_ERROR"),0); //记录密码登录错误的LOG
				$this->error(L("ADM_PASSWORD_ERROR"),$ajax);
			}
			else
			{
				//登录成功
				$adm_session['adm_name'] = $adm_data['adm_name'];
				$adm_session['adm_id'] = $adm_data['id'];
				
				
				es_session::set(md5(conf("AUTH_KEY")),$adm_session);
				
				//重新保存记录
				$adm_data['login_ip'] = get_client_ip();
				$adm_data['login_time'] = get_gmtime();
				M("Admin")->save($adm_data);
				save_log($adm_data['adm_name'].L("LOGIN_SUCCESS"),1);
				$this->success(L("LOGIN_SUCCESS"),$ajax);
			}
		}
		else
		{
			save_log($adm_name.L("ADM_NAME_ERROR"),0); //记录用户名登录错误的LOG
			$this->error(L("ADM_NAME_ERROR"),$ajax);
		}
    }
	
    //登出函数
	public function do_loginout()
	{
	//验证是否已登录
		//管理员的SESSION
		$adm_session = es_session::get(md5(conf("AUTH_KEY")));
		$adm_id = intval($adm_session['adm_id']);
		
		if($adm_id == 0)
		{
			//已登录
			$this->redirect(u("Public/login"));			
		}
		else
		{
			es_session::delete(md5(conf("AUTH_KEY")));
			$this->assign("jumpUrl",U("Public/login"));
			$this->assign("waitSecond",3);
			$this->success(L("LOGINOUT_SUCCESS"));
		}
	}
	
	/**
	 * 获取半小时内未确认的订单!
	 */
	public function checkSupplierBooking(){
		$now_time = get_gmtime();
		$e_time = $now_time - 60*30;
		$b_time = $e_time - 3600;
		
		$list = M("SupplierLocationOrder")->where("status=0 AND create_time between $b_time AND $e_time ")->findAll();
		
		$this->assign("list",$list);
		$this->display();
	}
	
	public function checkIdCard(){
		$return['status'] = 0;
		$card = trim($_REQUEST['card']);
		$url = "http://www.youdao.com/smartresult-xml/search.s?jsFlag=true&type=id&q=".$card;
		$result = $this->getUrlContent($url);
		
		$result = iconv("gbk","UTF-8",$result);	
		preg_match("/{(.*?)}/",$result,$res);
		if($res[0]){
			$return = $res[0];
			echo str_replace("'","\"",$return);
		}
		else{
			$return['status'] = 0;
			$return['info'] = '没找到';
			echo json_encode($return);
		}		
		
	}
	
	public function getUrlContent($url)
	{
		$content = '';
		if(!$this->parseUrl($url))
		{
			$content = @file_get_contents($url);
		}
		else
		{
			if(function_exists('curl_init'))
			{
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$url);
				curl_setopt($ch, CURLOPT_TIMEOUT,100);
				curl_setopt($ch, CURLOPT_USERAGENT, _USERAGENT_);
				curl_setopt($ch, CURLOPT_REFERER,_REFERER_);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$content = curl_exec($ch);
				curl_close($ch);
			}
			else
			{
				$content = @file_get_contents($url);
			}
		}
	
		return $content;
	}
	
	/**
	 * 获取链接格式是否正确
	 * @param string $url 链接
	 * @return bool
 	*/
	function parseUrl($url)
	{
		$parse_url = parse_url($url);
		return (!empty($parse_url['scheme']) && !empty($parse_url['host']));
	}
		
}
?>