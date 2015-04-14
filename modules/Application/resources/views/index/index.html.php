<?php $view->extend('::base.html.php'); ?>


    <div class="jumbotron">
        <div class="container">
            <h1>Welcome to the PPI Skeleton Application</h1>
            <p>PPI is the PHP Interoperability Framework. It provides an equal and open platform to empower PHP developers to pick the best tools from the best PHP frameworks.</p>
            <p><a role="button" href="#" class="btn btn-primary btn-lg pull-right">Learn more »</a></p>
        </div>
    </div>



        <h2>Bundled libraries <small>Hey PPI user! We have pre-integrated a bunch of frontend libraries for you</small></h2>
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h2>HTML5 Boilerplate</h2>
                <p>This gives you a great base HTML skeleton template to work with. Fully backwards compatible but built to work with the latest html5 standards</p>
                <p><a role="button" href="#" class="btn btn-default">View details »</a></p>
            </div>
            <div class="col-md-4">
                <h2>Twitter Bootstrap</h2>
                <p>The best UI toolkit around. Excellent for making forms, menus, tables and much much more. This is the latest bootstrap v3.3.4. This page here is built using it :)</p>
                <p><a role="button" href="#" class="btn btn-default">View details »</a></p>
            </div>
            <div class="col-md-4">
                <h2>jQuery 1.11.2</h2>
                <p>Every web project needs jQuery, we have bundled the latest jquery here for you.</p>
                <p><a role="button" href="#" class="btn btn-default">View details »</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h2>Modernizr</h2>
                <p>Modernizr is an excellent feature detection library that uses jQuery to detect what level of capabilities your browser can achieve. This is ideal for building backwards-compatible applications, such as html5 video detection with a flash player fallback.</p>
                <p><a role="button" href="#" class="btn btn-default">View details »</a></p>
            </div>
            <div class="col-md-4">
                <h2>Mustache JS</h2>
                <p>This excellent library isn't included in the page by default, but it's conveniently in the project for you to use on your ajax-driven apps. It takes html generation with json data to the next level!</p>
                <p><a role="button" href="#" class="btn btn-default">View details »</a></p>
            </div>
            <div class="col-md-4">
                <h2>jQuery Mobile</h2>
                <p>This bad boy is perfect for making mobile apps. It has great mobile-like abilities that are built to natively represent mobile UI's. This isn't enabled by default.</p>
                <p><a role="button" href="#" class="btn btn-default">View details »</a></p>
            </div>
        </div>

        <hr>



    
    

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/home.js');?>"></script>
<?php $view['slots']->stop(); ?>