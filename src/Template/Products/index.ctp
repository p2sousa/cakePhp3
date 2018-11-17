<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="album py-5 bg-light">
        <div class="container">
            
            <div class="row">
                <?php foreach ($products as $product): ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="img/cake-logo.png" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text"><?= h($product->title) ?></p>
                            <p class="card-text">Stock: <?= $this->Number->format($product->stock) ?></p>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <?= $this->Html->link(__('View'), 
                                        ['action' => 'view', $product->id],
                                        ['class' => 'btn btn-sm btn-outline-secondary']
                                    ) ?>
                                    
                                    <?= $this->Html->link(__('Edit'), 
                                        ['action' => 'edit', $product->id],
                                        ['class' => 'btn btn-sm btn-outline-secondary']
                                    ) ?>
                                    <?= $this->Form->postLink(__('Delete'), 
                                        ['action' => 'delete', $product->id], 
                                        [
                                            'confirm' => __('Are you sure you want to delete # {0}?', 
                                            $product->id),
                                            'class' => 'btn btn-sm btn-outline-danger'
                                        ]
                                    ) ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
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
    </div>
</main>
