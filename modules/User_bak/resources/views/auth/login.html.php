<?php $view->extend('::base.html.php'); ?>

<?php $view['slots']->start('include_css') ?>
<link rel="stylesheet" href="<?php echo $view['assets']->getUrl('css/login.css') ?>" />
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('include_js_body') ?>
<script src="<?php echo $view['assets']->getUrl('js/libs/jquery.validationEngine-en.js') ?>"></script>
<script src="<?php echo $view['assets']->getUrl('js/libs/jquery.validationEngine.js') ?>"></script>
<script src="<?php echo $view['assets']->getUrl('js/login.js') ?>"></script>
<?php $view['slots']->stop(); ?>

<section id="user-login" class="content user-login clearfix well">

    <?php if(isset($errors) && !empty($errors)): ?>
    <div class="alert alert-error">
        <?php foreach($errors as $error): ?>
        <p><?=$view->escape($error);?></p>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    
    <form action="<?=$view['router']->generate('User_Login_Check');?>" method="post" class="form-horizontal">
        
        <legend>Log Into Your Account</legend>
        
        <div class="control-group">
            <label class="control-label" for="formEmail">Email Address <em>*</em></label>
            <div class="controls">
                <input type="text" class="input-xlarge validate[required,custom[email]]" id="formEmail" name="userEmail">
                <span rel="formEmail" class="help-inline"></span>
            </div>
        </div>
                
        <div class="control-group">
            <label class="control-label" for="formPassword">Password <em>*</em></label>
            <div class="controls">
                <input type="password" class="input-xlarge validate[required]" id="formPassword" name="userPassword">
                <span rel="formPassword" class="help-inline"></span>
            </div>
        </div>
        
        <div class="form-actions buttons-area">
            <input type="submit" class="btn btn-large" value="Log In">
        </div>
        
    </form>
    
</section>