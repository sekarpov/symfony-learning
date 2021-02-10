<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Author;
use App\Entity\File;
use App\Entity\Pdf;
use App\Entity\User;
use App\Entity\Video;
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
    public function index(GiftsService $gifts, Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
//        $items = $entityManager->getRepository(File::class)->findAll();
//        $items = $entityManager->getRepository(Video::class)->findAll();
//        $items = $entityManager->getRepository(Pdf::class)->findAll();
//        dump($items);

        $author = $entityManager->getRepository(Author::class)->findByIdWithPdf(1);
        dump($author);

        foreach($author->getFiles() as $file){
//            if($file instanceof Pdf){
//                dump($file->getFileName());
//            }

            dump($file->getFileName());

        }

        $users = $this->getDoctrine()->getRepository(User::class)->findAll();



        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users,
            'random_gift' => $gifts->gifts,
        ]);
    }


}
