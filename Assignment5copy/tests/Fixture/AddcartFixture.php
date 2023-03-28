<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AddcartFixture
 */
class AddcartFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'addcart';
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
                'product_id' => 1,
                'quantity' => 1,
            ],
        ];
        parent::init();
    }
}
