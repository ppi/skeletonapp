jQuery(document).ready(function($) {

	$('#fragment-3-right input[type=text]').attr('disabled', true);

	var $tabs = $('#tabs').tabs();
	var $panel_tabs = $('.ui-tabs-panel');
	$panel_tabs.each(function(i) {
		var totalSize = $panel_tabs.size() - 1;
		if (i != totalSize) {
		    next = i + 2;
	   	    $(this).append("<a href='#' class='next-tab mover' rel='" + next + "'>Next Page &#187;</a>");
		}
		if (i != 0) {
		    prev = i;
	   	    $(this).append("<a href='#' class='prev-tab mover' rel='" + prev + "'>&#171; Prev Page</a>");
		}
	});	
        $('.next-tab, .prev-tab').click(function() {
           $tabs.tabs('select', $(this).attr("rel"));
           return false;
        });
//        $('input').checkBox({ addLabel: true });


	function make_field_red(elem) {
		elem.toggleClass('errored');
	}
	
	function do_configuration() {

	}
	
	function do_requirements() {
	}

	function do_install() {
	}

	$('#requirements_check').bind('click keypress', function() {
		do_requirements();
	});

	$('#do_install').bind('click keypress', function() {
		do_install();
	});
	
	
$('#run_req_check').click(function() {
	// Clean-up so we can re-run checks without refreshing our page.
	$('#req_check_list li').find('.message').remove();
	$('#req_check_list li').find('.title').removeClass('failed');
	$('#req_check_list li').find('.title').removeClass('passed');
	
	// Go over the LI's and start doing the checks.
    $('#req_check_list li').each(function() {
        var currCheckTitle = $(this).attr('id').replace('req_', '');
        var currTitle = $(this).find('.title');
        var currItem = $(this);
        $.getJSON('check.php?action=' + currCheckTitle, function(data) {
            if(data.code != "E_OK") {
            	currTitle.addClass('failed');
            } else  {
            	currTitle.addClass('passed');
            }
            
            if(jQuery.trim(data.message)!="") {
            		$('<div class="message">' + data.message + '</div>').insertBefore(currItem.find('.clear'));
            }
        });
    });
});

$('#test_db_connection').bind('click keypress', function() {
	$('#test_db_connect_container .message').remove();
	var dbInfo = {};
	dbInfo.hostname = $('#db_hostname').val();
	dbInfo.username = $('#db_username').val();
	dbInfo.password = $('#db_password').val();
	dbInfo.database = $('#db_database').val();
	$.post('check.php?action=check_dbconnect', dbInfo, function(data) {
		$('<div class="message ' + (data.code != "E_OK" ? 'failed' : 'passed') + '">' + data.message + '</div>').appendTo('#test_db_connect_container');
		if(data.code == "E_OK") {
		        $('#fragment-3-right input[type=text]').removeAttr('disabled');
		} else {
			$('#fragment-3-right input[type=text]').attr('disabled', true);
		}
	}, "json");
});


$('#user_register_button').bind('click keypress', function() {
	var userInfo = {}, errors = "";
	userInfo.firstname = $('#user_firstname').val();
	userInfo.lastname = $('#user_lastname').val();
	userInfo.username - $('#username').val();
	userInfo.email = $('#user_email').val();
	userInfo.password = $('#user_password').val();
	if(userInfo.firstname == "") {
		errors += "Firstname is required\n";
	}
	if(userInfo.lastname == "") {
		errors += "Lastname is required\n";
	}
	if(userInfo.username == "") {
		errors += "Username is required\n";
	}
	if(userInfo.email == "") {
		errors += "Email is required\n";
	}
	if(userInfo.password == "") {
		errors += "Password is required\n";
	}
	var confirmPass = $('#user_pass_again').val();
	if(confirmPass == "") {
		errors += "Password must be confirmed\n";
	}
	if(confirmPass != userInfo.password) {
		errors += "Passwords must match\n";
	}
	if(errors.length > 0) {
		alert(errors);
		$('#fragment-3-right input[type=text]').addClass('errored');
		return false;
	}
	$('#fragment-3-right input[type=text]').removeClass('errored');
	// Do the ajax
	$.post('check.php?action=user_create', userInfo, function(data) {
		alert('user_create response: ' + data.code);
	}, 'json');
});


});
