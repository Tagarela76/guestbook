<?php

namespace GB\MainBundle\Entity {

    use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Mapping\ClassMetadata;
    use Symfony\Component\Validator\Constraints as Assert;

    /**
     * @\Doctrine\ORM\Mapping\Entity(repositoryClass="GB\MainBundle\Repository\ImageEntityRepository")
     */
    class Image
    {
        /**
         * @\Doctrine\ORM\Mapping\Id
         * @\Doctrine\ORM\Mapping\Column(type="integer")
         * @\Doctrine\ORM\Mapping\GeneratedValue
         */
        private $id;

        /**
         * @\Doctrine\ORM\Mapping\Column(type="text")
         */
        private $name;

        /**
         * @\Doctrine\ORM\Mapping\Column(type="text")
         */
        private $realName;

        /**
         * @ManyToOne(targetEntity="Message")
         * @JoinColumn(name="messageId", referencedColumnName="id")
         */
        private $message;

        /**
         * @param string
         *
         * @return Message
         */
        public function setName($name)
        {
            $this->name = $name;

            return $this;
        }

        /**
         * @param string
         *
         * @return Message
         */
        public function setRealName($realName)
        {
            $this->realName = $realName;

            return $this;
        }

        /**
         * @param string
         *
         * @return Message
         */
        public function setMessage($message)
        {
            $this->message = $message;

            return $this;
        }

        /**
         * @return string
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @return string
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @return string
         */
        public function getRealName()
        {
            return $this->realName;
        }
    }
}