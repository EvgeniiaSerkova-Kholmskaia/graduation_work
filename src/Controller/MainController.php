<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index(): Response
    {
        return $this->render('main/main.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/contacts", name="contacts")
     */

    public function contact(): Response
    {
        return $this->render('main/contacts.html.twig', [
            'controller_name' => 'MainController',
        ]);
     }

     /**
      * @Route("/rules", name="rules")
      */

     public function rule(): Response
     {
         return $this->render('main/rules.html.twig', [
             'controller_name' => 'MainController',
         ]);
      }




}
