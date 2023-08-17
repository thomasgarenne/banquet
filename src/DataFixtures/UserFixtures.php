<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 5; $i++) {
            $user = new User();

            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setEmail($faker->email());
            $user->setPhone($faker->phoneNumber());
            $user->setPassword($faker->text(10));
            $user->setRoles(['ROLE_USER']);

            $manager->persist($user);
        }

        $user = new User();

        $user->setFirstname('John');
        $user->setLastname('Doe');
        $user->setEmail('test@test.test');
        $user->setPhone('0000000000');
        $user->setPassword('admins');
        $user->setRoles(['ROLE_ADMIN']);

        $this->setReference('user-1', $user);

        $manager->persist($user);

        $manager->flush();
    }
}
