<?php $view->extend('::errorbase.html.php'); ?>


<div id="error-page">
    <div class="error-container error-404">
        <div class="desc">
            <p>It's looking like you may have taken a wrong turn.</p> 
            <p>Don't worry... it happens to the best of us.</p>
        </div>
        <p class="oops">Oops!</p>
        <img class="image-404" src="<?=$view['assets']->getUrl('images/framework/error404.gif');?>">
    </div>
    <div class="ppi-line">
        <img src="data:image/png;base64,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" />&nbsp;
        <p><a href="http://www.ppi.io" title="The PPI Framework">Powered by PPI Framework</a></p>
    </div>
</div>

<?php $view['slots']->start('include_css') ?>
<link rel="stylesheet" href="<?=$view['assets']->getUrl('css/framework.css');?>">
<?php $view['slots']->stop() ?>
