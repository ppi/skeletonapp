<?php
$emailFieldValue = 'value="' . $helper->escape($emailValue) . '"'; 
?>

<div class="well editaccount" style="margin-bottom: 0; padding-bottom: 0;" id="user-signup-page">
		
	<form class="form-horizontal" style="margin-bottom: 0;" action="" method="post" id="user-form">
		<fieldset>
			<legend>Sign Into Your Account</legend>

			<?php if(!empty($errors)): ?>
			<div class="alert alert-error">
				<?= implode('<br>', $errors); ?>
			</div>
			<?php endif; ?>
			
			<div class="control-group">
				<label class="control-label" for="userEmail">Email</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required]" id="userEmail" name="email" <?=$emailFieldValue; ?>>
					<span rel="userEmail" class="help-inline"></span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="userPassword">Password</label>
				<div class="controls">
					<input type="password" class="input-xlarge validate[required]" id="userPassword" name="password">
					<span rel="userPassword" class="help-inline"></span>
				</div>
			</div>
	
			<div class="form-actions" style="margin: 0;">
				<button type="submit" class="btn btn-primary" id="confirm">Log In</button>
				<button type="reset" class="btn">Cancel</button>
			</div>
	</form>

</div>