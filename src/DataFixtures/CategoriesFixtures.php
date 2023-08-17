<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $categories = new Categories();

            $categories->setName($faker->text(20));
            $categories->setSlug($this->slugger->slug($categories->getName())->lower());
            $categories->setParent(null);

            $this->setReference('cat-' . $i, $categories);
        }

        $manager->persist($categories);

        $manager->flush();
    }
}
