<?php $view->extend('::base.html.php'); ?>

<?php $view['slots']->start('include_css') ?>
<link rel="stylesheet" href="<?php echo $view['assets']->getUrl('user/css/login.css') ?>" />
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('include_js_body') ?>
<script src="<?php echo $view['assets']->getUrl('js/libs/jquery.validationEngine-en.js') ?>"></script>
<script src="<?php echo $view['assets']->getUrl('js/libs/jquery.validationEngine.js') ?>"></script>
<script src="<?php echo $view['assets']->getUrl('user/js/login.js') ?>"></script>
<?php $view['slots']->stop(); ?>

<section id="user-login" class="content user-login clearfix well">

    <h3><?=$view->escape($user->getFullName());?></h3>
    
    <dl class="dl-horizontal">
        <dt>Email Address</dt>
        <dd><?=$view->escape($user->getEmail());?></dd>
    </dl>

        <div class="buttons">
            <a class="btn btn-large" href="<?=$view['router']->generate('User_Edit_Account');?>">Edit Account</a>
            <a class="btn btn-large" href="<?=$view['router']->generate('User_Edit_Password');?>">Edit Password</a>
        </div>
        
    </div>
</section>

