<?php

namespace App\DataFixtures;

use App\DataFixtures\EventFixtures as DataFixturesEventFixtures;
use App\Entity\Control;
use App\Entity\Event;
use App\Entity\EventUser;
use App\Entity\House;
use App\Entity\Unit;
use App\Entity\UnitUser;
use App\Entity\User;
use App\Entity\Weapon;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture implements DependentFixtureInterface, FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $users = [
            [
                'username' => 'Vilsafur',
                'email' => 'vilsafur@gmail.com',
                'discord' => '278525340048031744',
                'influence' => 700,
                'house' => 0,
                'weapon' => 0,
                'events' => [0, 2, 3],
                'units' => [0, 9, 34, 23]
            ]
        ];

        $houses = $manager->getRepository(House::class)->findAll();
        $weapons = $manager->getRepository(Weapon::class)->findAll();
        $events = $manager->getRepository(Event::class)->findAll();
        $units = $manager->getRepository(Unit::class)->findAll();
        $controls = $manager->getRepository(Control::class)->findAll();

        foreach ($users as $u) {
            $user = new User();
            
            $user->setUsername($u['username'])
                 ->setEmail($u['email'])
                 ->setDiscord($u['discord'])
                 ->setInfluence($u['influence'])
                 ->setHouse($houses[$u['house']])
                 ->setWeapon($weapons[$u['weapon']])
                 ->setRoles(['ROLE_USER'])
                 ->setPassword('$2y$13$2nSvul3tyhhRxSaH8/ozJuUIdepIlT/S/QOb9kRu7KprlJconwM..')
            ;

            foreach ($u['events'] as $event) {
                $eventUser = new EventUser();
                $eventUser->setEvent($events[$event]);

                $user->addEventUser($eventUser);
            }

            foreach ($u['units'] as $unit) {
                $unitUser = new UnitUser();
                $unitUser->setUnit($units[$unit])
                         ->setLevel(1)
                         ->setControl($controls[0])
                ;
            }
            $manager->persist($user);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            WeaponFixtures::class,
            UnitFixtures::class,
            DataFixturesEventFixtures::class
        ];
    }
    
    public static function getGroups(): array
    {
        return ['dev'];
    }
}
