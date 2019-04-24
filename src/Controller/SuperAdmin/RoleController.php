<?php

namespace App\Controller\SuperAdmin;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/** @Route("/god") */
class RoleController extends Controller
{

    /**
     * @Route("/", name="home_super_admin")
     */
    public function showAllUsers()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAllOrderedByRole();

        return $this->render('super_admin/index.html.twig', [
            'users' => $users,
            'mainNavAdmin' => true, 
            'title' => 'Super Admin\'s page'
        ]);
    }

    /**
     * @Route("/makeAdmin/{id}", name="make_admin")
     */
    public function makeAdmin(User $user, ObjectManager $manager)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($user->getId());

        $user->addRole('ROLE_ADMIN');

        $manager->persist($user);
        $manager->flush();

        return $this->redirectToRoute('home_super_admin');
    }

    /**
     * @Route("/removeAdmin/{id}", name="remove_admin")
     */
    public function removeAdmin(User $user, ObjectManager $manager)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($user->getId());

        $user->setRoles([]);

        $manager->persist($user);
        $manager->flush();

        return $this->redirectToRoute('home_super_admin');
    }
}
