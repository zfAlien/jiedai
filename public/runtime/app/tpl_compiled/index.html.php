<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['indexcss'][] = $this->_var['TMPL_REAL']."/css/index.css";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['indexcss'],
);
echo $k['name']($k['v']);
?>" />
<div class="blank"></div>
<div id="main_adv_box" class="main_adv_box f_l">
		<div id="main_adv_img" class="main_adv_img">
			<span rel="1"><adv adv_id="首页广告位1" /></span>
			<span rel="2"><adv adv_id="首页广告位2" /></span>
			<span rel="3"><adv adv_id="首页广告位3" /></span>
			<span rel="4"><adv adv_id="首页广告位4" /></span>	
			<span rel="5"><adv adv_id="首页广告位5" /></span>					
		</div>
		<div id="main_adv_ctl" class="main_adv_ctl">
			<ul>
				<li rel="1">1</li>
				<li rel="2">2</li>
				<li rel="3">3</li>
				<li rel="4">4</li>
				<li rel="5">5</li>
			</ul>
		</div>
		<script type="text/javascript" src="<?php echo $this->_var['TMPL']; ?>/js/index_adv.js"></script>
</div>
<div class="blank10"></div>
<div class="index_left f_l">
	<div class="gray_title clearfix">
		<div class="f_l f_dgray b">最新借款列表</div>
		<div class="f_r">
			<span style="font-size: 12px; font-weight: normal;"><a href="<?php
echo parse_url_tag("u:index|deals|"."".""); 
?>" title="<?php echo $this->_var['LANG']['MORE']; ?>">更多借款列表...</a></span>
		</div>
	</div>
	<div class="i_deal_list clearfix pr15 pl15">
		<?php $_from = $this->_var['deal_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'deal');$this->_foreach['deal'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['deal']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['deal']):
        $this->_foreach['deal']['iteration']++;
?>
		<div class="item <?php if ($this->_var['key'] % 2 == 1): ?>item_1<?php endif; ?> clearfix" <?php if (($this->_foreach['deal']['iteration'] == $this->_foreach['deal']['total'])): ?>style="border-bottom:0"<?php endif; ?>>
			<div class="icon f_l">
				<a href="<?php echo $this->_var['deal']['url']; ?>"><img src="<?php echo $this->_var['deal']['icon']; ?>" class="img_b" height="80" width="80"></a>
			</div>
			<div class="detail f_r">
				<div class="tit b lh24 clearfix">
					<a href="<?php echo $this->_var['deal']['url']; ?>" class="f_l"><?php echo $this->_var['deal']['color_name']; ?></a>
					<div class="cate_tip cate_tip_<?php echo $this->_var['deal']['cate_id']; ?> ml5 f_l"><?php echo $this->_var['deal']['cate_info']['name']; ?>！</div>
				</div>
				<div class="clearfix">
					<div class="info f_l">借款金额：<span class="f_red"><?php echo $this->_var['deal']['borrow_amount_format']; ?></span></div>
					<div class="info info2 f_l">年利率：<span class="f_red"><?php echo $this->_var['deal']['rate']; ?> %</span></div>
					<div class="info info3 f_l">借款期限：<span class="f_red"><?php echo $this->_var['deal']['repay_time']; ?></span><?php if ($this->_var['deal']['repay_time_type'] == 0): ?>天<?php else: ?>个月<?php endif; ?></div>
				</div>
				<div class="clearfix">
					<div class="info f_l">
						信用等级：<img src="<?php echo $this->_var['TMPL']; ?>/images/<?php echo $this->_var['deal']['user']['point_level']; ?>.png" align="absmiddle" title="<?php echo $this->_var['deal']['user']['point_level']; ?>" alt="<?php echo $this->_var['deal']['user']['point_level']; ?>" height="16" />
					</div>
					<div class="info info2 f_l clearfix">
						<div class="f_l">借款进度：</div>
						<div class="greenProcessBar progressBar f_l indexbar">						
							<p><?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['deal']['progress_point'],
  'f' => '0',
);
echo $k['name']($k['v'],$k['f']);
?>%</p>
							<div class="p">
								<div class="c" style="width: <?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['deal']['progress_point'],
  'f' => '2',
);
echo $k['name']($k['v'],$k['f']);
?>%;"></div>
							</div>
						</div>
					</div>
					<div class="info info3 f_l"><?php if ($this->_var['deal']['deal_status'] == 2): ?><span class="f_red">满标</font><?php elseif ($this->_var['deal']['deal_status'] == 4): ?><span class="f_red">还款中</font><?php elseif ($this->_var['deal']['deal_status'] == 5): ?>还款完毕<?php else: ?>还需：<span class="f_red"><?php echo $this->_var['deal']['need_money']; ?></span><?php endif; ?></div>
				</div>
			</div>
		</div>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</div>
</div>
<div class="index_right f_r">
	<adv adv_id="首页右侧顶部广告" />
	<div class="r-block">
		<div class="gray_title clearfix">
			<div class="f_l f_dgray b">网站公告</div>
			<div class="f_r">
            	<div style="vertical-align: middle;_padding: 8px 0;">
	                <span style="font-weight: normal;">
	                    <a href="<?php
echo parse_url_tag("u:index|notice#list_notice|"."".""); 
?>"> 更多</a>
	                </span>
	                <span><img src="<?php echo $this->_var['TMPL']; ?>/images/more.gif" align="absmiddle" alt="<?php echo $this->_var['LANG']['MORE']; ?>" style="" title="<?php echo $this->_var['LANG']['MORE']; ?>"></span>
	            </div>
        	</div>
		</div>
		<div class="notice-list clearfix">
			<ul>
				<?php $_from = $this->_var['notice_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'notice');if (count($_from)):
    foreach ($_from AS $this->_var['notice']):
?>
                <li style="padding:2px 0;">
                    <span>
					<a href="<?php echo $this->_var['notice']['url']; ?>"><?php echo $this->_var['notice']['title']; ?></a>
					</span>
                </li>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	        </ul>
		</div>
	</div>
	<div class="blank10"></div>
	<div class="clearfix pr">
		<img src="<?php echo $this->_var['TMPL']; ?>/images/dosomthing.jpg" />
		<a class="borrow_out ps" href="<?php
echo parse_url_tag("u:index|deals|"."".""); 
?>">我要借出</a>
		<a class="borrow_in ps" href="<?php
echo parse_url_tag("u:index|borrow|"."".""); 
?>">我要借款</a>
	</div>
	<div class="blank10"></div>
	<?php 
$k = array (
  'name' => 'success_deal_list',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>
	
	<div class="blank10"></div>
	<div class="r-block">
		<div class="gray_title clearfix">
			<div class="f_l f_dgray b">使用技巧</div>
			<div class="f_r">
	        	<div style="vertical-align: middle;_padding: 8px 0;">
	                <span style="font-weight: normal;">
	                    <a href="<?php
echo parse_url_tag("u:index|usagetip|"."".""); 
?>"> <?php echo $this->_var['LANG']['MORE']; ?></a>
	                </span>
	                <span><img src="<?php echo $this->_var['TMPL']; ?>/images/more.gif" align="absmiddle" alt="<?php echo $this->_var['LANG']['MORE']; ?>" style="" title="<?php echo $this->_var['LANG']['MORE']; ?>"></span>
	            </div>
	    	</div>
		</div>
		<div class="clearfix" style="padding:5px 15px; height:144px">
			<ul>
			<?php $_from = $this->_var['use_tech_list']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'use');if (count($_from)):
    foreach ($_from AS $this->_var['use']):
?>
            	<li class="f_l" style="width: 120px; padding: 2px;">
				 · <a href="<?php
echo parse_url_tag("u:index|usagetip|"."id=".$this->_var['use']['id']."".""); 
?>"><?php echo $this->_var['use']['title']; ?></a>
				</li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
       		</ul>
		</div>
	</div>
</div>
<?php echo $this->fetch('inc/footer.html'); ?>