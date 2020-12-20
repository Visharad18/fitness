<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><a href="/dashboard">Dashboard</a></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['enctype'=>'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Edit Profile') ?></legend>
        <?php
            if($user['image'])
                echo $this->Html->image('uploads/users/'.$user['image'],['height'=>'450px','width'=>'350px','alt'=>'Profile Picture']);
            echo $this->Form->control('image',['label'=>'Profile Picture','type'=>'file','value'=>$user['image']]);
            echo $this->Form->control('firstname');
            echo $this->Form->control('lastname');
            echo $this->Form->control('email');
            echo $this->Form->control('phone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end(); ?>
</div>


<div class="users form large-9 medium-8 columns content">
    <?php if($user['user_type'] == 'customer') {
        echo $this->Form->create($user,['url'=>['Controller'=>'Logins','action'=>'seller']]);
     ?>
    <?= $this->Form->button(__('Register as Seller')) ?>
    <?php echo $this->Form->end(); } ?>
</div>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user,['url'=>['Controller'=>'Logins','action'=>'password']]) ?>
    <fieldset>
        <legend><?= __('Change Password') ?></legend>
        <?php
            echo $this->Form->control('old_password',['label' => 'Current Password','type' => 'password']);
            echo $this->Form->control('pass_word',['label' => 'New Password','type' => 'password', 'value'=>'']);
            echo $this->Form->control('confirm_password',['label' => 'Confirm New Password','type' => 'password']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Change Password')) ?>
    <?= $this->Form->end() ?>
</div>

