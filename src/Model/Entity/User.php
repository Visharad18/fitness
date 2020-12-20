<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultpasswordHasher;


/**
 * User Entity
 *
 * @property int $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string|null $pass_word
 * @property int|null $phone
 * @property string|null $image
 * @property string|null $user_type
 * @property \Cake\I18n\FrozenTime $joined
 */
class User extends Entity
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
        'firstname' => true,
        'lastname' => true,
        'email' => true,
        'pass_word' => true,
        'phone' => true,
        'image' => true,
        'user_type' => true,
        'joined' => true,
    ];

    public function _setpass_word($value)
    {
        if(strlen($value)) {
            $hasher = new DefaultpasswordHasher();
            return $hasher->hash($value);
        }
    }
}
