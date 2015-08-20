<?php /* Smarty version Smarty-3.0.6, created on 2015-01-01 07:45:34
         compiled from "C:/nasoindiadev/nexenuiserverdev/WebApp/web/templates/add_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:727554a4fb1e1d4cc4-66925788%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '132765cedbc96194484ea3f48c30bf0f9da1fc5b' => 
    array (
      0 => 'C:/nasoindiadev/nexenuiserverdev/WebApp/web/templates/add_user.tpl',
      1 => 1419767447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '727554a4fb1e1d4cc4-66925788',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo $_smarty_tpl->getVariable('BASE_CSS_URL')->value;?>
/jquery-ui-custom.css" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('BASE_CSS_URL')->value;?>
/jqModal.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASE_JS_URL')->value;?>
/add_user.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASE_JS_URL')->value;?>
/jqModal.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASE_JS_URL')->value;?>
/jquery-ui-custom.min.js"></script>

<div id="app_content">

	<?php if (sizeof($_smarty_tpl->getVariable('messages')->value)>0){?>
		<div class="status" align="center">
			<label for="status" generated="true" class="success_msg">
				<?php if (isset($_smarty_tpl->getVariable('messages',null,true,false)->value['register_success'])){?>
					<b><?php echo $_smarty_tpl->getVariable('messages')->value['register_success'];?>
</b>
				<?php }?>
				<?php if (isset($_smarty_tpl->getVariable('messages',null,true,false)->value['register_failure'])){?>
					<b><?php echo $_smarty_tpl->getVariable('messages')->value['register_failure'];?>
</b>
				<?php }?>
			</label>
		</div>
	<?php }?>
	
	<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->showRegistrationForm)&&$_smarty_tpl->getVariable('response')->value->showRegistrationForm==1){?>

	<!-- BEGIN LEFT COLUMN -->
	<div class="full_width">
		<h1 class="title">Register</h1>
		<p class="instructions">Required fields are marked with a red asterisk (<span class="required">*</span>).
		<div class="app_details">
			<form name="addUserForm" action="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/AddUser" method="POST">
				<table class="app_details add_details" summary="Add App information">
					<tbody>
					
					<tr>
						<th scope="row">
							<label for="email" title="required" class="required">
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['email_required'])&&$_smarty_tpl->getVariable('errors')->value['email_required']!=''){?>
									<?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['email_required'],25,"\n",false);?>

								<?php }elseif(count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['email_duplicate'])&&$_smarty_tpl->getVariable('errors')->value['email_duplicate']!=''){?>
									<?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['email_duplicate'],25,"\n",false);?>

								<?php }?>
								<span>Email<span>*</span></span>
							</label>
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
					
					<tr>
						<th scope="row">
							<label for="firstname" title="" class="">
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['firstname_required'])&&$_smarty_tpl->getVariable('errors')->value['firstname_required']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['firstname_required'],25,"\n",false);?>
<?php }?>
								<span>First name</span>
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
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['lastname_required'])&&$_smarty_tpl->getVariable('errors')->value['lastname_required']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['lastname_required'],25,"\n",false);?>
<?php }?>
								<span>Last name</span>
							</label>
						</th>
						<td>
							<input class="textbox" type="text" id="lastname" name="lastname" maxlength="50" value="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->userSVC)){?><?php echo $_smarty_tpl->getVariable('response')->value->userSVC->lastname;?>
<?php }?>"/>
						</td>
					</tr>
					
					
					<tr>
						<th scope="row">
							<label for="txtCaptcha" title="required" class="required">
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['txtCaptcha_required'])&&$_smarty_tpl->getVariable('errors')->value['txtCaptcha_required']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['txtCaptcha_required'],25,"\n",false);?>
<?php }?>
								<span>Verification<span>*</span></span>
							</label>
						</th>
						<td>
							Enter the characters in the picture:
							<input type="text" name="txtCaptcha" id="txtCaptcha" size="6" maxlength="6" class="textbox"/>&nbsp;
							<img src="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/captcha.php" title="post_comments" alt="captcha image" id="captcha_post_comments" style="vertical-align:top;" class="captcha_image"/>
						</td>
					</tr>
					
					<tr>
						<th scope="row">
							&nbsp;
							<label for="iAgree">
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['agree_to_terms'])&&$_smarty_tpl->getVariable('errors')->value['agree_to_terms']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['agree_to_terms'],25,"\n",false);?>
<?php }?>
							</label>
						</th>
						<td>
							<input type="checkbox" name="iAgree" id="iAgree" value="1"/>&nbsp;&nbsp;
							I agree to the <a id="TC" class="popUpLink" >Terms and Condition</a> and the <a id="PP" class="popUpLink" >Privacy Policy</a>
						</td>
					</tr>
					
					<tr>
						<th scope="row"><span class="hidden">Complete form</span></th>
						<td><br />
							<input type="submit" value="Register" maxlength="50" name="submitUser" id="submitUser" class="button" />
						</td>
					</tr>
					</tbody>
				</table>
			</form>
		</div>
		<div class="jqmWindow" id="ex2">
			Please wait... <img src="<?php echo $_smarty_tpl->getVariable('BASE_IMAGE_URL')->value;?>
/no-image.gif" alt="loading" />
		</div>
	</div>

	<?php }?>
</div>