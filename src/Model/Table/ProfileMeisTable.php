<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProfileMeis Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\MenusTable|\Cake\ORM\Association\BelongsTo $Menus
 *
 * @method \App\Model\Entity\ProfileMei get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProfileMei newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProfileMei[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProfileMei|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProfileMei patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProfileMei[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProfileMei findOrCreate($search, callable $callback = null, $options = [])
 */
class ProfileMeisTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('profile_meis');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Menus', [
            'foreignKey' => 'menu_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('image')
            ->requirePresence('image', 'create')
            ->notEmpty('image');

        $validator
            ->scalar('path')
            ->requirePresence('path', 'create')
            ->notEmpty('path');

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->scalar('operation')
            ->requirePresence('operation', 'create')
            ->notEmpty('operation');

        $validator
            ->scalar('space')
            ->requirePresence('space', 'create')
            ->notEmpty('space');

        $validator
            ->scalar('contact')
            ->requirePresence('contact', 'create')
            ->notEmpty('contact');

        $validator
            ->numeric('lat')
            ->requirePresence('lat', 'create')
            ->notEmpty('lat');

        $validator
            ->numeric('lng')
            ->requirePresence('lng', 'create')
            ->notEmpty('lng');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['menu_id'], 'Menus'));

        return $rules;
    }
}
