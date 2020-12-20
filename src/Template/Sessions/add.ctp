<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Session $session
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('My Sessions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sessions form large-9 medium-8 columns content">
    <?= $this->Form->create($session) ?>
    <fieldset>
        <legend><?= __('Add Session') ?></legend>
        <?php
            echo $this->Form->control('session_datetime');
            echo $this->Form->control('user_id', ['value' => $user_id, 'type' => 'hidden']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Book')) ?>
    <?= $this->Form->end() ?>
</div>
