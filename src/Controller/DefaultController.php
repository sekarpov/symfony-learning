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
         * Создаем пользователя и несколько видео
         */
//        $user = new User();
//        $user->setName('Robert');
//
//        for ($i = 1; $i <= 3; $i++) {
//            $video = new Video();
//            $video->setTitle('Video number - ' . $i);
//            $user->addVideo($video);
//            $entityManager->persist($video);
//        }
//
//        $entityManager->persist($user);
//        $entityManager->flush();

        /*
         * Такой вариант поиска lazy load ленивая загрузка, означает, что связанных с пользователем видео не будут автоматически добавлены в результат поиска, но это не означает что мы не можем получить видео этого пользователя.
         */
//        $user = $entityManager->getRepository(User::class)->find(1);
//        dd($user);

        /*
         * Создаем свой метод в репозитории, который не использует ленивую загрузку.
         * Это так называемая активная загрузка(eager loading), реализовано с помощью(->addSelect('v'))
         */
        $user = $entityManager->getRepository(User::class)->findWithVideos(1);
        dd($user);


        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


}
