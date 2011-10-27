<div id="icon-users" class="icon32"><br /></div>

<div class="content-box">
	<div class="content-box-header"><h3><?php echo isset($bEdit) && $bEdit ? 'Edit Page' : 'Add New Page'; ?></h3></div>
	<div class="content-box-content">
		<?php include_once($viewDir . 'formrenderer.php'); ?>	
	</div>
</div>



<style type="text/css">
#form_page_permalink {
	float: left;
}
#permalink_edited {
	float: left;
	display: none;
	margin-left: 5px;
	padding-top: 5px;
}
</style>

<script type="text/javascript" src="<?php echo $baseUrl; ?>scripts/tinymce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
    theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull|,bullist,numlist,outdent,indent,undo,redo,link,unlink,anchor,hr,removeformat,code",	
    mode: "textareas",
    theme: "advanced",
    width: "520px",
    theme_advanced_buttons2: "",
    theme_advanced_buttons3: "",
    theme_advanced_resizing : true,
    theme_advanced_resizing_use_cookie : true,
    theme_advanced_resize_vertical : true,    
    theme_advanced_resize_horizontal : false,    
    theme_advanced_path : false,
    theme_advanced_toolbar_location : "top",
    theme_advanced_statusbar_location : "bottom"
});

jQuery(document).ready(function($) {
	
	$('#main-nav-pages').addClass('current').trigger('click');	
	$('<div id="permalink_edited"><img src="' + baseUrl + 'images/permalink_edited.png" alt="Permalink has been edited." /></div><div class="clear"></div>').insertAfter('#form_page_permalink');
	var permalinkEdited = false;
	$('#form_page_title').keyup(function() {
		if(permalinkEdited === false) {
			$('#form_page_permalink').val($(this).val().replace(/\s/g, '-').toLowerCase());
		}
	});
	
	$('#form_page_permalink').keyup(function() {
		permalinkEdited = $(this).val() != '' ? true : false;
		if(permalinkEdited) {
			$('#permalink_edited').show();
		} else {
			$('#permalink_edited').hide();
		}
	});
	
	$('#form_page_submit').click(function() {
		tinyMCE.triggerSave();
	});	
	
});
</script>