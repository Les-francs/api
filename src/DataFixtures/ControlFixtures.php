<?php

namespace App\DataFixtures;

use App\Entity\Control;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ControlFixtures extends Fixture
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
}
