jQuery(document).ready(function($) {
	
	var $manage = $('#user-manage');
	
	// When you try to delete a package
	$manage.find('.deleteUser').on('click', function(e) {
		
		e.preventDefault();
		var elem = $(this);
		
		$.get(ppi.baseUrl + 'users/manage/delete/' + $(this).data('userid'), {}, function(response) {
			
			if(response === 'OK') {
				
				elem.parents('tr').fadeOut('normal', function() {
					elem.remove();
				});
				
			}
		});
		
	});
	
	
});