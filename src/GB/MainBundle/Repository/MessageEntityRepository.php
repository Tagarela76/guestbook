<?php

namespace GB\MainBundle\Repository;

use Doctrine\ORM\EntityRepository;
use GB\MainBundle\Entity\Message;

class MessageEntityRepository
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
     * @param GB\MainBundle\Entity\Message
     *
     * @return int
     */
    public function saveMessage($message)
    {
        $this->em->persist($message);
        $this->em->flush();

        return $message->getId();
    }

    /**
     * @param int $pagination
     * @param string $sortCondition
     *
     * @return Message[]
     */
    public function findAll($pagination = null, $sortCondition = null, $order = 'ASC')
    {

        $sql = 'SELECT m FROM GB\MainBundle\Entity\Message m';

        if(!is_null($sortCondition)){
            $sql .= ' ORDER BY m.'.$sortCondition.' '.$order;
        }

        $query = $this->em->createQuery($sql);

        if(!is_null($pagination)){
            $offset = $pagination->offset(); // Get offset
            $limit = $pagination->limit();   // Get limit
            $query->setFirstResult($offset);
            $query->setMaxResults($limit);
        }

        return $query->getResult();
    }

    /**
     * @return int
     */
    public function getMessageCount()
    {
        $sql = 'SELECT count(m) FROM GB\MainBundle\Entity\Message m';
        $query = $this->em->createQuery($sql);

        return $query->getSingleScalarResult();
    }

    public function findOneByField($field, $value)
    {
        $sql = "SELECT m FROM GB\MainBundle\Entity\Message m ".
                "WHERE m.".$field." = ?1";
        $query = $this->em->createQuery($sql)->setParameter(1, $value);

        return $query->getResult();
    }
}
