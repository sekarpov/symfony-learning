<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\User;
use App\Entity\Video;
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
        $entityManager = $this->getDoctrine()->getManager();

        /*
         * Создаем 4х пользователей
         */
//        for ($i = 1; $i <= 4; $i++) {
//            $user = new User();
//            $user->setName('Robert-' . $i);
//            $entityManager->persist($user);
//        }
//
//        $entityManager->flush();
//        dd('Last user id = ' . $user->getId());

        /*
         * Выбираем каждого
         */
        $user1 = $entityManager->getRepository(User::class)->find(1);
        $user2 = $entityManager->getRepository(User::class)->find(2);
        $user3 = $entityManager->getRepository(User::class)->find(3);
        $user4 = $entityManager->getRepository(User::class)->find(4);

        /*
         * Делаем подписку 1 пользователя к остальным 3м
         */
//        $user1->addFollowed($user2);
//        $user1->addFollowed($user3);
//        $user1->addFollowed($user4);
//        $entityManager->flush();

        /*
         * Смотрим пользователей к которым подписан user1
         */
//        dd($user1->getFollowed()->count());

        /*
         * Смотрим сколько подписано пользователей к user2
         */
        dd($user2->getFollowing()->count());

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


}
