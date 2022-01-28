<?php

namespace App\DataFixtures;

use App\Entity\House;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class HouseFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $francs = new House();
        $francs->setName('Les Francs');

        $manager->persist($francs);
        $manager->flush();
    }
    
    public static function getGroups(): array
    {
        return ['admin', 'dev'];
    }
}
