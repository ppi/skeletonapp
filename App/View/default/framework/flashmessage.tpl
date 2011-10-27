{if isset($ppiFlashMessage)}

<div class="ppiMessages {if $ppiFlashMessage.mode == 'success'}ppiMessagesSuccess{else}ppiMessagesFailure{/if}">
    <span class="closeMessages"><a href="#">click to dismiss</a></span>
    <p class="{if $ppiFlashMessage.mode == 'success'}ppi-flash-success{else}ppi-flash-failure{/if}">{$ppiFlashMessage.message}</p>
</div>
    
{literal}
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
{/literal}    
    
{/if}
