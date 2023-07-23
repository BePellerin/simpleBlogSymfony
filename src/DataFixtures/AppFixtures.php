<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Article;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i < 10 ; $i++) {
            $faker = Factory::create("fr_FR");

            $article = new Article();
            $article->setTitle($faker->words(3, true));
            $article->setContenu($faker->text(350));
            $article->setDateCreate($faker->dateTimeBetween("-6 month", "now"));

            $manager->persist($article);

            $manager->flush();
        }
        
    }
}
