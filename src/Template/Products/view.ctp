<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php if($user_type) echo __('Actions'); ?></li>
        <li><?= $this->Html->link(__('Dashboard'), ['controller'=>'Logins','action' => 'dashboard']) ?></li>
        <li><?php $this->Html->link(__('All Products'), ['action' => 'index']); ?> </li>
        <li><?php 
        if($user_type == 'admin' || $user_type == 'seller')  {
        echo $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->pid]); ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->pid], ['confirm' => __('Are you sure you want to delete # {0}?', $product->pid)]) ?> </li>
        <li><?php echo $this->Html->link(__('Add a New Product'), ['action' => 'add']);
        }?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->pname) ?></h3>
    <table class="vertical-table">

        <tr>
            <td><?php if($product->image)
                    echo $this->Html->image('uploads/products/'.$product['image'],['height'=>'450px','width'=>'350px','alt'=>'Image of '.$product->pname]);
             ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Name') ?></th>
            <td><?= h($product->pname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seller') ?></th>
            <td><?= h($product->seller) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product ID') ?></th>
            <td><?= $this->Number->format($product->pid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($product->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Available') ?></th>
            <td><?= h($product->first_available) ?></td>
        </tr>
    </table>
    
</div>
