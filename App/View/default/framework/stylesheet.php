<link type="text/css" href="<?= $baseUrl; ?>css/h5bp/base.css" rel='stylesheet' />
<link type="text/css" href="<?= $baseUrl; ?>css/bootstrap/bootstrap.css" rel='stylesheet' />
<link type="text/css" href="<?= $baseUrl; ?>css/generic.css" rel='stylesheet' />
	
<?php if(!empty($core['files']['css'])): ?>
<link type="text/css" href="<?php echo $baseUrl; ?>css/css.php?mod=<?php echo implode(',', $core['files']['css']); ?>" rel='stylesheet' />
<?php endif; ?>