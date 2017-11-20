<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Menu Entity
 *
 * @property int $id
 * @property string $title
 * @property float $price
 * @property string $category
 * @property string $description
 * @property string $photo
 * @property string $photo_dir
 *
 * @property \App\Model\Entity\ProfileMenu[] $profile_menus
 */
class Menu extends Entity
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
        'price' => true,
        'category' => true,
        'description' => true,
        'photo' => true,
        'photo_dir' => true,
        'profile_menus' => true
    ];
}
