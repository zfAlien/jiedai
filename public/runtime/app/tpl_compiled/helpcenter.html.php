<?php echo $this->fetch('inc/header.html'); ?>
<style type="text/css">
	.faq .b {
		color: #57A40E;
		font-weight: 600;
		padding: 10px 0 0;
	}
</style>
<div class="blank"></div>
<div class="wrap clearfix wb">
	<div class="short_uc f_l">
		<dl id="uc_cate">
			<?php $_from = $this->_var['article_cate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'cate');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['cate']):
?>
			<?php if ($this->_var['cate']['pid'] != 0): ?>
				<div class="c_hd">
				    <?php echo $this->_var['cate']['title']; ?>
				</div>
				<div class="c_body">
					<ul>
					<?php $_from = $this->_var['cate']['article']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'aitem');if (count($_from)):
    foreach ($_from AS $this->_var['aitem']):
?>
					<li>
					    <a href="#q<?php echo $this->_var['aitem']['id']; ?>"><?php echo $this->_var['aitem']['title']; ?></a>
					</li>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</ul>	
				</div>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</dl>
	</div>
	<div class="long_uc f_r faq" style="overflow:inherit;">
			<?php $_from = $this->_var['article_cate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate');if (count($_from)):
    foreach ($_from AS $this->_var['cate']):
?>
				<?php if ($this->_var['cate']['pid'] != 0): ?>
				<?php $_from = $this->_var['cate']['article']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'aitem');if (count($_from)):
    foreach ($_from AS $this->_var['aitem']):
?>
				<div class="clearfix bddf">
					<div class="gray_title f14" id="q<?php echo $this->_var['aitem']['id']; ?>" name="q<?php echo $this->_var['aitem']['id']; ?>">
						<?php echo $this->_var['aitem']['title']; ?>
                  	</div>
					<div class="clearfix f_dgray" style="padding:3px 20px">
					<?php echo $this->_var['aitem']['content']; ?>
					</div>
				</div>
				<div class="blank5"></div>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</div>
</div>
<div class="blank"></div>
<?php echo $this->fetch('inc/footer.html'); ?>