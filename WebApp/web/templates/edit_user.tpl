<link rel="stylesheet" media="screen" type="text/css" href="{$BASE_CSS_URL}/jquery-ui-custom.css" />
<script type="text/javascript" src="{$BASE_JS_URL}/edit_user.js"></script>
<!--<script type="text/javascript" src="{$BASE_JS_URL}/jquery-ui-custom.min.js"></script>-->
<div id="app_content">

	{if sizeof($messages) > 0}
		<div class="status" align="center">
			<label for="status" generated="true" class="success_msg">
				{if isset($messages.update_success)}
					<b>{$messages.update_success}</b>
				{/if}
				{if isset($messages.update_failure)}
					<b>{$messages.update_failure}</b>
				{/if}
				{if isset($messages.facebook_auth_success)}
					<b>{$messages.facebook_auth_success}</b>
				{/if}
				{if isset($messages.twitter_auth_success)}
					<b>{$messages.twitter_auth_success}</b>
				{/if}
				{if isset($messages.facebook_handle_removed)}
					<b>{$messages.facebook_handle_removed}</b>
				{/if}
				{if isset($messages.twitter_handle_removed)}
					<b>{$messages.twitter_handle_removed}</b>
				{/if}
				{if isset($messages.social_auth_failure)}
					<b>{$messages.social_auth_failure}</b>
				{/if}
			</label>
		</div>
	{/if}

	<!-- BEGIN LEFT COLUMN -->
	<div class="full_width">
		<h1 class="title">Edit Your Details</h1>
		<p class="instructions">Required fields are marked with a red asterisk (<span class="required">*</span>).
		<div class="event_details">
            <form name="editUserForm" action="{$BASE_URL}/EditUser" method="POST">
				<input type="hidden" name="accountType" id="accountType" value="{if isset($response->userSVC)}{$response->userSVC->accountType}{/if}" />
				<table class="event_details add_details" summary="Add event information">
					<tbody>
					<tr>
						<th scope="row">
							{if isset($response->userSVC) && $response->userSVC->accountType==1}
								<label for="email" title="required" class="required">
									{if $errors|@count > 0 && isset($errors.email_required) && $errors.email_required != ''}
										{$errors.email_required|wordwrap:25}
									{elseif $errors|@count > 0 && isset($errors.email_duplicate) && $errors.email_duplicate != ''}
										{$errors.email_duplicate|wordwrap:25}
									{else}
										<span>Email<span>*</span></span>
									{/if}
								</label>
							{else}
								<label for="email" title="" class="">
									<span>Email</span>
								</label>
							{/if}
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
					{if isset($response->facebookLoginUrl) && $response->facebookLoginUrl!=""}
						<tr>
							<th scope="row"></th>
							<td>
								<a href="{if isset($response->facebookLoginUrl)}{$response->facebookLoginUrl}{/if}">Authenticate Your Facebook Account</a>
							</td>
						</tr>
					{elseif isset($response->userSVC) && $response->userSVC->accountType==1 && count($response->userSVC->facebookDetails)>0 && isset($smarty.session.session_user_current_org_id) && $smarty.session.session_user_current_org_id=="mFirstWeb"}
						<tr>
							<th scope="row"></th>
							<td>
								<a href="{$BASE_URL}/EditUser?removeFacebookHandle=1">Remove Your Facebook Account</a>
							</td>
						</tr>
					{/if}
					{if isset($response->twitterLoginUrl) && $response->twitterLoginUrl!=""}
						<tr>
							<th scope="row"></th>
							<td>
								<a href="{if isset($response->twitterLoginUrl)}{$response->twitterLoginUrl}{/if}">Authenticate Your Twitter Account</a>
							</td>
						</tr>
					{elseif isset($response->userSVC) && $response->userSVC->accountType==1 && count($response->userSVC->twitterDetails)>0 && isset($smarty.session.session_user_current_org_id) && $smarty.session.session_user_current_org_id=="mFirstWeb"}
						<tr>
							<th scope="row"></th>
							<td>
								<a href="{$BASE_URL}/EditUser?removeTwitterHandle=1">Remove Your Twitter Account</a>
							</td>
						</tr>
					{/if}
					
					<!-- Password required only for mFirst accounts-->
					{if isset($response->userSVC) && $response->userSVC->accountType==1}
						<tr>
							<th scope="row">
								<label for="password" title="" class="">
									{if $errors|@count > 0 && isset($errors.old_password_required) && $errors.old_password_required != ''}
										{$errors.old_password_required|wordwrap:25}
									{/if}
									{if $errors|@count > 0 && isset($errors.password_incorrect) && $errors.password_incorrect != ''}
										{$errors.password_incorrect|wordwrap:25}
									{/if}
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
									{if $errors|@count > 0 && isset($errors.new_password_required) && $errors.new_password_required != ''}{$errors.new_password_required|wordwrap:25}{/if}
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
									{if $errors|@count > 0 && isset($errors.password_mismatch) && $errors.password_mismatch != ''}{$errors.password_mismatch|wordwrap:25}{/if}
									{if $errors|@count > 0 && isset($errors.confirm_password_required) && $errors.confirm_password_required != ''}{$errors.confirm_password_required|wordwrap:25}{/if}
									<span>Confirm Password</span>
								</label>
							</th>
							<td>
								<input class="textbox" type="password" id="confirmPassword" name="confirmPassword" maxlength="50" value=""/>
							</td>
						</tr>
					{/if}
					<tr>
						<th scope="row">
							<label for="firstname" title="" class="">
								{if $errors|@count > 0 && isset($errors.firstname_required) && $errors.firstname_required != ''}{$errors.firstname_required|wordwrap:25}{/if}
								<span>Firstname</span>
							</label>
						</th>
						<td>
							<input class="textbox" type="text" id="firstname" name="firstname" maxlength="50" value="{if isset($response->userSVC)}{$response->userSVC->firstname}{/if}"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="lastname" title="" class="">
								<span>Lastname</span>
							</label>
						</th>
						<td>
							<input class="textbox" type="text" id="lastname" name="lastname" maxlength="50" value="{if isset($response->userSVC)}{$response->userSVC->lastname}{/if}"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="gender" title="" class="">
								{if $errors|@count > 0 && isset($errors.gender_required) && $errors.gender_required != ''}{$errors.gender_required|wordwrap:25}{/if}
								<span>Gender</span>
							</label>
						</th>
						<td>
							<select name="gender" id="gender">
								<option value=""></option>
								<option value="m" {if isset($response->userSVC) && $response->userSVC->gender=="m"}SELECTED{/if}>Male</option>
								<option value="f" {if isset($response->userSVC) && $response->userSVC->gender=="f"}SELECTED{/if}>Female</option>
							</select>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="yearOfBirth" title="" class="">
								{if $errors|@count > 0 && isset($errors.dateOfBirth_required) && $errors.dateOfBirth_required != ''}{$errors.dateOfBirth_required|wordwrap:25}{/if}
								<span>Year Of Birth</span>
							</label>
						</th>
						<td>
							{assign var=thisyear value=$smarty.now|date_format:"%Y"}
							{assign var=endYear value=80}
							<select id="yearOfBirth" name="yearOfBirth">
								<option value=""></option>
								{section name=yearValue loop=$thisyear max=$endYear step=-1}
									<option value="{$smarty.section.yearValue.index}" {if isset($response->userSVC) && $response->userSVC->yearOfBirth!="" && $response->userSVC->yearOfBirth==$smarty.section.yearValue.index}SELECTED{/if}>
										{$smarty.section.yearValue.index}
									</option>
								{/section}
							</select>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="addressLine1" title="" class="">
								{if $errors|@count > 0 && isset($errors.addressLine1_required) && $errors.addressLine1_required != ''}{$errors.addressLine1_required|wordwrap:25}{/if}
								<span>Street address</span>
							</label>
						</th>
						<td>
							<input class="textbox" type="text" id="addressLine1" name="addressLine1" maxlength="50" value="{if isset($response->userSVC)}{$response->userSVC->addressLine1}{/if}"/>
							<br />
							<input class="textbox" type="text" id="addressLine2" name="addressLine2" maxlength="50" value="{if isset($response->userSVC)}{$response->userSVC->addressLine2}{/if}"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="addressCity" title="" class="">
								{if $errors|@count > 0 && isset($errors.addressCity_required) && $errors.addressCity_required != ''}{$errors.addressCity_required|wordwrap:25}{/if}
								<span>City</span>
							</label>
						</th>
						<td>
							<input type="text" maxlength="50" name="addressCity" id="addressCity" class="textbox" value="{if isset($response->userSVC)}{$response->userSVC->addressCity}{/if}"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="addressState" title="" class="">
								{if $errors|@count > 0 && isset($errors.addressState_required) && $errors.addressState_required != ''}{$errors.addressState_required|wordwrap:25}{/if}
								<span>State</span>
							</label>
						</th>
						<td>
							<input type="text" maxlength="50" name="addressState" id="addressState" class="textbox" value="{if isset($response->userSVC)}{$response->userSVC->addressState}{/if}"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="addressZipCode">
								<span>Zipcode</span>
							</label>
						</th>
						<td>
							<input type="text" maxlength="50" name="addressZipCode" id="addressZipCode" class="textbox" value="{if isset($response->userSVC)}{$response->userSVC->addressZipCode}{/if}"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="addressCountry"  title="" class="">
								{if $errors|@count > 0 && isset($errors.addressCountry_required) && $errors.addressCountry_required != ''}{$errors.addressCountry_required|wordwrap:25}{/if}
								<span>Country</span>
							</label>
						</th>
						<td>
							<input type="text" maxlength="50" name="addressCountry" id="addressCountry" class="textbox" value="{if isset($response->userSVC)}{$response->userSVC->addressCountry}{/if}"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="phoneNo">
								{if $errors|@count > 0 && isset($errors.phoneNo_required) && $errors.phoneNo_required != ''}{$errors.phoneNo_required|wordwrap:25}{/if}
								<span>Phone No</span>
							</label>
						</th>
						<td>
							<input type="text" maxlength="50" name="phoneNo" id="phoneNo" class="textbox" value="{if isset($response->userSVC)}{$response->userSVC->phone}{/if}"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="mobile">
								{if $errors|@count > 0 && isset($errors.mobile_required) && $errors.mobile_required != ''}{$errors.mobile_required|wordwrap:25}{/if}
								<span>Mobile</span>
							</label>
						</th>
						<td>
							<input type="text" maxlength="50" name="mobile" id="mobile" class="textbox" value="{if isset($response->userSVC)}{$response->userSVC->mobile}{/if}"/>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="mobile">
								{if $errors|@count > 0 && isset($errors.interests_required) && $errors.interests_required != ''}{$errors.interests_required|wordwrap:25}{/if}
								<span>Interests</span>
							</label>
						</th>
						<td>
							<textarea class="textarea" maxlength="500" name="interests" id="interests">{if isset($response->userSVC)}{$response->userSVC->interests}{/if}</textarea>
						</td>
					</tr>
					<tr>
						<th scope="row"></th>
						<td>
							<input class="" type="checkbox" id="newsletters" name="newsletters" value="1" {if isset($response->userSVC) && $response->userSVC->newsletters==1}CHECKED{/if}/>&nbsp;Sign-up for newsletters
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