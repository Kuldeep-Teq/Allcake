<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UserProfileFixture
 */
class UserProfileFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'user_profile';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'contact' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'profile_image' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2023-01-31 05:30:20',
                'modified_date' => '2023-01-31 05:30:20',
            ],
        ];
        parent::init();
    }
}
