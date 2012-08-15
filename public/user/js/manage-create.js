jQuery(document).ready(function($) {

	$('#user-manage-create').find('form').validationEngine({
		scroll: false
	});
	
	$('#user-manage-create').find('form').bind("jqv.field.result", function(event, field, errorFound, promptText) {
		if(errorFound){
			field.parent().parent().removeClass('success').addClass('error');
			$('span[rel="' + field.attr('id') + '"]').html(promptText);
		} else {
			field.parent().parent().removeClass('error').addClass('success');
			$('span[rel="' + field.attr('id') + '"]').html('');
		}
	});
	
});