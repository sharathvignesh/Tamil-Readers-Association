<<<<<<< .mine
<?php /* Smarty version Smarty-3.0.6, created on 2015-01-07 14:24:56
=======
<?php /* Smarty version Smarty-3.0.6, created on 2015-02-25 03:12:03
>>>>>>> .r29
         compiled from "C:/nasoindiadev/nexenuiserverdev/WebApp/web/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:49054ad41b80e1259-52794309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8401ebff8b29eb337949493352179fa7e2abee03' => 
    array (
      0 => 'C:/nasoindiadev/nexenuiserverdev/WebApp/web/templates/login.tpl',
<<<<<<< .mine
      1 => 1419855299,
=======
      1 => 1419855924,
>>>>>>> .r29
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49054ad41b80e1259-52794309',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo $_smarty_tpl->getVariable('BASE_CSS_URL')->value;?>
/jquery-ui-custom.css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASE_JS_URL')->value;?>
/login.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASE_JS_URL')->value;?>
/jquery-ui-custom.min.js"></script>
<div id="event_content">
	<?php if (sizeof($_smarty_tpl->getVariable('messages')->value)>0){?>
		<div class="status" align="center">
			<label for="status" generated="true" class="success_msg">
				<?php if (isset($_smarty_tpl->getVariable('messages',null,true,false)->value['add_login_required'])){?>
					<b><?php echo $_smarty_tpl->getVariable('messages')->value['add_login_required'];?>
</b>
				<?php }?>
				<?php if (isset($_smarty_tpl->getVariable('messages',null,true,false)->value['view_login_required'])){?>
					<b><?php echo $_smarty_tpl->getVariable('messages')->value['view_login_required'];?>
</b>
				<?php }?>
			</label>
		</div>
	<?php }?>
	<?php if (sizeof($_smarty_tpl->getVariable('errors')->value)>0){?>
		<div class="status" align="center">
			<label for="status" generated="true" class="error">
				<?php if (isset($_smarty_tpl->getVariable('errors',null,true,false)->value['authentication_failed'])){?>
					<b><?php echo $_smarty_tpl->getVariable('errors')->value['authentication_failed'];?>
</b>
				<?php }?>
			</label>
		</div>
	<?php }?>
	<!-- BEGIN LEFT COLUMN -->
	<div class="full_width">
		<h1 class="title">Sign In</h1>
		<p class="instructions">Required fields are marked with a red asterisk (<span class="required">*</span>).
		<div class="event_details">
            <form name="loginForm" action="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/Login" method="POST">
				<table class="event_details add_details" summary="Login information">
					<tbody>
					<tr>
						<th scope="row">
							<label for="loginEmail" title="required" class="required">
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['email_required'])&&$_smarty_tpl->getVariable('errors')->value['email_required']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['email_required'],25,"\n",false);?>
<?php }?>
								<span>Email<span>*</span></span>
							</label>
						</th>
						<td>
							<input class="textbox" type="text" id="loginEmail" name="loginEmail" maxlength="50" value=""/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="loginPassword" title="required" class="required">
								<?php if (count($_smarty_tpl->getVariable('errors')->value)>0&&isset($_smarty_tpl->getVariable('errors',null,true,false)->value['password_required'])&&$_smarty_tpl->getVariable('errors')->value['password_required']!=''){?><?php echo wordwrap($_smarty_tpl->getVariable('errors')->value['password_required'],25,"\n",false);?>
<?php }?>
								<span>Password<span>*</span></span>
							</label>
						</th>
						<td>
							<input class="textbox" type="password" id="loginPassword" name="loginPassword" maxlength="50" value=""/>
						</td>
					</tr>
					<tr>
						<th scope="row"><span class="hidden">Complete form</span></th>
						<td><br />
							<input class="button" type="submit" id="loginSubmit" name="loginSubmit" value="Sign In"/>&nbsp;
							<span style="vertical-align:middle;"><a href="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/ForgotPassword">Forgot Password ?</a></span>
							<br/><br/>
							<span style="vertical-align:middle;"><a href="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->facebookLoginUrl)){?><?php echo $_smarty_tpl->getVariable('response')->value->facebookLoginUrl;?>
<?php }?>"><img src="<?php echo $_smarty_tpl->getVariable('BASE_IMAGE_URL')->value;?>
/login_with_facebook.png" alt="Login With Facebook"/></a></span>
							&nbsp;
							<span style="vertical-align:middle;"><a href="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->twitterLoginUrl)){?><?php echo $_smarty_tpl->getVariable('response')->value->twitterLoginUrl;?>
<?php }?>"><img src="<?php echo $_smarty_tpl->getVariable('BASE_IMAGE_URL')->value;?>
/login_with_twitter.png" alt="Login With Twitter" /></a></span>
							<br/><br/>
							<span style="vertical-align:middle;">New User? Sign Up <a href="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/AddUser">Here</a></span>
						</td>
					</tr>
					</tbody>
				</table>
            </form>
        </div>
    </div>
</div>