<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductsTag Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int $tag_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Tag $tag
 */
class ProductsTag extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'product_id' => true,
        'tag_id' => true,
        'created' => true,
        'modified' => true,
        'product' => true,
        'tag' => true
    ];
}
