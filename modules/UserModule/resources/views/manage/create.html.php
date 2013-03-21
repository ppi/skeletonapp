<?php $view->extend('::base.html.php'); ?>

<?php $view['slots']->start('include_css') ?>
<link rel="stylesheet" href="<?php echo $view['assets']->getUrl('user/css/manage-create.css') ?>" />
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('include_js_body') ?>
<script src="<?php echo $view['assets']->getUrl('js/libs/jquery.validationEngine-en.js') ?>"></script>
<script src="<?php echo $view['assets']->getUrl('js/libs/jquery.validationEngine.js') ?>"></script>
<script src="<?php echo $view['assets']->getUrl('user/js/manage-create.js') ?>"></script>
<?php $view['slots']->stop(); ?>

<section id="user-manage-create" class="clearfix well">

    <?php if(isset($errors) && !empty($errors)): ?>
    <div class="alert alert-error">
        <?php foreach($errors as $error): ?>
        <p><?=$view->escape($error);?></p>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    
    <form action="<?=$view['router']->generate('User_Manage_Create_Save');?>" method="post" class="form-horizontal">
        
        <legend>Create New Account</legend>
        
        <div class="control-group">
            <label class="control-label" for="formTitle">Title <em>*</em></label>
            <div class="controls">
                <input type="text" class="input-xlarge validate[required]" id="formTitle" name="userTitle">
                <span rel="formTitle" class="help-inline"></span>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="formFirstName">First Name <em>*</em></label>
            <div class="controls">
                <input type="text" class="input-xlarge validate[required]" id="formFirstName" name="userFirstName">
                <span rel="formFirstName" class="help-inline"></span>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="formLastName">Last Name <em>*</em></label>
            <div class="controls">
                <input type="text" class="input-xlarge validate[required]" id="formLastName" name="userLastName">
                <span rel="formLastName" class="help-inline"></span>
            </div>
        </div>
        
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
        
        <div class="control-group">
            <label class="control-label" for="formConfirmPassword">Confirm Password <em>*</em></label>
            <div class="controls">
                <input type="password" class="input-xlarge validate[required,equals[formPassword]]" id="formConfirmPassword" name="userConfirmPassword">
                <span rel="formPatientName" class="help-inline"></span>
            </div>
        </div>
        
        <div class="form-actions buttons-area">
            <input type="submit" class="step1 btn btn-large" value="Create Account">
        </div>
        
    </form>
    
</section>