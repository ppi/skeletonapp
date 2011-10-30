<h1>Welcome to the PPI Skeleton Appication</h1>
<p>You are here because this is the default <b>route</b> for the application</p>
<p>Your current configured baseUrl is: <?= $baseUrl; ?></p>
<br>
<p>You must remove your default route from your routes file which is here:<br>
<b><?= APPFOLDER . 'Config/routes.php'; ?></b>
</p>
<br>
<p>Your must update your baseUrl in your application's config file which is here:<br>
	<b><?= APPFOLDER . 'Config/general.ini'; ?></b>
</p>

<style type="text/css">
h1 {
    font-size: 14px;
    margin-bottom: 12px;
}
p {
    color: black;
}
</style>
