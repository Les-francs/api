<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AdminFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $weapon = $manager->getRepository(Weapon::class)->findOneBy([
            'name' => "broadswordshield"
        ]);
        
        $admin = new User();
        $admin->setUsername('admin')
              ->setRoles(['ROLE_ADMIN'])
              ->setInfluence(0)
              ->setPassword('$2y$13$2nSvul3tyhhRxSaH8/ozJuUIdepIlT/S/QOb9kRu7KprlJconwM..')
              ->setWeapon($weapon)
              ->setEmail("admin@admin.com")
              ->setDiscord("00000000000000")
        ;

        $manager->persist($admin);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            WeaponFixtures::class,
        ];
    }
    
    public static function getGroups(): array
    {
        return ['admin', 'dev'];
    }
}
