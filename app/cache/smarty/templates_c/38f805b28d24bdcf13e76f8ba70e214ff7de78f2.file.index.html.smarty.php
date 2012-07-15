<?php /* Smarty version Smarty-3.1-DEV, created on 2012-07-14 16:26:52
         compiled from "/opt/local/apache2/htdocs/www/ppi-v2/skeleton/modules/Application/resources/views/index/index.html.smarty" */ ?>
<?php /*%%SmartyHeaderCode:1141834095500161761dd125-63758675%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38f805b28d24bdcf13e76f8ba70e214ff7de78f2' => 
    array (
      0 => '/opt/local/apache2/htdocs/www/ppi-v2/skeleton/modules/Application/resources/views/index/index.html.smarty',
      1 => 1342268287,
      2 => 'file',
    ),
    'ffd59d74fcbbcd1f8df6f9757596d6ca62bbf55f' => 
    array (
      0 => '/opt/local/apache2/htdocs/www/ppi-v2/skeleton/app/views/base.html.smarty',
      1 => 1342268287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1141834095500161761dd125-63758675',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_50016176204656_52644512',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50016176204656_52644512')) {function content_50016176204656_52644512($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Test Application</title>
    </head>
    <body>

        <h1>My Smarty Page</h1>

        <div id="content">
            

    <h4>Action smarty content: HELLO WORLD FROM SMARTY</h4>

    <p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['asset'][0][0]->getAssetUrl_modifier('css/general.css');?>
</p>

    <p><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['path'][0][0]->getPath_modifier('Homepage');?>
">Home</a></p>


        </div>
    </body>
</html><?php }} ?>