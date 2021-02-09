<?php

namespace App\Controller;

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
         * Заполняем таблицу пользователей user
         */
//        $user = new User();
//        $user->setName('John');

        /*
         * Заполняем таблицу с видео video
         */
//        for ($i = 1; $i <= 3; $i++) {
//            $video = new Video();
//            $video->setTitle('Video title - ' . $i);
//            $user->addVideo($video);
//            $entityManager->persist($video);
//        }
//
//        $entityManager->persist($user);
//        $entityManager->flush();

//        dd('Created a video with the id of '. $video->getId() . '; User ID = ' . $user->getId());

        /*
         * Дотсаем пользователя у найденного видео
         */
//        $video = $this->getDoctrine()
//                ->getRepository(Video::class)
//                ->find(1);
//
//        dd($video->getAuthor()); // тут lazyload поэтому поля null
//        dd($video->getAuthor()->getName()); // нужно тянуть конкретное поле чтоб не было null

        /*
         * Достаем видео у найденнего пользователя
         */
//        $user = $this->getDoctrine()
//                ->getRepository(User::class)
//                ->find(1);
//
//        $result = [];
//        foreach ($user->getVideos() as $video) {
//            $result[] = $video->getTitle();
//        }
//        dd($result);

        /*
         * Удаление пользователя со всеми его связанными видео
         */
        $user = $this->getDoctrine()
                ->getRepository(User::class)
                ->find(1);

        $entityManager->remove($user);
        $entityManager->flush();
        dd($user);

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


}
