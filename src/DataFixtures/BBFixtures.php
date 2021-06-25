<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Amenities;
use App\Entity\HolidayHome;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BBFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
$anemity =[];

        $amenity1 = new Amenities();
        $amenity1
        ->setName('Swimming Pool');

        $amenity2 = new Amenities();
        $amenity2
        ->setName('garden');
       
        $amenity3 = new Amenities();
        $amenity3
        ->setName('Sauna');
        $amenity4 = new Amenities();
        $amenity4
        ->setName('Excursions');

        array_push($anemity,$amenity1,$amenity2,$amenity3,$amenity4);
        $manager->persist($amenity1);
        $manager->persist($amenity2);
        $manager->persist($amenity3);
        $manager->persist($amenity4);

        $manager->flush();
       
        for ($i=0; $i < 60; $i++) { 
            $BB = new HolidayHome();
            $BB
            ->setName($faker->word())
            ->setDescription($faker->text(50))
            ->setAddress($faker->address())
            
            ->setFloorSpace($faker->numberBetween(80,100))
            ->setRoomNumber($faker->numberBetween(1,5))
            ->setBedding($faker->numberBetween(1,5))
            ->setAnimals($faker->boolean())
            ->setHighSeasonPrice($faker->numberBetween(600,1000))
            ->setLowSeasonPrice($faker->numberBetween(300,500))
            ->setCreatedAt($faker->dateTimeThisYear('now', 'Europe/Paris')) 
            ->setCity($faker->city())
            ->setPostCode($faker->numberBetween(12000,70000))
            ->addAmenity($faker->randomElement($anemity));
            
            $manager->persist($BB);
            

           
        }
        $manager->flush();
    }
     
    

}
