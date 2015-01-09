<style type="text/css">
	.user_info_table .field{
		width: 400px;
	}
	.user_info_table .field label{
		height: 26px;
		font-size: 12px;
		line-height: 26px;
		width: 100px;
	}
</style>
<div class="blank"></div>
<div class="tips" style="width: auto">
	<span class="f_red b">*</span> 为必填项，所有资料均会严格保密 
</div>
<div class="blank"></div>
<div class="item_group" style="width:auto;">个人详细信息</div>
<form method="post" action="<?php
echo parse_url_tag("u:index|uc_account#save|"."is_ajax=1".""); 
?>" name="modify" id="J_uc_account_save">
<div class="inc wb ">
	<div class="inc_main">
		<table class="user_info_table">
			<tr>
				<td class="pt10">
					<?php if ($this->_var['user_info']['email'] == ''): ?>
					<div class="field email">
					<label for="settings-email-address"><span class="red">*</span>Email</label>
					<input type="text" value="<?php echo $this->_var['user_info']['email']; ?>" class="f-input" id="settings-email-address" name="email" size="30">
					</div>
					<?php endif; ?>
					<?php if ($this->_var['user_info']['user_name'] == ''): ?>
					<div class="field username">
						<label for="settings-username"><span class="red">*</span><?php echo $this->_var['LANG']['USER_TITLE_USER_NAME']; ?></label>
						<input type="text" value="<?php echo $this->_var['user_info']['user_name']; ?>" class="f-input" id="settings-username" name="user_name" size="30">
					</div>
					<?php endif; ?>
					<div class="field real_name">
						<label for="settings-real_name"><span class="red">*</span><?php echo $this->_var['LANG']['REAL_NAME']; ?></label>
						<input type="text" value="<?php echo $this->_var['user_info']['real_name']; ?>" <?php if ($this->_var['user_info']['idcardpassed'] == 1): ?>readonly="readonly" disabled="true"<?php endif; ?> class="f-input <?php if ($this->_var['user_info']['idcardpassed'] == 1): ?>readonly<?php endif; ?>" id="settings-real_name" name="real_name" size="30">
					</div>
					<div class="field idno">
						<label for="settings-idno"><span class="red">*</span><?php echo $this->_var['LANG']['IDNO']; ?></label>
						<input type="text" value="<?php if ($this->_var['user_info']['idcardpassed'] == 0): ?><?php echo $this->_var['user_info']['idno']; ?><?php else: ?><?php echo preg_replace('#(\d{14})\d{4}|(\w+)#', '${1}****', $this->_var['user_info']['idno']);?><?php endif; ?>" <?php if ($this->_var['user_info']['idcardpassed'] == 1): ?>readonly="readonly" disabled="true"<?php endif; ?> class="f-input <?php if ($this->_var['user_info']['idcardpassed'] == 1): ?>readonly<?php endif; ?>" id="settings-idno" name="idno" size="30" onkeyup="idcheck(this);" >
					</div>
					<div class="field mobile">
						<label for="settings-mobile"><?php if (app_conf ( "MOBILE_MUST" ) == 1): ?><span class="red">*</span><?php endif; ?><?php echo $this->_var['LANG']['USER_TITLE_MOBILE']; ?></label>
						<input type="text" value="<?php if ($this->_var['user_info']['mobilepassed'] == 0): ?><?php echo $this->_var['user_info']['mobile']; ?><?php else: ?><?php echo preg_replace('#(\d{3})\d{5}(\d{3})#', '${1}*****${2}', $this->_var['user_info']['mobile']);?><?php endif; ?>" <?php if ($this->_var['user_info']['mobilepassed'] == 1): ?>readonly="readonly" disabled="true"<?php endif; ?> class="f-input <?php if ($this->_var['user_info']['mobile'] != ''): ?>readonly<?php endif; ?>" id="settings-mobile" name="mobile" size="30">
						<?php if ($this->_var['user_info']['mobilepassed'] == 1): ?>
						<input type="hidden" value="true" name="mobilepassed">
						<?php endif; ?>
					</div>
					<div class="field">
						<label><span class="red">*</span><?php echo $this->_var['LANG']['USER_SEX']; ?></label>
						<select name="sex">
							<option value="-1" <?php if ($this->_var['user_info']['sex'] == - 1): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['LANG']['USER_SEX_NULL']; ?></option>
							<option value="0" <?php if ($this->_var['user_info']['sex'] == 0): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['LANG']['USER_SEX_0']; ?></option>
							<option value="1" <?php if ($this->_var['user_info']['sex'] == 1): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['LANG']['USER_SEX_1']; ?></option>
						</select>
					</div>
					<div class="field clearfix">
						<label for="settings-birthday"><span class="red">*</span><?php echo $this->_var['LANG']['USER_BIRTHDAY']; ?></label>
						<div class="f_l">
							<select name="byear">
								<option value="0"><?php echo $this->_var['LANG']['PLEASE_SELECT']; ?></option>
								<?php for($i = date("Y") - 100 ;$i<=date("Y"); $i++){ ?>
								<option value="<?php echo $i; ?>" <?php if($i==$GLOBALS['user_info']['byear']){echo 'selected="selected"';} ?>><?php echo $i; ?></option>
								<?php
								}
								?>
							</select>
							<?php echo $this->_var['LANG']['SUPPLIER_YEAR']; ?>
							<select name="bmonth">
								<option value="0"><?php echo $this->_var['LANG']['PLEASE_SELECT']; ?></option>
								<?php for($i = 1 ;$i<=12; $i++){ ?>
								<option value="<?php echo $i; ?>"  <?php if($i==$GLOBALS['user_info']['bmonth']){echo 'selected="selected"';} ?>><?php if($i<10):echo "0".$i;else: echo $i; endif; ?></option>
								<?php
								}
								?>
							</select>
							<?php echo $this->_var['LANG']['SUPPLIER_MON']; ?>
							<select name="bday">
								<option value="0"><?php echo $this->_var['LANG']['PLEASE_SELECT']; ?></option>
								<?php for($i = 1 ;$i<=31; $i++){ ?>
								<option value="<?php echo $i; ?>" <?php if($i==$GLOBALS['user_info']['bday']){echo 'selected="selected"';} ?>><?php if($i<10):echo "0".$i;else: echo $i; endif; ?></option>
								<?php
								}
								?>
							</select>
							<?php echo $this->_var['LANG']['SUPPLIER_DAY']; ?>
						</div>
					</div>
					<div class="field graduation">
						<label for="settings-graduation"><span class="red">*</span><?php echo $this->_var['LANG']['GRADUATION']; ?></label>
						<select name="graduation" id="settings-graduation">
							<option value="" <?php if ($this->_var['user_info']['graduation'] == ''): ?>selected="selected"<?php endif; ?>>=<?php echo $this->_var['LANG']['SELECT_PLEASE']; ?>=</option>
							<option value="<?php echo $this->_var['LANG']['GRADUATION_1']; ?>" <?php if ($this->_var['user_info']['graduation'] == $this->_var['LANG']['GRADUATION_1']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['LANG']['GRADUATION_1']; ?></option>
							<option value="<?php echo $this->_var['LANG']['GRADUATION_2']; ?>" <?php if ($this->_var['user_info']['graduation'] == $this->_var['LANG']['GRADUATION_2']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['LANG']['GRADUATION_2']; ?></option>
							<option value="<?php echo $this->_var['LANG']['GRADUATION_3']; ?>" <?php if ($this->_var['user_info']['graduation'] == $this->_var['LANG']['GRADUATION_3']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['LANG']['GRADUATION_3']; ?></option>
							<option value="<?php echo $this->_var['LANG']['GRADUATION_4']; ?>" <?php if ($this->_var['user_info']['graduation'] == $this->_var['LANG']['GRADUATION_4']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['LANG']['GRADUATION_4']; ?></option>
						</select>
					</div>
					
					<div class="field graduatedyear">
						<label for="graduatedyear"><span class="red">*</span><?php echo $this->_var['LANG']['GRADUATEDYEAR']; ?></label>
						<select name="graduatedyear" id="settings-graduatedyear">
						<?php $y = date("Y"); for($i=$y;$i>=$y-100;$i--): ?>
							<option value="<?php echo $i;?>" <?php if($i == intval($this->_var['user_info']['graduatedyear'])):?>selected="selected"<?php endif; ?>><?php echo $i;?></option>
						<?php endfor; ?>
						</select>
					</div>
					
					<div class="field university">
						<label for="university"><?php echo $this->_var['LANG']['UNIVERSITY']; ?></label>
						<input type="text" value="<?php echo $this->_var['user_info']['university']; ?>" class="f-input" id="settings-university" name="university" size="30">
					</div>
					
					<div class="field marriage">
						<label><span class="red">*</span><?php echo $this->_var['LANG']['MARRIAGE']; ?></label>
						
						<input type="radio" class="f-radio" value="已婚" name="marriage" <?php if ($this->_var['user_info']['marriage'] == '已婚'): ?>checked="checked"<?php endif; ?>> 已婚
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" class="f-radio" value="未婚" name="marriage" <?php if ($this->_var['user_info']['marriage'] == '未婚'): ?>checked="checked"<?php endif; ?>> 未婚
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" class="f-radio" value="离异" name="marriage" <?php if ($this->_var['user_info']['marriage'] == '离异'): ?>checked="checked"<?php endif; ?>> 离异
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" class="f-radio" value="丧偶" name="marriage" <?php if ($this->_var['user_info']['marriage'] == '丧偶'): ?>checked="checked"<?php endif; ?>> 丧偶
						
					</div>
					
					<div class="field haschild">
						<label><span class="red">*</span><?php echo $this->_var['LANG']['HASCHILD']; ?></label>
						<input type="radio" class="f-radio" value="1" name="haschild" <?php if ($this->_var['user_info']['haschild'] == 1): ?>checked="checked"<?php endif; ?>> 有
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" class="f-radio" value="0" name="haschild" <?php if ($this->_var['user_info']['haschild'] == 0): ?>checked="checked"<?php endif; ?>> 无
					</div>
					
					<div class="field hashouse">
						<label><span class="red">*</span><?php echo $this->_var['LANG']['HASHOUSE']; ?></label>
						<input type="radio" class="f-radio" value="1" name="hashouse" <?php if ($this->_var['user_info']['hashouse'] == 1): ?>checked="checked"<?php endif; ?>> 有
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" class="f-radio" value="0" name="hashouse" <?php if ($this->_var['user_info']['hashouse'] == 0): ?>checked="checked"<?php endif; ?>> 无
					</div>
					
					<div class="field houseloan">
						<label><span class="red">*</span><?php echo $this->_var['LANG']['HOUSELOAN']; ?></label>
						<input type="radio" class="f-radio" value="1" name="houseloan" id="houseloan_1" <?php if ($this->_var['user_info']['houseloan'] == 0): ?>disabled="true"<?php endif; ?> <?php if ($this->_var['user_info']['houseloan'] == 1): ?>checked="checked"<?php endif; ?>> 有
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" class="f-radio" value="0" name="houseloan" id="houseloan_0" <?php if ($this->_var['user_info']['houseloan'] == 0): ?>disabled="true"<?php endif; ?> <?php if ($this->_var['user_info']['houseloan'] == 0): ?>checked="checked"<?php endif; ?>> 无
					</div>
					
					<div class="field hascar">
						<label><span class="red">*</span><?php echo $this->_var['LANG']['HASCAR']; ?></label>
						<input type="radio" class="f-radio" value="1" name="hascar" <?php if ($this->_var['user_info']['hascar'] == 1): ?>checked="checked"<?php endif; ?>> 有
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" class="f-radio" value="0" name="hascar" <?php if ($this->_var['user_info']['hascar'] == 0): ?>checked="checked"<?php endif; ?>> 无
					</div>
					
					<div class="field carloan">
						<label><span class="red">*</span><?php echo $this->_var['LANG']['CARLOAN']; ?></label>
						<input type="radio" class="f-radio" value="1" name="carloan" id="carloan_1" <?php if ($this->_var['user_info']['hascar'] == 0): ?>disabled="true"<?php endif; ?> <?php if ($this->_var['user_info']['carloan'] == 1): ?>checked="checked"<?php endif; ?>> 有
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" class="f-radio" value="0" name="carloan" id="carloan_0" <?php if ($this->_var['user_info']['hascar'] == 0): ?>disabled="true"<?php endif; ?> <?php if ($this->_var['user_info']['carloan'] == 0): ?>checked="checked"<?php endif; ?>> 无
					</div>
					
					<?php $_from = $this->_var['field_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field_item');if (count($_from)):
    foreach ($_from AS $this->_var['field_item']):
?>
					<div class="field <?php echo $this->_var['field_item']['field_name']; ?>">
							<label for="<?php echo $this->_var['field_item']['field_name']; ?>"><?php if ($this->_var['field_item']['is_must'] == 1): ?><span class="red">*</span><?php endif; ?><?php echo $this->_var['field_item']['field_show_name']; ?></label>
							<?php if ($this->_var['field_item']['input_type'] == 0): ?>
							<input type="text" value="<?php echo $this->_var['field_item']['value']; ?>" class="f-input" id="settings-<?php echo $this->_var['field_item']['field_name']; ?>" name="<?php echo $this->_var['field_item']['field_name']; ?>" size="30">
							<?php else: ?>
							<select name ="<?php echo $this->_var['field_item']['field_name']; ?>" id="settings-<?php echo $this->_var['field_item']['field_name']; ?>">
								<?php $_from = $this->_var['field_item']['value_scope']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value_item');if (count($_from)):
    foreach ($_from AS $this->_var['value_item']):
?>
								<option value="<?php echo $this->_var['value_item']; ?>" <?php if ($this->_var['value_item'] == $this->_var['field_item']['value']): ?>selected="selected"<?php endif; ?>><?php if ($this->_var['value_item'] == ''): ?>=<?php echo $this->_var['LANG']['SELECT_PLEASE']; ?>=<?php else: ?><?php echo $this->_var['value_item']; ?><?php endif; ?></option>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</select>
							<?php endif; ?>
					</div>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					
					<script type="text/javascript" src="<?php echo $this->_var['APP_ROOT']; ?>/system/region.js"></script>		
					<div class="field">
																	
						<label for="settings-region"><span class="red">*</span><?php echo $this->_var['LANG']['NATICE_PLACE']; ?></label>
						<select name="n_province_id">
							<option value="0">=<?php echo $this->_var['LANG']['SELECT_PLEASE']; ?>=</option>
							<?php $_from = $this->_var['region_lv2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'lv2');if (count($_from)):
    foreach ($_from AS $this->_var['lv2']):
?>
							<option <?php if ($this->_var['lv2']['id'] == $this->_var['user_info']['n_province_id']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_var['lv2']['id']; ?>"><?php echo $this->_var['lv2']['name']; ?></option>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</select>
												
						<select name="n_city_id">
							<option value="0">=<?php echo $this->_var['LANG']['SELECT_PLEASE']; ?>=</option>		
							<?php $_from = $this->_var['n_region_lv3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'lv3');if (count($_from)):
    foreach ($_from AS $this->_var['lv3']):
?>
							<option <?php if ($this->_var['lv3']['selected'] == 1): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_var['lv3']['id']; ?>"><?php echo $this->_var['lv3']['name']; ?></option>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</select>
						
					</div>	
					<div class="field">
																	
						<label for="settings-region"><span class="red">*</span><?php echo $this->_var['LANG']['USER_REGION']; ?></label>
						
						<select name="province_id">
							<option value="0">=<?php echo $this->_var['LANG']['SELECT_PLEASE']; ?>=</option>
							<?php $_from = $this->_var['region_lv2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'lv2');if (count($_from)):
    foreach ($_from AS $this->_var['lv2']):
?>
							<option <?php if ($this->_var['lv2']['selected'] == 1): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_var['lv2']['id']; ?>"><?php echo $this->_var['lv2']['name']; ?></option>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</select>
												
						<select name="city_id">
							<option value="0">=<?php echo $this->_var['LANG']['SELECT_PLEASE']; ?>=</option>		
							<?php $_from = $this->_var['region_lv3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'lv3');if (count($_from)):
    foreach ($_from AS $this->_var['lv3']):
?>
							<option <?php if ($this->_var['lv3']['selected'] == 1): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_var['lv3']['id']; ?>"><?php echo $this->_var['lv3']['name']; ?></option>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</select>
						
					</div>
					<div class="field address">
						<label for="settings-address"><span class="red">*</span><?php echo $this->_var['LANG']['ADDRESS']; ?></label>
						<input value="<?php echo $this->_var['user_info']['address']; ?>" class="f-input" name="address" id="settings-address">
					</div>
					
					<div class="field phone">
						<?php $phone_s = explode("-",$this->_var['user_info']['phone']);?>
						<label for="settings-phone"><?php echo $this->_var['LANG']['PHONE']; ?></label>
						<input type="text" value="<?php echo $phone_s[0];?>" class="f-input f_l" id="frphone" onkeyup="setPhone();" onblur="setPhone();" style="width:32px">
						<span class="f_l">&nbsp;-&nbsp;</span>
						<input type="text" value="<?php echo $phone_s[1];?>" class="f-input f_l" id="numphone" onkeyup="setPhone();" onblur="setPhone();" style="width:80px">
						<input type="hidden" value="<?php echo $this->_var['user_info']['phone']; ?>" name="phone" id="phone">
					</div>
				</td>
				<td class="pt10" valign="top" style="width:140px;">
						<img id="avatar" src="<?php 
$k = array (
  'name' => 'get_user_avatar',
  'uid' => $this->_var['user_info']['id'],
  'type' => 'middle',
);
echo $k['name']($k['uid'],$k['type']);
?>" />
						<div class="blank"></div>
						<label class="fileupload" onclick="upd_file(this,'avatar_file',<?php echo $this->_var['user_info']['id']; ?>);">
						<input type="file" class="filebox" name="avatar_file" id="avatar_file"/>
						
						</label>
						<label class="fileuploading hide" ></label>							
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="blank"></div>
					<div class="clearfix b" style="padding: 10px 90px">请确保您填写的资料真实有效，所有资料将会严格保密。一旦被发现所填资料有虚假，将会影响您在<?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SHOP_TITLE',
);
echo $k['name']($k['v']);
?>的信用，对以后借款造成影响。</div>
					<div class="blank"></div>
				</td>
			</tr>
			
		</table>
		<div class="act mt10 mb10 tc" style="margin-left:0px">
			<input type="hidden" value="<?php echo $this->_var['user_info']['id']; ?>" name="id">
			<input type="submit" class="saveSettingBnt" id="settings-submit" name="commit" value="保存并继续">
		</div>
		<div class="blank"></div>
	</div>
	<div class="inc_foot"></div>
</div>
</form>
<script type="text/javascript" src="<?php echo $this->_var['TMPL']; ?>/js/ajaxupload.js"></script>
<script type="text/javascript">
function setPhone(){
	var frphone = $.trim($("#frphone").val());
	var numphone = $.trim($("#numphone").val());
	if(frphone!=""&&numphone!=""){
		$("#phone").val(frphone+"-"+numphone);
	}
	else{
		$("#phone").val("");
	}
}
$(document).ready(function(){

	$("#settings-submit").click(function(){
		<?php if ($this->_var['user_info']['email'] == ''): ?>}
		if($.trim($("#settings-email-address").val()).length == 0)
		{
			$("#settings-email-address").focus();
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_EMAIL'],
);
echo $k['name']($k['format'],$k['value']);
?>");
			
			return false;
		}
		
		if(!$.checkEmail($("#settings-email-address").val()))
		{
			$("#settings-email-address").focus();			
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['FORMAT_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_EMAIL'],
);
echo $k['name']($k['format'],$k['value']);
?>");
			return false;
		}
		<?php endif; ?>
		if($.trim($("#settings-password").val())!=''&&!$.minLength($("#settings-password").val(),4,false))
		{
			$("#settings-password").focus();
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['FORMAT_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_USER_PWD'],
);
echo $k['name']($k['format'],$k['value']);
?>");	
			return false;
		}
		
		if($("#settings-password-confirm").val() != $("#settings-password").val())
		{
			$("#settings-password-confirm").focus();
			$.showErr("<?php echo $this->_var['LANG']['USER_PWD_CONFIRM_ERROR']; ?>");			
			return false;
		}
		
		<?php if ($this->_var['user_info']['real_name'] == ''): ?>
		if($.trim($("#settings-real_name").val()).length == 0)
		{
			$("#settings-real_name").focus();			
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['LANG']['REAL_NAME'],
);
echo $k['name']($k['format'],$k['value']);
?>");	
			return false;
		}	
		<?php endif; ?>
		<?php if ($this->_var['user_info']['idno'] == ''): ?>
		if($.trim($("#settings-idno").val()).length == 0)
		{
			$("#settings-idno").focus();			
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['LANG']['IDNO'],
);
echo $k['name']($k['format'],$k['value']);
?>");	
			return false;
		}	
		<?php endif; ?>	
		
		<?php if ($this->_var['user_info']['mobile'] == ''): ?>
		if(!$.checkMobilePhone($("#settings-mobile").val()))
		{
			$("#settings-mobile").focus();			
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['FORMAT_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_MOBILE'],
);
echo $k['name']($k['format'],$k['value']);
?>");	
			return false;
		}	
		<?php endif; ?>	
		
		<?php if (app_conf ( "MOBILE_MUST" ) == 1): ?>
			if($.trim($("#settings-mobile").val()).length == 0)
			{
				$("#settings-mobile").focus();
				$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_TITLE_MOBILE'],
);
echo $k['name']($k['format'],$k['value']);
?>");
				
				return false;
			}
		<?php endif; ?>
		
		if($("select[name='byear']").val()== 0||$("select[name='bmonth']").val() == 0||$("select[name='bday']").val() == 0)
		{
			$("select[name='byear']").focus();
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_BIRTHDAY'],
);
echo $k['name']($k['format'],$k['value']);
?>");
			
			return false;
		}
		
		
		if($("#settings-graduatedyear").val() == ""){
			$("#settings-graduatedyear").focus();
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['LANG']['GRADUATEDYEAR'],
);
echo $k['name']($k['format'],$k['value']);
?>");
			
			return false;
		}
		
		var is_marriage = false;
		$("input[name='marriage']").each(function(){
			if($(this).attr("checked")==true){
				is_marriage = true;
			}
		});
		
		if(!is_marriage){
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['LANG']['MARRIAGE'],
);
echo $k['name']($k['format'],$k['value']);
?>");
			return false;
		}
		var is_haschild
		$("input[name='haschild']").each(function(){
			if($(this).attr("checked")==true){
				is_haschild = true;
			}
		});
		
		if(!is_haschild){
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['LANG']['HASCHILD'],
);
echo $k['name']($k['format'],$k['value']);
?>");
			return false;
		}
		
		if($.trim($("#settings-graduation").val()).length == 0){
			$("#settings-graduation").focus();
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['LANG']['GRADUATION'],
);
echo $k['name']($k['format'],$k['value']);
?>");
			
			return false;
		}
		
		<?php $_from = $this->_var['field_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field_item');if (count($_from)):
    foreach ($_from AS $this->_var['field_item']):
?>
			<?php if ($this->_var['field_item']['is_must'] == 1): ?>
			if($("#settings-<?php echo $this->_var['field_item']['field_name']; ?>").val()=='')
			{
				$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['field_item']['field_show_name'],
);
echo $k['name']($k['format'],$k['value']);
?>");	
				$("#settings-<?php echo $this->_var['field_item']['field_name']; ?>").focus();
				return false;
			}
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		
		if($("select[name='n_province_id']").val()== 0||$("select[name='n_city_id']").val() == 0)
		{
			$("select[name='n_province_id']").focus();
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['LANG']['NATICE_PLACE'],
);
echo $k['name']($k['format'],$k['value']);
?>");
			
			return false;
		}
		
		if($("select[name='province_id']").val()== 0||$("select[name='city_id']").val() == 0)
		{
			$("select[name='province_id']").focus();
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['LANG']['USER_REGION'],
);
echo $k['name']($k['format'],$k['value']);
?>");
			
			return false;
		}
		
		if($.trim($("#settings-address").val()).length == 0){
			$("#settings-address").focus();
			$.showErr("<?php 
$k = array (
  'name' => 'sprintf',
  'format' => $this->_var['LANG']['EMPTY_ERROR_TIP'],
  'value' => $this->_var['LANG']['ADDRESS'],
);
echo $k['name']($k['format'],$k['value']);
?>");
			
			return false;
		}
		var query = $("#J_uc_account_save").serialize();
		$.ajax({
			url: $("#J_uc_account_save").attr("action"),
			data:query,
			type:"post",
			dataType:"json",
			success:function(result){
				if(result.status==1)
				{
					<?php if ($this->_var['ACTION_NAME'] == 'applyamount'): ?>
					window.location.href = "<?php
echo parse_url_tag("u:index|borrow#applyamount|"."status=2".""); 
?>";
					<?php else: ?>
					window.location.href = "<?php
echo parse_url_tag("u:index|borrow#stepone|"."status=2".""); 
?>";
					<?php endif; ?>
				}
				else{
					$.showErr(result.info);
				}
			}
		});
		return false;
	});
});

function upd_file(obj,file_id,uid)
{	
	$("input[name='"+file_id+"']").bind("change",function(){			
		$(obj).hide();
		$(obj).parent().find(".fileuploading").removeClass("hide");
		$(obj).parent().find(".fileuploading").removeClass("show");
		$(obj).parent().find(".fileuploading").addClass("show");
		  $.ajaxFileUpload
		   (
			   {
				    url:APP_ROOT+'/index.php?ctl=avatar&act=upload&uid='+uid,
				    secureuri:false,
				    fileElementId:file_id,
				    dataType: 'json',
				    success: function (data, status)
				    {
				   		$(obj).show();
				   		$(obj).parent().find(".fileuploading").removeClass("hide");
						$(obj).parent().find(".fileuploading").removeClass("show");
						$(obj).parent().find(".fileuploading").addClass("hide");
				   		if(data.status==1)
				   		{
				   			document.getElementById("avatar").src = data.middle_url+"?r="+Math.random();
				   		}
				   		else
				   		{
				   			$.showErr(data.msg);
				   		}
				   		
				    },
				    error: function (data, status, e)
				    {
						$.showErr(data.responseText);;
				    	$(obj).show();
				    	$(obj).parent().find(".fileuploading").removeClass("hide");
						$(obj).parent().find(".fileuploading").removeClass("show");
						$(obj).parent().find(".fileuploading").addClass("hide");
				    }
			   }
		   );
		  $("input[name='"+file_id+"']").unbind("change");
	});	
}

//切换地区
$(document).ready(function(){	
		$("select[name='province_id']").bind("change",function(){
			load_city($("select[name='province_id']"),$("select[name='city_id']"));
		});
		$("select[name='n_province_id']").bind("change",function(){
			load_city($("select[name='n_province_id']"),$("select[name='n_city_id']"));
		});
		
		$("input[name='hashouse']").click(function(){
			if($(this).val()==1){
				$("input[name='houseloan']").attr("disabled",false);
			}
			else{
				$("input[name='houseloan']").attr("disabled",true);
				$("#houseloan_1").attr("checked",false);
				$("#houseloan_0").attr("checked",true);
			}
		});
		
		$("input[name='hascar']").click(function(){
			if($(this).val()==1){
				$("input[name='carloan']").attr("disabled",false);
			}
			else{
				$("input[name='carloan']").attr("disabled",true);
				$("#carloan_1").attr("checked",false);
				$("#carloan_0").attr("checked",true);
			}
		});
	});
	
	function load_city(pname,cname)
	{
		var id = pname.val();
		var evalStr="regionConf.r"+id+".c";

		if(id==0)
		{
			var html = "<option value='0'>="+LANG['SELECT_PLEASE']+"=</option>";
		}
		else
		{
			var regionConfs=eval(evalStr);
			evalStr+=".";
			var html = "<option value='0'>="+LANG['SELECT_PLEASE']+"=</option>";
			for(var key in regionConfs)
			{
				html+="<option value='"+eval(evalStr+key+".i")+"'>"+eval(evalStr+key+".n")+"</option>";
			}
		}
		cname.html(html);
	}
	function idcheck(o){
	   var str=o.value;
	   var byear=$("select[name='byear']");
	   var bmonth=$("select[name='bmonth']");
	   var bday=$("select[name='bday']");
		if(str.length==15){
	    	var re=/\d{6}(\d{2})([01]\d)([0123]\d)\d{3}/;
			var id=re.exec(str);
			byear.val(19+id[1]);
			bmonth.val(id[2]);
			bday.val(id[3]);
			alert(id[2]);
		}else if(str.length==18){
			var re=/\d{6}([12]\d{3})([01]\d)([0123]\d)\d{3}(\d|\w)/;
			var id=re.exec(str);
			byear.val(id[1]);
			bmonth.val(id[2]);
			bday.val(id[3]);
		}else{
			byear.val("");
			bmonth.val("");
			bday.val("");
			return false;	
		}
	
	 }
</script>