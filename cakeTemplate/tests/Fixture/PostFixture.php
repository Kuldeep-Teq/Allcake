<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PostFixture
 */
class PostFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'post';
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
                'name' => 'Lorem ipsum dolor sit amet',
                'image' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-01-20 06:23:44',
            ],
        ];
        parent::init();
    }
}
