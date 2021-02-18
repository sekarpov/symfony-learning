<?php


namespace App\Services;


class MyService
{

    public function __construct($one)
    {
        dump('Hi! I am MyService.');
        dump($one);
    }

}