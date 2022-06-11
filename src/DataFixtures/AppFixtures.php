<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i=0; $i < 10; $i++) { 
            $product = new Product(); 

            $product->setName($faker->name())
                    ->setImage($faker->image())
                    ->setPrice(14.20);

            $manager->persist($product);
        }

        $manager->flush();
    }
}
