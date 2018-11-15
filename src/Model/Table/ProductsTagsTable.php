<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductsTags Model
 *
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\TagsTable|\Cake\ORM\Association\BelongsTo $Tags
 *
 * @method \App\Model\Entity\ProductsTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductsTag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductsTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductsTag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductsTag|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductsTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsTag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsTag findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTagsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('products_tags');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['tag_id'], 'Tags'));

        return $rules;
    }
}
