<?php
namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/** @Route("/member") */
class MemberController extends Controller {
    
    /**
     * @Route("/")
     */
    public function index() {
        return $this->render('member/index.html.twig', ['mainNavMember'=>true, 'title'=>'Member']);
    
    
    }

    
    /**
     * @Route("/user/{id}", name="show_user")
     */
    public function showUser(User $user){

        $user = $this->getDoctrine()->getRepository(User::class)->find($user->getId());

        dump($user);



        return $this->render('member/user.html.twig', [
            'user' => $user
        ]);
    }

}