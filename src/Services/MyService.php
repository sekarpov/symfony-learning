<?php


namespace App\Services;


class MyService
{
    use OptionalServiceTrait;

    public function __construct()
    {

    }

    public function someAction()
    {
        dump($this->service->doSomething2());
   }

}