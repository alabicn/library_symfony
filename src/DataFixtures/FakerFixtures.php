<?php
namespace App\DataFixtures;
 
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

 
class FakerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
 
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('en_EN');
 
        // on créé 10 personnes
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setUsername($faker->username);
            $user->setEmail($faker->email);
            $user->setPassword('1234');
            $user->setIsActive(true);
            $user->setGender('0');
            $user->setRoles(getRoles());
            $user->setBirthdate(new \DateTime());
            $user->setRegistrationDate(new \DateTime());
            //$user->setGender($faker->gender);
            $user->setSrcPhoto('img_user/user.png');
            $user->setAltPhoto('user.png (default image)');
            $user->setTitlePhoto('Default image');
            $manager->persist($user);
        }
 
        $manager->flush();
    }
}