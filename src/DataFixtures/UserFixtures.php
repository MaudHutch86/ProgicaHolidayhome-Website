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
      $this->encoder =$encoder; 
   }
    public function load(ObjectManager $manager)
    {
        $user = new User();
       
        $user->setUsername ('admin');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->encoder->encodePassword($user,'admin'));
        $user->setPhoneNumber(+987654321);
        


        
        
        $user2 = new User();

        $user2->setUsername('user');
        $user2->setRoles(['ROLE_USER']);
        $user2->setPassword($this->encoder->encodePassword($user,'user'));
        $user2->setPhoneNumber(+967654322);
    
        $manager->persist($user,$user2);
        $manager->flush();
    }
    


}
