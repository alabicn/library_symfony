<?php
namespace App\Controller;

use App\Entity\User;
use App\Entity\Upload;

use App\Form\UploadType;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\Common\Persistence\ObjectManager;



/** @Route("/member") */
class MemberController extends Controller
{

    /**
     * @Route("/", name="profile_page")
     */
    public function index(Request $request, ObjectManager $manager)
    {


        $upload = new Upload();
        $form = $this->createForm(UploadType::class, $upload);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $upload->getName();
            $fileName = 'user' . $this->getUser()->getId() . '.' . $file->guessExtension();
            $file->move($this->getParameter('upload_directory'), $fileName);
            $this->getUser()->setSrcPhoto('img_user/' . $fileName);
            $this->getUser()->setAltPhoto($fileName);
            $this->getUser()->setTitlePhoto($this->getUser()->getUname() . '\'s profile photo');

            $manager->persist($this->getUser());
            $manager->flush();

            $this->addFlash('success', 'Your new photo has been saved.');

            $upload->setName($fileName);

            return $this->redirectToRoute('profile_page');
        }


        return $this->render('member/member.html.twig', [
            'mainNavMember' => true,
            'title' => 'Member',
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/user/{id}", name="show_user")
     */
    public function showUser(User $user)
    {

        $user = $this->getDoctrine()->getRepository(User::class)->find($user->getId());

        dump($user);



        return $this->render('member/user.html.twig', [
            'user' => $user
        ]);
    }
}
