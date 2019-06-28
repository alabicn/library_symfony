<?php
namespace App\DataFixtures;
use Faker;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class FakerFixtures extends Fixture
{
    /**
     * Encodeur de mot de passe
     *
     * @var UserPasswordEncoderInterface
     */
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('en_EN');
        for ($u = 0; $u < 10; $u++) {
            $user = new User();
            $user->setUsername($faker->username)
                ->setEmail('user@symfony.com')
                ->setPassword('123456789')
                ->setIsActive(true)
                ->setGender('Male')
                //$user->setRoles(NULL);
                ->setBirthdate($faker->dateTimeBetween($startDate = '-70 years', $endDate = '-18 years', $timezone = null))
                ->setRegistrationDate($faker->dateTimeBetween($startDate = '-20 years', $endDate = 'now', $timezone = null))
                ->setSrcPhoto('img_user/user.png')
                ->setAltPhoto('user.png (default image)')
                ->setTitlePhoto('Default image');
            $manager->persist($user);
        }
        $manager->flush();
    }
}