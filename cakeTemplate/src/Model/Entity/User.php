<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{
    protected $_accessible = [
        'image' => true,
        'full_name' => true,
        'gender' => true,
        'company' => true,
        'job' => true,
        'country' => true,
        'address' => true,
        'phone' => true,
        'email' => true,
        'password' => true,
        'cnfirm_pswrd' => true,
    ];

    protected $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password): ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
