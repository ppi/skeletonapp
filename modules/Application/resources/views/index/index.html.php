<?php $view->extend('::base.html.php'); ?>
<div id="landing-index">

    <div>
        <img src="<?=$view['assets']->getUrl('modules/framework/images/ppi-logo-white.png'); ?>" style="width: 10.5em;" />
    </div>

    <h2>Welcome!</h2>
    <p>Congratulations! You have successfully installed a new PPI application.</p>

    <div class="clearfix list-container">
        <div class="landing-list">
            <p class="list-title">Documentation</p>
            <ul>
                <li><a href="http://ppi.readthedocs.org/en/2.1/book/getting_started.html">Getting started</a></li>
                <li><a href="http://ppi.readthedocs.org/en/2.1/book/application.html">Skeleton Application</a></li>
                <li><a href="http://ppi.readthedocs.org/en/2.1/book/modules.html">Modules</a></li>
                <li><a href="http://ppi.readthedocs.org/en/2.1/book/routing.html">Routing</a></li>
                <li><a href="http://ppi.readthedocs.org/en/2.1/book/controllers.html">Controllers</a></li>
                <li><a href="http://ppi.readthedocs.org/en/2.1/book/templating.html">Templating</a></li>
                <li><a href="http://ppi.readthedocs.org/en/2.1/book/services.html">Services</a></li>
            </ul>
        </div>

        <div class="landing-list">
            <p class="list-title">Configuration</p>
            <ul>
                <li><a href="/check.php">Check your environment</a></li>
                <li><a href="">Modules</a></li>
                <li><a href="">Routing</a></li>
                <li><a href="">Controllers</a></li>
                <li><a href="">Templating</a></li>
                <li><a href="">Services</a></li>
            </ul>
        </div>

        <div class="landing-list">
            <p class="list-title">Documentation</p>
            <ul>
                <li><a href="">Getting started</a></li>
                <li><a href="">Modules</a></li>
                <li><a href="">Routing</a></li>
                <li><a href="">Controllers</a></li>
                <li><a href="">Templating</a></li>
                <li><a href="">Services</a></li>
            </ul>
        </div>
    </div>

</div>