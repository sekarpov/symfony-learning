<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\GiftsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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
    public function index(GiftsService $gifts, Request $request): Response
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();


        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users,
            'random_gifeeet' => $gifts->gifts
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

}
