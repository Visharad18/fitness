<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $pid
 * @property string|null $pname
 * @property string|null $seller
 * @property float|null $price
 * @property string|null $image
 * @property \Cake\I18n\FrozenTime $first_available
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
     * @var array
     */
    protected $_accessible = [
        'pname' => true,
        'seller' => true,
        'price' => true,
        'image' => true,
        'first_available' => true,
    ];
}
