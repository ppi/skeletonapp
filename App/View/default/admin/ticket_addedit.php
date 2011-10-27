<?php include($viewDir . 'formrenderer.php'); ?>
<script type="text/javascript" src="<?php echo $baseUrl; ?>scripts/tinymce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
    tinyMCE.init({
        mode: "textareas",
        theme: "advanced",
        theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull|,bullist,numlist,outdent,indent,undo,redo,link,unlink,anchor,hr,removeformat,code",
        theme_advanced_buttons2: "",
        theme_advanced_buttons3: "",
        theme_advanced_resizing : true,
        theme_advanced_toolbar_location : "top"
    });
    jQuery(document).ready(function() {
    	$('.formField_submit').click(function() {
    		tinyMCE.triggerSave();
    	});
    });
</script>