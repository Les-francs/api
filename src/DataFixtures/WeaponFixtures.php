<?php

namespace App\DataFixtures;

use App\Entity\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class WeaponFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $weapons = [
            'broadswordshield',
            'crescentblade',
            'dualblade',
            'longbow',
            'maul',
            'musket',
            'nodachi',
            'pike',
            'poleaxe',
            'shortbow',
            'spear',
            'swordshield'
        ];

        foreach ($weapons as $name) {
            $weapon = new Weapon();
            $weapon->setName($name);
            $manager->persist($weapon);
        }

        $manager->flush();
    }
    
    public static function getGroups(): array
    {
        return ['admin', 'dev'];
    }
}
