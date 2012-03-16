jQuery(document).ready(function($) {
	$('#user-form').validationEngine({
		scroll: false
	});

	$("#user-form").bind("jqv.field.result", function(event, field, errorFound, promptText) {
		if(errorFound){
			field.parent().parent().removeClass('success').addClass('error');
			$('span[rel="' + field.attr('id') + '"]').html(promptText);
		} else {
			field.parent().parent().removeClass('error').addClass('success');
			$('span[rel="' + field.attr('id') + '"]').html('');
		}
	});
});

function validateConfirmation() {
	jQuery('#user-form').validationEngine('validateField', '#confirm');
}