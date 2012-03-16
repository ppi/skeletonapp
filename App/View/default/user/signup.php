<div class="well editaccount" style="margin-bottom: 0; padding-bottom: 0;" id="user-signup-page">
		
	<form class="form-horizontal" style="margin-bottom: 0;" action="" method="post" id="user-form">
		<fieldset>
			<legend>Create an Account</legend>

			<div class="alert alert-info">Please complete the form below to create your account</div>
	
			<div class="control-group">
				<label class="control-label" for="firstName">First Name</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required]" id="firstName" name="firstName">
					<span rel="firstName" class="help-inline"></span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="lastName">Last Name</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required]" id="lastName" name="lastName">
					<span rel="lastName" class="help-inline"></span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="userEmail">Email</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required]" id="userEmail" name="email">
					<span rel="userEmail" class="help-inline"></span>
				</div>
			</div>
			
			<hr>
			
			<div class="control-group">
				<label class="control-label" for="userEmail">Password</label>
				<div class="controls">
					<input type="password" class="input-xlarge validate[required,minSize[5]]" id="password" name="password">
					<span rel="password" class="help-inline"></span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="userPassword">Confirm Password</label>
				<div class="controls">
					<input type="password" class="input-xlarge validate[required,equals[password]]" id="userPassword" name="confirm">
					<span rel="userPassword" class="help-inline"></span>
				</div>
			</div>
			

			<div class="form-actions" style="margin: 0;">
				<button type="submit" class="btn btn-primary" id="confirm">Sign up</button>
				<button type="reset" class="btn">Cancel</button>
			</div>
	
	</form>
		
</div>