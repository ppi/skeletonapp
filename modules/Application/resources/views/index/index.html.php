<?php $view->extend('::base.html.php'); ?>


<div class="box" id="homepage">
    
    <div class="box-header well">
        <h2>Welcome to the PPI Skeleton Application</h2>
    </div>
    
    <div class="box-content">
        
        <div class="page-header">
            <h1>Bundled libraries <small>Hey PPI user! We have pre-integrated a bunch of frontend libraries for you</small></h1>
        </div>     
        <div class="row-fluid">            
            <div class="span4">
                <h3>HTML5 Boilerplate</h3>
                <p>This gives you a great base HTML skeleton template to work with. Fully backwards compatible but built to work with the latest html5 standards</p>
            </div>
            <div class="span4">
                <h3>Twitter Bootstrap</h3>
                <p>The best UI toolkit around. Excellent for making forms, menus, tables and much much more. This is the latest bootstrap v2.1. This page here is built using it :)</p>
            </div>
            <div class="span4">
                <h3>jQuery 1.8 (latest)</h3>
                <p>Every web project needs jQuery, we have bundled the latest jquery here for you.</p>
            </div>
        </div>
        <div class="row-fluid">            
            <div class="span4">
                <h3>Modernizr</h3>
                <p>Modernizr is an excellent feature detection library that uses jQuery to detect what level of capabilities your browser can achieve. This is ideal for building backwards-compatible applications, such as html5 video detection with a flash player fallback.</p>
            </div>
            <div class="span4">
                <h3>Mustache JS</h3>
                <p>This excellent library isn't included in the page by default, but it's conveniently in the project for you to use on your ajax-driven apps. It takes html generation with json data to the next level!</p>
            </div>
            <div class="span4">
                <h3>jQuery Mobile</h3>
                <p>This bad boy is perfect for making mobile apps. It has great mobile-like abilities that are built to natively represent mobile UI's. This isn't enabled by default.</p>
            </div>
        </div>  
        <hr>
        
        
    </div>
    
</div>

    
    

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/home.js');?>"></script>
<?php $view['slots']->stop(); ?>
