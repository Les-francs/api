<?php

namespace App\DataFixtures;

use App\Entity\TypeUnit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeUnitFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $typeUnits = [
            'fantassins',
            'tireurs',
            'cavaliers'
        ];

        foreach ($typeUnits as $name) {
            $typeUnit = new TypeUnit();
            $typeUnit->setName($name);
            $manager->persist($typeUnit);
        }

        $manager->flush();
    }
}
