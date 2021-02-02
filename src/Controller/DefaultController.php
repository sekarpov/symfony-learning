<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\GiftsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    public function __construct(GiftsService $gifts)
    {
        $gifts->gifts = ['a', 'b', 'c'];
    }

    /**
     * @Route("/default", name="default")
     */
    public function index(GiftsService $gifts): Response
    {
//        $users = ['Adam', 'Robert', 'John', 'Susan'];
        $entityManager = $this->getDoctrine()->getManager();


        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users,
            'random_gift' => $gifts->gifts,
        ]);
    }
}
