<?php

namespace App\DataFixtures;

use App\Entity\Era;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class EraFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $eras = [
            'sombre',
            'féodale',
            'chevalerie',
            'argos',
            'héroïque',
            'aurum'
        ];

        foreach ($eras as $name) {
            $era = new Era();
            $era->setName($name);
            $manager->persist($era);
        }

        $manager->flush();
    }
    
    public static function getGroups(): array
    {
        return ['admin', 'dev'];
    }
}
