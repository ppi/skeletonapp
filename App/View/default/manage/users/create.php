<div class="well editaccount" style="margin-bottom: 0; padding-bottom: 0;">
		
	<form class="form-horizontal" style="margin-bottom: 0;" action="" method="post" id="manage-form">
		<fieldset>
			<legend>Create User Account</legend>
			<div class="control-group">
				<label class="control-label" for="firstName">First Name</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required]" id="firstName" name="firstName" value="">
					<span rel="firstName" class="help-inline"></span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="lastName">Last Name</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required]" id="lastName" name="lastName" value="">
					<span rel="lastName" class="help-inline"></span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="userName">Username</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required]" id="userName" name="userName" value="">
					<span rel="userName" class="help-inline"></span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="emailAddress">Email Address</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required, custom[email]]" id="emailAddress" name="email" value="">
					<span rel="emailAddress" class="help-inline"></span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="password">Password</label>
				<div class="controls">
					<input type="password" class="input-xlarge validate[required]" id="password" name="email" value="">
					<span rel="password" class="help-inline"></span>
				</div>
			</div>
			
			<hr>
			
			<div class="control-group">
				<label class="control-label" for="jobTitle">Job Title</label>
				<div class="controls">
					<input type="text" class="input-xlarge]" id="jobTitle" name="jobTitle" value="">
					<span rel="jobTitle" class="help-inline"></span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="companyName">Company Name</label>
				<div class="controls">
					<input type="text" class="input-xlarge]" id="companyName" name="companyName" value="">
					<span rel="companyName" class="help-inline"></span>
				</div>
			</div>
			
			
			<div class="control-group">
				<label class="control-label" for="website">Website</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="website" name="website" value="">
					<span rel="website" class="help-inline"></span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="twitterHandle">Twitter Handle</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="twitterHandle" name="twitterHandle" value="">
					<span rel="twitterHandle" class="help-inline"></span>
				</div>
			</div>
			
			<hr>
	
			<div class="control-group biography">
				<label class="control-label" for="textarea" for="biography">Biography</label>
				<div class="controls">
					<textarea class="input-xlarge" id="textarea" rows="3" id="biography" name="bio"></textarea>
					<span rel="biography" class="help-inline"></span>
				</div>
			</div>
			
			<div class="form-actions" style="margin: 0;">
				<button type="submit" class="btn btn-primary" id="confirm">Save changes</button>
				<button type="reset" class="btn">Cancel</button>
			</div>
		</fieldset>
	  </form>
		
</div>