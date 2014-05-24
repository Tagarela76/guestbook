<?php

namespace GB\MainBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use GB\MainBundle\Repository\MessageEntityRepository;
use Symfony\Component\Validator\Constraints as Assert;


class MessageManager
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
     * @param GB\MainBundle\Entity\Message
     *
     * @return int
     */
    public function saveMessage($message)
    {
        return $this->repo->saveMessage($message);
    }

    public function findAll($pagination = null, $sortCondition = null, $order = 'ASC')
    {
        return $this->repo->findAll($pagination, $sortCondition, $order);
    }

    public function getMessageCount()
    {
        return $this->repo->getMessageCount();
    }
    /**
     * @return MessageEntityRepository
     */
    public function getRepo()
    {
        return new MessageEntityRepository($this->em);
    }

    /**
     *
     * find by field
     *
     * @string $field
     *
     * @return Message
     */
    public function findOneByField($field, $value)
    {
        return $this->repo->findOneByField($field, $value);
    }
}