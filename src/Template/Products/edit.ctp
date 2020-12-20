<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $product->pid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->pid)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Dashboard'), ['controller'=>'Logins','action' => 'dashboard']) ?></li>
        <li><?= $this->Html->link(__('All Products'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product, ['enctype'=>'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Edit Product') ?></legend>
        <?php
            if($product->image)
                    echo $this->Html->image('uploads\\products\\'.$product['image'],['height'=>'450px','width'=>'350px','alt'=>'Image of '.$product->pname]);
            echo $this->Form->control('pname',['label'=>'Product Name']);
            // echo $this->Form->control('seller');
            echo $this->Form->control('price');
            echo $this->Form->control('image',['label'=>'Product Photo','type'=>'file']);
            // echo $this->Form->control('first_available');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
