<?php $view->extend('::base.html.php'); ?>

<div id="landing">
    <div class="landing-wrapper">
        <img src="<?=$view['assets']->getUrl('modules/framework/images/ppi-logo-white.png'); ?>" />
        <div class="buttons">
            <a href="http://ppi.readthedocs.org/en/2.1/" target="_blank">Read the Docs</a><!--
            --><a href="https://github.com/ppi/framework" target="_blank">Discover on GitHub</a>
        </div>
    </div>
</div>

<div id="landing-two">
    <div class="landing-wrapper">
        <img src="<?=$view['assets']->getUrl('modules/framework/images/ppi-logo-white.png'); ?>" />
        <h2>Welcome!</h2>
        <p>Congratulations! You have successfully installed a new PPI application.</p>

        <div class="clearfix list-container">
            <div class="landing-list">
                <h3>Documentation</h3>
                <ul>
                    <li><a href="http://ppi.readthedocs.org/en/2.1/book/application.html">Skeleton Application</a></li>
                    <li><a href="http://ppi.readthedocs.org/en/2.1/book/modules.html">Modules</a></li>
                    <li><a href="http://ppi.readthedocs.org/en/2.1/book/routing.html">Routing</a></li>
                    <li><a href="http://ppi.readthedocs.org/en/2.1/book/controllers.html">Controllers</a></li>
                    <li><a href="http://ppi.readthedocs.org/en/2.1/book/templating.html">Templating</a></li>
                    <li><a href="http://ppi.readthedocs.org/en/2.1/book/services.html">Services</a></li>
                </ul>
            </div>

            <div class="landing-list">
                <h3>Configuration</h3>
                <ul>
                    <li><a href="/check.php">Checker</a></li>
                </ul>
            </div>

            <div class="landing-list">
                <h3>Community</h3>
                <ul>
                    <li><a href="https://gitter.im/ppi/framework">Team Chat</a></li>
                    <li><a href="http://www.github.com/ppi/skeletonapp">GitHub</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>