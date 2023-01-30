<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{

    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->hasMany('Posts');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('image')
            ->requirePresence('image', 'create')
            ->notEmptyString('image', 'Please select your image')
            ->add('image', [
                'validExtension' => [
                    'rule' => ['extension', ['gif', 'jpeg', 'png', 'jpg']], // default  ['gif', 'jpeg', 'png', 'jpg']
                    'message' => 'These images extension are allowed: png ,jpeg, png, jpg'
                ],
            ]);

        $validator
            ->scalar('full_name')
            ->requirePresence('full_name', 'create')
            ->notEmptyString('full_name', 'Please Enter Your Full Name');

        // $validator
        //     ->scalar('gender')
        //     ->requirePresence('gender', 'create')
        //     ->notEmptyString('gender', 'Please Select Your Gender');

        $validator
            ->scalar('company')
            ->requirePresence('company', 'create')
            ->notEmptyString('company', 'Please Enter Your Company');

        $validator
            ->scalar('job')
            ->requirePresence('job', 'create')
            ->notEmptyString('job', 'Please Enter Your Job');

        $validator
            ->scalar('country')
            ->requirePresence('country', 'create')
            ->notEmptyString('country', 'Please Enter Your Country');

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->notEmptyString('address', 'Please Enter Your Address');

        $validator
            ->scalar('phone')
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone', 'Please Enter Your Phone Number')
            ->add('phone', [
                'length' => [
                    'rule' => ['minLength', 10],
                    'message' => 'Number Must be 10 characters in length',
                ]
            ]);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email', 'Please Enter Your Email')
            ->add('email', 'unique', [
                'rule' => 'ValidateUnique', 'provider' => 'table',
                'message' => 'Email Already Exist',
            ]);

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            // ->notEmptyString('password', 'Please Enter Your Password')
            ->add('password', [
                'notBlank' => [
                    'rule'    => ['notBlank'],
                    'message' => 'Please Enter Your Password',
                ],
                'upperCase' => [
                    'rule' => function ($value) {
                        $count = mb_strlen(preg_replace('![^A-Z]+!', '', $value));
                        if ($count > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'message' => 'Please enter at least one uppercase',
                ],
                'lowerCase' => [
                    'rule' => function ($value) {
                        $count = mb_strlen(preg_replace('![^a-z]+!', '', $value));
                        if ($count > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'message' => 'Please enter at least one lowercase',
                ],
                'numeric' => [
                    'rule' => function ($value) {
                        $count = mb_strlen(preg_replace('![^0-9]+!', '', $value));
                        if ($count > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'message' => 'Please enter at least one numeric',
                ],
                'special' => [
                    'rule' => function ($value) {
                        $count = mb_strlen(preg_replace('![^@#*]+!', '', $value));
                        if ($count > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'message' => 'Please enter at least one special character',
                ],
                'minLength' => [
                    'rule' => ['minLength', 8],
                    'message' => 'Password need to be 8 characters long',
                ],
            ]);

        $validator
            ->scalar('cnfirm_pswrd')
            ->requirePresence('cnfirm_pswrd', 'create')
            ->notEmptyString('cnfirm_pswrd', 'Please Confirm Your Password')
            ->add('cnfirm_pswrd', 'no-misspelling', [
                'rule' => ['compareWith', 'password'],
                'message' => 'Password doesn\'t match '
            ]);



        return $validator;
    }
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
}
