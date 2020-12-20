<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Session[]|\Cake\Collection\CollectionInterface $sessions
 */

    // echo $this->element('navbar');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dashboard'), ['controller'=>'Logins','action' => 'dashboard']) ?></li>
        <li><?= $this->Html->link(__('Book a Session'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sessions index large-9 medium-8 columns content">
    <h3><?= __('Sessions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('session_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('session_datetime') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sessions as $session): ?>
            <tr>
                <td><?= $this->Number->format($session->session_id) ?></td>
                <td><?= h($session->session_datetime) ?></td>
               <!--  <td><?= $session->has('user') ? $this->Html->link($session->user->user_id, ['controller' => 'Users', 'action' => 'view', $session->user->user_id]) : '' ?></td> -->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $session->session_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $session->session_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $session->session_id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->session_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
