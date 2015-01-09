<?php echo $this->fetch('inc/header.html'); ?>
	<div class="blank"></div>
	<div class="deals-search-box clearfix">
		<?php if ($this->_var['deal_cate_list']): ?>
		<div id="dashboard" class="dashboard clearfix f_l">
			<ul>
				<li <?php if ($this->_var['cate_id'] == '0'): ?>class="current"<?php endif; ?>>
					<a href="<?php
echo parse_url_tag("u:index|deals|"."".""); 
?>"><?php echo $this->_var['LANG']['ALL_DEALS']; ?></a>
				</li>
				<?php $_from = $this->_var['deal_cate_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'cate');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['cate']):
?>
				<?php if ($this->_var['key'] < 8): ?>
				<li <?php if ($this->_var['cate']['current'] == 1): ?>class="current"<?php endif; ?>>
					<a href="<?php
echo parse_url_tag("u:index|deals|"."cid=".$this->_var['cate']['id']."".""); 
?>"><?php echo $this->_var['cate']['name']; ?></a>
				</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				<li <?php if ($this->_var['cate_id'] == '-1'): ?>class="current"<?php endif; ?>>
					<a href="<?php
echo parse_url_tag("u:index|deals|"."cid=last".""); 
?>" style="margin-right:0"><?php echo $this->_var['LANG']['LAST_SUCCESS_DEALS']; ?></a>
				</li>												
			</ul>
		</div>
		<?php endif; ?>
		<div class="search f_r">
			<form action="<?php
echo parse_url_tag("u:index|deals|"."cid=".$this->_var['cate_id']."".""); 
?>" method="post" id="searchByKeyForm">
				<input type="text" name="keywords" class="f-input f_l f_dgray searchinput" id="search" value="<?php if ($this->_var['keywords']): ?><?php echo $this->_var['keywords']; ?><?php else: ?>请输入您的搜索条件<?php endif; ?>" x-webkit-speech="" x-webkit-grammar="builtin:translate">
				<input type="button" value="查询" onclick="searchLoans()" class="mr5 f_r searchbtnew">
			</form>
		</div>
	</div>
	<div class="blank10"></div>
	<div id="content" class="clearfix">
		<div class="long f_l">
			<div class="clearfix bddf">
				<?php if ($this->_var['cate_id'] > 0): ?>
				<div class="clearfix"><img src="<?php echo $this->_var['TMPL']; ?>/images/cate_top_<?php echo $this->_var['cate_id']; ?>.jpg"></div>
				<?php endif; ?>
				<?php if ($this->_var['total_money']): ?>
				<div class="biao_top_countbox clearfix">
					<div class="f_l">总成交金额：<span class="f_red"><?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['total_money'],
);
echo $k['name']($k['v']);
?></span></div>
				</div>
				<?php endif; ?>
				<?php if ($this->_var['deal_list']): ?>
				<?php if ($this->_var['cate_id'] == "-1"): ?>
				<div class="f_dgray b tc" style="height:40px;line-height:40px;">
			          <div class="f_l w90">图片</div>
			          <div class="f_l tl w170"> 标题  / 借款人 </div>
			          <div class="f_l w70" style="display:none">借款用途</div>
			          <div class="f_l w90">金额</div> 
			          <div class="f_l w80">利率</div>
			          <div class="f_l w80">期限</div>
			          <div class="f_l w90">信用等级</div>
			          <div class="f_l w125">状态</div>
			     </div>
				<?php else: ?>
				<div class="f_dgray b tc" style="height:40px;line-height:40px;">
			          <div class="f_l w90">图片</div>
			          <div class="f_l tl w170"> 标题  / 借款人 </div>
			          <div class="f_l w70" style="display:none">借款用途</div>
			          <div class="f_l w90">
			             <a href="#" onclick="set_sort('borrow_amount');">金额</a>
			          </div> 
			          <div class="f_l w80">
			          	<a href="#" onclick="set_sort('rate');">利率</a>
			          </div>
			          <div class="f_l w80">
			             <a href="#" onclick="set_sort('repay_time');">期限</a>
			          </div>
			          <div class="f_l w90">
			              <a href="#" onclick="set_sort('ulevel');">信用等级</a>
			          </div>
			          <div class="f_l w125">
			              <a href="#" onclick="set_sort('progress_point');">进度</a>
			              /
			              <a href="#" onclick="set_sort('remain_time');">剩余时间</a>
			          </div>
			     </div>
				 <?php endif; ?>
				<div class="biao-list clearfix" id="J_biao_list">
					<?php $_from = $this->_var['deal_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'deal');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['deal']):
?>
					<div class="item <?php if ($this->_var['key'] % 2 == 1): ?>item_1<?php endif; ?> tc">
			              <div class="clearfix">
			                  <div class="f_l w90" style="height:64px">
			                      <a href="<?php echo $this->_var['deal']['url']; ?>" target="_blank">
			                          <img src="<?php echo $this->_var['deal']['icon']; ?>" width="64px" height="64px" alt="<?php echo $this->_var['deal']['name']; ?>" class="img_b" title="<?php echo $this->_var['deal']['name']; ?>">
			                      </a>
			                  </div>
			                  <div class="pt10">
			                  <div class="f_l tl w170">
									<div class="b">
									<a href="<?php echo $this->_var['deal']['url']; ?>" target="_blank"><?php echo $this->_var['deal']['color_name']; ?></a>
									</div>
									<div class="f_gray" style="display:none">单位类别：<?php echo $this->_var['deal']['type_match_row']; ?></div>
			                      	<div class="f_gray">
			                          <a href="<?php echo $this->_var['deal']['user']['url']; ?>" target="_blank"><?php echo $this->_var['deal']['user']['user_name']; ?></a>
			                      	</div>
			                  </div>
			                  <div class="f_l w70" style="display:none"><?php echo $this->_var['deal']['type_match_row']; ?></div>
			                  <div class="f_l f_red w90">
			                      <div>
			                           <?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['deal']['borrow_amount'],
);
echo $k['name']($k['v']);
?>
			                      </div>
			                  </div>    
			                  <div class="f_l w80">
			                      <div>
			                        <?php 
$k = array (
  'name' => 'number_format',
  'v' => $this->_var['deal']['rate'],
  'f' => '2',
);
echo $k['name']($k['v'],$k['f']);
?>%
			                      </div>
			                      
			                  </div>
			                  <div class="f_l w80">
			                      <div>
			                          <span class="f_red"><?php echo $this->_var['deal']['repay_time']; ?></span><?php if ($this->_var['deal']['repay_time_type'] == 0): ?>天<?php else: ?>个月<?php endif; ?>
			                      </div>
			                  </div>
			                  <div class="f_l f_red w90" style="padding-top:3px">
			                      <a href="<?php echo $this->_var['deal']['user']['url']; ?>" target="_blank"><img src="<?php echo $this->_var['TMPL']; ?>/images/<?php echo $this->_var['deal']['user']['point_level']; ?>.png" align="absmiddle" alt="<?php echo $this->_var['deal']['user']['point_level']; ?>" title="<?php echo $this->_var['deal']['user']['point_level']; ?>"></a>
			                  </div>
			                  <div class="f_l w125">
			                  	  <?php if ($this->_var['deal']['deal_status'] == 4): ?>
								 	 <span class="f_red">还款中</span>
								  <?php elseif ($this->_var['deal']['deal_status'] == 5): ?>
								 	 <span class="f_gray">已还清</span>
								  <?php elseif ($this->_var['deal']['deal_status'] == 1 && $this->_var['deal']['remain_time'] <= 0): ?>
								 	<span class="f_red"> 流标</span>
								  <?php else: ?>
			                      <div class="greenProcessBar progressBar prmar">
			                          <p><?php if ($this->_var['deal']['deal_status'] == 0): ?>等待材料<?php else: ?><?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['deal']['progress_point'],
  'f' => '0',
);
echo $k['name']($k['v'],$k['f']);
?>%<?php endif; ?></p>
			                          <div class="p"><div class="c f_l clearfix" style="width:<?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['deal']['progress_point'],
  'f' => '2',
);
echo $k['name']($k['v'],$k['f']);
?>%;"></div></div>
			                      </div>
			                      <div class="f_dgray f12">
			                          <div>
			                              <?php echo $this->_var['deal']['remain_time_format']; ?>
			                          </div>
			                      </div>
								  <?php endif; ?>
			                  </div>
			                 </div> 
			              </div>
			        </div>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
				<div class="blank"></div>
				<div class="pages"><?php echo $this->_var['pages']; ?></div>
				<?php endif; ?>
			</div>
		</div>
		<div class="short f_r">
			<adv adv_id="我要理财列表页右侧顶部广告" />
			<div class="bddf clearfix" style="border-top:0">
				<div class="gray_title clearfix">
		            <div class="f_l f_dgray b">按条件搜索</div>
		        </div>
				<div class="clearfix" id="search_condition" style="height: 175px; width: 169px;">
		            <form action="<?php
echo parse_url_tag("u:index|deals|"."cid=".$this->_var['cate_id']."".""); 
?>" method="post" id="searchByConditionForm">
		                <div class="f_l" style="padding-left: 25px; width: 150px;height: 35px;">
		                    <span class="b">等级</span>
		                    <span style="padding-left: 5px;">
		                        <select name="level" style="width: 80px;" id="level">
		                            <option value="all">不限</option>
									<?php $_from = $this->_var['level_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
									<?php if ($this->_var['key'] > 1 && $this->_var['key'] < 6): ?>
		                            <option value="<?php echo $this->_var['item']['id']; ?>" <?php if ($this->_var['level'] == $this->_var['item']['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['item']['name']; ?>以上</option>
									<?php endif; ?>
									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		                        </select>
		                    </span>
		                </div>
		                <div class="f_l" style="padding-left: 25px; width: 150px;height: 35px;">
		                    <span class="b">利率</span>
		                    <span style="padding-left: 5px;">
		                        <select name="interest" id="interest" style="width: 80px;">
		                            <option value="0">不限</option>
		                            <option value="10" <?php if ($this->_var['interest'] == 10): ?>selected="selected"<?php endif; ?>>10%以上</option>
		                            <option value="12" <?php if ($this->_var['interest'] == 12): ?>selected="selected"<?php endif; ?>>12%以上</option>
		                            <option value="15" <?php if ($this->_var['interest'] == 15): ?>selected="selected"<?php endif; ?>>15%以上</option>
		                            <option value="18" <?php if ($this->_var['interest'] == 18): ?>selected="selected"<?php endif; ?>>18%以上</option>
		                        </select>
		                    </span>
		                </div>
		                <div class="f_l" style="padding-left: 25px; width: 150px;height: 35px;">
		                    <span class="b">期限</span>
		                    <span style="padding-left: 5px;">
		                        <select name="months" style="width: 80px;overflow:hidden;height:20px" id="months">
		                            <option value="0">不限</option>
		                            <option value="12" <?php if ($this->_var['months'] == 12): ?>selected="selected"<?php endif; ?>>12个月以内</option>
		                            <option value="18" <?php if ($this->_var['months'] == 18): ?>selected="selected"<?php endif; ?>>18个月以上</option>
		                        </select>
		                    </span>
		                </div>
		                <div class="f_l" style="width: 150px;height: 35px;">
		                    <span class="b">剩余时间</span>
		                    <span style="padding-left: 5px;">
		                        <select name="lefttime" style="width: 80px;" id="lefttime">
		                            <option value="0">不限</option>
		                            <option value="1" <?php if ($this->_var['lefttime'] == 1): ?>selected="selected"<?php endif; ?>>1天以内</option>
		                            <option value="3" <?php if ($this->_var['lefttime'] == 3): ?>selected="selected"<?php endif; ?>>3天以内</option>
		                        </select>
		                    </span>
		                </div>
		                <div style="text-align:center; margin:5px 0;height:30px;width: 150px;">
		                   <img src="<?php echo $this->_var['TMPL']; ?>/images/search.png" alt="" style="cursor: pointer;margin-left:45px" onclick="searchByCondition()">
		                </div>
		            </form>
		        </div>
			</div>
			<div class="blank"></div>
			<div class="bddf clearfix" style="border-top:0">
				<div class="gray_title clearfix">
		            <div class="f_l f_dgray b">理财计算器</div>
		        </div>
				
				<div class="clearfix pt5 pb5" id="calculate" style="width: 169px;">
		            <div class="f_l clearfix lh24" style="width: 160px;height: 35px;">
		                <span class="b f_l">初始投资</span>
		                <span class="f_l" style="padding-left: 5px;">
		                    <input type="text" name="amount" id="calculateAmount" class="f_l" style="width: 70px;"><span class="f_l pl5">元</span>
		                </span>
		            </div>
		            <div class="f_l clearfix lh24" style="padding-left: 12px; width: 160px;height: 35px;">
		                <span class="b f_l">年利率</span>
		                <span class="f_l" style="padding-left: 5px;">
		                    <input type="text" name="interest" id="calculateInterest" class="f_l" style="width: 70px;"><span class="f_l pl5">%</span>
		                </span>
		            </div>
		            <div class="f_l clearfix lh24" style="width: 160px;height: 35px;">
		                <span class="b f_l">投资期限</span>
		                <span class="f_l" style="padding-left: 5px;">
		                    <input type="text" name="year" id="calculateMonth" class="f_l" style="width: 70px;"><span class="f_l pl5">月</span>
		                </span>
		            </div>
					<div class="f_l clearfix lh24" style="width: 160px;height: 30px;">
		                <span class="b f_l">还款方式</span>
		                <span class="f_l" style="padding-left: 5px;">
		                    <select id="repayType" >
		                        <option value="0">等额本息</option>
		                        <option value="1">付息还本</option>
								<option value="2">到期本息</option>
		                    </select>
		                </span>
		            </div>
		            <div class="f_l">
		                <div style="text-align:center; margin:5px 0;height:30px;width: 150px;">
		                    <img src="<?php echo $this->_var['TMPL']; ?>/images/calculate.png" alt="" style="cursor: pointer; margin-left:45px" onclick="calculate()">
		                </div>
		            </div>
		            <div class="f_l clearfix lh24 mt5 pt5" style=" border-top:1px solid #ccc;width: 160px;height: 35px;">
		                <span class="f_l">本息合计</span>
		                <span class="f_l f_red" id="lastValue" style="padding-left: 5px;">
		                </span>
		            </div>
		
		        </div>
			</div>
			<adv adv_id="我要理财列表页右侧底部广告" />
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(function(){
		$("#searchByKeyForm .searchinput").bind("focus",function(){
			if($.trim($(this).val())=="请输入您的搜索条件"){
				$(this).val("");
				$(this).removeClass("f_dgray");
			}
		});
		
		$("#searchByKeyForm .searchinput").bind("blur",function(){
			if($.trim($(this).val())=="请输入您的搜索条件" || $.trim($(this).val())==""){
				$(this).val("请输入您的搜索条件");
				$(this).addClass("f_dgray");
			}
		});
	});
	function searchByCondition(){
		$("#searchByConditionForm").submit();
	}
	function searchLoans(){
		if($.trim($("#searchByKeyForm .searchinput").val())=="请输入您的搜索条件" || $.trim($("#searchByKeyForm .searchinput").val())==""){
			$.showErr("请输入您的搜索条件");
			return false;
		}
		$("#searchByKeyForm").submit();
	};
	
	function calculate(){
		var amount=$("#calculateAmount").val();
        var interest=$("#calculateInterest").val();
        var month=$("#calculateMonth").val();
		var repayType = $("#repayType").val();

        if((amount.replace(/[ ]/g, "")) == "" || (amount.replace(/[ ]/g, "")) == null||amount==""||amount==null){
            $.showErr("请输入初始投资");
            return;
        }else{
            amount=$.trim(amount);
            if(/^(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,2})?$/.test(amount)==false){
                $.showErr("初始投资只能为整数或者小数且最多只能有两位小数");
                return;
            }else{
                if(amount>1000000){
                    $.showErr("初始投资为100万以下");
                    return;
                }
            }
        }
        if((interest.replace(/[ ]/g, "")) == "" || (interest.replace(/[ ]/g, "")) == null||interest==""||interest==null){
            $.showErr("请输入年利率");
            return;
        }else{
            interest=$.trim(interest);
            if(/^(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,2})?$/.test(interest)==false){
                $.showErr("年利率只能为整数或者小数且最多只能有两位小数");
                return;
            }else{
                if(interest>=100){
                    $.showErr("年利率必须在100%以下");
                    return false;
                }
            }
        }
        if((month.replace(/[ ]/g, "")) == "" || (month.replace(/[ ]/g, "")) == null||month==""||month==null){
            $.showErr("请输入投资期限");
            return;
        }else{
            month=$.trim(month);
            if(/^(([1-9]{1}\d*)|([0]{1}))(\.(\d){1,2})?$/.test(month)==false){
                $.showErr("投资期限只能为整数或者小数且最多只能有两位小数");
                return;
            }else{
                if(month>100){
                    $.showErr("投资期限为100月以内");
                    return;
                }
            }
        }
        var value = 0;
	    var inters= interest /(100*12);
		if(repayType==0){
			value= month*amount*(inters*Math.pow((1+inters), month) / (Math.pow((1+inters),month)-1));
		}
		else if(repayType==1){
			value = parseFloat(amount) + parseFloat(inters*amount*month);
		}
		else if(repayType==2){
			value = parseFloat(amount) + parseFloat(inters*amount*month);
		}
		
        $("#lastValue").html(formatNum(value));
    }
</script>
<?php echo $this->fetch('inc/footer.html'); ?>