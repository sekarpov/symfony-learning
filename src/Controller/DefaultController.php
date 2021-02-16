<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Author;
use App\Entity\File;
use App\Entity\Pdf;
use App\Entity\User;
use App\Entity\Video;
use App\Services\GiftsService;
use App\Services\MySecondService;
use App\Services\MyService;
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
    public function index(MyService $second_service): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


}
