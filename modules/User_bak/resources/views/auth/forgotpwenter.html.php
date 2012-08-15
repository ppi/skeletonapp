<?php $view->extend('::base.html.php'); ?>


<?php $view['slots']->start('include_css') ?>
<link rel="stylesheet" href="<?php echo $view['assets']->getUrl('assets/css/user.css') ?>" />
<link rel="stylesheet" href="<?php echo $view['assets']->getUrl('assets/vendor/validationengine/css/validationEngine.jquery.css') ?>" />
<?php $view['slots']->stop() ?>

					<section id="content" class="content user-login clearfix">
						<div class="left">
							<h3>Forgot Password</h3>
							
								<form id="user-pass" action="<?=$view['router']->generate('User_Forgot_Password_Save');?>" method="post">
									<input type="hidden" name="csrf" value="<?php echo $csrf ?>">
									<h4>Change Password</h4>
								
									<div class="field">
										<label>Password <em>*</em></label>
										<div><input class="validate[required]" id="password" type="password" name="password"></div>
									</div>
								
									<div class="field">
										<label>Confirm password <em>*</em></label>
										<div><input class="validate[required,equals[password]]" type="password" name="confirm_password"></div>
									</div>
								
								  
									<div class="buttons clearfix">
										<button class="button green" type="submit">Save Password</button>
									</div>
								
									<div class="success">
										<h4>Password Changed</h4>
										
										<p>
											Your password has successfully been changed. Please use the form on your right to log in.
										</p>
									</div>
																
								</form>
							
							
							
						</div>
						<div class="right" style="margin-top: 44px;">
<form id="user-login" action="<?=$view['router']->generate('User_Login_Check');?>" method="post">
	
	<h4>Account login</h4>
	<div class="field">
		<label>E-mail address</label>
		<div><input class="validate[required,custom[email]]" name="email"></div>
	</div>
    
	<div class="field">
		<label>Password</label>
		<div><input class="validate[required]" type="password" name="password"></div>
	</div>
    
    <div class="buttons clearfix">
		<button class="button orange" type="submit">Login</button>
    	<p>
			<a href="#" id="user-forgot-password-trigger">Forgot Password?</a>
		</p>
	</div>
    
</form>


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
						</div>
					</section>


<?php $view['slots']->start('include_js') ?>
<script src="<?php echo $view['assets']->getUrl('assets/vendor/validationengine/js/languages/jquery.validationEngine-en.js') ?>"></script>
<script src="<?php echo $view['assets']->getUrl('assets/vendor/validationengine/js/jquery.validationEngine.js') ?>"></script>


<script>
var $pass	= $('#user-pass'),
	$login	= $('#user-login'),
	$forgot	= $('#user-forgot-password'),
	$forgotTrigger	= $('#user-forgot-password-trigger');


$forgotTrigger.on ('click', function (e) {
	e.preventDefault ();
	
	$login.fadeOut (600, function () {
		$forgot.fadeIn (600);
	});
});

$pass.validationEngine({
	onValidationComplete: function (form, status) {
		if (status === 'false' || status === false) {
			return;
		}
		
		var $form	= $(form),
			data	= $form.serialize (),
			url		= $form.attr ('action');
		
		$.post (url, data, function (data) {
			try {
				data	= $.parseJSON (data);
				if (data.status) {
					if (data.status === 'success') {
						$pass.children ().hide ();
						$pass.find ('.success').show ();
					} else if (data.status === 'E_MISSING_RECORD' || data.status === 'E_UNKNOWN') {
						alert ('Something went wrong while processing your request. Please refresh the page and try again.');
					} else if (data.status === 'E_MISSING_FIELD') {
						alert ('All fields marked with an asterix (*) are mandatory.');
					} else if (data.status === 'E_PASSWORDS_MISMATCH') {
						alert ('The two passwords fields do not match.');
					} else if (data.status === 'E_MISSING_TOKEN' || data.status === 'E_INVALID_CSRF') {
						alert ('The link you used has been invalidated. Please request a new password using the form on your right.');
					} else {
						alert ('Something went wrong while processing your request. Please refresh the page and try again.');
					}
				} else {
					/* An error occured */
					alert ('Something went wrong while processing your request. Please refresh the page and try again.');
				}
			} catch (e) {
				alert ('Something went wrong while processing your request. Please refresh the page and try again.');
			}
		});
	}
}).on ('click', function (e) {
	$login.validationEngine('hideAll');
	$forgot.validationEngine('hideAll');
});

$login.validationEngine({
	onValidationComplete: function (form, status) {
		if (status === 'false' || status === false) {
			return;
		}
		
		var $form	= $(form),
			data	= $form.serialize (),
			url		= $form.attr ('action');
		
		var $invalid	= $form.find (':input.required').filter (function () {
			return this.value == '' || this.value == '0';
		});
		
		if ($invalid.length) {
			//alert ('Please select a size and a valid quantity.');
		} else {
			console && console.log (url, data);
			$.post (url, data, function (data) {
				try {
					data	= $.parseJSON (data);
					
					if (data.status) {
						if (data.status === 'success') {
							window.location	= '<?php echo $view['router']->generate('Homepage'); ?>';
						} else if (data.status === 'E_LOGIN_INVALID' || data.status === 'E_UNKNOWN') {
							alert ('Your e-mail address and passwords do not match.');
						} else if (data.status === 'E_NOT_ACTIVATED') {
							alert ('Your account has not been validated yet. Please validate your account before you login.');
						} else if (data.status === 'E_MISSING_FIELD') {
							alert ('Please provide a valid e-mail address and password.');
						}
					} else {
						/* An error occured */
						alert ('Something went wrong while processing your request. Please refresh the page and try again.');
					}
				} catch (e) {
					alert ('Something went wrong while processing your request. Please refresh the page and try again.');
				}
			});
		}
	}
}).on ('click', function (e) {
	$pass.validationEngine('hideAll');
	$forgot.validationEngine('hideAll');
});

$forgot.validationEngine ({
	onValidationComplete: function (form, status) {
		if (status === 'false' || status === false) {
			return;
		}
		
		var $form	= $(form),
			data	= $form.serialize (),
			url		= $form.attr ('action');
		
		var $invalid	= $form.find (':input.required').filter (function () {
			return this.value == '' || this.value == '0';
		});
		
		if ($invalid.length) {
			//alert ('Please select a size and a valid quantity.');
		} else {
			console && console.log (url, data);
			$.post (url, data, function (data) {
				try {
					data	= $.parseJSON (data);
					
					if (data.status) {
						if (data.status === 'success') {
							$forgot.children ().hide ();
							$forgot.find ('.success').show ();
						} else if (data.status === 'E_MISSING_RECORD' || data.status === 'E_UNKNOWN') {
							alert ('We do not have a record in our database for this e-mail address.');
						} else if (data.status === 'E_MISSING_FIELD') {
							alert ('Please provide a valid e-mail address.');
						} else {
							alert ('Something went wrong while processing your request. Please refresh the page and try again.');
						}
					} else {
						alert ('Something went wrong while processing your request. Please refresh the page and try again.');
					}
				} catch (e) {
					alert ('Something went wrong while processing your request. Please refresh the page and try again.');
				}
			});
		}
	}
}).on ('click', function (e) {
	$pass.validationEngine('hideAll');
	$login.validationEngine('hideAll');
});
</script>
<?php $view['slots']->stop() ?>

					
					
					