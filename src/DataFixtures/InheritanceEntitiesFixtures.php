<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Pdf;
use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InheritanceEntitiesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       for ($i = 1; $i <= 2; $i++) {
           $author = new Author();
           $author->setName('author name ' . $i);
           $manager->persist($author);

           for ($j = 1; $j <= 3; $j++) {
               $pdf = new Pdf();
               $pdf->setFilename('pdf name of user '.$i);
               $pdf->setDescription('pdf description of user '.$i);
               $pdf->setSize(5545);
               $pdf->setOrientation('portrait');
               $pdf->setPagesNumber(255);
               $pdf->setAuthor($author);
               $manager->persist($pdf);

           }

           for ($k = 1; $k <= 2; $k++) {
               $video = new Video();
               $video->setFilename('Video name of user '.$i);
               $video->setDescription('pdf description of user '.$i);
               $video->setSize(665);
               $video->setFormat('mpeg-2');
               $video->setDuration('5111');
               $video->setAuthor($author);
               $manager->persist($video);
           }
       }

        $manager->flush();
    }
}
