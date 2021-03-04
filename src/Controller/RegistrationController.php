<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/registration", name="registration",  methods={"GET"} )
     */
    public function index(): Response
    {
        return $this->render('registration/registration.html.twig', [
            'controller_name' => 'RegistrationController',
        ]);
    }

    /**
     * @Route("/registration", name="register_user", methods={"POST"})
     */
     public function registerUser(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
     {

         $reg_data = $request->request->all();

         $user = new User();
         $user->setEmail($reg_data['email']);
         $password = $passwordEncoder->encodePassword($user, $reg_data['password']);
         $user->setPassword($password);
         $user->setRoles(['ROLE_USER']);

         $em = $this->getDoctrine()->getManager();
         $em->persist($user);
         $em->flush();

         return $this->redirectToRoute('app_login');

         // $thisuser = $user->setEmail($reg_data['email']);
         // $finduser = $em->getRepository('App\Entity\User')->findOneByEmail($thisuser);
         if ($form->getErrors()){
           $answer = [
              'answer_state' => 'error',
              'reason' => 'Данный email уже зарегистрирован'
            ];
          } else {
           $answer = [
              'answer_state' => 'success',
              'reason' => 'Данные успешно сохранены'
            ];
         }

         // $finduser = $this->getDoctrine()
         //   ->getRepository(User::class)
         //   ->find($reg_data['email']);
         // if ()

         return $this->json_encode($answer);
     }



}
