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
//        $entityManager = $this->getDoctrine()->getManager();
//        $user = $entityManager->getRepository(User::class)->find(1);

//        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
//        if(!$users){
//            throw $this->createNotFoundException("The users do not exist");
//        }



        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    public function mostPopularPosts($number = 3)
    {
        // database call
        $posts = ['post1', 'post2', 'post3', 'post4'];

        return $this->render('default/most_popular_posts.html.twig', [
            'posts' => $posts
        ]);
    }

}
