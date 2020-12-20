<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Session $session
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dashboard'), ['controller'=>'Logins','action' => 'dashboard']) ?></li>
        <li><?= $this->Html->link(__('Edit Session'), ['action' => 'edit', $session->session_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Session'), ['action' => 'delete', $session->session_id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->session_id)]) ?> </li>
        <li><?= $this->Html->link(__('My Sessions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Book a Session'), ['action' => 'add']) ?> </li>

    </ul>
</nav>
<div class="sessions view large-9 medium-8 columns content">
    <h3><?= h($session->session_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $session->has('user') ? $this->Html->link($session->user->user_id, ['controller' => 'Users', 'action' => 'view', $session->user->user_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Session Id') ?></th>
            <td><?= $this->Number->format($session->session_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Session Datetime') ?></th>
            <td><?= h($session->session_datetime) ?></td>
        </tr>
    </table>
</div>
