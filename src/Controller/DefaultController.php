<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\GiftsService;
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
     * @Route("/home", name="default", name="home")
     */
    public function index(Request $request): Response
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
//        $user = $repository->find(1);
//        $user = $repository->findOneBy(['name' => 'Name - 1']);
//        $user = $repository->findOneBy(['name' => 'Name - 1', 'id' => 1]);
//        $user = $repository->findBy(['name' => 'Robert'], ['id' => 'DESC']);
        $user = $repository->findAll();
        dd($user);

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


}
