<?php


namespace App\Services;


class MyService
{

    public $logger;
    public $my;

    public function __construct()
    {

    }

    public function someAction()
    {
        dump($this->logger);
        dump($this->my);
    }

}