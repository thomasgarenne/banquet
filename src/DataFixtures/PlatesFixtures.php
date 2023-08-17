<?php

namespace App\DataFixtures;

use App\Entity\Plates;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\String\Slugger\SluggerInterface;

class PlatesFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 1; $i < 11; $i++) {
            $plates = new Plates();

            $plates->setName($faker->text(20));
            $plates->setSlug($this->slugger->slug($plates->getName())->lower());
            $plates->setDescription($faker->text(100));
            $plates->setPrice($faker->numberBetween(5, 28));

            $cat = $this->getReference('cat-' . rand(4, 6));
            $plates->setCategory($cat);

            $this->setReference('plates-' . $i, $plates);
        }

        $manager->persist($plates);

        $manager->flush();
    }
}
