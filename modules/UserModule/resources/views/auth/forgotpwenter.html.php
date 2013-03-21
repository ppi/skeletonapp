<?php $view->extend('::base.html.php'); ?>


<?php $view['slots']->start('include_css') ?>
<link rel="stylesheet" href="<?php echo $view['assets']->getUrl('assets/css/user.css') ?>" />
<link rel="stylesheet" href="<?php echo $view['assets']->getUrl('assets/vendor/validationengine/css/validationEngine.jquery.css') ?>" />
<?php $view['slots']->stop() ?>

<section id="content" class="content user-login clearfix">

    <h3>Forgot Password</h3>
    
    <form id="user-pass" action="<?=$view['router']->generate('User_Forgot_Password_Save');?>" method="post">
        
        <input type="hidden" name="csrf" value="<?php echo $csrf ?>">
        <h4>Change Password</h4>
    
        <div class="field">
            <label>Password <em>*</em></label>
            <div><input class="validate[required]" id="password" type="password" name="password"></div>
        </div>
    
        <div class="field">
            <label>Confirm password <em>*</em></label>
            <div><input class="validate[required,equals[password]]" type="password" name="confirm_password"></div>
        </div>
    
      
        <div class="buttons clearfix">
            <button class="button green" type="submit">Save Password</button>
        </div>
    
        <div class="success">
            <h4>Password Changed</h4>
            
            <p>
                Your password has successfully been changed. Please use the form on your right to log in.
            </p>
        </div>
                                    
    </form>
							
							
    
    <form id="user-forgot-password" style="display: none;" action="<?=$view['router']->generate('User_Forgot_Password_Send');?>" method="post">
        
        <div>
            <h4>Forgot your password?</h4>
            
            <p>
                Fill in your e-mail address and we'll send you a new one.
            </p>
            <p>&nbsp;</p>
            <div class="field">
                <label>E-mail address</label>
                <div><input class="validate[required,custom[email]]" name="email"></div>
            </div>
            
            <div class="buttons clearfix">
                <button class="button green" type="submit">Request password</button>
            </div>
        </div>
        <div class="success">
            <h4>Forgot your password?</h4>
            
            <p>
                Your request has been received. You will receive an e-mail with instructions to change your password in the a few minutes.
            </p>
        </div>
    </form>
    
</section>