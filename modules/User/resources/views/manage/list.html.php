<?php if(!empty($users)): ?>
    <ul>
    <?php foreach($users as $user): ?>
        <li>User: <?=$user->getFirstName(); ?></li>
    <?php endforeach; ?>
    </ul>
<?php endif;
