<script type="text/javascript" src="<?= $baseUrl; ?>scripts/bootstrap/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="<?= $baseUrl; ?>scripts/generic.js"></script>
<?php if (!empty($core['files']['js'])): ?>
<script type="text/javascript" src="<?php echo $baseUrl; ?>scripts/js.php?mod=<?php echo implode(',', $core['files']['js']); ?>"></script>
<?php endif; ?>