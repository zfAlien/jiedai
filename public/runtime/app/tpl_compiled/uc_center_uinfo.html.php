<div class="uc_user_info">
	<div class="cont homeBg">
	    <div class="blank5"></div>
	    <div class="clearfix lh22" style="height: 22px;vertical-align: middle">
	        <div class="f_r">
				<input type="button" value="修改我的个人信息" onclick="window.location.href='<?php
echo parse_url_tag("u:index|uc_account|"."".""); 
?>'" class="modify_ac_btn">
			</div>
	        <div class="f_blue f14 b tc">
	            <span><?php echo $this->_var['user_data']['user_name']; ?> 的个人信息</span>
	        </div>
	    </div>
	    <div class="pt5 pb5" style="border-bottom:1px solid #D8DFEA;"></div>
	
	    <div class="clearfix pt10 mt10 mb15 ml20">
	        <div class="f_l pr30" style="width:132px;">
	            <div>
	            	<img class="img_b" src="<?php 
$k = array (
  'name' => 'get_user_avatar',
  'uid' => $this->_var['user_data']['id'],
  'type' => 'big',
);
echo $k['name']($k['uid'],$k['type']);
?>" width="128px" height="128px" alt="<?php echo $this->_var['user_data']['name']; ?>" title="<?php echo $this->_var['user_data']['name']; ?>">
	            </div>
	        </div>
	        <div class="f_l f_dgray" style="width:250px">
	            <div class="lh24" style="height:24px;">
	                <div class="f_l" style="width:70px;">
					用户名：
	                </div>
	                <div class="f_l">
	                	<?php echo $this->_var['user_data']['user_name']; ?>
	                </div>
	            </div>
	            <div style="height:24px; line-height:24px">
	                <div class="f_l" style="width:70px;">
					注册时间：
	                </div>
	                <div class="f_l">
	                    <?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['user_data']['create_time'],
  'f' => 'Y-m-d',
);
echo $k['name']($k['v'],$k['f']);
?>
	                </div>
	            </div>
	            <div style="height:24px; line-height:24px">
	                <div class="f_l" style="width:70px;">
					所在地：
	                </div>
	                <div class="f_l"><?php echo $this->_var['user_data']['user_location']; ?></div>
	            </div>
	            <div style="height:24px; line-height:24px">
	                <div class="f_l" style="width:70px;">
					角色：
	                </div>
	                <div class="f_l">
	                	<?php echo $this->_var['user_data']['group_name']; ?><?php if ($this->_var['user_data']['deal_count'] > 0): ?> 借入者<?php endif; ?> <?php if ($this->_var['user_data']['load_count'] > 0): ?> 借出者<?php endif; ?>  
					</div>
	            </div>
	            <div style="height:24px; line-height:24px">
	                <div class="f_l" style="width:70px;">
					个人统计：
	                </div>
	                <div class="f_l">
	                    <?php echo $this->_var['user_statics']['deal_count']; ?> 条借款记录， <?php echo $this->_var['user_statics']['load_count']; ?>条投标记录
	                </div>
	            </div>
	            <div style="height:24px; line-height:24px">
	            </div>
	        </div>
	        <div class="r" style="display:none;width:260px;">
	            <div class="layout-box">
	                <div class="top">
	                    <b class="cor-l"></b>
	                    <b class="cor-r"></b>
	                </div>
	                <div class="cont" style="height:145px; ">
	                    <h3>个人描述</h3>
	                    <p>
	                        
	                    </p>
	                </div>
	                <div class="bt">
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>