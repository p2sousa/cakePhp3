<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= __('Edit Product: ' . $product->title) ?> </h1>
    </div>
    
    <div class="album py-5 bg-light">
        <div class="container">
            <?= $this->Form->create($product) ?>
                <div class="form-group">
                    <?= $this->Form->control('title', [
                        'class' => 'form-control',
                        'minlength' => '6'
                    ]); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('description', [
                        'class' => 'form-control',
                        'maxlength' => 40000
                    ]); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('image', [
                        'class' => 'form-control'
                    ]); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('stock', [
                        'class' => 'form-control'
                    ]); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('tags._ids', [
                        'options' => $tags,
                        'class'=>'form-control'
                    ]); ?>
                </div>
                <div class="form-group float-right">
                    
                    <?= $this->Html->link(
                        'Cancel',
                        ['action' => 'index'],
                        ['class' => 'btn btn-outline-secondary mb-2']
                    ); ?>
                    
                    <?= $this->Form->button(__('Submit'), [
                        'class' => 'btn btn-outline-primary mb-2'
                    ]); ?>
                </div> 
            <?= $this->Form->end() ?>
        </div>
    </div>
</main>