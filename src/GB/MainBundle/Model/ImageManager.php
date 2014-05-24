<?php

namespace GB\MainBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use \GB\MainBundle\Repository\ImageEntityRepository;
use Symfony\Component\Validator\Constraints as Assert;


class ImageManager
{
    /**
     * @var \Doctrine\Common\Persistence\ObjectManager
     */
    private $em;

    private $repo;

    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $em
     *
     * @return null
     */
    public function __construct(ObjectManager $em)
    {
        $this->em = $em;
        $this->repo = $this->getRepo();
    }

    /**
     * @param GB\MainBundle\Entity\Image
     *
     * @return int
     */
    public function saveImage($image)
    {
        return $this->repo->saveImage($image);
    }

    /**
     * @return ImageEntityRepository
     */
    public function getRepo()
    {
        return new ImageEntityRepository($this->em);
    }
}