<?php /* Smarty version Smarty-3.1-DEV, created on 2012-07-15 16:01:57
         compiled from "/opt/local/apache2/htdocs/www/ppi-v2/skeleton/modules/Framework/resources/views/error/404.html.php" */ ?>
<?php /*%%SmartyHeaderCode:11732297195002db653ba628-59367341%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9923b17534f06d1cbb2e13879d2cf401f554b802' => 
    array (
      0 => '/opt/local/apache2/htdocs/www/ppi-v2/skeleton/modules/Framework/resources/views/error/404.html.php',
      1 => 1342364460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11732297195002db653ba628-59367341',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5002db65416601_99118791',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5002db65416601_99118791')) {function content_5002db65416601_99118791($_smarty_tpl) {?><<?php ?>?php $view->extend('::errorbase.html.php'); ?<?php ?>>


<div id="error-page">
    <div class="error-container error-404">
        <div class="desc">
            <p>It's looking like you may have taken a wrong turn.</p> 
            <p>Don't worry... it happens to the best of us.</p>
        </div>
        <img class="oops" src="<<?php ?>?=$view['assets']->getUrl('images/framework/oops.gif');?<?php ?>>">
        <img class="image-404" src="<<?php ?>?=$view['assets']->getUrl('images/framework/error404.gif');?<?php ?>>">
    </div>
    <p><img src="data:image/gif;base64,R0lGODlhRgAyAIAAAP///////yH+EUNyZWF0ZWQgd2l0aCBHSU1QACH5BAEKAAEALAAAAABGADIAAALZjI+py+0Jopyv2uumBrj7ulHfSBqhVKbeGamuxXLvzMT0DbH4Htj87VvEho1hUCFDGnXC5amWRDiZuemmGTVZQ8qtppv1cqXiLxl1KF/TapHW3Tb34ui5mS7Co596VL/1FyjYUiSWEXjoldi3aNWI9+gUGTdpVKl2eQSml0mFxVioGAoKJVpK+uk4OsjaaojomgcaS2hHx+Z6RonLWtXmK7hpCPyXaqpbbKwqDHm6tTpFovniufK0cy09hr1Wss3t5i3HMy5e9xOekk5e63L+MweUBT+vUv9TAAA7" alt="PPI Logo"></p>
</div>

<<?php ?>?php $view['slots']->start('include_css') ?<?php ?>>
<link rel="stylesheet" href="<<?php ?>?=$view['assets']->getUrl('css/framework.css');?<?php ?>>">
<<?php ?>?php $view['slots']->stop() ?<?php ?>>
<?php }} ?>