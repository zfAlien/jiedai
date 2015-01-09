<?php echo $this->fetch('inc/header.html'); ?>
<div class="blank"></div>
<div class="wrap clearfix">
	<div class="toptitle">申请贷款</div>
	<div class="line950"></div>
	<div id="borrowlb">
  		<div class="borrowbbox">
        	<img src="<?php echo $this->_var['TMPL']; ?>/images/loan.jpg">
       		<ul class="clearfix">
            	<li class="loan_01"><a href="<?php
echo parse_url_tag("u:index|borrow#stepone|"."".""); 
?>">申请贷款</a></li>
       			<li class="loan_02"><?php if ($this->_var['disable_apply'] == 1): ?><img src="<?php echo $this->_var['TMPL']; ?>/images/loan_bt02gray.jpg" /><?php else: ?><a href="<?php
echo parse_url_tag("u:index|borrow#applyamount|"."".""); 
?>">申请信用额度</a><?php endif; ?></li>
            </ul>   
        </div>
  	</div>
</div>
<div class="blank"></div>
<?php echo $this->fetch('inc/footer.html'); ?>