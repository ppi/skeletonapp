<div class="well editaccount" style="margin-bottom: 0; padding-bottom: 0;">
		
	<form class="form-horizontal" style="margin-bottom: 0;" action="" method="post" id="user-form">
		<fieldset>
			<legend>Edit Your Password</legend>
			<div class="control-group">
				<label class="control-label" for="currentPassword">Current Password</label>
				<div class="controls">
					<input type="password" class="input-xlarge validate[required]" id="currentPassword" name="currentPassword">
					<span rel="currentPassword" class="help-inline"></span>
				</div>
			</div>
			
			<hr>
			
			<div class="control-group">
				<label class="control-label" for="password">New Password</label>
				<div class="controls">
					<input type="password" class="input-xlarge validate[required]" id="password" name="password">
					<span rel="password" class="help-inline"></span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="confirmPassword">Confirm New Password</label>
				<div class="controls">
					<input type="password" class="input-xlarge validate[required,equals[password]]" id="confirmPassword" name="confirmPassword">
					<span rel="confirmPassword" class="help-inline"></span>
				</div>
			</div>
			
			<div class="form-actions" style="margin: 0;">
				<button type="submit" class="btn btn-primary" id="confirm">Save changes</button>
				<button type="reset" class="btn">Cancel</button>
			</div>
		</fieldset>
	  </form>
		
</div>