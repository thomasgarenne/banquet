<?php

namespace App\DataFixtures;

use App\Entity\Images;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ImagesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 1; $i < 11; $i++) {
            $images = new Images();

            $images->setName($faker->text(20));
            $images->setAlt($faker->text(20));

            $plates = $this->getReference('plates-' . $i);
            $images->setPlate($plates);

            $manager->persist($images);
        }


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            PlatesFixtures::class
        ];
    }
}
