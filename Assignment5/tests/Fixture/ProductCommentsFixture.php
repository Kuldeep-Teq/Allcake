<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductCommentsFixture
 */
class ProductCommentsFixture extends TestFixture
{
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
                'product_id' => 1,
                'user_id' => 1,
                'comment' => 'Lorem ipsum dolor sit amet',
                'created_date' => '2023-01-31 05:31:21',
                'modified_date' => '2023-01-31 05:31:21',
            ],
        ];
        parent::init();
    }
}
