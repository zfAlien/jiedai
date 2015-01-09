<?php echo $this->fetch('inc/header.html'); ?>
<div class="blank"></div>
<div class="wrap clearfix">
	<div class="toptitle">申请贷款</div>
	<div class="line950"></div>
	<div class="clearfix">
    	<?php echo $this->fetch('inc/borrow/borrow_step_left.html'); ?>
		<div class="rightlendstep">
			<?php if ($this->_var['step'] == 1 && $this->_var['user_statics']['success_deal_count'] == 0): ?>
			<div id="dashboard" class="dashboard ddbg clearfix">
				<ul>
					<li <?php if ($this->_var['status'] == 1): ?>class="current"<?php endif; ?>>
						<a href="<?php
echo parse_url_tag("u:index|borrow#stepone|"."status=1".""); 
?>">个人详细信息</a>
					</li>
					<?php if ($this->_var['user_info']['real_name'] != "" && $this->_var['user_info']['idno'] != "" && $this->_var['user_info']['mobile'] != "" && $this->_var['user_info']['marriage'] != "" && $this->_var['user_info']['address'] != ""): ?>		
					<li <?php if ($this->_var['status'] == 2): ?>class="current"<?php endif; ?>>
						<a href="<?php
echo parse_url_tag("u:index|borrow#stepone|"."status=2".""); 
?>">工作认证信息</a>
					</li>
					<?php if ($this->_var['work_count'] > 0): ?>
					<li <?php if ($this->_var['status'] == 3): ?>class="current"<?php endif; ?>>
						<a href="<?php
echo parse_url_tag("u:index|borrow#stepone|"."status=3".""); 
?>">贷款申请</a>
					</li>
					<?php endif; ?>	
					<?php endif; ?>									
				</ul>
			</div>
			<?php endif; ?>
			<?php echo $this->fetch($this->_var['inc_file']); ?>
		</div>
    </div>
</div>
<div class="blank"></div>
<?php echo $this->fetch('inc/footer.html'); ?>