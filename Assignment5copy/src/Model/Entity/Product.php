<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $product_title
 * @property string $product_description
 * @property string $product_image
 * @property string $product_tags
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created_date
 * @property \Cake\I18n\FrozenTime|null $modified_date
 *
 * @property \App\Model\Entity\ProductCategory $product_category
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ProductComment[] $product_comments
 */
class Product extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'user_id' => true,
        'product_title' => true,
        'product_description' => true,
        'product_category_id' => true,
        'product_image' => true,
        'product_tags' => true,
        'status' => true,
        'price' => true,
        'quantity' => true,
        'created_date' => true,
        'modified_date' => true,
        'user' => true,
        'product_comments' => true,
    ];
}
