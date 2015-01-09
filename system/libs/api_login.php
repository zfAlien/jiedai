<?php
// +----------------------------------------------------------------------
// | Fanwe 方维p2p借贷系统
// +----------------------------------------------------------------------

/**
 * api 登录的接口标准
 */
interface api_login{
	
	function get_api_url();  //用于获取同步登录的api访问url
	
	function callback();     //用于处理 api 访问回调的callback
	
	function get_title();    //后台列表调用的显示信息
	
	function create_user();  //创建用户
	
	function get_big_api_url(); //用于获取同步登录的api访问url，大图标
	
}
?>