<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= __('Product') ?> </h1>
    </div>
    
    <div class="album py-5 bg-light">
        <div class="container">
            <h3><?= h($product->title) ?></h3>
            <table class="table">
                <tr>
                    <th scope="row"><?= __('Image') ?></th>
                    <td> <img src="<?= h($product->image) ?>" alt="Product" class="img-fluid img-thumbnail" style="height: 200px"></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($product->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Title') ?></th>
                    <td><?= h($product->title) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Stock') ?></th>
                    <td><?= $this->Number->format($product->stock) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($product->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= h($product->modified) ?></td>
                </tr>
            </table>
            
            <div class="row">
                <div class="col-12">
                    <h4><?= __('Tags') ?></h4>
                    <?php foreach ($product->tags as $tags): ?>
                        <span class="badge badge-primary">
                            <?= $tags->name ?>
                        </span>
                        <?php endforeach; ?>
                </div>
            
                <div class="col-12">
                    <h4><?= __('Description') ?></h4>
                    <p class="text-left"> 
                        <?= h($product->description); ?> 
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
