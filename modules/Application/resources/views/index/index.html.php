<?php $view->extend('::base.html.php'); ?>

<?php $view['slots']->start('include_js_body'); ?>
    <script src="<?=$view['assets']->getUrl('js/home.js');?>"></script>
<?php $view['slots']->stop(); ?>

<div id="landing">
    <div class="landing-wrapper">
        <img src="<?=$view['assets']->getUrl('modules/framework/images/ppi-logo-white.png'); ?>" />
        <p class="congrats">Congratulations! You have successfully installed a new PPI application.</p>
        <div class="buttons">
            <a href="http://docs.ppi.io/latest/" target="_blank">Read The Docs</a>
            <a href="https://github.com/ppi/skeletonapp" target="_blank">Discover on GitHub</a>
            <a href="<?=$view['assets']->getUrl('check.php');?>">Check your environment</a>
            <a class="find-out-more" href="https://gitter.im/ppi/framework" target="_blank">Contact us</a>
        </div>
    </div>
</div>

