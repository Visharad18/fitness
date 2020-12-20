<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Session Entity
 *
 * @property int $session_id
 * @property \Cake\I18n\FrozenTime $session_datetime
 * @property int|null $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Session extends Entity
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
        'session_datetime' => true,
        'user_id' => true,
        'user' => true,
    ];
}
