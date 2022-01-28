<?php

namespace App\DataFixtures;

use App\Entity\Control;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class ControlFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        // "bl" | "elite" | "max" | "auxiliaire";
        $controls = [
            'bas level',
            'élite',
            'max',
            'auxiliaire'
        ];

        foreach ($controls as $name) {
            $control = new Control();
            $control->setName($name);
            $manager->persist($control);
        }

        $manager->flush();
    }
    
    public static function getGroups(): array
    {
        return ['admin', 'dev'];
    }
}
