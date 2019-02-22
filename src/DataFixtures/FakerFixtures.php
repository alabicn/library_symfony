<?php
namespace App\DataFixtures;
 
use Faker;
use App\Entity\User;
use App\Entity\Genre;
use App\Form\UserType;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

 
class FakerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
 
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('en_EN');

        for($a = 0; $a < 5; $a++){

            $author = new Author();

            $author->setName($faker->firstName($gender = null|'male'|'female'));
            $author->setSurname($faker->lastName());
            $author->setAbout($faker->text());
            $author->setSrcImage($faker->imageUrl($width = 640, $height = 480));
            $author->setAltImage('user.png (default image)');
            $author->setTitleImage('Default image');

            $manager->persist($author);
        }

        for($b = 0; $b < 20; $b++){

            $book = new Book();

            $book->setTitle($faker->sentence());
            $book->setSrcImage($faker->imageUrl($width = 640, $height = 480));
            $book->setAltImage('user.png (default image)');
            $book->setTitleImage('Default image');
        }
 
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
            for ($g = 0; $g < 10; $g++) {
            
            $genre = new Genre();
            $genre->setName($faker->word());
    
            $manager->persist($genre);  

        }
            
 
        $manager->flush();
    }
}