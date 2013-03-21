<?php $view->extend('::base.html.php'); ?>

<?php $view['slots']->start('include_css') ?>
<link rel="stylesheet" href="<?php echo $view['assets']->getUrl('user/css/manage.css') ?>" />
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('include_js_body') ?>
<script src="<?php echo $view['assets']->getUrl('user/js/manage.js') ?>"></script>
<?php $view['slots']->stop(); ?>

<section id="user-manage">

    <div class="box">
        
        <div class="box-header well">
            <h2>Manage Users</h2>
            <a class="btn add-user" href="<?=$view['router']->generate('User_Manage_Create');?>" title="Add User"><i class="icon-user"></i> Add User</a>
        </div>
        
        <div class="box-content">
            
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php if(empty($users)): ?>
                    <tr><td colspan="5"><p>No users found</p></td></tr>
                <?php else: ?>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td><?=$user->getID();?></td>
                        <td><?=$view->escape($user->getTitle() . ' ' . $user->getFullName());?></td>
                        <td><?=$view->escape($user->getEmail());?></td>
                        <td><?=$view->escape($user->getLevelTitle());?></td>
                        <td>
                            <a href="<?=$view['router']->generate('User_Manage_Edit', array('id' => $user->getID()));?>" title="" class="btn"><i class="icon-edit"></i></a>
                            <a href="#" title="Delete" class="btn deleteUser" data-userid="<?=$user->getID();?>"><i class="icon-remove"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                
                </tbody>
            
            </table>
            
            
        </div>
        
    </div>
    
</section>

