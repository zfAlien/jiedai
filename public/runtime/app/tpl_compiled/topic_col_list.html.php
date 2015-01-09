<?php if ($this->_var['topic_list']): ?>
<div class="topic-list pr5 pl5">
	<?php $_from = $this->_var['topic_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
		<div class="item bbd pt10 pb10 clearfix">
			<div class="f_l">
				<?php if ($this->_var['item']['type'] == 'focus'): ?>
					<?php if ($this->_var['user_info']['id'] == $this->_var['item']['user_id']): ?>
					我
					<?php else: ?>
					<a href="<?php
echo parse_url_tag("u:index|space|"."id=".$this->_var['item']['user_id']."".""); 
?>"><?php echo $this->_var['item']['user_name']; ?></a>
					<?php endif; ?>
					开始关注
					<?php if ($this->_var['user_info']['id'] == $this->_var['item']['fav_id']): ?>
					我
					<?php else: ?>
					<?php 
$k = array (
  'name' => 'get_user_name',
  'value' => $this->_var['item']['fav_id'],
);
echo $k['name']($k['value']);
?>
					<?php endif; ?>
					了。
				<?php elseif ($this->_var['item']['type'] == 'message'): ?>
					<?php if ($this->_var['user_info']['id'] == $this->_var['item']['user_id']): ?>
					我
					<?php else: ?>
					<a href="<?php
echo parse_url_tag("u:index|space|"."id=".$this->_var['item']['user_id']."".""); 
?>"><?php echo $this->_var['item']['user_name']; ?></a>
					<?php endif; ?>
					在<?php if ($this->_var['user_info']['id'] == $this->_var['item']['deal']['user_id']): ?>我<?php else: ?><?php 
$k = array (
  'name' => 'get_user_name',
  'value' => $this->_var['item']['deal']['user_id'],
);
echo $k['name']($k['value']);
?><?php endif; ?> 发布的 <a href="<?php echo $this->_var['item']['deal']['url']; ?>"><?php echo $this->_var['item']['deal']['name']; ?></a> 留了言。
				<?php elseif ($this->_var['item']['type'] == 'message_reply'): ?>
					<?php if ($this->_var['user_info']['id'] == $this->_var['item']['user_id']): ?>
					我
					<?php else: ?>
					<a href="<?php
echo parse_url_tag("u:index|space|"."id=".$this->_var['item']['user_id']."".""); 
?>"><?php echo $this->_var['item']['user_name']; ?></a>
					<?php endif; ?>
					回复了
					<?php if ($this->_var['user_info']['id'] == $this->_var['item']['l_user_id']): ?>我<?php else: ?><?php 
$k = array (
  'name' => 'get_user_name',
  'value' => $this->_var['item']['l_user_id'],
);
echo $k['name']($k['value']);
?><?php endif; ?> 在 <a href="<?php echo $this->_var['item']['deal']['url']; ?>"><?php echo $this->_var['item']['deal']['name']; ?></a> 的留言。
				<?php elseif ($this->_var['item']['type'] == 'deal_collect'): ?>
					<?php if ($this->_var['user_info']['id'] == $this->_var['item']['user_id']): ?>
					我
					<?php else: ?>
					<a href="<?php
echo parse_url_tag("u:index|space|"."id=".$this->_var['item']['user_id']."".""); 
?>"><?php echo $this->_var['item']['user_name']; ?></a>
					<?php endif; ?>
					关注了
					<?php if ($this->_var['user_info']['id'] == $this->_var['item']['deal']['user_id']): ?>我<?php else: ?><?php 
$k = array (
  'name' => 'get_user_name',
  'value' => $this->_var['item']['deal']['user_id'],
);
echo $k['name']($k['value']);
?><?php endif; ?> 发布的 <a href="<?php echo $this->_var['item']['deal']['url']; ?>"><?php echo $this->_var['item']['deal']['name']; ?></a> 。
				<?php elseif ($this->_var['item']['type'] == 'deal_bad'): ?>
					<?php if ($this->_var['user_info']['id'] == $this->_var['item']['user_id']): ?>
					我
					<?php else: ?>
					<a href="<?php
echo parse_url_tag("u:index|space|"."id=".$this->_var['item']['user_id']."".""); 
?>"><?php echo $this->_var['item']['user_name']; ?></a>
					<?php endif; ?>
					发布的 <a href="<?php echo $this->_var['item']['deal']['url']; ?>"><?php echo $this->_var['item']['deal']['name']; ?></a> 已流标。
				<?php endif; ?>
			</div>
			<div class="f_r f_dgray"><?php echo to_date($this->_var['item']['create_time'],"Y-m-d H:i"); ?></div>
		</div>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>

<div class="blank"></div>							
<div class="pages"><?php echo $this->_var['pages']; ?></div>
<?php else: ?>
<div class="tc p15">暂无记录</div>
<?php endif; ?>