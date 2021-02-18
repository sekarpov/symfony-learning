<?php


namespace App\Services;


use Doctrine\ORM\Event\PostFlushEventArgs;

class MyService
{

    public function __construct()
    {
        dump('Hi! I am MyService.');
    }

    public function postFlush(PostFlushEventArgs $args)
    {
        dump('postFlush method');
        dump($args);
    }

    public function clear()
    {
        dump('clear ...');
    }

}