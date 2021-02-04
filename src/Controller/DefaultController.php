<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\GiftsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class DefaultController extends AbstractController
{
    public function __construct($logger)
    {
        // use $logger service
    }

    /**
     * @Route("/default", name="default")
     */
    public function index(GiftsService $gifts, Request $request): Response
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        if(!$users){
            throw $this->createNotFoundException("The users do not exist");
        }

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users,
            'random_gift' => $gifts->gifts
        ]);
    }

    /**
     * @Route("/blog/{page?}", name="blog_list", requirements={"page"="\d+"})
     */
    public function index2()
    {
        return new Response('Optional parameters in url and requirements for parameters');
    }

    /**
     * Примеры маршрута (
     *  http://localhost:7777/articles/en/2019/dell/rtv
     *  http://localhost:7777/articles/en/2019/dell
     * )
     *
     * @Route(
     *     "/articles/{_locale}/{year}/{slug}/{category}",
     *     defaults={"category": "computers"},
     *     requirements={
     *         "_locale": "en|fr",
     *         "category": "computers|rtv",
     *         "year": "\d+"
     *     }
     * )
     */
    public function index3()
    {
        return new Response('An advanced route example');
    }

    /**
     * Примеры маршрута (
     *  http://localhost:7777/over-ons
     *  http://localhost:7777/about-us
     * )
     *
     * @Route({
     *     "nl": "/over-ons",
     *     "en": "/about-us",
     * }, name="about_us")
     */
    public function index4()
    {
        return new Response('Translated routes');
    }

    /**
     * Генерация URL
     *
     * @Route("/generate-url/{param?}", name="generate_url")
     */
    public function generate_url()
    {
        dd($this->generateUrl(
            'generate_url',
            [
                'param' => 10
            ],
            UrlGeneratorInterface::ABSOLUTE_URL
        ));
    }

    /**
     * Скачивание файла
     *
     * @Route("/download")
     */
    public function download()
    {
        $path = $this->getParameter('download_directory');
        return $this->file($path.'file.pdf');
    }

    /**
     * Редирект
     *
     * @Route("/redirect-test")
     */
    public function redirectTest()
    {
        return $this->redirectToRoute('route_to_redirect', ['param' => 10]);
    }

    /**
     * @Route("/url-to-redirect/{param?}", name="route_to_redirect")
     */
    public function methodToRedirect()
    {
        dd('Test redirection');
    }

    /**
     * Ретрансляция на другие контроллеры и методы
     *
     * @Route("/forward-to-controller")
     */
    public function forwardToController()
    {
        $response = $this->forward(
          'App\Controller\DefaultController::methodToForwardTo',
            ['param'=> '1']
        );

        return $response;
    }

    /**
     * @Route("/url-to-forward-to/{param?}", name="route_to_forward_to")
     */
    public function methodToForwardTo($param)
    {
        dd('Test controller forward - ' . $param);
    }


}
