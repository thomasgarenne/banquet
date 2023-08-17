<?php

namespace App\DataFixtures;

use App\Entity\Wines;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\String\Slugger\SluggerInterface;

class WinesFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 1; $i < 11; $i++) {
            $wines = new Wines();

            $wines->setName($faker->text(20));
            $wines->setSlug($this->slugger->slug($wines->getName())->lower());
            $wines->setDomain($faker->text(20));
            $wines->setYear($faker->numberBetween(1980, 2023));
            $wines->setGrappes(['Grenache', 'Syrah', 'Merlot']);

            $cat = $this->getReference('cat-' . rand(1, 3));
            $wines->setCategory($cat);

            $this->setReference('wines-' . $i, $wines);
        }

        $manager->persist($wines);

        $manager->flush();
    }
}
