<?php

namespace GB\MainBundle\Repository;

use Doctrine\ORM\EntityRepository;
use GB\MainBundle\Entity\Image;

class ImageEntityRepository
{
    /**
     * @var \Doctrine\Common\Persistence\ObjectManager
     */
    private $em;

    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $em
     *
     * @return null
     */
    public function __construct($em)
    {
        $this->em = $em;
    }

    /**
     * @param GB\MainBundle\Entity\Image
     *
     * @return int
     */
    public function saveImage($image)
    {
        $this->em->persist($image);
        $id = $this->em->flush();

        return $image->getId();
    }
}
