<link href='<?php echo $baseUrl; ?>css/formbuilder.css' rel='stylesheet' type='text/css' />
<script type="text/javascript" src="<?php echo $baseUrl; ?>scripts/jquery-validate/jquery.validate.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	// validate signup form on keyup and submit
	$("#formbuilder_form").validate({

		invalidHandler: function(e, validator) {
//			alert(validator.numberOfInvalids() + ' errors have occured');
		},
		onkeyup: false,
		errorPlacement: function(error, element) {
			error.appendTo( element.parent().next("td") );
		},
		submitHandler: function(form) {
//			alert($.validator.numberOfInvalids() + " errors have occured");
			form.submit();
//			$(form).submit();	
		},
		// set this class to error-labels to indicate valid fields
		success: function(label) {
			// set &nbsp; as text for IE
			label.html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;").addClass('checked');
		},
		
		rules: {
			<?php
			foreach($formBuilder['formStructure']['rules'] as $ruleFieldName => $currRules) {
				if(isset($currRules['type'])) {
					echo $ruleFieldName . ': {';
					if($currRules['type'] == 'required') {
					?>
					required: true,
					<?php
					}
					if($currRules['type'] == 'email') {
					?>
					email: true,
					<?php }		
					if($currRules['type'] == 'minlength') {
					?>
					minlength: <?php echo $currRules['value']; ?>
					<?php }
					if($currRules['type'] == 'maxlength') {
					?>
					maxlength: <?php $currRules['value']; ?>,
					<?php } ?>								
				},
			<?php
				} else { 
					echo $ruleFieldName . ': {';
					foreach($currRules as $currRule) {
						if($currRule['type'] == 'email' || $currRule['type'] == 'required') {
							echo $currRule['type'] . ': true,';
						}
						if($currRule['type'] == 'minlength' || $currRule['type'] == 'minlength') {
							echo $currRule['type'] . ': ' . $currRule['value'] . ',';
						}
					}
					?>
				},									
			<?php }
			}
		?>
		},
		messages: {
		<?php
		foreach($formBuilder['formStructure']['rules'] as $ruleFieldName => $currRules) {
			if(isset($currRules['type'])) {		
				echo $ruleFieldName . ': {';
				if($currRules['type'] == 'compare') {
		?>
				equalTo: "<?php $currRules['message']; ?>",
				<?php } else {
				echo $currRules['type'] . ': "' . $currRules['message'] . '",';
				}
				?>		
			},
			<?php } else {
				echo $ruleFieldName . ': {';
				foreach($currRules as $currRule) {
					echo $currRule['type'] . ': "' . $currRule['message'] . '",';
				}
			?>
				},
			<?php } ?>			
		<?php } ?>
		}
	});
}); // End of $(document).ready()
</script>	