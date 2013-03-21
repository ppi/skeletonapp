<?php $view->extend('::base.html.php'); ?>

<form id="user-forgot-password" style="display: none;" action="<?=$view['router']->generate('User_Forgot_Password_Send');?>" method="post">
    
	<div>
		<h4>Forgot your password?</h4>
		
		<p>
			Fill in your e-mail address and we'll send you a new one.
		</p>
		<p>&nbsp;</p>
		<div class="field">
			<label>E-mail address</label>
			<div><input class="validate[required,custom[email]]" name="email"></div>
		</div>
		
		<div class="buttons clearfix">
			<button class="button green" type="submit">Request password</button>
		</div>
	</div>
	<div class="success">
		<h4>Forgot your password?</h4>
		
		<p>
			Your request has been received. You will receive an e-mail with instructions to change your password in the a few minutes.
		</p>
	</div>
</form>