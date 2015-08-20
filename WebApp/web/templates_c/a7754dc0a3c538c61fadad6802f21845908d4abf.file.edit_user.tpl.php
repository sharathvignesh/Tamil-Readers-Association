<?php /* Smarty version Smarty-3.0.6, created on 2015-01-01 07:44:29
         compiled from "C:/nasoindiadev/nexenuiserverdev/WebApp/web/templates/edit_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1409854a4faddc03847-56205569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7754dc0a3c538c61fadad6802f21845908d4abf' => 
    array (
      0 => 'C:/nasoindiadev/nexenuiserverdev/WebApp/web/templates/edit_user.tpl',
      1 => 1419767447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1409854a4faddc03847-56205569',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\nasoindiadev\nexenuiserverdev\WebApp\libs\smarty\plugins\modifier.date_format.php';
?><link rel="stylesheet" media="screen" type="text/css" href="<?php echo $_smarty_tpl->getVariable('BASE_CSS_URL')->value;?>
/jquery-ui-custom.css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASE_JS_URL')->value;?>
/edit_user.js"></script>
<!--<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASE_JS_URL')->value;?>
/jquery-ui-custom.min.js"></script>-->
<div id="app_content">

	<?php if (sizeof($_smarty_tpl->getVariable('messages')->value)>0){?>
		<div class="status" align="center">
			<label for="status" generated="true" class="success_msg">
				<?php if (isset($_smarty_tpl->getVariable('messages',null,true,false)->value['update_success'])){?>
					<b><?php echo $_smarty_tpl->getVariable('messages')->value['update_success'];?>
</b>
				<?php }?>
				<?php if (isset($_smarty_tpl->getVariable('messages',null,true,false)->value['update_failure'])){?>
					<b><?php echo $_smarty_tpl->getVariable('messages')->value['update_failure'];?>
</b>
				<?php }?>
				<?php if (isset($_smarty_tpl->getVariable('messages',null,true,false)->value['facebook_auth_success'])){?>
					<b><?php echo $_smarty_tpl->getVariable('messages')->value['facebook_auth_success'];?>
</b>
				<?php }?>
				<?php if (isset($_smarty_tpl->getVariable('messages',null,true,false)->value['twitter_auth_success'])){?>
					<b><?php echo $_smarty_tpl->getVariable('messages')->value['twitter_auth_success'];?>
</b>
				<?php }?>
				<?php if (isset($_smarty_tpl->getVariable('messages',null,true,false)->value['facebook_handle_removed'])){?>
					<b><?php echo $_smarty_tpl->getVariable('messages')->value['facebook_handle_removed'];?>
</b>
				<?php }?>
				<?php if (isset($_smarty_tpl->getVariable('messages',null,true,false)->value['twitter_handle_removed'])){?>
					<b><?php echo $_smarty_tpl->getVariable('messages')->value['twitter_handle_removed'];?>
</b>
				<?php }?>
				<?php if (isset($_smarty_tpl->getVariable('messages',null,true,false)->value['social_auth_failure'])){?>
					<b><?php echo $_smarty_tpl->getVariable('messages')->value['social_auth_failure'];?>
</b>
				<?php }?>
			</label>
		</div>
	<?php }?>

	<!-- BEGIN LEFT COLUMN -->
	<div class="full_width">
		<h1 class="title">Edit Your Details</h1>
		<p class="instructions">Required fields are marked with a red asterisk (<span class="required">*</span>).
		<div class="event_details">
            <form name="editUserForm" action="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/EditUser" method="POST">
				<input type="hidden" name="accountType" id="accountType" value="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)){?><?php echo $_smarty_tpl->getVariable('response')->value->userSVC->accountType;?>
<?php }?>" />
				<table class="event_details add_details" summary="Add event information">
					<tbody>
					<tr>
						<th scope="row">
							<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)&&$_smarty_tpl->getVariable('response')->value->userSVC->accountType==1){?>
								<label for="email" title="required" class="required">
									<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['email_required'])&&$_smarty_tpl->getVariable('errors')->value['email_required']!=''){?>
										<?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['email_required'],25,"\n",false);?>

									<?php }elseif(count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['email_duplicate'])&&$_smarty_tpl->getVariable('errors')->value['email_duplicate']!=''){?>
										<?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['email_duplicate'],25,"\n",false);?>

									<?php }else{ ?>
										<span>Email<span>*</span></span>
									<?php }?>
								</label>
							<?php }else{ ?>
								<label for="email" title="" class="">
									<span>Email</span>
								</label>
							<?php }?>
						</th>
						<td>
							<input class="textbox" type="text" id="email" name="email" maxlength="50" value="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)){?><?php echo $_smarty_tpl->getVariable('response')->value->userSVC->email;?>
<?php }?>"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="username" title="required" class="required">
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['username_required'])&&$_smarty_tpl->getVariable('errors')->value['username_required']!=''){?>
									<?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['username_required'],25,"\n",false);?>

								<?php }elseif(count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['username_exists'])&&$_smarty_tpl->getVariable('errors')->value['username_exists']!=''){?>
									<?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['username_exists'],25,"\n",false);?>

								<?php }else{ ?>
									<span>Username<span>*</span></span>
								<?php }?>
							</label>
						</th>
						<td>
							<input class="textbox" type="text" id="username" name="username" maxlength="50" value="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)){?><?php echo $_smarty_tpl->getVariable('response')->value->userSVC->username;?>
<?php }?>"/>
						</td>
					</tr>
					<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->facebookLoginUrl)&&$_smarty_tpl->getVariable('response')->value->facebookLoginUrl!=''){?>
						<tr>
							<th scope="row"></th>
							<td>
								<a href="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->facebookLoginUrl)){?><?php echo $_smarty_tpl->getVariable('response')->value->facebookLoginUrl;?>
<?php }?>">Authenticate Your Facebook Account</a>
							</td>
						</tr>
					<?php }elseif(isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)&&$_smarty_tpl->getVariable('response')->value->userSVC->accountType==1&&count($_smarty_tpl->getVariable('response')->value->userSVC->facebookDetails)>0&&isset($_SESSION['session_user_current_org_id'])&&$_SESSION['session_user_current_org_id']=="mFirstWeb"){?>
						<tr>
							<th scope="row"></th>
							<td>
								<a href="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/EditUser?removeFacebookHandle=1">Remove Your Facebook Account</a>
							</td>
						</tr>
					<?php }?>
					<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->twitterLoginUrl)&&$_smarty_tpl->getVariable('response')->value->twitterLoginUrl!=''){?>
						<tr>
							<th scope="row"></th>
							<td>
								<a href="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->twitterLoginUrl)){?><?php echo $_smarty_tpl->getVariable('response')->value->twitterLoginUrl;?>
<?php }?>">Authenticate Your Twitter Account</a>
							</td>
						</tr>
					<?php }elseif(isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)&&$_smarty_tpl->getVariable('response')->value->userSVC->accountType==1&&count($_smarty_tpl->getVariable('response')->value->userSVC->twitterDetails)>0&&isset($_SESSION['session_user_current_org_id'])&&$_SESSION['session_user_current_org_id']=="mFirstWeb"){?>
						<tr>
							<th scope="row"></th>
							<td>
								<a href="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/EditUser?removeTwitterHandle=1">Remove Your Twitter Account</a>
							</td>
						</tr>
					<?php }?>
					
					<!-- Password required only for mFirst accounts-->
					<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)&&$_smarty_tpl->getVariable('response')->value->userSVC->accountType==1){?>
						<tr>
							<th scope="row">
								<label for="password" title="" class="">
									<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['old_password_required'])&&$_smarty_tpl->getVariable('errors')->value['old_password_required']!=''){?>
										<?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['old_password_required'],25,"\n",false);?>

									<?php }?>
									<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['password_incorrect'])&&$_smarty_tpl->getVariable('errors')->value['password_incorrect']!=''){?>
										<?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['password_incorrect'],25,"\n",false);?>

									<?php }?>
									<span>Password</span>
								</label>
							</th>
							<td>
								<input class="textbox" type="password" id="password" name="password" maxlength="50" value=""/>
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="newPassword" title="" class="">
									<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['new_password_required'])&&$_smarty_tpl->getVariable('errors')->value['new_password_required']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['new_password_required'],25,"\n",false);?>
<?php }?>
									<span>New Password</span>
								</label>
							</th>
							<td>
								<input class="textbox" type="password" id="newPassword" name="newPassword" maxlength="50" value=""/>
							</td>
						</tr>
						<tr>
							<th scope="row">
								<label for="confirmPassword" title="" class="">
									<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['password_mismatch'])&&$_smarty_tpl->getVariable('errors')->value['password_mismatch']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['password_mismatch'],25,"\n",false);?>
<?php }?>
									<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['confirm_password_required'])&&$_smarty_tpl->getVariable('errors')->value['confirm_password_required']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['confirm_password_required'],25,"\n",false);?>
<?php }?>
									<span>Confirm Password</span>
								</label>
							</th>
							<td>
								<input class="textbox" type="password" id="confirmPassword" name="confirmPassword" maxlength="50" value=""/>
							</td>
						</tr>
					<?php }?>
					<tr>
						<th scope="row">
							<label for="firstname" title="" class="">
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['firstname_required'])&&$_smarty_tpl->getVariable('errors')->value['firstname_required']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['firstname_required'],25,"\n",false);?>
<?php }?>
								<span>Firstname</span>
							</label>
						</th>
						<td>
							<input class="textbox" type="text" id="firstname" name="firstname" maxlength="50" value="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)){?><?php echo $_smarty_tpl->getVariable('response')->value->userSVC->firstname;?>
<?php }?>"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="lastname" title="" class="">
								<span>Lastname</span>
							</label>
						</th>
						<td>
							<input class="textbox" type="text" id="lastname" name="lastname" maxlength="50" value="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)){?><?php echo $_smarty_tpl->getVariable('response')->value->userSVC->lastname;?>
<?php }?>"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="gender" title="" class="">
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['gender_required'])&&$_smarty_tpl->getVariable('errors')->value['gender_required']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['gender_required'],25,"\n",false);?>
<?php }?>
								<span>Gender</span>
							</label>
						</th>
						<td>
							<select name="gender" id="gender">
								<option value=""></option>
								<option value="m" <?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)&&$_smarty_tpl->getVariable('response')->value->userSVC->gender=="m"){?>SELECTED<?php }?>>Male</option>
								<option value="f" <?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)&&$_smarty_tpl->getVariable('response')->value->userSVC->gender=="f"){?>SELECTED<?php }?>>Female</option>
							</select>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="yearOfBirth" title="" class="">
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['dateOfBirth_required'])&&$_smarty_tpl->getVariable('errors')->value['dateOfBirth_required']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['dateOfBirth_required'],25,"\n",false);?>
<?php }?>
								<span>Year Of Birth</span>
							</label>
						</th>
						<td>
							<?php $_smarty_tpl->tpl_vars['thisyear'] = new Smarty_variable(smarty_modifier_date_format(time(),"%Y"), null, null);?>
							<?php $_smarty_tpl->tpl_vars['endYear'] = new Smarty_variable(80, null, null);?>
							<select id="yearOfBirth" name="yearOfBirth">
								<option value=""></option>
								<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['name'] = 'yearValue';
$_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('thisyear')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['max'] = (int)$_smarty_tpl->getVariable('endYear')->value;
$_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['step'] = ((int)-1) == 0 ? 1 : (int)-1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['yearValue']['total']);
?>
									<option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['yearValue']['index'];?>
" <?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)&&$_smarty_tpl->getVariable('response')->value->userSVC->yearOfBirth!=''&&$_smarty_tpl->getVariable('response')->value->userSVC->yearOfBirth==$_smarty_tpl->getVariable('smarty')->value['section']['yearValue']['index']){?>SELECTED<?php }?>>
										<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['yearValue']['index'];?>

									</option>
								<?php endfor; endif; ?>
							</select>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="addressLine1" title="" class="">
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['addressLine1_required'])&&$_smarty_tpl->getVariable('errors')->value['addressLine1_required']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['addressLine1_required'],25,"\n",false);?>
<?php }?>
								<span>Street address</span>
							</label>
						</th>
						<td>
							<input class="textbox" type="text" id="addressLine1" name="addressLine1" maxlength="50" value="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)){?><?php echo $_smarty_tpl->getVariable('response')->value->userSVC->addressLine1;?>
<?php }?>"/>
							<br />
							<input class="textbox" type="text" id="addressLine2" name="addressLine2" maxlength="50" value="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)){?><?php echo $_smarty_tpl->getVariable('response')->value->userSVC->addressLine2;?>
<?php }?>"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="addressCity" title="" class="">
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['addressCity_required'])&&$_smarty_tpl->getVariable('errors')->value['addressCity_required']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['addressCity_required'],25,"\n",false);?>
<?php }?>
								<span>City</span>
							</label>
						</th>
						<td>
							<input type="text" maxlength="50" name="addressCity" id="addressCity" class="textbox" value="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)){?><?php echo $_smarty_tpl->getVariable('response')->value->userSVC->addressCity;?>
<?php }?>"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="addressState" title="" class="">
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['addressState_required'])&&$_smarty_tpl->getVariable('errors')->value['addressState_required']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['addressState_required'],25,"\n",false);?>
<?php }?>
								<span>State</span>
							</label>
						</th>
						<td>
							<input type="text" maxlength="50" name="addressState" id="addressState" class="textbox" value="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)){?><?php echo $_smarty_tpl->getVariable('response')->value->userSVC->addressState;?>
<?php }?>"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="addressZipCode">
								<span>Zipcode</span>
							</label>
						</th>
						<td>
							<input type="text" maxlength="50" name="addressZipCode" id="addressZipCode" class="textbox" value="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)){?><?php echo $_smarty_tpl->getVariable('response')->value->userSVC->addressZipCode;?>
<?php }?>"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="addressCountry"  title="" class="">
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['addressCountry_required'])&&$_smarty_tpl->getVariable('errors')->value['addressCountry_required']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['addressCountry_required'],25,"\n",false);?>
<?php }?>
								<span>Country</span>
							</label>
						</th>
						<td>
							<input type="text" maxlength="50" name="addressCountry" id="addressCountry" class="textbox" value="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)){?><?php echo $_smarty_tpl->getVariable('response')->value->userSVC->addressCountry;?>
<?php }?>"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="phoneNo">
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['phoneNo_required'])&&$_smarty_tpl->getVariable('errors')->value['phoneNo_required']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['phoneNo_required'],25,"\n",false);?>
<?php }?>
								<span>Phone No</span>
							</label>
						</th>
						<td>
							<input type="text" maxlength="50" name="phoneNo" id="phoneNo" class="textbox" value="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)){?><?php echo $_smarty_tpl->getVariable('response')->value->userSVC->phone;?>
<?php }?>"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="mobile">
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['mobile_required'])&&$_smarty_tpl->getVariable('errors')->value['mobile_required']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['mobile_required'],25,"\n",false);?>
<?php }?>
								<span>Mobile</span>
							</label>
						</th>
						<td>
							<input type="text" maxlength="50" name="mobile" id="mobile" class="textbox" value="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)){?><?php echo $_smarty_tpl->getVariable('response')->value->userSVC->mobile;?>
<?php }?>"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="mobile">
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['interests_required'])&&$_smarty_tpl->getVariable('errors')->value['interests_required']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['interests_required'],25,"\n",false);?>
<?php }?>
								<span>Interests</span>
							</label>
						</th>
						<td>
							<textarea class="textarea" maxlength="500" name="interests" id="interests"><?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)){?><?php echo $_smarty_tpl->getVariable('response')->value->userSVC->interests;?>
<?php }?></textarea>
						</td>
					</tr>
					<tr>
						<th scope="row"></th>
						<td>
							<input class="" type="checkbox" id="newsletters" name="newsletters" value="1" <?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)&&$_smarty_tpl->getVariable('response')->value->userSVC->newsletters==1){?>CHECKED<?php }?>/>&nbsp;Sign-up for newsletters
						</td>
					</tr>
					<tr>
						<th scope="row"><span class="hidden">Complete form</span></th>
						<td><br />
							<input class="button" type="submit" id="submitUser" name="submitUser" maxlength="50" value="Update"/>
						</td>
					</tr>
					</tbody>
				</table>
            </form>
		</div>
    </div>
</div>