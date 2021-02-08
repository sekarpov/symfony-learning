<?php

namespace App\Controller;

use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{
    public function __construct($logger)
    {
        // use $logger service
    }

    /**
     * @Route("/home/{id}", name="default", name="home")
     */
    public function index(Request $request, User $user): Response
    {
//        $entityManager = $this->getDoctrine()->getManager();

        dump($user);


        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


}
