<?php

namespace App\DataFixtures;

use App\Entity\Orders;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OrdersFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $orders = new Orders();

        $orders->setNumber(4);
        $orders->setTime('19:00');
        $orders->setDates(new DateTime());
        $orders->setNotes('pas d\'allergies');

        $user = $this->getReference('user-1');
        $orders->setRelation($user);

        $manager->persist($orders);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }
}
