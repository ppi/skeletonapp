<?php $view->extend('::errorbase.html.php'); ?>


<div id="error-page">
    <div class="error-container error-404">
        <div class="desc">
            <p>It's looking like you may have taken a wrong turn.</p> 
            <p>Don't worry... it happens to the best of us.</p>
        </div>
        <img class="oops" src="<?=$view['assets']->getUrl('images/framework/oops.gif');?>">
        <img class="image-404" src="<?=$view['assets']->getUrl('images/framework/error404.gif');?>">
    </div>
</div>

<?php $view['slots']->start('include_css') ?>
<link rel="stylesheet" href="<?=$view['assets']->getUrl('css/framework.css');?>">
<?php $view['slots']->stop() ?>
