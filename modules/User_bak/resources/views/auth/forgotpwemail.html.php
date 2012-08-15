

<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center"><img width="445" height="191" src="http://tomorrowland.working-on.it<?php echo $view['assets']->getUrl('assets/img/logo-tomorrowland.png') ?>"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Hi <?=$toUser->getFullName();?>,</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>
			To change your password, please click:<br>
			<?=$forgotLink;?>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>
			Kind Regards,<br>
			Tomorrowland Store
		</td>
	</tr>
</table>
