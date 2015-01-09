<?php echo $this->fetch('inc/uc/uc_center_uinfo.html'); ?>
<div class="blank"></div>
<div id="dashboard" class="dashboard">
	<ul>
		<li <?php if ($this->_var['ACTION_NAME'] == 'index'): ?>class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:index|uc_center#index|"."".""); 
?>"><?php echo $this->_var['LANG']['UC_CENTER_INDEX']; ?></a></li>
		<li <?php if ($this->_var['ACTION_NAME'] == 'focus'): ?>class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:index|uc_center#focus|"."".""); 
?>"><?php echo $this->_var['LANG']['MY_FOCUS']; ?></a></li>
		<li <?php if ($this->_var['ACTION_NAME'] == 'focustopic'): ?>class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:index|uc_center#focustopic|"."".""); 
?>"><?php echo $this->_var['LANG']['UC_CENTER_FOCUSTOPIC']; ?></a></li>
		<li <?php if ($this->_var['ACTION_NAME'] == 'deal'): ?>class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:index|uc_center#deal|"."".""); 
?>"><?php echo $this->_var['LANG']['UC_CENTER_MYDEAL']; ?></a></li>
		<li <?php if ($this->_var['ACTION_NAME'] == 'lend'): ?>class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:index|uc_center#lend|"."".""); 
?>"><?php echo $this->_var['LANG']['UC_CENTER_LEND']; ?></a></li>
	</ul>
</div>
<div class="uc_r_bl_box clearfix p10">
<?php echo $this->_var['list_html']; ?>
</div>