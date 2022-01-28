<?php

namespace App\DataFixtures;

use App\Entity\Event;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class EventFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $events = [
            [
                'name' => 'GVG',
                'description' => 'Guerre de territoire',
                'startAt' => new DateTime('2022-01-27 20:00:00'),
                'endAt' => new DateTime('2022-01-27 21:00:00'),
            ],
            [
                'name' => 'GVG',
                'description' => 'Guerre de territoire',
                'startAt' => new DateTime('2022-01-28 20:00:00'),
                'endAt' => new DateTime('2022-01-28 21:00:00'),
            ],
            [
                'name' => 'GVG',
                'description' => 'Guerre de territoire',
                'startAt' => new DateTime('2022-01-30 20:00:00'),
                'endAt' => new DateTime('2022-01-30 21:00:00'),
            ],
            [
                'name' => 'Entrainement',
                'description' => 'Entrainement de formation',
                'startAt' => new DateTime('2022-02-06 17:00:00'),
                'endAt' => new DateTime('2022-02-06 21:00:00'),
            ],
        ];

        foreach ($events as $e) {
            $event = new Event();
            
            $event->setName($e['name'])
                  ->setDescription($e['description'])
                  ->setStartAt($e['startAt'])
                  ->setEndAt($e['endAt'])
            ;
            $manager->persist($event);
        }

        $manager->flush();
    }
    
    public static function getGroups(): array
    {
        return ['admin', 'dev'];
    }
}
