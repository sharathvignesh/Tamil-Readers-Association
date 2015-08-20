<link rel="stylesheet" media="screen" type="text/css" href="{$BASE_CSS_URL}/jquery-ui-custom.css" />
<script type="text/javascript" src="{$BASE_JS_URL}/login.js"></script>
<script type="text/javascript" src="{$BASE_JS_URL}/jquery-ui-custom.min.js"></script>
<div id="event_content">
	{if sizeof($messages) > 0}
		<div class="status" align="center">
			<label for="status" generated="true" class="success_msg">
				{if isset($messages.add_login_required)}
					<b>{$messages.add_login_required}</b>
				{/if}
				{if isset($messages.view_login_required)}
					<b>{$messages.view_login_required}</b>
				{/if}
			</label>
		</div>
	{/if}
	{if sizeof($errors) > 0}
		<div class="status" align="center">
			<label for="status" generated="true" class="error">
				{if isset($errors.authentication_failed)}
					<b>{$errors.authentication_failed}</b>
				{/if}
			</label>
		</div>
	{/if}
	<!-- BEGIN LEFT COLUMN -->
	<div class="full_width">
		<h1 class="title">Sign In</h1>
		<p class="instructions">Required fields are marked with a red asterisk (<span class="required">*</span>).
		<div class="event_details">
            <form name="loginForm" action="{$BASE_URL}/Login" method="POST">
				<table class="event_details add_details" summary="Login information">
					<tbody>
					<tr>
						<th scope="row">
							<label for="loginEmail" title="required" class="required">
								{if $errors|@count > 0 && isset($errors.email_required) && $errors.email_required != ''}{$errors.email_required|wordwrap:25}{/if}
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
								{if $errors|@count > 0 && isset($errors.password_required) && $errors.password_required != ''}{$errors.password_required|wordwrap:25}{/if}
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
							<span style="vertical-align:middle;"><a href="{$BASE_URL}/ForgotPassword">Forgot Password ?</a></span>
							<br/><br/>
							<span style="vertical-align:middle;"><a href="{if isset($response->facebookLoginUrl)}{$response->facebookLoginUrl}{/if}"><img src="{$BASE_IMAGE_URL}/login_with_facebook.png" alt="Login With Facebook"/></a></span>
							&nbsp;
							<span style="vertical-align:middle;"><a href="{if isset($response->twitterLoginUrl)}{$response->twitterLoginUrl}{/if}"><img src="{$BASE_IMAGE_URL}/login_with_twitter.png" alt="Login With Twitter" /></a></span>
							<br/><br/>
							<span style="vertical-align:middle;">New User? Sign Up <a href="{$BASE_URL}/AddUser">Here</a></span>
						</td>
					</tr>
					</tbody>
				</table>
            </form>
        </div>
    </div>
</div>