<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="PPI Skeleton Project">
    <meta name="viewport" content="width=device-width">
    
    <title><?php $view['slots']->output('title', 'PPI Skeleton Project') ?></title>
    
    <!-- CSS Stuff -->
    <link href="<?=$view['assets']->getUrl('css/twitter-bootstrap-2.0.4.css');?>" rel="stylesheet">
    <link href="<?=$view['assets']->getUrl('css/main.css');?>" rel="stylesheet">
    <?php $view['slots']->output('include_css'); ?>
    <!-- /CSS Stuff -->
    
    <!-- JS Head Stuff -->
    <script src="<?=$view['assets']->getUrl('js/libs/modernizr-2.5.3.min.js');?>"></script>
    <?php $view['slots']->output('include_js_head'); ?>
    <!-- /JS Head Stuff -->
    
</head>

<body>

    <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6. -->
    <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
      
    <header>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="#">PPI Skeleton Project</a>
                    <ul class="nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    
                    <form class="navbar-search pull-left">
                      <input type="text" class="search-query" placeholder="Search">
                    </form>
                    
                    <ul class="nav pull-right">
                        <li class="dropdown" id="menu1">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">My Account <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">My Articles</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Edit Profile</a></li>
                                <li><a href="#">Edit Account</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </header>

    

    <div class="container well" id="action-content">
        
        <!-- Begin dynamic page output -->
        
        <?php $view['slots']->output('_content'); ?>
        
        <!-- End dynamic page output -->
        
    </div>

    
    
    <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?=$view['assets']->getUrl('js/libs/jquery-1.7.1.min.js');?>"><\/script>')</script>
    
    <!-- JS Body Stuff -->
    <script src="<?=$view['assets']->getUrl('js/libs/bootstrap-dropdown.js');?>"></script>
    <?php $view['slots']->output('include_js_body'); ?>
    <!-- /JS Body Stuff -->

</body>

</html>
