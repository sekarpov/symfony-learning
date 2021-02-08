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
        $entityManager = $this->getDoctrine()->getManager();
        #1
//        $query = $entityManager->createQuery(
//                'SELECT u
//            FROM App\Entity\User u
//            WHERE u.id > :id
//            ORDER BY u.id ASC'
//        )->setParameter('id', 2);
//        $users = $query->getResult();
//        dd($users);

        #2 (почему-то не работает)
//        $conn = $entityManager->getConnection();
//        $sql = '
//            SELECT * FROM user u
//            WHERE u.id > :id
//            ORDER BY u.id ASC
//            ';
//        $stmt = $conn->prepare($sql);
//        $stmt->execute(['id' => 2]);
//        $users = $stmt->fetchAll();
//        dd($users);

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


}
