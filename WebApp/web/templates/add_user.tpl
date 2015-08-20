<link rel="stylesheet" media="screen" type="text/css" href="{$BASE_CSS_URL}/jquery-ui-custom.css" />
<link rel="stylesheet" href="{$BASE_CSS_URL}/jqModal.css" type="text/css" media="screen" />
<script type="text/javascript" src="{$BASE_JS_URL}/add_user.js"></script>
<script type="text/javascript" src="{$BASE_JS_URL}/jqModal.js"></script>
<script type="text/javascript" src="{$BASE_JS_URL}/jquery-ui-custom.min.js"></script>

<div id="app_content">

	{if sizeof($messages) > 0}
		<div class="status" align="center">
			<label for="status" generated="true" class="success_msg">
				{if isset($messages.register_success)}
					<b>{$messages.register_success}</b>
				{/if}
				{if isset($messages.register_failure)}
					<b>{$messages.register_failure}</b>
				{/if}
			</label>
		</div>
	{/if}
	
	{if isset($response->showRegistrationForm) && $response->showRegistrationForm==1}

	<!-- BEGIN LEFT COLUMN -->
	<div class="full_width">
		<h1 class="title">Register</h1>
		<p class="instructions">Required fields are marked with a red asterisk (<span class="required">*</span>).
		<div class="app_details">
			<form name="addUserForm" action="{$BASE_URL}/AddUser" method="POST">
				<table class="app_details add_details" summary="Add App information">
					<tbody>
					
					<tr>
						<th scope="row">
							<label for="email" title="required" class="required">
								{if $errors|@count > 0 && isset($errors.email_required) && $errors.email_required != ''}
									{$errors.email_required|wordwrap:25}
								{elseif $errors|@count > 0 && isset($errors.email_duplicate) && $errors.email_duplicate != ''}
									{$errors.email_duplicate|wordwrap:25}
								{/if}
								<span>Email<span>*</span></span>
							</label>
						</th>
						<td>
							<input class="textbox" type="text" id="email" name="email" maxlength="50" value="{if isset($response->userSVC)}{$response->userSVC->email}{/if}"/>
						</td>
					</tr>
					
					<tr>
						<th scope="row">
							<label for="username" title="required" class="required">
								{if $errors|@count > 0 && isset($errors.username_required) && $errors.username_required != ''}
									{$errors.username_required|wordwrap:25}
								{elseif $errors|@count > 0 && isset($errors.username_exists) && $errors.username_exists != ''}
									{$errors.username_exists|wordwrap:25}
								{else}
									<span>Username<span>*</span></span>
								{/if}
							</label>
						</th>
						<td>
							<input class="textbox" type="text" id="username" name="username" maxlength="50" value="{if isset($response->userSVC)}{$response->userSVC->username}{/if}"/>
						</td>
					</tr>
					
					<tr>
						<th scope="row">
							<label for="firstname" title="" class="">
								{if $errors|@count > 0 && isset($errors.firstname_required) && $errors.firstname_required != ''}{$errors.firstname_required|wordwrap:25}{/if}
								<span>First name</span>
							</label>
						</th>
						<td>
							<input class="textbox" type="text" id="firstname" name="firstname" maxlength="50" value="{if isset($response->userSVC)}{$response->userSVC->firstname}{/if}"/>
						</td>
					</tr>
					
					<tr>
						<th scope="row">
							<label for="lastname" title="" class="">
								{if $errors|@count > 0 && isset($errors.lastname_required) && $errors.lastname_required != ''}{$errors.lastname_required|wordwrap:25}{/if}
								<span>Last name</span>
							</label>
						</th>
						<td>
							<input class="textbox" type="text" id="lastname" name="lastname" maxlength="50" value="{if isset($response->userSVC)}{$response->userSVC->lastname}{/if}"/>
						</td>
					</tr>
					
					
					<tr>
						<th scope="row">
							<label for="txtCaptcha" title="required" class="required">
								{if $errors|@count > 0 && isset($errors.txtCaptcha_required) && $errors.txtCaptcha_required != ''}{$errors.txtCaptcha_required|wordwrap:25}{/if}
								<span>Verification<span>*</span></span>
							</label>
						</th>
						<td>
							Enter the characters in the picture:
							<input type="text" name="txtCaptcha" id="txtCaptcha" size="6" maxlength="6" class="textbox"/>&nbsp;
							<img src="{$BASE_URL}/captcha.php" title="post_comments" alt="captcha image" id="captcha_post_comments" style="vertical-align:top;" class="captcha_image"/>
						</td>
					</tr>
					
					<tr>
						<th scope="row">
							&nbsp;
							<label for="iAgree">
								{if $errors|@count > 0 && isset($errors.agree_to_terms) && $errors.agree_to_terms != ''}{$errors.agree_to_terms|wordwrap:25}{/if}
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
			Please wait... <img src="{$BASE_IMAGE_URL}/no-image.gif" alt="loading" />
		</div>
	</div>

	{/if}
</div>