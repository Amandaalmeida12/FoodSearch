<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Profile Entity
 *
 * @property int $id
 * @property string $title
 * @property string $address
 * @property string $operation
 * @property string $contact
 * @property string $description
 * @property string $photo
 * @property string $photo_dir
 * @property int $user_id
 * @property float $lat
 * @property float $lng
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Image[] $images
 * @property \App\Model\Entity\ProfileMenu[] $profile_menus
 */
class Profile extends Entity
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
        'title' => true,
        'address' => true,
        'operation' => true,
        'contact' => true,
        'description' => true,
        'photo' => true,
        'photo_dir' => true,
        'user_id' => true,
        'lat' => true,
        'lng' => true,
        'user' => true,
        'images' => true,
        'profile_menus' => true
    ];
}
