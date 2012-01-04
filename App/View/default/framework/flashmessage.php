<?php
if(isset($ppiFlashMessage)) {
?>

<div class="ppiMessages <?php echo $ppiFlashMessage['mode'] == 'success' ? 'ppiMessagesSuccess' : 'ppiMessagesFailure'; ?>">
    <span class="closeMessages"><a href="#">click to dismiss</a></span>
    <p class="<?php echo $ppiFlashMessage['mode'] == 'success' ? 'ppi-flash-success' : 'ppi-flash-failure'; ?>"><?php echo $ppiFlashMessage['message']; ?></p>
</div>

<script type="text/javascript">

// Initially load it, let it sit for 5 seconds then disappear
$('.ppiMessages').animate({opacity: 1.0}, 1000);
$('.ppiMessages').animate({opacity: 1.0}, 5000);
$('.ppiMessages').fadeOut();

// Manual click of the flash
$('div.ppiMessages, span.closeMessages a').click(function () {
	$(".ppiMessages").stop();
	$('.ppiMessages').fadeOut();
   return false;
});

</script>

<?php } ?>
