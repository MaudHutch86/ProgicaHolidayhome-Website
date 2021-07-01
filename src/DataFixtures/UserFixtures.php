<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
   public function __construct(UserPasswordHasherInterface $encoder)
   {
      $this->password_hash =$encoder; 
   }
    public function load(ObjectManager $manager): void
    {
        $user = new User();
       
        $user->setUsername ('admin');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->password_hash->hashPassword($user,'admin'));
        $user->setPhoneNumber(987654321);
        $manager->persist($user);


        
        
        $user2 = new User();

        $user2->setUsername('user');
        $user2->setRoles(['ROLE_USER']);
        $user2->setPassword($this->password_hash->hashPassword($user,'user'));
        $user2->setPhoneNumber(967654322);
    
        $manager->persist($user2);
        $manager->flush();
    }
    


}
